<?php 
include_once('../config/server.php');
session_start();
    if(!isset($_SESSION['data_login'])){
        $_SESSION['error'] ="Please Login ";
        header('location: ../html/login.php');
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <?php require('../menu/extension_web.php')?>
    <?php require('../menu/nav_file.php')?>
    
    
</head>
<body>
        <div class="container">
        <h1 class="mt-3">Infomation Page</h1>
        <a href="../html/InsertUser.php" class="btn btn-success mt-3">ADD DATA</a>
        <hr>

            <table id="mytable" class="table table-dark table-striped">
                <thead>
                    
                    <th>username</th>
                    <th>name</th>
                    
                    <th>send_sms</th>
                    <th>send_mail</th>
                    <th>gender</th>
                    <th>dept</th>
                    <th>status</th>
                    <!--BTN-->
                    <th>Edit</th>
                    <th>Delete</th>
                </thead>
                <tbody>
                    <p><?php //COUNT DATA LIKE "SELECT userid  FROM member WHERE userid LIKE '4001' "
                    $result_count = "SELECT count(userid)  FROM member ";
                    $pdo_res = $db->prepare($result_count);
                    $pdo_res->execute();
                    $table = $pdo_res->fetchColumn();
                    echo "<h3>TOTAL:: $table USER</h3>";
                    ?>
                    </p>
                    <?php
                        //include_once('../config/function.php');
                        //$fetchdata = new DB_conn();
                        //$sql = $fetchdata->fetcdata();
                        $select_data = $db->prepare("SELECT * FROM member");
                        $select_data->execute();
                        while ($row = $select_data->fetch(PDO::FETCH_ASSOC)) {
                            # code...
                    ?>
                        <tr>
                            
                            <td><?php echo $row['username']; ?></td>
                            <td><?php echo $row['name']; ?></td>
                            <td><?php echo $row['send_sms']; ?></td>
                            <td><?php echo $row['send_mail']; ?></td>
                            <td><?php echo $row['gender']; ?></td>
                            <td><?php echo $row['dept']; ?></td>
                            <td><?php echo $row['status']; ?></td>
                            <td><a href="updateUser.php?userid=<?php echo $row['userid']; ?>" class="btn btn-primary">Edit</a></td>
                            <td><a href="deleteUser.php?del=<?php echo $row['userid']; ?>" class="btn btn-danger">Delete</a></td>
                        </tr>

                    <?php       
                        }
                    ?>

                </tbody>
            </table>

        </div>
</body>
<!-- JavaScript Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-A3rJD856KowSb7dwlZdYEkO39Gagi7vIsF0jrRAoQmDKKtQBHUuLZ9AsSv4jD4Xa" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
    
</html>