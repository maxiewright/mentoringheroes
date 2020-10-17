<x-layouts.front-end.master>
    <div class="w-full md:w-2/3 flex flex-col px-3">
        <div class="">
            <x-typography.section-header>
                Contact Us
            </x-typography.section-header>
        </div>

        <form action="" class="form bg-white p-6 my-10 relative">
            <h3 class="text-2xl text-gray-900 font-semibold">Let us contact you!</h3>
{{--            <p class="text-gray-600"> </p>--}}
            <div class="flex space-x-5 mt-3">
                <input type="text" name="" id="" placeholder="Your Name" class="border p-2  w-1/2">
                <input type="tel" name="" id="" placeholder="Your Number" class="border p-2 w-1/2">
            </div>
            <input type="email" name="" id="" placeholder="Your Email" class="border p-2 w-full mt-3">
            <textarea name="" id="" cols="10" rows="3" placeholder="Let us know how we can help"
                      class="border p-2 mt-3 w-full"></textarea>

            <input type="submit" value="Submit"
                   class="w-full bg-blue-800 text-white font-bold text-sm uppercase rounded hover:bg-blue-700 flex items-center justify-center px-2 py-3 mt-4">
        </form>
    </div>
    <x-layouts.front-end.aside />
</x-layouts.front-end.master>
