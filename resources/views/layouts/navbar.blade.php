<nav class="navbar navbar-expand-lg bg-body-tertiary" style="background-color:ghostwhite">
    <div class="container-fluid">
      <a class="navbar-brand"><u>OneStop Laptops</u></a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav me-auto mb-2 mb-lg-0">
          <li class="nav-item">
            <a class="nav-link" href="/">{{ __('static_text.navbar.home') }}</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="/brands">{{ __('static_text.navbar.brand') }}</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="/products">{{ __('static_text.navbar.product') }}</a>
          </li>
          @if (Auth::check() and Auth::user()->role == 'member')
            <li class="nav-item">
                <a class="nav-link" href="/cart">{{ __('static_text.navbar.cart') }}</a>
            </li>
          @endif
        </ul>
        <div class="d-flex">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                @if (Auth::check())
                    <li class="nav-item">
                        <a class="nav-link" href="/profile">{{ __('static_text.navbar.profile') }}</a>
                    </li>
                @endif
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                        {{ __('static_text.navbar.lang') }}
                    </a>
                    <ul class="dropdown-menu">
                        <li><a class="dropdown-item nav-link" href="/changelang/en" onclick="event.preventDefault(); document.getElementById('lang-form-en').submit();">{{ __('static_text.navbar.eng') }}</a>
                            <form id="lang-form-en" action="/changelang/en" method="POST" class="d-none">
                                @csrf
                                <input type="text" name="locale" id="locale" value="en">
                            </form>
                        </li>
                        <li><a class="dropdown-item nav-link" href="/changelang/id" onclick="event.preventDefault(); document.getElementById('lang-form-id').submit();">{{ __('static_text.navbar.id') }}</a>
                            <form id="lang-form-id" action="/changelang/id" method="POST" class="d-none">
                                @csrf
                                <input type="text" name="locale" id="locale" value="id">
                            </form>
                        </li>
                    </ul>
                  </li>
                @if (!Auth::check())
                    <li class="nav-item">
                        <a class="nav-link" href="/login">{{ __('static_text.navbar.login') }}</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="/register">{{ __('static_text.navbar.register') }}</a>
                    </li>
                @endif
                @if (Auth::check())
                    <li class="nav-item">
                        <a class="nav-link" href="/logout" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">{{ __('static_text.navbar.logout') }}</a>
                        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                            @csrf
                        </form>
                    </li>
                @endif
            </ul>
        </div>
      </div>
    </div>
  </nav>
