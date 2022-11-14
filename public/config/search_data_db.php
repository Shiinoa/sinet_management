<?php 
    session_start();
    require_once('../config/server.php');
    
    if(isset($_POST['search_data_text']))
    {
            $q = $_POST['search_data_text'];
            $check_st = $_POST['check_status'];
            $data_pon =  $_POST['pon_data'];
            
            $uptxt =strtoupper($q);  
            $sql="SELECT COUNT(*) FROM installed WHERE 
            u_id LIKE '%".$uptxt."%'
            OR sp LIKE '%".$uptxt."' 
            OR name LIKE '%".$uptxt."%'
            OR mac_pon LIKE '%".$uptxt."%'
            OR ont LIKE '".$data_pon."%'";
            $results = $db->prepare($sql);
            $results->execute();
            // op
            $count_ALL = $results->fetchColumn();
            $count_op = $db->prepare("SELECT COUNT(*) FROM installed WHERE user_status LIKE 'open' 
            AND u_id LIKE '%".$uptxt."%' OR user_status LIKE 'open' 
            AND sp LIKE '%".$uptxt."%' OR user_status LIKE 'open' 
            AND name LIKE '%".$uptxt."%' OR user_status LIKE 'open' 
            AND mac_pon LIKE '%".$uptxt."%' OR user_status LIKE 'open' 
            AND ont LIKE '%".$uptxt."%' 
            ");
            $count_op->execute();
            $count_op = $count_op->fetchColumn();
            // Sus
            $results_sus = $db->prepare("SELECT COUNT(*) FROM installed WHERE user_status LIKE 'suspend' 
            AND u_id LIKE '%".$uptxt."%' OR user_status LIKE 'suspend' 
            AND sp LIKE '%".$uptxt."%' OR user_status LIKE 'suspend' 
            AND name LIKE '%".$uptxt."%' OR user_status LIKE 'suspend' 
            AND mac_pon LIKE '%".$uptxt."%' OR user_status LIKE 'suspend' 
            AND ont LIKE '%".$uptxt."%' 
            ");
            $results_sus->execute();
            $results_sus = $results_sus->fetchColumn();
            // ter
            $results_ter = $db->prepare("SELECT COUNT(*) FROM installed WHERE user_status LIKE 'terminate' 
            AND u_id LIKE '%".$uptxt."%' OR user_status LIKE 'terminate' 
            AND sp LIKE '%".$uptxt."%' OR user_status LIKE 'terminate' 
            AND name LIKE '%".$uptxt."%' OR user_status LIKE 'terminate' 
            AND mac_pon LIKE '%".$uptxt."%' OR user_status LIKE 'terminate' 
            AND ont LIKE '%".$uptxt."%' 
            ");
            $results_ter->execute();
            $results_ter = $results_ter->fetchColumn();
            //pro
            $results_pro = $db->prepare("SELECT COUNT(*) FROM installed WHERE user_status LIKE 'project' 
            AND u_id LIKE '%".$uptxt."%' OR user_status LIKE 'project' 
            AND sp LIKE '%".$uptxt."%' OR user_status LIKE 'project' 
            AND name LIKE '%".$uptxt."%' OR user_status LIKE 'project' 
            AND mac_pon LIKE '%".$uptxt."%' OR user_status LIKE 'project' 
            AND ont LIKE '%".$uptxt."%' 
            ");
            $results_pro->execute();
            $results_pro = $results_pro->fetchColumn();
             //na
             $results_na = $db->prepare("SELECT COUNT(*) FROM installed WHERE user_status LIKE 'na' 
             AND u_id LIKE '%".$uptxt."%' OR user_status LIKE 'na' 
             AND sp LIKE '%".$uptxt."%' OR user_status LIKE 'na' 
             AND name LIKE '%".$uptxt."%' OR user_status LIKE 'na' 
             AND mac_pon LIKE '%".$uptxt."%' OR user_status LIKE 'na' 
             AND ont LIKE '%".$uptxt."%' 
             ");
             $results_na->execute();
             $results_na = $results_na->fetchColumn();
              //hold
              $results_hold = $db->prepare("SELECT COUNT(*) FROM installed WHERE user_status LIKE 'hold' 
              AND u_id LIKE '%".$uptxt."%' OR user_status LIKE 'hold' 
              AND sp LIKE '%".$uptxt."%' OR user_status LIKE 'hold' 
              AND name LIKE '%".$uptxt."%' OR user_status LIKE 'hold' 
              AND mac_pon LIKE '%".$uptxt."%' OR user_status LIKE 'hold' 
              AND ont LIKE '%".$uptxt."%' 
              ");
              $results_hold->execute();
              $results_hold = $results_hold->fetchColumn();
               //project SI
               $results_si = $db->prepare("SELECT COUNT(*) FROM installed WHERE user_status LIKE 'projectSI' 
               AND u_id LIKE '%".$uptxt."%' OR user_status LIKE 'projectSI' 
               AND sp LIKE '%".$uptxt."%' OR user_status LIKE 'projectSI' 
               AND name LIKE '%".$uptxt."%' OR user_status LIKE 'projectSI' 
               AND mac_pon LIKE '%".$uptxt."%' OR user_status LIKE 'projectSI' 
               AND ont LIKE '%".$uptxt."%' 
               ");
               $results_si->execute();
               $results_si = $results_si->fetchColumn();
           
            
            echo
            '<div class="card mb-3 bg-info text-white text-center" style="max-width: 10rem;><h5 class="card-title"> All User:: '.$count_ALL.'</h5></div>',
            '<div class="card mb-3 bg-success text-white text-center" style="max-width: 10rem;><h5 class="card-title">OPEN:: '.$count_op.'</h5></div>',
            '<div class="card mb-3 bg-warning text-white text-center" style="max-width: 10rem;><h5 class="card-title">Suspend:: '.$results_sus.'</h5></div>',
            '<div class="card mb-3 bg-danger text-white text-center" style="max-width: 10rem;><h5 class="card-title">Terminate:: '.$results_ter.'</h5></div>',
            '<div class="card mb-3 bg-primary text-white text-center" style="max-width: 10rem;><h5 class="card-title">Project:: '.$results_pro.'</h5></div>',
            '<div class="card mb-3 bg-info text-white text-center" style="max-width: 10rem;><h5 class="card-title">N/A :: '.$results_na.'</h5></div>',
            '<div class="card mb-3 bg-dark text-white text-center" style="max-width: 10rem;><h5 class="card-title">Hold :: '.$results_hold.'</h5></div>',
            '<div class="card mb-3 bg-warning text-white text-center" style="max-width: 10rem;><h5 class="card-title">ProjectSI :: '.$results_si.'</h5></div>';
           
          
        
            
    }
    
?>