<div>
    <span class="inline-flex items-center text-sm">
        <button wire:click="like"
                class="items-center inline-flex space-x-2 focus:outline-none focus:ring-0 {{ $model->isLikedByViewer() ? 'text-green-400 hover:text-green-500' : 'text-gray-400 hover:text-gray-500' }}">
            <x-icon.thumb-up class="h-6 w-6" />
            <span class="font-medium {{ $model->isLikedByViewer() ? 'text-green-400 hover:text-green-500' : 'text-gray-400 hover:text-gray-500' }}">
                {{ $count }}
            </span>
            <span class="sr-only">likes</span>
        </button>
    </span>
</div>
