<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>CRM - Project</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">

    <link rel="icon" type="image/png" href="http://overdriveconsultoria.com.br/images/favicon.png" />

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">


    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>


    <style>
        .red{
            color:red!important;
            font-weight: bold;
        }
        html {
            position: relative;
            min-height: 100%;
        }
        body{
            background-color: #a0aec0;
        }
        input{
            background-color: white!important;
        }
        .card-header-color{
            background-color: #d5d5d5 !important;
        }
        .card-body-color{
            background-color: #ececec !important;
        }
    </style>


</head>
<body>

    <div id="app" class="bg-transparent text-dark">



        <nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm d-flex justify-content-between " id="top">
            <!-- Left Side Of Navbar -->
            <div id="leftSide"  >
                <a class="navbar-brand" href="{{ url('/companies/create') }}">
                    <img src="http://overdriveconsultoria.com.br/images/logo-dark2.png" alt="Overdrive" width="270px">
                </a>
            </div>

                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse d-flex justify-content-center" id="navbarSupportedContent" >
                    <!-- Center Side Of Navbar -->
                    @auth()
{{--                        Route::currentRouteName()--}}
                            <ul class="navbar-nav ms-auto">

                                    <a class="nav-link {{Route::currentRouteName()==='companies.index'?'red':''}}" href="{{route('companies.index')}}" role="button"  aria-haspopup="true" aria-expanded="false" v-pre>
                                        List of Companies
                                    </a>
                            </ul>

                            <ul class="navbar-nav ms-auto">
                                    <a class="nav-link {{Route::currentRouteName()==='employees.index'?'red':''}}" href="{{route('employees.index')}}" role="button"  aria-haspopup="true" aria-expanded="false" v-pre>
                                        List of Employees
                                    </a>
                            </ul>
                    @endauth
                </div>
                @auth()
            <!-- Right Side Of Navbar -->
                <ul class="navbar-nav ms-auto d-flex justify-content-center" style="width: 270px">
                    <div class="" aria-labelledby="navbarDropdown">
                        <a class="dropdown-item" href="{{ route('logout') }}"
                           onclick="event.preventDefault();
                                                 document.getElementById('logout-form').submit();">
                            {{ __('Logout') }}
                        </a>
                        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                            @csrf
                        </form>
                    </div>
                </ul>
                    @endauth
        </nav>

        <main class="py-4 container">
            @yield('content')
        </main>
        <script>
            function myFunction(){
                document.getElementById("myDropdown").classList.toggle("show");
            }
        </script>
    </div>
</body>
</html>
