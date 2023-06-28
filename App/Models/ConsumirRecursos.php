<?php

namespace App\models;

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
       
            http_response_code(400);
            return array('status' => 400, 'error' => 'Erro ao atualizar Saldo');
        
    }

    private static function atualizarInformacoes($dados)
    {
        $connPdo = new \PDO(DBDRIVER . ':host=' . HOST . ';dbname=' . DBNAME, DBUSER, DBPASS);
        try {
            $connPdo->beginTransaction();

            $sqlClubes = "UPDATE " . self::$tableClubes . " SET saldo_disponivel = :valor WHERE id = :id";
            $stmtClubes = $connPdo->prepare($sqlClubes);
            $stmtClubes->bindValue(':valor', self::$valorClubeAtualizado);
            $stmtClubes->bindValue(':id', $dados['clube_id']);
            $stmtClubes->execute();

            $sqlRecursos = "UPDATE " . self::$tableRecursos . " SET saldo_disponivel = :valor WHERE id = :id";
            $stmtRecursos = $connPdo->prepare($sqlRecursos);
            $stmtRecursos->bindValue(':valor', self::$valorRecursoAtualizado);
            $stmtRecursos->bindValue(':id', $dados['recurso_id']);
            $stmtRecursos->execute();


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
        $valorClubes = str_replace(',', '.', round(floatval(self::$dadosClube['saldo_disponivel']), 2));
        $valorConsumo = str_replace(',', '.', $valorConsumo);
        $consumo = round(floatval($valorConsumo), 2);
        if ($valorRecursos >= $consumo && $valorClubes >= $consumo) {
            $valorClubeAtualizadoDecimal = number_format($valorClubes - $consumo, 2);
            $valorRecursoAtualizadoDecimal = number_format($valorRecursos - $consumo, 2);
            $valorClubeAtualizado = number_format($valorClubes - $consumo, 2);
            self::$valorClubeAtualizado =  str_replace(',', '', $valorClubeAtualizadoDecimal);
            self::$valorRecursoAtualizado =  str_replace(',', '', $valorRecursoAtualizadoDecimal);
            return strval($valorClubeAtualizado);
        } else {
            if ($valorRecursos < $consumo) {
                return 3;
            } elseif ($valorClubes < $consumo) {
                return 2;
            }
        }
    }
}
