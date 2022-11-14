<!-- Modal -->
<div class="modal fade modal_sp" id="addsplitter" tabindex="-1" role="dialog" aria-labelledby="addsplitter" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
            <h4 class="modal-title">Add Splitter</h4>
                <button type="button" class="btn btn-warning" data-dismiss="modal">Close</button>
            </div>
            <div class="modal-body">
                <div class="panel-body">
                <form class="row g-3" action="../config/insertsplitter.php" method="POST">
                        <div class="col-md-2">
                            <label  class="form-label">SP</label>
                            
                            <input type="text" class="form-control" id="addspname"  name="addspname" value="" placeholder="ต้องใช้ SP พิมพ์ใหญ่เท่านั้น.." required>
                        </div>
                        <div class="col-sm-3">
                            <label  class="form-label" >Type</label>
                            <select class="form-select" id="addtype_sp"  name="addtype_sp" required>
                            <option selected  value="">Choose...</option>
                            <option value="CLO">CLO</option>
                            <option value="OTB">OTB</option>
                            </select>
                        </div>
                       
                        <div class="col-2">
                            <label  class="form-label">Node</label>
                            <input type="text" class="form-control" id="addnode" name="addnode" value="" required>
                        </div>
                        <div class="col-2">
                            <label  class="form-label">OLT</label>
                            <input type="text" class="form-control" id="addolt" name="addolt" value="" required>
                        </div>
                        <div class="col-md-2">
                            <label class="form-label">Route</label>
                            <input type="text" class="form-control" id="addroute" name="addroute" value="" required>
                        </div>
                        <div class="col-md-2">
                            <label for="inputZip" class="form-label">Latitude</label>
                            <input type="text" class="form-control" id="addlat" name="addlat" value="" required>
                        </div>
                        <div class="col-md-2">
                            <label for="inputZip" class="form-label">Longitude</label>
                            <input type="text" class="form-control" id="addlon" name="addlon" value="" required>
                        </div>
                        <div class="col-md-6">
                            <label for="inputZip" class="form-label">Location</label>
                            <input type="text" class="form-control" id="addlocation" name="addlocation"  value="" required>
                        </div>
                        
                   
                </div>
            </div>
            <div class="modal-footer">
                    <button type="submit" name="AddSplitter" class="btn btn-info"><i class="fas fa-file-alt"></i> Add Splitter</button>
            </div>
            </form>
        </div>
    </div>
</div>