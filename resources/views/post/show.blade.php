<x-master-layout>

    <div class="container max-w-5xl mx-auto flex flex-wrap py-6">
        <section class="w-full md:w-2/3 flex flex-col px-3">

            {{-- Article --}}
            <article class="flex flex-col shadow-2xl my-4 md:p-6 p-2">
                <a href="#" class="hover:opacity-75">
                    <img src="{{ $post->thumbnail() }}" class="rounded-md">
                </a>
                <div class="flex flex-col justify-start py-2">
                    <div class="flex gap-4">
                        @foreach($post->categories as $category)
                            <a href="{{ route('by-category', $category) }}" class="text-indigo-600 text-base font-semibold capitalize">
                                {{ $category->title }}
                            </a>
                        @endforeach
                    </div>
                    <h1 class="text-xl font-semibold capitalize text-gray-900">
                        {{ $post->title }}
                    </h1>
                    @livewire('search-word', ['post' => $post], key("post-$post->id"))
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
                    @livewire('upvote-downvote', ['post' => $post])
                </div>
            </article>

            {{-- Pagination --}}
            <div class="w-full flex pt-6">
                <div class="w-1/2">
                    @if($prev)
                        <a href="{{ route('show', $prev) }}"
                           class="block w-full shadow-2xl hover:shadow-md text-left pl-4">
                            <p class="text-lg text-blue-800 font-bold flex items-center">
                                <i class="fas fa-arrow-left pr-1"></i>
                                Previous
                            </p>
                            <p class="pt-2 text-gray-700 ">{{ \Illuminate\Support\Str::words($prev->title, 5) }}</p>
                        </a>
                    @endif
                </div>

                <div class="w-1/2">
                    @if($next)
                        <a href="{{ route('show', $next) }}"
                           class="block w-full shadow-2xl hover:shadow-md text-right pr-4">
                            <p class="text-lg text-blue-800 font-bold flex items-center justify-end">
                                Next <i class="fas fa-arrow-right pl-1"></i>
                            </p>
                            <p class="pt-2 text-gray-700 ">
                                {{ \Illuminate\Support\Str::words($next->title, 5) }}
                            </p>
                        </a>
                    @endif
                </div>
            </div>

            @livewire('comments', ['post' => $post])
        </section>
        <x-sidebar />
    </div>

</x-master-layout>
