@props([
    'post',
    'featured' => null
])
<article {{$attributes->merge(['class' => 'transition-colors duration-300 hover:bg-gray-100 border border-black border-opacity-0 hover:border-opacity-5 rounded-xl'])}}
>
    <div class="py-6 px-5 {{$featured ? 'lg:flex' : ''}} ">
        <div class="{{$featured ? 'flex-1 lg:mr-8' : 'mb-4' }}">
            <img src="{{$post->image_path}}"
                 alt="Blog Post illustration"
                 class="rounded-xl">
        </div>

        <div class="flex-1 flex flex-col justify-between">
            <header class="mt-8 lg:mt-0">

                <div class="grid grid-cols-3 gap-2 mt-1">
                    @foreach($post->categories as $category)

                        <a href=""
                       class="px-3 block py-1 border border-blue-800 rounded-full text-blue-800 text-xs uppercase font-semibold"
                       style="font-size: 10px">{{$category?->name}}</a>
                    @endforeach
                </div>


                <div class="mt-4">

                    <h1 class="text-3xl">
                        <a href="{{route('posts.show', $post->slug)}}">
                            {{$post->title}}
                        </a>
                    </h1>

                    <span class="mt-2 block text-gray-400 text-xs">
                        Published <time>{{$post->created_at->diffForHumans()}}</time>
                    </span>
                </div>
            </header>

            <div class="text-sm mt-2">
                <p>
                    {!! $post->excerpt() !!}
                </p>
            </div>

            <footer class="flex justify-between items-center mt-8">
                <div class="flex items-center text-sm">
                    <img src="{{$post->author?->profile_photo_url}}" alt="{{$post->author?->name}}">
                    <div class="ml-3">
                        <h5 class="font-bold">{{$post->author?->name}}</h5>
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
