@extends('admin.default.layout')

@section('content')
    <div class="container">
        <h1>User Show</h1>

        <form class="form-horizontal">
            <div class="form-group">
                <label for="id" class="col-sm-2 control-label">ID</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" id="id" placeholder="{{$user->id}}" readonly>
                </div>
            </div>
            <div class="form-group">
                <label for="name" class="col-sm-2 control-label">Name</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" id="name" placeholder="{{$user->name}}" readonly>
                </div>
            </div>
            <div class="form-group">
                <label for="email" class="col-sm-2 control-label">Email</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" id="email" placeholder="{{$user->email}}" readonly>
                </div>
            </div>
            <div class="form-group">
                <label for="city" class="col-sm-2 control-label">City</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" id="city" placeholder="{{$user->city}}" readonly>
                </div>
            </div>
            <div class="form-group">
                <label for="country" class="col-sm-2 control-label">Country</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" id="country" placeholder="{{$user->country}}" readonly>
                </div>
            </div>
            <div class="form-group">
                <label for="gender" class="col-sm-2 control-label">Gender</label>
                <div class="col-sm-10">
                    @if($user->gender == 'm')
                        <input type="text" class="form-control" id="gender" placeholder="Male" readonly>
                    @else
                        <input type="text" class="form-control" id="gender" placeholder="Female" readonly>
                    @endif
                </div>
            </div>
            <div class="form-group">
                <label for="birth_date" class="col-sm-2 control-label">Country</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" id="birth_date" placeholder="{{$user->birth_date}}" readonly>
                </div>
            </div>

            <div class="form-group">
                <div class="col-sm-offset-2 col-sm-10">
                    <a href="{{ url('admin/dashboard/user')}}" class="btn btn-primary">Back</a>
                </div>
            </div>
        </form>

    </div>
@endsection