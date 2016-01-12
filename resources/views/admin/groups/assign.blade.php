@extends('admin.default.layout')

@section('content')
    <div class="container">
        <h1>User <-> Group Assignment</h1>
        <hr>
        <h2>Not assigned users</h2>
        <table class="table table-striped table-bordered table-hover">
            <thead>
            <tr class="bg-info">
                <th>Name</th>
                <th>City</th>
                <th>Country</th>
                <th>Gender</th>
                <th>Birth Date</th>
                <th>Assignment</th>
            </tr>
            </thead>
            <tbody>
            @foreach ($notAssignedUsers as $notAssignedUser)
                <tr>
                    <td>{{ $notAssignedUser->name }}</td>
                    <td>{{ $notAssignedUser->city }}</td>
                    <td>{{ $notAssignedUser->country }}</td>
                    <td>{{ $notAssignedUser->gender }}</td>
                    <td>{{ $notAssignedUser->birth_date }}</td>
                    <td><form method="POST" action="{{ route('group.user.assign') }}">
                            <input type="hidden" name="_token" value="{!! csrf_token() !!}">
                            <input type="hidden" name="groupId" value="{{ $groupId }}">
                            <input type="hidden" name="userId" value="{{ $notAssignedUser->id }}">
                            <button type="submit" class="btn btn-success">Assign</button>
                        </form>
                    </td>
                </tr>
            @endforeach

            </tbody>

        </table>
        <div style="text-align: center">
            {!! $notAssignedUsers->render() !!}
        </div>

        <hr>
        <h2>Assigned users</h2>
        <table class="table table-striped table-bordered table-hover">
            <thead>
            <tr class="bg-info">
                <th>Name</th>
                <th>City</th>
                <th>Country</th>
                <th>Gender</th>
                <th>Birth Date</th>
                <th>Reassignment</th>
            </tr>
            </thead>
            <tbody>
            @foreach ($assignedUsers as $assignedUser)
                <tr>
                    <td>{{ $assignedUser->name }}</td>
                    <td>{{ $assignedUser->city }}</td>
                    <td>{{ $assignedUser->country }}</td>
                    <td>{{ $assignedUser->gender }}</td>
                    <td>{{ $assignedUser->birth_date }}</td>
                    <td>
                        <form method="POST" action="{{ route('group.user.revoke') }}">
                            <input type="hidden" name="_token" value="{!! csrf_token() !!}">
                            <input type="hidden" name="groupId" value="{{ $groupId }}">
                            <input type="hidden" name="userId" value="{{ $assignedUser->id }}">
                            <button type="submit" class="btn btn-danger">Revoke</button>
                        </form>
                    </td>
                </tr>
            @endforeach

            </tbody>

        </table>
        <div style="text-align: center">
            {!! $assignedUsers->render() !!}
        </div>

    </div>
@endsection