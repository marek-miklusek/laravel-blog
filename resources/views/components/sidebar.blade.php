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
        <h3 class="text-xl font-semibold pb-5">
            {{ \App\Models\TextWidget::getWidget('sidebar', 'title') }}
        </h3>
        <div class="text-gray-600">
            When you want to leave a comment or hit a like, you have to 
            <a href="{{ route('login') }}" class="text-blue-700 hover:underline">sign in</a> first.
            {{-- {!! \App\Models\TextWidget::getWidget('sidebar', 'content') !!} --}}
        </div>
    </div>

</aside>