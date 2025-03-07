<header class="bg-white shadow-md py-4 px-6 w-full">
    <div class="px-6 max-w-6xl mx-auto flex flex-col md:flex-row justify-between items-center">
      <!-- Logo & Site Description -->
      <div class="mb-4 md:mb-0 text-center md:text-left">
        <a href="{{ route('home') }}"><h1 class="text-2xl font-bold text-gray-800">Site Title</h1></a>
        <p class="text-sm text-gray-600">Your site description goes here</p>
      </div>
      
      <!-- Navigation -->
      <nav>
        <ul class="flex space-x-6">
          <li><a href="{{ route('home') }}" class="text-gray-700 hover:text-blue-600 transition-colors duration-200">Home</a></li>
          <li><a href="{{ route('blog') }}" class="text-gray-700 hover:text-blue-600 transition-colors duration-200">Blog</a></li>
          <li><a href="{{ route('about') }}" class="text-gray-700 hover:text-blue-600 transition-colors duration-200">About</a></li>
          <li><a href="{{ route('contact') }}" class="text-gray-700 hover:text-blue-600 transition-colors duration-200">Contact</a></li>
         <!-- Dropdown Menu Item -->
         @auth
         <li class="relative group">
            <a href="{{ route('login') }}" class="text-gray-700 hover:text-blue-600 transition-colors duration-200 flex items-center">
                {{ Auth::user()->name }}
              <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 ml-1" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" />
              </svg>
            </a>
            
            <!-- Dropdown Content with padding to create hover space -->
            <div class="absolute left-0 hidden group-hover:block">
              <!-- Invisible padding to create hover space -->
              <div class="pt-2 -mt-2"></div>
              <!-- Actual dropdown menu -->
              <ul class="bg-white rounded-md shadow-lg py-1 z-10 w-48">
                <li><a href="{{ route('profile.edit')}}" class="block px-4 py-2 text-gray-700 hover:bg-gray-100 hover:text-blue-600">Profile</a></li>
                <li>
                    
                    <form method="POST" action="{{ route('logout') }}">
                        @csrf
                        <a href="{{route('logout')}}" class="block px-4 py-2 text-gray-700 hover:bg-gray-100 hover:text-blue-600" onclick="event.preventDefault();
                                            this.closest('form').submit();">Logout</a>
                    </form>
                    </li>
              </ul>
            </div>
          </li>
          @else

          <li class="relative group">
            <a href="{{ route('login')}}" class="text-gray-700 hover:text-blue-600 transition-colors duration-200 flex items-center">
              Login
             {{--  <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 ml-1" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" />
              </svg> --}}
            </a>
            
            {{-- <!-- Dropdown Content with padding to create hover space -->
            <div class="absolute left-0 hidden group-hover:block">
              <!-- Invisible padding to create hover space -->
              <div class="pt-2 -mt-2"></div>
              <!-- Actual dropdown menu -->
              <ul class="bg-white rounded-md shadow-lg py-1 z-10 w-48">
                <li><a href="{{ route('register')}}" class="block px-4 py-2 text-gray-700 hover:bg-gray-100 hover:text-blue-600">Register</a></li>
              </ul>
            </div> --}}
          </li>


          @endauth 
        </ul>
      </nav>
    </div>
  </header>