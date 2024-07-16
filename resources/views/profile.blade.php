@extends('layouts.main')
@section('content')
<div class="container mt-2">
    <div class="row justify-content-center">
        <div class="card text-bg-dark">
            <img src="/images/carousel3.jpg" class="card-img" alt="..." style="height: 200px; object-fit:cover; opacity:.2">
            <div class="card-img-overlay text-center">
            <h1 class="card-title" style="margin-top: 0.7vw; font-size:7vw">{{ __('static_text.profile.title') }}</h1>
            </div>
        </div>
        <div class="container mt-2" style="margin-left:20vw; margin-right:20vw">
            <div class="row justify-content-center">
                <div class="col-sm-4">
                    <h3 class="text-center">{{ __('static_text.profile.profile_title') }}</h3>
                    <div class="card mb-3">
                        <div class="card-body">
                          <h5 class="card-title">{{ __('static_text.profile.username') }} {{ Auth::user()->username }}</h5>
                          <p class="card-text">{{ __('static_text.profile.email') }} {{ Auth::user()->email }}</p>
                          <p class="card-text">{{ __('static_text.profile.phone') }} {{ Auth::user()->phone }}</p>
                          <p class="card-text">{{ __('static_text.profile.address') }} {{ Auth::user()->address }}</p>
                        </div>
                      </div>
                </div>
                <div class="col-sm-6">
                    @if (Auth::user()->role == 'member')
                        <h3 class="text-center">{{ __('static_text.profile.transaction_title') }}</h3>
                        @forelse ($transactions as $transaction)
                            <div class="card mb-3">
                                <div class="card-body">
                                    <h5 class="card-title">{{ __('static_text.profile.date') }} {{ $transaction->date }}</h5>
                                    @foreach ($transaction->transaction_details as $details)
                                        <p class="card-text">{{ $details->laptop->brand->name }} {{ $details->laptop->type }} {{ $details->laptop->model }}</p>
                                    @endforeach
                                    <h5 class="card-text">{{ __('static_text.profile.quantity') }} {{ $transaction->total_quantity }} {{ __('static_text.profile.items') }} {{ __('static_text.profile.price') }} {{ $transaction->total_price }}</h5>
                                </div>
                            </div>
                        @empty
                            <div class="card mb-3">
                                <div class="card-body">
                                <h5 class="card-title">{{ __('static_text.profile.empty') }}</h5>
                                </div>
                            </div>
                        @endforelse
                    @else
                        <h3 class="text-center">{{ __('static_text.profile.admin_title') }}</h3>
                        <div class="card mb-3 text-center">
                            <div class="card-body">
                                @if (Session::has('admin_privileges'))
                                    <h4 class="card-title">{{ __('static_text.profile.welcome') }} {{ Session::get('admin_privileges') }}</h4>
                                    <div class="container text-center">
                                        <div class="row row-cols-2 mt-3">
                                          <div class="col">
                                            <a href="/addbrand" class="btn btn-success" style="width:15vw">{{ __('static_text.profile.add_brand') }}</a>
                                          </div>
                                          <div class="col">
                                            <a href="/editbrand" class="btn btn-danger" style="width:15vw">{{ __('static_text.profile.edit_brand') }}</a>
                                          </div>
                                        </div>
                                        <div class="row row-cols-2 mt-3">
                                            <div class="col">
                                                <a href="/addproduct" class="btn btn-success" style="width:15vw">{{ __('static_text.profile.add_product') }}</a>
                                              </div>
                                              <div class="col">
                                                <a href="/editproduct" class="btn btn-danger" style="width:15vw">{{ __('static_text.profile.edit_product') }}</a>
                                              </div>
                                        </div>
                                      </div>
                                    <a href="/exitadmin" class="btn btn-primary mt-3">{{ __('static_text.profile.exit') }}</a>
                                @else
                                    <a href="/accessadmin" class="btn btn-primary">{{ __('static_text.profile.enter') }}</a>
                                @endif
                            </div>
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
