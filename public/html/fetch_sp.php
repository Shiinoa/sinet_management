<?php 
     include '../config/server.php';
    $request = 0;
    if(isset($_POST['request'])){
      $request = $_POST['request'];
    }
    // Get username list
    if($request == 1){
      $search = "";
      if(isset($_POST['search'])){
          $search = $_POST['search'];
          $eup = strtoupper($search);
      }

      $query = "SELECT * FROM sp_detail WHERE sp_name like'%".$eup."%' LIMIT 10";
      $stmt = $db->prepare($query);
      $stmt->execute();
  
      //$result = $stmt->fetchAll();
      $response=array();
      while($row =$stmt->fetch(PDO::FETCH_BOTH)){
        
          $response[] = array("value"=>$row['sp_id'],"label"=>$row['sp_name']);
      }

      // encoding array to json format
      echo json_encode($response);
    }
    // Get details
    if($request == 2){
      $userid = 0;
      if(isset($_POST['userid'])){
          $userid = $_POST['userid'];
      }
      $query = "SELECT * FROM sp_detail WHERE sp_id= " .$userid ;
      $stmt = $db->prepare($query);
      $stmt->execute();

      $users_arr=array();
      while($row =$stmt->fetch(PDO::FETCH_BOTH)){

          $userid = $row['sp_id'];
          $node = $row['node'];
          $olt = $row['olt'];
          
          $users_arr[] = array(
              "sp_id" => $userid, 
              "node_" => $node,
              "olt_" => $olt, 
            
          );
      }
      // encoding array to json format
      echo json_encode($users_arr);
      }
?>
