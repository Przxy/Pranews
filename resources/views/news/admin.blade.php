<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Admin</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous">
    </script>
    <link href="{{ asset('css/style2.css') }}" rel="stylesheet">
</head>

<body>
    <div class="container mt-5">
        <h1 class="text-center">Pranews Admin</h1>
        <center><a class="btn btn-success mt-3" href="{{ route('news.create') }}">TAMBAH BERITA</a></center>
        <center><form method="POST" action="{{ route('logout') }}">
            @csrf

            <a class="btn btn-danger mt-3" :href="route('logout')"
                    onclick="event.preventDefault();
                                this.closest('form').submit();">
                {{ __('Log Out') }}
            </a>
        </form></center>

        <div class="card mt-5">
            <div class="card-body">
                <div class="row row-cols-1 row-cols-md-3 g-4">
                    @forelse ($news as $new)
                        <div class="col">
                            <div class="card card-index h-100 border-0 row no-gutters">
                                <img src="{{ asset('/storage/news/' . $new->image) }}" class="card-img-top"
                                    alt="">
                                <div class="card-body">
                                    <h5 class="card-title">{{ $new->title }}</h5>
                                    @php
                                        $content = $new->content;
                                        $words = str_word_count(strip_tags($content), 1);
                                        $shortContent = implode(' ', array_slice($words, 0, 20)) . '...';
                                    @endphp
                                    <p class="card-text">{!! $shortContent !!}</p>
                                    <p class="card-text text-muted">{{ $new->category }}</p>
                                    <form action="" method="POST">
                                        <a href="{{ route('news.show', $new->id) }}"
                                            class="btn btn-sm btn-dark">SHOW</a>
                                        <a href="{{ route('news.edit', $new->id) }}"
                                            class="btn btn-sm btn-primary">EDIT</a>
                                        @csrf
                                        @method('DELETE') <a href="{{ route('news.destroy', $new->id) }}" type="submit"
                                            class="btn btn-sm btn-danger" data-confirm-delete="true">HAPUS</a>
                                    </form>
                                    <hr style="opacity: .3">
                                </div>
                            </div>
                        </div>
                    @empty
                        <div class="alert alert-danger w-100">
                            Berita Belum diposting wlee
                        </div>
                    @endforelse

                </div>
            </div>
        </div>
    </div>

    {{-- Included Content --}}
    @include('sweetalert::alert')
</body>

</html>
