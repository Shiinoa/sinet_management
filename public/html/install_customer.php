<?php 
session_start();
    include '../config/server.php';
    if(!isset($_SESSION['data_login'])){
        $_SESSION['error'] ="Please Login ";
        header('location: ../html/login.php');
    }
?>
<!DOCTYPE html>
<html lang="en">
    <?php require('../menu/extension_web.php')?>
    <?php require('../menu/nav_file.php')?>
   
<head>
    <title>Create_Customer</title>
    
    <style>
    .bg-cr{
    background-color: #d1d1e0;
    padding: 16px 20px;
    border: none;
    border-radius: 4px;
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
    <!--NAV-->
</head>
<body>
    <div class="container">
    <form class="mt-5" action="../config/insert_customer.php" method="post">
        <h3> สร้างงานติดตั้ง ::</h3>
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
        <div class="bg-cr" >
            <div class="row g-3">
                <div class="col-sm-2">
                    <label for="">User ID</label>
                    <input type="text" class="form-control" placeholder="4000xxxx" name="u_id" required>
                </div>
                <div class="col-sm-2">
                    <label for="">ISP</label>
                    <select id="inputState" class="form-select" name="isp" required>
                    <option selected>INET</option>
                    <option>CBN</option>
                    <option>SYMC</option>
                    </select>
                </div>
            
                <div class="col-sm-2">
                    <label for="">Status</label>
                    <select id="inputState" class="form-select" name="user_status" required>
                    <option selected>status</option>
                    <?php 
                            $data_olt_res = $db->query("SELECT DISTINCT user_status FROM installed ORDER BY user_status ");
                                                    
                            while($row = $data_olt_res->fetch()){
                        ?>
                            <option value="<?php echo $row['user_status']?>"><?php echo $row['user_status']?></option>

                    <?php }?>

                    </select>
                </div>
                
                <div class="col-sm-2">
                    <label for="">G-pon</label>
                    <input type="text" class="form-control" name="mac_pon">
                </div>
                <div class="col-sm-2">
                    <label for="">Model</label>
                    <input type="text" class="form-control" id="p_id" name="p_id_data" value="" hidden>
                    <input type="text" class="form-control" value="" id="pmg_model" name="pmg_model" hidden>
                    <select id="profile_select"  name="profile_select" class="form-select" required>
                    <?php 
                            $select_data_model = $db->prepare("SELECT * FROM fttx_profile ");
                            $select_data_model->execute();
                            while($data_row =$select_data_model->fetch(PDO::FETCH_ASSOC))
                            {
                    ?>
                    <option selected value="<?php echo $data_row['p_id']; ?>"><?php echo $data_row['p_name']; ?></option> 
                    <?php }?>
                    </select>
                </div>
                
                <div class="col-sm-2">
                    <label for="">Mode</label>
                    <select id="inputState" class="form-select" name="pmg_mode" required>
                    <option selected>route</option>
                    <option>bridge</option>
                    </select>
                </div>
                
            </div>
            <div class="row g-3 mt-1">
            
            <div class="col-sm-2">
                <label for="">Name Customer</label>
                <input type="text" class="form-control"  name="name" required>
            </div>
            <div class="col-sm-2">
                <label for="">Phone</label>
                <input type="text" class="form-control" name="phone_no" required>
            </div>

            <div class="col-sm-2">
                <label>SP</label>
                <input type='text' class='form-control' id='sp_id' placeholder='Enter sp_id' name="sp" required>
                <input type="text" class="form-control" value="" id="sp_id__data" name="sp_id__data" hidden>
                
            </div>

            <div class="col-sm-1">
                    <label for="">NODE</label>
                    <input type='number' class='form-control'  id='node_'  value="" disabled>
                    <input type="text" class="form-control" name="node" value="" id='node_'  hidden>
                    
            </div>
            <div class="col-sm-1">
                    <label for="">OLT</label>
                    <input type='number' class='form-control' id='olt_'  value="" disabled>
                    <input type="text" class="form-control" name="olt" value="" id='olt_'  hidden>
                    
            </div>
            <div class="col-sm-1">
                <label>Vlan</label>
                <input type="text" class="form-control" name="vlan" required>
            </div>
            <div class="col-sm-1">
                <label for="">Vlan-mgn</label>
                <select id="inputState" class="form-select" name="vlan_m" required>
                    <option selected>20</option>
                    <option>40</option>
                    </select>
            </div>  
            <div class="col-sm-2">
                    <label for="">type</label>
                    <input type="text" class="form-control"  value="FTTh" disabled>
                    <input type="text" class="form-control" name="type" value="FTTh" hidden>
                    
                    
                </div>   
        </div>
        <div class="row g-2 mt-1">
        <div class="col-sm-1" >
            <label for="">PON -X</label>
            <input type="text" class="form-control" style="text-align: center;" id="pon1" name="pon1">
        </div>
        <div class="col-sm-1">
            <label for="">-X</label>
            <input type="text" class="form-control" style="text-align: center;" id="pon2" name="pon2">
        </div>
        <div class="col-sm-1">
            <label for="">-X</label>
            <input type="text" class="form-control" style="text-align: center;" id="pon3" name="pon3">
            <input type="text" class="form-control" value="" id="ont" name="ont" hidden>
            
        </div>
        <div class="col-sm-3">
            <label for="">User PPPOE</label>
            <input type="text" class="form-control" placeholder="PPPOE" name="nonid">
        </div>
        <div class="col-sm">
            <label for="">Password PPPOE</label>
            <input type="text" class="form-control" placeholder="Password PPPOE" name="pass">
            <input type="hidden" class="form-control "name="pass_onu" id="pass_onu" value="" >
            <input type="hidden" class="form-control "name="p_id" id="p_id" value="" >
            <input type="text" class="form-control" value="0" name="dataport" hidden>
        </div>
        <div class="col-sm">
            <label for="">Package * Profile Lock 1000/1000</label>
            <select id="inputState" class="form-select" name="tc_code" required>
            <?php 
                    $select_data_tcon = $db->prepare("SELECT * FROM tcon ");
                    $select_data_tcon->execute();
                    while($data_row =$select_data_tcon->fetch(PDO::FETCH_ASSOC))
                    {
                ?>
                    <option selected value="<?php echo $data_row['tc_code']; ?>"><?php echo $data_row['tc_code']; ?></option> 
                <?php }?>
            </select>
        </div>
        
        </div>
        <div class="row g-3 mt-1">
            <div class="col-sm-3">
                <button type="submit"  name="insert" class="btn btn-success">Save</button>
                <button type="submit"  name="show_customer" class="btn btn-warning" data-target="#myModal" data-toggle="modal">Save & View</button>
            </div>
        </div>
        </div>
    </form>
    <div class="mt-3">
            <h3>ข้อมูลที่ติดตั้งล่าสุด :: </h3>
                    <div class="panel-body">    
                                    <table id="mytable" class="table table-bordered border-Secondarys">
                                        <thead align="center">
                                                
                                                <th>ID</th>
                                                <th>Name</th>
                                                <th>G-PON</th>
                                                <th>SP</th>
                                                <th>NODE</th>
                                                <th>Package</th>
                                                <th>PPPOE</th>
                                                <!--BTN-->
                                                <th>View</th>
                                                
                                        </thead>
                                        <tbody id="search_data_result"></tbody>
                                </table>      
                    </div>
            </div>
        <div class="mt-3">
            <h3>ข้อมูลที่ติดตั้งไม่สำเร็จ :: </h3>
                    <div class="panel-body">    
                                    <table id="mytable" class="table table-bordered table-striped">
                                        <thead align="center">
                                                
                                                <th>ID</th>
                                                <th>Name</th>
                                                <th>G-PON</th>
                                                <th>SP</th>
                                                <th>NODE</th>
                                                <th>Package</th>
                                                <th>PPPOE</th>
                                                <!--BTN-->
                                                <th>View</th>
                                                
                                        </thead>
                                        <tbody>
                                            <?php 
                                                $select_data = $db->prepare("SELECT * FROM installed WHERE mac_pon LIKE '' LIMIT 20 ");
                                                $select_data->execute();
                                                while ($row = $select_data->fetch(PDO::FETCH_ASSOC)) {    
                                            ?>
                                                <tr>
                                                    
                                                    <td><?php echo $row['u_id']; ?></td>
                                                    <td><?php echo $row['name']; ?></td>
                                                    <td><?php echo $row['mac_pon']; ?> </td>
                                                    <td><?php echo $row['sp']; ?></td>
                                                    <td><?php echo $row['node']; ?> - <?php
                                                        $g_sp= $row['sp_id'];
                                                        $sp_id = $db->prepare("SELECT * FROM sp_detail WHERE sp_id = :g_sp ");
                                                        $sp_id->bindParam(':g_sp',$g_sp);
                                                        $sp_id->execute();
                                                    while ($row2 = $sp_id->fetch(PDO::FETCH_ASSOC)) {
                                                        echo $row2['olt'];
                                                    } ?></td>
                                                    <td><?php echo $row['tc_code']; ?></td>
                                                    <td><?php echo $row['nonid']; ?></td>
                                                    <!--BTN-->
                                                    <td align="center"> 
                                                    <a href="update_customer_db.php?is_id=<?php echo $row['is_id'] ?>" class="btn btn-warning">Edit</a>
                                                    <a href="../config/delete_customer_db.php?is_id=<?php echo $row['is_id']; ?>" class="btn btn-danger" onclick="return comfirm('Are you sure want to delete');">Delete</a></td>
                                                </tr>

                                            <?php }
                                            ?>
                                        </tbody>
                                </table>      
                    </div>
        </div>
    <?php require('view_modal.php'); ?>
    <script>
    $('#profile_select').on('change', function(){
        let profile_select_data = document.getElementById('profile_select').value;
        $.ajax({
            url:'../config/profile_manage_db.php',
            type:"POST",
            dataType:"JSON",
            data: {profile_select:profile_select_data},
            beforeSend: function() { console.log("send profile ");  },
            success: function(response){
                for (let index = 0; index < response.length; index++) {
                        let data_pass = response[index].password_profile; 
                        let data_p_id = response[index].id_profile; 
                        $('input[name="pass_onu"]').attr('value',data_pass);
                        $('input[name="p_id"]').attr('value',data_p_id); 
                        
                        console.log($('input[name="pass_onu"]').value);
                        console.log($('input[name="p_id"]').value);
                }   
            }
        });
        
    });

    </script>
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
<!-- <script src='pon_setting.js'></script> -->

<!-- Get SP List -->
<script src='req_data_sp.js'></script>

<!-- Get DATA New Customer -->
<script src='../script/customer_new.js'></script>
