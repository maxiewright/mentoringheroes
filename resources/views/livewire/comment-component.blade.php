<div class="w-full flex flex-col">
    <form wire:submit.prevent="store" class="form bg-white p-6 my-10 relative">
        <h3 class="text-2xl text-gray-900 font-semibold">Got Feedback?</h3>
        {{--Name and Email --}}
        <div class="flex space-x-5 mt-3">
            <x-form.input wire:model="comment.name" name="comment.name"
                          type="text" placeholder="Your Name" class="w-1/2"/>
            <x-form.input wire:model="comment.email" name="comment.email"
                          type="text" placeholder="Your Email" class="w-1/2"/>
        </div>
        {{--Website--}}
        <x-form.input wire:model="comment.website" name="comment.website"
                      type="text" name="website" placeholder="Your Website URL" class="w-full mt-3"/>
        {{--Comment--}}
        <x-form.textarea wire:model="comment.details" name=""
                         placeholder="Let us know your thoughts"
                         class="w-full mt-3" cols="10" rows="3"/>
        {{--Submit--}}
        <button type="submit" class="w-full bg-blue-800
                text-white font-bold text-sm
                uppercase rounded hover:bg-blue-700 flex items-center justify-center px-2 py-3 mt-4">
            Submit Comment
        </button>
    </form>
</div>

{{--<div>--}}
{{--    <div>--}}
{{--        <section class="rounded-b-lg  mt-4 ">--}}
{{--            <form action="/" accept-charset="UTF-8" method="post"><input type="hidden">--}}
{{--                <textarea class="w-full shadow-inner p-4 border-0 mb-4 rounded-lg focus:shadow-outline text-2xl"--}}
{{--                          placeholder="Ask questions here." cols="6" rows="6" id="comment_content"--}}
{{--                          spellcheck="false"></textarea>--}}
{{--                <button class="font-bold py-2 px-4 w-full bg-purple-400 text-lg text-white shadow-md rounded-lg ">--}}
{{--                    Comment--}}
{{--                </button>--}}
{{--            </form>--}}

{{--            <div id="task-comments" class="pt-4">--}}
{{--                <!--     comment-->--}}
{{--                <div--}}
{{--                    class="bg-white rounded-lg p-3  flex flex-col justify-center items-center md:items-start shadow-lg mb-4">--}}
{{--                    <div class="flex flex-row justify-center mr-2">--}}
{{--                        <img alt="avatar" width="48" height="48" class="rounded-full w-10 h-10 mr-4 shadow-lg mb-4"--}}
{{--                             src="https://cdn1.iconfinder.com/data/icons/technology-devices-2/100/Profile-512.png">--}}
{{--                        <h3 class="text-purple-600 font-semibold text-lg text-center md:text-left ">@Shanel</h3>--}}
{{--                    </div>--}}


{{--                    <p style="width: 90%" class="text-gray-600 text-lg text-center md:text-left ">Hi good morning will--}}
{{--                        it be the entire house. </p>--}}

{{--                </div>--}}
{{--                <!--  comment end--><!--     comment-->--}}
{{--                <div--}}
{{--                    class="bg-white rounded-lg p-3  flex flex-col justify-center items-center md:items-start shadow-lg mb-4">--}}
{{--                    <div class="flex flex-row justify-center mr-2">--}}
{{--                        <img alt="avatar" width="48" height="48" class="rounded-full w-10 h-10 mr-4 shadow-lg mb-4"--}}
{{--                             src="https://cdn1.iconfinder.com/data/icons/technology-devices-2/100/Profile-512.png">--}}
{{--                        <h3 class="text-purple-600 font-semibold text-lg text-center md:text-left ">@Tim Motti</h3>--}}
{{--                    </div>--}}


{{--                    <p style="width: 90%" class="text-gray-600 text-lg text-center md:text-left "><span--}}
{{--                            class="text-purple-600 font-semibold">@Shanel</span> Hello. Yes, the entire exterior,--}}
{{--                        including the walls. </p>--}}

{{--                </div>--}}
{{--                <!--  comment end-->--}}
{{--            </div>--}}
{{--        </section>--}}
{{--    </div>--}}
{{--</div>--}}
