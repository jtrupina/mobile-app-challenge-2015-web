@extends('admin.default.layout')

@section('content')
    <div class="container">
        <h1>Create New Group</h1>
        <form method="POST" action="{{ url('admin/dashboard/group/store') }}">
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
                <label for="description">Description:</label>
                <textarea name="description" class="form-control" rows="10"></textarea>
            </div>
            <div class="form-group">
                <button type="submit" class="btn btn-primary form-control">Save</button>
            </div>
        </form>
    </div>
@endsection