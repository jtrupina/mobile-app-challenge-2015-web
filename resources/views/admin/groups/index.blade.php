@extends('admin.default.layout')

@section('content')
    <div class="container">
        <h1>Groups</h1>
        <a href="{{ url('admin/dashboard/group/create') }}" class="btn btn-success">Create Group</a>
        <hr>
        <table class="table table-striped table-bordered table-hover">
            <thead>
            <tr class="bg-info">
                <th>Name</th>
                <th>Description</th>
                <th>User assignment</th>
            </tr>
            </thead>
            <tbody>
            @foreach ($groups as $group)
                <tr>
                    <td>{{ $group->name }}</td>
                    <td>{{ $group->description }}</td>
                    <td><a href="{{ route('group.user', [$group->id]) }}" class="btn btn-primary">Assign users</a></td>
                </tr>
            @endforeach

            </tbody>

        </table>
        <div style="text-align: center">
            {!! $groups->render() !!}
        </div>

    </div>
@endsection