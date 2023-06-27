<?php

namespace App\Services;

use App\Models\Clube;

class ClubeService
{
    public function get(int $id = null)
    {
        // return $id;
        if ($id) {
            return Clube::get_id($id);
        } else {
            return Clube::get();
        }
    }

    public function post(array $dados)
    {

        if (!isset($dados['clube'], $dados['saldo_disponivel'])) {
            http_response_code(400);
            return array('status' => 400, 'error' => 'Erro Dados Invalidos.');
        }
        return Clube::post($dados);;
    }
}
