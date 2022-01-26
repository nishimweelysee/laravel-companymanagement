<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/tailwindcss/2.2.19/tailwind.min.css" integrity="sha512-wnea99uKIC3TJF7v4eKk4Y+lMz2Mklv18+r4na2Gn1abDRPPOeef95xTzdwGD9e6zXJBteMIhZ1+68QC5byJZw==" crossorigin="anonymous" referrerpolicy="no-referrer" >
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/fontawesome.min.css" integrity="sha512-r9kUVFtJ0e+8WIL8sjTUlHGbTLwlOClXhVqGgu4sb7ILdkBvM2uI+n/Fz3FN8u3VqJX7l9HLiXqXxkx2mZpkvQ==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" integrity="sha512-Fo3rlrZj/k7ujTnHg4CGR2D7kSs0v4LLanw2qksYuRlEzO+tcaEPQogQ0KaoGN26/zrn20ImR1DfuLWnOo7aBA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <style>
        #menu-toggle:checked + #menu {
            display: block;
        }
    </style>
</head>
<body>
<div id="app">
    <header class="lg:px-16 px-6 bg-white flex flex-wrap items-center lg:py-0 py-2 bg-gray-800 text-white">
        <div class="flex-1 flex justify-between items-center">
            <a class="font-bold" href="{{ url('/') }}">
                {{ config('app.name', 'Laravel') }}
            </a>
        </div>

        <label for="menu-toggle" class="pointer-cursor lg:hidden block"><svg class="fill-current text-gray-900" xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 20 20"><title>menu</title><path d="M0 3h20v2H0V3zm0 6h20v2H0V9zm0 6h20v2H0v-2z"></path></svg></label>
        <input class="hidden" type="checkbox" id="menu-toggle" />

        <div class="hidden lg:flex lg:items-center lg:w-auto w-full" id="menu">
            <nav>
                <ul class="lg:flex flex-col items-center justify-between text-base text-white pt-4 lg:pt-0">
                    @guest
                        @if (Route::has('login'))
                            <li>
                                <a class="lg:p-4 py-3 px-0 block border-b-2 border-transparent hover:border-indigo-400" href="{{ route('login') }}">{{ __('Login') }}</a>
                            </li>
                        @endif

                        @if (Route::has('register'))
                            <li>
                                <a class="lg:p-4 py-3 px-0 block border-b-2 border-transparent hover:border-indigo-400" href="{{ route('register') }}">{{ __('Register') }}</a>
                            </li>
                        @endif
                    @else
                        <li class="flex lg:flex-row flex-col gap-4">

                            <a class="lg:p-4 py-3 px-0 block border-b-2 border-transparent hover:border-indigo-400" href="{{ route('company') }}">
                                {{ __('Company') }}
                            </a>
                            <a class="lg:p-4 py-3 px-0 block border-b-2 border-transparent hover:border-indigo-400" href="{{ route('employee.index') }}">
                                {{ __('Employee') }}
                            </a>
                            <a class="lg:p-4 py-3 px-0 block border-b-2 border-transparent hover:border-indigo-400" href="{{ route('client.index') }}">
                                {{ __('Client') }}
                            </a>

                            <a class="lg:p-4 py-3 px-0 block border-b-2 border-transparent hover:border-indigo-400" href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                {{ Auth::user()->name }}
                            </a>

                            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                <div>
                                    <a class="lg:p-4 py-3 px-0 block border-b-2 border-transparent hover:bg-green-600 hover:text-white hover:border-indigo-400" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }}
                                    </a>
                                </div>
                                <div>
                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                        @csrf
                                    </form>
                                </div>
                            </div>
                        </li>
                    @endguest
                </ul>
            </nav>

        </div>

    </header>
    <main class="py-4 px-6">
        @yield('content')
    </main>
</div>
</body>
</html>
