@extends('home')

@section('content')

    <div class="container">
        <div class="row justify-content-center">
            <h3 class="my-5 ml-3">Add a post</h3>
        </div>
        <div class="row justify-content-center ml-3 mb-5">
            <div class="col-lg-10">
                <card class="card border-0 shadow">
                    <div class="card-body">
                        <form action="/create_blog" method="post" enctype="multipart/form-data">

                            @csrf
                            <div class="form-group mb-3">
                                <label class="ml-10">Blog Title: </label>
                                <input type="text" class="form-control" name="title">
                            </div>

                            <div class="form-group mb-3">
                                <label class="ml-10">Introduction: </label>

                                <textarea class="textarea form-control" placeholder="Introduction..." name="introduction"
                                      style="width: 100%; height: 200px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;"></textarea>
                            </div>

                            <div class=" form-group mb-3">
                                <label class="ml-10">Body: </label>

                                <textarea class="textarea form-control" placeholder="Body..." name="body"
                                      style="width: 100%; height: 200px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;"></textarea>
                            </div>

                            <div class=" form-group mb-3">
                                <label class="ml-10">Conclusion: </label>
                                <textarea class="textarea form-control" placeholder="Conclusion..." name="conclusion"
                                      style="width: 100%; height: 200px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;"></textarea>
                            </div>

<<<<<<< HEAD
                         <div class="mb=3">
                             <label for="files">Select Image:</label>
                             <input class="form-control form-control-lg" type="file" name="image" accept="image/*">
                         </div>
=======
                            <div class=" form-group mb=3">
                                <label for="files">Select Image:</label>
                                <input class="form-control form-control-lg" type="file" name="image">
                            </div>
>>>>>>> 9434e96d90b251eb6750f690684d2ec5f7cd40c8

                            <div class="form-group row justify-content-center mb=3">
                                <button class="btn btn-primary w-50" type="submit"> Submit </button>
                            </div>

                        </form>

                    </div>
                </card>
            </div>
        </div>
    </div>

@endsection
