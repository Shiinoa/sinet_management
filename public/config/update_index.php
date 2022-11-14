<?php 
    session_start();
    include ('server.php');
    if(isset($_POST['uid'])){
        $id = $_POST['uid'];
        $newpon1 = $_POST['newpon1'];
        $newpon2 = $_POST['newpon2'];
        $newpon3 = $_POST['newpon3'];
        $allindex = $newpon1."-".$newpon2."-".$newpon3;
        
       if((!empty($id))){
            $update_cus = $db->prepare("UPDATE installed SET ont=:ontdata , pon1 =:newpon1 , pon2 =:newpon2 ,pon3 =:newpon3 WHERE is_id = $id");
            $update_cus->bindParam("newpon1",$newpon1,PDO::PARAM_INT);
            $update_cus->bindParam("newpon2",$newpon2,PDO::PARAM_INT);
            $update_cus->bindParam("newpon3",$newpon3,PDO::PARAM_INT);
            $update_cus->bindParam("ontdata",$allindex);

            if($update_cus->execute()){
                echo " <span class='badge badge-success rounded-pill d-inline' style='font-size:13px'>Update User Success</span> ";
                
            }else {
                echo "Update User Errors";
            } 

       }else {
            echo "ข้อมูลยังไม่ครบ!!";
           
       }
        
    }else {
        echo "Not found DATA !!";
      
    }
?>