<?php 

include '../load.php';
include '../../connect/login.php';

$user_id = login::isLoggedIn();

// Store CoverPic to DB
if (isset($_POST['imageUrl'])){
    $imageUrl = $loadFromUser->checkInput($_POST['imageUrl']);
    $user_id = $loadFromUser->checkInput($_POST['userId']);
    
    $loadFromUser->update('profile', $user_id, array('coverPic' => $imageUrl));

}else{

}

// Get coverPic from DB
    echo $loadFromProfle->coverPicByUserId($user_id);
?>