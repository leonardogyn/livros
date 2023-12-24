<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">

        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">

        <!-- Styles -->
        <style>
            html, body {
                background-color: #fff;
                color: #636b6f;
                font-family: 'Nunito', sans-serif;
                font-weight: 200;
                height: 100vh;
                margin: 0;
            }

            .full-height {
                height: 100vh;
            }

            .flex-center {
                align-items: center;
                display: flex;
                justify-content: center;
            }

            .position-ref {
                position: relative;
            }

            .top-right {
                position: absolute;
                right: 10px;
                top: 18px;
            }

            .content {
                text-align: center;
            }

            .title {
                font-size: 84px;
            }

            .subtitle {
                font-size: 16px;
                text-align: left;
            }

            .links > a {
                color: #636b6f;
                padding: 0 25px;
                font-size: 13px;
                font-weight: 600;
                letter-spacing: .1rem;
                text-decoration: none;
                text-transform: uppercase;
            }

            .m-b-md {
                margin-bottom: 30px;
            }
        </style>
    </head>
    <body>
        <div class="flex-center position-ref full-height">
            @if (Route::has('login'))
                <div class="top-right links">
                    @auth
                        <a href="{{ url('/home') }}">Home</a>
                    @else
                        <a href="{{ route('login') }}">Login</a>

                        @if (Route::has('register'))
                            <a href="{{ route('register') }}">Register</a>
                        @endif
                    @endauth
                </div>
            @endif

            <div class="content">
                <div class="title m-b-md">
                    Laravel
                </div>

                <div class="subtitle">
                    <p>Quantidade de registros por página: {{$qtdePorPagina}}
                    </br>Número de Tentativas menores que: {{$tentativas}}</p>
                </div>

                <table class="table">
                    <thead>
                        <tr>
                            <th scope="col">batch</th>
                            <th scope="col">Número do bloco</th>
                            <th scope="col">String de entrada</th>
                            <th scope="col">Chave encontrada</th>
                        </tr>
                    </thead>
                    <tbody>

                    @foreach ($arrItems as $item)
                        <tr>
                            <td scope="row">{{$item->batch}}</td>
                            <td scope="row">{{$item->numero_bloco}}</td>
                            <td scope="row">{{$item->string_entrada}}</td>
                            <td scope="row">{{$item->chave_encontrada}}</td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
                {{$arrItems->links()}}
            </div>
        </div>
    </body>
</html>
