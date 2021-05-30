<?php 
require_once '../core/load.php';
require_once '../connect/DB.php';

$questionList = $loadFromQuestion->getAllQuestionAndUser(); 
$countQuestion = $loadFromQuestion->getCountQuestions(); 
?>