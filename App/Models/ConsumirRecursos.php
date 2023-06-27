<?php

namespace App\models;

use App\models\Clube;
use App\models\Recurso;

class ConsumirRecursos
{
    private static $tableRecursos  = 'recursos';
    private static $tableClubes  = 'clubes';
    public static $dadosRecurso = [];
    public static $dadosClube = [];

    public static $valorRecursoAtualizado = 0;
    public static $valorClubeAtualizado = 0;

    public static function consumir($dados)
    {

        self::$dadosClube = Clube::get_id($dados['clube_id']);
        self::$dadosRecurso = Recurso::get_id($dados['recurso_id']);
        $valorCalculado = self::subtrair_recursos($dados['valor_consumo']);


        $responseAtt = self::ataulizarInformacoes($dados);
        if ($responseAtt) {
            $dadosTratados = [
                "clube" => self::$dadosClube['nome_clube'],
                "saldo_anterior" => self::$dadosClube['saldo_disponivel'],
                "saldo_atual" => $valorCalculado,
            ];
            return $dadosTratados;
        } else {
            http_response_code(400);
            return array('status' => 400, 'error' => 'Erro ao atualizar Saldo');
        }
    }

    private static function ataulizarInformacoes($dados)
    {
        $connPdo = new \PDO(DBDRIVER . ':host=' . HOST . ';dbname=' . DBNAME, DBUSER, DBPASS);
        try {
            $connPdo->beginTransaction();

            // Executa várias consultas SQL
            $connPdo->exec("UPDATE " . self::$tableClubes . " SET saldo_disponivel = " . self::$valorClubeAtualizado . "  WHERE id =" . $dados['clube_id']);
            $connPdo->exec("UPDATE " . self::$tableRecursos . " SET saldo_disponivel = " . self::$valorRecursoAtualizado . "  WHERE id = " . $dados['recurso_id']);

            return $connPdo->commit();
        } catch (\Exception $e) {
            // Se ocorrer um erro, reverte a transação
            $connPdo->rollBack();
            echo "Falha: " . $e->getMessage();
        }
    }
    private static function subtrair_recursos($valorConsumo)
    {

        $valorRecursos = round(floatval(self::$dadosRecurso['saldo_disponivel']), 2);
        $valorClubes = round(floatval(self::$dadosClube['saldo_disponivel']), 2);
        $valorConsumo = str_replace(',', '.', $valorConsumo);
        $consumo = round(floatval($valorConsumo), 2);

        // Use o operador lógico correto "&&" em vez de "&"
        if ($valorRecursos >= $consumo && $valorClubes >= $consumo) {
            $valorClubeAtualizadoDecimal = number_format($valorClubes - $consumo, 2);
            $valorRecursoAtualizadoDecimal = number_format($valorRecursos - $consumo, 2);
            $valorClubeAtualizado = number_format($valorClubes - $consumo, 2);
            self::$valorClubeAtualizado =  str_replace(',', '', $valorClubeAtualizadoDecimal);
            self::$valorRecursoAtualizado =  str_replace(',', '', $valorRecursoAtualizadoDecimal);
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
