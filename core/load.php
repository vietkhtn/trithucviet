<?php

include 'database/connection.php';
include 'models/user.php';
include 'models/question.php';
include 'models/profile.php';

global $pdo;

$loadFromUser = new User($pdo);
$loadFromQuestion = new Question($pdo);
$loadFromProfle = new Profile($pdo);

define("BASE_URL", "http://localhost/stackoverflow_v1");

?>