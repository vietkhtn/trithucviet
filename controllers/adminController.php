<?php 
require_once '../core/load.php';
require_once '../PHPMailer/sendEmail.php';
//require_once '../connect/DB.php';

$usersList = $loadFromAdmin->getAllUser();
$postsList = $loadFromAdmin->getAllPost();


if (isset($_GET['role'])) {
    $userId = $_GET['id'];
    $role = ($_GET['role'] == "admin") ? "user" : "admin";
    $loadFromAdmin->setRoleUser($userId, $role);
    header('Location: /trithucviet/views/manageuser.php');
}

if (isset($_GET['status'])) {
    $userId = $_GET['id'];
    $status = ($_GET['status'] == "actived") ? "blocked" : "actived";
    $loadFromAdmin->setStatusUser($userId, $status);
    header('Location: /trithucviet/views/manageuser.php');
}


if (isset($_GET['deleteuser']))
{
    $userId = $_GET['deleteuser'];
    $loadFromAdmin->deleteUser($userId);
    header('Location: /trithucviet/views/manageuser.php');
}

if (isset($_GET['deletepost']))
{
    $postId = $_GET['deletepost'];
    $loadFromAdmin->deletePost($postId);
    header('Location: /trithucviet/views/managepost.php');
}

if (isset($_GET['approve']))
{
    $postId = $_GET['approve'];
    $loadFromAdmin->approvePost($postId);
    $dataPost = $loadFromAdmin->getPostById($postId);
    $userPost = $loadFromAdmin->getUserById($dataPost->postBy);
    sendMail($userPost->email, $dataPost->title, $dataPost->content, "question");
    header('Location: /trithucviet/views/managepost.php');
}

if (isset($_GET['mail']))
{
    $mail = $_GET['mail'];
    sendMail($mail);
    header('Location: /trithucviet/views/manageuser.php');
}


?>

