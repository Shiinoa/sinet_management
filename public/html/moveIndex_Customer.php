<?php 
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <?php require('../menu/extension_web.php')?>
    <?php require('../menu/nav_file.php')?>
    <title>ย้าย Index ลูกค้า</title>
    <style>
    .inputSetting{
        width: 2rem;
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
    form { padding: 0; margin: 0 }
        
    </style>
</head>
<body>
    <div class="container">
        <div class="row mt-5">
            <div class="col">
                <h4>ย้าย Index ลูกค้า</h4>
            </div><hr>
            <div class="col-md-12">
                <table id="table_setting" class="table table-bordered border-warning">
                                        <thead class="p-3 mb-3 bg-warning text-light" style="text-align:center;">
                                            <tr>   
                                                <th>SP</th>
                                            </tr>   
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td style="width: 20rem; text-align: center;">
                                                <div class="input-group">
                                                    <div class="input-group">
                                                    <input class="form-control rounded me-3" placeholder="ค้นหา SP" aria-label="Search" aria-describedby="search-addon" type="search" name="search_data"id="sp_id" />   
                                                    <span class="input-group-text border-0" id="search-addon">
                                                    </div>
                                                </div>
                                                </td>
                                               
                                               
                                            </tr>
                        </tbody>
                </table> 
            </div><hr>
            <?php  if(isset($_SESSION['success_update_index'])) {?>
                    <div class="alert alert-success">
                    <?php  echo $_SESSION['success_update_index']; 
                        unset( $_SESSION['success_update_index']); 
                    ?>
                    </div>
            <?php  }?>
            <?php  if(isset($_SESSION['error_update_index'])) {?>
                    <div class="alert alert-danger">
                    <?php  echo $_SESSION['error_update_index']; 
                        unset( $_SESSION['error_update_index']); 
                    ?>
                    </div>
            <?php  }?>
            <div class="col-md-12">
           
                <table id="resultdata" class="table table-bordered border-success ">
                                        <thead class="p-3 mb-3 bg-success text-light" style="text-align:center;">
                                            <tr>   
                                                <th >SP</th>
                                                <th>Customer</th>
                                                <th>G-Pon</th>
                                                <th>Index</th>
                                                <th>New Index</th>
                                                <th>Action</th>
                                                <th>Status Data</th>
                                               
                                                
                                            </tr>   
                                        </thead>
                                        <tbody id="result_data"></tbody>
                </table> 
            
            </div>
         
        </div>
        
    </div>
    <?php require('view_moveGpon.php'); ?>
</body>
            <!-- JavaScript Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-A3rJD856KowSb7dwlZdYEkO39Gagi7vIsF0jrRAoQmDKKtQBHUuLZ9AsSv4jD4Xa" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
    <link href="https://code.jquery.com/ui/1.10.2/themes/smoothness/jquery-ui.min.css" rel="stylesheet">
    <script src="https://code.jquery.com/ui/1.10.2/jquery-ui.min.js"></script>
   
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.6.0/dist/jquery.min.js"></script>
    <link href="http://code.jquery.com/ui/1.10.2/themes/smoothness/jquery-ui.css" rel="Stylesheet">
    <script src="https://code.jquery.com/jquery-migrate-3.0.0.min.js"></script>
    <script src="http://code.jquery.com/ui/1.10.2/jquery-ui.js" ></script>
    
</html>
<script src='../script/get_sp_olt_pon.js'></script>
