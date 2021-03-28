<div>
    <div class="pt-5 items-center justify-center flex flex-row space-x-2">
        <x-button.aside-menu-item field="latest" :menuItem="$menuItem" />
        <x-button.aside-menu-item field="featured" :menuItem="$menuItem" />

    </div>

    <div>
        @switch($menuItem)
            @case('latest')
            <livewire:blog.aside.category-component/>
            @break

            @default
            <livewire:blog.aside.featured-post-component/>
        @endswitch
    </div>

</div>
