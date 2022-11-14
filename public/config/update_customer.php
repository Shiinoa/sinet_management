<?php
require ('server.php');
if(isset($_POST['update']))
    {
        $is_id = $_GET['is_id'];

        $u_id = $_POST['u_id'];
        $isp = $_POST['isp'];
        $user_status = $_POST['user_status'];
        $mac_pon = $_POST['mac_pon'];
        $pmg_model = $_POST['pmg_model'];
        $pmg_mode= $_POST['pmg_mode'];
        $name = $_POST['name'];
        $p_id = $_POST['p_id'];
        $phone_no = $_POST['phone_no'];
        $sp = $_REQUEST['sp'];
        $sp_id = $_REQUEST['sp_id__data'];
        $node = isset($_POST['node']);
        $vlan = $_POST['vlan'];
        $vlan_m = $_POST['vlan_m'];
        $type = $_POST['type'];
        $pon1 = $_POST['pon1'];
        $pon2 = $_POST['pon2'];
        $pon3 = $_POST['pon3'];
        $ont = $pon1."-".$pon2."-".$pon3;
        $nonid = $_POST['nonid'];
        $pass = $_POST['pass'];
        $pass_onu = $_POST['pass_onu'];
        $dataport = $_POST['dataport'];
        $tc_code = $_POST['tc_code'];
    
        
        if(empty($is_id)){
            $errMsg = "NOT NULL";
        }else {
            try {
                if(!isset($errMsg)){
                    $updateData = $db->prepare("UPDATE installed SET u_id =:u_id , isp=:isp,user_status=:user_status,mac_pon=:mac_pon
                    ,p_id=:p_id,pmg_model=:pmg_model,pmg_mode=:pmg_mode,name=:name,phone_no=:phone_no,sp=:sp,sp_id=:sp_id,node=:node,vlan=:vlan,vlan_m=:vlan_m,
                    type=:type,pon1=:pon1,pon2=:pon2,pon3=:pon3,ont=:ont,nonid=:nonid,pass=:pass,pass_onu=:pass_onu,dataport=:dataport,tc_code=:tc_code
                    WHERE is_id = $is_id ");
                    $updateData->bindParam(':u_id',$u_id);
                    $updateData->bindParam(':isp',$isp);
                    $updateData->bindParam(':user_status',$user_status);
                    $updateData->bindParam(':mac_pon',$mac_pon);
                    $updateData->bindParam(':p_id',$p_id);
                    $updateData->bindParam(':pmg_model',$pmg_model);
                    $updateData->bindParam(':pmg_mode',$pmg_mode);
                    $updateData->bindParam(':name',$name);
                    $updateData->bindParam(':phone_no',$phone_no);
                    $updateData->bindParam(':sp',$sp);
                    $updateData->bindParam(':sp_id',$sp_id);
                    $updateData->bindParam(':node',$node);
                    $updateData->bindParam(':vlan',$vlan);
                    $updateData->bindParam(':vlan_m',$vlan_m);
                    $updateData->bindParam(':type',$type);
                    $updateData->bindParam(':pon1',$pon1);
                    $updateData->bindParam(':pon2',$pon2);   
                    $updateData->bindParam(':pon3',$pon3);   
                    $updateData->bindParam(':ont',$ont);   
                    $updateData->bindParam(':nonid',$nonid);   
                    $updateData->bindParam(':pass',$pass);    
                    $updateData->bindParam(':pass_onu',$pass_onu);   
                    $updateData->bindParam(':dataport',$dataport);   
                    $updateData->bindParam(':tc_code',$tc_code);         
                    
                    if($updateData->execute()){
                        $_SESSION['success'] = 'Update User Success';
                        header("location;../html/update_customer_db.php?is_id=$is_id");
                        header("Refresh:1;../html/install_customer.php");
                    }else {
                        $_SESSION['error'] = 'Update User Error';
                        
                        header("location;../html/update_customer_db.php?is_id=$is_id");
                    } 
                    
                }
            } catch (PDOException $e) {
                echo '<script>alert("Error Data :'.$u_id.'");</script>';
                header("refresh:0.5;../html/install_customer.php");
                
            }
        }
    }    
?>