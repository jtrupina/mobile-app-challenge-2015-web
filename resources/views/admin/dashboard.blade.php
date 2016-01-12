@extends('admin.default.layout')

@section('content')
    <script>
        var projects = JSON.parse('{!! $projects !!}');
        var users = JSON.parse('{!! $users !!}');
    </script>
    <div id="page-wrapper">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">
                        Dashboard <small>Statistics Overview</small>
                    </h1>
                    <ol class="breadcrumb">
                        <li class="active">
                            <i class="fa fa-dashboard"></i> Dashboard
                        </li>
                    </ol>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-4 col-md-6">
                    <div class="panel panel-primary">
                        <div class="panel-heading">
                            <div class="row">
                                <div class="col-xs-3">
                                    <i class="fa fa-comments fa-5x"></i>
                                </div>
                                <div class="col-xs-9 text-right">
                                    <div class="huge">{{ $countRequests }}</div>
                                    <div>Total number of requests</div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6">
                    <div class="panel panel-green">
                        <div class="panel-heading">
                            <div class="row">
                                <div class="col-xs-3">
                                    <i class="fa fa-tasks fa-5x"></i>
                                </div>
                                <div class="col-xs-9 text-right">
                                    <div class="huge">{{ $countProjects }}</div>
                                    <div>Number of projects</div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6">
                    <div class="panel panel-red">
                        <div class="panel-heading">
                            <div class="row">
                                <div class="col-xs-3">
                                    <i class="fa fa-support fa-5x"></i>
                                </div>
                                <div class="col-xs-9 text-right">
                                    <div class="huge">{{ $countUsers }}</div>
                                    <div>Total number of users</div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="span6">
                <div class="graph-container">
                    <div class="caption">TOP 10 Projects with most feedbacks</div>
                    <div id="projects" class="graph"></div>
                </div>
            </div>
            <div class="span6">
                <div class="graph-container">
                    <div class="caption">TOP 10 Users with most feedbacks</div>
                    <div id="users" class="graph"></div>
                </div>
            </div>
        </div>
    </div>

@endsection

