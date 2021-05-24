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
<form wire:submit.prevent="store" class="w-full max-w-xl rounded-lg px-4 pt-2 shadow-lg" novalidate>
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
                    <textarea wire:model="comment.body" name="comment.body"
                              class="bg-gray-100 rounded leading-normal resize-none w-full h-20 py-2 px-3
                        font-medium placeholder-gray-700 focus:outline-none focus:shadow-outline
                        @if(!$replyMode) @error('comment.body') border border-red-700 @enderror @endif"

                              placeholder="Let us know you thoughts" required

                    >
                    </textarea>
            @if(!$replyMode)
                @error('comment.body')
                <div class="text-sm text-red-700">{{$message}}</div>
                @enderror
            @endif
        </div>

        <div class="w-full md:w-full flex items-start md:w-full px-3">
            <div class="flex items-start w-1/2 text-gray-700 px-2 mr-auto">
                <p class="text-xs md:text-sm pt-px"></p>
            </div>

            <div class="-mr-1">
                <input type='submit'
                       class="cursor-pointer bg-blue-800 hover:bg-blue-700 text-white text-sm font-medium py-1 px-4 border rounded tracking-wide mr-1"
                       value='Tell Us'>
            </div>
        </div>
    </div>
</form>
@if($saved)
    <div class="mt-3 w-full">
        <x-alert.success message="Comment Added!"/>
    </div>
@endif
