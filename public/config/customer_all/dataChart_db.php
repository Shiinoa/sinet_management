<?php 

require('../config/server.php');

        $result_count_open = "SELECT user_status  FROM installed  WHERE user_status LIKE 'open' ";
        $result_count_terminate = "SELECT user_status  FROM installed  WHERE user_status LIKE 'terminate' ";
        $result_count_suspend = "SELECT user_status  FROM installed  WHERE user_status LIKE 'suspend' ";
        $result_count_hold = "SELECT user_status  FROM installed  WHERE user_status LIKE 'hold' ";
        $result_count_project = "SELECT user_status  FROM installed  WHERE user_status LIKE 'project' ";
        $result_count_na = "SELECT user_status  FROM installed  WHERE user_status LIKE 'na' ";
        $result_count_wait = "SELECT user_status  FROM installed  WHERE user_status LIKE 'wait' ";


        $pdo_res_open = $db->query($result_count_open);
        $pdo_res_terminate = $db->query($result_count_terminate);
        $pdo_res_suspend = $db->query($result_count_suspend);
        $pdo_res_hold = $db->query($result_count_hold);
        $pdo_res_project = $db->query($result_count_project);
        $pdo_res_na = $db->query($result_count_na);
        $pdo_res_wait = $db->query($result_count_wait);


        $table_open = $pdo_res_open->rowCount();
        $table_terminate =$pdo_res_terminate->rowCount();
        $table_suspend=$pdo_res_suspend->rowCount();
        $table_hold=$pdo_res_hold->rowCount();
        $table_project=$pdo_res_project->rowCount();
        $table_na=$pdo_res_na->rowCount();
        $table_wait=$pdo_res_wait->rowCount();

?>