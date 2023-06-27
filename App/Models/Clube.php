<?php

namespace App\models;

class Clube
{
    private static $table  = 'clubes';

    public static function get(int $id = null)
    {
        $connPdo = new \PDO(DBDRIVER . ':host=' . HOST . ';dbname=' . DBNAME, DBUSER, DBPASS);
        if ($id) {
            $sql = 'SELECT * FROM ' . self::$table . ' WHERE id = :id';
            $stmt = $connPdo->prepare($sql);
            $stmt->bindValue(':id', $id);
        } else {
            $sql = 'SELECT * FROM ' . self::$table;
            $stmt = $connPdo->prepare($sql);
        }


        $stmt->execute();

        if ($stmt->rowCount() > 0) {
            return $stmt->fetch(\PDO::FETCH_ASSOC);
        }
        throw new \Exception("Nenhum clube encontrado");
    }
}
