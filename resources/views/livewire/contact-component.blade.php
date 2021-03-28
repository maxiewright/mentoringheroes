<div>
    <div class="container mx-auto flex flex-wrap py-6">
        <div class="w-full md:w-2/3 flex flex-col px-3">
            <div class="">
                <x-typography.section-header> Contact Us </x-typography.section-header>
            </div>
            <form wire:submit.prevent="store" class="form bg-white p-6 my-10 relative">
                <h3 class="text-2xl text-gray-900 font-semibold">Let us contact you!</h3>
                <div class="flex space-x-5 mt-3">
                    <x-form.input model="contact.name" type="text" placeholder="Your Name" class="w-1/2"/>
                    <x-form.input model="contact.phone" type="text"  placeholder="Your Number" class="w-1/2"/>
                </div>
                <x-form.input model="contact.email" type="text" name="email" placeholder="Your Email" class="w-full mt-3"/>
                <x-form.textarea model="contact.details"  placeholder="Let us know how we can help"
                                 class="w-full mt-3" cols="10" rows="3"/>
                <button type="submit" class="w-full bg-blue-800
                text-white font-bold text-sm
                uppercase rounded hover:bg-blue-700 flex items-center justify-center px-2 py-3 mt-4">
                    Submit
                </button>
            </form>
        </div>
        <x-layout.front-end.aside>
            <livewire:blog.aside.tab-component />
        </x-layout.front-end.aside>
    </div>
</div>
