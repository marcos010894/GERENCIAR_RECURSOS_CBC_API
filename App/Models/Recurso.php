<?php

namespace App\models;

class Recurso
{
    private static $table  = 'recursos';


    public static function get_id(int $id = null)
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
}
