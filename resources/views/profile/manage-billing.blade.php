<x-jet-action-section>
    <x-slot name="title">
        {{ __('Billing') }}
    </x-slot>

    <x-slot name="description">
        {{ __('Manage here your subscription.') }}
    </x-slot>

    <x-slot name="content">
        <a href="{{ route('kanuu.redirect', Auth::user()) }}" class="...">
            <x-jet-button type="button">
                {{ __('Manage subscription') }}
            </x-jet-button>
        </a>
    </x-slot>
</x-jet-action-section>
