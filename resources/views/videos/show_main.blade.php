<div class="flex flex-col items-center">
    <iframe
        class="md:p-3 lg:p-5 xl:px-10 xl:py-5 2xl:px-20 2xl:py-10 h-4/5 w-full md:px-6 xl:px-15 xl:py-5 2xl:px-20 2xl:py-10"
        style="height: 75vh;"
        src="{{ $video->url }}"
        title="YouTube video player" frameborder="0"
        allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture"
        allowfullscreen>

    </iframe>

    <div class="inline-block w-full max-w-7xl w-5/6 bg-white rounded-lg shadow-lg px-4 py-4 md:px-6 xl:px-15 xl:py-5 2xl:px-20 2xl:py-10 m-4 border-t-2 border-indigo-500 rounded-t-none	">
        <h2 class="text-gray-900 w	uppercase font-bold text-2xl tracking-tight border-b border-gray-300">
            {{ $video->title }}
        </h2>
        <dl class="mt-5 grid grid-cols-1 gap-5 sm:grid-cols-3">

            <div class="px-4 py-2 bg-gray-100 bg-white shadow rounded-lg overflow-hidden">
                <dt class="text-sm font-medium text-gray-500 truncate">
                    Data de publicació
                </dt>
                <dd class="mt-1 text-1xl font-semibold text-gray-900">
                    {{ $video->formatted_published_at }}
                </dd>
            </div>

            {{--                <div class="px-4 py-5 bg-white shadow rounded-lg overflow-hidden sm:p-6">--}}
            {{--                    <dt class="text-sm font-medium text-gray-500 truncate">--}}
            {{--                        Avg. Open Rate--}}
            {{--                    </dt>--}}
            {{--                    <dd class="mt-1 text-3xl font-semibold text-gray-900">--}}
            {{--                        58.16%--}}
            {{--                    </dd>--}}
            {{--                </div>--}}

            {{--                <div class="px-4 py-5 bg-white shadow rounded-lg overflow-hidden sm:p-6">--}}
            {{--                    <dt class="text-sm font-medium text-gray-500 truncate">--}}
            {{--                        Avg. Click Rate--}}
            {{--                    </dt>--}}
            {{--                    <dd class="mt-1 text-3xl font-semibold text-gray-900">--}}
            {{--                        24.57%--}}
            {{--                    </dd>--}}
            {{--                </div>--}}

        </dl>
    </div>

    <div class="prose-sm md:prose lg:prose-xl 2xl:prose-2xl mx-auto px-4 py-4 md:px-6 xl:px-15 xl:py-5 2xl:px-20 2xl:py-10">
        {!! Str::markdown($video->description) !!}
    </div>
</div>
