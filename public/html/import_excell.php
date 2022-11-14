<?php 
    include('../config/server.php');
    session_start();
    if(!isset($_SESSION['data_login'])){
        $_SESSION['warning'] ="Please Login ";
        header('location: ../html/login.php');
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <?php require('../menu/extension_web.php')?>
    <?php require('../menu/nav_file.php')?>
    <link rel="stylesheet" href="../css/style_import.css">
    <title>Import DATA</title>
 
    <style>
        .img_logo{
            margin: 10% auto 2% 47%;
        }
        .btn-cus{
            margin: 0% auto auto 78%;
        }
        #loader {
            margin: 0% 50% auto 47%; }
    </style>
</head>
<body>
    <div class="container">
    <div class="row mt-3">
    <div class="col-md-2"></div>
        <div class="col-md-8">
            <form id="form_import" method="post" class="mt-3 " enctype="multipart/form-data">
                <div class="panel panel-default" >
                    <div class="panel-heading">
                        <img class="img_logo"src="../img/upload.gif" alt="Import-Excell_File" width="64" height="64">
                        <h4 for="formFile" class="form-label" align="center">IMPORT DATA</h4>
                        <p for="formFile" class="form-label" align="center" style="color:red;">support .xls,.csv,.xlsx </p>
                    </div>
                    <div class="panel-body">
                        <hr>
                            <div id="form_import_data"></div>
                            <input class="form-control" type="file" name="import_file" id="import_file">
                        <div class="mt-3">
                            <button type="submit" class="btn btn-warning btn-cus" name="import_file_btn" id="import_file_btn">Upload TO DATABASE</button>
                        </div>
                        <hr> 
                    <div class=""></div>   
                    </div>
                </div>
            </form>
            <div id="loader"></div>
        </div>
       
    </div>
    </div>
</body>
<!-- JavaScript Bundle with Popper -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-A3rJD856KowSb7dwlZdYEkO39Gagi7vIsF0jrRAoQmDKKtQBHUuLZ9AsSv4jD4Xa" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
   
</html>
<script src="../script/import_data.js"></script>
