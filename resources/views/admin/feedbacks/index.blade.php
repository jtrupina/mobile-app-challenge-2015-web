@extends('admin.default.layout')

@section('content')
    <div class="container">
        <h1>Projects</h1>
        <hr>
        <a href="{{ url('admin/dashboard/feedback') }}"><button class="btn btn-primary">All projects</button></a>
        <a href="{{ url('admin/dashboard/feedback/private') }}"><button class="btn btn-primary">Private projects</button></a>
        <a href="{{ url('admin/dashboard/feedback/public') }}"><button class="btn btn-primary">Public projects</button></a>
        <table class="table table-striped table-bordered table-hover" style="margin-top: 20px">
            <thead>
            <tr class="bg-info">
                <th>Name</th>
                <th>Description</th>
                <th>Status</th>
                <th>Feedbacks</th>
            </tr>
            </thead>
            <tbody>
            @foreach ($projects as $project)
                <tr>
                    <td>{{ $project->name }}</td>
                    <td>{{ $project->description }}</td>
                    @if($project->status == 1)
                        <td>Private</td>
                    @else
                        <td>Public</td>
                    @endif
                    <td><a href="{{ route('feedback.project', [$project->id]) }}" class="btn btn-primary">View feedbacks</a></td>
                </tr>
            @endforeach

            </tbody>

        </table>
        <div style="text-align: center">
            {!! $projects->render() !!}
        </div>

    </div>
@endsection