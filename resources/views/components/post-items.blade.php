<article class="w-full flex flex-col shadow-2xl my-4 md:p-4 p-2">

    {{-- Article image --}}
    <a href="{{ route('show', $post) }}" class="hover:opacity-75">
        <img src="{{ $post->thumbnail() }}" class="aspect-[3/4] object-contain rounded-md">
    </a>

    {{-- Article content --}}
    <div class="flex flex-col justify-start py-2">
        <div class="flex gap-4">
            @if ($showCategoryTitle)
                @foreach ($post->categories as $category)
                    <a href="{{ route('by-category', $category) }}" class="text-indigo-600 text-base font-semibold capitalize">
                        {{ $category->title }}
                    </a>
                @endforeach
            @endif
        </div>
        <h1 class="text-xl font-semibold capitalize text-gray-900 mb-2">
            {{ $post->title }}
        </h1>
        <a href="{{ route('show', $post) }}" class="text-gray-600 pb-8">
            {!! $post->teaser() !!}
        </a>
        @if ($showAuthor)
            <div class="flex items-center gap-2">
                <p class="text-gray-600">By</p>
                <a href="https://openai.com/" target="_blanket" class="hover:text-gray-900 text-gray-600 font-semibold text-sm">
                    <img class="w-10 h-10 object-cover object-center rounded-full"
                        src="{{ $post->user->thumbnail() }}"
                        alt="OpenAI logo"/>
                </a>
            </div>
            <p class="text-gray-600 font-semibold text-sm pt-[2px]">
                {{ $post->formatDate() }} | {{ $post->human_read_time }}
            </p>
        @endif
        <a href="{{ route('show', $post) }}" class="uppercase text-gray-800 hover:text-black mt-4">
            Continue Reading <i class="fas fa-arrow-right"></i>
        </a>
    </div>
    
</article>
