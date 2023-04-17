@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
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
                            <table class="table table-striped table-bordered table-responsive" id="task-table">
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



@include('includes.js.home')

@endsection

