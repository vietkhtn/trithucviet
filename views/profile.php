<?php
    // require_once '../controllers/profileController.php';
?>

<script type="text/javascript">
    let userId = '<?php echo $user_id?>';
    // Auto adjust iframe height depend on content typing
    function resizeFrameHeight() {
        document.getElementById('postText').contentWindow.document.designMode = "on";       
        document.getElementById('postText').contentWindow.document.onkeyup = function(event) {
            var frm = document.getElementById('postText');
            frm.style.overflow = 'hidden';
            frm.style.height = postText.document.body.scrollHeight + 'px';
        }    
    }  
</script>

<div class="profile-cover-wrap" style="background-image: url(<?php echo $profileData->coverPic; ?>)">
                        <div class="upload-cover-opt-wrap">
                            <!-- Only user cant add/ipdate his cover photo -->
                            <?php if ($profileId == $user_id) {?>
                                <div class="add-cover-photo">
                                    <img src="..\assets\image\profile\uploadPhotoIcon.png" class="upload-photo-logo">
                                    <div class="add-cover text">Add a cover photo</div>
                                </div>
                            <!-- If another user, just view -->
                            <?php }else {?>
                                <div class="dont-add-cover-photo"></div>
                            <?php }?>
                            <!-- Add cover photo -->
                            <div class="add-cover-options">
                                <div class="select-cover-photo">Select Photo</div>  
                                <div class="file-upload">
                                    <label for="cover-photo-upload" class="file-upload-label">Upload Photo</label>
                                    <input type="file" name="cover-photo-file-upload" id="cover-photo-upload" class="upload-cover-photo">
                                </div> 
                            </div>
                        </div>
                    <div class="profile-photo-rest-wrap">
                        </div>
                        <div class="profile-pic-name">
                            <div class="profile-pic">
                                <?php if($profileId == $user_id) {?>
                                    <div class="profile-pic-upload">
                                        <div class="add-profile-photo">
                                            <img src="..\assets\image\profile\uploadPhotoIcon.png" class="upload-profile-pic-logo">
                                            <div class="file-upload">
                                                <label for="profile-photo-upload" class="profile-upload-label">Update</label>
                                                <input type="file" name="profile-photo-file-upload" id="profile-photo-upload" class="upload-profile-photo">
                                            </div> 
                                        </div>
                                    </div> 
                                    <!-- If another user, just view -->
                                    <?php }else {?>
                                        <div class="dont-add-profile-photo"></div>
                                    <?php }?>
                                <img src="<?php echo $profileData->profilePic ?>" alt="" class='profile-pic-me'>
                            </div>
                            <div class="profile-name">
                                <?php echo ''.$profileData->firstName.' '.$profileData->lastName.'' ?>
                            </div>
                        </div>
                    </div>
                    <!-- Cover bottom part -->
                    <div class="cover-bottom-part"> 
                        <div class="timeline-button align-middle cover-button-css" data-userid='<?php echo $user_id; ?>' data-profileid='<?php echo $profileId ?>'>Questions</div>
                        <div class="about-button align-middle cover-button-css" data-userid='<?php echo $user_id; ?>' data-profileid='<?php echo $profileId ?>'>Tags</div>
                        <div class="friends-button align-middle cover-button-css" data-userid='<?php echo $user_id; ?>' data-profileid='<?php echo $profileId ?>'>Users</div>
                    </div>
                    <!-- Intro Info -->
                    <div class="bio-timeline">
                        <div class="bio-wrap">
                            <div class="bio-intro">
                                <div class="intro-wrap">
                                    <img src="../assets/image/intro.png" class="intro-icon-css">
                                    <div>Intro</div>
                                </div>
                                <div class="intro-icon-text">
                                    <img src="../assets/image/addProfile.png" class="add-profile-css">
                                    <div class="add-profile-message">Add profile to tell people more yourself</div>
                                    <div class="add-profile-click"><a href="http://">Add Profile</a></div>
                                </div>
                                <div class="profile-details">
                                    <div class="profile-1">
                                        <img src="../assets/image/lastOnline.png" class="intro-icon-css">
                                        <div class="live-text">Last Online <span class="live-text-css blue">10h</span></div>
                                    </div>
                                    <div class="profile-2">
                                        <img src="../assets/image/age.png" class="intro-icon-css">
                                        <div class="follow-text">Stack Over Age <span class="follow-text-css blue">3 years</span></div>
                                    </div>
                                    <div class="profile-3">
                                        <img src="../assets/image/article.png" class="intro-icon-css">
                                        <div class="follow-text">Articles <span class="follow-text-css blue">24</span></div>
                                    </div>
                                    <div class="profile-4">
                                        <img src="../assets/image/follow.png" class="intro-icon-css">
                                        <div class="follow-text">Followers <span class="follow-text-css blue">650</span></div>
                                    </div>
                                    <div class="profile-5">
                                        <img src="../assets/image/followBy.png" class="intro-icon-css">
                                        <div class="follow-text">Voted <span class="follow-text-css blue">231245</span></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="status-time-wrap">
                            <!--Only user can post a questions -->
                            <?php if($profileId == $user_id) { ?> 
                                <div class="ask-question-button">Ask Question</div>
                                <div class="profile-question-post" id="question-post">
                                    <div class="questions-wrap">
                                        <div class="question-top" style="background-image: url(https://cdn.sstatic.net/Img/ask/background.svg?v=2e9a8205b368); background-position:left" ></div>
                                    </div>
                                    <div class="question-med">
                                        <!-- user profile icon -->
                                        <div class="question-prof">
                                            <div class="icon-ask"><img src="<?php echo $profileData->profilePic ?>" class="my-icon-ask"></div>
                                        </div>
                                        <!-- Edit question area -->
                                        <div class="question-prof-textarea">
                                            <label for="questionTitle"><b>Title</b></label>
                                            <div class="title-description-text">Be specific and imagine you’re asking a question to another person</div>
                                            <input name="questionTitle" id="questionTitle" class="question-title align-middle" placeholder=" e.g. Is there an R function for finding the index of an element in a vector?"></input>
                                            <label for="questionTags"><b>Tags</b></label>
                                            <div class="tags-description-text">Add up to 5 tags to describe what your question is about</div>
                                            <input name="questionTags" id="questionTags" class="question-tags align-middle" placeholder=" e.g. (windows php postgresql)"></input>
                                            <div id="tag-space-container" class="tag-space-container">

                                            </div>
                                            <label for="postText"><b>Body</b></label>
                                            <div class="body-description-text">Include all the information someone would need to answer your question</div>
                                            <form class="edit-question-bar">
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
                                            <iframe name="postText" id="postText" class="question align-middle" onload="resizeFrameHeight()"></iframe>
                                            <!-- Post your question button -->
                                            <div class="ask-button-wrap">
                                                <div class="ask-button">Post your question</div>
                                            </div>
                                        </div>
                                    </div>                               
                                </div>
                            <?php } ?>

                            <div class="ptaf-wrap">
                                <?php $loadFromQuestion->postQuestionData($user_id, $profileId, 20) ?>
                            </div>
                        </div>
                    </div>