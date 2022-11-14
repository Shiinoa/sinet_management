<?php 
    session_start();
    if(!isset($_SESSION['user_login'])){
        header('location: ../html/login.php');
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
     
     <!-- CSS -->
     <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.4/Chart.js"></script>
    <link rel="stylesheet" href="../node_modules/css/style.css">
    <!--NAV-->
        <nav class="navbar navbar-expand-lg navbar-light bg-primary" >
        <div class="container-fluid">
            <a class="navbar-brand btn btn-warning ">Sinet</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav me-auto mb-3 mb-lg-0">
                <!--  single  button -->
                <li class="nav-item dropdown me-3">
                <button  type="button" class="btn btn-warning dropdown-toggle" href="#" id="dropdownMenuLink"  data-bs-toggle="dropdown" aria-expanded="false">
                    FTTX
                </button>
                <ul class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                        <li><a class="dropdown-item" href="#">สร้างงานติดตั้ง</a></li>
                        <li><a class="dropdown-item" href="#">Another action</a></li>
                        <li><hr class="dropdown-divider"></li>
                        <li><a class="dropdown-item" href="#">Something else here</a></li>
                </ul>
                </li>
                <!--  single  button -->
                <li class="nav-item dropdown me-3">
                <button  type="button" class="btn btn-info dropdown-toggle" href="#" id="dropdownMenuLink"  data-bs-toggle="dropdown" aria-expanded="false">
                    Project SI
                </button>
                <ul class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                        <li><a class="dropdown-item" href="#">Action</a></li>
                        <li><a class="dropdown-item" href="#">Another action</a></li>
                        <li><hr class="dropdown-divider"></li>
                        <li><a class="dropdown-item" href="#">Something else here</a></li>
                </ul>
                </li>
                <!--  single  button -->
                
            </ul>
            
            </div>
        </div>
    </nav>
</head>
<body>
    <div class="container">
        <h1>INDEX.USER</h1>
    </div>
    
</body>
</html>