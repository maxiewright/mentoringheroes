<div {{$attributes->merge(['class' => ''])}}>
    <textarea type="text"
              name="{{$name}}"
              cols="{{$cols}}"
              rows="{{$rows}}"
              placeholder="{{$placeholder}}"
              class="border p-2 w-full @error($name) border-red-500 @enderror"
    >{{old($name)}}</textarea>
    @error($name)<div class="text-red-500"> {{$message}} </div> @enderror
</div>
