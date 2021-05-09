<div class="h-full overflow-y-scroll">
    @if(!$readCommentsOnly)
    <div class="px-4 py-3 flex mx-auto items-center justify-center  mb-2 max-w-lg">
        @auth
            <form wire:submit.prevent="store" class="w-full max-w-xl rounded-lg px-4 pt-2 shadow-lg">
                <div class="flex flex-wrap -mx-3 mb-6">
                    <div class="flex items-center px-3 mt-2">
                        <img class="h-8 w-8 rounded-full object-cover"
                             src="{{ Auth::user()->profile_photo_url }}"
                             alt="{{ Auth::user()->name }}"
                        />
                        <div class="ml-2">
                            <div class="text-sm ">
                                <span class="font-semibold">{{Auth::user()->name}}</span>
                            </div>
                        </div>
                    </div>
                    <div class="w-full md:w-full px-3 mb-2 mt-2">
                    <textarea
                        wire:model="comment.body"
                        class="bg-gray-100 rounded leading-normal resize-none w-full h-20 py-2 px-3 font-medium placeholder-gray-700 focus:outline-none focus:shadow-outline"
                        name="body" placeholder='Let us know you thoughts' required></textarea>
                    </div>
                    <div class="w-full md:w-full flex items-start md:w-full px-3">

                        <div class="flex items-start w-1/2 text-gray-700 px-2 mr-auto">
                            <p class="text-xs md:text-sm pt-px"></p>
                        </div>

                        <div class="-mr-1">
                            <input type='submit'
                                   class="bg-blue-800 hover:bg-blue-700 text-white text-sm font-medium py-1 px-4 border rounded tracking-wide mr-1"
                                   value='Tell Us'>
                        </div>
                    </div>
                </div>
            </form>
            @if($saved)
                <div class="mx-4">
                    <x-alert.success message="Comment Added!"/>
                </div>
            @endif
        @else
            <div class="flex flex-col p-4">
                <livewire:connect-component />
                <span class="mt-2 text-sm" wire:click.prevent="$set('readCommentsOnly', true)">
                    Wish to connect later?
                    <span class="text-blue-700 hover:text-blue-500 font-medium cursor-pointer hover:underline">
                       See comments only.
                </span>
                </span>
            </div>

        @endif
    </div>

    <div class="border-t max-w-2xl w-full my-4"></div>
    @endif

    @forelse ($comments as $comment)
        <div class="p-5">
            <x-layout.comment :name="$comment"/>
            @if($replyCommentId == $comment->id)
                <x-layout.reply-form :author="$comment->author->name"/>
            @endif

            @if($showReplies)
                <div class="ml-1 pl-3 py-2 mb-1">
                    @foreach ($comment->replies as $reply)
                        <x-layout.comment :name="$reply"/>
                        @if($replyCommentId == $reply->id)
                            <x-layout.reply-form :author="$reply->author->name"/>
                        @endif
                    @endforeach
                </div>
            @endif
        </div>
        <div class="border-t max-w-2xl w-full my-4"></div>
    @empty
        No comments yet.
    @endforelse
</div>

