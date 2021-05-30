<?php 

require_once '../load.php';
require_once '../../connect/login.php';

$user_id = login::isLoggedIn();

//Store To DB
if (isset($_POST['imageUrl'])){
    $imageUrl = $loadFromUser->checkInput($_POST['imageUrl']);
    $user_id = $loadFromUser->checkInput($_POST['userId']);
    
    $loadFromUser->updateUserData('profile', $user_id, array('profilePic' => $imageUrl));

}else{

}

// Get profilePic from DB
    echo $loadFromProfle->profilePicByUserId($user_id);
?>