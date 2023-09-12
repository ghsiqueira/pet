<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>Pet Shop</title>

    <link rel="shortcut icon" href="" type="image/x-icon">

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=Nunito" rel="stylesheet">

    <!-- Scripts -->
    @vite(['resources/sass/app.scss', 'resources/js/app.js'])

<body>
    <div id="app">
        <nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm">
            <div class="container">
                <a class="navbar-brand" href="{{ url('/') }}">
                    Pet Shop
                </a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav me-auto">

                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ms-auto">
                        <!-- Authentication Links -->
                        @guest
                            @if (Route::has('login'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                                </li>
                            @endif

                            @if (Route::has('register'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                                </li>
                            @endif
                        @else
                            <li class="nav-item dropdown">
                                <div class="user-dropdown">
                                    <a id="navbarDropdown" class="nav-link dropdown-toggle user-initials" href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                        {{ getUserInitials(Auth::user()->name) }} <i class="fas fa-chevron-down"></i>
                                    </a>
                                    <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                                        <a class="dropdown-item" href="{{ route('logout') }}"
                                           onclick="event.preventDefault();
                                                         document.getElementById('logout-form').submit();">
                                            {{ __('Logout') }}
                                        </a>
                                        <a class="dropdown-item" href="{{ Auth::user()->usuario === 'petshop' ? route('perfil.petshop') : route('perfil.cliente') }}">
                                            {{ __('Perfil') }}
                                        </a>
                                        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                            @csrf
                                        </form>
                                    </div>
                                </div>
                            </li>
                        @endguest
                    </ul>
                </div>
            </div>
        </nav>

        <main class="py-4">
            @yield('content')
        </main>
    </div>
</body>
</html>

<style>
.user-initials {
    display: flex;
    align-items: center;
    text-decoration: none;
    color: #333;
    font-weight: bold;
    font-size: 16px;
    position: relative;
    transition: color 0.3s;
}

.user-dropdown {
    display: inline-flex;
    align-items: center;
    cursor: pointer;
}

.user-dropdown .fas {
    margin-left: 5px;
}

.user-initials:hover {
    color: #007bff;
}

.dropdown-menu {
    min-width: unset;
    width: auto;
    right: 0;
    left: unset;
}
</style>

<script src="{{ asset('js/custom.js') }}"></script>
<script src="https://kit.fontawesome.com/a076d05399.js" crossorigin="anonymous"></script>

@php
function getUserInitials($name) {
    $initials = '';
    $nameParts = explode(' ', $name);
    $nameCount = count($nameParts);
    
    if ($nameCount > 0) {
        $initials .= strtoupper(substr($nameParts[0], 0, 1)); //Primeira inicial do nome
        
        if ($nameCount > 1) {
            $initials .= strtoupper(substr($nameParts[$nameCount - 1], 0, 1)); //Primeira inicial do sobrenome
        }
    }
    
    return $initials;
}
@endphp
