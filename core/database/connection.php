<?php 

$hostInfo = 'mysql:host=127.0.0.1; dbname=stackoverflow; charset=utf8mb4';
$userAdmin = 'root';
$passAdmin = 'Teotu_19';

try {
    $pdo = new PDO($hostInfo, $userAdmin, $passAdmin);
}catch (PDOException $e){
    echo "Connection error !!!" . $e->getMessage();
}

?>