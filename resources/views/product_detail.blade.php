@extends('layouts.main')
@section('content')
<div class="container mt-2">
    <div class="row justify-content-center">
        <div class="card text-bg-dark">
            <img src="/images/carousel3.jpg" class="card-img" alt="..." style="height: 200px; object-fit:cover; opacity:.2">
            <div class="card-img-overlay text-center">
              <h1 class="card-title" style="margin-top: 3vw; font-size:3vw">{{ $laptop->brand->name }} {{ $laptop->type }} {{ $laptop->model }}</h1>
            </div>
        </div>
    </div>
    <div class="card mb-3 mt-3" style="margin-left: 10vw; margin-right: 10vw">
        <div class="row g-0">
          <div class="col-md-6">
            <a href="{{ url()->previous() }}" class="btn btn-primary" style="">{{ __('static_text.product_detail.back') }}</a>
            <img src="/images/{{ $laptop->image }}" class="img-fluid rounded-start" alt="..." style="max-width:35vw">
          </div>
          <div class="col-md-6">
            <div class="card-body" style="">
              <h5 class="card-title">{{ __('static_text.product_detail.processor') }} {{ $laptop->processor }}</h5>
              <br>
              <h5 class="card-title">{{ __('static_text.product_detail.ram') }} {{ $laptop->ram }} GB</h5>
              <br>
              <h5 class="card-title">{{ __('static_text.product_detail.storage') }} {{ $laptop->storage }} GB</h5>
              <br>
              <h5 class="card-title">{{ __('static_text.product_detail.price') }} {{ $laptop->price }}</h5>
              <br>
              @if (Auth::check() and Auth::user()->role == 'member')
                <form class="d-flex" enctype="multipart/form-data" action="/addtocart/{{ $laptop->id }}" method="POST">
                    @csrf
                    <button class="btn btn-success" type="submit" style="width:28vw">{{ __('static_text.product_detail.add') }}</button>
                </form>
              @endif
            </div>
          </div>
        </div>
      </div>
</div>
@endsection
