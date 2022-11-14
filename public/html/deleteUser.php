<?php 
    include_once('../config/server.php');

    if(isset($_GET['del'])){
        $userid = $_GET['del'];
        $checkuserid = $db->prepare("DELETE FROM member WHERE userid = :userid ");
        $checkuserid->bindParam(":userid",$userid,PDO::PARAM_INT);
        if($checkuserid->execute()){
            echo "<script>alert('Deleted Successfully!')</script>";
            echo "<script>window.location.href='showUser.php'</script>";
        }
    }

?>