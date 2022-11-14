$(document).ready(function(){
    $('#search_data_text,#check_status').on("keyup change", function(event){
        var ck_status = $('#check_status').val();
        var search_sh = $('#search_data_text').val();
        if(search_sh != '')
        {
            if(search_sh.length >=5)
            {
                let pon_data = search_sh.replace(/pon/gi,"");
                $.ajax({
                    url: '../config/search_data_db.php',
                    type: 'post',
                    //dataType: 'json',
                    
                    data: { search_data_text: search_sh, check_status: ck_status , pon_data:pon_data },
                    success: function(response) {
                        $('#data_result').html(response);
                    }
                });
            }
            return false;
        }
    });

});