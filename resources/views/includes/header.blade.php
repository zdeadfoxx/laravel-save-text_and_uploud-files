<header class="header">
    <div class="container">
        <nav class="navbar navbar-expand-lg navbar-light display-7">
            <div class="container-fluid">
              <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav justify-content-between">
                  @if(Auth::user() )
                  <li class="nav-item">
                    <a class="nav-link active" aria-current="page" href="{{ Route('file.index') }}">Файлы</a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link" href="{{ Route('text.index') }}">Текст</a>
                  </li>
                  @endif
                  @guest
                    {{-- @if (Route::has('login'))
                        <li class="nav-item">
                            <a class="nav-link nav-item navbar__nav-item hover text-left" href="{{ route('login') }}">{{ __('Войти') }}</a>
                        </li>
                    @endif --}}
                    @else
                    <li class="nav-item dropdown">
                        <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                            {{ Auth::user()->email }}

                        </a>
                        <p class="nav-item navbar__nav-item role__header">{{ Auth::user()->role }}</p>
                        <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                            <a class="dropdown-item" href="{{ route('logout') }}"
                            onclick="event.preventDefault();
                                            document.getElementById('logout-form').submit();">
                                {{ __('Выйти') }}
                            </a>

                            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                @csrf
                            </form>
                        </div>
                    </li>
                    @endguest

                </ul>
              </div>
            </div>
          </nav>
    </div>
</header>
