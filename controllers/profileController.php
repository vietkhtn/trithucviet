<?php 

include '../connect/login.php';
include '../core/load.php';

if (login::isLoggedIn()){
    $user_id = login::isLoggedIn();
}else {
    header('Location: sign-up.php');
}

//
if (isset($_GET['username']) == true && empty($_GET['username']) == false){
    $username = $loadFromUser->checkInput($_GET['username']);

    $profileId = $loadFromUser->userIdByUsername($username);

    $profileData = $loadFromUser->userData($profileId);
    
    $userData = $loadFromUser->userData($user_id);
}
?>