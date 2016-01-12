<!doctype html>

<html lang="en">
<head>
    <meta charset="utf-8">
    <title>Feedback app</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="author" content="Team Bastion">
    <meta name="description"
          content="Share your feedbacks on certain projects">
    <link rel="icon" href="http://sixrevisions.com/favicon.ico" type="image/x-icon" />
    <link href="http://fonts.googleapis.com/css?family=Kotta+One|Cantarell:400,700" rel="stylesheet" type="text/css">
    <!--[if lt IE 9]>
    <script src="http://html5shiv.googlecode.com/svn/trunk/html5.js"></script>
    <![endif]-->

    <!-- Bootstrap Core CSS -->
    <link href="{{ asset('css/bootstrap.min.css') }}" rel="stylesheet">

    <link rel="stylesheet" href="{{ asset('css/presentational-only.css') }}">

    <!-- responsive-full-background-image.css stylesheet contains the code you want -->
    <link rel="stylesheet" href="{{ asset('css/responsive-full-background-image.css') }}">

    <link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/css/toastr.min.css">

</head>
<body>
    <nav class="navbar" id="top">
        <div class="inner">
            @if (!Auth::check())
                <a href="{{ url('auth/login') }}">Admin login</a>
            @else
                <a href="{{ url('admin/dashboard') }}">Go to admin dashboard</a>
            @endif
        </div>
    </nav>
    <header class="container">
        <section class="content">
            <h1>Feedback APP</h1>
            <p class="sub-title"><strong>Be part of the projects</strong><br/> to help improve quality of life</p>
            <p><a style="background-color: #2196f3" class="button" id="load-more-content" data-toggle="modal"
                  href="#myModal">Post idea</a> </p>
            <p>We count on you!</p>
            <input type="hidden" id="status" value="{{ session('status') }}">
            <div class="modal" id="myModal">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">x</button>
                            <h4 class="modal-title">Project request</h4>
                            @if (count($errors) > 0)
                                <div class="alert alert-danger">
                                    <ul>
                                        @foreach ($errors->all() as $error)
                                            <li>{{ $error }}</li>
                                        @endforeach
                                    </ul>
                                </div>
                            @endif
                        </div>
                        <div class="modal-body">
                            <form method="POST" action="{{ url('user/request') }}" role="form">
                                <input type="hidden" name="_token" value="{!! csrf_token() !!}">
                                <div class="form-group">
                                    <label for="email">Email address:</label>
                                    <input type="email" class="form-control" name="email" id="email" required
                                           value="{{old('email')}}">
                                </div>
                                <div class="form-group">
                                    <label for="first_name">First name:</label>
                                    <input type="text" class="form-control" name="first_name" id="first_name" required
                                           value="{{old('first_name')}}">
                                </div>
                                <div class="form-group">
                                    <label for="last_name">Last name:</label>
                                    <input type="text" class="form-control" name="last_name" id="last_name" required
                                           value="{{old('last_name')}}">
                                </div>
                                <div class="form-group">
                                    <label for="description">Description:</label>
                                    <textarea class="form-control" rows="4" name="description" id="description"
                                              required>{{ old('description') }}</textarea>
                                </div>
                                <div class="modal-footer">
                                    <button type="submit" class="btn btn-primary">Send</button>
                                    <button href="#" data-dismiss="modal" class="btn btn-danger">Close</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </header>
    <!-- jQuery -->
    <script src="{{ asset('js/jquery.min.js') }}"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="{{ asset('js/bootstrap.min.js') }}"></script>

    <script src="{{ asset('js/front.js') }}"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/js/toastr.min.js"></script>


    @if (count($errors) > 0)
        <script>
            $('#myModal').modal('show');
        </script>
    @endif
    @if (session('status'))
        <script>
            toastr.success($('#status').val());
        </script>
    @endif
</body>
</html>