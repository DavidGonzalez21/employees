<!-- Sidebar -->
<div id="sidebar-wrapper">
    <ul class="sidebar-nav">
        <li class="sidebar-brand">
            <a href="#">
                Start Bootstrap
            </a>
        </li>
        <li>
            <li><a href="{{ url('/register') }}">Add user</a></li>
        </li>
        <li class="dropdown">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                Employees
            </a>
            <ul class="dropdown-menu" role="menu">
                <li>
                    <a href="{{ url('/get_user/1') }}">
                        <span class="span-color">See All</span>
                    </a>
                </li>
                <li>
                    <a href="{{ url('/get_user/1') }}">
                        <span class="span-color">Add</span>
                    </a>
                </li>
            </ul>
        </li>
        <li>
            <a href="#">Clients</a>
        </li>
        <li>
            <a href="#">Events</a>
        </li>
        <li>
            <a href="#">About</a>
        </li>
        <li>
            <a href="#">Services</a>
        </li>
        <li>
            <a href="#">Contact</a>
        </li>
    </ul>
</div>
<div class="container">
<div class="row">
<div class="col-md-8 col-md-offset-2">
    <div class="panel panel-default">
