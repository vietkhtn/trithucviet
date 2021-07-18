<?php 
require_once '../../core/load.php';
//require_once '../connect/DB.php';

$usersList = $loadFromAdmin->getAllUser();
$postsList = $loadFromAdmin->getAllPost();

if (isset($_GET['username']) && !empty($_GET['username']))
{
    $searchText = $_GET['username'];
    $usersList = $loadFromUser->get1UserByName($searchText);
}
?>