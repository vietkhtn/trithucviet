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


    public function getUserById($userId) {
        $statement = $this->pdo->prepare('SELECT * FROM users WHERE user_id = :userId');
        $statement->bindParam(':userId', $userId, PDO::PARAM_STR);
        $statement->execute();
        return $statement->fetch(PDO::FETCH_OBJ);
    }
    public function getAllUser() {
        $statement = $this->pdo->prepare('SELECT * FROM users');
        $statement->execute();
        return $statement->fetchAll(PDO::FETCH_OBJ);
    }

    public function getAllPost() {
        $statement = $this->pdo->prepare('SELECT * FROM question');
        $statement->execute();
        return $statement->fetchAll(PDO::FETCH_OBJ);
    }

    public function getAllAnswer() {
        $statement = $this->pdo->prepare('SELECT * FROM answer');
        $statement->execute();
        return $statement->fetchAll(PDO::FETCH_OBJ);
    }

    public function deleteUser($userId) {
        $statement = $this->pdo->prepare('DELETE FROM users WHERE user_id = :userId');
        $statement->bindParam(':userId', $userId, PDO::PARAM_STR);
        $statement->execute();
        $statement->fetch(PDO::FETCH_OBJ);
    }

    public function setRoleUser($userId, $role) {
        $statement = $this->pdo->prepare('UPDATE users SET role = :role WHERE user_id = :userId');
        $statement->bindParam(':role', $role, PDO::PARAM_STR);
        $statement->bindParam(':userId', $userId, PDO::PARAM_STR);
        $statement->execute();
        $statement->fetch(PDO::FETCH_OBJ);
    }

    public function setStatusUser($userId, $status) {
        $statement = $this->pdo->prepare('UPDATE users SET status = :status WHERE user_id = :userId');
        $statement->bindParam(':status', $status, PDO::PARAM_STR);
        $statement->bindParam(':userId', $userId, PDO::PARAM_STR);
        $statement->execute();
        $statement->fetch(PDO::FETCH_OBJ);
    }

    public function getPostById($postId) {
        $statement = $this->pdo->prepare('SELECT * FROM question WHERE question_id = :postId');
        $statement->bindParam(':postId', $postId, PDO::PARAM_STR);
        $statement->execute();
        return $statement->fetch(PDO::FETCH_OBJ);
    }

    public function deletePost($postId) {

        //detele answer
        $statement = $this->pdo->prepare('DELETE FROM answer WHERE question_id = :postId');
        $statement->bindParam(':postId', $postId, PDO::PARAM_STR);
        $statement->execute();
        $statement->fetch(PDO::FETCH_OBJ);

        //delete question
        $statement = $this->pdo->prepare('DELETE FROM question WHERE question_id = :postId');
        $statement->bindParam(':postId', $postId, PDO::PARAM_STR);
        $statement->execute();
        $statement->fetch(PDO::FETCH_OBJ);

        
    }

    public function approvePost($postId) {
        $statement = $this->pdo->prepare('UPDATE question SET isSpam = 0 WHERE question_id = :postId');
        $statement->bindParam(':postId', $postId, PDO::PARAM_STR);
        $statement->execute();
        $statement->fetch(PDO::FETCH_OBJ);     
    }


    public function getAnswerById($answerId) {
        $statement = $this->pdo->prepare('SELECT * FROM answer WHERE answer_id = :answerId');
        $statement->bindParam(':answerId', $answerId, PDO::PARAM_STR);
        $statement->execute();
        return $statement->fetch(PDO::FETCH_OBJ);
    }

    public function deleteAnswer($answerId) {

        //detele answer
        $statement = $this->pdo->prepare('DELETE FROM answer WHERE answer_id = :answerId');
        $statement->bindParam(':answerId', $answerId, PDO::PARAM_STR);
        $statement->execute();
        $statement->fetch(PDO::FETCH_OBJ);
    }

    public function approveAnswer($answerId) {
        $statement = $this->pdo->prepare('UPDATE answer SET isSpam = 0 WHERE answer_id = :answerId');
        $statement->bindParam(':answerId', $answerId, PDO::PARAM_STR);
        $statement->execute();
        $statement->fetch(PDO::FETCH_OBJ);     
    }


}

?>