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

        body {
            background-color: #f5f5f5;
        }
        .custom-navbar {
            /*background-color: #0047ab;*/
            background-color: #552320;
        }

        .custom-footer {
            /*background-color: #0047ab;*/
            background-color: #6d3530;

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
            background-color:  #854640;
            border:  1px solid  #854640;
        }

        .left-aligned {
            text-align: left;
        }

        button {
            /*background-color: #0047ab;*/
            background-color: rgba(109, 53, 48, 0.7);
        }

        a.nav-link {
            color: #ffffff;
        }
    </style>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>

</head>
<body>

<nav class="navbar navbar-expand-lg navbar-light custom-navbar">
    <a class="navbar-brand" href="#" style="color: #ffffff">Decor3dStore</a>

    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarNav">
        <ul class="navbar-nav">
            <li class="nav-item">
                <a class="nav-link" style="color: #ffffff" href="{{ route('.index') }}">Página Inicial</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" style="color: #ffffff" href="{{route('cart.index')}}">Meu Carrinho</a>
            </li>
        </ul>
    </div>

    <ul class="navbar-nav ml-auto">
        @guest
        <li class="nav-item">
            <a class="nav-link" href="{{ route('login') }}" style="color: #ffffff">Entrar</a>
        </li>
        @endguest

        @guest
        <li class="nav-item">
            <a class="nav-link" href="{{ route('register') }}" style="color: #ffffff">Registrar</a>
        </li>
        @endguest

        @auth
        <li>
            <a class="nav-link" href="{{ route('logout') }}" style="color: #ffffff">Sair</a>
        </li>
        @endauth
    </ul>

</nav>

    <div class="container mt-4">
        @yield('content')
    </div>

<footer class="text-light text-center py-3 fixed-bottom custom-footer">
    <p>&copy; 2023 Carrinho de Compras. Todos os direitos reservados. @ElvisTavares</p>
</footer>

@stack('scripts')
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.min.js"></script>
</body>
</html>
