<?php

namespace App\Models;

class Clube
{
    private static $table  = 'clubes';

    public static function get()
    {
        $connPdo = new \PDO(DBDRIVER . ':host=' . HOST . ';dbname=' . DBNAME, DBUSER, DBPASS);
        try {
            $sql = 'SELECT * FROM ' . self::$table;
            $stmt = $connPdo->prepare($sql);
            $stmt->execute();

            if ($stmt->rowCount() > 0) {
                return $stmt->fetchAll(\PDO::FETCH_ASSOC);
            } else {
                http_response_code(404);
                return array('status' => 404, 'Error' => 'Nenhum dado encontrado');
            }
        } catch (\Exception $e) {
            http_response_code(400);
            return array('status' => 400, 'error' => $e, 'mensagem' => 'Erro ao Puxar dados');
        }
    }

    public static function get_id(int $id)
    {
        $connPdo = new \PDO(DBDRIVER . ':host=' . HOST . ';dbname=' . DBNAME, DBUSER, DBPASS);
        try {

            if ($id) {
                $sql = 'SELECT * FROM ' . self::$table . ' WHERE id = :id';
                $stmt = $connPdo->prepare($sql);
                $stmt->bindValue(':id', $id);
                $stmt->execute();

                if ($stmt->rowCount() > 0) {
                    return $stmt->fetch(\PDO::FETCH_ASSOC);
                } else {
                    http_response_code(404);
                    return array('status' => 404, 'Error' => 'Nenhum dado encontrado');
                }
            }
        } catch (\Exception $e) {
            http_response_code(400);
            return array('status' => 400, 'error' => $e, 'mensagem' => 'Erro ao Puxar dados');
        }
    }

    public static function post($dados)
    {
        $connPdo = new \PDO(DBDRIVER . ':host=' . HOST . ';dbname=' . DBNAME, DBUSER, DBPASS);
        try {
            if (self::verify_exist_name($dados['clube'])) {
                http_response_code(409);
                return array('status' => 409, 'error' => 'Erro ao inserir dados, ja existe na tabela');
            }

            $sql = 'INSERT INTO ' . self::$table . '(nome_clube, saldo_disponivel) VALUES (:nome_clube, :saldo_disponivel)';
            $stmt = $connPdo->prepare($sql);
            $result = $stmt->execute([
                'nome_clube' => $dados['clube'],
                'saldo_disponivel' => str_replace(',', '.', $dados['saldo_disponivel'])
            ]);
            return array('status' => 200, 'mensagem' => 'Sucesso');
        } catch (\Exception $e) {
            http_response_code(400);
            return array('status' => 400, 'error' => $e, 'mensagem' => 'Erro ao Inserir dados');
        }
    }

    private static function verify_exist_name($nome_clube)
    {
        $connPdo = new \PDO(DBDRIVER . ':host=' . HOST . ';dbname=' . DBNAME, DBUSER, DBPASS);

        $sql = 'SELECT * FROM ' . self::$table . ' WHERE nome_clube = :nome_clube';
        $stmt = $connPdo->prepare($sql);
        $stmt->bindValue(':nome_clube', $nome_clube);
        $stmt->execute();

        if ($stmt->rowCount() > 0) {
            return true;
        }

        return false;
    }
}
