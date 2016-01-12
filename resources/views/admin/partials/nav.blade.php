<nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
    <div class="navbar-header">
        <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-ex1-collapse">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
        </button>
        <a class="navbar-brand" href="{{ url('admin/dashboard') }}">Admin Dashboard</a>
    </div>
    <ul class="nav navbar-right top-nav">
        <li class="dropdown">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa fa-envelope"></i>
                <b class="caret"></b></a>
            <ul class="dropdown-menu message-dropdown">

            </ul>
        </li>
        <li class="dropdown">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-user"></i>
                {{ Auth::user()->name }}<b class="caret"></b></a>
            <ul class="dropdown-menu">
                <li>
                    <a href="{{ url('auth/logout') }}"><i class="fa fa-fw fa-power-off"></i>Log Out</a>
                </li>
            </ul>
        </li>
    </ul>
    <div class="collapse navbar-collapse navbar-ex1-collapse">
        <ul class="nav navbar-nav side-nav">
            <li class="active">
                <a href="{{ url('admin/dashboard') }}"><i class="fa fa-fw fa-dashboard"></i> Home</a>
            </li>
            <li>
                <a href="{{ url('admin/dashboard/requests') }}"><i class="fa fa-fw fa-table"></i> Requests</a>
            </li>
            <li>
                <a href="{{ url('admin/dashboard/user') }}"><i class="fa fa-fw fa-dashboard"></i> Manage users</a>
            </li>
            <li>
                <a href="{{ url('admin/dashboard/group') }}"><i class="fa fa-fw fa-dashboard"></i> Manage groups</a>
            </li>
            <li>
                <a href="{{ url('admin/dashboard/project') }}"><i class="fa fa-fw fa-dashboard"></i> Manage projects</a>
            </li>
            <li>
                <a href="{{ url('admin/dashboard/interest') }}"><i class="fa fa-fw fa-dashboard"></i> Interests</a>
            </li>
            <li>
                <a href="{{ url('admin/dashboard/feedback') }}"><i class="fa fa-fw fa-dashboard"></i> Feedbacks</a>
            </li>
        </ul>
    </div>
</nav>