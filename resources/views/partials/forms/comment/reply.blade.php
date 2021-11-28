<form wire:submit.prevent="store" class="w-full max-w-xl rounded-lg px-2 py-2 shadow-lg mb-4"
      novalidate>
    <div class="flex flex-wrap -mx-3">
        <div class="w-full md:w-full px-3 mb-2 mt-2">
                            <textarea wire:model="comment.body" name="comment.body"
                                      class="bg-gray-100 rounded leading-normal resize-none w-full focus:shadow-outline h-20 py-2 px-3 font-medium placeholder-gray-700 focus:outline-none  @if($replyMode) @error('comment.body') border border-red-700 @enderror @endif"
                                      placeholder="Let {{$comment->author->name}} know what you think...">
                            </textarea>
            @if($replyMode)
                @error('comment.body')
                <div class="text-sm text-red-700">{{$message}}</div>
                @enderror
            @endif
        </div>
        <div class="flex space-x-1.5 w-full md:w-full flex items-center justify-end -mr-1 md:w-full px-3">
            <input type='submit'
                   class="bg-blue-800 hover:bg-blue-700 text-sm text-white font-medium py-1 px-4 border rounded tracking-wide mr-1"
                   value='Tell Them'
            >
            <span wire:click.prevent="cancelReply"
                  class="cursor-pointer hover:underline text-sm">
                Maybe later
            </span>
        </div>
    </div>
</form>
