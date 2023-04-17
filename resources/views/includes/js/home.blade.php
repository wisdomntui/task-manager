<script type="module">
    $(document).ready(function(){

        let table = $('#task-table').DataTable({
            processing: true,
            serverSide: true,
            rowReorder: {
                update: false,
            },
            ajax: {
                url: '{{ route("home") }}',
                data: function (d) {
                    d.project = $('#project-filter').val();
                }
            },
            columns: [
                {data: 'priority', name: 'priority'},
                {data: 'name', name: 'name'},
                {data: 'description', name: 'description'},
                {data: 'project', name: 'project.title'},
                {data: 'created_at', name: 'created_at'},
                {data: 'updated_at', name: 'updated_at'},
                {data: 'action', name: 'action', orderable: false, searchable: false},
            ]
        });

        $("#project-filter").on("change", function(){
            table.draw();
        });


        // Handle updating priority after sorting
        table.on('row-reorder', function ( e, diff, edit ) {
            let ids = new Array();
            for (let i = 1; i < e.target.rows.length; i++) {
                let b =e.target.rows[i].cells[0].innerHTML;
                ids.push(b);
            }

            $.ajax({
                type: "POST",
                url: "{{route('task.reorder')}}",
                dataType: "json",
                data: {
                    'priorities': ids
                },
                success: (data, status) => {
                    // Reload table afterwards
                    table.ajax.reload();
                },
                error:function (jqXhr, textStatus, errorMessage) { // error callback 
                    let statusCode = jqXhr.status;
                    let message = jqXhr.responseJSON.errors;
                }
            });
        });

        // Trigger edit 
        $('body').on('click', 'a.edit', function (e) {
            let ele = e.target;

           // Fill input fields
            $('input[name="id"]').val($(ele).data('id'));
            $('input[name="name"]').val($(ele).data('name'));
            $('input[name="priority"]').val($(ele).data('priority'));
            $('textarea[name="description"]').val($(ele).data('description'));
            $('select[name="project"]').val($(ele).data('project'));

            // Toggle modal
            const myModalEl = document.getElementById('edit-task')
            const modal = new bootstrap.Modal(myModalEl)
            modal.toggle()

        });

        // Trigger delete
        $('body').on('click', 'a.delete', function (e) {
            let ele = e.target;

           // Fill input fields
            $('input[name="id"]').val($(ele).data('id'));

            // Toggle modal
            const myModalEl = document.getElementById('delete-task')
            const modal = new bootstrap.Modal(myModalEl)
            modal.toggle()

        });

    });
</script>