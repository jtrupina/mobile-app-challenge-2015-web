@extends('admin.default.layout')

@section('content')
    <div class="container">
        <h1>Interests</h1>
        <a href="{{ url('admin/dashboard/interest/create') }}" class="btn btn-success">Create Interest</a>
        <hr>
        <table class="table table-striped table-bordered table-hover">
            <thead>
            <tr class="bg-info">
                <th>Interest</th>
            </tr>
            </thead>
            <tbody>
            @foreach ($interests as $interest)
                <tr>
                    <td>{{ $interest->tag }}</td>
                </tr>
            @endforeach

            </tbody>

        </table>
        <div style="text-align: center">
            {!! $interests->render() !!}
        </div>

    </div>
@endsection