@extends('admin.default.layout')

@section('content')

    <div class="container" style="margin-top: 100px">
        <a href="{{ action('Admin\ExcelController@getAllRequestsToExcel') }}" class="btn btn-success">Export excel</a>
        <hr>
        <table class="table table-striped table-bordered table-hover">
            <thead>
            <tr class="bg-info">
                <th>First name</th>
                <th>Last name</th>
                <th>Description</th>
                <th>Date</th>
                <th>Detailed view</th>
            </tr>
            </thead>
            <tbody>
            @foreach ($requests as $request)
                <tr>
                    <td>{{ $request->first_name }}</td>
                    <td>{{ $request->last_name }}</td>
                    <td>{{ substr($request->description, 0, 60) . "..." }}</td>
                    <td>{{ $request->created_at }}</td>
                    <td><a href="{{url('admin/dashboard/requests',$request->id)}}" class="btn btn-primary">Read</a></td>
                </tr>
            @endforeach

            </tbody>

        </table>
        <div style="text-align: center">
            {!! $requests->render() !!}
        </div>
    </div>

@endsection