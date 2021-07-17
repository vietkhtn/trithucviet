<?php

require_once 'database/connection.php';
require_once 'models/Base.php';
require_once 'models/constant.php';
require_once 'models/user.php';
require_once 'models/question.php';
require_once 'models/profile.php';

global $pdo;

$Base = new Base($pdo);
$constant = new constant($pdo);
$loadFromUser = new User($pdo);
$loadFromQuestion = new Question($pdo);
$loadFromProfle = new Profile($pdo);

define("BASE_URL", "http://localhost/trithucviet");

?>