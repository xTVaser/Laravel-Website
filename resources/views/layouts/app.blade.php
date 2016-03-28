<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>E.A.R.S.</title>

    <!-- Favicon -->
    <link rel="icon" type="image/png" href="favicon/favicon.png">

    <!-- Fonts -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.4.0/css/font-awesome.min.css" rel='stylesheet' type='text/css'>
    <link href='https://fonts.googleapis.com/css?family=Open+Sans:400,600,700' rel='stylesheet' type='text/css'>
    <link href='https://fonts.googleapis.com/css?family=Exo:400,900,700,500,300' rel='stylesheet' type='text/css'>

    <!-- Scripts -->
    <script src="//cdnjs.cloudflare.com/ajax/libs/less.js/2.5.3/less.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.2.2/jquery.min.js" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/x-editable/1.5.1/bootstrap-editable/js/bootstrap-editable.min.js"></script>
    <!--<script src="{{ URL::asset('javascript/editableFields.js')}}" />-->


    <!-- Styles -->
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/x-editable/1.5.1/bootstrap-editable/css/bootstrap-editable.css" rel="stylesheet">
    <link rel="stylesheet" href="{{ URL::asset('stylesheets/customStyle.css') }}" />

</head>
<body id="app-layout">
    <nav class="navbar navbar-default">
        <div class="container">
            <div class="navbar-header">

                <!-- Collapsed Hamburger -->
                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#app-navbar-collapse">
                    <span class="sr-only">Toggle Navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>

                <!-- Branding Image -->
                <a class="navbar-brand" href="{{ url('/') }}">
                    Employee Application Review System
                </a>
            </div>

            <div class="collapse navbar-collapse" id="app-navbar-collapse">
                <!-- Left Side Of Navbar -->
                <ul class="nav navbar-nav">
                  @if (!Auth::guest())
                        <li><a href="{{ url('/jobs')}}">Jobs</a></li>
                        @if(Auth::user()-> flag >= 1)
                          <li><a href="{{ url('/applications')}}">Applicants</a></li>
                          @if(Auth::user()-> flag >= 2)
                            <li><a href="{{ url('/jobs/create')}}">Create Job</a></li>
                            <li><a href="{{ url('/createaccount')}}">Create Account</a></li>
                            <li><a href="{{ url('/mail-config')}}">Email Testing</a></li>
                          @endif
                        @endif
                  @endif
                </ul>

                <!-- Right Side Of Navbar -->
                <ul class="nav navbar-nav navbar-right">
                    <!-- Authentication Links -->
                    @if (Auth::guest())
                        <li><a href="{{ url('/login') }}">Login</a></li>
                        <li><a href="{{ url('/register') }}">Register</a></li>
                    @else
                        <li class="dropdown">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                                Logged in as: <b>{{ Auth::user()->email }}</b> <span class="caret"></span>
                            </a>

                            <ul class="dropdown-menu" role="menu">
                                <li><a href="{{ url('/profile') }}"><i class="fa fa-btn fa-user"></i>View Profile</a></li>
                                <li><a href="{{ url('/editprofile') }}"><i class="fa fa-btn fa-pencil-square-o"></i>Edit Profile</a></li>
                                <li><a href="{{ url('/logout') }} "><i class="fa fa-btn fa-sign-out"></i>Logout</a></li>
                                <li><a href="{{ url('/my-applications')}} "><i class="fa fa-btn fa-folder-open"></i>My Applications</a></li>
                                <!-- This Notification button should check if the user has notifications. -->
                                <!-- SCOPE <li><a href="{{ url('/notifications')}} "><i class="fa fa-btn fa-envelope"></i>Notifications</a></li> CREEP -->
                                <!-- If they do we make a glowy thing or something, otherwise normal -->
                            </ul>
                        </li>
                    @endif
                </ul>
            </div>
        </div>
    </nav>

    @yield('content')

    <!-- JavaScripts -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.4/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
    {{-- <script src="{{ elixir('js/app.js') }}"></script> --}}
</body>
</html>
