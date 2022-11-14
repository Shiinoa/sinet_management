<?php 
    //include __DIR__ .'../../../config/server.php';
    require ('server.php');
    if(isset($_GET['is_id']))
    {
        $userid = $_GET['is_id'];
        $checkuserid = $db->prepare("DELETE FROM installed WHERE is_id = :userid ");
        $checkuserid->bindParam(":userid",$userid,PDO::PARAM_INT);
        if($checkuserid->execute())
        {
            echo "<script>alert('Deleted Successfully!')</script>";
            echo "<script>window.location.href='../html/insert_projectSI.php'</script>";
        }
    }
    elseif(isset($_GET['del_id']))
    {
            $userid = $_GET['del_id'];
            $checkuserid = $db->prepare("DELETE FROM installed WHERE is_id = :userid ");
            $checkuserid->bindParam(":userid",$userid,PDO::PARAM_INT);
            if($checkuserid->execute())
            {
                echo "<script>alert('Deleted Successfully!')</script>";
                echo "<script>window.location.href='../html/insert_projectSI.php'</script>";
               
            }
        
    }

?>