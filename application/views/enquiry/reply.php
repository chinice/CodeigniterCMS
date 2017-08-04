<div id="replyModal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="display: none;">
    <div class="modal-dialog">
        <div class="modal-content">
            <form action="<? echo BASEURL ?>enquiry/reply" id="replyForm" method="post" enctype="multipart/form-data">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                    <h4 class="modal-title">ADD NEW USER</h4>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="field-1" class="control-label">From</label>
                                <input type="text" class="form-control" required id="from" name="from" placeholder="From email">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="field-2" class="control-label">Subject</label>
                                <input type="text" class="form-control" required id="subject" name="subject" placeholder="Subject">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="field-3" class="control-label">Message</label>
                                <textarea name="message" cols="20" id="message" class="form-control autogrow"></textarea>
                            </div>
                        </div>
                    </div>
                    <input type="hidden" value="" name="id" id="id" />
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