<?php

namespace App\Services;

use App\Models\ConsumirRecursos;

class RecursoService
{
    public function post($dados)
    {
        return ConsumirRecursos::consumir($dados);
    }
}
