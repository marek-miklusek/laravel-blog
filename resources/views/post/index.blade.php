<x-master-layout>

    <div class="container max-w-5xl mx-auto flex flex-wrap py-6">

        <section class="w-full md:w-2/3 px-3">
            <div class=" flex flex-col items-center">
                @foreach($posts as $post)
                    <x-post-items :post="$post" :show-category-title="false" :latest="true" />
                @endforeach
            </div>
            {{ $posts->links() }}
        </section>
        
        <x-sidebar />

    </div>

</x-master-layout>