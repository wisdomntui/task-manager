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
                            <select class="custom-select custom-select-sm text-right">
                                <option selected>Open this select menu</option>
                                <option value="1">One</option>
                                <option value="2">Two</option>
                                <option value="3">Three</option>
                              </select>
                        </div>
                    </div>
                    <hr>
                    <div class="row">
                        <div class="col">
                            <table class="table table-striped table-bordered">
                                <thead>
                                    <tr>
                                        <th>Name</th>
                                        <th>Email</th>
                                        <th>Phone</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td class="text-success">Wisdom Ntui</td>
                                        <td>wisdomntui@gmail.com</td>
                                        <td>09038781638</td>
                                    </tr>
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
@slot('headerClasses', 'bg-primary')
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
@slot('headerClasses', 'bg-primary')
@slot('title', 'Edit Task')

@slot('content')
@include('pages.modal.edit-task')
@endslot

@endcomponent

<script type="module">
    $(document).ready(function(){
    
    });
</script>

@endsection

