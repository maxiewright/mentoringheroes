<div class="h-full overflow-y-scroll">
    @if(!$readCommentsOnly)
        <div class="px-4 py-3 flex flex-col mx-auto items-center mb-2 max-w-lg">
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

                            <form class="form place-self-end" method="POST" action="{{ route('logout') }}">
                                @csrf
                                <a href="{{ route('logout') }}"
                                   class="flex  items-center px-2 py-2 hover:bg-gray-200"
                                   onclick="event.preventDefault(); this.closest('form').submit();"
                                >
                                    <svg fill="currentColor" xmlns="http://www.w3.org/2000/svg"
                                         width="24" height="24" viewBox="0 0 24 24" class="text-gray-600"
                                    >
                                        <path d="M0 0h24v24H0z" fill="none"></path>
                                        <path
                                            d="M10.09 15.59L11.5 17l5-5-5-5-1.41 1.41L12.67 11H3v2h9.67l-2.58 2.59zM19 3H5c-1.11 0-2 .9-2 2v4h2V5h14v14H5v-4H3v4c0 1.1.89 2 2 2h14c1.1 0 2-.9 2-2V5c0-1.1-.9-2-2-2z"></path>
                                    </svg>
                                    <span class="ml-2">Logout</span>
                                </a>

                            </form>

                            @include('partials.forms.comment.comment')

                            @if($saved)
                                <div class="mt-3 w-full">
                                    <x-alert.success message="Comment Added!"/>
                                </div>
                            @endif
                        @endif
                        @else
                            <div class="flex flex-col p-4">
                                <livewire:connect-component/>
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

