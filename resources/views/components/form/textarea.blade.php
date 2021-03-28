@props([
    'type',
    'placeholder',
    'model' => null
])




<div {{$attributes->merge(['class' => ''])}}>
    <textarea wire:model="{{$model}}"
                type="text"
              cols="{{$cols}}"
              rows="{{$rows}}"
              placeholder="{{$placeholder}}"
              class="border p-2 w-full @error($model) border-red-500 @enderror"
    ></textarea>
    @error($model)<div class="text-red-500"> {{$message}} </div> @enderror
</div>
