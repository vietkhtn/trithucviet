<?php 

class User extends Base{
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

    public function userData($profileId) {
        $statement = $this->pdo->prepare('SELECT * FROM users LEFT JOIN profile ON users.user_id = profile.user_id WHERE users.user_id = :user_id');
        $statement->bindParam(':user_id', $profileId, PDO::PARAM_INT);
        $statement->execute();
        return $statement->fetch(PDO::FETCH_OBJ);
    }

    public function updateUserData($table, $userId, $fields = array()) {
        $columns = '';
        $i = 1;

        if ($seconds <= 60){
            if($seconds == 0){
                return 'posted now';
            }else{
                return ''.$seconds.' seconds ago';
            }
        }else if($minutes <= 60){
            return ''.$minutes.' minutes ago';
        }else if($hours <= 24){
            return ''.$hours.' hours ago';
        }else if ($months <= 24){
            return ''.date('M j', $time);
        }else{
            return ''.date('j M Y', $time);
        }
           
    }
}

?>