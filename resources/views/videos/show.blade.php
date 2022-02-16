<x-casteaching-layout>
{{--    https://tailwindui.com/components/application-ui/page-examples/home-screens--}}
    <div id="layout_series_navigation" class="min-h-full" x-data="{ open: false }">
        <!-- Off-canvas menu for mobile, show/hide based on off-canvas menu state. -->
        <div x-show="open" class="fixed inset-0 flex z-40 lg:hidden" role="dialog" aria-modal="true">
            <!--
              Off-canvas menu overlay, show/hide based on off-canvas menu state.

              Entering: "transition-opacity ease-linear duration-300"
                From: "opacity-0"
                To: "opacity-100"
              Leaving: "transition-opacity ease-linear duration-300"
                From: "opacity-100"
                To: "opacity-0"
            -->
            <div class="fixed inset-0 bg-gray-600 bg-opacity-75" aria-hidden="true"></div>

            <!--
              Off-canvas menu, show/hide based on off-canvas menu state.

              Entering: "transition ease-in-out duration-300 transform"
                From: "-translate-x-full"
                To: "translate-x-0"
              Leaving: "transition ease-in-out duration-300 transform"
                From: "translate-x-0"
                To: "-translate-x-full"
            -->
            <div class="relative flex-1 flex flex-col max-w-xs w-full pt-5 pb-4 bg-white">
                <!--
                  Close button, show/hide based on off-canvas menu state.

                  Entering: "ease-in-out duration-300"
                    From: "opacity-0"
                    To: "opacity-100"
                  Leaving: "ease-in-out duration-300"
                    From: "opacity-100"
                    To: "opacity-0"
                -->
                <div class="absolute top-0 right-0 -mr-12 pt-2">
                    <button type="button"
                            class="ml-1 flex items-center justify-center h-10 w-10 rounded-full focus:outline-none focus:ring-2 focus:ring-inset focus:ring-white"
                            x-on:click="open = false;"
                    >
                        <span class="sr-only">Close sidebar</span>
                        <!-- Heroicon name: outline/x -->
                        <svg class="h-6 w-6 text-white" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" aria-hidden="true">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                        </svg>
                    </button>
                </div>

                <div class="flex-shrink-0 flex items-center px-4">
                    <img class="w-10 h-10 bg-gray-300 rounded-full flex-shrink-0 mr-2" src="/storage/{{ $video->serie?->image_url }}" alt="">
                    <span class="w-80 truncate">{{ $video->serie?->title }}</span>
                </div>
                <div class="mt-5 flex-1 h-0 overflow-y-auto">
                    <nav class="px-2">
                        <div class="space-y-1">
                            @foreach ($videos_series as $sVideo)
                                @if ($sVideo->is($video))
                                         <!-- Current: "bg-gray-100 text-gray-900", Default: "text-gray-600 hover:text-gray-900 hover:bg-gray-50" -->
                                        <a href="/videos/{{ $sVideo->id }}" class="w-80 bg-gray-100 text-gray-900 group flex items-center px-2 py-2 text-base leading-5 font-medium rounded-md" aria-current="page">
                                            <!--
                                              Heroicon name: outline/home

                                              Current: "text-gray-500", Default: "text-gray-400 group-hover:text-gray-500"
                                            -->
                                            <svg class="text-gray-500 mr-3 flex-shrink-0 h-6 w-6" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" aria-hidden="true">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6" />
                                            </svg>
                                            <span class="w-64 truncate" title="{{ $sVideo->title }}">{{ $sVideo->title }}</span>
                                        </a>
                                    @else
                                        <a href="/videos/{{ $sVideo->id }}" class="w-80 text-gray-600 hover:text-gray-900 hover:bg-gray-50 group flex items-center px-2 py-2 text-base leading-5 font-medium rounded-md">
                                            <!-- Heroicon name: outline/view-list -->
                                            <svg class="text-gray-400 group-hover:text-gray-500 mr-3 flex-shrink-0 h-6 w-6" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" aria-hidden="true">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 10h16M4 14h16M4 18h16" />
                                            </svg>
                                            <span class="w-64 truncate" title="{{ $sVideo->title }}">{{ $sVideo->title }}</span>
                                        </a>
                                @endif
                            @endforeach
                        </div>
                    </nav>
                </div>
            </div>

            <div class="flex-shrink-0 w-14" aria-hidden="true">
                <!-- Dummy element to force sidebar to shrink to fit close icon -->
            </div>
        </div>
        <!-- Static sidebar for desktop -->
        <div class="hidden lg:flex lg:flex-col lg:w-96 lg:fixed lg:top-[64px] lg:bottom-0 lg:border-r lg:border-gray-200 lg:pt-5 lg:pb-4 lg:bg-gray-100">
            <div class="flex items-center flex-shrink-0 px-6">
                <img class="w-10 h-10 bg-gray-300 rounded-full flex-shrink-0 mr-2" src="/storage/{{ $video->serie?->image_url }}" alt="">
                <span class="w-80 truncate" title="{{ $video->serie?->title }}">{{ $video->serie?->title }}</span>
            </div>
            <!-- Sidebar component, swap this element with another sidebar if you like -->
            <div class="mt-6 h-0 flex-1 flex flex-col">
                <!-- Serie Teacher info -->
                <div class="px-3 relative inline-block text-left">
                    <div>
                        <button type="button" class="group w-full bg-gray-100 rounded-md px-3.5 py-2 text-sm text-left font-medium text-gray-700 hover:bg-gray-200 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-offset-gray-100 focus:ring-purple-500" id="options-menu-button" aria-expanded="false" aria-haspopup="true">
                            <span class="flex w-full justify-between items-center">
                              <span class="flex min-w-0 items-center justify-between space-x-3">
                                <img class="w-10 h-10 bg-gray-300 rounded-full flex-shrink-0" src="{{ $video->serie?->teacher_photo_url}}" alt="{{ $video->serie?->teacher_name }}">

                                <span class="flex-1 flex flex-col min-w-0">
                                  <span class="text-gray-900 text-sm font-medium truncate">{{ $video->serie?->teacher_name }}</span>
                                  <span class="text-gray-500 text-sm truncate">@jessyschwarz</span>
                                </span>
                              </span>
                            </span>
                        </button>
                    </div>
                </div>
{{--                <!-- Sidebar Search -->--}}
{{--                <div class="px-3 mt-5">--}}
{{--                    <label for="search" class="sr-only">Search</label>--}}
{{--                    <div class="mt-1 relative rounded-md shadow-sm">--}}
{{--                        <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none" aria-hidden="true">--}}
{{--                            <!-- Heroicon name: solid/search -->--}}
{{--                            <svg class="mr-3 h-4 w-4 text-gray-400" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">--}}
{{--                                <path fill-rule="evenodd" d="M8 4a4 4 0 100 8 4 4 0 000-8zM2 8a6 6 0 1110.89 3.476l4.817 4.817a1 1 0 01-1.414 1.414l-4.816-4.816A6 6 0 012 8z" clip-rule="evenodd" />--}}
{{--                            </svg>--}}
{{--                        </div>--}}
{{--                        <input type="text" name="search" id="search" class="focus:ring-indigo-500 focus:border-indigo-500 block w-full pl-9 sm:text-sm border-gray-300 rounded-md" placeholder="Search">--}}
{{--                    </div>--}}
{{--                </div>--}}
                <!-- Navigation -->
                <nav class="px-3 mt-6 overflow-y-auto">
                    <div class="space-y-1">
                        @foreach ($videos_series as $sVideo)
                            @if ($sVideo->is($video))
                                <!-- Current: "bg-gray-200 text-gray-900", Default: "text-gray-700 hover:text-gray-900 hover:bg-gray-50" -->
                                <a href="#" class="w-80 bg-gray-200 text-gray-900 group flex items-center px-2 py-2 text-sm font-medium rounded-md" aria-current="page">
                                    <!--
                                      Heroicon name: outline/home

                                      Current: "text-gray-500", Default: "text-gray-400 group-hover:text-gray-500"
                                    -->
                                    <svg class="text-gray-500 mr-3 flex-shrink-0 h-6 w-6" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" aria-hidden="true">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6" />
                                    </svg>
                                    <span class="w-80 truncate" title="{{ $sVideo->title }}">{{ $sVideo->title }}</span>
                                </a>
                            @else
                                    <a href="/videos/{{ $sVideo->id }}" class="w-80 text-gray-700 hover:text-gray-900 hover:bg-gray-50 group flex items-center px-2 py-2 text-sm font-medium rounded-md">
                                        <svg class="text-gray-500 mr-3 flex-shrink-0 h-6 w-6" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" aria-hidden="true">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6" />
                                        </svg>
                                        <span class="w-80 truncate" title="{{ $sVideo->title }}">{{ $sVideo->title }}</span>
                                    </a>
                            @endif
                        @endforeach
                    </div>
                </nav>
            </div>
        </div>
        <!-- Main column -->
        <div class="lg:pl-96 flex flex-col overflow-y-auto" style="height: calc(100vh - 65px);">
                <!-- Search header -->
                <div class="sticky top-0 z-10 flex-shrink-0 flex h-16 bg-white border-b border-gray-200 lg:hidden">
                    <!-- Sidebar toggle, controls the 'sidebarOpen' sidebar state. -->
                    <button type="button"
                            class="px-4 border-r border-gray-200 text-gray-500 focus:outline-none focus:ring-2 focus:ring-inset focus:ring-purple-500 lg:hidden"
                            x-on:click="open = true;">
                        <span class="sr-only">Open sidebar</span>
                        <!-- Heroicon name: outline/menu-alt-1 -->
                        <svg class="h-6 w-6" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" aria-hidden="true">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h8m-8 6h16" />
                        </svg>
                    </button>
                    <div class="flex-1 flex justify-between px-4 sm:px-6 lg:px-8">
                        <div class="flex-1 flex">
                            <div class="w-full flex md:ml-0">
                                <label for="search-field" class="sr-only">Search</label>
                                <div class="relative w-full text-gray-400 focus-within:text-gray-600">
                                    <div class="absolute inset-y-0 left-0 flex items-center pointer-events-none">
                                      <span class="hidden md:inline md:mr-2"><--</span> <img class="w-10 h-10 bg-gray-300 rounded-full flex-shrink-0 mr-2" src="/storage/{{ $video->serie?->image_url }}" alt="">
                                      <span class="w-48 truncate" title="{{ $video->serie?->title }}">{{ $video->serie?->title }}</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="flex items-center">
                            <!-- Profile dropdown -->
                            <div class="ml-3 relative">
                                <div>
                                    <button type="button" class="max-w-xs bg-white flex items-center text-sm rounded-full focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-purple-500" id="user-menu-button" aria-expanded="false" aria-haspopup="true">
                                        <span class="mr-3 hidden md:inline">{{ $video->serie?->teacher_name }}</span>
                                        <img class="h-8 w-8 rounded-full" src="{{ $video->serie?->teacher_photo_url }}" alt="">
                                    </button>
                                </div>

                                <!--
                                  Dropdown menu, show/hide based on menu state.

                                  Entering: "transition ease-out duration-100"
                                    From: "transform opacity-0 scale-95"
                                    To: "transform opacity-100 scale-100"
                                  Leaving: "transition ease-in duration-75"
                                    From: "transform opacity-100 scale-100"
                                    To: "transform opacity-0 scale-95"
                                -->
                            </div>
                        </div>
                    </div>
                </div>
                <div class="flex-1">
                    @include('videos.show_main')
                </div>
            </div>
    </div>

</x-casteaching-layout>

