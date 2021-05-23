<div class="h-full overflow-y-scroll">
    @if(!$readCommentsOnly)
        <div class="px-4 py-3 flex flex-col mx-auto items-center justify-center  mb-2 max-w-lg">
            @auth
                @if(!auth()->user()->hasSocialAccount() && !auth()->user()->hasVerifiedEmail())
                    <div class="flex flex-col space-y-2 text-sm text-gray-600 p-4">
                        <p> Welcome to the Journey! Before letting us know your thoughts, please verify your email address by clicking on the link we just emailed to you. If you didn't receive the email, we will gladly send you another. </p>

                        @if (session('status') == 'verification-link-sent')
                            <div class="mb-4 font-medium text-sm text-green-600">
                                {{ __('A new verification link has been sent to the email address you provided during registration.') }}
                            </div>
                        @endif

                        <form method="POST" action="{{ route('verification.send') }}">
                            @csrf
                            <div class="">
                                <x-button.submit value="Resend Verification Email" class="w-full"/>
                            </div>
                        </form>

                        <div class="mt-4 flex items-center justify-between">


                            <form method="POST" action="{{ route('logout') }}">
                                @csrf

                                <button type="submit" class="underline text-sm text-gray-600 hover:text-gray-900">
                                    {{ __('Logout') }}
                                </button>
                            </form>
                        </div>


                        @else
                            @include('partials.forms.comment.comment')
                                <form method="POST" action="{{ route('logout') }}">
                                    @csrf
                                    <x-link x-jet-dropdown-link href="{{ route('logout') }}"
                                            onclick="event.preventDefault();
                                                            this.closest('form').submit();">
                                        {{ __('Logout') }}
                                    </x-link>
                                </form>
                            @if($saved)
                                <div class="mt-3 w-full">
                                    <x-alert.success message="Comment Added!"/>
                                </div>
                            @endif
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

