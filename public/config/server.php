<?php

    $servername = "localhost";
    $username ="nockkn";
    $password ="S1n3tkkn!";
    $dbname = "sinet_kkn";

    //For  DATA  
    try {
        $db = new PDO("mysql:host={$servername};dbname={$dbname}",$username,$password);
        $db->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
       
    } catch (PDOException $e) {
        echo "Faild to connect DATABASE". $e->getMessage();
    }

    
?>