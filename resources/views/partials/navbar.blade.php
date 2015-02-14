<!-- Navbar -->
<div class="navbar navbar-inverse navbar-static-top" role="navigation">
    <div class="container">
        <div class="navbar-header">
            <div class="navbar-brand">ELF</div>
        </div>
        <div>

            <ul class="nav navbar-nav">
                <li><a href="{{ route('home') }}">Home</a></li>
            </ul>
            @if (Auth::check())
                <ul class="nav navbar-nav navbar-right">
                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown">{{ Auth::user()->nama }} <b class="caret"></b></a>
                        <ul class="dropdown-menu">
                            <li><a href="{{ route('users.show', Auth::user()->id) }}">Profile</a></li>
                            <li class="divider"></li>
                            <li><a href="{{ url('auth/logout') }}">Logout</a></li>
                        </ul>
                    </li>
                </ul>
            @endif
        </div>
    </div>
</div>
