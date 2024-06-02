<!doctype html>
<html lang="en">

<head>
    <title>Show</title>
    <!-- Required meta tags -->
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />

    <!-- Bootstrap CSS v5.2.1 -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous">
    </script>
    <link href="{{ asset('css/style.css') }}" rel="stylesheet">
</head>

<body>
    <nav class="navbar navbar-expand-lg fixed-top bg-white navbar-first border-bottom" style="height: 64px;">
        <div class="container">
            <a href="" class="navbar-brand"></a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
                aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse justify-content-center" id="navbarNav">
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <img src="{{ asset('img/newsnow.co.uk logo.png') }}" width="30px" alt="">
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <div class="container">
        <h1 class="card-title text-center mt-4 mb-5">{{ $new->title }}</h1>
        <div class="card mb-3 border-0 row no-gutters">
            <p class="bold">By Pranews</p>
            <img src="{{ asset('/storage/news/' . $new->image) }}" class="card-img-top" alt="...">
            <p class="text- mt-2"><small class="text-body-secondary">{{ $new->created_at->diffForHumans() }}</small></p>
            <div class="card-body text-center">
                <p class="card-text" style="font-size: 25px; text-align: center">{!! $new->content !!}</p>
            </div>
        </div>
        {{-- Footer --}}
        <hr>
        <div class="container mt-5 mb-5">
            <img src="{{ asset('img/newsnow.co.uk logo.png') }}" width="30px" alt="">

            <ul class="nav nav-underline mt-3" id="myTab" role="tablist">
                <li class="nav-item" role="presentation">
                    <a class="nav-link active" href="/news" type="button" aria-selected="true">Home</a>
                </li>
                <li class="nav-item" role="presentation">
                    <a class="nav-link" href="/news" type="button" aria-selected="false">World</a>
                </li>
                <li class="nav-item" role="presentation">
                    <a class="nav-link" href="/news" type="button" aria-selected="false">Sports</a>
                </li>
                <li class="nav-item" role="presentation">
                    <a class="nav-link" href="/news" type="button" aria-selected="false">Finnance</a>
                </li>
                <li class="nav-item" role="presentation">
                    <a class="nav-link" href="/news" type="button" aria-selected="false">Travel</a>
                </li>
                <li class="nav-item" role="presentation">
                    <a class="nav-link" href="/news" type="button" aria-selected="false">Earth</a>
                </li>
            </ul>
            <hr class="mt-3" style="opacity: .3">
            <p class="" style="font-size: 14px">&copy; Copyright 2024 Prasetya. All rights reserved. The
                Prasetya is not
                responsible for the content of external sites.</p>
        </div>
</body>


</html>
