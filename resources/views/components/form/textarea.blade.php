@props([
    'type',
    'placeholder',
    'model' => null,
    'cols',
    'rows'
])


<div {{$attributes->merge(['class' => ''])}}>
    <textarea {{$attributes->wire('model')}}
              type="text"
              cols="{{$cols}}"
              rows="{{$rows}}"
              placeholder="{{$placeholder}}"
              class="border p-2 w-full @error($model) border-red-500 @enderror"
    ></textarea>
    @error($model)<div class="text-red-500"> {{$message}} </div> @enderror
</div>
