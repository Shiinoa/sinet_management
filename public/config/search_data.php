<?php
    session_start();
    require_once('../config/server.php');
    

    if(isset($_POST['search_data_text']) && isset($_POST['check_status'])){
            
            $q = $_POST['search_data_text'];
            $check_st = $_POST['check_status'];
            $data_pon =  $_POST['pon_data'];

            $data_olt = $_POST['olt_status'];

            $uptxt =strtoupper($q);           
            $results = $db->prepare("SELECT * FROM installed WHERE 
                u_id LIKE '%".$uptxt."%'
                OR sp LIKE '%".$uptxt."' 
                OR name LIKE '%".$uptxt."%'
                OR mac_pon LIKE '%".$uptxt."%'
                OR ont LIKE '".$data_pon."%'  
                AND node LIKE '".$data_olt."%'
                ORDER BY user_status = '".$check_st."' DESC LIMIT 400");
                
        
            $results->execute();
            $users_arr=array();
            
            while ($row = $results->fetch(PDO::FETCH_ASSOC)) {
            if($row['sp_id'] != null){
                $query_sp = "SELECT * FROM sp_detail WHERE sp_id= " .$row['sp_id'] ;
                $stmt = $db->prepare($query_sp);
                $stmt->execute();
                while($row_sp =$stmt->fetch(PDO::FETCH_ASSOC))
                {
                    $olt = $row_sp['olt'];
                    $user_status = $row['user_status'];
                    $sp = $row['sp'];
                    $u_id = $row['u_id'];
                    $name = $row['name'];
                    $ont = $row['ont'];
                    $node = $row['node'].'-'.$olt;
                    $tc_code = $row['tc_code'];
                    $mac_pon = $row['mac_pon'];
                    $phone_no = $row['phone_no'];
                    $btn_view = '<button class="btn btn-primary px-3 view_data" id="'.$row['is_id'].'" data-target="#myModal" data-toggle="modal"><i class="far fa-file" aria-hidden="true"></i></button>&nbsp'.
                                '<a href="update_customer_db.php?is_id='.$row['is_id'].'" class="btn btn-warning px-3"><i class="far fa-edit"aria-hidden="true" ></i></a>'.
                                '<a href="../config/delete_customer_db.php?del_id='.$row['is_id'].'" class="btn btn-danger px-3"><i class="fas fa-trash-alt aria-hidden="true""></i></a></td>';

                    $btn_view_SI = '<button class="btn btn-success px-3 view_newSI" id="'.$row['is_id'].'" data-target="#myModal" data-toggle="modal"><i class="far fa-file" aria-hidden="true"></i></button>&nbsp'.
                                '<a href="update_projectSI.php?is_id='.$row['is_id'].'" class="btn btn-warning px-3"><i class="far fa-edit"aria-hidden="true" ></i></a>'.
                                '<a href="../config/delete_project_si_db.php?is_id='.$row['is_id'].'" class="btn btn-danger px-3"><i class="fas fa-trash-alt aria-hidden="true""></i></a></td>';
                    
                    $users_arr[] = array(
                        "user_status" => $user_status, 
                        "sp" => $sp,
                        "u_id" => $u_id, 
                        "name" => $name, 
                        "ont" => $ont,
                        "node" => $node,
                        "tc_code" => $tc_code, 
                        "mac_pon" => $mac_pon,
                        "phone_no" => $phone_no,
                        "btn_view" => $btn_view,
                        "btn_view_SI" => $btn_view_SI);  

                        switch ($user_status){
                            case "Open":
                                echo 
                                    '<tr class="p-2 mb-1" style="text-align:left; ">'.
                                    '<td ><span class="badge badge-success rounded-pill d-inline" style="font-size:13px">'.$user_status.'</span></td>'.
                                    '<td><p style="color:darkolivegreen;font-weight:bold;font-size:10px;">'.$sp.'</p></td>'.
                                    '<td><p class="text-monospace font-weight-bold" name="u_id">'.$u_id.'</p></td>'.
                                    '<td><p class="font-weight-bold">'.$name.'</p></td>'.
                                    '<td>'.$ont.'</td>'.
                                    '<td>'.$node.'</td>'.
                                    '<td>'.$tc_code.'</td>'.
                                    '<td>'.$mac_pon.'</td>'.
                                    '<td>'.$phone_no.'</td>'.
                                    '<td>'.$btn_view.'</td>'.
                                    '</tr>';
                                break;
                            case "Suspend":
                                    echo 
                                    '<tr class="p-3 mb-2" style="text-align:left; ">'.
                                    '<td ><span class="badge badge-warning rounded-pill d-inline" style="font-size:13px">'.$user_status.'</span></td>'.
                                    '<td><p style="color:darkolivegreen;font-weight:bold;font-size:10px;">'.$sp.'</p></td>'.
                                    '<td><p class="font-weight-bold">'.$u_id.'</p></td>'.
                                    '<td>'.$name.'</td>'.
                                    '<td>'.$ont.'</td>'.
                                    '<td>'.$node.'</td>'.
                                    '<td>'.$tc_code.'</td>'.
                                    '<td>'.$mac_pon.'</td>'.
                                    '<td>'.$phone_no.'</td>'.
                                    '<td>'.$btn_view.'</td>'.
                                    '</tr>';
                                    break;
                            case "Terminate":
                                    echo 
                                    '<tr class="p-3 mb-2" style="text-align:left; ">'.
                                    '<td ><span class="badge badge-danger rounded-pill d-inline" style="font-size:13px">'.$user_status.'</span></td>'.
                                    '<td><p style="color:darkolivegreen;font-weight:bold;font-size:10px;">'.$sp.'</p></td>'.
                                    '<td><p class="text-monospace font-weight-bold">'.$u_id.'</p></td>'.
                                    '<td>'.$name.'</td>'.
                                    '<td>'.$ont.'</td>'.
                                    '<td>'.$node.'</td>'.
                                    '<td>'.$tc_code.'</td>'.
                                    '<td>'.$mac_pon.'</td>'.
                                    '<td>'.$phone_no.'</td>'.
                                    '<td>'.$btn_view.'</td>'.
                                    '</tr>';
                                    break;
                            case "Project":
                                    echo 
                                    '<tr class="p-3 mb-2" style="text-align:left; ">'.
                                    '<td ><span class="badge badge-primary rounded-pill d-inline" style="font-size:13px">'.$user_status.'</span></td>'.
                                    '<td><p style="color:darkolivegreen;font-weight:bold;font-size:10px;">'.$sp.'</p></td>'.
                                    '<td><p class="text-monospace font-weight-bold">'.$u_id.'</p></td>'.
                                    '<td>'.$name.'</td>'.
                                    '<td>'.$ont.'</td>'.
                                    '<td>'.$node.'</td>'.
                                    '<td>'.$tc_code.'</td>'.
                                    '<td>'.$mac_pon.'</td>'.
                                    '<td>'.$phone_no.'</td>'.
                                    '<td>'.$btn_view.'</td>'.
                                    '</tr>';
                                    break;
                            case "Hold":
                                    echo 
                                    '<tr class="p-3 mb-2" style="text-align:left; ">'.
                                    '<td ><span class="badge badge-dark rounded-pill d-inline" style="font-size:13px">'.$user_status.'</span></td>'.
                                    '<td><p style="color:darkolivegreen;font-weight:bold;font-size:10px;">'.$sp.'</p></td>'.
                                    '<td><p class="text-monospace font-weight-bold">'.$u_id.'</p></td>'.
                                    '<td>'.$name.'</td>'.
                                    '<td>'.$ont.'</td>'.
                                    '<td>'.$node.'</td>'.
                                    '<td>'.$tc_code.'</td>'.
                                    '<td>'.$mac_pon.'</td>'.
                                    '<td>'.$phone_no.'</td>'.
                                    '<td>'.$btn_view.'</td>'.
                                    '</tr>';
                                    break;
                            case "N/A":
                                    echo 
                                    '<tr class="p-3 mb-2" style="text-align:left; ">'.
                                    '<td ><span class="badge badge-info rounded-pill d-inline" style="font-size:13px;">'.$user_status.'</span></td>'.
                                    '<td><p style="color:darkolivegreen;font-weight:bold;font-size:10px;">'.$sp.'</p></td>'.
                                    '<td><p class="text-monospace font-weight-bold">'.$u_id.'</p></td>'.
                                    '<td>'.$name.'</td>'.
                                    '<td>'.$ont.'</td>'.
                                    '<td>'.$node.'</td>'.
                                    '<td>'.$tc_code.'</td>'.
                                    '<td>'.$mac_pon.'</td>'.
                                    '<td>'.$phone_no.'</td>'.
                                    '<td>'.$btn_view.'</td>'.
                                    '</tr>';
                                    break;
                            case "ProjectSI":
                                echo 
                                '<tr class="p-3 mb-2" style="text-align:left; ">'.
                                '<td ><span class="badge badge-secondary rounded-pill d-inline" style="font-size:13px">'.$user_status.'</span></td>'.
                                '<td><p style="color:darkolivegreen;font-weight:bold;font-size:10px;">'.$sp.'</p></td>'.
                                '<td><p class="text-monospace font-weight-bold">'.$u_id.'</p></td>'.
                                '<td>'.$name.'</td>'.
                                '<td>'.$ont.'</td>'.
                                '<td>'.$node.'</td>'.
                                '<td>'.$tc_code.'</td>'.
                                '<td>'.$mac_pon.'</td>'.
                                '<td>'.$phone_no.'</td>'.
                                '<td>'.$btn_view_SI.'</td>'.
                                '</tr>';
                                break;
                            case " ":
                                    echo 
                                    '<tr class="p-3 mb-2" style="text-align:left; ">'.
                                    '<td ><span class="badge badge-secondary rounded-pill d-inline" style="font-size:13px">'.$user_status.'</span></td>'.
                                    '<td><p style="color:darkolivegreen;font-weight:bold;font-size:10px;">'.$sp.'</p></td>'.
                                    '<td><p class="text-monospace font-weight-bold">'.$u_id.'</p></td>'.
                                    '<td>'.$name.'</td>'.
                                    '<td>'.$ont.'</td>'.
                                    '<td>'.$node.'</td>'.
                                    '<td>'.$tc_code.'</td>'.
                                    '<td>'.$mac_pon.'</td>'.
                                    '<td>'.$phone_no.'</td>'.
                                    '<td>'.$btn_view.'</td>'.
                                    '</tr>';
                            break;
                            default:
                                echo 
                                    '<tr class="p-3 mb-2" style="text-align:left; ">'.
                                    '<td ><span class="badge badge-secondary rounded-pill d-inline" style="font-size:13px">'.$user_status.'</span></td>'.
                                    '<td><p style="color:darkolivegreen;font-weight:bold;font-size:10px;">'.$sp.'</p></td>'.
                                    '<td><p class="text-monospace font-weight-bold">'.$u_id.'</p></td>'.
                                    '<td>'.$name.'</td>'.
                                    '<td>'.$ont.'</td>'.
                                    '<td>'.$node.'</td>'.
                                    '<td>'.$tc_code.'</td>'.
                                    '<td>'.$mac_pon.'</td>'.
                                    '<td>'.$phone_no.'</td>'.
                                    '<td>'.$btn_view.'</td>'.
                                    '</tr>';
                        }
                }      
                
            }
            
            }
    }
    

?>
<script type="text/javascript">
        $(document).ready(function(){
            $('.view_data').click(function(){
                var uid=$(this).attr("id");
                
                $.ajax({
                    url:"../config/view_data_modal.php",
                    method:"post",
                    dataType: 'json',
                    data:{id:uid},
                    success:function(data){
                        //$('#detail').html(data);
                       
                       $("#profile_fttx").html(data[14]);
                        var TextSearch = document.getElementById("profile_fttx").value;
                        let const_1 = document.getElementById("result_profile_fttx").innerHTML =TextSearch.replaceAll("|","");
                        console.log("DATAtext::"+TextSearch);
                                //ทำการ ค้นหา ตัว "|"  ใน โปรไฟล์ ออกให้เป้น "" 
                            
                        const mapObj = //ทำการ ดุึง ข้อมูล ใน data ในที่นี้ ใช้ Array ในการเทียบตำแหน่ง 
                            {
                                    ont_index: data[0],
                                    onu_sn: data[1],
                                    up_speed: data[2],
                                    down_speed: data[3],
                                    u_id: data[4],
                                    isp: data[5],
                                    sp_name: data[6],
                                    vlan_n:data[7],
                                    vlan_m:data[8],
                                    u_name:data[9],
                                    tel_phone:data[10],
                                    auth_user:data[11],
                                    auth_pass:data[12],
                                    }; 
                                    //ทำการ replaceAll ตัวอักษร ใน โปรไฟล์ โดย เทียบกับ mapObj 
                                $result_ex = document.getElementById("result_profile_fttx").innerHTML =  const_1.replaceAll(/\b(?:ont_index|onu_sn|up_speed|down_speed|u_id|isp|sp_name|vlan_n|vlan_m|u_name|tel_phone|auth_pass|auth_user)\b/gi, matched => mapObj[matched]);
                                console.log("Result::"+$result_ex);    
                                $('#dataModal').modal('show');
                    }
                })

            })
        });  
        
</script>
<script src='../script/profile_Si.js'></script>