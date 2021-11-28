<div>
    <x-category-nav-layout >
        <select wire:model="category" class="form-select block w-full sm:w-64">
            <option value="">{{__('Categories')}}</option>
            @foreach($categories as $categories)
                <option value="{{$categories->id}}">{{$categories->name}}</option>
            @endforeach
        </select>
        <input wire:model="search" type="text" class="form-input block w-full sm:w-64" placeholder="Find something">
    </x-category-nav-layout>
    <main class="max-w-6xl mx-auto mt-10 lg:mt-10 space-y-6 mb-10">
        <section class="lg:grid lg:grid-cols-12 gap-x-10">
            <div class="col-span-4 lg:text-center lg:pt-14 mt-2 mb-10">
                <img src="{{$post->image_path}}"
                     alt=""
                     class="rounded-xl">

                <p class="mt-4 block text-gray-400 text-xs">
                    Published <time>{{$post->created_at->diffForHumans()}}</time>
                </p>

                <div class="flex items-center lg:justify-center text-sm mt-4">
                    <img class="rounded-full h-10 object-cover"  src="{{$post->lead_author?->profile_photo_url}}" alt="">
                    <div class="ml-3 text-left">
                        <h5 class="font-bold">{{$post->lead_author?->name}}</h5>
                    </div>
                </div>

                {{--TODO:: Place page add here--}}

            </div>

            <article class="col-span-8">
                <div class="hidden lg:flex justify-between mb-6">
                    <a href="{{route('posts.index')}}"
                       class="text-lg text-blue-500 hover:text-blue-800 transition-colors duration-300 font-bold flex items-center">
                        <i class="fas fa-arrow-left pr-1"></i>
                        Back to Posts
                    </a>



                    <div class="grid grid-cols-3 gap-2 mt-1">
                        @foreach($post->categories as $category)
                            <span wire:click="goToCategory({{$category->id}})"
                               class="px-3 block py-1 border border-blue-800 rounded-full text-blue-800 text-xs uppercase font-semibold cursor-pointer"
                               style="font-size: 10px">{{$category?->name}}</span>
                        @endforeach
                    </div>


                </div>

                <h1 class="font-bold text-3xl lg:text-4xl mb-5">{{$post->title}}</h1>

                <div class="space-y-4 lg:text-lg leading-loose">{!! $post->body !!}</div>

                <div class="mt-5 flex flex-row justify-between">
                    <!-- Like and Comment -->
                    <div class="flex space-x-6">
                        <livewire:like-component :model="$post" />

                        <span class="flex flex-row space-x-3 text-center cursor-pointer hover:text-blue-800">
                            <x-icon.comment class="h-6 w-6 mr-1" /> {{$post->commentCount()}}
                        </span>
                    </div>
                    <!-- Share -->
                    <div wire:ignore class="flex items-center no-underline pr-6">
                        <a class="" href="https://www.pinterest.com/mentoringheroes/">
                            <i class="fab fa-whatsapp fa-lg"></i>
                        </a>
                        <a class="pl-3" href="https://www.facebook.com/mentoringheroes">
                            <i class="fab fa-facebook fa-lg"></i>
                        </a>
                        <a class="pl-3" href="https://www.instagram.com/mentoringheroes">
                            <i class="fab fa-instagram fa-lg"></i>
                        </a>
                        <a class="pl-3" href="https://www.twitter.com/heromentoring">
                            <i class="fab fa-twitter fa-lg"></i>
                        </a>
                    </div>
                </div>
            </article>
        </section>



        <hr>

        <div class="w-full flex">
            <div href="#" class="w-1/2 text-left ">
                <p class="text-lg text-blue-800 font-bold flex items-center">Previous Post</p>
                @if($previousPost)
                    <a href="{{route('posts.show', $previousPost->slug)}}" class="pt-2 hover:underline hover:text-blue-800 ">
                    {{$previousPost->title ?? ''}}
                </a>
                @else
                    <a href="{{route('posts.index')}}" class="pt-2 hover:underline hover:text-blue-800 ">
                        No previous post! View All.
                    </a>
                @endif
            </div>
            <div class="w-1/2 text-right">
                <p class="text-lg text-blue-800 font-bold flex items-center justify-end">
                    Next Post
                </p>
                @if($nextPost)
                <a href="{{route('posts.show', $nextPost->slug)}}" class="pt-2 hover:underline hover:text-blue-800 ">
                    {{$nextPost->title ?? ''}}
                </a>
                @else
                    <a href="{{route('posts.index')}}" class="pt-2 hover:underline hover:text-blue-800 ">
                        No other posts yet! View all.
                    </a>
                @endif
            </div>
        </div>
        @auth

        <span wire:click="togglePostLike">Like</span>

        @endauth

    </main>


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
