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
                <x-jet-form-section>
                    <x-slot name="title">
                        {{ __('Vídeos') }}
                    </x-slot>

                    <x-slot name="description">
                        {{ __('Informació bàsica del vídeo') }}
                    </x-slot>

                    <x-slot name="actions">
                        <x-jet-button>
                            {{ __('Save') }}
                        </x-jet-button>
                    </x-slot>

                    <x-slot name="form">
                            @csrf
                            <div class="col-span-6 sm:col-span-4">
                                <x-jet-label for="title" value="{{ __('Title') }}" />
                                <x-jet-input id="title" name="title" type="text" class="mt-1 block w-full" autocomplete="name" required/>
                                <x-jet-input-error for="title" class="mt-2" />
                            </div>
                            <div class="col-span-6 sm:col-span-4">
                                <x-jet-label for="description" value="{{ __('Description') }}" />
                                <textarea required id="description" name="description" rows="3" class="shadow-sm focus:ring-indigo-500 focus:border-indigo-500 mt-1 block w-full sm:text-sm border border-gray-300 rounded-md" placeholder="Description"></textarea>
                                <x-jet-input-error for="description" class="mt-2" />
                            </div>

                            <div class="col-span-6 sm:col-span-4">
                                <x-jet-label for="url" value="{{ __('URL') }}" />

                                <div class="mt-1 flex rounded-md shadow-sm">
                                    <span class="inline-flex items-center px-3 rounded-l-md border border-r-0 border-gray-300 bg-gray-50 text-gray-500 text-sm">
                                    http://
                                    </span>
                                    <input required type="url" name="url" id="url" class="focus:ring-indigo-500 focus:border-indigo-500 flex-1 block  rounded-none rounded-r-md sm:text-sm border-gray-300" placeholder="youtube.com/">
                                </div>
                                <x-jet-input-error for="url" class="mt-2" />
                            </div>

                            <div class="col-span-6 sm:col-span-4">
                                <x-jet-label for="serie" value="{{ __('Serie') }}" />
                                <select id="serie" name="serie_id" class="mt-1 block w-full pl-3 pr-10 py-2 text-base border-gray-300 focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm rounded-md">
                                    <option value="">-- Escolliu una serie --</option>
                                    @foreach (App\Models\Serie::all() as $serie)
                                        <option value="{{ $serie->id }}"> {{ $serie->title }}</option>
                                    @endforeach
                                </select>
                                <x-jet-input-error for="serie" class="mt-2" />
                            </div>

                            <div class="col-span-6 sm:col-span-4">
                                <x-jet-label for="user" value="{{ __('User') }}" />
                                <select id="user" name="user_id" class="mt-1 block w-full pl-3 pr-10 py-2 text-base border-gray-300 focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm rounded-md">
                                    <option value="">-- Escolliu un usuari --</option>
                                    @foreach (App\Models\User::all() as $user)
                                        <option value="{{ $user->id }}"> {{ $user->name }}</option>
                                    @endforeach
                                </select>
                                <x-jet-input-error for="user" class="mt-2" />
                            </div>
                    </x-slot>
                </x-jet-form-section>
            @endcan

            <div class="-my-2 overflow-x-auto sm:-mx-6 lg:-mx-8 mt-4">
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
