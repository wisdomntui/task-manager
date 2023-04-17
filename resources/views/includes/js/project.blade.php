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
                    console.log(data);
                }
            });
        });
    });
</script>