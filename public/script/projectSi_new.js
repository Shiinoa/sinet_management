$(document).ready(function(){ 
    $.ajax({//ส่งข้อมูล JSON แบบ ajax
        url: '../config/show_newProjectSI.php', //ลิ้งที่ไปยัง Database
        type: 'POST',//แบบ POST
        //dataType: 'JSON',//ถ้าต้องการข้อมูลแบบ ARRAY ต้องใส่ประเภท 'json' ไป หรือถ้าไม่ก็เอาออก ซะ 
        success: function(data) {
          $('#search_data_result').html(data);
        }
    });
    return false;
   

});