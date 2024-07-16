@extends('layouts.main')
@section('content')
<div class="container mt-2">
    <div class="row justify-content-center">
        <div class="card text-bg-dark">
            <img src="/images/carousel3.jpg" class="card-img" alt="..." style="height: 200px; object-fit:cover; opacity:.2">
            <div class="card-img-overlay text-center">
              <h1 class="card-title" style="margin-top: 0.7vw; font-size:7vw">{{ __('static_text.home.title') }}</h1>
            </div>
          </div>
        <div class="container text-center mt-3">
            <div class="row">
              <div class="col">
                <div id="imgcarousel" class="carousel slide" data-bs-ride="carousel">
                    <div class="carousel-inner">
                      <div class="carousel-item active">
                        <img src="/images/carousel1.jpg" class="d-block w-100" alt="..." style="max-height: 350px">
                      </div>
                      <div class="carousel-item">
                        <img src="/images/carousel2.jpg" class="d-block w-100" alt="..." style="max-height: 350px">
                      </div>
                      <div class="carousel-item">
                        <img src="/images/carousel3.jpg" class="d-block w-100" alt="..." style="max-height: 350px">
                      </div>
                    </div>
                    <button class="carousel-control-prev" type="button" data-bs-target="#imgcarousel" data-bs-slide="prev">
                      <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                      <span class="visually-hidden">{{ __('pagination.previous') }}</span>
                    </button>
                    <button class="carousel-control-next" type="button" data-bs-target="#imgcarousel" data-bs-slide="next">
                      <span class="carousel-control-next-icon" aria-hidden="true"></span>
                      <span class="visually-hidden">{{ __('pagination.next') }}</span>
                    </button>
                  </div>
              </div>
              <div class="col">
                <h3 style="margin-top: 7vw">{{ __('static_text.home.subtitle') }}</h3>
                <p>{{ __('static_text.home.text') }}</p>
              </div>
        </div>
        <div class="container text-center mt-4 mb-5">
            <div class="row">
              <div class="col justify-content-center">
                <h3>{{ __('static_text.home.brands') }}</h3>
                <div id="brandcarousel" class="carousel slide" data-bs-ride="carousel">
                    <div class="carousel-inner">
                      <div class="carousel-item active">
                        <div class="card">
                            <img src="/images/{{ $brand1->logo }}" class="card-img-top" alt="..." style="max-height: 100px; object-fit:contain">
                            <div class="card-body">
                              <h5 class="card-title">{{ $brand1->name }}</h5>
                              <a href="/brands/{{ $brand1->id }}" class="btn btn-primary">{{ __('static_text.home.view') }} {{ $brand1->name }}{{ __('static_text.home.products') }}</a>
                            </div>
                          </div>
                      </div>
                      <div class="carousel-item">
                        <div class="card">
                            <img src="/images/{{ $brand2->logo }}" class="card-img-top" alt="..." style="max-height: 100px; object-fit:contain">
                            <div class="card-body">
                              <h5 class="card-title">{{ $brand2->name }}</h5>
                              <a href="/brands/{{ $brand2->id }}" class="btn btn-primary">{{ __('static_text.home.view') }} {{ $brand2->name }}{{ __('static_text.home.products') }}</a>
                            </div>
                          </div>
                      </div>
                      <div class="carousel-item">
                        <div class="card">
                            <img src="/images/{{ $brand3->logo }}" class="card-img-top" alt="..." style="max-height: 100px; object-fit:contain">
                            <div class="card-body">
                              <h5 class="card-title">{{ $brand3->name }}</h5>
                              <a href="/brands/{{ $brand3->id }}" class="btn btn-primary">{{ __('static_text.home.view') }} {{ $brand3->name }}{{ __('static_text.home.products') }}</a>
                            </div>
                          </div>
                      </div>
                      <div class="carousel-item">
                        <div class="card">
                            <img src="/images/{{ $brand4->logo }}" class="card-img-top" alt="..." style="max-height: 100px; object-fit:contain">
                            <div class="card-body">
                              <h5 class="card-title">{{ $brand4->name }}</h5>
                              <a href="/brands/{{ $brand4->id }}" class="btn btn-primary">{{ __('static_text.home.view') }} {{ $brand4->name }}{{ __('static_text.home.products') }}</a>
                            </div>
                          </div>
                      </div>
                    </div>
                    <button class="carousel-control-prev" type="button" data-bs-target="#brandcarousel" data-bs-slide="prev">
                      <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                      <span class="visually-hidden">{{ __('pagination.previous') }}</span>
                    </button>
                    <button class="carousel-control-next" type="button" data-bs-target="#brandcarousel" data-bs-slide="next">
                      <span class="carousel-control-next-icon" aria-hidden="true"></span>
                      <span class="visually-hidden">{{ __('pagination.next') }}</span>
                    </button>
                  </div>
              </div>
              <div class="col justify-content-center">
                <h3>{{ __('static_text.home.laptops') }}</h3>
                <div id="laptopcarousel" class="carousel slide" data-bs-ride="carousel">
                    <div class="carousel-inner">
                      <div class="carousel-item active">
                        <div class="card">
                            <img src="/images/{{ $laptop1->image }}" class="card-img-top" alt="..." style="max-height: 100px; object-fit:contain">
                            <div class="card-body">
                              <h5 class="card-title">{{ $laptop1->brand->name }} {{ $laptop1->type }} {{ $laptop1->model }}</h5>
                              <a href="/products/{{ $laptop1->id }}" class="btn btn-primary">{{ __('static_text.home.view_product') }}</a>
                            </div>
                          </div>
                      </div>
                      <div class="carousel-item">
                        <div class="card">
                            <img src="/images/{{ $laptop2->image }}" class="card-img-top" alt="..." style="max-height: 100px; object-fit:contain">
                            <div class="card-body">
                              <h5 class="card-title">{{ $laptop2->brand->name }} {{ $laptop2->type }} {{ $laptop2->model }}</h5>
                              <a href="/products/{{ $laptop2->id }}" class="btn btn-primary">{{ __('static_text.home.view_product') }}</a>
                            </div>
                          </div>
                      </div>
                      <div class="carousel-item">
                        <div class="card">
                            <img src="/images/{{ $laptop3->image }}" class="card-img-top" alt="..." style="max-height: 100px; object-fit:contain">
                            <div class="card-body">
                              <h5 class="card-title">{{ $laptop3->brand->name }} {{ $laptop3->type }} {{ $laptop3->model }}</h5>
                              <a href="/products/{{ $laptop3->id }}" class="btn btn-primary">{{ __('static_text.home.view_product') }}</a>
                            </div>
                          </div>
                      </div>
                      <div class="carousel-item">
                        <div class="card">
                            <img src="/images/{{ $laptop4->image }}" class="card-img-top" alt="..." style="max-height: 100px; object-fit:contain">
                            <div class="card-body">
                              <h5 class="card-title">{{ $laptop4->brand->name }} {{ $laptop4->type }} {{ $laptop4->model }}</h5>
                              <a href="/products/{{ $laptop4->id }}" class="btn btn-primary">{{ __('static_text.home.view_product') }}</a>
                            </div>
                          </div>
                      </div>
                    </div>
                    <button class="carousel-control-prev" type="button" data-bs-target="#laptopcarousel" data-bs-slide="prev">
                      <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                      <span class="visually-hidden">{{ __('pagination.previous') }}</span>
                    </button>
                    <button class="carousel-control-next" type="button" data-bs-target="#laptopcarousel" data-bs-slide="next">
                      <span class="carousel-control-next-icon" aria-hidden="true"></span>
                      <span class="visually-hidden">{{ __('pagination.next') }}</span>
                    </button>
                  </div>
              </div>
        </div>
    </div>
</div>
@endsection
