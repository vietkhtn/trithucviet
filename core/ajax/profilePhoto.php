<?php 

include '../load.php';
include '../../connect/login.php';

$user_id = login::isLoggedIn();

if (isset($_POST['imageName'])){
    $imageName = $loadFromUser->checkInput($_POST['imageName']);
    $user_id = $loadFromUser->checkInput($_POST['userId']);
    
    $loadFromUser->update('profile', $user_id, array('profilePic' => $imageName));

}else{

}
if ( 0 < $_FILES['file']['error']){
    echo 'ERROR: '.$_FILES['file']['error'].'<br>';
}else{
    $path_directory = $_SERVER['DOCUMENT_ROOT']."/stackoverflow_v1/user/".$user_id."/profilePhoto/";
    if( !file_exists($path_directory) && !is_dir($path_directory)){
        mkdir($path_directory, 0777, true);
    }
    move_uploaded_file($_FILES['file']['tmp_name'], $path_directory.$_FILES['file']['name']);
}

    echo "/stackoverflow_v1/user/".$user_id."/profilePhoto/".$_FILES['file']['name'];

?>