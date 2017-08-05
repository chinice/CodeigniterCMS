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
            .froalaEditor({enter: $.FroalaEditor.ENTER_P, placeholderText: "Description"});

        $('.addAbout').click(function(){
            $('#submit').html('Add record');
            $('#newContentModal').modal();
        });

        $('#close-modal').click(function(){
            $('#aboutForm')[0].reset();
            $('#newContentModal').modal('hide');
        });

        //submit the department form
        $('#aboutForm').submit(function(event){
            event.preventDefault();
            var formData = new FormData(this);
            var id = $('#id').val();

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

                    if(id !== ""){
                        toastr['success']("About us record was successfully updated", 'Success');
                    }else{
                        toastr['success']("About us record was successfully created", 'Success');
                    }

                    $('#aboutForm')[0].reset();
                    $('#newContentModal').modal('hide');
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


        $('.edit').click(function(){
            var id = $(this).attr('data-value');
            $('#id').val(id);

            $.ajax({
                type	:	'GET',
                url 	:	'<? echo BASEURL ?>aboutus/get_data/?id='+id,
                cache	:	false,
                context : 	this,
                success	: function(res){
                    jsonOBJ	=	$.parseJSON(res);
                    for (var key in jsonOBJ) {
                        $("input[name=" + key + "]").val(jsonOBJ[key]);
                    }
                    $("#content").find("option[value=" + jsonOBJ['content'] + "]").attr('selected', 'selected');
                    $('#description').val(jsonOBJ['description']);

                    $('#submit').html('Update record');
                    $('#newContentModal').modal();
                }
            });
        });

        $('.delete').click(function(){
            var id = $(this).attr('data-value');

            swal({
                title: "Delete about us record?",
                text: "Data cannot be retrieve once deleted",
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
                        url: '<? echo BASEURL ?>aboutus/delete/?id='+id,
                        context: this,
                        success: function (e) {
                            if(e) {
                                swal({
                                    title: 'Record Deleted!',
                                    text: 'The record was successfully deleted',
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


        $('.status').click(function(){
            var id = $(this).attr('data-value');

            swal({
                title: "Change Status?",
                text: "Inactive status will not be displayed",
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
                        url: '<? echo BASEURL ?>aboutus/changeStatus/?id='+id,
                        context: this,
                        success: function (e) {
                            if(e) {
                                swal({
                                    title: 'Record Status Changed!',
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
    });
</script>