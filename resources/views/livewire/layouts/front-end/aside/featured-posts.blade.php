<div class="w-full bg-white shadow flex flex-col my-4 p-6">
    <p class="text-xl font-semibold pb-5">Featured Articles</p>
    <ul class="w-full">
        @foreach ($featuredPosts as $post)
            <li class="flex flex-row pb-3">
                <span class="flex flex-col md:w-1/4">
                   <img src="{{$post->image}}" alt="" height="70" width="70">
                </span>
                <span class="flex flex-col md:w-3/4">
                    <h4 class="pb-1">
                        <a class=" no-underline hover:underline hover:text-blue-700"
                           href="{{route('posts.show', $post->id)}}">{{$post->title}}</a>
                    </h4>
                <p class="no-underline hover:underline text-blue-700">
                    {{$post->mainCategory->name ?? ''}}
                </p>
                </span>
            </li>
        @endforeach
    </ul>
</div>
