<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>@yield('title')</title>

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <style>
        .custom-navbar {
            /*background-color: #0047ab;*/
            background-color: #ff9760;
        }
        h4, p {
            /*color: #ffffff;*/
            text-align: center;
        }

        .button-container {
            text-align: center;
        }

        .img-thumbnail {
            border:  1px solid #ffdcbf; /* Substitua 'green' pela cor desejada */
        }

        .custom-btn-link {
            background-color: #ff9760;
            border:  1px solid #ffdcbf
        }

        .left-aligned {
            text-align: left;
        }

        button {
            /*background-color: #0047ab;*/
            background-color: #ff9760;
        }
    </style>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>

</head>
<body>

<nav class="navbar navbar-expand-lg navbar-light custom-navbar">
    <a class="navbar-brand" href="#">RobotStore</a>

    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarNav">
        <ul class="navbar-nav">
            <li class="nav-item">
                <a class="nav-link" href="{{ route('.index') }}">Página Inicial</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="{{route('cart.index')}}">Meu Carrinho</a>
            </li>
        </ul>
    </div>

    <ul class="navbar-nav ml-auto">
        @guest
        <li class="nav-item">
            <a class="nav-link" href="{{ route('login') }}">Entrar</a>
        </li>
        @endguest

        @guest
        <li class="nav-item">
            <a class="nav-link" href="{{ route('register') }}">Registrar</a>
        </li>
        @endguest

        @auth
        <li>
            <a class="nav-link" href="{{ route('logout') }}">Sair</a>
        </li>
        @endauth
    </ul>

</nav>

    <div class="container mt-4">
        @yield('content')
    </div>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.min.js"></script>
</body>
</html>
