<aside id="colorlib-aside" role="complementary" class="js-fullheight text-center">
    <h1 id="colorlib-logo">
        <a href="{{ url('/') }}"><span class="flaticon-camera"></span>{{ config('app.name', 'Gallery') }}</a>
    </h1>
    <nav id="colorlib-main-menu" role="navigation">
        <ul>
            
            <!-- Authentication Links -->
            @guest
                    <li class="nav-item">
                        <a class="" href="{{ route('login') }}">{{ __('Login') }}</a>
                    </li>
                @if (Route::has('register'))
                    <li class="nav-item">
                        <a class="" href="{{ route('register') }}">{{ __('Register') }}</a>
                    </li>
                @endif
            @else
                <li><a href="{{ url('/gallery') }}">My Galleries</a></li>
                <li><a href="{{ route('gallery.create') }}">Create Gallery</a></li>
                <li class="">
                    <a id="" class="" href="{{ route('logout') }}" role="button"
                        onclick="event.preventDefault();
                        document.getElementById('logout-form').submit();">
                        {{ __('Logout') }}
                    </a>
                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                            @csrf
                    </form>

                    <!-- <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                        <a class="dropdown-item" href="{{ route('logout') }}"
                            onclick="event.preventDefault();
                                            document.getElementById('logout-form').submit();">
                            {{ __('Logout') }}
                        </a>

                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                            @csrf
                        </form>
                    </div> -->
                </li>
            @endguest
            <li>
                <a href="">
               
                </a>
            </li>
        </ul>
        
    </nav>
    
    <div class="cpright">
        <!-- Copyright ©2020 All rights reserved  -->
    </div>
   
</aside> <!-- END COLORLIB-ASIDE -->        
        
        
        
        