<?php 
session_start();
require ('server.php');
if(isset($_SESSION['status'])){
    $data_st = $_SESSION['status'];
}
if($data_st != "USER" )
{
if(isset($_GET['del_id']))
{
    $del_id = $_GET['del_id'];
    $checksplitterid = $db->prepare("DELETE FROM sp_detail WHERE sp_id = :del_id ");
    $checksplitterid->bindParam(":del_id",$del_id,PDO::PARAM_INT);
    if($checksplitterid->execute())
    {
        echo "<script>alert('Deleted Successfully!')</script>";
        echo "<script>window.location.href='../html/sp_data.php'</script>";
    }
}
}else {
    echo "<script>alert('Permission is USER!')</script>";
    echo "<script>window.location.href='../html/sp_data.php'</script>";
}
?>