$(document).ready(function(){
    load_data_sp();
    function load_data_sp(){
        
            $.ajax({
                url:"../config/search_sp.php",
                method:"POST",
                data:{query:$('#search_data').val()},
                success:function(data){
                    
                    $('#search_data_result').html(data);
                }
            });
            return false;
        
       
    }
    $('#search_data').on('keyup',function(){
        var search_sp = $('#search_data').val();
       
        if(search_sp != ''){
            if(search_sp.length >= 3){
                load_data_sp();
            }
        }else{
            load_data_sp();
        }
    });

    
});