@extends('layouts.main')
@section('content')
<div class="container mt-2">
    <div class="row justify-content-center">
        <div class="card text-bg-dark">
            <img src="/images/carousel3.jpg" class="card-img" alt="..." style="height: 200px; object-fit:cover; opacity:.2">
            <div class="card-img-overlay text-center">
            <h1 class="card-title" style="margin-top: 0.7vw; font-size:7vw">{{ __('static_text.cart.title') }}</h1>
            </div>
        </div>
        <div class="container mt-2" style="margin-left:20vw; margin-right:20vw">
            <div class="row justify-content-center">
                <div class="col-sm-6">
                    <h3 class="text-center">{{ __('static_text.cart.cart_title') }}</h3>
                    @forelse ($carts as $cart)
                        <div class="card mb-3">
                            <div class="row g-0">
                            <div class="col-md-4">
                                <img src="/images/{{ $cart->laptop->image }}" class="img-fluid rounded-start" alt="..." style="max-height: 7vw">
                            </div>
                            <div class="col-md-8">
                                <div class="card-body">
                                    <h5 class="card-title">{{ $cart->laptop->brand->name }} {{ $cart->laptop->type }} {{ $cart->laptop->model }}</h5>
                                    <a href="/deletefromcart/{{ $cart->id }}" class="btn btn-danger">{{ __('static_text.cart.remove') }}</a>
                                </div>
                            </div>
                            </div>
                        </div>
                    @empty
                        <div class="card mb-3">
                            <div class="card-body">
                            <h5 class="card-title">{{ __('static_text.cart.cart_empty') }}</h5>
                            </div>
                        </div>
                    @endforelse
                </div>
                <div class="col-sm-4">
                    <h3 class="text-center">{{ __('static_text.cart.checkout_title') }}</h3>
                    @if (!$carts->isEmpty())
                        <div class="card mb-3">
                            <div class="card-body">
                            <h5 class="card-title">{{ __('static_text.cart.quantity') }} {{ $total_quantity }}</h5>
                            <h5 class="card-title">{{ __('static_text.cart.price') }} {{ $total_price }}</h5>
                            <a href="/checkout" class="btn btn-primary">{{ __('static_text.cart.checkout') }}</a>
                            </div>
                        </div>
                    @else
                        <div class="card mb-3">
                            <div class="card-body">
                            <h5 class="card-title">{{ __('static_text.cart.checkout_empty') }}</h5>
                            </div>
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
