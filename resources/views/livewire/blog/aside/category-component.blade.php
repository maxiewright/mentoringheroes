<div class="w-full bg-white shadow flex flex-col my-4 p-6">
    <ul class="w-full">
        @foreach ($categories as $id => $category)
            <li class="list-none py-1" wire:click.prevent="$emitUp('filterCategories', {{$id}} )">
                <button class="h-8 px-3 font-medium text-white transition-colors duration-150 bg-blue-700 rounded-lg focus:shadow-outline hover:bg-blue-800">
                    <span class="mr-2">{{$category->name}}</span>
                    <span class="inline-flex items-center justify-center px-2 py-1 text-sm font-bold leading-none text-black bg-white rounded-full">
                   {{$category->posts->count() }}
               </span>
                </button>
            </li>
        @endforeach
    </ul>
</div>
