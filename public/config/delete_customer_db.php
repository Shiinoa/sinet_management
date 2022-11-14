<?php 
    //include __DIR__ .'../../../config/server.php';
    session_start();
    require ('server.php');
    if(isset($_SESSION['status'])){
        $data_st = $_SESSION['status'];
    }
    if($data_st != "USER" )
    {
        if(isset($_GET['is_id']))
            {
        $userid = $_GET['is_id'];
        $checkuserid = $db->prepare("DELETE FROM installed WHERE is_id = :userid ");
        $checkuserid->bindParam(":userid",$userid,PDO::PARAM_INT);
        if($checkuserid->execute())
        {
            echo "<script>alert('Deleted Successfully!')</script>";
            echo "<script>window.location.href='../html/install_customer.php'</script>";
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
                    echo "<script>window.location.href='../html/install_customer.php'</script>";
                
                }
            
        }
    }else {
        echo "<script>alert('Permission is USER!')</script>";
        echo "<script>window.location.href='../html/index_admin.php'</script>";
    }
    

?>