@extends('home')

@section('content')

    <div class="container">

        @if (session('success'))
            <div class="alert alert-success" role="alert">
                {{ session('success') }}
            </div>
        @endif

        <div class="row my-5">
            <h2>Doctor {{$doctor->user->name}} details:</h2>
        </div>
        <div class="row justify-content-center ">
            <div class="col-lg-6">
                <card class="card mb-3" style="max-width: 540px;">
                    <div class="row justify-content-center no-gutters">
                        <div class="col-lg-6">
                            <div class="card-body">
                                <h5 class="card-title mb-3 text-primary"><i class="fa fa-user mr-2"></i> Personal Details</h5>
                                <p class="card-text">Name: {{$doctor->user->name}} </p>
                                <p class="card-text">Email: {{$doctor->user->email}}</p>
                                <p class="card-text">Phone Number: {{$doctor->user->mobile_number}}</p>
                            </div>
                        </div>
                    </div>
                </card>
            </div>
            <div class="col-lg-6 h-100">
                <card class="card h-100 mb-3" style="max-width: 540px;">
                    <div class="row no-gutters justify-content-center    h-100">
                        <div class="col-lg-6 h-100">
                            <div class="card-body h-100">
                                <h5 class="card-title mb-3 text-primary"><i class="fa fa-medkit mr-2"></i> Medical Details</h5>
                                <p class="card-text">Blood Group: {{$doctor->blood}}</p>
                                <p class="card-text">weight: {{$doctor->weight}}</p>
                                <p class="card-text">Height: {{$doctor->height}}</p>

                            </div>
                        </div>
                    </div>
                </card>
            </div>
            <div class="col-lg-6 h-100">
                <card class="card mb-3" style="max-width: 540px;">
                    <div class="row no-gutters justify-content-center">
                        <div class="col-lg-6">
                            <div class="card-body">
                                <h5 class="card-title mb-3 text-primary"><i class="fa fa-briefcase mr-2"></i> Professional Details</h5>
                                <p class="card-text">Certification: {{$doctor->certification_url ?? 'Not Added'}}</p>
                                <p class="card-text">Nation ID number: {{$doctor->nationalID ?? 'Not Added'}}</p>

                            </div>
                        </div>
                    </div>
                </card>
            </div>

        </div>

        @if(!$doctor->status)
            <div class="row justify-content-center">
                <a href="{{route('approve.doctor', $doctor->id)}}" class="btn btn-primary w-50" type="submit">Approve</a>
            </div>
        @endif

    </div>

@endsection

