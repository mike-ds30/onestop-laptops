<div class="container text-center mt-3">
    <div class="row">
        <div class="col-sm-3">
            <form action="">
                <div class="card" style="width: 18rem;">
                    <div class="card-header">
                      {{ __('static_text.view_laptops.title') }}
                    </div>
                    <ul class="list-group list-group-flush">
                        <li class="list-group-item">
                            <label for="search">{{ __('static_text.view_laptops.search') }}</label>
                            <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search" name="search" id="search">
                        </li>
                        <li class="list-group-item">
                            <label for="ram">{{ __('static_text.view_laptops.ram') }}</label>
                            <input class="form-control me-2" type="number" placeholder="Minimum RAM" aria-label="Minimum RAM" name="ram" id="ram">
                            @if($errors->has('ram'))
                                <div class="error">{{ $errors->first('ram') }}</div>
                            @endif
                        </li>
                        <li class="list-group-item">
                            <label for="storage">{{ __('static_text.view_laptops.storage') }}</label>
                            <input class="form-control me-2" type="number" placeholder="Minimum Storage" aria-label="Minimum Storage" name="storage" id="storage">
                            @if($errors->has('storage'))
                                <div class="error">{{ $errors->first('storage') }}</div>
                            @endif
                        </li>
                        <li class="list-group-item">
                            <label for="price">{{ __('static_text.view_laptops.price') }}</label>
                            <input class="form-control me-2" type="number" placeholder="Maximum Price" aria-label="Maximum Price" name="price" id="price">
                            @if($errors->has('price'))
                                <div class="error">{{ $errors->first('price') }}</div>
                            @endif
                        </li>
                    </ul>
                    <div class="card-footer">
                        <button class="btn btn-outline-success" type="submit">{{ __('static_text.view_laptops.filter') }}</button>
                    </div>
                  </div>
            </form>
        </div>
        <div class="col-sm-9">
            <div class="row row-cols-3">
                @foreach ($laptops as $laptop)
                    <div class="card" style="width: 20.5rem;">
                        <img src="/images/{{ $laptop->image }}" class="card-img-top" alt="..." style="height: 200px; object-fit:contain">
                        <div class="card-body">
                            <h5 class="card-title">{{ $laptop->brand->name }} {{ $laptop->type }} {{ $laptop->model }}</h5>
                            <p class="card-text">{{ 'Rp. '.$laptop->price }}</p>
                            <a href="/products/{{ $laptop->id }}" class="btn btn-primary">{{ __('static_text.view_laptops.view') }}</a>
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
