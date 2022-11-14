<?php 
    session_start();
    require('../config/customer_all/dataChart_db.php');
                
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
   
    <script src="https://cdn.jsdelivr.net/npm/chart.js@3.9.1/dist/chart.min.js"></script>
    <link rel="stylesheet" href="../node_modules/css/style.css">
</head>
<body>
        <canvas id="DATA_SINET" style="width:100%;max-width:350px">
                <script>
                function handleHover(evt, item, legend) {
                legend.chart.data.datasets[0].backgroundColor.forEach((color, index, colors) => {
                    colors[index] = index === item.index || color.length === 9 ? color : color + '4D';
                });
                legend.chart.update();
                }   
                function handleLeave(evt, item, legend) {
                legend.chart.data.datasets[0].backgroundColor.forEach((color, index, colors) => {
                    colors[index] = color.length === 9 ? color.slice(0, -2) : color;
                });
                legend.chart.update();
                }
        </script>
                        <script>
                        var GetOPen =["<?php echo $table_open ?>",
                        "<?php echo $table_terminate ?>",
                        "<?php echo $table_suspend ?>",
                        "<?php echo $table_hold ?>",
                        "<?php echo $table_project ?>",
                        "<?php echo $table_na ?>",
                        "<?php echo $table_wait ?>",
                        ] ;
                        var xValues = ["OPEN","TERMINATE","SUSPEND","HOLD","PROJECT","N/A","WAIT"];
                        //ต้องดึงข้อมูลสถานะการใช้งาน ลง
                        var yValues = [GetOPen[0], GetOPen[1], GetOPen[2], GetOPen[3],GetOPen[4],GetOPen[5],GetOPen[6]];
                        var barColors = [
                        "#27db57",
                        "#c42550",
                        "#db9721",
                        "#4a4845",
                        "#befc97",
                        "#146de0",
                        "#a42bf0",
                        ];
                        new Chart("DATA_SINET", {
                        type: "pie",
                        data: {
                            labels: xValues,
                            datasets: [{
                            backgroundColor: barColors, 
                            data: yValues
                            }]
                        },
                        options: {
                            responsive: true,
                            plugins: {
                                legend: {
                                    onHover: handleHover,
                                    onLeave: handleLeave
                                    }
                                },
                                title: {
                                    display: true,
                                    text: 'DATA'
                                }
                        }
                        });
                        </script>
            
         </canvas>   
        
</body>
<!-- JavaScript Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-A3rJD856KowSb7dwlZdYEkO39Gagi7vIsF0jrRAoQmDKKtQBHUuLZ9AsSv4jD4Xa" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
    
</html>