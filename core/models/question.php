<?php 
class Question extends User {

    function __construct($pdo) {
        $this->pdo = $pdo;
    }

    public function questionData($questionId) {
        $statement = $this->pdo->prepare('SELECT * FROM question WHERE question_id = :question_id');
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

        // List Quesitons in page
        forEach ($questions as $question) {
            ?>
                <div class="profile-timeline">
                    
                    <div class="news-feed-container">
                        <div class="news-feed-content">
                            <!-- Question Post Stat -->
                            <div class="stat-container">
                                <div class="stats">
                                    <div class="question-vote">
                                        <div class="vote-count-post"><?php echo $question->voteCount; ?></div>
                                        <div class="vote-count-label"></div>
                                    </div>
                                    <div class="question-answer">
                                        <div class="answer-count-post"><?php echo $question->answerCount; ?></div>
                                        <div class="answer-count-label"></div>
                                    </div>
                                    <div class="question-spam">
                                        <div class="spam-count-post"><?php echo $question->totalSpam; ?></div>
                                        <div class="spam-count-lable"></div>
                                    </div>
                                </div>
                            </div>
                            <!-- Question Post Content -->
                            <div class="news-feed-text">
                                <div class="nf-1">
                                    <div class="nf-1-left">
                                        <div class="nf-pro-name-time">
                                            <div class="nf-pro-name">
                                                <a href='<?php  echo ''.CONSTANT::BASE_URL_TEMPLATE.'master-layout.php?question='.$question->question_id; ?>' class="timeline-post-title">
                                                    <?php  echo $question->title; ?>
                                                </a>
                                            </div>
                                            <div class="nf-pro-privacy">
                                                <div class="nf-pro-time">
                                                    <?php echo $this->timeAgo($question->postOn); ?>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="nf-1-right"></div>
                                </div>
                                <div class="nf-2"></div>
                                <div class="nf-4" id="question-post-content">
                                    <?php  echo $question->content ?>
                                </div>
                                <div class="nf-5">
                                    <div id="tag-space-container" class="tag-space-container">
                                        <?php   
                                            $listTags = explode (",", $question->tags);
                                            forEach($listTags as $tag) {
                                                ?> 
                                                    <div class="tag-name-posted-wrapper">
                                                        <?php  echo $tag; ?>
                                                    </div>   
                                                <?php
                                            }
                                        ?>
                                    </div>
                                </div>
                            </div>                       
                        </div>
                        <div class="news-feed-photo">
                        
                        </div>
                    </div>
                </div>

            <?php
        }
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


    
    //trung
    public function getAllQuestionAndUser() {
        $statement = $this->pdo->prepare(
        'SELECT *
        FROM question, users,profile
        WHERE question.user_id = users.user_id and users.user_id = profile.user_id
        ORDER BY question.postOn'); // Get lasted question posts
        $statement->execute();

        $questions = $statement->fetchAll(PDO::FETCH_OBJ);

        return $questions;
    }

    public function getCountQuestions() {
        $statement = $this->pdo->prepare(
        'SELECT count(*) AS `count`
        FROM question'); // Get lasted question posts
        $statement->execute();

        $countQuestion = $statement->fetch(PDO::FETCH_ASSOC);

        return $countQuestion;
    }

}
?>