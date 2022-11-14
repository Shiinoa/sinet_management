<!-- Modal -->
<div class="modal fade modal_sp" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
            <h4 class="modal-title" id="Headsp_name"></h4>
                <button type="button" class="btn btn-warning" data-dismiss="modal">Close</button>
            </div>
            <div class="modal-body">
                <div class="panel-body">
              
                <form class="row g-3" method="POST">
                        <div class="col-md-2">
                            <label  class="form-label">SP</label>
                            <input type="text" class="form-control" id="spname_data"   name="spname_data"  value="" hidden>
                            <input type="text" class="form-control" id="spname" value="" disabled>
                        </div>
                        <div class="col-sm-3">
                            <label  class="form-label" >Type</label>
                            <select class="form-select" id="type_sp" name="type_sp">
                            <option selected >Choose...</option>
                            <option value="CLO">CLO</option>
                            <option value="OTB">OTB</option>
                            </select>
                        </div>
                       
                        <div class="col-2">
                            <label  class="form-label">Node</label>
                            <input type="text" class="form-control" id="node"  name="node" value="">
                        </div>
                        <div class="col-2">
                            <label  class="form-label">OLT</label>
                            <input type="text" class="form-control" id="olt" name="olt" value="">
                        </div>
                        <div class="col-md-2">
                            <label class="form-label">Route</label>
                            <input type="text" class="form-control" id="route" name="route" value="">
                        </div>
                        <div class="col-md-2">
                            <label for="inputZip" class="form-label">Latitude</label>
                            <input type="text" class="form-control" id="lat" name="lat" value="">
                        </div>
                        <div class="col-md-2">
                            <label for="inputZip" class="form-label">Longitude</label>
                            <input type="text" class="form-control" id="lon" name="lon" value="">
                        </div>
                        <div class="col-md-6">
                            <label for="inputZip" class="form-label">Location</label>
                            <input type="text" class="form-control" id="location" name="location" value="">
                        </div>
                       
                    
                </div>
            </div>
            <div class="modal-footer">
                    <?php if(isset($_SESSION['status'])){
                         $data_st = $_SESSION['status'];
                          }
                     if($data_st != "USER" ){?>
                    <button type="submit" name="updateSP" class="btn btn-success"><i class="fas fa-file-alt"></i> Update</button>
                    <?php } ?>
            </div>
        </form>
       
        </div>
    </div>
</div>

