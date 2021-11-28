{{--<div>--}}
    @if($signIn)
        <div class="flex flex-col my-5 w-full">
            <p class="mb-3 text-gray-500">To share your thoughts, connect with: </p>

            @include('partials.oauth.providers')

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

            <span class="mx-auto mt-2 inline-block text-sm text-blue-800 cursor-pointer font-medium">
                <span class="hover:text-blue-600" wire:click.prevent="signUp()">
                    First time connecting?
                </span> |
                <span class="hover:text-blue-600" wire:click.prevent="forgotPassword()">
                    Forgot Password?
                </span>
            </span>
        </div>
    @elseif($forgotPassword)
        <div class="flex flex-col my-5">
            <span class="text-sm mb-3">
                {{__('Just let us know your email address and we will email you a password reset link that will allow you to choose a new one.')}}
            </span>
            @if(session('status'))
                <div class="mb-4 font-medium text-sm text-green-600">
                    {{ session('status') }}
                </div>
            @endif
            <form method="POST" action="{{ route('password.email') }}">
                @csrf
                <div class="mb-2">
                    <x-input.text wire:model.lazy="email" name="email" type="email" placeholder="Email"/>
                </div>
                <div class="">
                    <x-button.submit value="Send me the Password Reset Link" class="w-full"/>
                </div>
            </form>
            <p class="text-sm mt-3 mx-auto">I remembered my details.
                <span wire:click.prevent="signIn()"
                      class="text-blue-800 cursor-pointer hover:text-blue-600 font-medium">
                    I'll Sign In
                </span>
            </p>
        </div>
    @else
        <div class="flex flex-col my-5">
            <p class="mb-3 text-gray-500">Join the journey with: </p>

            @include('partials.oauth.providers')

            <div class="relative text-center py-6">
                <span class="relative top-3 border-2 p-1.5 rounded-full bg-white border-gray-300 font-semibold">
                    OR
                </span>
                <hr class="border border-gray-300">
            </div>

            <form  wire:submit.prevent="register">
                <div class="mb-2">
                    <x-input.text wire:model.defer="name" name="name" placeholder="Name" class="mb-2"/>
                </div>
                <div class="mb-2">
                    <x-input.text wire:model.defer="email" name="email" placeholder="Email" class="mb-2"/>
                </div>
                <div class="mb-2">
                    <x-input.password wire:model.defer="password" />
                </div>

                <div class="mb-2">
                    <x-input.password wire:model="password_confirmation" placeholder="Confirm Password" name="password_confirmation"/>
                </div>
                <div class="">
                    <x-button.submit value="Let's Go" class="w-full"/>
                </div>
            </form>
            <p class="text-sm mt-3 mx-auto"> I remembered my details.
                <span wire:click.prevent="signIn()"
                      class="text-blue-800 cursor-pointer hover:text-blue-600 font-medium">
                    I'll Sign In
                </span>
            </p>
        </div>
    @endif
{{--</div>--}}

