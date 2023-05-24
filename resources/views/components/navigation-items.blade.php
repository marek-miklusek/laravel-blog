<nav class="w-full py-4 border-t border-b bg-gray-100" x-data="{open: false}">
    <div class="block sm:hidden">
        <a href="#" class="block md:hidden text-base font-bold uppercase text-center justify-center items-center"
            @click="open = !open">
            Topics <i :class="open ? 'fa-chevron-down': 'fa-chevron-up'" class="fas ml-2"></i>
        </a>
    </div>
    <div :class="open ? 'block': 'hidden'" class="w-full flex-grow sm:flex sm:items-center sm:w-auto">
        <div class="w-full container mx-auto flex flex-col sm:flex-row items-center justify-center text-sm font-bold uppercase mt-0 px-6 py-2">
            <a href="{{ route('home') }}" class="hover:bg-blue-600 hover:text-white rounded py-2 px-4 mx-2
                {{ request()->getRequestUri() == '/' ? 'bg-white' :  '' }}">
                Home
            </a>
            @foreach($categories as $category)
                <a href="{{ route('by-category', $category) }}" class="hover:bg-blue-600 hover:text-white rounded py-2 px-4 mx-2
                    {{ request('category')?->slug === $category->slug ? 'bg-white' :  '' }}">
                    {{ $category->title }}
                </a>
            @endforeach
            <a href="{{ route('about-us') }}" class="hover:bg-blue-600 hover:text-white rounded py-2 px-4 mx-2
                {{ request()->getRequestUri() == 'about-us' ? 'bg-white' :  '' }}">
                About us
            </a>
        </div>
    </div>
</nav>