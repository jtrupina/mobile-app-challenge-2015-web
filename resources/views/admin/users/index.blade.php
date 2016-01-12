@extends('admin.default.layout')

@section('content')
    <div class="container">
        <h1>Users</h1>
        <a href="{{url('admin/dashboard/user/create')}}" class="btn btn-success">Create User</a>
        <hr>
        <table class="table table-striped table-bordered table-hover">
            <thead>
            <tr class="bg-info">
                <th>ID</th>
                <th>Name</th>
                <th>Email</th>
                <th colspan="3">Actions</th>
            </tr>
            </thead>
            <tbody>
            @foreach ($users as $user)
                <tr>
                    <td>{{ $user->id }}</td>
                    <td>{{ $user->name }}</td>
                    <td>{{ $user->email }}</td>
                    <td><a href="{{url('admin/dashboard/user',$user->id)}}" class="btn btn-primary">Read</a></td>
                    <td><a href="{{route('admin.dashboard.user.edit',$user->id)}}" class="btn btn-warning">Update</a></td>
                    <td>
                        <form action="{{ route('admin.dashboard.user.destroy', [$user->id]) }}" method="POST">
                            <input type="hidden" name="_method" value="DELETE">
                            <input type="hidden" name="_token" value="{{ csrf_token() }}">
                            <button type="submit" class="btn btn-danger">Delete</button>
                        </form>
                    </td>
                </tr>
            @endforeach

            </tbody>

        </table>
        <div style="text-align: center">
            {!! $users->render() !!}
        </div>

    </div>
@endsection