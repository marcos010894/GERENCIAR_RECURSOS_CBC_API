<?php

namespace App\Services;

use App\Models\ConsumirRecursos;

class RecursoService
{
    public function post(array $dados)
    {
        // Verificar se todos os campos necessários estão presentes
        if (!isset($dados['clube_id'], $dados['recurso_id'], $dados['valor_consumo'])) {
            http_response_code(400);
            return array('status' => 400, 'error' => 'Erro Dados Invalidos.');
        }
        return ConsumirRecursos::consumir($dados);
    }
}
