<x-layouts.front-end.master>
    <div class="w-full md:w-2/3 flex flex-col px-3">
        <div class="">
            <x-typography.section-header>
                Contact Us
            </x-typography.section-header>
        </div>
        <form action="{{route('contact_us.store')}}" method="post" class="form bg-white p-6 my-10 relative" novalidate>
            @csrf
            @method('POST')
            <h3 class="text-2xl text-gray-900 font-semibold">Let us contact you!</h3>
            <div class="flex space-x-5 mt-3">
                <x-input.text name="name" placeholder="Your Name" class="w-1/2"/>
                <x-input.text name="phone" placeholder="Your Number" class="w-1/2"/>
            </div>
            <x-input.text name="email" placeholder="Your Email" class="w-full mt-3"/>
            <x-input.textarea name="details" placeholder="Let us know how we can help"
                              class="w-full mt-3" cols="10" rows="3" />
            <input type="submit" value="Submit"
                   class="w-full bg-blue-800 text-white font-bold text-sm uppercase rounded hover:bg-blue-700 flex items-center justify-center px-2 py-3 mt-4">
        </form>
    </div>
    <x-layouts.front-end.aside />
</x-layouts.front-end.master>
