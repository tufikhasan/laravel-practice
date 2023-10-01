<nav class="navbar fixed-top px-0 shadow-sm bg-white">
    <div class="container-fluid">

        <a class="navbar-brand" href="javascript:void(0)">
            <span class="icon-nav m-0 h5" onclick="MenuBarClickHandler()">
                <img class="nav-logo-sm mx-2" src="{{ asset('images/menu.svg') }}" alt="logo" />
            </span>
            <img class="nav-logo  mx-2" src="{{ asset('images/logo.png') }}" alt="logo" />
        </a>

        <div class="float-right h-auto d-flex">
            <div class="user-dropdown">
                <img class="icon-nav-img"
                    src="{{ !empty(Auth::user()->image) ? url('upload/profile/' . Auth::user()->image) : url('images/user.webp') }}"
                    alt="" />
                <div class="user-dropdown-content ">
                    <div class="mt-4 text-center">
                        <img class="icon-nav-img"
                            src="{{ !empty(Auth::user()->image) ? url('upload/profile/' . Auth::user()->image) : url('images/user.webp') }}"
                            alt="" />
                        <h6>{{ Auth::user()->username }}</h6>
                        <hr class="user-dropdown-divider  p-0" />
                    </div>
                    <a href="{{ route('profile.edit') }}"
                        class="side-bar-item @if (request()->routeIs('profile.edit')) active @endif">
                        <span class="side-bar-item-caption">Profile</span>
                    </a>
                    <a href="{{ route('change.password') }}"
                        class="side-bar-item @if (request()->routeIs('change.password')) active @endif">
                        <span class="side-bar-item-caption">Change Password</span>
                    </a>
                    <form method="POST" action="{{ route('logout') }}">
                        @csrf
                        <a href="route('logout')" onclick="event.preventDefault();this.closest('form').submit();"
                            class="side-bar-item">
                            <span class="side-bar-item-caption">Logout</span>
                        </a>
                    </form>
                </div>
            </div>
        </div>
    </div>
</nav>
