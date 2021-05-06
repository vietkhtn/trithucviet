<?php

include 'database/connection.php';
include 'models/user.php';
include 'models/post.php';

global $pdo;

$loadFromUser = new User($pdo);
$loadFromPost = new Post($pdo);

define("BASE_URL", "http://localhost/trithucviet");

?>