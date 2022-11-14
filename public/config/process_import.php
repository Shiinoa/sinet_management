<?php
require '../config/server.php';
require '../vendor/autoload.php';

use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;

if(!empty($_FILES["import_file"])){

   $allowed_ext =['xls','csv','xlsx'];
   $filename = $_FILES['import_file']['name'];
   $checking =explode(".",$filename);
   $file_ext = end($checking);
   
    if(in_array($file_ext,$allowed_ext))
    {
       
        $targetPath = $_FILES['import_file']['tmp_name'];
        /**  Identify the type of $inputFileName  **/
        $inputFileType = \PhpOffice\PhpSpreadsheet\IOFactory::identify($targetPath);
        /**  Create a new Reader of the type that has been identified  **/
        $reader = \PhpOffice\PhpSpreadsheet\IOFactory::createReader($inputFileType);
        /**  Load $inputFileName to a Spreadsheet Object  **/
        $spreadsheet = $reader->load($targetPath);
        /**  Convert Spreadsheet Object to an Array for ease of use  **/
        $schdeules = $spreadsheet->getActiveSheet()->toArray();
        foreach($schdeules as $row){
                
                $customer = $row['0'];
                $user_status = $row['1'];

                $result_ = $db->prepare("SELECT * FROM installed WHERE u_id = :customer");
                $result_->bindParam(":customer",$customer);
                $result_->execute(); 
                $count = $result_->fetchColumn();
                if($count > 0){
                    $up_qury ="UPDATE installed SET user_status='$user_status' WHERE u_id ='$customer'";
                    $result_up_qury = $db->prepare($up_qury);
                    $result_up_qury->execute();
                   
                    $msg=1;
                  
                }
                else
                {
                    $up_qury ="INSERT INTO installed (u_id,user_status) VALUES ('$customer','$user_status')";
                    $result_up_qury = $db->prepare($up_qury);
                    $result_up_qury->execute();
                   
                    $msg=1;
                   
                }      
        }
     if(isset($msg)){

            echo '<div class="alert alert-success"><span> Upload success !! </span></div>';
  
        }else{
            echo '<div class="alert alert-danger"><span> Upload error </span></div>';
        }

   }
   else
    {
        echo '<div class="alert alert-danger"><span> Invalid Flie Please Import .xls-.csv-.xlsx </span></div>';
        exit(0);
    } 
    }
?>