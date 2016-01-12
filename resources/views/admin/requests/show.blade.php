@extends('admin.default.layout')

@section('content')
    <div class="container" style="margin-top: 100px">
        <h2 style="text-align: center">Request with ID of: {{ $userRequest->id }} ({{ $userRequest->created_at }})</h2>
        <div class="form-horizontal">
            @if (session('message'))
                <div class="col-sm-offset-2 col-sm-10">
                    <div class="alert alert-success">
                        {{ session('message') }}
                    </div>
                </div>
            @endif
            @if (session('status'))
                    <div class="col-sm-offset-2 col-sm-10">
                        <div class="alert alert-success">
                            {{ session('status') }}
                        </div>
                    </div>
            @endif
            <div class="form-group">
                <label for="first_name" class="col-sm-2 control-label">First Name</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" id="first_name" placeholder={{$userRequest->first_name}}
                            readonly>
                </div>
            </div>
            <div class="form-group">
                <label for="last_name" class="col-sm-2 control-label">Last Name</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" id="last_name" placeholder={{$userRequest->last_name}}
                            readonly>
                </div>
            </div>
            <div class="form-group">
                <label for="email" class="col-sm-2 control-label">Email Address</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" id="email" placeholder={{$userRequest->email}}
                            readonly>
                </div>
            </div>
            <div class="form-group">
                <label for="description" class="col-sm-2 control-label">Description</label>
                <div class="col-sm-10">
                    <textarea class="form-control" id="description" placeholder="{{ $userRequest->description }}"
                              rows="10" readonly></textarea>
                </div>
            </div>

            <div class="form-group">
                <div class="col-sm-offset-2 col-sm-10">
                    <a href="{{ url('admin/dashboard/requests')}}" class="btn btn-primary" style="float: left">Back</a>
                    @if (!session('message'))
                        <form action="{{ route('request.decline', ['id' => $userRequest->id]) }}" method="post">
                            <input type="hidden" name="_token" value="{!! csrf_token() !!}">
                            <button type="submit" class="btn btn-danger" style="float: right">Decline</button>
                        </form>
                        <a href="{{ route('request.approve', ['id' => $userRequest->id]) }}" class="btn btn-success" style="float: right">Approve</a>
                    @endif
                    <form action="{{ url('admin/dashboard/contact') }}" method="get">
                        <input type="hidden" name="email" value="{{ $userRequest->email }}">
                        <input type="hidden" name="requestId" value="{{ $userRequest->id }}">
                        <button type="submit" class="btn btn-primary" style="float: right">Send email</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

@endsection