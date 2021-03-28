<div>
    <div class="pt-5 items-center justify-center flex flex-row space-x-2">
{{--        <x-button.aside-menu-item field="categories" :menuItem="$menuItem" />--}}
        <x-button.aside-menu-item field="recent" :menuItem="$menuItem" />
        <x-button.aside-menu-item field="featured" :menuItem="$menuItem" />

</div>

    <div>
        @switch($menuItem)
            @case('recent')
            <livewire:blog.aside.recent-post-component/>
            @break
{{--            @case('featured')--}}
{{--            <livewire:blog.aside.featured-post-component/>--}}
{{--            @break--}}
            @default
            <livewire:blog.aside.featured-post-component/>
{{--            <livewire:blog.aside.category-component/>--}}
        @endswitch
    </div>

</div>
