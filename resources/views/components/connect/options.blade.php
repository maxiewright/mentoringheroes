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
        <x-icon.google class="w-5 h-5 fill-current"/>
    </x-slot>
</x-button.social-connect>

<x-button.social-connect :signIn="$signIn" service="twitter">
    <x-slot name="icon">
        <x-icon.twitter class="w-5 h-5 fill-current"/>
    </x-slot>
</x-button.social-connect>

<x-button.social-connect wire:click.prevent="signUp()"
                         :signIn="$signIn" service="Email">
    <x-slot name="icon">
        <x-icon.mail class="w-5 h-5 fill-current"/>
    </x-slot>
</x-button.social-connect>


