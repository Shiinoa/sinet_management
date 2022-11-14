<?php
session_start();

    if(isset($_POST['username'])){
        include("server.php");
        $username = $_POST['username'];
        $password = $_POST['password'];

        $sql="SELECT * FROM member 
                  WHERE  username='".$username."' 
                  AND  password='".$password."' ";
        $result = mysqli_query($conn , $sql);

    }
?>