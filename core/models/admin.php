<?php 

class Admin extends Base{
    protected $pdo;

    function __construct($pdo) {
        $this->pdo = $pdo;
    }

    public function checkInput($variable){
        $variable = htmlspecialchars($variable);
        $variable = trim($variable);
        $variable = stripslashes($variable);
        return $variable; 
    }

    public function getAllUser() {
        $statement = $this->pdo->prepare(
            'SELECT *
            FROM users');
        $statement->execute();
        return $statement->fetchAll(PDO::FETCH_OBJ);
    }

    public function getAllPost() {
        $statement = $this->pdo->prepare(
            'SELECT *
            FROM question');
        $statement->execute();
        return $statement->fetchAll(PDO::FETCH_OBJ);
    }
}

?>