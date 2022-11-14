$(document).ready(function(){
   
    $(document).on('keyup', function() {
       $('#sp_id').autocomplete({
          source: function( request, response ) {
             $.ajax({
                url: "fetch_sp.php",
                type: 'post',
                dataType: "json",
                data: {
                   search: request.term,request:1
                },
                success: function(data) {
                   response(data);
                   
                }
             });
          },
            select: function (event, ui) {
               $(this).val(ui.item.label); // display the selected text
               var userid = ui.item.value;
               
               if(userid != 0)
               { // selected value
                 
                  $.ajax({
                     url: 'fetch_sp.php',
                     type: 'post',
                     data: {
                        userid:userid,request:2
                     }, 
                     dataType: 'json',
                     success:function(response){
                        var len = response.length;
                        if(len > 0)
                        {
                           var sp_id_data = response[0]['sp_id'];
                            $.ajax({
                               url:"../config/moveGpon_db.php",
                               type:"POST",
                               data: {data:sp_id_data},
                              /* beforeSend:function() {
                                console.log(sp_id_data);
                               },*/
                               success: function(data){
                                $('#result_data').html(data);
                               }

                            });
                        }
                     }
                 });
               }
                return false;
            }
       });
      
    });
  
});     