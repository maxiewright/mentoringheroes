<div>
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
                <x-typography.section-header> Let us contact you! </x-typography.section-header>
            </div>
            <form wire:submit.prevent="store" class="form bg-white px-6 relative">
                <div class="flex space-x-5 mt-3">
                    <x-form.input model="contact.name" type="text" placeholder="Your Name" class="w-1/2"/>
                    <x-form.input model="contact.phone" type="text"  placeholder="Your Number" class="w-1/2"/>
                </div>
                <x-form.input model="contact.email" type="text" name="email" placeholder="Your Email" class="w-full mt-3"/>
                <x-form.textarea model="contact.details"  placeholder="Let us know how we can help"
                                 class="w-full mt-3" cols="10" rows="3"/>
                <button type="submit" class="w-full bg-blue-800
                text-white font-bold text-sm
                uppercase rounded hover:bg-blue-700 flex items-center justify-center px-2 py-3 mt-4">
                    Submit
                </button>
            </form>
        </div>
        <x-layout.front-end.aside>
            <div class="items-center px-3 py-2 bg-blue-700 rounded-lg mb-4">
                <span class="text-white font-medium uppercase hover:text-gary-700 text-2xl">
                    Recent Articles
                </span>
            </div>
            <livewire:blog.aside.recent-post-component/>
        </x-layout.front-end.aside>
    </main>
</div>

