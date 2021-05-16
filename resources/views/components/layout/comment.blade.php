@props([
    'name',
    'authorImageUrl',
])


<div class="flex items-center">
    <img class="h-10 w-10 rounded-full" src="{{$name->author->profile_photo_url}}"/>
    <div class="ml-2">
        <div class="text-sm ">
            <span class="font-semibold">{{$name->author->name}}</span>
        </div>
        <div class="text-gray-500 text-xs ">{{$name->created_at->diffForHumans()}}</div>
    </div>
</div>

<p class="text-gray-800 text-sm mt-3 leading-normal md:leading-relaxed">
    {{$name->body}}
</p>

<div class="flex justify-between items-center mt-3">
    <div class="">
        @if($name->replies->count() > 0)
            <div wire:click.prevent="$toggle('showReplies')"
                 class="flex items-center space-x-0.5 cursor-pointer text-sm"
                 title="View {{$name->replies->count() > 1 ? 'Replies' : 'Reply'}} ">
                <x-icon.message-square class="w-5 h-5"/>
                <span class="hover:underline">
                    {{$name->replies->count()}}{{$name->replies->count() > 1 ? ' Replies' : ' Reply'}}
                </span>
            </div>
        @endif
    </div>
    @auth
    <div>
        <div wire:click.prevent="reply({{ $name->id }})"
             class="hover:underline cursor-pointer text-sm mr-2">
            Reply
        </div>
    </div>
    @endauth
</div>


