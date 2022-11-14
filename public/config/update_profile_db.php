<?php 
    include 'server.php';
    if(isset($_POST['profile_select'])){
        $profile_data = $_POST['profile_select'];
        $sh_profile = $_POST['sh_profile'];
        $pwd_profile = $_POST['password_profile'];

        if(!empty($profile_data) && !empty($sh_profile) && !empty($pwd_profile)){
            $update_profile = $db->prepare("UPDATE fttx_profile SET p_fmt=:profile_set , vlan_m_cmd=:pwd_update WHERE p_id = $profile_data");
            $update_profile->bindParam(":profile_set",$sh_profile);
            $update_profile->bindParam(":pwd_update",$pwd_profile);
            
            if($update_profile->execute()){
                echo "Update Profile ::".$profile_data;
            }else{
                echo "Update Profile Error";
            }

        }else {
            echo "Not found DATA !!";
          
        }
        
    }else {
        echo "Not found DATA profile_select!!";
    }
   
?>