<?php 

require_once '../load.php';
require_once '../../connect/login.php';

$userid = login::isLoggedIn();

// Update isSpam
if (isset($_POST['userId']) && isset($_POST['questionId'])){
    $userId = $_POST['userId'];
    $questionId = $_POST['questionId'];
    if ($userid != $userId) {
        $isSpam = DB::query('SELECT isSpam FROM question WHERE question_id = :question_id', array(':question_id' => $questionId))[0]['voteCount'];
            $loadFromQuestion->updateQuestionData('question', $questionId, array('isSpam' => 1));
    }
    else {
        echo "Cannot vote your own question.";
    }
}

?> 