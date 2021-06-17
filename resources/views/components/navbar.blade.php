<nav class="navbar navbar-expand-md navbar-dark bg-dark mb-4">
    <div class="container-fluid">
      <a class="navbar-brand" href="{{ url('/') }}">
        {{ config('app.name', 'Music site') }}
      </a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarCollapse">
        <ul class="navbar-nav me-auto mb-2 mb-md-0">
          <li class="nav-item">
            <a class="nav-link active" aria-current="page" href="{{url('home')}}">{{ __('messages.Home') }}</a>
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

        <div class="hidden fixed top-0 right-0 px-6 py-4 sm:block">
          <a href="{{ url('lang/lv') }}" class="ml-4 text-sm text-gray-700 underline">LV</a>
          <a href="{{ url('lang/en') }}" class="ml-4 text-sm text-gray-700 underline">EN</a>
      </div>
        <form method="POST" action="{{ route('logout') }} " class="navbar-nav ml-auto">
          @csrf

          <button type="button" class="btn btn-primary" :href="route('logout')"
                  onclick="event.preventDefault();
                              this.closest('form').submit();">
              {{ __('Log out') }}
        </button>
      </form>
      </div>
    </div>
  </nav>