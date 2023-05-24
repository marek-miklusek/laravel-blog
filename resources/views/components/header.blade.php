<header class="w-full container mx-auto">
    <div class="flex flex-col items-center py-12">
        <a href="/" class="font-bold text-gray-800 uppercase hover:text-gray-700 text-5xl">
            Miki Blog
        </a>
        <p class="text-lg text-gray-600">
            {{ \App\Models\TextWidget::getWidget('header', 'title') }}
        </p>
    </div>
</header>