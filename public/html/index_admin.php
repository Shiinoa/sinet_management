<?php 
session_start();
include('../config/server.php');
    if(!isset($_SESSION['data_login'])){
        $_SESSION['warning'] ="Please Login ";
        header('location: ../html/login.php');
    }
    if(isset($_GET['logout'])){
        session_destroy();
        unset($_SESSION['data_login']);
        unset($_SESSION['id']);
    }
?>

<!DOCTYPE html>
<html lang="en">
    <?php require('../menu/extension_web.php')?>
    <?php require('../menu/nav_file.php')?>
<head>  
<style>
    .colSearch {
    position: absolute;
    left: 57%;
    top: 170px;
    }
    table {
    width: 50%;
    }
    th {
    height: 70px;
    align-items: center;
    }
    .card {
        margin-left: 1%;
        /* Add shadows to create the "card" effect */
        box-shadow: 0 4px 8px 0 rgba(0,0,0,0.2);
        transition: 0.3s;
    }
    .card:hover {
    box-shadow: 0 8px 16px 0 rgba(0,0,0,0.2);
    }
    .heighttext{
    top: 0;
    height: 750px;
    width: 800px;
    padding-top: 20px;
    padding-right: 10px;
    padding-bottom: 50px;
    padding-left: 30px;
    font-size: 14px;
    background: rgb(44, 44, 44);
    color: rgb(254, 254, 254);
    line-height: 21px;
    }
    #myModal {
    width:100%;
    height:100%;
    margin:0 auto;
    }
    .modal-dialog {
      max-height: 220px;
      max-width:  850px; 
      margin-left: auto;
      margin-right: auto;
    }
   
    
</style>
     <title>INDEX_ADMIN</title>
</head>
<body>

    <div class="container">
        <div class="panel-group mt-5">
            <div class="panel panel-default"></div>
                <div class=" panel-heading">
                       <!-- <iframe src="../html/dataChart.php"  width="100%" height="400" style="border:none;" frameborder="0"></iframe>-->
                        </div>
                    <div class="row">
                        <div class="col-sm-3">
                        <div class="card text-white bg-success " style="width: 20rem;">
                            <div class="card-body">
                                <h4><i class=" fa fa-user-circle aria-hidden="true></i> OPEN :
                                <?php //COUNT DATA LIKE "SELECT userid  FROM member WHERE userid LIKE '4001' "
                                $result_count = "SELECT count(u_id)  FROM installed WHERE user_status LIKE 'open'";
                                $pdo_res = $db->query($result_count);
                                $table = $pdo_res->fetchColumn();
                                echo "$table User"; 
                                ?>
                            </div> 
                        </div>
                        </div>
                        <div class="col-sm-2">
                        <div class="card text-white bg-warning " style="width: 20rem;">
                            <div class="card-body">
                                <h4><i class="fas fa-city aria-hidden="true></i> Project SI :
                                <?php //COUNT DATA LIKE "SELECT userid  FROM member WHERE userid LIKE '4001' "
                                $result_count = "SELECT count(u_id)  FROM installed WHERE user_status LIKE 'ProjectSI'";
                                $pdo_res = $db->query($result_count);
                                $table = $pdo_res->fetchColumn();
                                echo "$table User"; 
                                ?>
                            </div>
                        </div>
                        </div>
                    </div>
               </h2>
                <div class="panel-body">    
                            <hr>
                            <h4><i class="fas fa-search aria-hidden="true></i> ผลการค้นหา... </h4><br>
                            <div class="row" id="data_result">
                            
                            </div>
                            <hr>
                            <?php  if(isset($_SESSION['success'])) {?>
                                <div class="alert alert-success">
                                <?php  echo $_SESSION['success']; 
                                    unset( $_SESSION['success']); 
                                ?>
                                </div>
                            <?php  }?>
                            <?php  if(isset($_SESSION['warning'])) {?>
                                <div class="alert alert-warning">
                                <?php  echo $_SESSION['warning']; 
                                    unset( $_SESSION['warning']); 
                                ?>
                                </div>
                            <?php  }?>
                            <?php  if(isset($_SESSION['error'])) {?>
                                <div class="alert alert-danger">
                                <?php  echo $_SESSION['error']; 
                                    unset( $_SESSION['error']); 
                                ?>
                                </div>
                            <?php  }?>
                            
                            <form action="" method="post">
                            <div class="colSearch mt-2">
                                <div class="row">
                                    <div class="col-md-3">
                                            <select class="form-select " aria-label="select-status" id="olt_status" name="olt_status">
                                                <option selected value="" >Node</option>
                                          
                                            <?php 
                                                    $data_olt_res = $db->query("SELECT DISTINCT node FROM installed ORDER BY node ");
                                                    
                                                    while($row = $data_olt_res->fetch()){
                                            ?>
                                                <option value="<?php echo $row['node']?>"><?php echo $row['node']?></option>

                                            <?php }?>
                                            </select>
                                    </div>
                                    <div class="col-md-4">
                                        <select class="form-select " aria-label="select-status" id="check_status" name="check_status">
                                            <option selected value="all">All Status</option>
                                            <option value="open">Open</option>
                                            <option value="terminate">Terminate</option>
                                            <option value="suspend">Suspend</option>
                                            <option value="project">Project</option>
                                            <option value="na">N/A</option>
                                            <option value="projectSI">Project-SI</option>
                                        </select>
                                    </div>
                                    <div class="col-md-5">
                                        <div  class="input-group rounded">
                                                <input style="height: 2.5rem; width:15rem" class="form-control rounded me-2" placeholder="Search" aria-label="Search" aria-describedby="search-addon" type="search" name="search_data"id="search_data_text" />   
                                                <span class="input-group-text border-0" id="search-addon">
                                        </div>
                                    </div>
                                    
                                </div>       
                            </div>
                            </form>
                        <table id="mytable" class="table table-bordered border-Secondary ">
                                    <thead class="p-3 mb-3 bg-primary text-light" style="text-align:center;">
                                        <tr>   
                                            <th>Status</th>
                                            <th>SP</th>
                                            <th>User</th>
                                            <th width="20%">Name</th>
                                            <th width="10%">Index</th>
                                            <th>OLT</th>
                                            <th>Package</th>
                                            <th>PPPOE</th>
                                            <th>Phone</th>
                                            <!--BTN-->
                                            <th  width="20%">View</th>
                                        </tr>   
                                    </thead>
                                    <tbody id="search_data_result"> </tbody>
                        </table> 
                               
                </div>
            </div>   
        </div>    
    </div>
   <?php require('view_modal.php'); ?>
</body>

<!-- JavaScript Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-A3rJD856KowSb7dwlZdYEkO39Gagi7vIsF0jrRAoQmDKKtQBHUuLZ9AsSv4jD4Xa" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
   
   
    <script src="../script/rs.js"></script>
    <!-- <script src="../script/search_data.js"></script> -->
    <script src="../script/test_search.js"></script>
     <!-- JSON -->
   
</html>

