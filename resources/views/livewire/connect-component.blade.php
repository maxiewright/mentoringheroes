<div class="flex flex-col mt-6">
    @if(!$signUp)
        <p class="mb-3 text-gray-500">To share your thoughts, connect with: </p>

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

        <div class="relative text-center py-6">
            <span class="relative top-3 border-2 p-1.5 rounded-full bg-white border-gray-300 font-semibold">
                OR
            </span>
            <hr class="border border-gray-300">
        </div>

        <form class="mt-4" wire:submit.prevent="login" novalidate>
            <div class="mb-2">
                <x-input.text wire:model.defer="email" name="email" type="email" placeholder="Email"/>
            </div>
            <div class="mb-2">
                <x-input.password wire:model.defer="password" name="password"/>
            </div>
            <div class="">
                <x-button.submit value="Rejoin the Journey" class="w-full"/>
            </div>
        </form>


        <span class="mt-2 inline-block text-sm text-blue-800 cursor-pointer font-medium">
            <span class="hover:text-blue-600" wire:click.prevent="signUp()">
                First time connecting?
            </span> |
            <span class="hover:text-blue-600" wire:click.prevent="forgotPassword()">
                Forgot Password?
            </span>
        </span>

    @endif


    @if($signUp)
        <span>Join the journey, Share your thoughts </span>
        <form wire:submit.prevent="register" novalidate>
            <div class="mb-2">
                <x-input.text wire:model.defer="user.name" name="user.name" placeholder="Username"/>
            </div>
            <div class="mb-2">
                <x-input.text wire:model.lazy="user.email" name="user.email" type="email" placeholder="Email"/>
            </div>
            <div class="mb-2">
                <x-input.password wire:model.defer="user.password" name="user.password"/>
            </div>
            <div class="">
                <x-button.submit value="Let's Go" class="w-full"/>
            </div>
        </form>
        <span wire:click.prevent="signIn()" class="block text-blue-800 cursor-pointer hover:text-blue-600 font-medium">
               Sign In
        </span>
    @endif


</div>

