<?php 
session_start();
require ('../config/server.php');
if(!isset($_SESSION['data_login'])){
    $_SESSION['error'] ="Please Login ";
    header('location: ../html/login.php');
}
include_once('../config/update_customer.php');
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <?php require('../menu/extension_web.php')?>
    <?php require('../menu/nav_file.php')?>
     <!--ICO-->
    <title>Edit_Customer</title>
   
    <style>
    .bg-cr{
    background-color: #b7d9f7;
    padding: 16px 20px;
    border: none;
    border-radius: 4px;
    }
    </style>
   
</head>
<body>
    <div class="container">
    <?php
        if(isset($_REQUEST['is_id'])){
           
            $is_id = $_GET['is_id'];}
            
            //$updateuser = new DB_conn();
            $select_data_id = $db->prepare("SELECT * FROM installed WHERE is_id = :is_id");
            $select_data_id->bindParam(':is_id',$is_id);
            $select_data_id->execute();
            //
            //$sql = $updateuser->fectchonerecord($userid);
            while($row = $select_data_id->fetch(PDO::FETCH_ASSOC))
        {  
         ?> 
          
        <form action="" method="POST" class="mt-5">
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
         <h3> Update Customer :: <?php echo $row['u_id'] ?></h3>
        <div class="bg-cr" >
            <div class="row g-3">
                <div class="col-sm-2">
                    <label for="">User ID</label>
                    <input type="text" class="form-control"  value="<?php echo $row['u_id'] ?>" disabled >
                    <input type="hidden" class="form-control" name="u_id" value="<?php echo $row['u_id'] ?>" >
                </div>
                <div class="col-sm-2">
                    <label for="">ISP</label>
                    <select id="inputState" class="form-select" name="isp" value="<?php echo $row['isp'] ?>">
                    <option selected>INET</option>
                    <option>CBN</option>
                    <option>SYMC</option>
                    </select>
                </div>
            
                <div class="col-sm-2">
                    <label for="">Status</label>
                    <select id="inputState" class="form-select" name="user_status" value="<?php echo $row['user_status'] ?>">
                    <option selected>open</option>
                    <option>suspend</option>
                    <option>hold</option>
                    <option>project</option>
                    <option>na</option>
                    <option>projectSI</option>
                    </select>
                </div>
                
                <div class="col-sm-2">
                    <label for="">G-pon</label>
                    <input type="text" class="form-control" name="mac_pon" value="<?php echo $row['mac_pon'] ?>" required>
                </div>
                <div class="col-sm-2">
                    <label for="">Model</label>
                    <input type="text" class="form-control" id="pmg_model" name="pmg_model" value="<?php echo $row['pmg_model'] ?>" hidden>
                    <select id="profile_select" class="form-select"  required>
                    <?php   $data_onu_type = $db->prepare("SELECT fttx_profile.p_name as p_name FROM  installed RIGHT JOIN fttx_profile ON installed.p_id=fttx_profile.p_id WHERE installed.is_id = $is_id ");
                            $data_onu_type->execute(); 
                            while($table =$data_onu_type->fetch(PDO::FETCH_ASSOC))   
                            {
                    ?>
                            <option value="<?php echo $table['p_name']; ?>" selected><?php echo $table['p_name']; ?></option> 
                    <?php }?>
                        
                    <?php 
                            $select_data_model = $db->prepare("SELECT * FROM fttx_profile");
                            $select_data_model->execute();
                            while($data_row =$select_data_model->fetch(PDO::FETCH_ASSOC))   
                            {
                    ?>
                            <option value="<?php echo $data_row['p_id']; ?>"><?php echo $data_row['p_name']; ?></option> 
                    <?php }?>
                    </select>
                </div>
                
                <div class="col-sm-2">
                    <label for="">Mode</label>
                    <select id="inputState" class="form-select" name="pmg_mode" value="<?php echo $row['pmg_mode'] ?>"  >
                    <option selected>route</option>
                    <option>bridge</option>
                    </select>
                </div>
                
            </div>
            <div class="row g-3 mt-1">
            
            <div class="col-sm-2">
                <label for="">Name Customer</label>
                <input type="text" class="form-control"  name="name" value="<?php echo $row['name'] ?>" >
            </div>
            <div class="col-sm-2">
                <label for="">Phone</label>
                <input type="text" class="form-control" name="phone_no"  value="<?php echo $row['phone_no'] ?>"  >
            </div>

            <div class="col-sm-2">
                <label>SP</label>
                <input type='text' class='form-control' id='sp_id' placeholder='Enter sp_id' name="sp"  value="<?php echo $row['sp'] ?>">
                <input type="text" class="form-control" id="sp_id__data" name="sp_id__data"  value="<?php echo $row['sp_id'] ?>" hidden>
                
            </div>

            <div class="col-sm-1">
                    <label for="">NODE</label>
                    <input type='number' class='form-control'  id='node_'  value="<?php echo $row['node'] ?>"  disabled>
                    <input type="text" class="form-control" name="node" value="" id='node_'  hidden>
                    
            </div>
            <div class="col-sm-1">
                    <label for="">OLT</label>
                    <?php   
                            $get_olt = $db->prepare("SELECT * From sp_detail WHERE sp_name = :sp_user ");
                            $get_olt->bindParam(":sp_user" , $row['sp']);
                            $get_olt->execute();

                            while($re_olt = $get_olt->fetch(PDO::FETCH_ASSOC)){

                            
                    ?>
                    <input type='number' class='form-control' id='olt_'value="<?php echo $re_olt['olt'] ?>" disabled>
                    <input type="text" class="form-control" name="olt" value="<?php echo $re_olt['olt'] ?>" id='olt_'  hidden>

                    <?php } ?>
                    
            </div>
            <div class="col-sm-1">
                <label>Vlan</label>
                <input type="text" class="form-control" name="vlan" value="<?php echo $row['vlan'] ?>" >
            </div>
            <div class="col-sm-1">
                <label for="">Vlan-mgn</label>
                <select id="inputState" class="form-select" name="vlan_m"  value="<?php echo $row['vlan_m'] ?>">
                    <option selected>20</option>
                    <option>40</option>
                    </select>
            </div>  
            <div class="col-sm-2">
                    <label for="">type</label>
                    <input type="text" class="form-control"  value="<?php echo $row['type']?>"disabled>
                    <input type="text" class="form-control" name="type" value="FTTh" hidden>
                </div>   
        </div>
        <div class="row g-2 mt-1">
        <div class="col-sm-1" >
            <label for="">PON -X</label>
            <input type="text" class="form-control" style="text-align: center;" id="pon1" name="pon1"  value="<?php echo $row['pon1'] ?>">
        </div>
        <div class="col-sm-1">
            <label for="">-X</label>
            <input type="text" class="form-control" style="text-align: center;" id="pon2" name="pon2"  value="<?php echo $row['pon2'] ?>">
        </div>
        <div class="col-sm-1">
            <label for="">-X</label>
            <input type="text" class="form-control" style="text-align: center;" id="pon3" name="pon3"  value="<?php echo $row['pon3'] ?>">
        </div>
        <div class="col-sm-3">
            <label for="">User PPPOE</label>
            <input type="text" class="form-control" placeholder="PPPOE" name="nonid" value="<?php echo $row['nonid'] ?>">
        </div>
        <div class="col-sm">
            <label for="">Password PPPOE</label>
            <input type="text" class="form-control" placeholder="Password PPPOE" name="pass" value="<?php echo $row['pass'] ?>">
            <input type="hidden" class="form-control "name="pass_onu" id="pass_onu" value="<?php echo $row['pass_onu'] ?>" >
            <input type="hidden" class="form-control "name="p_id" id="p_id" value="<?php echo $row['p_id'] ?>" >
            <input type="text" class="form-control" value="0" name="dataport" hidden>
        </div>
        <div class="col-sm">
            <label for="">Package</label>
            <select id="inputState" class="form-select" name="tc_code" value="<?php echo $row['tc_code'] ?>" required>
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
    <?php 
    } 
    ?>
        </div>
        <div class="row g-3 mt-1">
            <div class="col-sm-3">
                <button type="submit"  name="update" class="btn btn-success">Update</button>
            </div>
        </div>
        </div>
    </form>
   
    </div>
    <script>
    $('#profile_select').on('change', function(){
        let profile_select_data = document.getElementById('profile_select').value;
        console.log(profile_select_data);
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
<script src='req_data_sp.js'></script>