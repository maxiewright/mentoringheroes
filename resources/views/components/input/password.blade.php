<div {{$attributes->merge(['class' => ''])}}>
    <input type="password"
           name="{{$name}}"
           placeholder="{{$placeholder}}"
           class="border p-2 w-full @error($name) border-red-500 @enderror "
           value="{{old($name)}}"
    >
    @error($name)<div class="text-red-500"> {{$message}} </div> @enderror
</div>
