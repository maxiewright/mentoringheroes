@props([
    'signIn' => null,
])
<x-button.social-connect :signIn="$signIn" service="facebook">
    <x-slot name="icon">
        <x-icon.facebook class="w-5 h-5 fill-current"/>
    </x-slot>
</x-button.social-connect>
<x-button.social-connect :signIn="$signIn" service="google">
    <x-slot name="icon">
        <x-icon.facebook class="w-5 h-5 fill-current"/>
    </x-slot>
</x-button.social-connect>
<x-button.social-connect :signIn="$signIn" service="instagram">
    <x-slot name="icon">
        <x-icon.facebook class="w-5 h-5 fill-current"/>
    </x-slot>
</x-button.social-connect>
<x-button.social-connect :signIn="$signIn" service="twitter">
    <x-slot name="icon">
        <x-icon.facebook class="w-5 h-5 fill-current"/>
    </x-slot>
</x-button.social-connect>
<x-button.social-connect :signIn="$signIn" service="pinterest">
    <x-slot name="icon">
        <x-icon.facebook class="w-5 h-5 fill-current"/>
    </x-slot>
</x-button.social-connect>
<x-button.social-connect :signIn="$signIn" service="linkedin">
    <x-slot name="icon">
        <x-icon.facebook class="w-5 h-5 fill-current"/>
    </x-slot>
</x-button.social-connect>
<x-button.social-connect wire:click.prevent="$set('emailConnect', true)"
                         :signIn="$signIn" service="Email">
    <x-slot name="icon">
        <x-icon.facebook class="w-5 h-5 fill-current"/>
    </x-slot>
</x-button.social-connect>
