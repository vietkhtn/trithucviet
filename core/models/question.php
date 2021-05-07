<?php 
// include 'Base.php';

class Question extends User {

    function __construct($pdo) {
        $this->pdo = $pdo;
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

        forEach ($questions as $question) {
            ?>
                <div class="profile-timeline">
                    <div class="news-feed-comp">
                        <div class="news-feed-text">
                            <div class="nf-1">
                                <div class="nf-1-left">
                                    <div class="nf-pro-name-time">
                                        <div class="nf-pro-name">
                                            <div class="timeline-post-title">
                                                <?php  echo $question->title; ?>
                                            </div>
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
                        <div class="news-feed-photo">
                        
                        </div>
                    </div>
                </div>

            <?php
        }
    }

}

?>