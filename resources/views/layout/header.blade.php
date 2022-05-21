@php
  $language = Session::get('localization');
  $change = $language == 'en' ? 'id' : 'en';
@endphp

<header>
    <nav class="bg-apps container-fluid text-center">
        <div class="container-fluid row p-4">
          <div class="col-sm-4"></div>
          <div class="col-sm-4">
            <a href="/" class="text-reset text-decoration-none"><span class="mx-auto fs-1 fw-bold">Amazing E-Book</span></a>
          </div>
          <div class="col-sm-4 mt-3 mt-sm-0">
              <a href="{{ route('lang', ['id' => $change]) }}" class="btn btn-warning">@lang('lang.change')</a>
            @auth
              <a href="{{ route('logout') }}" class="btn btn-warning">@lang('lang.logout')</a>
            @else
              <a href="{{ route('signup.index') }}" class="btn btn-warning">@lang('lang.signup')</a>
              <a href="{{ route('login.index') }}" class="btn btn-warning">@lang('lang.log_in')</a>
            @endauth
          </div>
        </div>
    </nav>

    @auth  
      <nav class="navbar navbar-expand-sm navbar-primary bg-warning ">
        <div class="container-fluid">
          <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>
          <div class="collapse navbar-collapse" id="navbarNavDropdown">
            <ul class="navbar-nav mx-auto fw-bold">
              <li class="nav-item">
                <a class="nav-link text-reset active" aria-current="page" href="{{route('home')}}">@lang('lang.home')</a>
              </li>
              <li class="nav-item">
                <a class="nav-link text-reset" href="{{route('cart.index')}}">@lang('lang.cart')</a>
              </li>
              <li class="nav-item">
                <a class="nav-link text-reset" href="{{route('profile.index')}}">@lang('lang.profile')</a>
              </li>
              @if(Auth::user()->role->role_desc == "Admin")
                <li class="nav-item">
                  <a class="nav-link text-reset" href="{{route('maintenance.index')}}">@lang('lang.account_maintenance')</a>
                </li>                                           
              @endif
            </ul>
          </div>
        </div>
      </nav>
    @endauth
</header>