<?php 
session_start();
include 'server.php';
if(isset($_REQUEST['insertSI'])){
    
        $u_id = $_POST['u_id'];
        $isp = $_POST['isp'];
        $user_status = $_POST['user_status'];
        $mac_pon = $_POST['mac_pon'];
        $profile_id =$_POST['p_id'];
      //  $pmg_model = $_POST['pmg_model'];
        $pmg_mode= $_POST['pmg_mode'];
        $name = $_POST['name'];
        $phone_no = $_POST['phone_no'];
        $sp = $_POST['sp'];
        $sp_id = $_POST['sp_id__data'];
        $node = isset($_POST['node']);
        $vlan = $_POST['vlan'];
        $vlan1 = $_POST['vlan1'];
        $vlan2 = $_POST['vlan2'];
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
        if(empty($u_id)){
            $errMsg = "NOT NULL";
        }else {
            try {
                if(!isset($errMsg)){
                    $insertData = $db->prepare("INSERT INTO installed(u_id,isp,user_status,mac_pon,p_id,pmg_mode,name,phone_no,sp,sp_id,node,vlan,vlan_m,vlan1,vlan2,type,pon1,pon2,pon3,ont,nonid,pass,pass_onu,dataport,tc_code)
                    VALUES(:u_id,:isp,:user_status,:mac_pon,:p_id_data,:pmg_mode,:name,:phone_no,:sp,:sp_id,:node,:vlan,:vlan_m,:vlan1,:vlan2,:type,:pon1,:pon2,:pon3,:ont,:nonid,:pass,:pass_onu,:dataport,:tc_code)");
                    $insertData->bindParam(':u_id',$u_id);
                    $insertData->bindParam(':isp',$isp);
                    $insertData->bindParam(':user_status',$user_status);
                    $insertData->bindParam(':mac_pon',$mac_pon);
                    $insertData->bindParam(':p_id_data',$profile_id);
                  //  $insertData->bindParam(':pmg_model',$pmg_model);
                    $insertData->bindParam(':pmg_mode',$pmg_mode);
                    $insertData->bindParam(':name',$name);
                    $insertData->bindParam(':phone_no',$phone_no);
                    $insertData->bindParam(':sp',$sp);
                    $insertData->bindParam(':sp_id',$sp_id);
                    $insertData->bindParam(':node',$node);
                    $insertData->bindParam(':vlan',$vlan);
                    $insertData->bindParam(':vlan1',$vlan1);
                    $insertData->bindParam(':vlan2',$vlan2);
                    $insertData->bindParam(':vlan_m',$vlan_m);
                    $insertData->bindParam(':type',$type);
                    $insertData->bindParam(':pon1',$pon1);
                    $insertData->bindParam(':pon2',$pon2);   
                    $insertData->bindParam(':pon3',$pon3);   
                    $insertData->bindParam(':ont',$ont);   
                    $insertData->bindParam(':nonid',$nonid);   
                    $insertData->bindParam(':pass',$pass);    
                    $insertData->bindParam(':pass_onu',$pass_onu);   
                    $insertData->bindParam(':dataport',$dataport);   
                    $insertData->bindParam(':tc_code',$tc_code);         
                    
                    if(empty($mac_pon)){
                        if($insertData->execute()){
                            $_SESSION['warning'] = "ข้อมูลยังไม่ครบ!! ระบบจะย้ายข้อมูลไปไว้ ข้อมูลที่ติดตั้งไม่สำเร็จ";
                            header("refresh:0.5;../html/insert_projectSI.php");
                           
                        }  
                    }else{
                        if($insertData->execute()){
                            $_SESSION['success'] = "ข้อมูลครบเรียบร้อย!!";
                            header("refresh:0.5;../html/insert_projectSI.php");
                        }  
                    }
                    
                }
            } catch (PDOException $e) {
                $_SESSION['error'] ="Error Data ::".$e;
                header("refresh:0.5;../html/insert_projectSI.php");
            }
        }
   
}

?>