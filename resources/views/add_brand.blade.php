@extends('layouts.main')
@section('content')
<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('static_text.add_brand.title') }}</div>
                <div class="card-body">
                    <form enctype="multipart/form-data" action="/addbrand" method="POST">
                        @csrf
                        <div class="row mb-3">
                            <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('static_text.add_brand.name') }}</label>
                            <div class="col-md-6">
                                <input class="form-control" type="text" name="name" id="name" placeholder="Minimum 1 characters">
                                @if($errors->has('name'))
                                    <div class="error">{{ $errors->first('name') }}</div>
                                @endif
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label for="description" class="col-md-4 col-form-label text-md-right">{{ __('static_text.add_brand.description') }}</label>
                            <div class="col-md-6">
                                <input class="form-control" type="text" name="description" id="description" placeholder="Minimum 5 characters">
                                @if($errors->has('description'))
                                    <div class="error">{{ $errors->first('description') }}</div>
                                @endif
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label for="logo" class="col-md-4 col-form-label text-md-right">{{ __('static_text.add_brand.logo') }}</label>
                            <div class="col-md-6">
                                <input class="form-control" type="file" name="logo" id="logo">
                                @if($errors->has('logo'))
                                    <div class="error">{{ $errors->first('logo') }}</div>
                                @endif
                            </div>
                        </div>
                        <div class="row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">{{ __('static_text.add_brand.add') }}</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
