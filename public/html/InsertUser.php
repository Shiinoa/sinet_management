<?php

    session_start();
    if(!isset($_SESSION['data_login'])){
        $_SESSION['error'] ="Please Login ";
        header('location: ../html/login.php');
    }
    require_once('../config/server.php');
    if(isset($_REQUEST['insert'])){
        $username = $_REQUEST['username'];
        $password = $_REQUEST['password'];
        $name = $_REQUEST['name'];
        $phone_no = $_REQUEST['phone_no'];
        $email = $_REQUEST['email'];
        $send_sms = $_REQUEST['send_sms'];
        $send_mail = $_REQUEST['send_mail'];
        $gender = $_REQUEST['gender'];
        $dept = $_REQUEST['dept'];
        $status = $_REQUEST['status'];
        //$password = md5($password);

        if(empty($username)){
            $errMsg = "NOT NULL";
        }else if(empty($password)){
            $errMsg = "NOT NULL";
        }else {
            try {
                if(!isset($errMsg)){
                //$passwordHash = password_hash($password,PASSWORD_DEFAULT);
                $insertData = $db->prepare("INSERT INTO member(username, password ,name ,phone_no, email, send_sms ,send_mail, gender ,dept, status) 
                    VALUES(:username, :password ,:name ,:phone_no, :email,:send_sms ,:send_mail,:gender ,:dept,:status) ");
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
                    echo '<script>alert("Add Success");</script>';
                    //$insertMsg = "Add Success";
                    header("refresh:0.5;../html/showUser.php");
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
    <title>ADD USER</title>
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
        <div class="mt-5">
            <h1>ADD USER</h1></div>
            <a href="../html/showUser.php" class="btn btn-primary mt-3">Show User</a>
            <hr>
            <form action="" method="POST">
            <div class="mb-3">
                <label for="formGroupExampleInput" class="form-label">Username</label>
                <input type="text" class="form-control" name="username" placeholder="Username" required>
            </div>
            <div class="mb-3">
                <label for="formGroupExampleInput2" class="form-label">Password</label>
                <input type="password" class="form-control" name="password" placeholder="Password" required>
            </div>
            <!--Insert Data-->
            <div class="row">
                <div class="col">
                    <input type="text" class="form-control" name="name" placeholder="First name and Last name" aria-label="First name and Last name" required>
                </div>
                <div class="col">
                    <input type="text" class="form-control" name="phone_no" placeholder="Phone_no" aria-label="Phone_no">   
                </div>
                <div class="col">
                    <input type="email" class="form-control" name="email" placeholder="email" aria-label="email">   
                </div>   
            </div><br>
            <div class="row">
                <div class="col"> 
                    <select name="send_sms" class="form-select">
                    <option selected>send_sms...</option>
                    <option>send</option>
                    <option>not_send</option>
                    </select>
                </div>
                <div class="col"> 
                    <select name="send_mail" class="form-select" required>
                    <option selected>send_mail...</option>
                    <option>send</option>
                    <option>not_send</option>
                    </select>
                </div>
                <div class="col"> 
                    <select name="gender" class="form-select">
                    <option selected>gender...</option>
                    <option>male</option>
                    <option>female</option>
                    </select>
                </div>
                <div class="col"> 
                    <select name="dept" class="form-select">
                    <option selected>depertment...</option>
                    <option>nockkn</option>
                    <option>admin</option>
                    <option>installkkn</option>
                    <option>Special Service</option>
                    <option>Dev-WebManagement</option>
                    </select>
                
                </div>
                <div class="col"> 
                <select name="status" class="form-select">
                    <option selected>status...</option>
                    <option>ADMIN</option>
                    <option>USER</option>
                    </select>
                </div>
            </div><br>
            <div class="row">
            <div class="md-3">
               <button type="submit" name="insert" class="btn btn-success">Submit</button>
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