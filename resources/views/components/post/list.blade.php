@props([
    'post'
])

<a href="{{route('posts.show', $post->id)}}">
    <li class="flex flex-row pb-3 hover:opacity-75">
        <div class="flex flex-col md:w-1/4">
            <img src="{{$post->image}}" class="h-20 w-20" alt="">
        </div>
        <div class="flex flex-col md:w-3/4 pl-2">
            <div class="pb-1 text-blue-700 text-sm">
                {{$post->mainCategory->name ?? ''}}
            </div>
            <p class="uppercase text-sm no-underline font-bold hover:text-blue-700 leading-tight">
                {{$post->title}}
            </p>
        </div>
    </li>
</a>
