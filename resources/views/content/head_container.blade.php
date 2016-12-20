<nav class="navbar navbar-default sidebar" role="navigation">
<div class="container-fluid">
<div class="navbar-header">
  <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-sidebar-navbar-collapse-1">
    <span class="sr-only">Toggle navigation</span>
    <span class="icon-bar"></span>
    <span class="icon-bar"></span>
    <span class="icon-bar"></span>
  </button>
</div>
<div class="collapse navbar-collapse" id="bs-sidebar-navbar-collapse-1">
  <ul class="nav navbar-nav">
    <h3>
      <img src="/{{Auth::user()->profile_photo}}" alt="" id="pp_image" class="img-responsive img-rounded center" width="70" height="70">
      @if (! Auth::guest())
      <h5 class="center">{{ Auth::user()->first_name }}</h5>
      @endif
    </h3>
    <li id=""><a href=" {{ url('/users') }} "><span class="color-name">   Users</span><span style="font-size:16px;" class="pull-right hidden-xs showopacity glyphicon glyphicon-user"></span></a></li>
    <!--end candidates -->
    <li id="idTest"><a href=" {{ url('/employees') }} "><span class="color-name">Employees</span><span style="font-size:16px;" class="pull-right hidden-xs showopacity glyphicon glyphicon-user"></span></a></li>
    <li id="idResults">
      <a href=" {{ url('/clients') }} "><span class="color-name">   Clients</span><span style="font-size:16px;" class="pull-right hidden-xs showopacity glyphicon glyphicon-user">
      </span></a>
    </li>
    <li id="">
      <a href=" {{ url('/holidays') }} "><span class="color-name">   Holidays</span><span style="font-size:16px;" class="pull-right hidden-xs showopacity glyphicon glyphicon-calendar">
      </span></a>
    </li>
    <li id=""><a href=" {{ url('/tasks') }} "><span class="color-name">  Tasks</span><span style="font-size:16px;" class="pull-right hidden-xs showopacity glyphicon glyphicon-tasks"></span></a></li>
    @if (Auth::guest())
    <li ><a href=" {{ url('/auth/login') }} "><span class="color-name">Login</span><span style="font-size:16px;" class="pull-right hidden-xs showopacity glyphicon glyphicon-log-out"></span></a></li>
    @else
    <li ><a href="{{ url('/logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();"><span class="color-name">Sign Out</span><span style="font-size:16px;" class="pull-right hidden-xs showopacity glyphicon glyphicon-log-out"></span></a></li>
    @endif
  </ul>
</div>
</div>
</nav>

<div class="container-fluid">
        <div class="main">
            <section class="content">
              <div class="justify center">
<script>
$( window ).scroll(function() {
$( ".span-menu" ).css( "margin-top", "0" );
var sc = $(window).scrollTop();
  if(sc == 0) {
    $( ".span-menu" ).css( "margin-top", "100px" ).fadeIn('slow');
  }
});
</script>
