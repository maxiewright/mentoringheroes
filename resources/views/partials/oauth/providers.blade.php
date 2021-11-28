<div class="flex flex-row justify-between items-center space-x-3">
    <x-button.social-connect service="facebook">
        <x-slot name="icon">
            <x-icon.facebook class="w-5 h-5 fill-current"/>
        </x-slot>
    </x-button.social-connect>
    <x-button.social-connect service="google">
        <x-slot name="icon">
            <x-icon.google class="w-5 h-5 fill-current"/>
        </x-slot>
    </x-button.social-connect>

    <x-button.social-connect service="twitter">
        <x-slot name="icon">
            <x-icon.twitter class="w-5 h-5 fill-current"/>
        </x-slot>
    </x-button.social-connect>
</div>
