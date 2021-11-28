@props([
    'author',
    'replyMode' => null,
])

<form wire:submit.prevent="store" class="w-full max-w-xl rounded-lg px-2 py-2 shadow-lg mb-4" novalidate>
    <div class="flex flex-wrap -mx-3">
        <div class="w-full md:w-full px-3 mb-2 mt-2">
            <textarea wire:model.defer="comment.body" name="comment.body"
                      class="bg-gray-100 rounded leading-normal resize-none w-full
                      h-20 py-2 px-3 font-medium placeholder-gray-300 focus:outline-none
                      focus:shadow-outline @if($replyMode) @error('comment.body') border border-red-700 @enderror @endif"
                      placeholder="Let {{$author}} know what you think..."
                      required
            >
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
            <span wire:click="cancelReply"
                  class="cursor-pointer hover:underline text-sm">
                Maybe later
            </span>
        </div>
    </div>
</form>
