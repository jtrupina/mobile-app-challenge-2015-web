@extends('admin.default.layout')

@section('content')
    <div class="container" style="margin-top:30px">
        <div class="col-md-4 col-md-offset-4">
            <div class="panel panel-default" style="margin-top: 15px">
                <div class="panel-heading"><h3 class="panel-title"><strong>Send an email</strong></h3></div>
                <div class="panel-body">
                    @if (count($errors) > 0)
                        <div class="alert alert-danger">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif
                    <form method="post" role="form" action="{{ route('send.email') }}">
                        <input type="hidden" name="_token" value="{!! csrf_token() !!}">
                        <input type="hidden" name="requestId" value="{{ $requestId }}">
                        <div class="form-group">
                            <label>Receiver</label>
                            <input type="text" class="form-control" autocomplete="off"  style="border-radius:0px;width:100%;" name="email" value="{{ $sendTo }}"  >
                        </div>
                        <div class="form-group">
                            <label>Subject</label>
                            <input type="text" class="form-control" autocomplete="off"  style="border-radius:0px;width:100%;" name="subject">
                        </div>
                        <div class="form-group" style="text-align: center">
                            <textarea name="message" cols="35" rows="5"  placeholder="Message..." autofocus></textarea>
                        </div>
                        <button type="submit" class="btn btn-sm btn-success">Send an email</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection