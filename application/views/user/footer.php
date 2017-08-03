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

        $.SweetAlert.init()

        $('.adduser').click(function(){
            $('#newUserModal').modal();
        });

        $('#close-modal').click(function(){
            $('#userForm')[0].reset();
            $('#newUserModal').modal('hide');
        });

        //submit the department form
        $('#userForm').submit(function(event){
            event.preventDefault();
            var formData = new FormData(this);

            $.ajax({
                url: $(this).attr('action'),
                data: formData,
                type: "POST",
                contentType: false,
                cache: false,
                processData: false,
                success: function (e) {
                    toastr['success']("User was successfully created", 'Success');
                    setTimeout(window.location.reload(), 3100);
                },
                error: function(){
                    toastr['error']('An error occurred', 'Error');
                    return;
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
                        url: '<? echo BASEURL ?>user/delete/?id='+id,
                        context: this,
                        success: function () {
                            swal({
                                title: 'User Deleted!',
                                text: 'The user was successfully deleted',
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


        $('.status').click(function(){
            var id = $(this).attr('data-value');
            swal({
                title: "Are you sure?",
                text: "Status can be changed afterwards",
                type: "error",
                showCancelButton: true,
                confirmButtonClass: 'btn-danger waves-effect waves-light',
                confirmButtonText: "Yes, change it!",
                cancelButtonText: "No, cancel please!",
                closeOnConfirm: false,
                closeOnCancel: false
            }, function (isConfirm) {
                if (isConfirm) {
                    $.ajax({
                        type: 'GET',
                        url: '<? echo BASEURL ?>user/status/?id='+id,
                        context: this,
                        success: function (e) {
                            if(e) {
                                swal({
                                    title: 'User Status Changed!',
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
    });
</script>