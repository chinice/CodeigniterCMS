<script>
    $(function(){

        $('.reset').click(function(){
            $('#contactForm')[0].reset();
        });

        //submit the department form
        $('#contactForm').submit(function(event){
            event.preventDefault();

            var email = $('#email').val();
            var phone = $('#phone').val();
            var address = $('#address').val();
            var website = $('#website').val();

            if(email == '' || phone == '' || address == '' || website == ''){
                toastr['error']('All fields marked * are compulsory', 'Error');
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
                        toastr['success']("Contact details was successfully entered", 'Success');
                        setTimeout(window.location.reload(), 3100);
                    }else{
                        toastr['error']('Operation terminated due to an error', 'Error');
                        return;
                    }
                },
                error: function(){
                    toastr['error']('An error occurred', 'Error');
                    return;
                }
            });
        });
    });
</script>