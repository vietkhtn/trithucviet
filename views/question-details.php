<?php 
require_once '../controllers/questionDetailController.php'

?>


<script type="text/javascript">
    let userId = '<?php echo $user_id?>';
    // Auto adjust iframe height depend on content typing
    function resizeFrameHeight() {
        document.getElementById('questionText').contentWindow.document.designMode = "on";       
        document.getElementById('questionText').contentWindow.document.onkeyup = function(event) {
            var frm = document.getElementById('questionText');
            frm.style.overflow = 'hidden';
            frm.style.height = questionText.document.body.scrollHeight + 'px';
        }    
    }  
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
                </div>
            </div>
            <!-- Answers -->
            <div class="answer-count"><?php echo $questionData->answerCount; ?> Answer</div>
            <div class="list-answer-wrap">
                <div class="list-answer">

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
                <iframe name="answerText" id="answerText" class="answer align-middle" onload="resizeFrameHeight()"></iframe>
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
