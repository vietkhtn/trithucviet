<?php 

require_once '../connect/login.php';
require_once '../core/load.php';

session_start();

if (login::isLoggedIn()){
    $user_id = login::isLoggedIn();
}else {
    header('Location: sign-up.php');
}


if (isset($_GET['username']) == true && empty($_GET['username']) == false){

    $username = $loadFromUser->checkInput($_GET['username']);

    $_SESSION['username'] = $username;

    $profileId = $loadFromUser->userIdByUsername($username);

    $profileData = $loadFromUser->userData($profileId);
    
    $userData = $loadFromUser->userData($user_id);
}

?>