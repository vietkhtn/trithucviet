<?php 
 $hostInfo = 'mysql:host=bitgqltbcw1nl6jid2u2-mysql.services.clever-cloud.com;dbname=bitgqltbcw1nl6jid2u2;charset=utf8mb4';
 $userAdmin = 'uboe6mrf9gqq6mvo';
 $passAdmin = 'LZ55sk6B8o7IjVP5DyYM';
try {
    $pdo = new PDO($hostInfo, $userAdmin, $passAdmin);
    //echo "Connected successfully";
}catch (PDOException $e){
    echo "Connection error !!!" . $e->getMessage();
}

?>