<div {{$attributes->merge(['class' => ''])}}>
    <input
        {{$attributes->wire('model')}}
        type="text"
        name="{{$name}}"
        placeholder="{{$placeholder}}"
        class="border p-2 w-full @error($name) border-red-500 @enderror"
    >
    @error($name)<div class="text-red-500"> {{$message}} </div> @enderror
</div>
