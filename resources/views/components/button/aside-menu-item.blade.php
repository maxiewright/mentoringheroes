@props([
    'field' => null,
    'menuItem' => null,
])

<div wire:click.prevent="setMenuItem('{{$field}}')"
     class=" items-center cursor-pointer px-3 py-2
     @if($menuItem != $field) hover:text-blue-700 hover:font-medium hover:underline @endif
     @if($menuItem == $field)  bg-blue-700 text-white font-medium rounded-lg focus:shadow-outline hover:bg-blue-800 @endif"
>
    <span class="italic text-xl font-bold">{{strtoupper($field)}}</span>
</div>


