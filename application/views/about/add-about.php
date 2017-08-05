<div id="newContentModal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="display: none;">
    <div class="modal-dialog">
        <div class="modal-content">
            <form action="<? echo BASEURL ?>aboutus/add" id="aboutForm" method="post">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                    <h4 class="modal-title">ADD NEW ABOUT US RECORD</h4>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="field-2" class="control-label">Content</label>
                                <select name="content" id="content" class="form-control">
                                    <option value="">-- Select --</option>
                                    <?
                                    foreach($contents as $content) {
                                        ?>
                                        <option value="<? echo $content->getId(); ?>"><? echo $content->getName(); ?></option>
                                        <?php
                                    }
                                    ?>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="field-1" class="control-label">Title</label>
                                <input type="text" class="form-control" required id="title" name="title" placeholder="Title">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group no-margin">
                                <label for="field-7" class="control-label">Description</label>
                                <textarea name="description" id="description" class="form-control autogrow" id="field-7" placeholder="Content Description"
                                          style="overflow: hidden; word-wrap: break-word; resize: horizontal; height: 240px;"></textarea>
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