<div class="h-full overflow-y-scroll">
    <div class="flex flex-col mx-auto items-center mb-2 max-w-lg">
        <div class="flex flex-col space-y-2 text-sm text-gray-600 p-4">
            @auth
                @if(!auth()->user()->hasSocialAccount() && !auth()->user()->hasVerifiedEmail())
                    @include('partials.forms.auth.verify-email')
                @else
                    @include('partials.forms.comment.comment')
                @endif
            @endauth
            @guest
                    <livewire:connect-component/>
            @endguest
        </div>
        <div class="border-t max-w-2xl w-full my-0"></div>
        @foreach ($comments as $comment)
            <div class="w-full px-5 py-3">
                <x-layout.comment :name="$comment"/>

                @if($replyCommentId == $comment->id)
                    @include('partials.forms.comment.reply')
                @endif
                @if($showReplies)
                    <div class="m-3">
                        @foreach ($comment->replies as $reply)
                            <x-layout.comment :name="$reply"/>
                            @if($replyCommentId == $reply->id)
                                <x-layout.reply-form :author="$reply->author->name"/>
                            @endif
                        @endforeach
                    </div>
                @endif
            </div>
            <div class="border-t max-w-2xl w-full my-0 px-3"></div>
        @endforeach
    </div>
</div>
