<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>CRM</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">

        <!-- Styles -->
        <style>
            body{
                margin: 0;
                padding: 100px;
                text-align: center;
                font-family: 'Nunito';
                background-image: url("https://i.ytimg.com/vi/AvShvpr0W4M/maxresdefault.jpg");
                background-repeat: no-repeat;
                background-size: cover;
            }
            .bloco{
                text-align: center;
                border-radius: 15px;
                background-color: #eeeeee;
                text-align: left;
                text-decoration: none;
                color: black;
                display:inline-block;
                padding: 15px;
            }
            .bloco:hover{
                background-color: #9fb4d0;
                color:white;
            }
        </style>

        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

    </head>
    <body class="antialiased d-flex justify-content-center">
        @auth()
            <a href="{{ url('/companies/create') }}" class="bloco">
                <p class="h4 text-center">CRM Access</p>
                <p class="text-center">LOGIN:</p>
                <p class="text-center">Welcome to the control system</p>
            </a>
             @else
            <a href="{{ route('login') }}" class="bloco">
                <p class="h4 text-center">CRM Access</p>
                <p class="text-center">LOGIN:</p>
                <p class="text-center">Welcome to the control system</p>
            </a>
        @endauth
    </body>
</html>
