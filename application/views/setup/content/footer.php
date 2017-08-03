<script type="text/javascript">
    $(function(){
        $.SweetAlert.init()

        $('.addContent').click(function(){
            $('#submit').html('Add Content');
            $('#newContentModal').modal();
        });

        $('#close-modal').click(function(){
            $('#contentForm')[0].reset();
            $('#newContentModal').modal('hide');
        });

        //submit the department form
        $('#contentForm').submit(function(event){
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
                        toastr['success']("Content was successfully updated", 'Success');
                    }else{
                        toastr['success']("Content was successfully created", 'Success');
                    }

                    $('#contentForm')[0].reset();
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
                        url: '<? echo BASEURL ?>setup/change_content_status/?id='+id,
                        context: this,
                        success: function (e) {
                            if(e) {
                                swal({
                                    title: 'Content Status Changed!',
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
                title: "Delete content?",
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
                        url: '<? echo BASEURL ?>setup/delete_content/?id='+id,
                        context: this,
                        success: function (e) {
                            if(e) {
                                swal({
                                    title: 'Content Deleted!',
                                    text: 'The content was successfully deleted',
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

        $('.edit').click(function(){
            var id = $(this).attr('data-value');
            $('#id').val(id);
            $.ajax({
                type	:	'GET',
                url 	:	'<? echo BASEURL ?>setup/get_data/?id='+id,
                cache	:	false,
                context : 	this,
                success	: function(res){
                    jsonOBJ	=	$.parseJSON(res);
                    for (var key in jsonOBJ) {
                        $("input[name=" + key + "]").val(jsonOBJ[key]);
                        $("textarea[name=" + key + "]").val(jsonOBJ[key]);
                    }
                    $("#status").find("option[value=" + jsonOBJ['status'] + "]").attr('selected', 'selected');

                    $('#submit').html('Update Content');
                    $('#newContentModal').modal();
                }
            });
        });
    });
</script>