<nav class="w-full py-3 border-t border-b bg-gray-100 sticky top-0 z-50" >
    <div :class="open ? 'block': 'hidden'" class="w-full flex-grow sm:flex sm:items-center sm:w-auto">
        <div class="w-full container mx-auto flex flex-col space-y-3 sm:flex-row sm:space-x-3 sm:space-y-0 items-center justify-center text-sm font-bold uppercase mt-0 px-6 py-2">
            {{$slot}}
        </div>
    </div>
</nav>
