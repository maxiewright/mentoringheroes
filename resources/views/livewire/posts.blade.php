<div class="container mx-auto flex flex-wrap py-6">
    @if ($featuredPost)
        {{-- Featured Article section --}}
        <section class="w-full md:w-2/3 flex flex-col items-center px-3">
            <article
                class="flex flex-col items-stretch transition-all duration-150 bg-white rounded-lg shadow-lg hover:shadow-2xl">
                <!-- Article Image -->
                <a href="#" class="hover:opacity-75">
                    <img src="{{$featuredPost->image ?? ''}}" class="h- object-fill w-full rounded-l rounded-r">
                </a>
                <div class="bg-white flex flex-col justify-start p-6">
                    <a href="#"
                       class="text-blue-700 text-sm font-bold uppercase pb-4">{{$featuredPost->main_category->name}}</a>
                    <a href="#" class="text-3xl font-bold hover:text-gray-700 pb-4">
                        {{$featuredPost->title }}
                    </a>
                    <p href="#" class="text-sm pb-3">
                        By <a href="#"
                              class="font-semibold hover:text-gray-800">{{$featuredPost->lead_author->name}}</a>,
                        {{$featuredPost->published_at->toFormattedDateString()}}
                    </p>
                    <a href="{{route('posts.show', $featuredPost->id)}}" class="pb-6">
                        {!!$featuredPost->excerpt !!}
                    </a>
                    <a href="{{route('posts.show', $featuredPost->id)}}"
                       class="uppercase text-gray-800 hover:text-black">
                        Continue Reading
                        <i class="fas fa-arrow-right"></i></a>
                </div>
            </article>
            @endif
        </section>

        <aside class="w-full md:w-1/3 flex flex-col items-center px-3">

            <div class="w-full bg-white shadow flex flex-col my-4 p-6">
                <p class="text-xl font-semibold pb-5">About Us</p>
                <p class="pb-2">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Maecenas mattis est eu odio
                    sagittis tristique. Vestibulum ut finibus leo. In hac habitasse platea dictumst.</p>
                <a href="#"
                   class="w-full bg-blue-800 text-white font-bold text-sm uppercase rounded hover:bg-blue-700 flex items-center justify-center px-2 py-3 mt-4">
                    Get to know us
                </a>
            </div>

            <div class="w-full bg-white shadow flex flex-col my-4 p-6">
                <p class="text-xl font-semibold pb-5">Instagram</p>
                <div class="grid grid-cols-3 gap-3">
                    <img class="hover:opacity-75" src="https://source.unsplash.com/collection/1346951/150x150?sig=1">
                    <img class="hover:opacity-75" src="https://source.unsplash.com/collection/1346951/150x150?sig=2">
                    <img class="hover:opacity-75" src="https://source.unsplash.com/collection/1346951/150x150?sig=3">
                    <img class="hover:opacity-75" src="https://source.unsplash.com/collection/1346951/150x150?sig=4">
                    <img class="hover:opacity-75" src="https://source.unsplash.com/collection/1346951/150x150?sig=5">
                    <img class="hover:opacity-75" src="https://source.unsplash.com/collection/1346951/150x150?sig=6">
                    <img class="hover:opacity-75" src="https://source.unsplash.com/collection/1346951/150x150?sig=7">
                    <img class="hover:opacity-75" src="https://source.unsplash.com/collection/1346951/150x150?sig=8">
                    <img class="hover:opacity-75" src="https://source.unsplash.com/collection/1346951/150x150?sig=9">
                </div>
                <a href="#"
                   class="w-full bg-blue-800 text-white font-bold text-sm uppercase rounded hover:bg-blue-700 flex items-center justify-center px-2 py-3 mt-6">
                    <i class="fab fa-instagram mr-2"></i> Follow @dgrzyb
                </a>
            </div>

        </aside>

        {{-- Latest Article section --}}
        <section class="flex flex-row flex-wrap mt-2">
            <!-- Section Header -->
            <x-typography.section-header> Latest Articles</x-typography.section-header>

            <!-- Articles -->
            @foreach($posts as $post)
                <a href="{{route('posts.show', $post->id)}}">
                    <article class="transition-all duration-150 flex w-full px-4 py-6 lg:w-1/3">
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
                                    <span
                                        class="text-xs font-medium text-blue-700 uppercase">{{$post->main_category->name}}</span>
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
                            <p class="flex flex-row flex-wrap w-full px-4 py-2 overflow-hidden text-sm text-justify text-gray-800"
                            >
                                {!! $post->excerpt !!}
                            </p>
                            <hr class="border-gray-300"/>
                            <div class="px-4 py-2 mt-2">
                                <div class="flex items-center justify-between">

                                    <div class="flex items-center flex-1">
                                        <img
                                            class="object-cover h-10 rounded-full"
                                            {{--                                    src="{{$post->lead_author->profile_photo_url}}"--}}
                                            alt="Avatar"
                                        />
                                        <div class="flex flex-col mx-2">
                                            <a href="" class="font-semibold hover:text-gray-800 hover:underline">
                                                <span class="nice">{{$post->lead_author->name ?? ''}}</span>
                                            </a>
                                            <span
                                                class="mx-1 text-xs hover:text-gray-600">{{$post->published_at->toFormattedDateString()}}</span>
                                        </div>
                                    </div>
                                    {{--TODO::add read time calculator --}}
                                    {{--                            <p class="mt-1 text-xs hover:text-gray-600">9 minutes read</p>--}}
                                </div>
                            </div>
                        </div>
                    </article>
                </a>
        @endforeach
        <!-- Pagination -->
            <div class="w-full flex justify-center">
                {{ $posts->links('vendor.pagination.tailwind')}}
            </div>
        </section>
</div>
