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
<title>Add Profile Data</title>
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
            <h2>Add Profile Data</h2> <hr>
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
                    <form  method="POST">
                    <label for="" style="color: red;">ใส่ชื่อ Profile **</label><br>                  
                    <input id="set_name_onu" value="" required></input><br><br>
                    <label for=""  style="color: red;">ใส่ mode Profile **</label><br>     
                    <select class="form-select " aria-label="select-status" id="mode_status" name="mode_status" >
                        <option selected value="">mode onu</option>
                        <option value="route">route</option>
                        <option value="bridge">bridge</option>         
                    </select> <br>
                    <label for="" style="color: red;">ใส่ Password Profile **</label><br>                  
                    <input id="set_pass_onu" value="" required></input><br><br>  
                    <a type="submit" id="insert" class="btn btn-success">Add Profile</a>
                    </form>
                    
                    
                 </div> 
                 <div class="col ">
                        <textarea name="show_profile" id="show_profile" cols="110" rows="30" style="text-align:left;"></textarea>
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
     $('#check_status').change(function(){
        let profile_select = document.getElementById('check_status').value;
        $.ajax({
            url:'../config/profile_manage_db.php',
            type:"POST",
            dataType:"JSON",
            data: {profile_select:profile_select},
            success: function(data_profile_select){
                for (let index = 0; index < data_profile_select.length; index++) {
                $('#show_profile').html(data_profile_select[index].data_profile);
                $('#set_pass_onu').val(data_profile_select[index].password_profile);
                $('#mode_status').val(data_profile_select[index].mode_profile);
                
                //$('#find_profile').html(data_profile_select);
            }
              
            }
            
        });
    });

    $("#insert").click(function() {
        let new_name = document.getElementById('set_name_onu').value;
        let mode_status = document.getElementById('mode_status').value;
        let set_pass_onu = document.getElementById('set_pass_onu').value;
        if(new_name != ""){
            let new_profile = document.getElementById('show_profile').value;
            $.ajax({
                url:'../config/insert_profile_manage_db.php',
                type:"POST",
                data: {new_name:new_name , new_profile:new_profile , mode_status:mode_status ,set_pass_onu:set_pass_onu},
                cache: false,
                beforeSend: function () {
                    if(new_name != "" && new_profile != ""){
                        console.log("Data on link");
                    }
                    else{
                        console.log("Data not found");
                    }
                    
                },
                success: function(data){
                    window.alert(data);
                    window.location = './add_profile.php';
                }
                
            });
        }else {
            console.log("null");
            
        }
            

           
           
            
    });


</script>