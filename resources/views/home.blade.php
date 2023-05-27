{{-- <x-master-layout>
  
    <section class="w-full md:w-2/3 flex flex-col items-center px-3">

        @foreach($posts as $post)
            <x-post-items :post="$post" />
        @endforeach

        {{ $posts->links() }}
     
    </section>

    <x-sidebar />

</x-master-layout> --}}



<x-master-layout>
    <div class="container max-w-4xl mx-auto py-6">

        <div class="grid grid-cols-1 md:grid-cols-3 gap-8 mb-8">

            {{-- Latest post --}}
            <div class="col-span-2">
                <h2 class="text-lg sm:text-xl font-bold text-blue-500 uppercase pb-1 border-b-2 border-blue-500 mb-3">
                    Latest Post
                </h2>
                @if ($latest_post)
                    <x-post-items :post="$latest_post" />
                @endif
            </div>

            {{-- Popular 3 posts --}}
            <div>
                <h2 class="text-lg sm:text-xl font-bold text-blue-500 uppercase pb-1 border-b-2 border-blue-500 mb-3">
                    Popular Posts
                </h2>
                @foreach($popular_posts as $post)
                    <div class="grid grid-cols-4 gap-2 mb-4">
                        <a href="{{ route('show', $post) }}" class="pt-1">
                            <img src="{{ $post->thumbnail() }}" alt="{{ $post->title }}"/>
                        </a>
                        <div class="col-span-3">
                            <a href="{{ route('show', $post) }}">
                                <h3 class="text-sm uppercase whitespace-nowrap truncate">
                                    {{ $post->title }}
                                </h3>
                            </a>
                            <div class="flex gap-4 mb-2">
                                @foreach($post->categories as $category)
                                    <a href="#" class="bg-blue-500 text-white p-1 rounded text-xs font-bold uppercase">
                                        {{ $category->title }}
                                    </a>
                                @endforeach
                            </div>
                            <div class="text-xs">
                                {{ $post->teaser(10) }}
                            </div>
                            <a href="{{ route('show', $post) }}" class="text-xs uppercase text-gray-800 hover:text-black">
                                Continue Reading <i class="fas fa-arrow-right"></i>
                            </a>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>

        {{-- Recommended posts --}}
        <div class="mb-8">
            <h2 class="text-lg sm:text-xl font-bold text-blue-500 uppercase pb-1 border-b-2 border-blue-500 mb-3">
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
                    <h2 class="text-lg sm:text-xl font-bold text-blue-500 uppercase pb-1 border-b-2 border-blue-500 mb-3">
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

