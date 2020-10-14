<!DOCTYPE html>
<x-layouts.blog.master>
    @if ($featuredPost)
        <!-- Featured post -->
            <section class=" flex flex-row mx-auto">
                <div class="transition-all duration-150 flex w-full px-4 py-6">
                    <div
                        class="flex flex-row items-stretch transition-all duration-150 bg-white rounded-lg shadow-lg hover:shadow-2xl">
                        <!-- Featured Image -->
                        <div class="flex flex-col md:w-1/2 lg:w-1/3">
                            <img
                                src="{{$featuredPost->image ?? ''}}"
                                alt="Blog Cover"
                                class="object-fill w-full rounded-l"
                            />
                        </div>
                        <div class="bg-white flex flex-col p-4 md:w-1/2 lg:w-2/3">
                            <a href="#" class="text-blue-700 text-sm font-bold uppercase pb-4">{{$featuredPost->main_category->name}}</a>
                            <a href="#" class="text-3xl font-bold hover:text-gray-700 pb-4">{{$featuredPost->title }}</a>
                            <p href="#" class="text-sm pb-3">
                                By <a href="#" class="font-semibold hover:text-gray-800">{{$featuredPost->lead_author->name}}</a>,
                                Published on {{$featuredPost->published_at->toFormattedDateString()}}
                            </p>
                            <a href="#" class="pb-6">{{$featuredPost->excerpt}}</a>
                            <a href="{{route('posts.show', $featuredPost->id)}}" class="uppercase text-gray-800 hover:text-black">Continue Reading <i
                                    class="fas fa-arrow-right"></i></a>
                        </div>
                    </div>
                </div>
            </section>
    @endif
    <div class="w-full bg-gary-100 container mx-auto">
        <div class="flex flex-col items-center py-6">
            <a href="#" class="font-bold text-gray-800 uppercase hover:text-gary-700 text-3xl">
                Latest Articles
            </a>
        </div>
    </div>
    {{--    Latest Posts--}}
    <section class="container flex flex-row flex-wrap mx-auto">
        @foreach($posts as $post)
            <div class="transition-all duration-150 flex w-full px-4 py-6 md:w-1/2 lg:w-1/3">
                <div
                    class="flex flex-col items-stretch min-h-full pb-4 mb-6 transition-all duration-150 bg-white rounded-lg shadow-lg hover:shadow-2xl">
                    <div class="md:flex-shrink-0">
                        <img
                            src="{{$post->image}}"
                            alt="Featured Image"
                            class="object-fill w-full rounded-lg rounded-b-none md:h-56"
                        />
                    </div>
                    <div class="flex items-center justify-between px-4 py-2 overflow-hidden">
                        @if ($post->main_category)
                            <span class="text-xs font-medium text-blue-700 uppercase">{{$post->main_category->name}}</span>
                        @endif

                        <div class="flex flex-row items-center">
                            @include('blog.partials.stats.views')
                            @include('blog.partials.stats.comments')
                            @include('blog.partials.stats.likes')
                        </div>
                    </div>
                    <hr class="border-gray-300"/>
                    <div class="flex flex-wrap items-center flex-1 px-4 py-1 text-center mx-auto">
                        <a href="{{route('posts.show', $post->id)}}" class="hover:underline">
                            <h2 class="text-2xl font-bold hover:text-gray-700">
                                {{$post->title}}
                            </h2>
                        </a>
                    </div>
                    <hr class="border-gray-300"/>
                    <p
                        class="flex flex-row flex-wrap w-full px-4 py-2 overflow-hidden text-sm text-justify text-gray-800"
                    >
                        {{$post->excerpt}}
                    </p>
                    <hr class="border-gray-300"/>
                    <section class="px-4 py-2 mt-2">
                        <div class="flex items-center justify-between">

                            <div class="flex items-center flex-1">
                                <img
                                    class="object-cover h-10 rounded-full"
                                    src="{{$post->lead_author->profile_photo_url}}"
                                    alt="Avatar"
                                />
                                <div class="flex flex-col mx-2">
                                    <a href="" class="font-semibold hover:text-gray-800 hover:underline">
                                        <span class="nice">{{$post->lead_author->name}}</span>
                                    </a>
                                    <span
                                        class="mx-1 text-xs hover:text-gray-600">{{$post->published_at->toFormattedDateString()}}</span>
                                </div>
                            </div>
                            {{--TODO::add read time calculator --}}
{{--                            <p class="mt-1 text-xs hover:text-gray-600">9 minutes read</p>--}}
                        </div>
                    </section>
                </div>
            </div>
        @endforeach
    </section>
    <!-- Pagination -->
    <section class="flex flex-row flex-wrap mx-auto">
{{--        <div class="flex items-center py-8">--}}
{{--            <a href="#"--}}
{{--               class="h-10 w-10 bg-blue-800 hover:bg-blue-600 font-semibold text-white text-sm flex items-center justify-center">1</a>--}}
{{--            <a href="#"--}}
{{--               class="h-10 w-10 font-semibold text-gray-800 hover:bg-blue-600 hover:text-white text-sm flex items-center justify-center">2</a>--}}
{{--            <a href="#"--}}
{{--               class="h-10 w-10 font-semibold text-gray-800 hover:text-gray-900 text-sm flex items-center justify-center ml-3">--}}
{{--                Next--}}
{{--                <i class="fas fa-arrow-right ml-2"></i></a>--}}
{{--        </div>--}}

        {{ $posts->links() }}
    </section>


</x-layouts.blog.master>


