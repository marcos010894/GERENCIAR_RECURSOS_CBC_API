<?php

namespace App\models;

use App\models\Clube;
use App\models\Recurso;

class ConsumirRecursos
{
    private static $tableRecursos  = 'recursos';
    public static $dadosRecurso = [];
    public static $dadosClube = [];

    public static function consumir($dados)
    {

        self::$dadosClube = Clube::get_id($dados['clube_id']);
        self::$dadosRecurso = Recurso::get_id($dados['recurso_id']);
        $valorCalculado = self::subtrair_recursos($dados['valor_consumo']);

        $dadosTratados = [
            "clube" => self::$dadosClube['nome_clube'],
            "saldo_anterior" => self::$dadosClube['saldo_disponivel'],
            "saldo_atual" => $valorCalculado,
        ];
        return $dadosTratados;
    }
    private static function subtrair_recursos($valorConsumo)
    {

        $valorRecursos = round(floatval(self::$dadosRecurso['saldo_disponível']), 2);
        $valorClubes = round(floatval(self::$dadosClube['saldo_disponivel']), 2);
        $valorConsumo = str_replace(',', '.', $valorConsumo);
        $consumo = round(floatval($valorConsumo), 2);

        // Use o operador lógico correto "&&" em vez de "&"
        if ($valorRecursos >= $consumo && $valorClubes >= $consumo) {
            $valorClubeAtualizado = number_format($valorClubes - $consumo, 2);
            return floatval($valorClubeAtualizado);
        } else {
            if ($valorRecursos < $consumo) {
                return 'Recursos indisponíveis.';
            } elseif ($valorClubes < $consumo) {
                return 'O saldo disponível do clube é insuficiente.';
            }
        }
    }
}
