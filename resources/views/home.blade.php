<x-master-layout>
    
    <div class="container max-w-5xl mx-auto py-6 px-3">

        <div class="grid grid-cols-1 md:grid-cols-3 gap-8 mb-8">

            {{-- Latest post --}}
            <div class="col-span-2">
                <h2 class="text-lg sm:text-xl font-semibold text-blue-600 uppercase pb-1 border-b-[1px] border-black mb-3">
                    Latest Post
                </h2>
                @if ($latest_post)
                    <x-post-items :post="$latest_post" :latest="true" />
                @endif
            </div>

            {{-- Popular posts --}}
            <div>
                <h2 class="text-lg sm:text-xl font-semibold text-blue-600 uppercase pb-1 border-b-[1px] border-black mb-3">
                    Popular Posts
                </h2>
                @foreach($popular_posts as $post)
                    <div class="grid grid-cols-4 gap-2 mb-4 border-b-[1px] border-black">
                        <a href="{{ route('show', $post) }}" class="pt-1">
                            <img src="{{ $post->thumbnail() }}" alt="{{ $post->title }}" class="hover:opacity-50"/>
                        </a>
                        <div class="col-span-3">
                            <a href="{{ route('show', $post) }}">
                                <h3 class="text-sm uppercase whitespace-nowrap truncate hover:text-blue-600">
                                    {{ $post->title }}
                                </h3>
                            </a>
                            <div class="flex gap-1 mb-2">
                                @foreach($post->categories as $category)
                                <a href="#" class="bg-blue-500 text-white hover:text-opacity-50 p-1 rounded text-[8px] font-bold uppercase">
                                        {{ $category->title }}
                                    </a>
                                @endforeach
                            </div>
                            <div class="text-xs">
                                {{ $post->teaser(10) }}
                            </div>
                            <a href="{{ route('show', $post) }}" class="text-xs uppercase text-gray-800 hover:text-blue-600">
                                Continue Reading <i class="fas fa-arrow-right"></i>
                            </a>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>

        {{-- Recommended posts --}}
        <div class="mb-8">
            <h2 class="text-lg sm:text-xl font-semibold text-blue-600 uppercase pb-1 border-b-[1px] border-black mb-3">
                Recommended Posts
            </h2>

            <div class="grid grid-cols-1 md:grid-cols-3 gap-3">
                @foreach($recommended_posts as $post)
                    <x-post-items :post="$post" :show-author="false" />
                @endforeach
            </div>
        </div>

        {{-- Latest categories --}}
        @foreach($categories as $category)
            <div>
                <a href="{{ route('by-category', $category) }}">
                    <h2 class="text-lg sm:text-xl font-semibold text-blue-600 uppercase pb-1 border-b-[1px] border-black mb-3">
                        Category "{{ $category->title }}"
                        <i class="fas fa-arrow-right"></i>
                    </h2>
                </a>

                <div class="mb-6">
                    <div class="grid grid-cols-1 md:grid-cols-3 gap-3">
                        @foreach($category->publishedPosts()->limit(3)->get() as $post)
                            <x-post-items :post="$post" :show-author="false" />
                        @endforeach
                    </div>
                </div>
            </div>
        @endforeach

    </div>
</x-master-layout>

