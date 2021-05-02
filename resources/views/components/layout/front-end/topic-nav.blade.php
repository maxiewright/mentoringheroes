<!-- Category nav -->
<nav class="w-full py-4 border-t border-b bg-gray-100" x-data="{ open: false }">
    <div class="block sm:hidden">
        <a
            href="#"
            class="block md:hidden text-base font-bold uppercase text-center flex justify-center items-center"
            @click="open = !open"
        >
            Topics <i :class="open ? 'fa-chevron-down': 'fa-chevron-up'" class="fas ml-2"></i>
        </a>
    </div>
    <div :class="open ? 'block': 'hidden'" class="w-full flex-grow sm:flex sm:items-center sm:w-auto">
        <div class="w-full container mx-auto flex flex-col sm:flex-row items-center justify-center text-sm font-bold uppercase mt-0 px-6 py-2">

            <!-- For Future -->
            {{--BEGING: Section Links--}}
            <x-nav.topic-link route="posts.index" title="Articles" />
{{--            <x-nav.topic-link route="posts.index" title="Videos" />--}}
{{--            <x-nav.topic-link route="posts.index" title="Podcasts" />--}}
{{--            <x-nav.topic-link route="posts.index" title="Courses" />--}}
            {{--END: Section Links--}}


            {{--BEGIN: Marketing Links--}}
{{--            <x-nav.topic-link route="about" title="Subscribe" />--}}
            <x-nav.topic-link route="about" title="About" />
            <x-nav.topic-link route="contact" title="Contact" />
            <a href="{{ url('login/github') }}"  class="btn btn-default btn-md">Log in with Github</a>
{{--            <x-nav.topic-link route="contact" title="Write for Us" />--}}
            {{--END: Marketing Links--}}
        </div>

        <div :class="open ? 'block': 'hidden'"
             class="sm:hidden flex items-center justify-center text-lg no-underline text-blue-700 pr-6">

            <a class="" href="https://www.facebook.com/mentoringheroes">
                <i class="fab fa-facebook fa-lg"></i>
            </a>
            <a class="pl-6" href="https://www.instagram.com/mentoringheroes">
                <i class="fab fa-instagram fa-lg"></i>
            </a>
            <a class="pl-6" href="https://www.twitter.com/heromentoring">
                <i class="fab fa-twitter fa-lg"></i>
            </a>
            <a class="pl-6" href="https://www.pinterest.com/mentoringheroes/">
                <i class="fab fa-pinterest fa-lg"></i>
            </a>
        </div>

    </div>
</nav>
