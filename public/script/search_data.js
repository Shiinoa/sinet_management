$(document).ready(function(){
    load_data();
    
    function load_data(query) {
        $.ajax({
            url: "../config/search_data_db.php",
            method: "POST",
            data: {query:query},
           // dataType: 'json',
            success:function(data) {
            $('#search_data_result').html(data);
            }
             
        });
        return false;
    }
    $('#search_data_text').on('keyup',function(){
        $("#check_status").change(function(){
            var check_status = $('#check_status').val();
            //console.log(check_status);
        })
        var search = $('#search_data_text').val();
        if(search != ''){
            if(search.length >= 5){
                load_data(search);
                //console.log(search);
                
            }
            
        }else{
            load_data();
        }
     
    });
});
