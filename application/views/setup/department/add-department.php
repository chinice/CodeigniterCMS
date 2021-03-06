<div id="newDeptModal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="display: none;">
    <div class="modal-dialog">
        <div class="modal-content">
            <form action="<? echo BASEURL ?>setup/add_department" id="deptForm" method="post">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                    <h4 class="modal-title">ADD NEW DEPARTMENT</h4>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="field-1" class="control-label">Name</label>
                                <input type="text" class="form-control" required id="name" name="name" placeholder="Department Name">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="field-2" class="control-label">Code</label>
                                <input type="text" class="form-control" required id="code" name="code" placeholder="Department Code">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="field-2" class="control-label">Status</label>
                                <select name="status" class="form-control" id="status">
                                    <option value="">-- Select --</option>
                                    <option value="1">Active</option>
                                    <option value="0">Inactive</option>
                                </select>
                            </div>
                        </div>
                    </div>
                    <div id="roller" style="display: none; text-align: center;">
                        <img src="<?php echo IMAGE_URL ?>Blocks.gif" width="50" height="40"/>
                    </div>
                </div>
                <div class="modal-footer">
                    <input type="hidden" name="id" id="id" value="" />
                    <button type="button" class="btn btn-default waves-effect" id="close-modal">Close</button>
                    <button type="submit" id="submit" class="btn btn-info waves-effect waves-light"></button>
                </div>
            </form>
        </div>
    </div>
</div>