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
    $('.dropify').dropify({
        messages: {
            'default': 'Drag and drop a file here or click',
            'replace': 'Drag and drop or click to replace',
            'remove': 'Remove',
            'error': 'Ooops, something wrong appended.'
        },
        error: {
            'fileSize': 'The file size is too big (1M max).'
        }
    });
</script>
<script>
    $(function(){

        $('#description')
            .froalaEditor({enter: $.FroalaEditor.ENTER_P, placeholderText: "Description about the service"});

        $.SweetAlert.init();

        $('.addService').click(function(){
            $('#newServiceModal').modal();
        });

        $('#close-modal').click(function(){
            $('#serviceForm')[0].reset();
            $('#newServiceModal').modal('hide');
        });

        //submit the department form
        $('#serviceForm').submit(function(event){
            event.preventDefault();

            var title = $('#title').val();
            var description = $('#description').val();
            var status = $('#status').val();
            var image = $('#image').val();

            if(title == '' || description == '' || status == '' || image == ''){
                toastr['error']('All fields are mandatory', 'Error');
                return;
            }

            var formData = new FormData(this);

            $.ajax({
                url: $(this).attr('action'),
                data: formData,
                type: "POST",
                contentType: false,
                cache: false,
                processData: false,
                success: function (e) {
                    if(e) {
                        toastr['success']("Service was successfully created", 'Success');
                        setTimeout(window.location.reload(), 3100);
                    }else{
                        toastr['error']('An error occurred', 'Error');
                        return;
                    }
                },
                error: function(){
                    toastr['error']('An error occurred', 'Error');
                    return;
                }
            });
        });

        $('.status').click(function(){
            var id = $(this).attr('data-value');

            swal({
                title: "Change Status?",
                text: "Inactive status will not be displayed on the services page",
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
                        url: '<? echo BASEURL ?>service/status/?id='+id,
                        context: this,
                        success: function (e) {
                            if(e) {
                                swal({
                                    title: 'Service Status Changed!',
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
                            swal("Cancelled", "An error occurred! Error 111", "error");
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
                title: "Delete service?",
                text: "Data cannot be retrieve if deleted",
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
                        url: '<? echo BASEURL ?>service/delete/?id='+id,
                        context: this,
                        success: function (e) {
                            if(e) {
                                swal({
                                    title: 'Service Deleted!',
                                    text: 'The service was successfully deleted',
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
                            swal("Cancelled", "An error occurred! Error 111", "error");
                        }
                    });
                } else {
                    swal("Cancelled", "Change status operation was cancelled", "error");
                }
            });
        });
    });
</script>