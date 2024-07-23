
<nav class="navbar navbar-expand-lg navbar-dark navbar-95">
    <a class="navbar-brand" href="{{route("root")}}"><img id="gs-logo" src="{{asset('img/logo.png')}}" alt="Grassstation Brand Logo"></a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav"
        aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse justify-content-between" id="navbarNav">
        <ul class="navbar-nav">
            <!-- Main Menu Link -->
            <li class="nav-item">
                <a class="nav-link" href="{{route('menu')}}">Menu</a>
            </li>
            <li><a class="nav-link" href="https://order.grassstation.xyz/pickup" target="_blank" rel="noopener noreferrer">Order</a></li>
        </ul>
        <ul class="navbar-nav">
            <!-- Microsite Dropdown -->
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button"
                    data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    สาขาต่างๆ
                </a>
                <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                    <!-- K4 Branch Link -->
                    <a class="dropdown-item" href="https://k4.grassstation.xyz">สาขาคลองสี่</a>
                    <a class="dropdown-item" href="https://galactichigh.grassstation.xyz/">สาขามหาวิทยาลัยรังสิต (Galactic High &times; Grassstation)</a>
                    <!-- Add more microsite links if needed -->
                </div>
            </li>
            @guest
            <li><a class="nav-link" href="https://order.grassstation.xyz/pickup" target="_blank" rel="noopener noreferrer">ฝ่ายจัดซื้อ</a></li>
                    {{-- @if (Route::has('login'))
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                        </li>
                    @endif
 --}}
                    @if (Route::has('members'))
                        <li class="nav-item">
                            <a class="nav-link" href="https://members.grassstation.xyz">ระบบสมาชิก</a>
                        </li>
                    @endif

                    @else
                    <li class="nav-item dropdown">
                        <a id="navbarDropdown2" class="nav-link dropdown-toggle" href="#" role="button"
                        data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            {{ Auth::user()->name }}
                        </a>

                        <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown2">
                            <a class="dropdown-item" href="{{route("home")}}">Admin Panel</a>
                            <a class="dropdown-item" href="{{ route('logout') }}"
                                onclick="event.preventDefault();
                                            document.getElementById('logout-form').submit();">
                                {{ __('Logout') }}
                            </a>

                            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                @csrf
                            </form>
                        </div>
                    </li>
                @endguest
        </ul>
    </div>
</nav>
