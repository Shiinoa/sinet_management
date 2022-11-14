<?php 
    session_start();
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Site > Login</title>
       
        <!-- CSS only -->
       
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous">
        <!-- JavaScript Bundle with Popper -->
        <!-- Font Awesome -->
            <link
            href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css"
            rel="stylesheet"
            />
            <!-- Google Fonts -->
            <link
            href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700&display=swap"
            rel="stylesheet"
            />
            <!-- MDB -->
            <link
            href="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/5.0.0/mdb.min.css"
            rel="stylesheet"
            />
                    
    </head>
<body>  
    <form action="../config/login_db.php" method="post" class="login-form ">     
        <section class="vh-100 bg">
        <div class="container py-5 h-100">
            <div class="row d-flex justify-content-center align-items-center h-100">
            <div class="col-12 col-md-8 col-lg-6 col-xl-5">
                <div class="card shadow-2-strong" style="border-radius: 1rem;">
                <div class="card-body p-5 text-center">
                    <img src="../img/logo2.jpg" alt="">
                <h3 class="mb-5">Sign in</h3>      
                <div class=" mb-4">
                    <?php if(isset($_SESSION['error'])) { ?>
                        <div class="alert alert-danger" role="alert">
                                    <?php  echo ($_SESSION['error']);
                                    //unset ถ้าไม่ใส่ SESSION จะค้าง
                                    unset($_SESSION['error']);
                                    ?>
                        </div>
                    <?php } ?>
                    <?php if(isset($_SESSION['warning'])) { ?>
                        <div class="alert alert-warning" role="warning">
                                    <?php  echo ($_SESSION['warning']);
                                    //unset ถ้าไม่ใส่ SESSION จะค้าง
                                    unset($_SESSION['warning']);
                                    ?>
                        </div>
                    <?php } ?>
                    <label class="form-label" >Username</label>
                    <input type="text" name="username" class="form-control form-control-lg" style="border-radius: 1rem;"/>
                    </div>

                    <div class=" mb-4">
                    
                    <label class="form-label" >Password</label>
                    <input type="password" name="password" class="form-control form-control-lg" style="border-radius: 1rem; "/>
                    </div>
                    <button class="btn btn-primary btn-lg btn-block" style="border-radius: 1rem; " type="submit" name="login_user" id="login_user">Login</button>
                    <hr class="my-4">
                </div>
                </div>
            </div>
            </div>
        </div>
        </section>
    </form>
</body>
    <!-- import JS Animation -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-A3rJD856KowSb7dwlZdYEkO39Gagi7vIsF0jrRAoQmDKKtQBHUuLZ9AsSv4jD4Xa" crossorigin="anonymous"></script>    
   
</html>