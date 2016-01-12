@extends('admin.default.layout')

@section('content')
    <div class="container">
        <h1>Update User</h1>
        <form method="POST" action="{{ route('admin.dashboard.user.update', [$user->id]) }}">
            <input type="hidden" name="_method" value="PUT">
            <input type="hidden" name="_token" value="{!! csrf_token() !!}">
            <div class="form-group">
                <label for="name">Name:</label>
                <input type="text" name="name" class="form-control" value="{{ $user->name }}">
            </div>
            <div class="form-group">
                <label for="email">Email:</label>
                <input type="text" name="email" class="form-control" value="{{ $user->email }}">
            </div>
            <div class="form-group">
                <label for="city">City:</label>
                <input type="text" name="city" class="form-control" value="{{ $user->city }}">
            </div>
            <div class="form-group">
                <label for="country">Country:</label>
                <input type="text" name="country" class="form-control" value="{{ $user->country }}">
            </div>
            <div class="form-group">
                <label for="gender">Gender:</label>
                <select name="gender" class="form-control">
                    <option value="">Choose gender</option>
                    @if($user->gender == 'm')
                        <option value="m" selected>Male</option>
                        <option value="f">Female</option>
                    @else
                        <option value="m">Male</option>
                        <option value="f" selected>Female</option>
                    @endif
                </select>
            </div>
            <div class="form-group">
                <label for="birth_date">Country:</label>
                <input type="date" name="birth_date" class="form-control" value="{{ $user->birth_date }}">
            </div>
            <div class="form-group">
                <label for="role">Role:</label>
                <select name="role" class="form-control">
                    <option value="">Choose role</option>
                    @if($user->role == 1)
                        <option value="1" selected>User</option>
                        <option value="2">Administrator</option>
                    @else
                        <option value="1">User</option>
                        <option value="2" selected>Administrator</option>
                    @endif
                </select>
            </div>
            <div class="form-group">
                <button type="submit" class="btn btn-primary form-control">Save</button>
            </div>
        </form>
    </div>
@endsection