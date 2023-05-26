<x-master-layout>
  
    <section class="w-full md:w-2/3 flex flex-col items-center px-3">

        @foreach($posts as $post)
            <x-post-items :post="$post" />
        @endforeach

        {{-- Pagination --}}
        {{ $posts->links() }}
     
    </section>

    <x-sidebar />

</x-master-layout>
