<div>
    <div class="container mx-auto flex flex-wrap py-6">
            <!-- Posts Section -->
            <section class="w-full md:w-2/3 flex flex-col items-center px-3">

                <article class="flex flex-col shadow my-4">
                    <!-- Article Image -->
                    <a href="#" class="hover:opacity-75">
                        <img src="{{$post->image}}" class="object-fill w-full">
                    </a>
                    <div class="bg-white flex flex-col justify-start p-6">
                        <a href="#" class="text-blue-700 text-sm font-bold uppercase pb-4">{{$post->main_category->name}}</a>
                        <a href="#" class="text-3xl font-bold hover:text-gray-700 pb-4">{{$post->title}}</a>
                        <p href="#" class="text-sm pb-8">
                            By <a href="#" class="font-semibold hover:text-gray-800">{{$post->leadAuthor->name}}</a>
                        </p>
                        {!! $post->body !!}
                    </div>
                </article>
                {{--    TODO:: Add pagination to move to next and previous article --}}
                {{--    Previous and Next articles--}}

                <div class="w-full flex pt-6">
                    <a href="{{($previousPost) ? route('posts.show', $previousPost->id) :''}}" class="w-1/2 bg-white shadow cursor-pointer hover:shadow-md text-left p-6">
                        <p class="text-lg text-blue-800 font-bold flex items-center">
                           <i class="fas fa-arrow-left pr-1"></i>Previous</p>
                        <p class="pt-2">{{$previousPost->title ?? ''}}</p>
                    </a>

                    <a href="{{($nextPost) ? route('posts.show', $nextPost->id) : '' }}"  class="w-1/2 bg-white shadow cursor-pointer hover:shadow-md text-right p-6">
                        <p class="text-lg text-blue-800 font-bold flex items-center justify-end">
                            Next <i class="fas fa-arrow-right pl-1"></i></p>
                        <p class="pt-2">{{$nextPost->title ?? ''}}</p>
                    </a>

                </div>

                @if ($post->authors->count() > 1)
                    <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 xl:grid-cols-4 gap-4 mt-10 mb-10">
                        @foreach ($post->authors as $author)
                            <div class="flex flex-col items-center justify-center bg-white p-4 shadow rounded-lg">
                                <div
                                    class="inline-flex shadow-lg border border-gray-200 rounded-full overflow-hidden h-40 w-40">
                                    <img src="{{$author->profile_photo_url}}"
                                         alt=""
                                         class="h-full w-full">
                                </div>
                                <h2 class="mt-4 font-bold text-xl">{{$author->name}}</h2>

                                <p class="text-xs text-gray-500 text-center mt-3">
                                    {{$author->about}}
                                </p>

                                {{--                    TODO:: Extract into a component or view and make dynamic--}}
                                {{--Social media--}}
                                <div
                                    class="flex items-center justify-center md:justify-start text-2xl no-underline text-blue-800 pt-4">
                                    <a class="" href="#">
                                        <i class="fab fa-facebook"></i>
                                    </a>
                                    <a class="pl-4" href="#">
                                        <i class="fab fa-instagram"></i>
                                    </a>
                                    <a class="pl-4" href="#">
                                        <i class="fab fa-twitter"></i>
                                    </a>
                                    <a class="pl-4" href="#">
                                        <i class="fab fa-linkedin"></i>
                                    </a>
                                </div>
                            </div>
                        @endforeach
                    </div>
                @else
                    <div class="w-full flex flex-col text-center md:text-left md:flex-row shadow bg-white mt-10 mb-10 p-6">
                        <div class="w-full md:w-1/5 flex justify-center md:justify-start pb-4">
                            <img src="{{$post->leadAuthor->profile_photo_url ?? ''}}" class="rounded-full shadow h-32 w-32">
                        </div>
                        <div class="flex-1 flex flex-col justify-center md:justify-start">
                            <p class="font-semibold text-2xl">{{$post->leadAuthor->name ?? ''}}</p>
                            <p class="pt-2">{{$post->leadAuthor->about ?? ''}}</p>

                            {{--Social media--}}
                            <div
                                class="flex items-center justify-center md:justify-start text-2xl no-underline text-blue-800 pt-4">
                                <a class="" href="#">
                                    <i class="fab fa-facebook"></i>
                                </a>
                                <a class="pl-4" href="#">
                                    <i class="fab fa-instagram"></i>
                                </a>
                                <a class="pl-4" href="#">
                                    <i class="fab fa-twitter"></i>
                                </a>
                                <a class="pl-4" href="#">
                                    <i class="fab fa-linkedin"></i>
                                </a>
                            </div>
                        </div>
                    </div>
                @endif
            </section>

            <x-layout.front-end.aside>

            </x-layout.front-end.aside>


            {{--        <div class="w-full bg-white shadow flex flex-col my-4 p-6">--}}
            {{--            <p class="text-xl font-semibold pb-5">About Us</p>--}}
            {{--            <p class="pb-2">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Maecenas mattis est eu odio sagittis tristique. Vestibulum ut finibus leo. In hac habitasse platea dictumst.</p>--}}
            {{--            <a href="#" class="w-full bg-blue-800 text-white font-bold text-sm uppercase rounded hover:bg-blue-700 flex items-center justify-center px-2 py-3 mt-4">--}}
            {{--                Get to know us--}}
            {{--            </a>--}}
            {{--        </div>--}}

            {{--        <div class="w-full bg-white shadow flex flex-col my-4 p-6">--}}
            {{--            <p class="text-xl font-semibold pb-5">Pintrest</p>--}}
            {{--            <div class="grid grid-cols-3 gap-3">--}}
            {{--                <img class="hover:opacity-75" src="https://source.unsplash.com/collection/1346951/150x150?sig=1">--}}
            {{--                <img class="hover:opacity-75" src="https://source.unsplash.com/collection/1346951/150x150?sig=2">--}}
            {{--                <img class="hover:opacity-75" src="https://source.unsplash.com/collection/1346951/150x150?sig=3">--}}
            {{--                <img class="hover:opacity-75" src="https://source.unsplash.com/collection/1346951/150x150?sig=4">--}}
            {{--                <img class="hover:opacity-75" src="https://source.unsplash.com/collection/1346951/150x150?sig=5">--}}
            {{--                <img class="hover:opacity-75" src="https://source.unsplash.com/collection/1346951/150x150?sig=6">--}}
            {{--                <img class="hover:opacity-75" src="https://source.unsplash.com/collection/1346951/150x150?sig=7">--}}
            {{--                <img class="hover:opacity-75" src="https://source.unsplash.com/collection/1346951/150x150?sig=8">--}}
            {{--                <img class="hover:opacity-75" src="https://source.unsplash.com/collection/1346951/150x150?sig=9">--}}
            {{--            </div>--}}
            {{--            <a href="#" class="w-full bg-blue-800 text-white font-bold text-sm uppercase rounded hover:bg-blue-700 flex items-center justify-center px-2 py-3 mt-6">--}}
            {{--                <i class="fab fa-pinterest-square mr-2"></i>--}}
            {{--            </a>--}}
            {{--        </div>--}}

        </div>
</div>
