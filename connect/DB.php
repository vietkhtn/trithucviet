<?php 

class DB {

    private static function connnect() {
        $pdo = new PDO('mysql:host=localhost; dbname=stackoverflow; charset=utf8mb4', 'root','');

        // Report error and exception
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        return $pdo;
    }

    //Do Query
    public static function query($query, $params = array()) {
        $statement = self::connnect()->prepare($query);
        $statement->execute($params);

        // split query string by blankspace, get first word, if SELECT -> return all result resources
        if(explode(' ', $query[0] == 'SELECT')){
            $data = $statement->fetchAll();
            return $data;
        }
    }
}           


?>