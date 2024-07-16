@extends('layouts.main')
@section('content')
<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('static_text.edit_product.title') }} {{ $laptop->brand->name }} {{ $laptop->type }} {{ $laptop->model }} {{ __('static_text.edit_product.unedited') }}</div>
                <div class="card-body">
                    <form enctype="multipart/form-data" action="/editproduct/{{ $laptop->id }}" method="POST">
                        @csrf
                        <div class="row mb-3">
                            <label for="brand" class="col-md-4 col-form-label text-md-right">{{ __('static_text.edit_product.brand') }}</label>
                            <div class="col-md-6">
                                <select name="brand" id="brand" class="form-control">
                                    <option value=""></option>
                                    @foreach ($brands as $brand)
                                        <option value="{{ $brand->name }}">{{ $brand->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label for="type" class="col-md-4 col-form-label text-md-right">{{ __('static_text.edit_product.type') }}</label>
                            <div class="col-md-6">
                                <input class="form-control" type="text" name="type" id="type" placeholder="Minimum 3 characters">
                                @if($errors->has('type'))
                                    <div class="error">{{ $errors->first('type') }}</div>
                                @endif
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label for="model" class="col-md-4 col-form-label text-md-right">{{ __('static_text.edit_product.model') }}</label>
                            <div class="col-md-6">
                                <input class="form-control" type="text" name="model" id="model" placeholder="Minimum 3 characters">
                                @if($errors->has('model'))
                                    <div class="error">{{ $errors->first('model') }}</div>
                                @endif
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label for="processor" class="col-md-4 col-form-label text-md-right">{{ __('static_text.edit_product.processor') }}</label>
                            <div class="col-md-6">
                                <input class="form-control" type="text" name="processor" id="processor" placeholder="Minimum 3 characters">
                                @if($errors->has('processor'))
                                    <div class="error">{{ $errors->first('processor') }}</div>
                                @endif
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label for="ram" class="col-md-4 col-form-label text-md-right">{{ __('static_text.edit_product.ram') }}</label>
                            <div class="col-md-6">
                                <input class="form-control" type="number" name="ram" id="ram" placeholder="Minimum 1 GB">
                                @if($errors->has('ram'))
                                    <div class="error">{{ $errors->first('ram') }}</div>
                                @endif
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label for="storage" class="col-md-4 col-form-label text-md-right">{{ __('static_text.edit_product.storage') }}</label>
                            <div class="col-md-6">
                                <input class="form-control" type="number" name="storage" id="storage" placeholder="Minimum 1 GB">
                                @if($errors->has('storage'))
                                    <div class="error">{{ $errors->first('storage') }}</div>
                                @endif
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label for="price" class="col-md-4 col-form-label text-md-right">{{ __('static_text.edit_product.price') }}</label>
                            <div class="col-md-6">
                                <input class="form-control" type="number" name="price" id="price" placeholder="Minimum Rp. 1">
                                @if($errors->has('price'))
                                    <div class="error">{{ $errors->first('price') }}</div>
                                @endif
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label for="image" class="col-md-4 col-form-label text-md-right">{{ __('static_text.edit_product.image') }}</label>
                            <div class="col-md-6">
                                <input class="form-control" type="file" name="image" id="image">
                                @if($errors->has('image'))
                                    <div class="error">{{ $errors->first('image') }}</div>
                                @endif
                            </div>
                        </div>
                        <div class="row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">{{ __('static_text.edit_product.update') }}</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
