<script type="text/javascript">
    $(function(){
        $('.addDept').click(function(){
            $('#submit').html('Add Department');
            $('#newDeptModal').modal();
        });

        $('#close-modal').click(function(){
            $('#deptForm')[0].reset();
            $('#newDeptModal').modal('hide');
        });

        //submit the department form
        $('#deptForm').submit(function(event){
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

                    $('#deptForm')[0].reset();
                    $('#newDeptModal').modal('hide');
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
                        url: '<? echo BASEURL ?>setup/change_dept_status/?id='+id,
                        context: this,
                        success: function (e) {
                            if(e) {
                                swal({
                                    title: 'Department Status Changed!',
                                    text: 'The department was successfully changed',
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
                title: "Delete department?",
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
                        url: '<? echo BASEURL ?>setup/delete_department/?id='+id,
                        context: this,
                        success: function (e) {
                            if(e) {
                                swal({
                                    title: 'Department Deleted!',
                                    text: 'The department was successfully deleted',
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
                url 	:	'<? echo BASEURL ?>setup/get_dept/?id='+id,
                cache	:	false,
                context : 	this,
                success	: function(res){
                    jsonOBJ	=	$.parseJSON(res);
                    for (var key in jsonOBJ) {
                        $("input[name=" + key + "]").val(jsonOBJ[key]);
                    }
                    $("#status").find("option[value=" + jsonOBJ['status'] + "]").attr('selected', 'selected');

                    $('#submit').html('Update Department');
                    $('#newDeptModal').modal();
                }
            });
        });
    });
</script>