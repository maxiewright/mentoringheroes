@props([
    'post',
    'featured' => null
])
<article {{$attributes->merge(['class' => 'transition-colors duration-300 hover:bg-gray-100 border border-black border-opacity-0 hover:border-opacity-5 rounded-xl'])}}
>
    <div class="py-6 px-5 {{$featured ? 'lg:flex' : ''}} ">
        <div class="{{$featured ? 'flex-1 lg:mr-8 h-80' : 'mb-4 h-72' }} h-72">
            <img src="{{$post->image}}"
                 alt="Blog Post illustration"
                 class="h-full w-full rounded-xl">
        </div>

        <div class="flex-1 flex flex-col justify-between">
            <header class="mt-8 lg:mt-0">

                <div class="flex flex-wrap gap-2 mt-1">
                    @foreach($post->categories as $category)
                        <div wire:click="setCategory({{$category->id}})"
                              class="px-3 block py-1 border border-blue-800 rounded-full text-blue-800 text-xs uppercase font-semibold cursor-pointer"
                              style="font-size: 10px">{{$category?->name}}</div>
                    @endforeach
                </div>


                <div class="mt-4">

                    <h1 class="text-3xl">
                        <a href="{{route('posts.show', $post->slug)}}">
                            {{$post->title}}
                        </a>
                    </h1>

                    <span class="mt-2 block text-gray-400 text-xs">
                        Published
                        <time>{{$post->created_at->diffForHumans()}}</time>
                    </span>
                </div>
            </header>

            <div class="text mt-2">
                <p>
                    {!! $post->excerpt() !!}
                </p>
            </div>

            <footer class="flex justify-between items-center mt-8">
                    <div class="flex items-center text-sm">
                        <img class="rounded-full h-10 object-cover" src="{{$post->lead_author?->profile_photo_url}}" alt="{{$post->lead_author?->name}}">
                        <div class="ml-3">
                            <h5 class="font-bold">{{$post->lead_author?->name}}</h5>
                        </div>
                    </div>

                <div class="hidden lg:block">
                    <a href="{{route('posts.show', $post->slug)}}"
                       class="transition-colors duration-300 text-xs font-semibold bg-gray-200 hover:bg-gray-300 rounded-full py-2 px-8"
                    >Read More</a>
                </div>
            </footer>
        </div>
    </div>
</article>
