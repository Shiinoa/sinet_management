<?php 
    session_start();
    require('server.php');
    $id_sp=$_POST['id'];
    $query = $db->prepare("SELECT * FROM sp_detail WHERE sp_id = $id_sp");
    $query->execute();
    $sp_arr=array();
    while($row = $query->fetch(PDO::FETCH_ASSOC)){
        $sp_name = $row['sp_name'];
        $sp_type = $row['sp_type'];
        $sp_node  = $row['node'];
        $sp_olt  = $row['olt'];
        $sp_route  = $row['route'];
        $sp_lat  = $row['lat'];
        $sp_lng  = $row['lng'];
        $sp_location  = $row['location'];
        
        $sp_arr = array(
            'sp_name' => $sp_name, 
            "sp_type" => $sp_type,
            "sp_node" => $sp_node, 
            "sp_olt" => $sp_olt, 
            "sp_route" => $sp_route,
            "sp_lat" => $sp_lat,
            "sp_lng" => $sp_lng, 
            "sp_location" => $sp_location
           
        );  
      
    }
    echo json_encode($sp_arr);

?>