<?php 
    session_start();
    include('server.php');
    
    $errors = array();

    if(isset($_POST['login_user']))
    {
        //ดึงค่ามาจาก หน้า login
        $username = $_POST['username'];
        $password = $_POST['password'];
        
        if(empty($username)){
            $_SESSION['error'] = 'Usernname is NULL';
            header("location: ../html/login.php");
        }else if(empty($password)){
            $_SESSION['error'] ='Password is NULL';
            header("location: ../html/login.php");
        }else{  //check user//pass
            try {
                //code...
                $checkuser = $db->prepare("SELECT * FROM member WHERE username = :username ");
                $checkuser->bindParam(":username",$username);
                $checkuser->execute();
                $row = $checkuser->fetch(PDO::FETCH_ASSOC);

                if($checkuser->rowCount() > 0)
                {
                    if($username == $row['username'])
                    {
                        if($password == $row['password']){
                            $_SESSION['status'] = $row['status'];
                            $_SESSION['id'] = $row['userid'];
                        //if(password_verify($password,$row['password'])){
                            if($row['status'] != null){
                                $_SESSION['data_login'] =$row['name'];
                                header("refresh:1; ../html/index_admin.php");
                            }/*else{
                                $_SESSION['user_login'] =$row['name'];
                                header("refresh:1; ../html/index_admin.php");
                            }*/
                        }
                        else{
                            $_SESSION['error'] = 'Password Failed ::'. $password .'DATA ::' .$row['username'] ;
                            header("location: ../html/login.php");
                        }
                    }else{
                        $_SESSION['error'] = 'User Failed ';
                        header("location: ../html/login.php");
                    }
                }else{
                    $_SESSION['error'] = 'NO USER IN DATA PLS Contact NOC ';
                    header("location: ../html/login.php");
                }
            } catch (PDOException $e) {
                echo $e->getMessage();
            }

        }
    }
?>