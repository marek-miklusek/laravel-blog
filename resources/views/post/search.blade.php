<x-master-layout>
    <div class="container max-w-5xl mx-auto flex flex-wrap py-6">

        <section class="w-full md:w-2/3 px-3">
            <div class="flex flex-col">
                @forelse($posts as $post)
                    <div>
                        <a href="{{ route('show', $post) }}">
                            <h2 class="text-indigo-600 font-bold text-lg sm:text-xl mb-2 capitalize">
                                {!! str_ireplace($expression[0], '<span class="bg-yellow-300">'.$expression[0].'</span>', $post->title) !!}
                            </h2>
                        </a>
                        <div class="text-gray-600">
                            {!! search_expression($expression[0], $post) !!}
                        </div>
                    </div>
                    <hr class="my-4">
                @empty
                    <h1 class="text-center font-semibold text-orange-600 text-xl">
                        I'm sorry, there is no match for 
                        "{{ request()->get('expression') }}"
                    </h1>
                @endforelse
            </div>
            {{ $posts->links() }}
        </section>
        
        <x-sidebar />

    </div>
</x-master-layout>

