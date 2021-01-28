<div >
<aside class="sidebar-dark-cyan" style="background-color:#01c0ac;  position: fixed ; height: 100%; z-index: 0;"  >
    <!-- Brand Logo -->
{{--    <a href="/" class="brand-link">--}}
{{--        <span class="brand-text font-weight-light">MEDBAY</span>--}}
{{--    </a>--}}



    <!-- Sidebar Menu -->
    <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false" style = "margin-left:50px">
            <!-- Add icons to the links using the .nav-icon class
                 with font-awesome or any other icon font library -->
            <li class="nav-item has-treeview menu-open">
                <a href="#" class="nav-link active">
                    <i class="nav-icon fas fa-tachometer-alt"></i>
                    <p>
                        Dashboard
                    </p>
                </a>

            </li>


            <li class="nav-item has-treeview">
                <a class="nav-link" style="color: white">
                    <i class="nav-icon fas fa-chart-pie"></i>
                    <p>
                        Users management
                        <i class="right fas fa-angle-left ml-auto"></i>
                    </p>
                </a>
                <ul class="nav nav-treeview">
                    <li class="nav-item" style="color: white">
                        <a href="/users" class="nav-link">
                            <i class="far fa-circle nav-icon"></i>
                            <p>Add Users</p>
                        </a>
                    </li>
                    <li class="nav-item" style="color: white">
                        <a href="/approve_doctor_application" class="nav-link">
                            <i class="far fa-circle nav-icon"></i>
                            <p>Approve Doctor applications</p>
                        </a>
                    </li>
                    <li class="nav-item" style="color:white">
                        <a href="/suspend_doctor" class="nav-link">
                            <i class="far fa-circle nav-icon"></i>
                            <p>Suspend Doctor Application</p>
                        </a>
                    </li>
                </ul>
            </li>
            <li class="nav-item has-treeview">
                <a href="#" class="nav-link">
                    <i class="nav-icon fas fa-tree"></i>
                    <p>
                        Payments
                        <i class="fas fa-angle-left right"></i>
                    </p>
                </a>
                <ul class="nav nav-treeview">
                    <li class="nav-item">
                        <a href="/mpesa_payments" class="nav-link">
                            <i class="far fa-circle nav-icon"></i>
                            <p>M-pesa Payments</p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="/pending_payments" class="nav-link">
                            <i class="far fa-circle nav-icon"></i>
                            <p>Pending payments</p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="/settled_payments" class="nav-link">
                            <i class="far fa-circle nav-icon"></i>
                            <p>Settled Payments</p>
                        </a>
                    </li>
                </ul>
            </li>
            <li class="nav-item has-treeview">
                <a href="#" class="nav-link">
                    <i class="nav-icon fas fa-edit"></i>
                    <p>
                        Blogs
                        <i class="fas fa-angle-left right"></i>
                    </p>
                </a>
                <ul class="nav nav-treeview">
                    <li class="nav-item">
                        <a href="/add_blog" class="nav-link">
                            <i class="far fa-circle nav-icon"></i>
                            <p>Add Blog</p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="blogs" class="nav-link">
                            <i class="far fa-circle nav-icon"></i>
                            <p>View Blogs</p>
                        </a>
                    </li>


                </ul>
            </li>
            <li class="nav-item has-treeview">
                <a href="#" class="nav-link">
                    <i class="nav-icon fas fa-table"></i>
                    <p>
                        Charts and Reports
                        <i class="fas fa-angle-left right"></i>
                    </p>
                </a>
                <ul class="nav nav-treeview">
                    <li class="nav-item">
                        <a href="/user_reports" class="nav-link">
                            <i class="far fa-circle nav-icon"></i>
                            <p>Users Reports</p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="/location_report" class="nav-link">
                            <i class="far fa-circle nav-icon"></i>
                            <p>Location reports</p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="/payment_report" class="nav-link">
                            <i class="far fa-circle nav-icon"></i>
                            <p>Payments Reports</p>
                        </a>
                    </li>
                </ul>
            </li>
            <li class="nav-item has-treeview">
                <a href="/appointment_request" class="nav-link">
                    <i class="nav-icon fas fa-calendar-plus"></i>
                    <p> Apppintment request</p>
                </a>
            </li>
            <li class="nav-item has-treeview">
                <a href="/appointments" class="nav-link">
                    <i class="nav-icon fas fa-users"></i>
                    <p> Appointments</p>
                </a>
            </li>

            <a href= "{{Route('logout')}}" class="nav-link">
                <i class="far fa-circle nav-icon"></i>
                <p>logout</p>
            </a>
        </ul>
    </nav>
</aside>
</div>

