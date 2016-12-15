<body class="pushmenu-push">
  <nav class="pushmenu pushmenu-left">
    <a><img src="{{Auth::user()->profile_photo}}" alt="" id="pp_image" class="img-responsive img-rounded center" width="70" height="70"></a>
    <a href="#">Home</a>
    <a href="{{ url('/users') }}">Users</a>
    <a href="{{ url('/employees') }}">Employees</a>
    <!-- <a href="#">Clients</a> -->
    <a href="#">Holidays</a>
    <a href="#">Vacations</a>
    <a href="#">Calendar</a>
  </nav>

<div class="container-fluid">
        <div class="main">
          <span class="glyphicon glyphicon-th-list span-menu"></span>
            <section class="content">
              <div class="div-panel center">
<script>
$( window ).scroll(function() {
$( ".span-menu" ).css( "margin-top", "0" );
var sc = $(window).scrollTop();
  if(sc == 0) {
    $( ".span-menu" ).css( "margin-top", "50px" ).fadeIn('slow');
  }
});
</script>
