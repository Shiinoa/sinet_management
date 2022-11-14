$(document).ready(function(){
    $('.view_new').click(function(){
        var uid=$(this).attr("id");
        console.log(uid);
        $.ajax({
                url:"../config/view_data_modal.php",
                method:"post",
                data:{id:uid},
                dataType: 'json',
                success:function(data){
                       
                        $("#profile_fttx").html(data[14]);
                        var TextSearch = document.getElementById("profile_fttx").value;
                        let const_1 = document.getElementById("result_profile_fttx").innerHTML =TextSearch.replaceAll("|","");
                        
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
                                $('#dataModal').modal('show');
                        }
                })
    })
});  
