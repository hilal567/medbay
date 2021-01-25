@extends('home')

@section('content')
    <div class="main-header navbar navbar-expand navbar-white navbar-light"> </div>

    <section class="content" style="margin-left: 20%;">
        <h1>View blogs</h1>
        <div class="row">
            <div class="col-md-12">
                <div class="card card-outline card-info">
                    <div class="card-header">

                        <!-- tools box -->
                        <div class="card-tools">
                            <button type="button" class="btn btn-tool btn-sm" data-card-widget="collapse" data-toggle="tooltip"
                                    title="Collapse">
                                <i class="fas fa-minus"></i></button>
                            <button type="button" class="btn btn-tool btn-sm" data-card-widget="remove" data-toggle="tooltip"
                                    title="Remove">
                                <i class="fas fa-times"></i></button>
                        </div>
                        <!-- /. tools -->
                    </div>
                    @forelse($blogs as $details)
                        <div class="card-body pad">
                            <h1>{{$details->introduction}}</h1>
                            @if($details->image != null)
                                <img src="{{asset('/storage/images/'.$details->image)}}" alt="" width="600" height="300">
                            @endif
                            <p>{{$details->body}}</p>
                            <p>{{$details->conclusion}}</p>
                            <p>by {{$details->metadata}}</p>
                        </div>
                        <hr>
                    @empty
                    @endforelse
                </div>
            </div>
            <!-- /.col-->
        </div>
        <!-- ./row -->
    </section>

@endsection
