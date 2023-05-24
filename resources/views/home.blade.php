<x-master-layout>
  
    <section class="w-full md:w-2/3 flex flex-col items-center px-3">

        @foreach($posts as $post)
        @dd($post->user->name)
            <x-post-item :post="$post" />
        @endforeach

        {{-- Pagination --}}
        {{ $posts->links() }}
     
    </section>

    <x-sidebar />

</x-master-layout>
