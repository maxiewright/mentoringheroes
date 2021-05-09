@props([
    'value' => 'Submit',
])

<input type='submit'
       {{$attributes->merge(['class' => 'bg-blue-800 hover:bg-blue-700 text-white py-1 px-4 border rounded tracking-wide mr-1'])}}
       value='{{$value}}'
>



