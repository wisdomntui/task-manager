<script type="module">
    $(document).ready(function(){
        $("#add-project-form").on("submit", function(event){
            event.preventDefault();
            
            let data = $(this).serialize();
            
            $.ajax({
                type: "POST",
                url: "{{route('project.create')}}",
                dataType: "json",
                data,
                success: (data, status) => {
                    //table.ajax.reload();
                    $("#project-alert").removeClass('d-none');

                    // Reload page afterwards
                    setTimeout(() => {
                        location.reload();
                    }, 2000);
                },
                error:function (jqXhr, textStatus, errorMessage) { // error callback 
                    let statusCode = jqXhr.status;
                    let message = jqXhr.responseJSON.message;

                    if(statusCode == 422){ // Validation error
                        $("#project-error-msg").html(message);
                    }
                }
            });
        });
    });
</script>