<div {{$attributes->merge(['class' => ''])}}>
    <input
        type="text"
           name="{{$name}}"
           placeholder="{{$placeholder}}"
           class="border p-2 w-full @error($name) border-red-500 @enderror "
           value="{{old($name)}}"
    >
    @error($name)<div class="text-red-500"> {{$message}} </div> @enderror
</div>

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
