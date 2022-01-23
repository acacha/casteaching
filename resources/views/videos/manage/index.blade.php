<x-casteaching-layout>

    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Videos') }}
        </h2>
    </x-slot>

    <div class="flex flex-col mt-10">

        <div class="mx-auto sm:px-6 lg:px-8 w-full max-w-7xl">
            <x-status></x-status>

            @can('videos_manage_create')
                <div class="-my-2 overflow-x-auto sm:-mx-6 lg:-mx-8 mb-1 md:mb-2 lg:mb-4">
                    <div class="py-2 align-middle inline-block min-w-full sm:px-6 lg:px-8">
                        <div class="md:grid md:grid-cols-3 md:gap-6 bg-white md:bg-transparent">
                            <div class="md:col-span-1">
                                <div class="px-4 py-4 sm:px-6 md:px-4">
                                    <h3 class="text-lg font-medium leading-6 text-gray-900">Vídeos</h3>
                                    <p class="mt-1 text-sm text-gray-600">
                                        Informació bàsica del vídeo
                                    </p>
                                </div>
                            </div>
                            <div class="md:mt-0 md:col-span-2">
                                <form data-qa="form_video_create" action="#" method="POST" >
                                    @csrf
                                    <div class="shadow sm:rounded-md sm:overflow-hidden md:bg-white">
                                        <div class="px-4 py-5 space-y-6 sm:p-6">

                                            <div>
                                                <label for="title" class="block text-sm font-medium text-gray-700">
                                                    Title
                                                </label>
                                                <div class="mt-1">
                                                    <input required type="text" id="title" name="title" rows="3" class="shadow-sm mt-1 block w-full sm:text-sm border border-gray-300 rounded-md p-2" placeholder="Titol del vídeo"></input>
                                                </div>
                                                <p class="mt-2 text-sm text-gray-500">
                                                    Titol curt del vídeo
                                                </p>
                                            </div>

                                            <div>
                                                <label for="description" class="block text-sm font-medium text-gray-700">
                                                    Description
                                                </label>
                                                <div class="mt-1">
                                                    <textarea required id="description" name="description" rows="3" class="shadow-sm focus:ring-indigo-500 focus:border-indigo-500 mt-1 block w-full sm:text-sm border border-gray-300 rounded-md" placeholder="Description"></textarea>
                                                </div>
                                                <p class="mt-2 text-sm text-gray-500">
                                                    Breu descripció del vídeo
                                                </p>
                                            </div>

                                            <div class="grid grid-cols-3 gap-6">
                                                <div class="col-span-3">
                                                    <label for="url" class="block text-sm font-medium text-gray-700">
                                                        URL
                                                    </label>
                                                    <div class="mt-1 flex rounded-md shadow-sm">
                                                          <span class="inline-flex items-center px-3 rounded-l-md border border-r-0 border-gray-300 bg-gray-50 text-gray-500 text-sm">
                                                            http://
                                                          </span>
                                                        <input required type="url" name="url" id="url" class="focus:ring-indigo-500 focus:border-indigo-500 flex-1 block  rounded-none rounded-r-md sm:text-sm border-gray-300" placeholder="youtube.com/">
                                                    </div>
                                                </div>
                                            </div>


                                            <div class="grid grid-cols-3 gap-6">
                                                <div class="col-span-3">
                                                    <label for="serie" class="block text-sm font-medium text-gray-700">
                                                        Serie
                                                    </label>
                                                    <select id="serie" name="serie_id" class="mt-1 block w-full pl-3 pr-10 py-2 text-base border-gray-300 focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm rounded-md">
                                                        <option value="">-- Escolliu una serie --</option>
                                                        @foreach (App\Models\Serie::all() as $serie)
                                                            <option value="{{ $serie->id }}"> {{ $serie->title }}</option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                            </div>

                                            <div class="grid grid-cols-3 gap-6">
                                                <div class="col-span-3">
                                                    <label for="user" class="block text-sm font-medium text-gray-700">
                                                        User
                                                    </label>
                                                    <select id="user" name="user_id" class="mt-1 block w-full pl-3 pr-10 py-2 text-base border-gray-300 focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm rounded-md">
                                                        <option value="">-- Escolliu un usuari --</option>
                                                        @foreach (App\Models\User::all() as $user)
                                                            <option value="{{ $user->id }}"> {{ $user->name }}</option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                            </div>

                                        </div>
                                        <div class="px-4 py-3 bg-gray-50 text-right sm:px-6">
                                            <button type="submit" class="inline-flex justify-center py-2 px-4 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                                                Crear
                                            </button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>

            @endcan

            <div class="-my-2 overflow-x-auto sm:-mx-6 lg:-mx-8">
                <div class="py-2 align-middle inline-block min-w-full sm:px-6 lg:px-8">
                    <div class="shadow overflow-hidden border-b border-gray-200 sm:rounded-lg">
                        <div class="bg-white px-4 py-5 border-b border-gray-200 sm:px-6">
                            <h3 class="text-lg leading-6 font-medium text-gray-900">
                                Videos
                            </h3>
                        </div>
                        <table class="min-w-full divide-y divide-gray-200">
                            <thead class="bg-gray-50">
                            <tr>
                                <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                    Id
                                </th>
                                <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                    Title
                                </th>
                                <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                    Description
                                </th>
                                <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                    URL
                                </th>
                                <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                    Serie
                                </th>
                                <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                    Usuari
                                </th>
                                <th scope="col" class="relative px-6 py-3">
                                    <span class="sr-only">Actions</span>
                                </th>
                            </tr>
                            </thead>
                            <tbody>
                            <!-- Odd row -->
                            @foreach($videos as $video)
                                @if($loop->odd)
                                    <tr class="bg-white">
                                @else
                                    <tr class="bg-gray-50">
                                @endif
                                    <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900">
                                        {{ $video->id }}
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                                        {{ $video->title }}
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                                        {{ $video->description }}
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                                        {{ $video->url }}
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                                        {{ optional($video->serie)->title }}
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                                        {{ optional($video->user)->name }}
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium">
                                        <a href="/videos/{{$video->id}}" target="_blank" class="text-indigo-600 hover:text-indigo-900">Show</a>
                                        <a href="/manage/videos/{{$video->id}}" target="_blank" class="text-indigo-600 hover:text-indigo-900">Edit</a>
                                        <form class="inline" action="/manage/videos/{{$video->id}}" method="POST">
                                            @csrf
                                            @method('DELETE')

                                            <a href="/videos/{{$video->id}}" class="text-indigo-600 hover:text-indigo-900"
                                               onclick="event.preventDefault();
                                        this.closest('form').submit();">Delete</a>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

</x-casteaching-layout>
