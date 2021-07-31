<?php 

require_once '../load.php';
require_once '../../connect/login.php';

$userid = login::isLoggedIn();

// Update voteCount
if (isset($_POST['userId']) && isset($_POST['questionId'])){
    $userId = $_POST['userId'];
    $questionId = $_POST['questionId'];
    $voteType = $_POST['voteType'];
    if ($userid != $userId) {
        $currentVoteCount = DB::query('SELECT voteCount FROM question WHERE question_id = :question_id', array(':question_id' => $questionId))[0]['voteCount'];
        if ($voteType == 'Up') {
            $loadFromQuestion->updateQuestionData('question', $questionId, array('voteCount' => $currentVoteCount + 1));
        }
        else {
            $loadFromQuestion->updateQuestionData('question', $questionId, array('voteCount' => $currentVoteCount - 1));
        }
    }
    else {
        echo "Cannot spam your own question.";
    }
}
?> 