$(document).ready(function(){ 
    $('#button2').click(function(e){ //รับค่า จาก HTML โดย ข้อมูลที่รับ ค่า ต้อง มีประเภท id ในฟังค์ชั่นนั้น จะทำงานก้ต่อเมื่อ คลิ๊ก
        let res_data = $('#area_4').val(); //รับค่า จาก HTML โดย ข้อมูลที่รับ ค่า ต้อง มีประเภท id ในฟังค์ชั่นนั้น
        let test = $('#area_4').val(); //รับค่า จาก HTML โดย ข้อมูลที่รับ ค่า ต้อง มีประเภท id ในฟังค์ชั่นนั้น
        $.ajax({//ส่งข้อมูล JSON แบบ ajax
           
            url: 'data.php', //ลิ้งที่ไปยัง Database
            type: 'POST',//แบบ POST
            dataType: 'json',//ถ้าต้องการข้อมูลแบบ ARRAY ต้องใส่ประเภท 'json' ไป หรือถ้าไม่ก็เอาออก ซะ 
            data: {res_data:res_data},//ส่งค่าไป พารามิเตอร์   จะเป็น ประมาณว่า {ตัวแปรที่ต้องส่งไปยัง Database : ตัวแปรที่รับมา}
            success: function(data) {
                var TextSearch = document.getElementById("text_area_3").value;
                //ทำการ ค้นหา ตัว "|"  ใน โปรไฟล์ ออกให้เป้น "" 
                let const_1 = document.getElementById("text_box_2").innerHTML =TextSearch.replaceAll("|","");
                
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
                    document.getElementById("text_box_2").innerHTML =  const_1.replaceAll(/\b(?:ont_index|onu_sn|up_speed|down_speed|u_id|isp|sp_name|vlan_n|vlan_m|u_name|tel_phone|auth_pass|auth_user)\b/gi, matched => mapObj[matched]);
               
            }
        });
        return false;

    })



});