<x-casteaching-layout>

    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ $serie->title }}
        </h2>
    </x-slot>

    <div class="flex flex-col mt-10">

        <div class="mx-auto sm:px-6 lg:px-8 w-full max-w-7xl">

            @can('series_manage_create')
                <x-status></x-status>

                <x-jet-form-section data-qa="form_serie_edit">
                    <x-slot name="title">
                        {{ __('Series') }}
                    </x-slot>

                    <x-slot name="description">
                        {{ __('Informació bàsica de la sèrie') }}
                    </x-slot>

                    <x-slot name="actions">
                        <x-jet-button>
                            {{ __('Modifica') }}
                        </x-jet-button>
                    </x-slot>

                    <x-slot name="form">
                        @csrf
                        @method('PUT')
                        <div class="col-span-6 sm:col-span-4">
                            <x-jet-label for="title" value="{{ __('Title') }}" />
                            <x-jet-input id="title" name="title" type="text" class="mt-1 block w-full" autocomplete="name" required value="{{ $serie->title }}"/>
                            <x-jet-input-error for="title" class="mt-2" />
                        </div>

                        <div class="col-span-6 sm:col-span-4">
                            <x-jet-label for="description" value="{{ __('Description') }}" />
                            <textarea required id="description" name="description" rows="3" class="shadow-sm focus:ring-indigo-500 focus:border-indigo-500 mt-1 block w-full sm:text-sm border border-gray-300 rounded-md" placeholder="Description">{{ $serie->description }}</textarea>
                            <x-jet-input-error for="description" class="mt-2" />
                        </div>
                    </x-slot>
                </x-jet-form-section>

                <x-jet-section-border />

                <x-jet-form-section data-qa="form_serie_image_edit" action="/manage/series/{{ $serie->id }}/image" enctype="multipart/form-data">
                    <x-slot name="title">
                        {{ __('Imatge de la sèrie') }}
                    </x-slot>

                    <x-slot name="description">
                        {{ __('Aquí podeu modificar la vostra imatge') }}
                    </x-slot>

                    <x-slot name="form">
                        @csrf
                        @method('PUT')
                        <div class="col-span-6 sm:col-span-4">
                            <x-jet-label for="image" value="{{ __('Imatge') }}" />

                            <div x-data="{imageName: null, imagePreview: null}" class="col-span-6 sm:col-span-4">
                                <!-- Profile Photo File Input -->
                                <input type="file" class="hidden"
                                       name="image"
                                       x-ref="image"
                                       x-on:change="
                                    imageName = $refs.image.files[0].name;
                                    const reader = new FileReader();
                                    reader.onload = (e) => {
                                        imagePreview = e.target.result;
                                    };
                                    reader.readAsDataURL($refs.image.files[0]);
                            " />

                                <!-- Current Serie Image -->
                                <div class="mt-2" x-show="! imagePreview">
                                    <img class="h-48 w-full object-cover" src="/storage/{{$serie->image_url}}" alt="">
                                </div>

                                <!-- New Serie Image Preview -->
                                <div class="mt-2" x-show="imagePreview">
                                    <span class="block h-48 bg-cover bg-no-repeat bg-center"
                                          x-bind:style="'background-image: url(\'' + imagePreview + '\');'">
                                    </span>
                                </div>

                                <x-jet-secondary-button class="mt-2 mr-2" type="button" x-on:click.prevent="$refs.image.click()">
                                    {{ __('Escolliu una imatge') }}
                                </x-jet-secondary-button>

                                @if ($serie->image )
                                    {{--                                    // TODO LIVEWIRE                        --}}
                                    <x-jet-secondary-button type="button" class="mt-2" wire:click="deleteProfilePhoto">
                                        {{ __('Eliminar') }}
                                    </x-jet-secondary-button>
                                @endif

                                <x-jet-input-error for="image" class="mt-2" />
                            </div>
                        </div>

                    </x-slot>

                    <x-slot name="actions">
                        <x-jet-button>
                            {{ __('Modifica') }}
                        </x-jet-button>
                    </x-slot>
                </x-jet-form-section>
            @endcan



        </div>
    </div>

</x-casteaching-layout>
