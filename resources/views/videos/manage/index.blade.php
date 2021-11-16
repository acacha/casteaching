<x-casteaching-layout>

    <div class="flex flex-col mt-10">

        @if(session()->has('status'))
            <div class="rounded-md bg-green-50 p-4">
            <div class="flex">
                <div class="flex-shrink-0">
                    <!-- Heroicon name: solid/check-circle -->
                    <svg class="h-5 w-5 text-green-400" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                        <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd" />
                    </svg>
                </div>
                <div class="ml-3">
                    <p class="text-sm font-medium text-green-800">
                        Successfully created
                    </p>
                </div>
                <div class="ml-auto pl-3">
                    <div class="-mx-1.5 -my-1.5">
                        <button type="button" class="inline-flex bg-green-50 rounded-md p-1.5 text-green-500 hover:bg-green-100 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-offset-green-50 focus:ring-green-600">
                            <span class="sr-only">Dismiss</span>
                            <!-- Heroicon name: solid/x -->
                            <svg class="h-5 w-5" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                                <path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd" />
                            </svg>
                        </button>
                    </div>
                </div>
            </div>
        </div>
        @endif

        @can('videos_manage_create')
            <!-- This example requires Tailwind CSS v2.0+ -->
                <div class="-my-2 overflow-x-auto sm:-mx-6 lg:-mx-8">
                <div class="py-2 align-middle inline-block min-w-full sm:px-6 lg:px-8">
                    <div class="p-4">
                            <div class="md:grid md:grid-cols-3 md:gap-6">
                                <div class="md:col-span-1">
                                    <div class="px-4 sm:px-0">
                                        <h3 class="text-lg font-medium leading-6 text-gray-900">Vídeos</h3>
                                        <p class="mt-1 text-sm text-gray-600">
                                            Informació bàsica del vídeo
                                        </p>
                                    </div>
                                </div>
                                <div class="mt-5 md:mt-0 md:col-span-2">
                                    <form data-qa="form_video_create" action="#" method="POST" >
                                        @csrf
                                        <div class="shadow sm:rounded-md sm:overflow-hidden">
                                            <div class="px-4 py-5 bg-white space-y-6 sm:p-6">

                                                <div>
                                                    <label for="title" class="block text-sm font-medium text-gray-700">
                                                        Title
                                                    </label>
                                                    <div class="mt-1">
                                                        <input required id="title" name="title" rows="3" class="shadow-sm focus:ring-indigo-500 focus:border-indigo-500 mt-1 block w-full sm:text-sm border border-gray-300 rounded-md p-2" placeholder="Titol del vídeo"></input>
                                                    </div>
                                                    <p class="mt-2 text-sm text-gray-500">
                                                        Titol curt del nostre vídeo
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
                                                        Brief description for your profile. URLs are hyperlinked.
                                                    </p>
                                                </div>

                                                <div class="grid grid-cols-3 gap-6">
                                                    <div class="col-span-3 sm:col-span-2">
                                                        <label for="url" class="block text-sm font-medium text-gray-700">
                                                            URL
                                                        </label>
                                                        <div class="mt-1 flex rounded-md shadow-sm">
                  <span class="inline-flex items-center px-3 rounded-l-md border border-r-0 border-gray-300 bg-gray-50 text-gray-500 text-sm">
                    http://
                  </span>
                                                            <input required type="url" name="url" id="url" class="focus:ring-indigo-500 focus:border-indigo-500 flex-1 block w-full rounded-none rounded-r-md sm:text-sm border-gray-300" placeholder="youtube.com/">
                                                        </div>
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
                            <th scope="col" class="relative px-6 py-3">
                                <span class="sr-only">Actions</span>
                            </th>
                        </tr>
                        </thead>
                        <tbody>
                        <!-- Odd row -->
                        @foreach($videos as $video)
                            <tr class="bg-white">
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
                            <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium">
                                <a href="/videos/{{$video->id}}" target="_blank" class="text-indigo-600 hover:text-indigo-900">Show</a>
                                <a href="#" class="text-indigo-600 hover:text-indigo-900">Edit</a>
                                <a href="#" class="text-indigo-600 hover:text-indigo-900">Delete</a>
                            </td>
                        </tr>
                        @endforeach
                        <!-- Even row -->
{{--                        <tr class="bg-gray-50">--}}
{{--                            <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900">--}}
{{--                                Cody Fisher--}}
{{--                            </td>--}}
{{--                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">--}}
{{--                                Product Directives Officer--}}
{{--                            </td>--}}
{{--                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">--}}
{{--                                cody.fisher@example.com--}}
{{--                            </td>--}}
{{--                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">--}}
{{--                                Owner--}}
{{--                            </td>--}}
{{--                            <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium">--}}
{{--                                <a href="#" class="text-indigo-600 hover:text-indigo-900">Edit</a>--}}
{{--                            </td>--}}
{{--                        </tr>--}}
                           </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

</x-casteaching-layout>
