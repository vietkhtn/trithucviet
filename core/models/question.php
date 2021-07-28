<?php 
class Question extends User {

    function __construct($pdo) {
        $this->pdo = $pdo;
    }

    public function questionData($questionId) {
        $statement = $this->pdo->prepare('SELECT * FROM question LEFT JOIN `profile` ON question.user_id = profile.user_id
                                            WHERE question_id = :question_id');
        $statement->bindParam(':question_id', $questionId, PDO::PARAM_INT);
        $statement->execute();
        return $statement->fetch(PDO::FETCH_OBJ);
    }

    public function postQuestionData($userId, $profileId, $num) {
        $userData = $this->userData($userId);

        $statement = $this->pdo->prepare('SELECT * 
                                          FROM users LEFT JOIN profile ON users.user_id = profile.user_id 
                                                    LEFT JOIN question ON  question.user_id = users.user_id
                                          WHERE question.user_id = :user_id ORDER BY question.postOn DESC LIMIT :num'); // Get lasted question posts

        $statement->bindParam(':user_id', $profileId, PDO::PARAM_INT);
        $statement->bindParam(':num', $num, PDO::PARAM_INT);

        $statement->execute();
        $questions = $statement->fetchAll(PDO::FETCH_OBJ);

        return $questions;
    }


    public function recentQuestions($num) {

        $statement = $this->pdo->prepare('SELECT * FROM question ORDER BY question.postOn DESC LIMIT :num'); // Get lasted question posts

        $statement->bindParam(':num', $num, PDO::PARAM_INT);

        $statement->execute();
        $questions = $statement->fetchAll(PDO::FETCH_OBJ);

        // List Quesitons in page
        forEach ($questions as $question) {
            ?>
                <div class="question-row">
                    <div class="question-stat-lite-container">
                        <div class="question-voted-count-lite">
                            <?php echo $question->voteCount; ?>
                        </div>
                    </div>
                    <div class="question-title-lite-container">
                        <div class="question-title-lite">
                            <a href='<?php  echo ''.CONSTANT::BASE_URL_TEMPLATE.'master-layout.php?question='.$question->question_id; ?>' class="timeline-post-title">
                                <?php  echo $question->title; ?>
                            </a>
                        </div>
                    </div>
                </div>
            <?php
        }
    }

    public function updateQuestionData($table, $questionId, $fields = array()) {
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
        $sql = "UPDATE {$table} SET {$columns} WHERE question_id = {$questionId}";

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