@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    <button type="button" class="btn btn-primary" data-bs-target="#add-project" data-bs-toggle="modal">Add project</button>
                    <button type="button" class="btn btn-primary" data-bs-target="#add-task" data-bs-toggle="modal">Add task</button>
                </div>
                
                <div class="card-body">
                    <div class="row">
                        <div class="col">
                            <select class="custom-select custom-select-sm text-right" id="project-filter">
                                <option value="">All Projects</option>
                                @foreach($projects as $key => $val)
                                    <option value="{{$key}}">{{$val}}</option>
                                @endforeach
                              </select>
                        </div>
                    </div>
                    <hr>
                    <div class="row">
                        <div class="col">
                            <table class="table table-striped table-bordered" id="task-table">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Name</th>
                                        <th>Description</th>
                                        <th>Project</th>
                                        <th>Created At</th>
                                        <th>Updated At</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


{{-- Modal for creating new project --}}
@component('components.modal', [
'id' => 'add-project',
'class' => '',
])
@slot('dialogClasses', 'modal-dialog-centered modal-dialog-scrollable')
@slot('headerClasses', '')
@slot('title', 'Create Project')

@slot('content')
@include('pages.modal.create-project')
@endslot

@endcomponent

{{-- Modal for creating new task --}}
@component('components.modal', [
'id' => 'add-task',
'class' => '',
])
@slot('dialogClasses', 'modal-dialog-centered modal-dialog-scrollable')
@slot('headerClasses', '')
@slot('title', 'Create Task')

@slot('content')
@include('pages.modal.create-task')
@endslot

@endcomponent

{{-- Modal for editing task --}}
@component('components.modal', [
'id' => 'edit-task',
'class' => '',
])
@slot('dialogClasses', 'modal-dialog-centered modal-dialog-scrollable')
@slot('headerClasses', '')
@slot('title', 'Edit Task')

@slot('content')
@include('pages.modal.edit-task')
@endslot

@endcomponent


{{-- Modal for deleting task --}}
@component('components.modal', [
'id' => 'delete-task',
'class' => '',
])
@slot('dialogClasses', 'modal-dialog-centered modal-dialog-scrollable')
@slot('headerClasses', '')
@slot('title', 'Delete Task')

@slot('content')
@include('pages.modal.delete-task')
@endslot

@endcomponent

<script type="module">
    $(document).ready(function(){

        let table = $('#task-table').DataTable({
            processing: true,
            serverSide: true,
            rowReorder: true,
            ajax: {
                url: '{{ route("home") }}',
                data: function (d) {
                    d.project = $('#project-filter').val();
                }
            },
            columns: [
                {data: 'id', name: 'id'},
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

        // Trigger edit 
        $('body').on('click', 'a.edit', function (e) {
            let ele = e.target;

           // Fill input fields
            $('input[name="id"]').val($(ele).data('id'));
            $('input[name="name"]').val($(ele).data('name'));
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

@endsection

