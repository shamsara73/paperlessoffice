<!-- Navigation -->
<nav class="navbar navbar-default navbar-static-top" role="navigation" style="margin-bottom: 0">
    <div class="navbar-header">
        <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
        </button>
        <a class="navbar-brand" href="{{ url('/main/home') }}">Paperless Office</a>
    </div>
    <!-- /.navbar-header -->

    <ul class="nav navbar-top-links navbar-right">

        <!-- /.dropdown -->


        <!-- /.dropdown -->
        <li class="dropdown">
            <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                <i class="fa fa-user fa-fw"></i> <i class="fa fa-caret-down"></i>
            </a>
            <ul class="dropdown-menu dropdown-user">
                <li><a href="{{ url('/main/profil') }}"><i class="fa fa-user fa-fw"></i> User Profile</a>
                </li>
                </li>
                <li class="divider"></li>
                <li><a href="{{ url('/main/logout') }}"><i class="fa fa-sign-out fa-fw"></i> Logout</a>
                </li>
            </ul>
            <!-- /.dropdown-user -->
        </li>
        <!-- /.dropdown -->
    </ul>
    <!-- /.navbar-top-links -->

    <div class="navbar-default sidebar" role="navigation">
        <div class="sidebar-nav navbar-collapse">
            <ul class="nav" id="side-menu">
                <!-- <li class="sidebar-search">
                    <div class="input-group custom-search-form">
                        <input type="text" class="form-control" placeholder="Search...">
                        <span class="input-group-btn">
                            <button class="btn btn-default" type="button">
                                <i class="fa fa-search"></i>
                            </button>
                        </span>
                    </div>
                </li> -->
                <li>
                    <a href="{{ url('/main/home') }}"><i class="fa fa-dashboard fa-fw fa-2x"></i> <span>Dashboard</span> </a>
                </li>
                <li>
                    <a href="{{ url('/main/undangan') }}"><i class="fa fa-envelope-o fa-fw fa-2x"></i> <span>Undangan </span> </a>
                </li>
                <li>
                    <a href="{{ url('/main/anggota') }}"><i class="fa fa-users fa-fw fa-2x"></i> <span> Anggota </span> </a>
                </li>
                <li>
                    <a href="{{ url('/main/jabatan') }}"><i class="fa fa-suitcase fa-fw fa-2x"></i> <span>Jabatan</span> </a>
                </li>


            </ul>
        </div>
        <!-- /.sidebar-collapse -->
    </div>
    <!-- /.navbar-static-side -->
</nav>
