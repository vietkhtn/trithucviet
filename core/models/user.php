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

    //trung
    public function getAllUser() {
        $statement = $this->pdo->prepare(
            'SELECT users.user_id, users.first_name, users.last_name, profile.religion, profile.profilePic,count(question.question_id) AS countQuestion, group_concat(question.tags) AS tags
            FROM users, profile, question
            WHERE users.user_id = profile.user_id and question.user_id = users.user_id
            GROUP BY users.user_id;');
        $statement->execute();
        return $statement->fetchAll(PDO::FETCH_OBJ);
    }

    public function get1UserByName($username) {
        $text = "%$username%";
        $statement = $this->pdo->prepare(
            'SELECT users.user_id, users.first_name, users.last_name,profile.religion, profile.profilePic,count(question.question_id) AS countQuestion , group_concat(question.tags) AS tags
            FROM users, profile, question
            WHERE (users.first_name LIKE :searchText OR users.last_name LIKE :searchText)  AND users.user_id = profile.user_id and question.user_id = users.user_id 
            GROUP BY users.user_id;');
        $statement->bindParam(':searchText',$text, PDO::PARAM_STR);
        $statement->execute();
        return $statement->fetchAll(PDO::FETCH_OBJ);
    }
}

?>