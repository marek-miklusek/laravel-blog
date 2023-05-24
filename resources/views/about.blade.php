@section('title', 'About us')

<x-master-layout>
    
    @if($widget && $widget->image)
        <div class="container lg:w-2/3 mx-auto py-6">
            
            <section class="flex flex-col items-center px-3">

                <article class="flex flex-col shadow my-4">
                    <img src="/storage/{{ $widget->image }}">
                    <div class="bg-white flex flex-col justify-start p-6">
                        <h1 class="text-3xl font-bold hover:text-gray-700 pb-4">
                            {{ $widget ? $widget->title : '' }}
                        </h1>
                        <div>
                            {!! $widget ? $widget->content : '' !!}
                        </div>
                    </div>
                </article>

            </section>

        </div>
    @else
        <div class="w-full text-center uppercase">nothing to show</div>
    @endif

</x-master-layout>
