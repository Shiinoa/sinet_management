<?php
//CRUD NORMAL 
use LDAP\Result;
    
    /*define('DB_SERVER','localhost');
    define('DB_USER','root');
    define('DB_PASS','');
    define('DB_NAME','sinet-kkn');*/

    class DB_conn {
        function __construct()
        {
            include('server.php');
            //$conn = mysqli_connect(DB_SERVER,DB_USER,DB_PASS,DB_NAME);
            $this->dbcon = $db;

            ///check Connect
            if(mysqli_connect_errno()){
                echo "Failed to Connect to MYSQL : " . mysqli_connect_error();
            }
        }

        public function insert($username, $password ,$name ,$phone_no, $email, $send_sms ,$send_mail, $gender ,$dept, $status){
            $result = mysqli_query($this->dbcon,"INSERT INTO member(username, password ,name ,phone_no, email, send_sms ,send_mail, gender ,dept, status) 
            VALUES('$username', '$password' ,'$name' ,'$phone_no', '$email', '$send_sms' ,'$send_mail', '$gender' ,'$dept', '$status')");
            return $result;
        }
        public function fetcdata(){ 
            $result = mysqli_query($this->dbcon, "SELECT * FROM member");
            return $result;
        }
        public function fectchonerecord($userid){
            $result = mysqli_query($this->dbcon,"SELECT * FROM member WHERE userid = '$userid' ");
            return $result;
        }

        public function update($username, $password ,$name ,$phone_no, $email, $send_sms ,$send_mail, $gender ,$dept, $status,$userid){
            $result = mysqli_query($this->dbcon,"UPDATE member SET
                username = '$username',
                password = '$password',
                name = '$name',
                phone_no = '$phone_no',
                email = '$email',
                send_sms = '$send_sms',
                send_mail = '$send_mail',
                gender = '$gender',
                dept = '$dept',
                status = '$status' 

                WHERE userid = '$userid' 
            ");
            return $result;
        }

        public function delete($userid){
            $deleteRecorrd = mysqli_query($this->dbcon,"DELETE FROM member WHERE userid = '$userid' ");
            return $deleteRecorrd;
        }
    }
?>