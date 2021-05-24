<?php 
class DB {

    public $DB_NAME="bitgqltbcw1nl6jid2u2";
    public $HOST="bitgqltbcw1nl6jid2u2-mysql.services.clever-cloud.com";
    public $USER="uboe6mrf9gqq6mvo";
    public $PASSWORD="LZ55sk6B8o7IjVP5DyYM";

    private static function connnect() {
        $pdo = new PDO('mysql:host=bitgqltbcw1nl6jid2u2-mysql.services.clever-cloud.com;port=3306;dbname=bitgqltbcw1nl6jid2u2;charset=utf8mb4', 'uboe6mrf9gqq6mvo', 'LZ55sk6B8o7IjVP5DyYM');
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