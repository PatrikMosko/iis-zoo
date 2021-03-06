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
                zoo
            </a>
        </div>

        <div class="collapse navbar-collapse" id="app-navbar-collapse">
        @auth
            <!-- Left Side Of Navbar -->
                <ul class="nav navbar-nav">
                    <li>
                        <a href="{{ url('/') }}">Home</a>
                    </li>
                    <li>
                        <a href="{{ url('Feeding/feeding') }}">Feeding</a>
                    </li>
                    <li>
                        <a href="{{ url('Cleanings/cleanings') }}">Cleaning</a>
                    </li>
                    <li>
                        <a href="{{ url('Animals/animals') }}">Animals</a>
                    </li>
                    <li>
                        <a href="{{ url('Trainings/trainings')  }}">Education trainings</a>
                    </li>
                </ul>
        @endauth

        <!-- Right Side Of Navbar -->
            <ul class="nav navbar-nav navbar-right">
                <!-- Authentication Links -->
                @guest
                    <li><a href="{{ route('login') }}">Login</a></li>
                    <li><a href="{{ route('register') }}">Register</a></li>
                    @else
                        <li class="dropdown">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                                {{ Auth::user()->user_name }}
                                @if($is_admin)
                                    (admin)
                                @else
                                    (user)
                                @endif
                                <span class="caret"></span>
                            </a>

                            <ul class="dropdown-menu" role="menu">
                                @if($is_admin)
                                    <li>
                                        <a href="{{ url('/settings') }}">Admin Settings</a>
                                    </li>
                                @endif
                                @if(!$is_admin)
                                    <li>
                                        <a href="{{ url('/settings/settingsUser') }}">User Settings</a>
                                    </li>
                                @endif
                                <li>
                                    <a href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        Logout
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                        {{ csrf_field() }}
                                    </form>
                                </li>
                            </ul>
                        </li>
                @endguest
            </ul>
        </div>
    </div>
</nav>