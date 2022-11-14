<?php 
    include 'server.php';
    if(isset($_POST['profile_select'])){
        $result_data =$_POST['profile_select'];
        $rs_data = $db->prepare("SELECT * FROM fttx_profile WHERE p_id = :result_data");
        $rs_data->bindParam(':result_data',$result_data);
        $rs_data->execute();
        while($row = $rs_data->fetch(PDO::FETCH_ASSOC)){
            $id_profile =  $row['p_id'];
            $password_profile =  $row['vlan_m_cmd'];
            $data_profile = $row['p_fmt'];
            $data_profile_mode = $row['mode'];
            //$return_arr["data_profile"] = $data_profile;
            //$return_arr["password_profile"] = $password_profile;
            $return_arr[] = array(
                "data_profile" => $data_profile,
                "password_profile" => $password_profile , 
                "mode_profile" =>  $data_profile_mode,
                "id_profile"=> $id_profile
            );

        }
       
        
    }else{
        echo "Not Found Data Profile....";
    }echo json_encode($return_arr);
    
?>