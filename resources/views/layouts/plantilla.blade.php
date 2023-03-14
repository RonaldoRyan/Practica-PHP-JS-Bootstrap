        <!DOCTYPE html>
        <html lang="en">
        <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
        <link rel="stylesheet" href="{{ asset('css/index.css') }}">
        <link rel="stylesheet" href="{{ asset('css/pedido.css') }}">
        <link rel="stylesheet" href="{{ asset('css/show.css') }}">
        <link rel="stylesheet" href="{{ asset('css/records.css') }}">




        <title>@yield('title')</title>
        @yield('styles')

        </head>
        <body>

        <div>
            @yield('sidebar')
        </div>

        <div>
        @yield('content')
        </div>


        <div>
        @yield('footer')
        </div>


        <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.6.0/js/bootstrap.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
        @if(session('login_error'))
        <script> $(function() {
                $('#loginModal').modal('show'); });
        </script>
        @endif
        @if(session('register_error'))
        <script> $(function() {
                $('#registerModal').modal('show'); });
        </script>
        @endif
        <script src="{{ asset('js/code.js') }}"></script>

        </body>
        </html>
