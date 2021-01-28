@extends('home')

@section('content')

    <div class="row" style = "margin-left: 15%">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>User Management</h2>

    </div>

    @if ($message = Session::get('success'))
        <div class="alert alert-success">
            <p>{{ $message }}</p>
        </div>
    @endif

    <table class="table table-bordered table-responsive-lg" style="margin-left:0%; margin-right: 20%;">
        <thead>
            <tr STYLE="width: 50%">

                <th>Name</th>
                <th>Mobile</th>
                <th style="width:100px;">Email</th>
                <th>Date Created</th>
                <th>Status</th>
                <th width="180px">Action</th>
            </tr>
        </thead>
        <tbody>
        @forelse($users as $details)
            <tr>
                <td>{{$details->name}}</td>
                <td>{{$details->mobile_number}}</td>
                <td>{{$details->email}}</td>
                <td>{{$details->created_at->diffForHumans()}}</td>
                <td>
                    @if($details->deleted_at == null)
                        <span class="badge badge-success">Active</span>
                    @else
                        <span class="badge badge-danger">Suspended</span>
                    @endif
                </td>
                <td>
                    <button type="button" class="btn btn-default" data-toggle="modal" data-target="#edit-user-{{$details->id}}">
                        <i class="fas fa-edit fa-lg text-primary"></i>
                    </button>
                    @if($details->deleted_at == null)
                        <button type="button" class="btn btn-default" data-toggle="modal" data-target="#delete-user-{{$details->id}}">
                            <i class="fas fa-trash fa-lg text-danger"></i>
                        </button>
                    @else
                        <button type="button" class="btn btn-default" data-toggle="modal" data-target="#restore-user-{{$details->id}}">
                            <i class="fas fa-undo fa-lg text-success"></i>
                        </button>
                    @endif
                </td>
            </tr>
            @include('users.modals.edit_user')
            @include('users.modals.delete_user')
            @include('users.modals.restore_user')
        @empty
            <tr>
                <td>NO users available</td>
            </tr>
        @endforelse
        </tbody>
    </table>


    @endsection
