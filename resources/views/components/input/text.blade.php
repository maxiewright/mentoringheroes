@props([
    'type' => 'text',
    'name' => null,
    'placeholder' => null,
    'label' => null
])

<div {{$attributes->merge(['class' => ''])}}>
    @if($label)
        <label>{{$label}}</label>
    @endif

    <input {{$attributes->wire('model')}}
           name="{{$name}}"
           type="{{$type}}"
           placeholder="{{$placeholder}}"
           class="border p-2 w-full @error($name) border-red-500 @enderror "
    >
    @error($name)
    <div class="text-sm text-red-500"> {{$message}} </div> @enderror
</div>
