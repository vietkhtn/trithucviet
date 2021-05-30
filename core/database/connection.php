<?php 
 $hostInfo = 'mysql:host=bjhmz1rb32kuq60eo0v4-mysql.services.clever-cloud.com;dbname=bjhmz1rb32kuq60eo0v4;charset=utf8mb4';
 $userAdmin = 'uwajkb81wg9v9z6b';
 $passAdmin = 'mp42r1Xetr3wuumJVeCj';
try {
    $pdo = new PDO($hostInfo, $userAdmin, $passAdmin);
    //echo "Connected successfully";
}catch (PDOException $e){
    echo "Connection error !!!" . $e->getMessage();
}

?>