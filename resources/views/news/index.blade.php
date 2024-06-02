@extends('layout.app')
@section('content')
    <div class="container mt-2">

        <div class="tab-content" id="myTabContent">
            <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab" tabindex="0">
                <h1>Home</h1>
                <hr>
                <form action="{{ route('news.index') }}" method="GET" class="d-flex mb-4" role="search">
                    <input class="form-control me-2" name="cari" type="search" placeholder="Search" value="{{$request->cari}}" aria-label="Search">
                    <button class="btn btn-outline-success" type="submit">Search</button>
                  </form>
                <div class="row row-cols-1 row-cols-md-3 g-4">
                    @foreach ($news as $new)
                        <div class="col">
                            <div class="card card-index h-100 border-0 row no-gutters">
                                <img src="{{ asset('/storage/news/' . $new->image) }}" class="card-img-top" alt="">
                                <div class="card-body">
                                    <h5 class="card-title">{{ $new->title }}</h5>
                                    @php
                                    $content = $new->content;
                                    $words = str_word_count(strip_tags($content), 1);
                                    $shortContent = implode(' ', array_slice($words, 0, 20)) . '...';
                                @endphp
                                <p class="card-text">{!! $shortContent !!}</p>
                                <p class="text-muted">{{ $new->created_at->diffForHumans() }}</p>
                                    <a href="{{ route('news.show', $new->id) }}" class="stretched-link"></a>
                                    <hr style="opacity: .3">
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
            <div class="tab-pane fade" id="world" role="tabpanel" aria-labelledby="world-tab" tabindex="0">
                <h1>World</h1>
                <hr>
                <form action="{{ route('news.index') }}" method="GET" class="d-flex mb-4" role="search">
                    <input class="form-control me-2" name="cari" type="search" placeholder="Search" value="{{$request->cari}}" aria-label="Search">
                    <button class="btn btn-outline-success" type="submit">Search</button>
                  </form>
                <div class="row row-cols-1 row-cols-md-3 g-4">
                    @foreach ($news as $new)
                        @if ($new->category === 'world')
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
                                        <p class="text-muted">{{ $new->created_at->diffForHumans() }}</p>
                                        <a href="{{ route('news.show', $new->id) }}" class="stretched-link"></a>
                                        <hr style="opacity: .3">
                                    </div>
                                </div>
                            </div>
                        @endif
                    @endforeach
                </div>
            </div>
            <div class="tab-pane fade" id="sports" role="tabpanel" aria-labelledby="sports-tab" tabindex="0">
                <h1>Sports</h1>
                <hr>
                <form action="{{ route('news.index') }}" method="GET" class="d-flex mb-4" role="search">
                    <input class="form-control me-2" name="cari" type="search" placeholder="Search" value="{{$request->cari}}" aria-label="Search">
                    <button class="btn btn-outline-success" type="submit">Search</button>
                  </form>
                <div class="row row-cols-1 row-cols-md-3 g-4">
                    @foreach ($news as $new)
                        @if ($new->category === 'sports')
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
                                        <p class="text-muted">{{ $new->created_at->diffForHumans() }}</p>
                                        <a href="{{ route('news.show', $new->id) }}" class="stretched-link"></a>
                                        <hr style="opacity: .3">
                                    </div>
                                </div>
                            </div>
                        @endif
                    @endforeach
                </div>
            </div>
            <div class="tab-pane fade" id="finnance" role="tabpanel" aria-labelledby="finnance-tab" tabindex="0">
                <h1>Finnance</h1>
                <hr>
                <form action="{{ route('news.index') }}" method="GET" class="d-flex mb-4" role="search">
                    <input class="form-control me-2" name="cari" type="search" placeholder="Search" value="{{$request->cari}}" aria-label="Search">
                    <button class="btn btn-outline-success" type="submit">Search</button>
                  </form>
                <div class="row row-cols-1 row-cols-md-3 g-4">
                    @foreach ($news as $new)
                        @if ($new->category === 'finnance')
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
                                        <p class="text-muted">{{ $new->created_at->diffForHumans() }}</p>
                                        <a href="{{ route('news.show', $new->id) }}" class="stretched-link"></a>
                                        <hr style="opacity: .3">
                                    </div>
                                </div>
                            </div>
                        @endif
                    @endforeach
                </div>
            </div>
            <div class="tab-pane fade" id="travel" role="tabpanel" aria-labelledby="travel-tab" tabindex="0">
                <h1>Travel</h1>
                <hr>
                <form action="{{ route('news.index') }}" method="GET" class="d-flex mb-4" role="search">
                    <input class="form-control me-2" name="cari" type="search" placeholder="Search" value="{{$request->cari}}" aria-label="Search">
                    <button class="btn btn-outline-success" type="submit">Search</button>
                  </form>
                <div class="row row-cols-1 row-cols-md-3 g-4">
                    @foreach ($news as $new)
                        @if ($new->category === 'travel')
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
                                        <p class="text-muted">{{ $new->created_at->diffForHumans() }}</p>
                                        <a href="{{ route('news.show', $new->id) }}" class="stretched-link"></a>
                                        <hr style="opacity: .3">
                                    </div>
                                </div>
                            </div>
                        @endif
                    @endforeach
                </div>
            </div>
            <div class="tab-pane fade" id="earth" role="tabpanel" aria-labelledby="earth-tab" tabindex="0">
                <h1>Earth</h1>
                <hr>
                <form action="{{ route('news.index') }}" method="GET" class="d-flex mb-4" role="search">
                    <input class="form-control me-2" name="cari" type="search" placeholder="Search" value="{{$request->cari}}" aria-label="Search">
                    <button class="btn btn-outline-success" type="submit">Search</button>
                  </form>
                <div class="row row-cols-1 row-cols-md-3 g-4">
                    @foreach ($news as $new)
                        @if ($new->category === 'earth')
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
                                        <p class="text-muted">{{ $new->created_at->diffForHumans() }}</p>
                                        <a href="{{ route('news.show', $new->id) }}" class="stretched-link"></a>
                                        <hr style="opacity: .3">
                                    </div>
                                </div>
                            </div>
                        @endif
                    @endforeach
                </div>
            </div>
        </div>
    </div>
@endsection
