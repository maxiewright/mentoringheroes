<!-- Sidebar Section -->
<aside class="w-full md:w-1/3 flex flex-col items-center px-3">
    @if (!request()->route()->named('about'))
        <div class="w-full bg-white shadow flex flex-col my-4 p-6">
            <p class="text-xl font-semibold pb-5">About Us</p>
            <p class="pb-2">
                Briefly Describe us here!
            </p>
            <a href="{{route('about')}}" class="w-full bg-blue-800 text-white font-bold text-sm uppercase rounded hover:bg-blue-700 flex items-center justify-center px-2 py-3 mt-4">
                Get to know us
            </a>
        </div>
    @endif

    <livewire:layouts.front-end.aside-popular/>
    <livewire:layouts.front-end.aside-categories/>
</aside>
