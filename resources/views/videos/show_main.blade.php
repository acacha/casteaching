<div class="flex flex-col items-center">
    <iframe
        class="md:p-3 lg:p-5 xl:px-10 xl:py-5 2xl:px-20 2xl:py-10 h-4/5 w-full md:px-6 xl:px-15 xl:py-5 2xl:px-20 2xl:py-10"
        style="height: 75vh;"
        src="{{ $video->url }}"
        title="YouTube video player" frameborder="0"
        allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture"
        allowfullscreen>

    </iframe>

    @include('videos.show_main_title_and_description')
</div>
