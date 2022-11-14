<?php 
 session_start();
 require_once('server.php');
if(isset($_POST['query'])){
    $data = $_POST['query'];
    $data_uptxt =strtoupper($data); 
    $result_research =$db->prepare("SELECT * FROM sp_detail WHERE 
    sp_name LIKE '%".$data_uptxt."%' LIMIT 30");
    $result_research->execute();

    $sp_arr=array();
    while ($row = $result_research->fetch(PDO::FETCH_ASSOC)) {
        $sp_name = $row['sp_name'];
        $sp_type = $row['sp_type'];
        $sp_node  = $row['node'];
        $sp_olt  = $row['olt'];
        $sp_route  = $row['route'];
        $sp_lat  = $row['lat'];
        $sp_lng  = $row['lng'];
        $sp_location  = $row['location'];
        $btn_view = 
        '<a id='.$row['sp_id'].' class="btn btn-warning px-3 sp_req" data-target="#myModal" data-toggle="modal"><i class="far fa-edit"aria-hidden="true" ></i></a>&nbsp'.
        '<a href="../config/deleteSplitter.php?del_id='.$row['sp_id'].'" class="btn btn-danger px-3"><i class="fas fa-trash-alt aria-hidden="true""></i></a></td>';

        $sp_arr[] = array(
            "sp_name" => $sp_name, 
            "sp_type" => $sp_type,
            "sp_node" => $sp_node, 
            "sp_olt" => $sp_olt, 
            "sp_route" => $sp_route,
            "sp_lat" => $sp_lat,
            "sp_lng" => $sp_lng, 
            "sp_location" => $sp_location,
            "btn_view"=>$btn_view
        );  

        echo 
            '<tr class="p-3 mb-2" style="text-align:left; ">'.
            '<td ><span class="badge badge-secondary rounded-pill d-inline" style="font-size:13px">'.$sp_name.'</span></td>'.
            '<td><p style="color:darkolivegreen;font-weight:bold">'.$sp_type.'</p></td>'.
            '<td>'.$sp_node.'</td>'.
            '<td>'.$sp_olt.'</td>'.
            '<td>'.$sp_route.'</td>'.
            '<td>'.$sp_lat.'</td>'.
            '<td>'.$sp_lng.'</td>'.
            '<td>'.$sp_location.'</td>'.
            '<td align="center" >'.$btn_view.'</td>'.
           
            '</tr>';


        # code...
    }
}

?>
<script type="text/javascript">
    $(document).ready(function(){
        $('.sp_req').click(function(){
            var id_sp=$(this).attr("id");
            $.ajax({
                url:"../config/sh_data_sp.php",
                    method:"post",
                    data:{id:id_sp},
                    success:function(data){
                    var data = $.parseJSON(data);
                       $('#Headsp_name').html("ข้อมูล:: "+data.sp_name);
                       $('#spname_data').val(data.sp_name);
                       $('#spname').val(data.sp_name);
                       $('#type_sp').val(data.sp_type);
                       $('#node').val(data.sp_node);
                       $('#olt').val(data.sp_olt);
                       $('#route').val(data.sp_route);
                       $('#lat').val(data.sp_lat);
                       $('#lon').val(data.sp_lng);
                       $('#location').val(data.sp_location);
                    }
            });
         
        })
        return false;

    })
</script>