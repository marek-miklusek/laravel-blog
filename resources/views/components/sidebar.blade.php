<aside class="w-full md:w-1/3 flex flex-col items-center px-3">

    <div class="w-full shadow-2xl flex flex-col my-4 p-6">
        <h3 class="text-xl font-semibold mb-3">
            All Categories
        </h3>
        @foreach($categories as $category)
            <a href="{{ route('by-category', $category) }}"
                class="text-gray-600 text-semibold block py-2 px-3 rounded hover:bg-gradient-to-r from-slate-300 to-yellow-100
                {{ request('category')?->slug === $category->slug ? 'bg-gradient-to-r from-slate-300 to-yellow-100' :  '' }}">
                {{ $category->title }} ({{ $category->total }})
            </a>
        @endforeach
    </div>

    <div class="w-full shadow-2xl flex flex-col my-4 p-6">
        <h3 class="text-xl font-semibold pb-5 text-indigo-600">
            {{ \App\Models\TextWidget::getWidget('sidebar', 'title') }}
        </h3>
        <div class="text-gray-600">
            {!! \App\Models\TextWidget::getWidget('sidebar', 'content') !!}
        </div>
        {{-- <a href="{{ route('about-us') }}"
           class="w-full bg-blue-600 text-white font-bold text-sm uppercase rounded hover:bg-blue-700 flex items-center justify-center px-2 py-3 mt-4">
            Get to know us
        </a> --}}
    </div>

</aside>