<?php 

require_once '../core/load.php';

if (isset($_GET['question']) == true && empty($_GET['question']) == false){

    $questionId = $loadFromUser->checkInput($_GET['question']);

    $questionData = $loadFromQuestion->questionData($questionId);
}
?>