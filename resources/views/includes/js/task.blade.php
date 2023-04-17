<script type="module">
    $(document).ready(function(){
        $("#add-task-form").on("submit", function(event){
            event.preventDefault();
            
            let data = $(this).serialize();
            
            $.ajax({
                type: "POST",
                url: "{{route('task.create')}}",
                dataType: "json",
                data,
                success: (data, status) => {
                    //table.ajax.reload();
                    $("#task-alert").removeClass('d-none');

                    // Reload page afterwards
                    // setTimeout(() => {
                    //     location.reload();
                    // }, 2000);
                },
                error:function (jqXhr, textStatus, errorMessage) { // error callback 
                    let statusCode = jqXhr.status;
                    let message = jqXhr.responseJSON.errors;

                    if(statusCode == 422){ // Validation error
                        $("#task-desc-error-msg").html(message['description']? message['description'][0]: '');
                        $("#task-name-error-msg").html(message['name']?message['name'][0]: '');
                    }
                }
            });
        });
    });
</script>