<?php 
require_once '../core/load.php';
require_once '../connect/DB.php';

$questionList = $loadFromQuestion->getAllQuestionAndUser(); 
$countQuestion = $loadFromQuestion->getCountQuestions(); 
$tagList = $loadFromTag->getAllTags();
if (isset($_GET['filter'])){
    if($_GET['filter'] == 'popular'){
        $tagList = $loadFromTag->getAllTags(); 
    }
    if($_GET['filter'] == 'new'){
        $tagList = $loadFromTag->getAllTagsDateDesc(); 
    }
    
}
?>