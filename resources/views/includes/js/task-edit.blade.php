
<script type="module">
    $(document).ready(function(){
        $("#edit-task-form").on("submit", function(event){
            event.preventDefault();
            
            let data = $(this).serialize();
            
            $.ajax({
                type: "POST",
                url: "{{route('task.update')}}",
                dataType: "json",
                data,
                success: (data, status) => {
                    //table.ajax.reload();
                    $("#edit-task-alert").removeClass('d-none');

                    // Reload page afterwards
                    setTimeout(() => {
                        location.reload();
                    }, 2000);
                },
                error:function (jqXhr, textStatus, errorMessage) { // error callback 
                    let statusCode = jqXhr.status;
                    let message = jqXhr.responseJSON.errors;

                    if(statusCode == 422){ // Validation error
                        $("#edit-task-desc-error-msg").html(message['description']? message['description'][0]: '');
                        $("#edit-task-name-error-msg").html(message['name']?message['name'][0]: '');
                    }
                }
            });
        });
    });
</script>
