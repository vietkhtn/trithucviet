
<?php 

$hostInfo = 'mysql:host=localhost; dbname=stackoverflow; charset=utf8mb4';
$userAdmin = 'root';
$passAdmin = '';

try {
    $pdo = new PDO($hostInfo, $userAdmin, $passAdmin);
}catch (PDOException $e){
    echo "Connection error !!!" . $e->getMessage();
}

?>