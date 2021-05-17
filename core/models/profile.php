<?php 
// include 'Base.php';

class Profile extends Base{
    protected $pdo;

    function __construct($pdo) {
        $this->pdo = $pdo;
    }

    public function coverPicByUserId($userId) {
        $statement = $this->pdo->prepare('SELECT coverPic FROM profile WHERE user_id = :userId');
        $statement->bindParam(':userId', $userId, PDO::PARAM_STR);
        $statement->execute();
        $profile = $statement->fetch(PDO::FETCH_OBJ);
        return $profile->coverPic;
    }

    public function profilePicByUserId($userId) {
        $statement = $this->pdo->prepare('SELECT profilePic FROM profile WHERE user_id = :userId');
        $statement->bindParam(':userId', $userId, PDO::PARAM_STR);
        $statement->execute();
        $profile = $statement->fetch(PDO::FETCH_OBJ);
        return $profile->profilePic;
    }
}

?>