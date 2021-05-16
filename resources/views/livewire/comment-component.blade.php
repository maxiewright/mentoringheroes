<div class="h-full overflow-y-scroll">
    @if(!$readCommentsOnly)
    <div class="px-4 py-3 flex flex-col mx-auto items-center justify-center  mb-2 max-w-lg">
        @auth
            @include('partials.forms.comment.comment')
            @if($saved)
                <div class="mt-3 w-full">
                    <x-alert.success message="Comment Added!"/>
                </div>
            @endif
        @else
            <div class="flex flex-col p-4">
                <livewire:connect-component/>
                {{--                <span class="mt-2 text-sm" wire:click.prevent="$set('readCommentsOnly', true)">--}}
                {{--                    I'll connect later!--}}
                {{--                    <span class="text-blue-700 hover:text-blue-500 font-medium cursor-pointer hover:underline">--}}
                {{--                       Let me see the comments only.--}}
                {{--                </span>--}}
                {{--                </span>--}}
            </div>

        @endif
    </div>

        <div class="border-t max-w-2xl w-full my-4"></div>
    @endif

    @forelse ($comments as $comment)
        <div class="p-5">
            <x-layout.comment :name="$comment"/>
            @if($replyCommentId == $comment->id)
                @include('partials.forms.comment.reply')
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

