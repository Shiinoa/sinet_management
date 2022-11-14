<?php 
   include __DIR__ .'../../../config/server.php';
   
    isset( $_POST['res_data'] ) ? $res_data = $_POST['res_data'] : $res_data = "null";
    $res_data = $_POST['res_data'];
    $db_data = "SELECT * FROM installed  WHERE u_id = ".$res_data;
    $result_data= $db->prepare($db_data);
   
    $result_data->execute();
    
    $index = array();
    
    while ($row_data = $result_data->fetch(PDO::FETCH_OBJ)) 
    {  
           $index[0] = $row_data->ont;
           $index[1] = $row_data->mac_pon;
           $index[2] = "P1000M";
           $index[3] = "P1000M";
           $index[4] = $row_data->u_id;
           $index[5] = $row_data->isp;
           $index[6] = $row_data->sp; 
           $index[7] = $row_data->vlan;
           $index[8] = $row_data->vlan_m;
           $index[9] = $row_data->name; 
           $index[10] = $row_data->phone_no; 
           $index[11] = $row_data->nonid; 
           $index[12] = $row_data->pass; 
    }
   
    echo json_encode($index);
    
    
?>