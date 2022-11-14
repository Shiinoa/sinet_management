<?php 
        session_start();
        require_once('../config/server.php');
       
        $select_data = $db->prepare("SELECT * FROM installed WHERE user_status != 'projectSI' ORDER BY is_id DESC LIMIT 3  ");
        $select_data->execute();
        $users_arr=array();
        while ($row = $select_data->fetch(PDO::FETCH_ASSOC)) 
        {  
            if(!empty($row['sp_id'])){
            $sp_id = $db->prepare("SELECT * FROM sp_detail WHERE sp_id = :g_sp ");
            $sp_id->bindParam(':g_sp',$row['sp_id']);
            $sp_id->execute();
            while ($row2 = $sp_id->fetch(PDO::FETCH_ASSOC)) 
            {
            $is_id = $row['is_id'];
            $u_id = $row['u_id'];
            $u_name = $row['name'];
            $u_mac_pon = $row['mac_pon'];
            $u_sp = $row['sp'];
            $u_node = $row['node'];
            $u_tc_code = $row['tc_code'];
            $u_nonid = $row['nonid'];
            $g_sp= $row['sp_id'];
            $g_olt =  $row2['olt'];
            $view_btn = '<button class="btn btn-primary px-3 view_new" id="'.$is_id.'" data-target="#myModal" data-toggle="modal"><i class="far fa-file" aria-hidden="true"></i></button>&nbsp'.
                        '<a href="update_customer_db.php?is_id='.$is_id.'" class="btn btn-warning">Edit</a>&nbsp'.
                        '<a href="../config/delete_customer_db.php?is_id='.$is_id.'" class="btn btn-danger" onclick="return comfirm("Are you sure want to delete");">Delete</a></td>';
                echo '<tr >'. 
                '<td>'.$u_id.'</td>'.
               ' <td>'.$u_name.'</td>'.
               ' <td>'.$u_mac_pon.'</td>'.
                '<td>'.$g_sp.'</td>'.
                '<td>'.$u_node.'-'.$g_olt.'</td>'.
                '<td>'.$u_tc_code.'</td>'.
                '<td>'.$u_nonid.'</td>'.
                '<td>'.$view_btn.'</td> '.
               ' </tr> ';
            } 

            # code...
                $users_arr[] = array(
                'u_id' =>  $u_id,
                'u_name' =>  $u_name,
                'u_mac_pon' =>  $u_mac_pon,
                'u_sp' =>  $u_sp,
                'u_node' =>  $u_node,
                'u_tc_code' =>  $u_tc_code,
                'u_nonid' =>  $u_nonid,
                'g_sp' =>  $g_sp,
                'g_olt' =>  $g_olt,  
                'view_btn' =>  $view_btn 
            );
            }else{
                $is_id = $row['is_id'];
                $u_id = $row['u_id'];
                $u_name = $row['name'];
                $u_mac_pon = $row['mac_pon'];
                $u_sp = $row['sp'];
                $u_node = $row['node'];
                $u_tc_code = $row['tc_code'];
                $u_nonid = $row['nonid'];
                $g_sp= "";
                $g_olt = "";
                $view_btn = '<button class="btn btn-primary px-3 view_new" id="'.$is_id.'" data-target="#myModal" data-toggle="modal"><i class="far fa-file" aria-hidden="true"></i></button>&nbsp'.
                            '<a href="update_customer_db.php?is_id='.$is_id.'" class="btn btn-warning">Edit</a>&nbsp'.
                            '<a href="../config/delete_customer_db.php?is_id='.$is_id.'" class="btn btn-danger" onclick="return comfirm("Are you sure want to delete");">Delete</a></td>';
                    echo '<tr >'. 
                    '<td>'.$u_id.'</td>'.
                    ' <td>'.$u_name.'</td>'.
                    ' <td>'.$u_mac_pon.'</td>'.
                    '<td>'.$g_sp.'</td>'.
                    '<td>'.$u_node.'-'.$g_olt.'</td>'.
                    '<td>'.$u_tc_code.'</td>'.
                    '<td>'.$u_nonid.'</td>'.
                    '<td>'.$view_btn.'</td> '.
                    ' </tr> ';

                    $users_arr[] = array(
                        'u_id' =>  $u_id,
                        'u_name' =>  $u_name,
                        'u_mac_pon' =>  $u_mac_pon,
                        'u_sp' =>  $u_sp,
                        'u_node' =>  $u_node,
                        'u_tc_code' =>  $u_tc_code,
                        'u_nonid' =>  $u_nonid,
                        'g_sp' =>  $g_sp,
                        'g_olt' =>  $g_olt,  
                        'view_btn' =>  $view_btn );
            }
    
       
        }       
                         
?> 
<script src='../script/profile_modal.js'></script>

