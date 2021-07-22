<?php 
class DB {

    // public $DB_NAME="bjhmz1rb32kuq60eo0v4";
    // public $HOST="bjhmz1rb32kuq60eo0v4-mysql.services.clever-cloud.com";
    // public $USER="uwajkb81wg9v9z6b";
    // public $PASSWORD="mp42r1Xetr3wuumJVeCj";
    public $DB_NAME="stackoverflow";
    public $HOST="127.0.0.1";
    public $USER="root";
    public $PASSWORD="Phamvantrinh99";

    private static function connnect() {
        $pdo = new PDO("mysql:host=$HOST;port=3306;dbname=$DB_NAME;charset=utf8mb4', '$USER', '$PASSWORD'");
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