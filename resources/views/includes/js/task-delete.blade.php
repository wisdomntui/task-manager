
<script type="module">
    $(document).ready(function(){
        $("#delete-task-form").on("submit", function(event){
            event.preventDefault();
            
            let data = $(this).serialize();
            
            $.ajax({
                type: "POST",
                url: "{{route('task.delete')}}",
                dataType: "json",
                data,
                success: (data, status) => {
                    //table.ajax.reload();

                    // Reload page afterwards
                    setTimeout(() => {
                        location.reload();
                    }, 2000);
                },
                error:function (jqXhr, textStatus, errorMessage) { // error callback 
                    let statusCode = jqXhr.status;
                    let message = jqXhr.responseJSON.errors;

                    if(statusCode == 422){ // Validation error
                        alert(message['id']? message['id'][0]: '');
                    }
                }
            });
        });
    });
</script>
