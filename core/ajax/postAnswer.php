<?php 

require_once '../load.php';
require_once '../../connect/login.php';

$userid = login::isLoggedIn();

// Post Answer 
if (isset($_POST["answerContent"])){
    $questionId = $_POST["questionId"];
    $userid = $_POST["userId"];
    $answerContent = $_POST["answerContent"];
    
    // Store answer in DB
    $loadFromAnswer->create('answer',array("question_id" => $questionId, "user_id" => $userid, "postBy" =>$userid, "postOn" => date("Y-m-d H:i:s", time()),
                        "content" => $answerContent, "voteCount" => 0,"isSpam" => 0, "totalSpam" => 0));
    // Get current answer count of question
    $currentAnswerCount = DB::query('SELECT answerCount FROM question WHERE question_id = :questionId', array(':questionId' => $questionId))[0]['answerCount'];
    // Increase answer count by 1
    $loadFromQuestion->updateQuestionData('question', $questionId, array('answerCount' => $currentAnswerCount + 1));

}else {
    echo "You have to write a title or content";
}

?>