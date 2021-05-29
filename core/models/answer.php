<?php 

class Answer extends Question{
    function __construct($pdo){
        $this->pdo = $pdo;
    }

    public function listAllAnswersByQuestionId($quesitonId){
        $statement = $this->pdo->prepare('SELECT * FROM `answer` LEFT JOIN `profile` ON answer.user_id = profile.user_id
                                            WHERE question_id = :question_id ORDER BY voteCount DESC ');
        $statement->bindParam(':question_id',$quesitonId);
        $statement->execute();
        
        $answers = $statement->fetchAll(PDO::FETCH_OBJ);

        // Generate List Answers
        forEach ($answers as $answer) {
            ?>
                <div class="answer-detail-wrap">
                    <div class="answer-wrap-left">
                        <div class="voted-container">
                            <div class="up-vote-button">
                                <img src="../assets/image/upVote.png" class="up-vote-button-css">
                            </div>
                            <div class="voted-info">
                                <?php echo $answer->voteCount; ?>
                            </div>
                                <div class="down-vote-button">
                                <img src="../assets/image/downVote.png" class="down-vote-button-css">
                            </div>
                        </div>
                    </div>
                    <div class="answer-wrap-right">
                        <div class="answer-content" id="answer-content">
                            <?php  echo $answer->content ?>
                        </div>
                        <div class="post-by-container">
                            <div class="user-info-wrap">
                                <div class="post-post-on">
                                    answered <?php echo $answer->postOn; ?>
                                </div>
                                <div class="user-detail-info-wrap">
                                    <div class="user-info-logo">
                                        <img src="<?php echo $answer->profilePic; ?>" class="user-info-profile-pic">
                                    </div>
                                    <div class="detail-info-container">
                                        <div class="user-info-name">
                                            <?php echo $answer->firstName.' '.$answer->lastName; ?>
                                        </div>
                                        <div class="achieve-info">
                                            <div class="total-vote-wrap">
                                                <img src="../assets/image/dotGrey.png" class="achieve-logo-css">
                                                <div class="total-amount">12</div>
                                            </div>
                                            <div class="total-answer-wrap">
                                                <img src="../assets/image/dotGreen.png" class="achieve-logo-css">
                                                <div class="total-amount">23</div>
                                            </div>
                                            <div class="total-spam-wrap">
                                                <img src="../assets/image/dotRed.png" class="achieve-logo-css">
                                                <div class="total-amount">2</div>
                                            </div>
                                        </div>
                                    </div> 
                                </div> 
                            </div>
                        </div>
                    </div>
                </div>                       
            <?php
        }
    }

}
?>