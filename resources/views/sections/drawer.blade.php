{{--Valid User View--}}
@auth
    <md-toolbar class="md-dense md-accent" md-elevation="0">
        <h3 class="md-title">{{ Auth::user()->name }}</h3>
        <div class="ml-1">({{ Auth::user()->account }})</div>
    </md-toolbar>

    <md-list>

        @account('donor')
        <md-list-item
            href="{{ route('donate.create') }}"
        >
            <md-icon md-src="{{ asset('svg/gift-outline.svg') }}"></md-icon>
            <span class="md-list-item-text">
                Donate
            </span>
        </md-list-item>
        @endaccount

        @account('requester')
        <md-list-item
            href="{{ route('request.index') }}"
        >
            <md-icon md-src="{{ asset('svg/cart-outline.svg') }}"></md-icon>
            <span class="md-list-item-text">
                Request
            </span>
        </md-list-item>
        @endaccount

        <md-list-item
            href="{{ route('profile') }}"
        >
            <md-icon>person</md-icon>
            <span class="md-list-item-text">
                Profile
            </span>
        </md-list-item>

        <md-list-item
            onclick="document.getElementById('logout-form').submit();"
        >
            <md-icon>exit_to_app</md-icon>
            <span class="md-list-item-text">
                {{ __('Logout') }}
            </span>
        </md-list-item>
    </md-list>


    {{--Forms to Submit--}}
    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
        @csrf
    </form>
@endauth


{{--Guest View--}}
@guest
    <md-toolbar class="md-dense md-accent" md-elevation="0">
        <h3 class="md-title">Guest</h3>
    </md-toolbar>

    <md-list>
        <md-list-item
            onclick="document.getElementById('login-form').submit();"
        >
            <md-icon>get_app</md-icon>
            <a class="md-list-item-text" href="{{ route('login') }}">
                {{ __('Login') }}
            </a>
        </md-list-item>

        @if (Route::has('register'))
        <md-list-item
            onclick="document.getElementById('register-form').submit();"
        >
            <md-icon>person_add</md-icon>
            <a class="md-list-item-text" href="{{ route('register') }}">
                {{ __('Register') }}
            </a>
        </md-list-item>
        @endif
    </md-list>

    {{--Forms to Submit--}}
    <form id="login-form" action="{{ route('login') }}" method="GET" style="display: none;">
        @csrf
    </form>
    <form id="register-form" action="{{ route('register') }}" method="GET" style="display: none;">
        @csrf
    </form>
@endguest
