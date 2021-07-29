<?php
    require_once '../controllers/logInController.php';
    require_once '../controllers/profileController.php';
    require_once '../controllers/questionDetailController.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../assets/css/signup.css">
    <link rel="stylesheet" href="../assets/css/login.css">
    <link rel="stylesheet" href="../assets/css/profile.css">
    <link rel="stylesheet" href="../assets/css/top-bar.css">
    <link rel="stylesheet" href="../assets/css/side-bar.css">
    <link rel="stylesheet" href="../assets/css/question-details.css">
    <link rel="stylesheet" href="../assets/css/user-info-card.css">
    <link rel="stylesheet" href="../assets/css/create-post.css">
    <link rel="stylesheet" href="../assets/css/post-timeline.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
    <script src="..\assets\js\jquery.js"></script>
    <script src="..\assets\js\profile.js"></script>
    <script src="..\assets\js\postAnswer.js"></script>
    <script src="..\assets\js\editPostArea.js"></script>

    <?php if(isset($profileId)) {
        if($profileId == $user_id) {
    ?>
        <title><?php echo ''.$profileData->firstName.' '.$profileData->lastName.'' ?></title>
    <?php } else {?>
        <title>Tri Thuc Viet</title>
    <?php }
    } else{?>
        <title>Tri Thuc Viet</title>
    <?php } ?>
    

</head>
<body>
    <header class="">
        <div class="top-bar">
        <?php if(isset($profileId)) {
            if($profileId == $user_id) {
                require "top-nav-bar-user.php"; 
            }
        }
        else{
            require "top-nav-bar-guest.php"; 
        }
        ?>
        </div>
    </header>

    <main>
        <div class="main-area">
            <div class="profile-left-wrap">
                <?php require "side-bar.php"; ?>
            </div>
            <div class="profile-right-wrap">
                <?php 
                    require "../views/question-details.php"; 
                ?>
            </div>
        </div>
    <div class="top-box-show"></div>
    <div id="adv-dem"></div>
    </main>
</body>

</html>
