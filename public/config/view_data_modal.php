<?php 
    session_start();
    require('server.php');
    $id=$_REQUEST['id'];
    $index = array();
    $query= $db->prepare("SELECT * FROM installed WHERE is_id = $id");
    $query->execute();
    while ($row_data = $query->fetch(PDO::FETCH_ASSOC)) {
            $result_olt= $db->prepare("SELECT * FROM fttx_profile WHERE p_id = :u_p_id ");
            $result_olt->bindParam(':u_p_id',$row_data['p_id']);
            $result_olt->execute();
                while ($row_olt = $result_olt->fetch(PDO::FETCH_ASSOC)) {
                $index[0] = $row_data['ont'];
                $index[1] = $row_data['mac_pon'];
                $index[2] = "P1000M";
                $index[3] = "P1000M";
                $index[4] = $row_data['u_id'];
                $index[5] = $row_data['isp'];
                $index[6] = $row_data['sp']; 
                $index[7] =  $row_data['vlan'];
                $index[8] =  $row_data['vlan_m'];
                $index[9] = $row_data['name']; 
                $index[10] = $row_data['phone_no']; 
                $index[11] =  $row_data['nonid']; 
                $index[12] = $row_data['pass']; 
                $index[13] = $row_data['p_id']; 
                $index[14] = $row_olt['p_fmt'];; 
            }   
        # code...
    }
    
    echo json_encode($index);
    
?>