{{--    <!DOCTYPE html>--}}
{{--<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">--}}
{{--<head>--}}
{{--    <meta charset="utf-8">--}}
{{--    <meta name="viewport" content="width=device-width, initial-scale=1">--}}

{{--    <title>Laravel</title>--}}

{{--    <!-- Fonts -->--}}
{{--    <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">--}}

{{--    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">--}}
{{--    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>--}}
{{--    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>--}}
{{--    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>--}}
{{--    <script>--}}
{{--        jQuery(document).ready(function($){--}}
{{--            $("#menu-toggle").click(function(e) {--}}
{{--                e.preventDefault();--}}
{{--                $("#wrapper").toggleClass("toggled");--}}
{{--            });--}}
{{--        })--}}
{{--    </script>--}}
{{--    <style>--}}
{{--        body {--}}
{{--            overflow-x: hidden;--}}
{{--        }--}}

{{--        #sidebar-wrapper {--}}
{{--            min-height: 100vh;--}}
{{--            margin-left: -15rem;--}}
{{--            -webkit-transition: margin .25s ease-out;--}}
{{--            -moz-transition: margin .25s ease-out;--}}
{{--            -o-transition: margin .25s ease-out;--}}
{{--            transition: margin .25s ease-out;--}}
{{--        }--}}

{{--        #sidebar-wrapper .sidebar-heading {--}}
{{--            padding: 0.875rem 1.25rem;--}}
{{--            font-size: 1.2rem;--}}
{{--        }--}}

{{--        #sidebar-wrapper .list-group {--}}
{{--            width: 15rem;--}}
{{--        }--}}

{{--        #page-content-wrapper {--}}
{{--            min-width: 100vw;--}}
{{--        }--}}

{{--        #wrapper.toggled #sidebar-wrapper {--}}
{{--            margin-left: 0;--}}
{{--        }--}}

{{--        @media (min-width: 768px) {--}}
{{--            #sidebar-wrapper {--}}
{{--                margin-left: 0;--}}
{{--            }--}}

{{--            #page-content-wrapper {--}}
{{--                min-width: 0;--}}
{{--                width: 100%;--}}
{{--            }--}}

{{--            #wrapper.toggled #sidebar-wrapper {--}}
{{--                margin-left: -15rem;--}}
{{--            }--}}
{{--        }--}}
{{--    </style>--}}
{{--</head>--}}
{{--<body>--}}
{{--<div class="d-flex" id="wrapper">--}}

{{--    <!-- Sidebar -->--}}
{{--    <div class="bg-light border-right" id="sidebar-wrapper">--}}
{{--        <div class="sidebar-heading">MEDBAY </div>--}}
{{--        <div class="list-group list-group-flush">--}}
{{--            <a href="/users" class="list-group-item list-group-item-action bg-light">Add Users</a>--}}
{{--            <a href="/appointment_request" class="list-group-item list-group-item-action bg-light">Doctor application</a>--}}
{{--            <a href="#" class="list-group-item list-group-item-action bg-light">Approve Doctor</a>--}}
{{--            <a href="#" class="list-group-item list-group-item-action bg-light">Dashboard</a>--}}
{{--            <a href="#" class="list-group-item list-group-item-action bg-light">Shortcuts</a>--}}
{{--            <a href="#" class="list-group-item list-group-item-action bg-light">Overview</a>--}}
{{--            <a href="#" class="list-group-item list-group-item-action bg-light">Events</a>--}}
{{--            <a href="#" class="list-group-item list-group-item-action bg-light">Profile</a>--}}
{{--            <a href="#" class="list-group-item list-group-item-action bg-light">Status</a>--}}
{{--        </div>--}}
{{--    </div>--}}
{{--    <!-- /#sidebar-wrapper -->--}}

{{--    <!-- Page Content -->--}}
{{--    <div id="page-content-wrapper">--}}

{{--        <nav class="navbar navbar-expand-lg navbar-light bg-light border-bottom">--}}
{{--            <button class="btn btn-primary" id="menu-toggle">Toggle Menu</button>--}}

{{--            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">--}}
{{--                <span class="navbar-toggler-icon"></span>--}}
{{--            </button>--}}

{{--            <div class="collapse navbar-collapse" id="navbarSupportedContent">--}}
{{--                <ul class="navbar-nav ml-auto mt-2 mt-lg-0">--}}
{{--                    <li class="nav-item active">--}}
{{--                        <a class="nav-link" href="#">Home <span class="sr-only">(current)</span></a>--}}
{{--                    </li>--}}
{{--                    <li class="nav-item">--}}
{{--                        <a class="nav-link" href="#">Link</a>--}}
{{--                    </li>--}}
{{--                    <li class="nav-item dropdown">--}}
{{--                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">--}}
{{--                            Dropdown--}}
{{--                        </a>--}}
{{--                        <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">--}}
{{--                            <a class="dropdown-item" href="#">Action</a>--}}
{{--                            <a class="dropdown-item" href="#">Another action</a>--}}
{{--                            <div class="dropdown-divider"></div>--}}
{{--                            <a class="dropdown-item" href="#">Something else here</a>--}}
{{--                        </div>--}}
{{--                    </li>--}}
{{--                </ul>--}}
{{--            </div>--}}
{{--        </nav>--}}

{{--        <div class="container-fluid">--}}

{{--        </div>--}}
{{--    </div>--}}
{{--    <!-- /#page-content-wrapper -->--}}

{{--</div>--}}
{{--<!-- /#wrapper -->--}}
{{--</body>--}}
{{--</html>--}}
