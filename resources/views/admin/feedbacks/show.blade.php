@extends('admin.default.layout')

@section('content')
    <div class="container">
        <h1>Feedbacks</h1>
        <hr>
        <h3>Average rating: {{ $avgFeedbacks }}</h3>
        <table class="table table-striped table-bordered table-hover" style="margin-top: 20px">
            <thead>
            <tr class="bg-info">
                <th>Datetime</th>
                <th>Description</th>
                <th>Mark</th>
                <th>Image</th>
                <th>Location</th>
            </tr>
            </thead>
            <tbody>
            @foreach ($feedbacks as $feedback)
                <tr>
                    <td>{{ $feedback->pivot->date }}</td>
                    <td>{{ $feedback->pivot->description }}</td>
                    <td>{{ $feedback->pivot->mark }}</td>
                    <td style="text-align: center"><a href="{{ asset('images/feedback_uploads/' . $feedback->pivot->image) }}"
                           data-lightbox="{{$feedback->pivot->image}}"
                           data-title="{{ $feedback->name }}" >
                            <img src="{{ asset('images/feedback_uploads/' . $feedback->pivot->image) }}"
                                 width="150" height="100"></a></td>
                    <td><a href="{{ url('http://maps.google.com/?q='
                            . $feedback->pivot->lat . ',' . $feedback->pivot->long) }}"
                           class="btn btn-info">View location</a></td>
                </tr>
            @endforeach

            </tbody>

        </table>
        <div style="text-align: center">
            {!! $feedbacks->render() !!}
        </div>

    </div>
@endsection