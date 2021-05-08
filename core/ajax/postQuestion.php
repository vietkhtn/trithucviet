<?php 

include '../load.php';
include '../../connect/login.php';

$userid = login::isLoggedIn();

echo $_POST["questionTitle"];

if (isset($_POST["questionTitle"]) && isset($_POST["questionTags"]) && isset($_POST["questionContent"])){
    $questionTitle = $_POST["questionTitle"];
    $questionTags = $_POST["questionTags"];
    $questionContent = $_POST["questionContent"];

$loadFromQuestion->create('question',array("user_id" => $userid, "postBy" =>$userid, "postOn" => date("Y-m-d H:i:s", time()),
                        "title" => $questionTitle,"tags" => $questionTags,"content" => $questionContent,
                        "voteCount" => 0, "answerCount" => 0, "isSpam" => 0, "totalSpam" => 0));
}else {
    echo "You have to write a title or content";
}

?>