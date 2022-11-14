<?php 
session_start();
include '../config/server.php';
    if(!isset($_SESSION['data_login'])){
        $_SESSION['error'] ="Please Login ";
        header('location:../html/login.php');
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
<?php require('../menu/extension_web.php')?>
<?php require('../menu/nav_file.php')?>
<title>Check Profile Data</title>
<style>
.colSearch {
    width: 250px;
    font-size: 17px;
    }
    table {
    width: 50%;
    }
    th {
    height: 70px;
    align-items: center;
    }
    .textediter{
        position: absolute;
        margin-top:5px;
        margin-left: 10px;
    }
    
</style>

</head>
<body>
    <div class="container">
        <div class="mt-5">
            <h2>Check Profile Data</h2> <hr>
            <form action="" method="post">
               
                        <div class="row ">
                            <div class="col-md-5 colSearch">
                                <select class="form-select " aria-label="select-status" id="check_status" name="check_status" >
                                    <option selected value="">TYPE ONU</option>
                                    <?php
                                        $data_onu = $db->prepare("SELECT p_name , p_id FROM fttx_profile");
                                        $data_onu->execute();

                                        while($data = $data_onu->fetch(PDO::FETCH_ASSOC))
                                        {
                                        ?>    
                                    <option value="<?php echo $data['p_id']?>"><?php echo $data['p_name']?></option>
                                    <?php
                                        }
                                     ?>  
                                </select> 
                            </div>  
                            
                        </div>  
                                  
                 <hr>
                 <div class="row textediter"> 
                 <div class="col ">
                    <p id="show_name_onu" value=""></p>
                    <div>
                        <label for="">Password ONU</label><br>
                        <input type="text" id="password_profile" name="password_profile" value="">
                    </div><br>
                    <a id="Edit_profile" class="btn btn-warning">Edit Profile</a><br><br>
                    <a id="update_profile" class="btn btn-info">Update Profile</a><br><br>
                    <a id="del_profile" class="btn btn-danger">Remove Profile</a><br>
                   
                 </div> 
                 <div class="col ">
                        <textarea name="find_profile" id="find_profile" cols="110" rows="30" style="text-align:left;"></textarea>
                 </div>
                 </div>
                
            </form>
          
            <br>
            
            
        </div>
        
    </div>
</body>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-A3rJD856KowSb7dwlZdYEkO39Gagi7vIsF0jrRAoQmDKKtQBHUuLZ9AsSv4jD4Xa" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
</html>
<script>
    
    $('#Edit_profile').click(function(){
        document.getElementById('find_profile').disabled = false;
        document.getElementById('password_profile').disabled = false;  
    });
    $('#check_status').change(function(){
        let show_name = document.getElementById('show_name_onu').value;
        let profile_select = document.getElementById('check_status').value;
        show_name = document.getElementById('show_name_onu').innerHTML = "ID ONU :: "+profile_select;
        $.ajax({
            url:'../config/profile_manage_db.php',
            type:"POST",
            dataType:"JSON",
            data: {profile_select:profile_select},
            success: function(response){
            for (let index = 0; index < response.length; index++) {
                $('#find_profile').html(response[index].data_profile);
                $('#password_profile').val(response[index].password_profile);
                //$('#find_profile').html(data_profile_select);
            }
            document.getElementById('find_profile').disabled = true;  
            document.getElementById('password_profile').disabled = true;  
            }
            
        });

       
    });

    $('#update_profile').click(function(){
            let sh_profile = document.getElementById('find_profile').value;
            let data_select = document.getElementById('check_status').value;
            let password_profile = document.getElementById('password_profile').value;
            $.ajax({
                url:'../config/update_profile_db.php',
                type:"POST",
                data: {profile_select:data_select ,sh_profile:sh_profile,password_profile:password_profile},
                success: function(data_update_profile){
                    window.alert(data_update_profile);
                    window.location = './profile_data.php';
                }
                });
                
    });

    $('#del_profile').click(function(){
            let data_select = document.getElementById('check_status').value;
            console.log(data_select);
            $.ajax({
                url:'../config/delete_profile_db.php',
                type:"GET",
                data: {data_select:data_select},
                success: function(data){
                    window.alert(data);
                    window.location = './profile_data.php';
                }
                });
                
    });
      
   
                
    
</script>