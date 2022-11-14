$(document).ready(function(){
    $('#search_data_text,#check_status,#olt_status').on("keyup change", function(event){
        let check_status = $('#check_status').val();
        let search = $('#search_data_text').val();
        let olt_data =  $('#olt_status').val();
        if(search != ''){
            if(search.length >= 5){
                let pon_data = search.replace(/pon/gi,"");
                $.ajax({
                    type: 'POST',
                    url: '../config/search_data.php',
                    //beforeSend: function() { console.log(olt_data); },
                    data: { search_data_text: search, check_status: check_status , pon_data:pon_data ,olt_status:olt_data },
                    success: function(data) {
                        $('#search_data_result').html(data);
                    }
                });
                return false;
            }else {
                $('#search_data_result').html("No DATA");
            } 
            
        }else {
            $('#search_data_result').html("NO DATA");
        } 
    });

});