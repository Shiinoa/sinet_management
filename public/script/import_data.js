$(document).ready(function(){
    
    $('#import_file').change(function () {
        $('#form_import').submit;
    })
    $('#form_import').on('submit',function(event){
        event.preventDefault();
                $.ajax({
                    type: 'POST',
                    url:"../config/process_import.php",
                    data:new FormData($(this)[0]),
                    contentType: false,
                    processData:false,
                    cache: false,
                    beforeSend: function () {
                        ///เป็นส่วนการแสดง loading progress bar ในขณะที่กำลังทำงานอยู่
                        $('#import_file_btn').attr('disabled','disabled');
                        $('#loader').show();
                    },
                    success: function(data) {
                    $('#form_import_data').html(data);
                    $('#form_import')[0].reset();
                    $('#import_file_btn').attr('disabled',false);
                    $('#loader').hide();
                    },
                    error: function() {
                        alert("Something went wrong!");
                    }
                });
           // 
            return false; 
           
            
    });

});