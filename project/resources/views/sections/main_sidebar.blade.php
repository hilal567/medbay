{{-- The main sidebar --}}
<aside class="main-sidebar sidebar-dark-primary elevation-4" style="background-color:#01c0ac ">
    <!-- Brand Logo -->
    <a href="/" class="brand-link">
        <span class="brand-text font-weight-light">MEDBAY</span>
    </a>



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
                        <a href="/appointment_request" class="nav-link">
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
                        <a href="/blogs" class="nav-link">
                            <i class="far fa-circle nav-icon"></i>
                            <p>Add Blog</p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="pages/forms/advanced.html" class="nav-link">
                            <i class="far fa-circle nav-icon"></i>
                            <p>View Blogs</p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="pages/forms/editors.html" class="nav-link">
                            <i class="far fa-circle nav-icon"></i>
                            <p>Delete Blogs</p>
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
                        <a href="pages/tables/simple.html" class="nav-link">
                            <i class="far fa-circle nav-icon"></i>
                            <p>Users Reports</p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="pages/tables/data.html" class="nav-link">
                            <i class="far fa-circle nav-icon"></i>
                            <p>Description reports</p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="pages/tables/jsgrid.html" class="nav-link">
                            <i class="far fa-circle nav-icon"></i>
                            <p>Payments Reports</p>
                        </a>
                    </li>
                </ul>
            </li>
            <a href= "{{Route('logout')}}" class="nav-link">
                <i class="far fa-circle nav-icon"></i>
                <p>logout</p>
            </a>
        </ul>
    </nav>
</aside>
