@extends('admin.default.layout')

@section('content')
    <div class="container">
        <h1>Projects</h1>
        <hr>
        <table class="table table-striped table-bordered table-hover">
            <thead>
            <tr class="bg-info">
                <th>Name</th>
                <th>Description</th>
                <th>Status</th>
                <th>Group assignment</th>
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
                    <td><a href="{{ route('project.group', [$project->id]) }}" class="btn btn-primary">Assign groups</a></td>
                </tr>
            @endforeach

            </tbody>

        </table>
        <div style="text-align: center">
            {!! $projects->render() !!}
        </div>

    </div>
@endsection