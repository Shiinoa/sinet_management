<?php
    
    session_start();
    if(!isset($_SESSION['status'])){
        $data_st = $_SESSION['status'];
    }
    if(!isset($_SESSION['data_login'])){
        $_SESSION['error'] ="Please Login ";
        header('location: ../html/login.php');
    }

    include_once('../config/server.php');
    if(isset($_POST['update']))
    {
        $userid = $_GET['userid'];
        $username = $_POST['username'];
        $password = $_POST['password'];
        $name = $_POST['name'];
        $phone_no = $_POST['phone_no'];
        $email = $_POST['email'];
        $send_sms = $_POST['send_sms'];
        $send_mail = $_POST['send_mail'];
        $gender = $_POST['gender'];
        $dept = $_POST['dept'];
        $status = $_POST['status'];
        
        if(empty($username)){
            $errMsg = "NOT NULL";
        }else if(empty($password)){
            $errMsg = "NOT NULL";
        }else {
            try {
                if(!isset($errMsg)){
                    $insertData = $db->prepare("UPDATE member SET username=:username, password=:password ,name=:name ,phone_no=:phone_no, email=:email, send_sms=:send_sms ,send_mail=:send_mail, gender=:gender ,dept=:dept, status=:status
                    WHERE userid = $userid ");
                   
                    $insertData->bindParam(':username',$username);
                    $insertData->bindParam(':password',$password);
                    $insertData->bindParam(':name',$name);
                    $insertData->bindParam(':phone_no',$phone_no);
                    $insertData->bindParam(':email',$email);
                    $insertData->bindParam(':send_sms',$send_sms);
                    $insertData->bindParam(':send_mail',$send_mail);
                    $insertData->bindParam(':gender',$gender);
                    $insertData->bindParam(':dept',$dept);
                    $insertData->bindParam(':status',$status);
                    
                    
                    if($insertData->execute()){
                        echo '<script>alert("UPDATE Success");</script>';
                        //$insertMsg = "Add Success";
                        header("refresh:0.5;../html/index_admin.php");
                       
                    }
                    

                   
                }
            } catch (PDOException $e) {
                echo $e;
            }
        }

    }
    
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <?php require('../menu/extension_web.php')?>
    <?php require('../menu/nav_file.php')?>
    <title>Update Page</title>
    <?php if(isset($_SESSION['error'])) { ?>
        <div class="alert alert-danger" role="alert">
            <?php  echo ($_SESSION['error']);
            //unset ถ้าไม่ใส่ SESSION จะค้าง
            unset($_SESSION['error']);
    ?>
    </div>
    <?php } ?>
</head>
<body>
    <div class="container">
        <h1 class="mt-5">Update Page</h1>
        <hr>     
        <?php
            $userid = $_GET['userid'];
            //$updateuser = new DB_conn();
            $select_data_id = $db->prepare("SELECT * FROM member WHERE userid = :userid");
            $select_data_id->bindParam(':userid',$userid);
            $select_data_id->execute();
            //
            //$sql = $updateuser->fectchonerecord($userid);
            while($row = $select_data_id->fetch(PDO::FETCH_ASSOC))
        {  
         ?>
            <form action="" method="POST">
                <div class="mb-3">
                    <label for="formGroupExampleInput" class="form-label">Username</label>
                    <input type="text" class="form-control" name="username" placeholder="Username" 
                    value="<?php echo $row['username']?>"
                    required>
                </div>
                <div class="mb-3">
                    <label for="formGroupExampleInput2" class="form-label">Password</label>
                    <input type="text" class="form-control" name="password" placeholder="Password"
                    value="<?php echo $row['password']?>"
                    required>
                </div>
                <!--Insert Data-->
                <div class="row">
                    <div class="col">
                        <label for="">name</label>
                        <input type="text" class="form-control" name="name" placeholder="First name and Last name" aria-label="First name and Last name"
                        value="<?php echo $row['name']?>"
                        required>
                    </div>
                    <div class="col">
                        <label for="">phone_no</label>
                        <input type="text" class="form-control" name="phone_no" placeholder="Phone_no" aria-label="Phone_no"
                        value="<?php echo $row['phone_no']?>" >   
                    </div>
                    <div class="col">
                        <label for="">email</label>
                        <input type="email" class="form-control" name="email" placeholder="email" aria-label="email"
                        value="<?php echo $row['email']?>" >   
                    </div>   
                </div><br>
                <div class="row">
                    <div class="col"> 
                        <label for="">send_sms</label>
                        <select name="send_sms" class="form-select" value="<?php echo $row['send_sms']?>" >
                        <option selected><?php echo $row['send_sms']?></option>
                        <option>send</option>
                        <option>not_send</option>
                        </select>
                    </div>
                    <div class="col"> 
                        <label for="">send_mail</label>
                        <select name="send_mail" class="form-select" value="<?php echo $row['send_mail']?>" >
                        <option selected><?php echo $row['send_mail']?></option>
                        <option>send</option>
                        <option>not_send</option>
                        </select>
                    </div>
                    <div class="col"> 
                        <label for="">gender</label>
                        <select name="gender" class="form-select" value="<?php echo $row['gender']?>" >
                        <option selected><?php echo $row['gender']?></option>
                        <option>male</option>
                        <option>female</option>
                        </select>
                    </div>
                    <div class="col"> 
                        <label for="">dept</label>
                        <select name="dept" class="form-select" value="" >
                        <option selected><?php echo $row['dept']?></option>
                        <option>nockkn</option>
                        <option>admin</option>
                        <option>installkkn</option>
                        <option>Special Service</option>
                        <option>Dev-WebManagement</option>
                        </select>
                    
                    </div>
                    <div class="col"> 
                        <label for="">status</label>
                        <select name="status" class="form-select" required>
                        <option selected ><?php echo $row['status']?></option>
                        <?php  if(isset($_SESSION['status']) != 'ADMIN') : ?> 
                        <option hidden>ADMIN</option>
                        <?php endif ?>
                        <option>USER</option>
                        </select>
                    </div>
        <?php  
        } 
        ?>
            </div><br>
            <div class="row">
            <div class="md-3">
               <button type="submit" name="update" class="btn btn-success">UPDATE</button>
            </div>
            </div>
            </form>
    </div>
</body>
<!-- JavaScript Bundle with Popper -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-A3rJD856KowSb7dwlZdYEkO39Gagi7vIsF0jrRAoQmDKKtQBHUuLZ9AsSv4jD4Xa" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
   
</html>