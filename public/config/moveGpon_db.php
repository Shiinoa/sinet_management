<?php
    session_start();
    include 'server.php';
    if(isset($_POST['data'])){
        $sp_id_data = $_POST['data'];
        $result = $db->prepare("SELECT * FROM installed WHERE sp_id = :sp_getid");
        $result->bindParam(':sp_getid',$sp_id_data);
        $result->execute();
        $arr_data = array();
        while($row = $result->fetch(PDO::FETCH_ASSOC)){
            $user_sp = $row['sp'];
            $user_id = $row['u_id'];
            $is_id = $row['is_id'];
            $user_macpon = $row['mac_pon'];
            $user_pon1 = $row['pon1'];
            $user_pon2 = $row['pon2'];
            $user_pon3 = $row['pon3'];
            echo "  
                    <tr style='height:1rem;'>
                    <td  style='width: 7rem;text-align: center;'>$user_sp</td>
                    <td  style='width: 10rem;text-align: center;'>$user_id</td>
                    <td  style='width: 10rem;text-align: center;'>$user_macpon</td>
            
                    <td style='width: 15rem; text-align: center;'>
                    <input class='inputSetting' value=$user_pon1 id='oldpon1' disabled></input> - 
                    <input class='inputSetting' value=$user_pon2 id='oldpon2' disabled></input> - 
                    <input class='inputSetting' value=$user_pon3 id='oldpon3' disabled></input>
                    </td>
                    <form method='post'>
                    <td style='width: 20rem; text-align: center;'> 
                    <input type='number' style='width: 3rem; class='inputSetting newpon1'  value='' name='newpon1' id='newpon1$is_id'></input> - 
                    <input type='number' style='width: 3rem; class='inputSetting newpon2'  value='' name='newpon2' id='newpon2$is_id'></input> - 
                    <input type='number' style='width: 3rem; class='inputSetting newpon3'  value='' name='newpon3' id='newpon3$is_id'></input>
                    </td>
                    </form>
                    <td  style='width: 20rem;text-align: center;'>
                    <button type='submit' class='btn btn-success uid_data'  name='update_data' id='$is_id'> Update</button> 
                    <button class='btn btn-info view_new'  data-target='#myModal' data-toggle='modal' id=$is_id>view</button>
                    
                    </td>
                    <td id='status_Data$is_id'></td>
                    </tr>
                    ";   
            //action='../config/update_index.php?uid=$user_id'
                $arr_data[] = array(
                    'user_sp' => $user_sp, 
                    "user_id" => $user_id,
                    "user_macpon" => $user_macpon, 
                    "user_pon1" => $user_pon1, 
                    "user_pon2" => $user_pon2,
                    "user_pon3" => $user_pon3
                    
                    
                );
        }
    }else{
        echo "Not found Data ";
    }
    echo json_encode($arr_data);

?>
<script src="../script/profile_modal.js"></script>
<script>
   $(document).ready(function(){
    $('.uid_data').click(function(){
        var uid=$(this).attr('id');
        var newpon1 = document.getElementById('newpon1'+uid).value;
        var newpon2 = document.getElementById('newpon2'+uid).value;
        var newpon3 = document.getElementById('newpon3'+uid).value;
        $.ajax({
            url:'../config/update_index.php',
            type:'POST',
            data: {uid:uid , newpon1:newpon1 ,newpon2:newpon2 , newpon3:newpon3},
            beforeSend:function() {
            console.log(uid,newpon1,newpon2,newpon3);
            },
            success: function(data){
                $('#status_Data'+uid).html(data);
            //window.alert(data);
            }
        });
    
});
           
        
        

});
</script>

