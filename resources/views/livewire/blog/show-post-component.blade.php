
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
                    <a href="#"
                       class="text-blue-700 text-sm font-bold uppercase pb-4">{{$post->main_category->name}}</a>
                    <a href="#" class="text-3xl font-bold hover:text-gray-700 pb-4">{{$post->title}}</a>
                    <p href="#" class="text-sm pb-8">
                        By <a href="#" class="font-semibold hover:text-gray-800">{{$post->leadAuthor->name}}</a>
                    </p>
                    {!! $post->body !!}
                </div>
            </article>
            {{--    TODO:: Add pagination to move to next and previous article --}}
            {{--    Previous and Next articles--}}
            <div class="w-full flex items-center">
                <x-alert.tooltip class="" data="Comment">
                    <span x-data="{usedKeyboard: false}"
                          @keydown.window.tab="usedKeyboard = true"
                          role="button" @click="$dispatch('open-menu', { open: true })"
                          :class="{'focus:outline-none': !usedKeyboard}"
                    >
                        <x-icon.message-square class="inline-block mr-1"/>
                        <span class="">{{$post->comments->count()}}</span>
                    </span>
                </x-alert.tooltip>
            </div>

            <div class="w-full flex pt-6">
                <a href="{{($previousPost) ? route('posts.show', $previousPost->slug) : ''}}"
                   class="w-1/2 bg-white shadow cursor-pointer hover:shadow-md text-left p-6">
                    <p class="text-lg text-blue-800 font-bold flex items-center">
                        <i class="fas fa-arrow-left pr-1"></i>Previous</p>
                    <p class="pt-2">{{$previousPost->title ?? ''}}</p>
                </a>

                <a href="{{($nextPost) ? route('posts.show', $nextPost->slug) : '' }}"
                   class="w-1/2 bg-white shadow cursor-pointer hover:shadow-md text-right p-6">
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
                                    <img src="{{$author->profile_photo_url}}" alt="" class="h-full w-full">
                                </div>
                                <h2 class="mt-4 font-bold text-xl">{{$author->name}}</h2>
                                <p class="text-xs text-gray-500 text-center mt-3">
                                    {{$author->about}}
                                </p>
                                {{--Social media--}}
{{--                                <div--}}
{{--                                    class="flex items-center justify-center md:justify-start text-2xl no-underline text-blue-800 pt-4">--}}
{{--                                    <a class="" href="https://www.facebook.com/">--}}
{{--                                        <i class="fab fa-facebook"></i>--}}
{{--                                    </a>--}}
{{--                                    <a class="pl-4" href="https://www.instagram.com/">--}}
{{--                                        <i class="fab fa-instagram"></i>--}}
{{--                                    </a>--}}
{{--                                    <a class="pl-4" href="https://twitter.com/">--}}
{{--                                        <i class="fab fa-twitter"></i>--}}
{{--                                    </a>--}}
{{--                                    <a class="pl-4" href="https://www.linkedin.com/">--}}
{{--                                        <i class="fab fa-linkedin"></i>--}}
{{--                                    </a>--}}
{{--                                </div>--}}
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
{{--                            <div--}}
{{--                                class="flex items-center justify-center md:justify-start text-2xl no-underline text-blue-800 pt-4">--}}
{{--                                <a class="" href="#">--}}
{{--                                    <i class="fab fa-facebook"></i>--}}
{{--                                </a>--}}
{{--                                <a class="pl-4" href="#">--}}
{{--                                    <i class="fab fa-instagram"></i>--}}
{{--                                </a>--}}
{{--                                <a class="pl-4" href="#">--}}
{{--                                    <i class="fab fa-twitter"></i>--}}
{{--                                </a>--}}
{{--                                <a class="pl-4" href="#">--}}
{{--                                    <i class="fab fa-linkedin"></i>--}}
{{--                                </a>--}}
{{--                            </div>--}}
                        </div>
                    </div>
                @endif


                <x-layout.side-panel>
                    <livewire:comment-component :post="$post" />
                </x-layout.side-panel>

            </section>




        {{--BEGIN: Aside--}}
        <x-layout.front-end.aside>
            <livewire:blog.aside.tab-component />
        </x-layout.front-end.aside>
        {{--END: Aside --}}
        </div>


</div>
<script>
    function slideout() {
        return {
            open: false,
            usedKeyboard: false,
            init() {
                this.$watch('open', value => {
                    value && this.$refs.closeButton.focus()
                    this.toggleOverlay()
                })
                this.toggleOverlay()
            },
            toggleOverlay() {
                document.body.classList[this.open ? 'add' : 'remove']('h-screen', 'overflow-hidden')
            }
        }
    }
</script>
