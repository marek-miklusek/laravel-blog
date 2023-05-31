<nav class="w-full py-4 border-t border-b bg-gradient-to-r from-slate-500 to-yellow-100" x-data="{open: false}">
    
    <div class="block sm:hidden">
        <a href="#" class="md:hidden text-base font-bold uppercase text-center flex justify-center items-center"
            @click="open = !open">
            Topics <i :class="open ? 'fa-chevron-down': 'fa-chevron-up'" class="fas ml-2"></i>
        </a>
    </div>

    <div :class="open ? 'block': 'hidden'" class="w-full flex-grow sm:flex sm:items-center sm:w-auto">
        <div class="w-full text-center container mx-auto flex flex-col flex-wrap sm:flex-row items-center 
            justify-center text-xs sm:text-sm font-bold uppercase mt-0 px-6 py-2">
            <div>
                <a href="{{route('home')}}" class="hover:bg-blue-600 hover:text-white rounded py-1 px-1 mx-2
                    sm:py-2 sm:px-4 {{ request()->getRequestUri() == '/' ? 'bg-blue-600 text-white' :  '' }}">
                    Home
                </a>
                @foreach($categories as $category)
                    <a href="{{ route('by-category', $category) }}"
                        class="hover:bg-blue-600 hover:text-white rounded py-1 px-1 mx-2 sm:py-2 sm:px-4
                        {{ request('category')?->slug === $category->slug ? 'bg-blue-600 text-white' :  '' }}">
                        {{ $category->title }}
                    </a>
                @endforeach
            </div>

            <div class="flex items-center">
                <form action="{{ route('search') }}">
                    <div class="relative ml-5 text-lg bg-transparent text-gray-800">
                        <div class="flex items-center border-b-[1px] border-indigo-500 py-2">
                            <input name="expression" class="bg-transparent font-normal text-gray-800 border-none px-2 leading-tight focus:outline-none" 
                                type="text" placeholder="Search article...">
                            <button type="submit" class="absolute right-0 top-1.5 mt-3 mr-4">
                                <svg class="h-4 w-4 fill-current" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" version="1.1" id="Capa_1" x="0px" y="0px" viewBox="0 0 56.966 56.966" style="enable-background:new 0 0 56.966 56.966;" xml:space="preserve" width="512px" height="512px">
                                    <path d="M55.146,51.887L41.588,37.786c3.486-4.144,5.396-9.358,5.396-14.786c0-12.682-10.318-23-23-23s-23,10.318-23,23  s10.318,23,23,23c4.761,0,9.298-1.436,13.177-4.162l13.661,14.208c0.571,0.593,1.339,0.92,2.162,0.92  c0.779,0,1.518-0.297,2.079-0.837C56.255,54.982,56.293,53.08,55.146,51.887z M23.984,6c9.374,0,17,7.626,17,17s-7.626,17-17,17  s-17-7.626-17-17S14.61,6,23.984,6z"/>
                                </svg>
                            </button>
                        </div>
                    </div>
                </form>
                @auth
                    <div class="flex sm:items-center sm:ml-6 text-blue-600">
                        <x-dropdown align="right" width="48">
                            <x-slot name="trigger">
                                <button class="hover:bg-blue-600 hover:text-white flex items-center rounded py-1 pl-1 sm:py-2 sm:px-4">
                                    <div>{{ Auth::user()->name }}</div>
                                        <div class="ml-1">
                                            <svg class="fill-current h-4 w-4" xmlns="http://www.w3.org/2000/svg"
                                                viewBox="0 0 20 20">
                                                <path fill-rule="evenodd"
                                                    d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z"
                                                    clip-rule="evenodd"/>
                                            </svg>
                                        </div>
                                </button>
                            </x-slot>

                            <x-slot name="content">
                                <x-dropdown-link :href="route('profile.edit')">
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
                    </div>
                @else
                    <div class="flex justify-center">
                        <a href="{{ route('login') }}"
                            class="hover:bg-blue-600 hover:text-white text-blue-500 rounded py-1 px-1 mx-2 sm:py-2 sm:px-4
                            {{ Request::segment(1) == 'login' ? 'bg-blue-600 text-white' : '' }}">
                            Login
                        </a>
                        <a href="{{ route('register') }}" class="bg-blue-600 hover:opacity-80 hover:text-white text-white rounded py-1 px-1 
                           sm:py-2 sm:px-4 mx-2">
                            Register
                        </a>
                    </div>
                @endauth
            </div>
        </div>
    </div>
    
</nav>