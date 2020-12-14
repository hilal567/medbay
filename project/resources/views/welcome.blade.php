

@section('content')
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <!-- CSRF Token -->
        <meta name="csrf-token" content="GPJY2XZ837xqohaFFrXi0P49p57Q7UEEUJItGjoa">

        <title>MEDBAY</title>

        <!-- Scripts -->
        <script src="http://192.168.1.125:8000/js/app.js" defer=""></script>

        <!-- Fonts -->
        <link rel="dns-prefetch" href="//fonts.gstatic.com">
        <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

        <!-- Styles -->
        <link href="http://192.168.1.125:8000/css/app.css" rel="stylesheet">
    </head>
    <body data-new-gr-c-s-check-loaded="14.984.0" data-gr-ext-installed="">
    <div id="app"><nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm"><div class="container"><a href="http://192.168.1.125:8000" class="navbar-brand">
                    Laravel
                </a> <button type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation" class="navbar-toggler"><span class="navbar-toggler-icon"></span></button> <div id="navbarSupportedContent" class="collapse navbar-collapse"><ul class="navbar-nav mr-auto"></ul> <ul class="navbar-nav ml-auto"><li class="nav-item"><a href="http://192.168.1.125:8000/login" class="nav-link">Login</a></li> <li class="nav-item"><a href="http://192.168.1.125:8000/register" class="nav-link">Register</a></li></ul></div></div></nav> <main class="py-4"><div class="container"><div class="row justify-content-center"><div class="col-md-8"><div class="card"><div class="card-header">Register</div> <div class="card-body"><form method="POST" action="http://192.168.1.125:8000/register"><input type="hidden" name="_token" value="GPJY2XZ837xqohaFFrXi0P49p57Q7UEEUJItGjoa"> <div class="form-group row"><label for="name" class="col-md-4 col-form-label text-md-right">Name</label> <div class="col-md-6"><input id="name" type="text" name="name" value="" required="required" autocomplete="name" autofocus="autofocus" class="form-control "></div></div> <div class="form-group row"><label for="email" class="col-md-4 col-form-label text-md-right">E-Mail Address</label> <div class="col-md-6"><input id="email" type="email" name="email" value="" required="required" autocomplete="email" class="form-control "></div></div> <div class="form-group row"><label for="password" class="col-md-4 col-form-label text-md-right">Password</label> <div class="col-md-6"><input id="password" type="password" name="password" required="required" autocomplete="new-password" class="form-control "></div></div> <div class="form-group row"><label for="password-confirm" class="col-md-4 col-form-label text-md-right">Confirm Password</label> <div class="col-md-6"><input id="password-confirm" type="password" name="password_confirmation" required="required" autocomplete="new-password" class="form-control"></div></div> <div class="form-group row mb-0"><div class="col-md-6 offset-md-4"><button type="submit" class="btn btn-primary">
                                                Register
                                            </button></div></div></form></div></div></div></div></div></main></div>


    </body>
@endsection
