<section
    x-data="slideout()"
    x-cloak
    @open-menu.window="open = $event.detail.open"
    @keydown.window.tab="usedKeyboard = true"
    @keydown.escape="open = false"
    x-init="init()">
    <div
        x-show.transition.opacity.duration.500="open"
        @click="open = false"
        class="fixed inset-0 bg-black bg-opacity-25"></div>
    <div
        class="fixed transition duration-300 right-0 top-0 transform w-full max-w-sm h-screen bg-gray-100 overflow-hidden"
        :class="{'translate-x-full': !open}">
        <button
            @click="open = false"
            x-ref="closeButton"
            :class="{'focus:outline-none': !usedKeyboard}"
            class="fixed top-0 right-0 mr-4 mt-2 z-50">
            <svg xmlns="http://www.w3.org/2000/svg"
                 width="25" height="25" viewBox="0 0 24 24" fill="none" stroke="#000"
                 stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" class="feather feather-x">
                <line x1="18" y1="6" x2="6" y2="18"></line>
                <line x1="6" y1="6" x2="18" y2="18"></line>
            </svg>
        </button>
        <div class="py-10 absolute top-0 h-full overflow-y-scroll">
            {{$slot}}
        </div>
    </div>
</section>


<!-- Dev tools -->
<div
    id="alpine-devtools"
    x-data="devtools('left')"
    x-show="alpines.length"
    x-init="start()">
</div>
