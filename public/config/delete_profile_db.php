<?php 
    require ('server.php');
    if(isset($_GET['data_select']))
    {
        $data_select = $_GET['data_select'];
        $del_data = $db->prepare("DELETE FROM fttx_profile  WHERE p_id = :data_select ");
        $del_data->bindParam(":data_select",$data_select,PDO::PARAM_INT);
        if($del_data->execute())
        {
            echo "Deleted Successfully!";
        }
    }
?>