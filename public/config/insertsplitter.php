<?php 
    session_start();
    include 'server.php';
    if(isset($_REQUEST['AddSplitter'])){
        $addspname = $_POST['addspname'];
        $addtype_sp = $_POST['addtype_sp'];
        $addnode = $_POST['addnode'];
        $addolt = $_POST['addolt'];
        $addroute = $_POST['addroute'];
        $addlat = $_POST['addlat'];
        $addlon = $_POST['addlon'];
        $addlocation = $_POST['addlocation'];

        if(empty($addspname)){
            $errMsg = "NOT NULL";
        }else{
            try{
                if(!isset($errMsg)){
                    $insertData = $db->prepare("INSERT INTO sp_detail(sp_name,sp_type,node,olt,route,lat,lng,location)
                    VALUE(:addspname,:addtype_sp,:addnode,:addolt,:addroute,:addlat,:addlon,:addlocation)");
                    $insertData->bindParam(':addspname',$addspname);
                    $insertData->bindParam(':addtype_sp',$addtype_sp);
                    $insertData->bindParam(':addnode',$addnode);
                    $insertData->bindParam(':addolt',$addolt);
                    $insertData->bindParam(':addroute',$addroute);
                    $insertData->bindParam(':addlat',$addlat);
                    $insertData->bindParam(':addlon',$addlon);
                    $insertData->bindParam(':addlocation',$addlocation);

                    if(!empty($addspname)){
                        if($insertData->execute()){
                            $_SESSION['success'] = "ข้อมูลครบเรียบร้อย!!";
                            header("refresh:0.5;../html/sp_data.php");
                        }
                    }

                }
            }
            catch (PDOException $e) {
                $_SESSION['error'] ="Error Data ::".$e;
                header("refresh:0.5;../html/sp_data.php"); 
            }    
        }
}

?>