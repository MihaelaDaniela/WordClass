<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'WorldClass') }}</title>

        <!-- Fonts -->
        <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap">
        
        <!-- Styles -->
        <link rel="stylesheet" href="{{ asset('css/app.css') }}">
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.3/font/bootstrap-icons.css">

        <!-- Scripts -->
        <script src="{{ asset('js/app.js') }}" defer></script>
        <style>
            body{
                background-image:url('https://toppng.com/uploads/preview/textured-backgrounds-for-websites-11553984856jlopbdohfo.jpg') !important;
                background-size:cover;
                background-repeat:no-repeat;
            }
        </style>
    </head>
    <body class="font-sans antialiased">
        @include('layouts.navigation')

        <!-- Page Heading -->
        <header class="w-100 p-3" style="background-color: #72a0e5">
            <div class="container">
                {{ $header }}
            </div>
        </header>

        <!-- Page Content -->
        <main class="container my-5">

            @if(session('success'))
                <div class="row">
                    <div class="col-6 offset-3">
                        <div class="alert alert-success alert-dismissible fade show" role="alert">
                            <p>{{session('success')}}</p>
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>
                    </div>
                </div>
            @endif

            @if($errors->any())
                <div class="row">
                    <div class="col-6 offset-3">
                        <div class="alert alert-danger alert-dismissible fade show" role="alert">
                            @foreach ($errors->all() as $error)
                            <p>{{$error}}</p>
                            @endforeach
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>
                    </div>
                </div>
            @endif
            

            {{ $slot }}
        </main>
    </body>
</html>
