@extends('admin.default.layout')

@section('content')
    <div class="container">
        <h1>Group <-> Project Assignment</h1>
        <hr>
        <h2>Not assigned groups</h2>
        <table class="table table-striped table-bordered table-hover">
            <thead>
            <tr class="bg-info">
                <th>Name</th>
                <th>Description</th>
                <th>Assignment</th>
            </tr>
            </thead>
            <tbody>
            @foreach ($notAssignedGroups as $notAssignedGroup)
                <tr>
                    <td>{{ $notAssignedGroup->name }}</td>
                    <td>{{ $notAssignedGroup->description }}</td>
                    <td><form method="POST" action="{{ route('project.group.assign') }}">
                            <input type="hidden" name="_token" value="{!! csrf_token() !!}">
                            <input type="hidden" name="projectId" value="{{ $projectId }}">
                            <input type="hidden" name="groupId" value="{{ $notAssignedGroup->id }}">
                            <button type="submit" class="btn btn-success">Assign</button>
                        </form>
                    </td>
                </tr>
            @endforeach

            </tbody>

        </table>
        <div style="text-align: center">
            {!! $notAssignedGroups->render() !!}
        </div>

        <hr>
        <h2>Assigned groups</h2>
        <table class="table table-striped table-bordered table-hover">
            <thead>
            <tr class="bg-info">
                <th>Name</th>
                <th>Description</th>
                <th>Reassignment</th>
            </tr>
            </thead>
            <tbody>
            @foreach ($assignedGroups as $assignedGroup)
                <tr>
                    <td>{{ $assignedGroup->name }}</td>
                    <td>{{ $assignedGroup->description }}</td>
                    <td>
                        <form method="POST" action="{{ route('project.group.revoke') }}">
                            <input type="hidden" name="_token" value="{!! csrf_token() !!}">
                            <input type="hidden" name="projectId" value="{{ $projectId }}">
                            <input type="hidden" name="groupId" value="{{ $assignedGroup->id }}">
                            <button type="submit" class="btn btn-danger">Revoke</button>
                        </form>
                    </td>
                </tr>
            @endforeach

            </tbody>

        </table>
        <div style="text-align: center">
            {!! $assignedGroups->render() !!}
        </div>

    </div>
@endsection