$(document).ready(function(){
    $('.view_newSI').click(function(){
        var uid=$(this).attr("id");
        $.ajax({
                url:"../config/view_data_modal_si.php",
                method:"post",
                data:{id:uid},
                dataType: 'json',
                beforeSend: function () {
                        console.log(uid);
                },
                success:function(data){
                      $("#profile_fttx").html(data[16]);
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
                                    vlan_1:data[7],
                                    vlan_2:data[8],
                                    vlan_3:data[9],
                                    vlan_4:data[10],
                                    u_name:data[11],
                                    tel_phone:data[12],
                                    auth_user:data[13],
                                    auth_pass:data[14],
                                    }; 
                                    //ทำการ replaceAll ตัวอักษร ใน โปรไฟล์ โดย เทียบกับ mapObj 
                                $result_ex = document.getElementById("result_profile_fttx").innerHTML =  const_1.replaceAll(/\b(?:ont_index|onu_sn|up_speed|down_speed|u_id|isp|sp_name|vlan_1|vlan_2|vlan_3|vlan_4|u_name|tel_phone|auth_pass|auth_user)\b/gi, matched => mapObj[matched]);
                                console.log("Result::"+$result_ex);
                                $('#dataModal').modal('show');
                        }
                })
    })
});  
