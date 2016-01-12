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

    <link href="{{ asset('css/login.css') }}" rel="stylesheet">

</head>
<body>

    <div class="container">
        <div class="row">
            <div class="col-sm-6 col-md-4 col-md-offset-4">
                <h1 class="text-center login-title">Sign in as Administrator</h1>
                <div class="account-wall">
                    <img class="profile-img" src="//ssl.gstatic.com/accounts/ui/avatar_2x.png"
                         alt="">
                    @if (count($errors) > 0)
                        <div class="alert alert-danger">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif
                    <form class="form-signin" method="POST" action="{{ url('auth/login') }}">
                        <input type="hidden" name="_token" value="{!! csrf_token() !!}">
                        <input type="text" class="form-control" placeholder="Email" name="email" required autofocus>
                        <input type="password" class="form-control" placeholder="Password" name="password" required>
                        <button class="btn btn-lg btn-primary btn-block" type="submit">
                            Sign in</button>
                        <label class="checkbox pull-left">
                            <input type="checkbox" value="remember-me">
                            Remember me
                        </label>
                        <a href="#" class="pull-right need-help">Need help? </a><span class="clearfix"></span>
                    </form>
                </div>
            </div>
        </div>
    </div>

<!-- jQuery -->
<script src="{{ asset('js/jquery.min.js') }}"></script>

<!-- Bootstrap Core JavaScript -->
<script src="{{ asset('js/bootstrap.min.js') }}"></script>

</body>
</html>