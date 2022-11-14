<div class="popup" id="popup">
            <div class="mt-3"><h2 id="customer" value=""></h2></div>
            <?php 
                    
                    //$olt_type =$row['pmg_model'];
                    $result_olt= $db->prepare("SELECT * FROM fttx_profile WHERE p_id = :u_p_id");
                    $result_olt->bindParam(':u_p_id',$u_p_id);
                    $result_olt->execute();
                    while ($row_olt = $result_olt->fetch(PDO::FETCH_ASSOC)) {?> 
                    <div>
                    <textarea type='text' id='profile_fttx' hidden><?php echo $row_olt['p_fmt']?></textarea><br>
                                               
                    </div>
                    <form  >
                        <div class='card'><textarea class='heighttext' name="" id="result_profile_fttx"></textarea></div>
                    
                    </form>
                      
                
            <button class="btn btn-warning" onclick="closePopup()">Close</button>

        </div>
        </div>
<?php } ?>