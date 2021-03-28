@props([
    'field' => null,
    'menuItem' => null,
])

<div wire:click.prevent="setMenuItem('{{$field}}')"
     class=" items-center cursor-pointer px-3 py-2
     @if($menuItem != $field) hover:text-blue-700 hover:font-medium hover:underline @endif
     @if($menuItem == $field) hover:bg-white hover:text-blue-700 bg-blue-700 text-white font-medium rounded @endif"
>
    <span class="italic text-xl font-bold">{{strtoupper($field)}}</span>
</div>


