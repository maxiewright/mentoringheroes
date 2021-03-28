@props([
    'type',
    'name',
    'placeholder',
    'model' => null
])

<div {{$attributes->merge(['class' => ''])}}>

    <input wire:model="{{$model}}"
           type="{{$type}}"
           placeholder="{{$placeholder}}"
           class="border p-2 w-full @error($model) border-red-500 @enderror "
    >
    @error($model)<div class="text-red-500"> {{$message}} </div> @enderror
</div>
