@extends('layouts.main')
@section('content')
<div class="container mt-2">
    <div class="row justify-content-center">
        <div class="card text-bg-dark">
            <img src="/images/carousel3.jpg" class="card-img" alt="..." style="height: 200px; object-fit:cover; opacity:.2">
            <div class="card-img-overlay text-center">
              <h1 class="card-title" style="margin-top: 0.7vw; font-size:7vw">{{ __('static_text.admin_brand.title') }}</h1>
            </div>
        </div>
        <div class="container text-center mt-3">
            <div class="row row-cols-3">
                @foreach ($brands as $brand)
                    <div class="col mb-2">
                        <div class="card" style="height:23rem">
                            <img src="/images/{{ $brand->logo }}" class="card-img-top" alt="..." style="height: 100px; object-fit:contain">
                            <div class="card-body">
                            <h5 class="card-title">{{ $brand->name }}</h5>
                            <p class="card-text">{{ $brand->description }}</p>
                            </div>
                            <div class="card-footer">
                                <div class="container text-center">
                                    <div class="row">
                                      <div class="col">
                                        <a href="/editbrand/{{ $brand->id }}" class="btn btn-primary">{{ __('static_text.admin_brand.edit') }}</a>
                                      </div>
                                      <div class="col">
                                        <a href="/deletebrand/{{ $brand->id }}" class="btn btn-danger">{{ __('static_text.admin_brand.delete') }}</a>
                                      </div>
                                    </div>
                                  </div>
                              </div>
                        </div>
                    </div>
                @endforeach
            </div>
          </div>
    </div>
</div>
@endsection
