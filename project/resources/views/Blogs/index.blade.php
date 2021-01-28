@extends('home')

@section('content')


    <section class="content" style="margin-left: 10%; position: relative">

        <div class="container">
            <div class="row my-5">
                <h1 class="">Blog Posts</h1>

            </div>
            <div class="row justify-content-center">
                <div class="col-lg-12">
                    @forelse($blogs as $details)
                        <div class="card-body pad">
                            <h1>{{$details->introduction}}</h1>
                            @if($details->image != null)
                                <img src="{{asset('storage/images/'.$details->image)}}" alt="" width="600" height="300">
                            @endif
                            <p>{{$details->body}}</p>
                            <p>{{$details->conclusion}}</p>
                            <p>by {{$details->metadata}}</p>
                        </div>
                        <hr>
                    @empty
                    @endforelse
                </div>
                <!-- /.col-->
            </div>
        </div>

        <!-- ./row -->
    </section>

@endsection
