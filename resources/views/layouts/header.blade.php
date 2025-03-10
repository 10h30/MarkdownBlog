<header class="bg-white py-4 px-5 w-full">
  <div class="max-w-6xl mx-auto flex flex-col md:flex-row justify-between items-center">
      <!-- Logo & Site Description -->
      <a href="{{ route('home') }}" class="block">
        <div class="font-bold text-2xl">{{ config('settings.site_title') }}</div>
        <div class="text-black/50">{{ config('settings.site_description') }}</div>
      </a>

       <!-- Navigation -->
      <nav class="flex gap-5">
        <x-nav-link  :href="route('blog')" :active="request()->routeIs('blog')">Blog</x-nav-link>
        <x-nav-link  :href="route('contact')" :active="request()->routeIs('contact')">Contact</x-nav-link>
        @auth
        <form method="POST" action="{{ route('logout') }}">
          @csrf
          <x-nav-link :href="route('logout')" onclick="event.preventDefault();
                                this.closest('form').submit();">Logout</x-nav-link>
      </form>        @else
        <x-nav-link  :href="route('login')" :active="request()->routeIs('login')">Login</x-nav-link>  
        @endauth     
        
         
      </nav>
  </div>
</header>

