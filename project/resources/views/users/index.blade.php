@extends('home')

@section('content')

    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>Laravel 8 CRUD </h2>
            </div>
            <div class="pull-right">
                <a class="btn btn-success" href="{{ route('projects.create') }}" title="Create a Blog"> <i class="fas fa-plus-circle"></i>
                </a>
            </div>
        </div>
    </div>

    @if ($message = Session::get('success'))
        <div class="alert alert-success">
            <p>{{ $message }}</p>
        </div>
    @endif

    <table class="table table-bordered table-responsive-lg" style="margin-left: 10%; margin-right: 10%">
        <thead>
            <tr>

                <th>Name</th>
                <th>Mobile</th>
                <th>Email</th>
                <th>Date Created</th>
                <th>Status</th>
                <th width="280px">Action</th>
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
