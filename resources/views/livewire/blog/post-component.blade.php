<div class="container mx-auto flex flex-wrap py-6">
    @if ($featuredPost)
        {{-- BEGIN: Featured Article Section --}}
        <section class="w-full md:w-2/3 flex flex-col items-center px-3 mt-4">
            <article class="flex flex-col shadow my-4 hover:shadow-1xl">
                <!-- Article Image -->
                <a href="{{route('posts.show', $featuredPost->slug)}}" class="hover:opacity-75">
                    <img src="{{$featuredPost->image ?? ''}}" class="h-full w-full object-fill w-full rounded-l rounded-r">
                </a>
                <div class="bg-white flex flex-col justify-start p-6">
                    <a href="#"
                       class="text-blue-700 text-sm font-bold uppercase pb-4">{{$featuredPost->main_category->name}}</a>

                    <a href="{{route('posts.show', $featuredPost->slug)}}"
                       class="text-3xl font-bold hover:text-gray-700 pb-4">{{$featuredPost->title}}</a>

                    <p href="#" class="text-sm pb-3">
                        By <a href="{{route('about')}}"
                              class="font-semibold hover:text-gray-800">{{$featuredPost->lead_author->name}}</a>,
                        Published on {{$featuredPost->published_at->toFormattedDateString()}}
                    </p>

                    <div class="pb-6">
                        <a href="{{route('posts.show', $featuredPost->slug)}}">
                            {{$featuredPost->excerpt(500)}}
                        </a>
                    </div>

                    <a href="{{route('posts.show', $featuredPost->slug)}}"
                       class="uppercase text-gray-800 hover:text-black">
                        Continue Reading <i class="fas fa-arrow-right"></i>
                    </a>
                </div>
            </article>
            @endif
        </section>
        {{--END: Fretured Article Section--}}

        {{--BEGIN: Aside--}}
        <x-layout.front-end.aside>
            <livewire:blog.aside.tab-component/>
        </x-layout.front-end.aside>
        {{--END: Aside --}}

        {{-- BEGIN:  Latest Article section --}}
        <section class="flex flex-row flex-wrap mt-2">
            <!-- Section Header -->
            <x-typography.section-header> Latest Articles </x-typography.section-header>

            <!-- Articles -->
            @foreach($posts as $post)
                <article class="w-full md:w-1/3 p-6 flex flex-col">
                    <div class="flex-1 bg-white rounded-t rounded-b-none overflow-hidden shadow-lg">
                        <!-- Article Image -->
                        <a href="{{route('posts.show', $post->slug)}}" class="hover:opacity-75">
                            <img src="{{$post->image ?? ''}}" class="h-64 object-fill w-full rounded-l rounded-r">
                        </a>
                        <div class="bg-white flex flex-col justify-start p-6">
                            <a href="#"
                               class="text-blue-700 text-sm font-bold uppercase pb-3">{{$post->main_category->name}}</a>

                            <a href="{{route('posts.show', $post->slug)}}"
                               class="text-3xl font-bold hover:text-gray-700 pb-3">{{$post->title}}</a>

                            <p href="#" class="text-sm pb-3">
                                By <a href="{{route('about')}}"
                                      class="font-semibold hover:text-gray-800">{{$post->lead_author->name}}</a>,
                                Published on {{$featuredPost->published_at->toFormattedDateString()}}
                            </p>

                            <div class="pb-4">
                                <a href="{{route('posts.show', $post->slug)}}">
                                    {{$post->excerpt(200)}}
                                </a>
                            </div>

                            <a href="{{route('posts.show', $post->slug)}}"
                               class="uppercase text-gray-800 hover:text-black">
                                Continue Reading <i class="fas fa-arrow-right"></i>
                            </a>
                        </div>
                    </div>
                </article>
        @endforeach
        <!-- Pagination -->
            <div class="w-full flex justify-center">
                {{ $posts->links('vendor.pagination.tailwind')}}
            </div>
        </section>
</div>

