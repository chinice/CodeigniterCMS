<div id="newUserModal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="display: none;">
    <div class="modal-dialog">
        <div class="modal-content">
            <form action="<? echo BASEURL ?>user/add" id="userForm" method="post" enctype="multipart/form-data">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                    <h4 class="modal-title">ADD NEW USER</h4>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="field-1" class="control-label">First Name</label>
                                <input type="text" class="form-control" required id="firstname" name="firstname" placeholder="First Name">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="field-2" class="control-label">Last Name</label>
                                <input type="text" class="form-control" required id="lastname" name="lastname" placeholder="Last Name">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="field-3" class="control-label">Username</label>
                                <input type="text" class="form-control" required id="username" name="username" placeholder="Username">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="field-3" class="control-label">Email</label>
                                <input type="email" class="form-control" name="email" required id="email" placeholder="Email">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="field-4" class="control-label">Position</label>
                                <input type="text" name="position" class="form-control" id="position" placeholder="Position">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="field-5" class="control-label">Department</label>
                                <select name="department" class="form-control">
                                    <option value="">-- Select --</option>
                                    <?php
                                        foreach($departments as $department) {
                                            ?>
                                            <option value="<? echo $department->getId(); ?>"><? echo $department->getName(); ?></option>
                                            <?php
                                        }
                                    ?>
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group no-margin">
                                <label for="field-7" class="control-label">Personal Info</label>
                                <textarea name="personal_info" class="form-control autogrow" id="field-7" placeholder="Write something about yourself"
                                          style="overflow: hidden; word-wrap: break-word; resize: horizontal; height: 240px;"></textarea>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="field-7" class="control-label">Profile Pic</label>
                                <div class="card-box">
                                    <input type="file" name="image" class="dropify" data-max-file-size="1M" />
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default waves-effect" id="close-modal">Close</button>
                    <button type="submit" class="btn btn-info waves-effect waves-light">Add User</button>
                </div>
            </form>
        </div>
    </div>
</div>