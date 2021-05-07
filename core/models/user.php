<?php 
class User {
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

    public function checkEmail($emailOrMobile){
        $statement = $this->pdo->prepare("SELECT email FROM users WHERE email = :email");
        $statement->bindParam(':email', $emailOrMobile, PDO::PARAM_STR);
        $statement->execute();
        $count = $statement->rowCount();
        if ($count > 0) {
            return true;
        }else {
            return false;
        }
    }

    public function checkMobile($emailOrMobile){
        $statement = $this->pdo->prepare("SELECT mobile FROM users WHERE mobile = :mobile");
        $statement->bindParam(':mobile', $emailOrMobile, PDO::PARAM_STR);
        $statement->execute();
        $count = $statement->rowCount();
        if ($count > 0) {
            return true;
        }else {
            return false;
        }
    }

    public function userIdByUsername($username) {
        $statement = $this->pdo->prepare('SELECT user_id FROM users WHERE userLink = :userName');
        $statement->bindParam(':userName', $username, PDO::PARAM_STR);
        $statement->execute();
        $user = $statement->fetch(PDO::FETCH_OBJ);
        return $user->user_id;
    }

    public function userLinkByUserId($userId) {
        $statement = $this->pdo->prepare('SELECT userLink FROM users WHERE user_id = :userId');
        $statement->bindParam(':userId', $userId, PDO::PARAM_STR);
        $statement->execute();
        $user = $statement->fetch(PDO::FETCH_OBJ);
        return $user->userLink;
    }

    public function create($table, $fields = array()) {
        $columns = implode(',', array_keys($fields)); // first-name, last-name, email,...
        $values = ':'.implode(', :', array_keys($fields)); // :firstname, :lastname,...
        $sql = "INSERT INTO {$table} ({$columns}) VALUES ({$values})"; // INSERT INTO users (first-name, last-name, email) VALUES (:firstname, :lastname, :email,...);
        
        // Binding varialble to keys 
        if ($statement = $this->pdo->prepare($sql)){
            foreach ($fields as $key => $data) {
                $statement->bindValue(':'.$key, $data);
            }
            $statement->execute();
            return $this->pdo->lastInsertId();
        }
    }

    public function userData($profileId) {
        $statement = $this->pdo->prepare('SELECT * FROM users LEFT JOIN profile ON users.user_id = profile.user_id WHERE users.user_id = :user_id');
        $statement->bindParam(':user_id', $profileId, PDO::PARAM_INT);
        $statement->execute();
        return $statement->fetch(PDO::FETCH_OBJ);
    }

    public function update($table, $userId, $fields = array()) {
        $columns = '';
        $i = 1;

        foreach ($fields as $name => $value){
            $columns .= "{$name} = :{$name}"; //coverPic = :coverPic
            // if mutiple field update, add comma between columns
            if($i < count($fields)){
                $columns .= ',';
            }
            $i++;
        }
        // Update Query
        $sql = "UPDATE {$table} SET {$columns} WHERE user_id = {$userId}";

        // Binding value to sql query
        if($statement = $this->pdo->prepare($sql)){
            foreach ($fields as $key =>$value){
                $statement->bindValue(':'.$key, $value);
            }
        }
        $statement->execute();
    }
}

?>