

<nav class="navbar navbar-expand-md bg-dark border-bottom sticky-top text-white">


        <div class="container">
        <img src="https://bikefest.ro/wp-content/uploads/2014/08/Logo-World_Class.png"style= "width: 130px; high: 30px">
         
        <!-- Logo -->
        
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
            <span class="navbar-toggler-icon"></span>
        </button>
        
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <!-- Left Side Of Navbar -->
            <br>
            <ul class="navbar-nav me-auto">
        
            <li class="nav-item">
                    <a class="nav-link" href="{{route('get-homepage')}}"><h3 color="blue">HOMEPAGE</h3></a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{route('get-fitness')}}"><h3 color="blue">FITNESS</h3></a>
                </li>
                  <li class="nav-item">
                    <a class="nav-link" href="{{route('get-instructor')}}"><h3 color="blue">INSTRUCTORS</h3></a>
                </li>
                  <li class="nav-item">
                    <a class="nav-link" href="{{route('get-subscription')}}"><h3 color="blue">SUBSCRIPTIONS</h3></a>
                </li>
                  <li class="nav-item">
                    <a class="nav-link" href="{{route('get-clients')}}"><h3 color="blue">CLIENTS</h3></a>
                 </li>
                 <li class="nav-item">
                    <a class="nav-link" href="{{route('get-clubs')}}"><h3 color="blue">CLUBS</h3></a>
                 </li>
                 
            </ul>

            <!-- Right Side Of Navbar -->
            <ul class="navbar-nav">

                <!-- Settings Dropdown -->
                @auth
                    <x-dropdown id="settingsDropdown" style="font-size:18px">
                        <x-slot name="trigger">
                            {{ Auth::user()->name }}
                        </x-slot>

                        <x-slot name="content">

                        <x-dropdown-link :href="route('get-user-profile')">
                                
                                    {{ __('Profile') }}
                                </x-dropdown-link>
                            <!-- Authentication -->
                            <form method="POST" action="{{ route('logout') }}">
                                @csrf

                                <x-dropdown-link :href="route('logout')"
                                                 onclick="event.preventDefault();
                                                this.closest('form').submit();">
                                    {{ __('Log Out') }}
                                </x-dropdown-link>
                                
                            </form>
                        </x-slot>
                    </x-dropdown>
                @endauth
            </ul>
        </div>
    </div>
</nav>