@extends('layouts.main')
@section('content')
<div class="container mt-2">
    <div class="row justify-content-center">
        <div class="card text-bg-dark">
            <img src="/images/carousel3.jpg" class="card-img" alt="..." style="height: 200px; object-fit:cover; opacity:.2">
            <div class="card-img-overlay text-center">
              <h1 class="card-title" style="margin-top: 0.7vw; font-size:7vw">{{ __('static_text.products') }}</h1>
            </div>
        </div>
        @include('layouts.view_laptops')
    </div>
</div>
@endsection
