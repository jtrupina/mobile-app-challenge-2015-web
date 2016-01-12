@extends('admin.default.layout')

@section('content')
    <div class="container" style="margin-top:30px">
        <div class="col-md-4 col-md-offset-4">
            <div class="panel panel-default" style="margin-top: 15px">
                <div class="panel-heading"><h3 class="panel-title"><strong>Creating a new project</strong></h3></div>
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
                    <form method="post" role="form" action="{{ route('project.create') }}">
                        <input type="hidden" name="_token" value="{!! csrf_token() !!}">
                        <input type="hidden" name="requestId" value="{{ $id }}">
                        <div class="form-group">
                            <label>Name of the project</label>
                            <input type="text" class="form-control" autocomplete="off"  style="border-radius:0px;width:100%;" name="name" placeholder="Name" autofocus >
                        </div>
                        <div class="form-group" style="text-align: center">
                            <textarea name="description" cols="35" rows="5"  placeholder="Description..."></textarea>
                        </div>
                        <div class="form-group">
                            <label>Private/Public</label>
                            <select class="form-control" name="status">
                                <option value="1">Private</option>
                                <option value="2">Public</option>
                            </select>
                        </div>
                        <button type="submit" class="btn btn-sm btn-success">Create a project</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

@endsection