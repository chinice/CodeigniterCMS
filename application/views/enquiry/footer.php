<script type="text/javascript" src="<? echo WYSIWYG_JS ?>froala_editor.min.js"></script>
<script type="text/javascript" src="<? echo WYSIWYG_JS ?>plugins/align.min.js"></script>
<script type="text/javascript" src="<? echo WYSIWYG_JS ?>plugins/code_beautifier.min.js"></script>
<script type="text/javascript" src="<? echo WYSIWYG_JS ?>plugins/code_view.min.js"></script>
<script type="text/javascript" src="<? echo WYSIWYG_JS ?>plugins/draggable.min.js"></script>
<script type="text/javascript" src="<? echo WYSIWYG_JS ?>plugins/image.min.js"></script>
<script type="text/javascript" src="<? echo WYSIWYG_JS ?>plugins/image_manager.min.js"></script>
<script type="text/javascript" src="<? echo WYSIWYG_JS ?>plugins/link.min.js"></script>
<script type="text/javascript" src="<? echo WYSIWYG_JS ?>plugins/lists.min.js"></script>
<script type="text/javascript" src="<? echo WYSIWYG_JS ?>plugins/paragraph_format.min.js"></script>
<script type="text/javascript" src="<? echo WYSIWYG_JS ?>plugins/paragraph_style.min.js"></script>
<script type="text/javascript" src="<? echo WYSIWYG_JS ?>plugins/table.min.js"></script>
<script type="text/javascript" src="<? echo WYSIWYG_JS ?>plugins/video.min.js"></script>
<script type="text/javascript" src="<? echo WYSIWYG_JS ?>plugins/url.min.js"></script>
<script type="text/javascript" src="<? echo WYSIWYG_JS ?>plugins/entities.min.js"></script>
<script type="text/javascript">
    $(function(){
        $('#description')
            .froalaEditor({enter: $.FroalaEditor.ENTER_P, placeholderText: "Enter your reply here"});

        $('.status').click(function(){
            var id = $(this).attr('data-value');

            swal({
                title: "Are you sure?",
                text: "Status can be changed afterwards",
                type: "warning",
                showCancelButton: true,
                confirmButtonClass: 'btn-warning waves-effect waves-light',
                confirmButtonText: "Yes, change it!",
                cancelButtonText: "No, cancel please!",
                closeOnConfirm: false,
                closeOnCancel: false
            }, function (isConfirm) {
                if (isConfirm) {
                    $.ajax({
                        type: 'GET',
                        url: '<? echo BASEURL ?>enquiry/changeStatus/?id='+id,
                        context: this,
                        success: function (e) {
                            if(e) {
                                swal({
                                    title: 'Enquiry Status Changed!',
                                    text: 'The status was successfully changed',
                                    type: 'success',
                                    closeOnConfirm: true
                                }, function (isConfirm) {
                                    if (isConfirm) {
                                        setTimeout(window.location.reload(), 3100);
                                    }
                                });
                            }else{
                                swal("Cancelled", "An error occurred!", "error");
                            }
                        },
                        error: function(){
                            swal("Cancelled", "An error occurred!", "error");
                        }
                    });
                } else {
                    swal("Cancelled", "Change status operation was cancelled", "error");
                }
            });
        });


        $('.delete').click(function(){
            var id = $(this).attr('data-value');
            swal({
                title: "Are you sure?",
                text: "You will not be able to recover the data if deleted!",
                type: "error",
                showCancelButton: true,
                confirmButtonClass: 'btn-danger waves-effect waves-light',
                confirmButtonText: "Yes, delete it!",
                cancelButtonText: "No, cancel please!",
                closeOnConfirm: false,
                closeOnCancel: false
            }, function (isConfirm) {
                if (isConfirm) {
                    $.ajax({
                        type: 'GET',
                        url: '<? echo BASEURL ?>enquiry/delete/?id='+id,
                        context: this,
                        success: function () {
                            swal({
                                title: 'Enquiry Deleted!',
                                text: 'The enquiry was successfully deleted',
                                type: 'success',
                                closeOnConfirm: true
                            }, function(isConfirm){
                                if(isConfirm) {
                                    setTimeout(window.location.reload(), 3100);
                                }
                            });
                        },
                        error: function(){
                            swal("Cancelled", "An error occurred!", "error");
                        }
                    });
                } else {
                    swal("Cancelled", "Delete operation was cancelled", "error");
                }
            });
        });

        $('.reply').click(function(){
            $('#submit').html('Send reply')
            $('#id').val($(this).attr('data-value'));
            $('#replyModal').modal();
        });

        $('#close-modal').click(function(){
            $('#replyForm')[0].reset();
            $('#id').val('');
            $('#replyModal').modal('hide');
        });

        //submit the department form
        $('#replyForm').submit(function(event){
            event.preventDefault();
            var formData = new FormData(this);

            document.getElementById('roller').style.display = "block";

            $('#submit').prop('disabled', true);

            $.ajax({
                url: $(this).attr('action'),
                data: formData,
                type: "POST",
                contentType: false,
                cache: false,
                processData: false,
                success: function (e) {
                    document.getElementById('roller').style.display = "none";
                    $('#submit').prop('disabled', false);

                    toastr['success']("Reply was successfully sent", 'Success');
                    setTimeout(window.location.reload(), 3100);
                },
                error: function(){
                    document.getElementById('roller').style.display = "none";
                    $('#submit').prop('disabled', false);

                    toastr['error']('An error occurred', 'Error');
                    return;
                }
            });
        });
    });
</script>