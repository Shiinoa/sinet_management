 <!--NAV-->

 <style>
    li{
        color: #ffffff;
        text-decoration: none;
        font-size: 16px;
        line-height: 18px;
    }
 </style>
        <nav class="navbar navbar-expand-lg navbar-light bg-primary" >
        <div class="container-fluid">
            <a class="navbar-brand btn btn-warning " href='../html/index_admin.php'>Sinet</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav me-auto mb-3 mb-lg-0">
                <!--  FTTX -->
                <?php if(isset($_SESSION['status'])){
                                    $data_st = $_SESSION['status'];
                                    }
                    if($data_st != "USER" ){?>
                <li class="nav-item dropdown me-3">
                <button  type="button" class="btn btn-warning dropdown-toggle" href="#" id="dropdownMenuLink"  data-bs-toggle="dropdown" aria-expanded="false">
                    FTTX
                </button>
                <ul class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                        <li><br class="dropdown-divider"></li>
                        <li><a class="dropdown-item" href="../html/install_customer.php">สร้างงานติดตั้ง</a></li>
                        <li><a class="dropdown-item" href="../html/import_excell.php">อัพเดทสถานะลูกค้า</a></li>
                        <li><a class="dropdown-item" href="../html/moveIndex_Customer.php">ย้าย Index ลูกค้า</a></li>
                        <li><br class="dropdown-divider"></li>
                </ul>
                </li>
                <?php } ?>
               
                <!--  SP -->
                <li class="nav-item me-3">
                <a class="btn btn-warning" href="../html/sp_data.php" >
                    Splitter
                </a>
                </li>
                <?php if(isset($_SESSION['status'])){
                                    $data_st = $_SESSION['status'];
                                    }
                    if($data_st != "USER" ){?>

                <!--  OLT -->
                <li class="nav-item dropdown me-3">
                <button  type="button" class="btn btn-warning dropdown-toggle" href="#" id="dropdownMenuLink"  data-bs-toggle="dropdown" aria-expanded="false">
                    Profile 
                </button>
                <ul class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                        <li><br class="dropdown-divider"></li>
                        <li><a class="dropdown-item" href="../html/profile_data.php">ตรวจสอบโปรไฟล์ทั้งหมด </a></li>
                        <li><a class="dropdown-item" href="../html/add_profile.php">สร้างโปรไฟล์ใหม่</a></li>
                        <li><br class="dropdown-divider"></li>
                        
                </ul>
                </li>
                <!--  single  button -->
                <li class="nav-item dropdown me-3">
                <button  type="button" class="btn btn-info dropdown-toggle" href="#" id="dropdownMenuLink"  data-bs-toggle="dropdown" aria-expanded="false">
                    Project SI
                </button>
                <ul class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                        <li><br class="dropdown-divider"></li>
                        <li><a class="dropdown-item" href="../html/insert_projectSI.php">สร้างลูกค้า Project SI</a></li>
                
                        <li><br class="dropdown-divider"></li>
                </ul>
                </li>
                <!--  single  button -->
                
                <li class="nav-item dropdown </div>">
                  
               
                    <button  type="button" class="btn btn-info dropdown-toggle" href="#" id="dropdownMenuLink"  data-bs-toggle="dropdown" aria-expanded="false">
                        User
                    </button>
                   
                        <ul class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                                <li><br class="dropdown-divider"></li>

                             
                                <li><a class="dropdown-item" href="../html/showUser.php">จัดการผุ้ใช้งาน</a></li>
                                <li><a class="dropdown-item" href="../html/InsertUser.php">เพิ่มผุ้ใช้งาน</a></li> 
                                
                               
                                <li><br class="dropdown-divider"></li>
                        </ul>
                
                </li>

                <?php } ?>
               
               
            </ul>
            <form class="d-flex justify-content-end">
                    <?php  if(isset($_SESSION['data_login'])) : ?>
                        <div class="p-2"><p style="color:aliceblue;">Welcome <strong style="color:aliceblue;"><?php echo $_SESSION['data_login']." (".$_SESSION['status'].")";?></strong></p></div>
                        <p><a type="button" class="btn btn-info mt-1" href="updateUser.php?userid=<?php echo $_SESSION['id'] ?>">Edit</a></p>&nbsp;
                        <p><a type="button" class="btn btn-warning mt-1" href="login.php?logout='1'">Logout</a></p>
                    <?php endif?>      
            </form>
            </div>

        </div>
    </nav>