<?php 
require_once '../core/load.php';
require_once '../connect/DB.php';

$questionList = $loadFromQuestion->getAllQuestionAndUser(); 
$countQuestion = $loadFromQuestion->getCountQuestions(); 

if (isset($_GET['filter'])){
    if($_GET['filter'] == 'newest'){
        $questionList = $loadFromQuestion->getNewestQsAndUser(); 
    }
    if($_GET['filter'] == 'active'){
        $questionList = $loadFromQuestion->getActiveQsAndUser(); 
    }
    if($_GET['filter'] == 'unanswered'){
        $questionList = $loadFromQuestion->getUnanswerQsAndUser(); 
    }
    if($_GET['filter'] == 'vote'){
        $questionList = $loadFromQuestion->getVoteQsAndUser(); 
    }
    if($_GET['filter'] == 'frequent'){
        $questionList = $loadFromQuestion->getFrequentQsAndUser(); 
    }
}

if(isset($_GET['searchquery'])){
    $searchText = $_GET['searchquery'];
    $questionList = $loadFromQuestion->get1QuestionByContent($searchText);
}

?>