<?php 

require_once '../core/load.php';

if (isset($_GET['question']) == true && empty($_GET['question']) == false){

    $profileId = $loadFromUser->userIdByUsername($_SESSION['username']);

    $profileData = $loadFromUser->userData($profileId);
    
    $userData = $loadFromUser->userData($user_id);

    $questionId = $loadFromUser->checkInput($_GET['question']);

    $questionData = $loadFromQuestion->questionData($questionId);
}
?>