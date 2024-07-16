@extends('layouts.main')
@section('content')
<div class="container mt-2">
    <div class="row justify-content-center">
        <div class="card text-bg-dark">
            <img src="/images/carousel3.jpg" class="card-img" alt="..." style="height: 200px; object-fit:cover; opacity:.2">
            <div class="card-img-overlay text-center">
              <h1 class="card-title" style="margin-top: 0.7vw; font-size:7vw">{{ __('static_text.admin_product.title') }}</h1>
            </div>
        </div>
        <div class="container text-center mt-3">
            <div class="row row-cols-3">
                @foreach ($laptops as $laptop)
                    <div class="card">
                        <img src="/images/{{ $laptop->image }}" class="card-img-top" alt="..." style="height: 200px; object-fit:contain">
                        <div class="card-body">
                            <h5 class="card-title">{{ $laptop->brand->name }} {{ $laptop->type }} {{ $laptop->model }}</h5>
                            <p class="card-text">{{ 'Rp. '.$laptop->price }}</p>
                            <div class="card-footer">
                                <div class="container text-center">
                                    <div class="row">
                                      <div class="col">
                                        <a href="/editproduct/{{ $laptop->id }}" class="btn btn-primary">{{ __('static_text.admin_product.edit') }}</a>
                                      </div>
                                      <div class="col">
                                        <a href="/deleteproduct/{{ $laptop->id }}" class="btn btn-danger">{{ __('static_text.admin_product.delete') }}</a>
                                      </div>
                                    </div>
                                  </div>
                              </div>
                        </div>
                    </div>
                @endforeach
            </div>
            <div style="display:flex; justify-content:center">
                <nav aria-label="..." style="margin-top:1vw; margin:bottom:1vw">
                    <ul class="pagination">
                      <li class="page-item">
                        <a class="page-link" href="{{ $laptops->previousPageUrl() }}">{{ __('pagination.previous') }}</a>
                      </li>
                      @for ($i = 1; $i <= $laptops->lastPage(); $i++)
                        @if ($i == $laptops->currentPage())
                            <li class="page-item active" aria-current="page">
                                <a class="page-link" href="{{ $laptops->url($i) }}">{{ $i }}</a>
                            </li>
                        @else
                            <li class="page-item"><a class="page-link" href="{{ $laptops->url($i) }}">{{ $i }}</a></li>
                        @endif
                      @endfor
                      <li class="page-item">
                        <a class="page-link" href="{{ $laptops->nextPageUrl() }}">{{ __('pagination.next') }}</a>
                      </li>
                    </ul>
                  </nav>
            </div>
          </div>
    </div>
</div>
@endsection
