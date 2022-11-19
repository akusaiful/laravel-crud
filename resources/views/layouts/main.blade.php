<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <title>@yield('title')</title>

    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Varela+Round">
    <!-- Bootstrap -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">
    <link href="{{ asset('assets/css/bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/css/custom.css') }}" rel="stylesheet">

    @yield('css')

</head>

<body>
    <!-- navbar -->
    <nav class="navbar navbar-expand-lg navbar-light">
        <div class="container">
            <a class="navbar-brand text-uppercase" href="{{ route('department.index') }}">
                <img src="{{ asset('assets/img/logo.png') }}" alt="" style="width: 300px;">
            </a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbar-toggler"
                aria-controls="navbarTogglerDemo01" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <!-- /.navbar-header -->
            <div class="collapse navbar-collapse" id="navbar-toggler">
                <ul class="navbar-nav">
                    <li class="nav-item @if (request()->is(['department', 'department/*']))
                        active
                    @endif"><a href="{{ route('department.index') }}" class="nav-link">Departments</a></li>
                    <li class="nav-item dropdown @if (request()->is(['contact', 'contact/*']))
                        active
                    @endif">
                        <a href="#" class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink"
                            role="button" data-toggle="dropdown" aria-haspopup="true"
                            aria-expanded="false">Contacts</a>

                        <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                            <a class="dropdown-item" href="{{ route('contact.index') }}">Contact</a>
                            <a class="dropdown-item" href="{{ route('contact.recycle') }}">
                                Recycle Bin</a>
                        </div>
                    </li>

                </ul>
                <ul class="navbar-nav ml-auto">

                    @guest
                        <li class="nav-item mr-2"><a href="{{ route('login') }}" class="btn btn-outline-secondary">Login</a>
                        </li>
                        <li class="nav-item"><a href="{{ route('register') }}" class="btn btn-outline-primary">Register</a>
                        </li>
                    @endguest

                    @auth
                        <img src="{{ auth()->user()->getAvatar() }}" class="rounded-circle shadow-4-strong" width="40px">
                        
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                {{ auth()->user()->name }}
                            </a>
                            <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">

                                <form action="{{ route('logout') }}" method="POST">
                                    @csrf
                                    <a class="dropdown-item" href="{{ route('profile.setting') }}">Settings</a>
                                    <button class="dropdown-item">Logout</button>
                                </form>

                            </div>
                        </li>
                    @endauth
                </ul>
            </div>
        </div>
    </nav>

    <!-- content -->
    <main class="py-5">
        <div class="container">
            @yield('content')
        </div>
    </main>

    <script src="{{ asset('assets/js/jquery.min.js') }}"></script>
    <script src="{{ asset('assets/js/popper.min.js') }}"></script>
    <script src="{{ asset('assets/js/bootstrap.min.js') }}"></script>

    @include('sweetalert::alert')

    @yield('js')
</body>

</html>
