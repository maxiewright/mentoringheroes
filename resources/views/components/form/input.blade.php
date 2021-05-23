@props([
    'name' => null,
    'placeholder' => null,
    'value' => null,
    'type' => null,
])

<div {{$attributes->merge(['class' => ''])}}>
    <input
        {{$attributes->wire('model')}}
        @if($value) value="{{$value}}" @endif
        type="{{$type ?? 'text'}}"
        name="{{$name}}"
        placeholder="{{$placeholder}}"
        class="border p-2 w-full @error($name) border-red-500 @enderror"
    >
    @error($name)<div class="text-sm text-red-500"> {{$message}} </div> @enderror
</div>
