<?php 
require_once '../controllers/questionDetailController.php';

$old = '[{"value": "sadfasdf"}, {"value": "adviet"}]';
var_dump($old);

$new = str_replace('\"', '\\"', $old);
var_dump($new);

?>


<script type="text/javascript">
    let userId = '<?php echo $questionData->user_id; ?>';
    let questionId = '<?php echo $questionId?>'
</script>

<div class="content-wrap">
    <!-- Quesiton Header -->
    <div class="question-overview-wrap">
        <div class="question-title"><?php echo $questionData->title; ?></div>
        <div class="question-post-on">Asked: <?php echo $questionData->postOn;?></div>
    </div>
    <!-- Question Content -->
    <div class="question-detail-wrap">
        <div class="content-wrap-left">
            <div class="question-content-container">
                <div class="voted-container">
                    <div class="up-vote-button">
                        <img src="../assets/image/upVote.png" class="up-vote-button-css">
                    </div>
                    <div class="voted-info">
                        <?php echo $questionData->voteCount; ?>
                    </div>
                    <div class="down-vote-button">
                        <img src="../assets/image/downVote.png" class="down-vote-button-css">
                    </div>
                </div>
                <div class="question-content">
                    <div class="content-text-wrap">
                        <?php echo $questionData->content; ?>
                    </div>
                    <div class="list-tag-wrap">
                        <div id="tag-space-container" class="tag-space-container">
                            <?php   
                                $listTags = explode (",", $questionData->tags);
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
                    <!-- Asked by -->
                    <div class="user-asked-wrap">
                        <div class="post-by-container">
                            <div class="user-info-wrap">
                                <div class="post-post-on">
                                    asked <?php echo $questionData->postOn; ?>
                                </div>
                                <div class="user-detail-info-wrap">
                                    <div class="user-info-logo">
                                        <img src="<?php echo $questionData->profilePic; ?>" class="user-info-profile-pic">
                                    </div>
                                    <div class="detail-info-container">
                                        <div class="user-info-name">
                                            <?php echo $questionData->firstName.' '.$questionData->lastName; ?>
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
            </div>
            <!-- Answers -->
            <div class="answer-count"><?php echo $questionData->answerCount; ?> Answer</div>
            <div class="list-answer-wrap">
                <div class="list-answer">
                    <?php $answers = $loadFromAnswer->listAllAnswersByQuestionId($questionData->question_id); 
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
                    ?>
                </div>
            </div>
            <!-- List Answer -->
            <!-- Your answers -->
            <div class="your-answer-title">Your Answer</div>
            <div class="your-answer-wrap">
                <form class="edit-answer-bar">
                        <button type="button" data-cmd="bold" class="edit-content-button-css">
                            <i class="fas fa-bold"></i>
                        </button>
                        <button type="button" data-cmd="italic" class="edit-content-button-css">
                            <i class="fas fa-italic"></i>
                        </button>
                        <button type="button" data-cmd="underline" class="edit-content-button-css">
                            <i class="fas fa-underline"></i>
                        </button>
                        <button type="button" data-cmd="justifyLeft" class="edit-content-button-css">
                            <i class="fas fa-align-left"></i>
                        </button>
                        <button type="button" data-cmd="justifyCenter" class="edit-content-button-css">
                            <i class="fas fa-align-center"></i>
                        </button>
                        <button type="button" data-cmd="justifyFull" class="edit-content-button-css">
                            <i class="fas fa-align-justify"></i>
                        </button>
                        <button type="button" data-cmd="justifyRight" class="edit-content-button-css">
                            <i class="fas fa-align-right"></i>
                        </button>
                        <button type="button" data-cmd="insertOrderedList" class="edit-content-button-css">
                            <i class="fas fa-list-ol"></i>
                        </button>
                        <button type="button" data-cmd="insertUnorderedList" class="edit-content-button-css">
                            <i class="fas fa-list-ul"></i>
                        </button>
                        <button type="button" data-cmd="insertImage" class="edit-content-button-css">
                            <i class="fas fa-images"></i>
                        </button>
                        <div class="imageUploadFile" style="display:none">
                            <input type="file" id="uploadImage">
                        </div>
                        <button type="button" data-cmd="createLink" class="edit-content-button-css">
                            <i class="fas fa-link"></i>
                        </button>
                        <button type="button" data-cmd="showCode" name="active" class="edit-content-button-css">
                        <i class="fas fa-code"></i>
                        </button>
                    </form>
                <iframe name="postText" id="postText" class="answer align-middle"></iframe>
                <!-- Post your answer button -->
                <div class="answer-button-wrap">
                    <div class="answer-button">Post your answer</div>
                </div>
            </div>
        </div>
        <div class="content-wrap-right">
            <div class="our-regulation-wrap">
                <div class="our-regulation-content">
                        <div class="guest-regulation">
                            <div class="guest-regulation title">Guest Regulation</div>
                            <div class="guest-regulation content">
                                <div class="regulation-child-wrap">
                                    <img src="../assets/image/guestUser.png" class="logo-regulation">
                                    <div class="regulation-text">
                                        We are biggest forum about knownledge and everything. Join us and be smart.
                                    </div>
                                </div>
                               
                                <div class="regulation-child-wrap">
                                    <img src="../assets/image/guestUser.png" class="logo-regulation">
                                    <div class="regulation-text">
                                        You should register an account. We all wanna open mind. It's free, bro.
                                    </div>
                                </div>
                        </div>
                    <div class="question-reulation">
                        <div class="question-regulation title">Question Regulation</div>
                            <div class="question-regulation content">
                                <div class="regulation-child-wrap">
                                    <img src="../assets/image/question.png" class="logo-regulation">
                                    <div class="regulation-text">
                                        Create a question with brief and clear title.
                                    </div>
                                </div>
                               
                                <div class="regulation-child-wrap">
                                    <img src="../assets/image/question.png" class="logo-regulation">
                                    <div class="regulation-text">
                                        Before asking, try to search. Maybe someone ask the same question before.
                                    </div>
                                </div>
                           
                                <div class="regulation-child-wrap">
                                    <img src="../assets/image/question.png" class="logo-regulation">
                                    <div class="regulation-text">
                                        Hey, don't ask an obsense question. We are intellectual people, right ?
                                    </div>
                                </div>
                            </div>
                        </div>
                    <div class="answer-regulation">
                        <div class="answer-regulation title">Answer Regulation</div>
                            <div class="answer-regulation content">

                                <div class="regulation-child-wrap">
                                    <img src="../assets/image/faq.png" class="logo-regulation">
                                    <div class="regulation-text">
                                        If you see any question that you know, give us an advice. We are very pleasure.
                                    </div>
                                </div>
                                

                                <div class="regulation-child-wrap">
                                    <img src="../assets/image/faq.png" class="logo-regulation">
                                    <div class="regulation-text">
                                        Hey, don't troll. We need your advice, not joke. Thanks bro.
                                    </div>    
                                </div>                                           
                            </div>
                        </div>
                </div>
            </div>
            <div class="other-questions">
                <div class="other-question-title">Recent Questions</div>
                <div class="other-question-list-wrap">
                    <?php $loadFromQuestion->recentQuestions(10); ?>
                </div>
            </div>
        </div>
    </div>
</div>
