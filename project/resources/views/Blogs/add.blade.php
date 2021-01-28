@extends('home')

@section('content')

    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Add Blog</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Add Blog</a></li>
                    </ol>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content" style="margin-left: 30%;">
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
                    <!-- /.card-header -->
                    <div class="card-body pad">
                     <form action="/create_blog" method="post" enctype="multipart/form-data">

                         @csrf
                         <div class="mb-3">
                             <label class="ml-10">Blog Title: </label>
                             <input type="text" name="title">
                         </div>

                         <div class="mb-3">
                            <textarea class="textarea" placeholder="Introduction..." name="introduction"
                                      style="width: 100%; height: 200px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;"></textarea>
                         </div>

                         <div class="mb-3">
                            <textarea class="textarea" placeholder="Body..." name="body"
                                      style="width: 100%; height: 200px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;"></textarea>
                         </div>

                         <div class="mb-3">
                            <textarea class="textarea" placeholder="Conclusion..." name="conclusion"
                                      style="width: 100%; height: 200px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;"></textarea>
                         </div>

                         <div class="mb=3">
                             <label for="files">Select Image:</label>
                             <input class="form-control form-control-lg" type="file" name="image" accept="image/*">
                         </div>

                         <div class="mb=3">
                             <button class="btn-primary" type="submit"> Submit </button>
                         </div>

                     </form>

                        <p class="text-sm mb-0">
                            Editor <a href="https://github.com/summernote/summernote">Documentation and license
                                information.</a>
                        </p>
                    </div>
                </div>
            </div>
            <!-- /.col-->
        </div>
        <!-- ./row -->
    </section>
@endsection
