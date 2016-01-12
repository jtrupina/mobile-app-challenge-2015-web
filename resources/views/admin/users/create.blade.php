@extends('admin.default.layout')

@section('content')
    <div class="container">
        <h1>Create User</h1>
        <form method="POST" action="{{ url('admin/dashboard/user') }}">
            @if (count($errors) > 0)
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
            <input type="hidden" name="_token" value="{!! csrf_token() !!}">
            <div class="form-group">
                <label for="name">Name:</label>
                <input type="text" name="name" class="form-control">
            </div>
            <div class="form-group">
                <label for="email">Email:</label>
                <input type="text" name="email" class="form-control">
            </div>
            <div class="form-group">
                <label for="password">Password:</label>
                <input type="password" name="password" class="form-control">
            </div>
            <div class="form-group">
                <label for="city">City:</label>
                <input type="text" name="city" class="form-control">
            </div>
            <div class="form-group">
                <label for="country">Country:</label>
                <input type="text" name="country" class="form-control">
            </div>
            <div class="form-group">
                <label for="gender">Gender:</label>
                <select name="gender" class="form-control">
                    <option value="">Choose gender</option>
                    <option value="m">Male</option>
                    <option value="f">Female</option>
                </select>
            </div>
            <div class="form-group">
                <label for="birth_date">Country:</label>
                <input type="date" name="birth_date" class="form-control">
            </div>
            <div class="form-group">
                <label for="role">Role:</label>
                <select name="role" class="form-control">
                    <option value="">Choose role</option>
                    <option value="1">User</option>
                    <option value="2">Administrator</option>
                </select>
            </div>
            <div class="form-group">
                <button type="submit" class="btn btn-primary form-control">Save</button>
            </div>
        </form>
    </div>
@endsection