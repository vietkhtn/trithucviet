<?php
    require_once '../controllers/logInController.php';
    require_once '../controllers/profileController.php';

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
    <link rel="stylesheet" href="../assets/css/create-post.css">
    <link rel="stylesheet" href="../assets/css/post-timeline.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
    <script src="..\assets\js\jquery.js"></script>
    <script src="..\assets\js\profile.js"></script>
    <script src="..\assets\js\post.js"></script>
    <title><?php echo ''.$profileData->firstName.' '.$profileData->lastName.'' ?></title>
</head>
<body>
    <header class="">
        <div class="top-bar">
            <?php require "top-nav-bar-user.php"; ?>
        </div>
    </header>

    <main>
        <div class="main-area">
            <div class="profile-left-wrap-profile">
            </div>
            <div class="profile-right-wrap">
                <?php 
                    require "../views/profile.php"; 
                ?>
            </div>
        
        </div>
    <div class="top-box-show"></div>
    <div id="adv-dem"></div>
    </main>
</body>

</html>
