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
                           var sp_id__data = response[0]['sp_id'];
                           var node = response[0]['node_'];
                           var olt = response[0]['olt_'];
                           
                           // Set value to textboxes
                           document.getElementById('sp_id__data').value = sp_id__data;
                           document.getElementById('node_').value = node;
                           document.getElementById('olt_').value = olt;

                        }
                     }
                 });
               }
                return false;
            }
       });
});
  
});                