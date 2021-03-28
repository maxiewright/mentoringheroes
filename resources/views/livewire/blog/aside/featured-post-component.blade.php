<div class="w-full bg-white shadow flex flex-col my-4 p-6">
    <ul class="w-full">
        @foreach ($featuredPosts as $post)
            <x-post.list :post="$post" />
        @endforeach
    </ul>
</div>
