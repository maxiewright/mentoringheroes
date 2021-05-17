<div class="flex flex-col space-y-2">
    <span>Join the journey, Share your thoughts </span>
    <div class="space-y-2">
        @if(!$emailConnect)
            @if(!$signIn)
                <x-connect.options/>
            @else
                <x-connect.options signIn/>
            @endif
        @elseif($emailConnect && !$signIn)
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
                <span class="text-sm">Remember Me</span>
                <div class="">
                    <x-button.submit value="Let's Go" class="w-full"/>
                </div>
            </form>
        @else
            <form wire:submit.prevent="login" novalidate>
                <div class="mb-2">
                    <x-input.text wire:model.defer="email" name="email" type="email" placeholder="Email"/>
                </div>
                <div class="mb-2">
                    <x-input.password wire:model.defer="password" name="password" />
                </div>
                <span class="text-sm">Remember Me</span>
                <div class="">
                    <x-button.submit value="Rejoin the Journey" class="w-full"/>
                </div>
            </form>
            Login with Email HERE
        @endif
    </div>
    <div class="mt-4">
        @if(!$emailConnect)
            @if(!$signIn)
                Already have an account?
                <span wire:click.prevent="$set('signIn',true)"
                      class="text-blue-800 cursor-pointer hover:text-blue-600 font-medium">
                Sign In
            </span>
            @else
                No account?
                <span wire:click.prevent="$set('signIn', false)"
                      class="text-blue-800 cursor-pointer hover:text-blue-600 font-medium">
                Create One
            </span>
            @endif
        @elseif($emailConnect && !$signIn)
            <span wire:click.prevent="$set('emailConnect', false)"
                  wire:click.prevent="$set('signIn',false)"
                  class="text-blue-800 cursor-pointer hover:text-blue-600 font-medium">
                I'll connect with Social Instead
            </span>
        @else
            <span wire:click.prevent="$set('emailConnect', false)"
                  wire:click.prevent="$set('signIn', true)"
                  class="text-blue-800 cursor-pointer hover:text-blue-600 font-medium">
                I'll Sign in with Social Instead
            </span>
        @endif
    </div>
</div>

