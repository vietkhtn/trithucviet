<?php
    include '../controllers/profileController.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../assets/css/login.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
    <title><?php echo ''.$profileData->firstName.' '.$profileData->lastName.'' ?></title>
    <script src="..\assets\js\jquery.js"></script>
    <script src="..\assets\js\profile.js"></script>
</head>
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
<body>
    <header class="">
        <div class="top-bar">
            <!-- Top Left -->
            <div class="top-left-part">
                <!-- Logo -->
                <a href="index.php"><img class="img-logo"src="../assets/image/stackoverflow.png"/></a>
                <!-- Search Bar-->
                <div class="search-wrap">
                    <label clas="name-label">
                        <svg class="icon icon-user">
                            <use xlink:href="#icon-user"></use>
                        </svg>
                        <input type="text" name="main-search" id="main-search" placeholder="Search...">
                    </label>
                    <svg class="spritesheet">
                        <symbol id="icon-user" viewBox="0 0 32 32">
                            <title>user</title>
                            <path d="M18 16.5l-5.14-5.18h-.35a7 7 0 10-1.19 1.19v.35L16.5 18l1.5-1.5zM12 7A5 5 0 112 7a5 5 0 0110 0z"></path>
                        </symbol>
                    </svg>
                </div>
                <!-- Search show -->
                <div id="search-show"></div>
            </div>
            <!-- Top Right -->
            <div class="top-right-part">
                <!-- Name Wrap -->
                <div class="topic-name-wrap">
                    <a href="profile.php?username=<?php echo $profileData->userLink ?>" class="top-pic-name">
                        <!-- User Image -->
                        <div class="user-image"><img src="<?php echo $profileData->profilePic ?>" class="user-image-pic" ></div>
                        <!-- User Name -->
                        <div class="user-name top-css topic-name"><?php echo $profileData->firstName ?></div>
                    </a>
                </div>
                <!-- Notification Icon -->
                <div class="top-iconNotification top-css">
                    <svg aria-hidden="true" class="svg-icon iconInbox notification-svg" width="20" height="18" viewBox="0 0 20 18">
                        <path class="cls-1" d="M4.63 1h10.56a2 2 0 011.94 1.35L20 10.79V15a2 2 0 01-2 2H2a2 2 0 01-2-2v-4.21l2.78-8.44c.25-.8 1-1.36 1.85-1.35zm8.28 12l2-2h2.95l-2.44-7.32a1 1 0 00-.95-.68H5.35a1 1 0 00-.95.68L1.96 11h2.95l2 2h6z"></path>
                    </svg>
                    <!-- Notification List -->
                    <div class="notification-list-wrap">
                        <ul>

                        </ul>
                    </div>
                </div>
                <!-- Help Icon -->
                <div class="top-iconHelp top-css">
                    <svg aria-hidden="true" class="svg-icon iconHelp help-svg" width="18" height="18" viewBox="0 0 18 18">
                        <path class="cls-1" d="M9 1a8 8 0 100 16A8 8 0 009 1zm.81 12.13c-.02.71-.55 1.15-1.24 1.13-.66-.02-1.17-.49-1.15-1.2.02-.72.56-1.18 1.22-1.16.7.03 1.2.51 1.17 1.23zM11.77 8c-.3.34-.65.65-1.02.91l-.53.37c-.26.2-.42.43-.5.69a4 4 0 00-.09.75c0 .05-.03.16-.18.16H7.88c-.16 0-.18-.1-.18-.15.03-.66.12-1.21.4-1.66.4-.49.88-.9 1.43-1.22.16-.12.28-.25.38-.39a1.34 1.34 0 00.02-1.71c-.24-.31-.51-.46-1.03-.46-.51 0-.8.26-1.02.6-.21.33-.18.73-.18 1.1H5.75c0-1.38.35-2.25 1.1-2.76.52-.35 1.17-.5 1.93-.5 1 0 1.79.18 2.49.71.64.5.98 1.18.98 2.12 0 .57-.2 1.05-.48 1.44z"></path>
                    </svg>
                </div>
            </div>
        </div>
    </header>
    <main>
        <div class="main-area">
            <div class="profile-left-wrap">
                
            </div>
            <div class="profile-right-wrap">
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
                    <div class="cover-bottom-part"> 
                        <div class="timeline-button align-middle cover-button-css" data-userid='<?php echo $user_id; ?>' data-profileid='<?php echo $profileId ?>'>Timeline</div>
                        <div class="about-button align-middle cover-button-css" data-userid='<?php echo $user_id; ?>' data-profileid='<?php echo $profileId ?>'>About</div>
                        <div class="friends-button align-middle cover-button-css" data-userid='<?php echo $user_id; ?>' data-profileid='<?php echo $profileId ?>'>Friends</div>
                        <div class="ph0tos-button align-middle cover-button-css" data-userid='<?php echo $user_id; ?>' data-profileid='<?php echo $profileId ?>'>Photos</div>
                    </div>
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
                                <div class="profile-questtion-post" id="question-post">
                                    <div class="questions-wrap">
                                        <div class="question-top" style="background-image: url(https://cdn.sstatic.net/Img/ask/background.svg?v=2e9a8205b368); background-position:left" ></div>
                                    </div>
                                    <div class="question-med">
                                        <div class="question-prof">
                                            <div class="icon-ask"><img src="<?php echo $profileData->profilePic ?>" class="my-icon-ask"></div>
                                        </div>
                                        <div class="question-prof-textarea">
                                            <label for="questionTitle"><b>Title</b></label>
                                            <div class="title-description-text">Be specific and imagine you’re asking a question to another person</div>
                                            <input name="questionTitle" id="questionTitle" class="question-title align-middle"></input>
                                            <label for="questionTags"><b>Tags</b></label>
                                            <div class="tags-description-text">Add up to 5 tags to describe what your question is about</div>
                                            <input name="questionTags" id="questionTags" class="question-tags align-middle"></input>
                                            <div id="tag-space-container" class="tag-space-container">

                                            </div>
                                            <label for="questionText"><b>Body</b></label>
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
                                            <iframe name="questionText" id="questionText" class="question align-middle" onload="resizeFrameHeight()"></iframe>
                                        </div>
                                    </div>
                                    <div class="ask-button-wrap">
                                        <div class="ask-button">Post your question</div>
                                    </div>
                                </div>
                            <?php } ?>

                            <div class="ptaf-wrap">
                                <?php $loadFromQuestion->postQuestionData($user_id, $profileId, 20) ?>
                            </div>
                        </div>
                    </div>
            </div>
        </div>
    </div>
    <div class="top-box-show"></div>
    <div id="adv-dem"></div>
    </main>
</body>
</html>