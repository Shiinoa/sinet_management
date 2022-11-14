<?php 
    include 'server.php';
    if(isset($_POST['new_name']) && isset($_POST['new_profile'])){
        $newname = $_POST['new_name'];
        $new_profile = $_POST['new_profile'];
        $mode_status = $_POST['mode_status'];
        $pws_onu = $_POST['set_pass_onu'];
        
        if(!empty($newname) && !empty($new_profile)){
            $result_data = $db->prepare("INSERT INTO fttx_profile(mode , p_name , p_fmt ,vlan_m_cmd )VALUE( :mode_status ,:newname, :new_profile , :set_pass_onu)");
            $result_data->bindParam(':mode_status',$mode_status);
            $result_data->bindParam(':newname',$newname);
            $result_data->bindParam(':new_profile',$new_profile);
            $result_data->bindParam(':set_pass_onu',$pws_onu);

            if(!empty($newname)  && !empty($new_profile) &&  !empty($mode_status) &&  !empty($pws_onu)){
                if($result_data->execute()){
                    echo "Data insert Success...";
                }
            }else{
                echo "Data insert Error...";
            }
        }

    }else{
        echo "Data insert Profile Not found...";
    }
?>