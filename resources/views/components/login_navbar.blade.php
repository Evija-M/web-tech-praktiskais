<nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm">
    <div class="container">
        <a class="navbar-brand" href="{{ url('/') }}">
            {{ __('messages.Music website') }}
        </a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <!-- Left Side Of Navbar -->
            <ul class="navbar-nav mr-auto">
                <ul class="navbar-nav me-auto mb-2 mb-md-0">
                    <li class="nav-item">
                      <a class="nav-link active" aria-current="page" href="{{url('/')}}">{{ __('messages.Home') }}</a>
                    </li>
                    <li class="nav-item">
                      <a class="nav-link" aria-current="page" href="{{ url('artists')}}">{{ __('messages.Artists') }}</a>
                    </li>
                    <li class="nav-item">
                      <a class="nav-link" aria-current="page" href="{{ url('albums')}}">{{ __('messages.Albums') }}</a>
                    </li>
                    <li class="nav-item">
                      <a class="nav-link" aria-current="page" href="{{ url('songs')}}">{{ __('messages.Songs') }}</a>
                    </li>
                    <li class="nav-item">
                      <a class="nav-link" aria-current="page" href="{{ url('genres')}}">{{ __('messages.Genres') }}</a>
                    </li>
                  </ul>
            </ul>

            <!-- Right Side Of Navbar -->
            <ul class="navbar-nav ml-auto">
              
              <li>
                  <div class="hidden fixed top-0 right-0 px-6 py-4 sm:block">
                      <a href="{{ url('lang/lv') }}" class="ml-4 text-sm text-gray-700 underline">LV</a>
                      <a href="{{ url('lang/en') }}" class="ml-4 text-sm text-gray-700 underline">EN</a>
                  </div>

              </li>
              
                <!-- Authentication Links -->
                
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                        </li>
                  

                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                        </li>
            </ul>
        </div>
    </div>
</nav>