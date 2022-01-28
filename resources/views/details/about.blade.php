<x-app-layout>
    <x-category-nav-layout >
{{--        <select wire:model="category" class="form-select block w-full sm:w-64">--}}
{{--            <option value="">{{__('Post Categories')}}</option>--}}
{{--            @foreach($categories as $categories)--}}
{{--                <option value="{{$categories->id}}">{{$categories->name}}</option>--}}
{{--            @endforeach--}}
{{--        </select>--}}
        {{--        <input wire:model="search" type="text" class="form-input block w-full sm:w-64" placeholder="Find something">--}}
    </x-category-nav-layout>
    <main class="max-w-6xl mx-auto mt-10 lg:mt-10 space-y-6 mb-10 flex flex-wrap">
        <div class="w-full md:w-2/3 flex flex-col px-3">
            <div class="">
                <x-typography.section-header> Our Mission </x-typography.section-header>
            </div>
            <div class="p-3">
                We are a dynamic team that is committed to helping you navigate
                your hero’s journey.
                Living to our fullest potential is deeply connected to our hero’s
                journey.
                The problem we recognized is that many of us have traded a life
                of security over a life of adventure.
                A life that can only be found when we embark on our
                life’s journey.
                Refusal to go along a path that either
                reveals or confirms our calling can lead to a lifetime of regrets. We decided to use everyday heroes’ personal experiences to help you navigate your way along the hero’s journey. So whether you are new to this, just a beginner or yet to find your path, we are here to provide support, encouragement and genuine guidance to you. You are not just doing this for you; you also do this for those you will inspire. Let us be your partner in this epic journey because the world needs your light, and only you can shine the way you shine. Become your hero and inspire others to become heroes as they follow their hero’s journey.
            </div>
        </div>
        <x-layout.front-end.aside>
            <div class="items-center px-3 py-2 bg-blue-700 rounded-lg mb-5">
                <span class="text-white font-medium uppercase hover:text-gary-700 text-2xl">
                    Recent Articles
                </span>
            </div>
            <livewire:blog.aside.recent-post-component/>
        </x-layout.front-end.aside>
    </main>
</x-app-layout>
