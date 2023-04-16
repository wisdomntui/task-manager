@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Dashboard') }}</div>

                <div class="card-body">
                    <div class="row">
                        <div class="col">
                            <table>
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
                        <div class="col-md-8">
                            <h1>Hello there</h1>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

{{-- Modal for creating new task --}}
@component('components.modal', [
'id' => 'create-task',
'class' => '',
])
@slot('dialogClasses', 'modal-dialog-centered modal-dialog-scrollable')
@slot('headerClasses', 'bg-primary')
@slot('title', 'Create Task')

@slot('body')
@include('pages.modal.create-task')
@endslot

@slot('footer')
@include('pages.modal.footer')
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

@slot('body')
@include('pages.modal.edit-task')
@endslot

@slot('footer')
@include('pages.modal.footer')
@endslot
@endcomponent

@endsection

