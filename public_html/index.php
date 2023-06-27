<?php
require_once '../vendor/autoload.php';

$method = strtolower($_SERVER['REQUEST_METHOD']);

if ($method === 'post') {
    // Obtenha os dados POST brutos
    $input = file_get_contents('php://input');

    // Converte JSON em um array PHP
    $data = json_decode($input, true);

    if (json_last_error() != JSON_ERROR_NONE) {
        echo 'Erro na decodificação do JSON: ' . json_last_error_msg();
        exit;
    }

    $dados_json =  $data;
    $url = explode('/', $_GET['url']);
} else if ($method === 'get') {
    $url = explode('/', $_GET['url']);
}

if ($url[0] === 'api') {

    array_shift($url);

    $service = 'App\Services\\' . ucfirst($url[0]) . 'Service';

    $service2 = new   App\Services\ClubeService;

    try {
        if ($method === 'post') {

            $responsePost = call_user_func_array(array(new $service, $method), [$dados_json]);

            echo json_encode($responsePost);
        } else if ($method === 'get') {
            array_shift($url);

            $responseGET = call_user_func_array(array(new $service, $method), $url);
            echo json_encode($responseGET);
        }
    } catch (\Exception $e) {
    }
}
