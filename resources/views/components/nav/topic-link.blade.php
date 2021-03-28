@props([
    'route' => null,
    'title' => null
])


<a href="{{route($route)}}" class="hover:bg-gray-400 rounded py-2 px-4 mx-2">{{$title}}</a>
