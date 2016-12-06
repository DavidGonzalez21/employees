<!DOCTYPE html>
<html>
<head>
  <title>Laravel</title>
  <link href="https://fonts.googleapis.com/css?family=Lato:100" rel="stylesheet" type="text/css">
  <link rel="stylesheet" href="css/app.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css">

  <!-- Latest compiled and minified JavaScript -->
  <script src="/js/app.js"></script>
  <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>
</head>
<body>
  <nav class="navbar navbar-default navbar-static-top">
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
                  Clickit Tech
              </a>
          </div>

          <div class="collapse navbar-collapse" id="app-navbar-collapse">
              <!-- Left Side Of Navbar -->
              <ul class="nav navbar-nav">
                  &nbsp;
              </ul>

              <!-- Right Side Of Navbar -->
              <ul class="nav navbar-nav navbar-right">
                  <!-- Authentication Links -->
                  @if (Auth::guest())
                      <li><a href="{{ url('/login') }}">Login</a></li>
                  @else
                      <li><img src="{{Auth::user()->profile_photo}}" alt="" id="pp_image" class="img-responsive img-circle" width="50" height="50"></li>
                      <li class="dropdown">
                          <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                              {{ Auth::user()->first_name .' '. Auth::user()->last_name }} <span class="caret"></span>
                          </a>
                          <ul class="dropdown-menu" role="menu">
                              <li>
                                  <a href="{{ url('/logout') }}"
                                      onclick="event.preventDefault();
                                               document.getElementById('logout-form').submit();">
                                      Logout
                                  </a>

                                  <form id="logout-form" action="{{ url('/logout') }}" method="POST" style="display: none;">
                                      {{ csrf_field() }}
                                  </form>
                              </li>
                          </ul>
                      </li>
                  @endif
              </ul>
          </div>
      </div>
  </nav>
