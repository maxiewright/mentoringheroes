<!DOCTYPE html>
<x-layouts.front-end.master>
    <div class="container mx-auto flex flex-wrap py-6">
        <!-- Post Section -->
        <article class="flex flex-col shadow my-4">
            <!-- Article Image -->
            <a href="#" class="hover:opacity-75">
                <img src="{{$post->image}}">
            </a>
            <div class="bg-white flex flex-col justify-start p-6">
                <a href="#" class="text-blue-700 text-sm font-bold uppercase pb-4">{{$post->main_category->name}}</a>
                <a href="#" class="text-3xl font-bold hover:text-gray-700 pb-4">{{$post->title}}</a>
                <p href="#" class="text-sm pb-8">
                    By <a href="#" class="font-semibold hover:text-gray-800">{{$post->leadAuthor->name}}</a>, Published
                    on {{$post->published_at->toFormattedDateString()}}
                </p>

                {!! $post->body !!}

            </div>
        </article>
        {{--    TODO:: Add pagination to move to next and previous article --}}
        {{--    Previous and Next articles--}}
        <div class="w-full flex pt-6">
            <a href="#" class="w-1/2 bg-white shadow hover:shadow-md text-left p-6">
                <p class="text-lg text-blue-800 font-bold flex items-center"><i class="fas fa-arrow-left pr-1"></i>
                    Previous</p>
                <p class="pt-2">Lorem Ipsum Dolor Sit Amet Dolor Sit Amet</p>
            </a>
            <a href="#" class="w-1/2 bg-white shadow hover:shadow-md text-right p-6">
                <p class="text-lg text-blue-800 font-bold flex items-center justify-end">Next <i
                        class="fas fa-arrow-right pl-1"></i></p>
                <p class="pt-2">Lorem Ipsum Dolor Sit Amet Dolor Sit Amet</p>
            </a>
        </div>

        @if ($post->authors->count() > 1)
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
        @else
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
        @endif

    </div>

</x-layouts.front-end.master>

