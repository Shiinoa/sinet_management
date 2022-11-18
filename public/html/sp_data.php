<?php 
session_start();
include '../config/server.php';
    if(!isset($_SESSION['data_login'])){
        $_SESSION['error'] ="Please Login ";
        header('location:../html/login.php');
    }

    include_once('../config/update_sp_db.php');
    require('modal_addSP.php');
?>

<!DOCTYPE html>
<html lang="en">
<head>
<?php require('../menu/extension_web.php')?>
<?php require('../menu/nav_file.php')?>
<title>SP DATA</title>
<style>
.colSearch {
  float: right;
  width: 300px;
  padding: 10px;
  margin-top: 10px;
  margin-bottom: 5px;
  margin-left: 80%;
  font-size: 17px;
  border: none;
  cursor: pointer;
    }
    table {
    width: 50%;
    }
    th {
    height: 70px;
    align-items: center;
    }
.modal_sp{
    width:90%;
    height:90%;
    margin:150px auto;
    padding: 150px; 
    font-size: 17px;
    border: none;
    
}
.modal-dialog {
      max-height: 250px;
      max-width:  200%; 
      margin-left: auto;
      margin-right: auto;
    }

</style>

</head>
<body>
    <div class="container">
        <div class="mt-5">
            <h2>SP Total ::
                <?php           $result_count = "SELECT count(sp_id)  FROM sp_detail " ;
                                $pdo_res = $db->query($result_count);
                                $table = $pdo_res->fetchColumn();
                                echo "$table SP"; 
                 ?>
            </h2> <hr>
            <form action="" method="post">
                <div class="row ">
                    <?php if(isset($_SESSION['status'])){
                                                $data_st = $_SESSION['status'];
                                                }
                     if($data_st != "USER" ){?>
                                                
                    <div class="col">
                        <a class="btn btn-primary px-3 " data-target="#addsplitter" data-toggle="modal" >Add SP</a>
                    </div>
                    <?php } ?>
                    <div class="col-md-5 colSearch">
                        <div  class="input-group rounded ">
                            <input class="form-control rounded me-3" placeholder="ค้นหา SP" aria-label="Search" aria-describedby="search-addon" type="search" name="search_data"id="search_data" />   
                            <span class="input-group-text border-0" id="search-addon">
                        </div>     
                       
                 </div>                   
            </form><hr>
            <?php  if(isset($_SESSION['success'])) {?>
                                <div class="alert alert-success">
                                <?php  echo $_SESSION['success']; 
                                    unset( $_SESSION['success']); 
                                ?>
                                </div>
            <?php  }?>
            <?php  if(isset($_SESSION['error'])) {?>
                                <div class="alert alert-warning">
                                <?php  echo $_SESSION['error']; 
                                    unset( $_SESSION['error']); 
                                ?>
                                </div>
            <?php  }?>
            <table id="mytable" class="table table-bordered border-info ">
                                    <thead class="p-3 mb-3 bg-info text-light" style="text-align:center;">
                                        <tr>   
                                            <th>SP</th>
                                            <th>Type</th>
                                            <th>Node</th>
                                            <th>OLT</th>
                                            <th>Route</th>
                                            <th>Latitude</th>
                                            <th>Longitude</th>
                                            <th>Location</th>
                                            <!--BTN-->
                                          
                                            <th  width="15%" >View</th>
                                            
                                        </tr>   
                                    </thead>
                                    <tbody id="search_data_result"></tbody>
             </table> 
            <br>
            
            
        </div>
        
    </div>
    <?php require('modal_sp.php'); ?>
</body>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-A3rJD856KowSb7dwlZdYEkO39Gagi7vIsF0jrRAoQmDKKtQBHUuLZ9AsSv4jD4Xa" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
</html>
<script src="../script/sp_data_req.js"></script>