<div>
    <x-category-nav-layout>
        <select wire:model="category" class="form-select block w-full sm:w-64">
            <option value="">{{__('Categories')}}</option>
            @foreach($categories as $categories)
                <option value="{{$categories->id}}">{{$categories->name}}</option>
            @endforeach
        </select>

        <input wire:model="search" type="text" class="form-input block w-full sm:w-64" placeholder="Find something">
    </x-category-nav-layout>

    <main class="max-w-6xl mx-auto mt-4 lg:mt-10 space-y-8">
        @if($posts->count())
            <x-post.grid :posts="$posts"/>
        @else
            <p class="text-center">No posts yet. Please check back later.</p>
        @endif

        <!-- Pagination -->
        <div class="w-full flex justify-center">
            {{ $posts->links()}}
        </div>
    </main>
</div>


