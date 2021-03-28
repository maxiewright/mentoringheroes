<div class="w-full bg-white shadow flex flex-col my-4 p-6">
    <p class="text-xl font-semibold border-b pb-5">Topics</p>
    <ul class="w-full">
        @foreach ($categories as $category)
            <li class="list-none border-b py-2">
                <a href="#" class="no-underline hover:underline text-blue-700">
                    {{$category->name}}
                </a>
                ({{$category->posts->count() }})
            </li>
        @endforeach
    </ul>
</div>
