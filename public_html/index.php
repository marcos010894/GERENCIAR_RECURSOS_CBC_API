<?php
require_once '../vendor/autoload.php';

date_default_timezone_set("America/Sao_Paulo");

function set_http_headers()
{
    header("Content-type: application/json");
    header('Access-Control-Allow-Origin: *');
    header('Access-Control-Allow-Methods: GET, POST');
    header("Access-Control-Allow-Headers: Content-Type");
}

function send_error($status, $message)
{
    http_response_code($status);
    echo json_encode(array('status' => $status, 'error' => $message));
    exit;
}

set_http_headers();

$method = strtolower($_SERVER['REQUEST_METHOD']);

$url = isset($_GET['url']) ? explode('/', $_GET['url']) : array();

$dados_json = null;
if ($method === 'post') {
    $input = file_get_contents('php://input');
    $data = json_decode($input, true);

    if (json_last_error() !== JSON_ERROR_NONE) {
        send_error(400, 'Erro na decodificação do JSON: ' . json_last_error_msg());
    }

    $dados_json =  $data;
} else if ($method !== 'get') {
    send_error(405, 'Método HTTP não suportado');
}

if ($url[0] === 'api') {

    array_shift($url);

    $service = 'App\Services\\' . ucfirst($url[0]) . 'Service';

    try {
        if ($method === 'post') {
            $response = call_user_func_array(array(new $service, $method), [$dados_json]);
        } else if ($method === 'get') {
            array_shift($url);
            $response = call_user_func_array(array(new $service, $method), $url);
        }
        echo json_encode($response);
    } catch (\Exception $e) {
        send_error(500, 'Erro inesperado!');
    }
}
