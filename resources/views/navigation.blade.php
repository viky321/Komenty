<nav class="navigation has-text-grey" role="navigation" arta-label="main navigation">



{{--login, register link--}}

    @guest

            <a href="{{ route('login') }}">login</a>


            @if (Route::has('register'))
                <a href="{{ route('register') }}">register</a>
            @endif

    @endguest



    @auth

    {{--login--}}

        <a href="/users{{ auth()->user()->slug}}">
        @<strong {{ auth()->user()->name}}></strong>
        </a>

        {{--logout--}}

        <a href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
            logout
        </a>

        <form id="logout-form" action="{{ route('logout') }}" method="POST">
            @csrf
        </form>

    @endauth



</nav>
