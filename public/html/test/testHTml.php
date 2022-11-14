<?php
    $servername = "localhost";
    $username ="root";
    $password ="";
    $dbname = "sinet-kkn";

    try {
        $db = new PDO("mysql:host={$servername};dbname={$dbname}",$username,$password);
        $db->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
       
    } catch (PDOException $e) {
        echo "Faild to connect DATABASE". $e->getMessage();
    }

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
   
     <!--Ajax-->
     <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.12.1/jquery-ui.js"></script>
    <link href="http://code.jquery.com/ui/1.10.2/themes/smoothness/jquery-ui.css" rel="Stylesheet">
    <!-- jQuery UI -->
    <link href = "https://code.jquery.com/ui/1.10.4/themes/ui-lightness/jquery-ui.css"
         rel = "stylesheet">
    <script src = "https://code.jquery.com/jquery-1.10.2.js"></script>
    <script src = "https://code.jquery.com/ui/1.10.4/jquery-ui.js"></script>
    <script src="http://code.jquery.com/ui/1.10.2/jquery-ui.js" ></script>
    <!-- CSS  STYLE="font-size:18px-->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.12.1/jquery-ui.css" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <script src="//ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
    <title>Document</title>
    <style>
    p {
    margin: auto auto auto auto;
    line-height: 1.2;
    }
    .card {
  /* Add shadows to create the "card" effect */
    box-shadow: 0 5px 8px 0 rgba(0,0,0,0.2);
    
    transition: 0.3s;
    }
    .card:hover {
  box-shadow: 0 8px 16px 0 rgba(0,0,0,0.2);
    }
    .heighttext{
      padding: 200px 50px; line-height: 30px;
    }
</style>
</head>
<body>
        <div class="container">
          <div class="mt-3">
              <?php 
                    $result_olt= $db->prepare("SELECT * FROM fttx_profile WHERE p_name LIKE 'model_2' ");
                    $result_olt->execute();

                    while ($row = $result_olt->fetch(PDO::FETCH_ASSOC)) {?> 

                    <div>
                      <?php echo "
                                  <input type='text' id='area_4' value=''></input><br>
                                  <div class='card'><textarea  class='heighttext' type='text' id='text_area_3'>".$row['p_fmt']."</textarea><br></div>
                                  <button  type='submit' name='button2_data' class='btn btn-primary' id='button2'>Generate</button>"  
                            
                            ?>

                    </div>
                      
                <?php  }  ?>
                <br>
                <form>
                <div class='card'><textarea class='heighttext' name="" id="text_box_2"></textarea></div>
             
              </form>
          </div> 
        
        </div>
        </body>
<script src="https://cdn.jsdelivr.net/npm/jquery@3.6.0/dist/jquery.min.js"></script>
<link href="http://code.jquery.com/ui/1.10.2/themes/smoothness/jquery-ui.css" rel="Stylesheet">
<script src="https://code.jquery.com/jquery-migrate-3.0.0.min.js"></script>
<script src="http://code.jquery.com/ui/1.10.2/jquery-ui.js" ></script>
<!-- CSS 
<script src="jq.js"></script>-->
<script src="test_ajax.js"></script>

</html>