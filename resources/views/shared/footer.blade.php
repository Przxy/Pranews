<hr>
<div class="container mt-5 mb-5">
    <img src="{{ asset('img/newsnow.co.uk logo.png') }}" width="30px" alt="">

    <ul class="nav nav-underline mt-3" id="myTab" role="tablist">
        <li class="nav-item" role="presentation">
            <a class="nav-link active" id="home-tab" data-bs-toggle="tab" data-bs-target="#home" type="button"
                role="tab" aria-controls="home" aria-selected="true">Home</a>
        </li>
        <li class="nav-item" role="presentation">
            <a class="nav-link" id="world-tab" data-bs-toggle="tab" data-bs-target="#world" type="button"
                role="tab" aria-controls="world" aria-selected="false">World</a>
        </li>
        <li class="nav-item" role="presentation">
            <a class="nav-link" id="sports-tab" data-bs-toggle="tab" data-bs-target="#sports" type="button"
                role="tab" aria-controls="sports" aria-selected="false">Sports</a>
        </li>
        <li class="nav-item" role="presentation">
            <a class="nav-link" id="finnance-tab" data-bs-toggle="tab" data-bs-target="#finnance" type="button"
                role="tab" aria-controls="finnance" aria-selected="false">Finnance</a>
        </li>
        <li class="nav-item" role="presentation">
            <a class="nav-link" id="travel-tab" data-bs-toggle="tab" data-bs-target="#travel" type="button"
                role="tab" aria-controls="travel" aria-selected="false">Travel</a>
        </li>
        <li class="nav-item" role="presentation">
            <a class="nav-link" id="earth-tab" data-bs-toggle="tab" data-bs-target="#earth" type="button"
                role="tab" aria-controls="earth" aria-selected="false">Earth</a>
        </li>
    </ul>
    <form method="POST" action="{{ route('logout') }}">
        @csrf

        <a class="btn btn-outline-danger mt-3" :href="route('logout')"
                onclick="event.preventDefault();
                            this.closest('form').submit();">
            {{ __('Log Out') }}
        </a>
    </form>
    <hr class="mt-3" style="opacity: .3">
    <p class="" style="font-size: 14px">&copy; Copyright 2024 Prasetya. All rights reserved.  The Prasetya is not responsible for the content of external sites.</p>
</div>