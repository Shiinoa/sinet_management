<?php 
    include 'server.php';
    if(isset($_REQUEST['updateSP'])){
        $sp_name = $_POST['spname_data'];
        $type_sp = $_POST['type_sp'];
        $node = $_POST['node'];
        $olt = $_POST['olt'];
        $route = $_POST['route'];
        $lat = $_POST['lat'];
        $lon = $_POST['lon'];
        $location = $_POST['location'];

        if(empty($sp_name)){
            $errMsg = "NOT NULL";
        }else{
            try{
                if(!isset($errMsg)){
                    $updateData = $db->prepare("UPDATE sp_detail SET sp_type=:updatetype_sp , node=:updatenode , olt=:updateolt ,
                    route=:updateroute , lat=:updatelat , lng=:updatelon , location=:updatelocation WHERE sp_name = :updatesp_name ");
                    $updateData->bindParam(':updatesp_name',$sp_name);
                    $updateData->bindParam(':updatetype_sp',$type_sp);
                    $updateData->bindParam(':updatenode',$node);
                    $updateData->bindParam(':updateolt',$olt);
                    $updateData->bindParam(':updateroute',$route);
                    $updateData->bindParam(':updatelat',$lat);
                    $updateData->bindParam(':updatelon',$lon);
                    $updateData->bindParam(':updatelocation',$location);

                    if(!empty($sp_name)){
                        if($updateData->execute()){
                            $_SESSION['success'] = "Update ".$sp_name." Complete";
                            header("refresh:3;../html/sp_data.php");
                        }
                    }

                }
            }
            catch (PDOException $e) {
                $_SESSION['error'] ="Error Data ::".$e;
                header("refresh:20;../html/sp_data.php"); 
            }    
        }
        
      

    }

?>