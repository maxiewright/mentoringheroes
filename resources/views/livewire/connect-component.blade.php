<div class="flex flex-col space-y-2">
    <div>Connect with us to share what you think:</div>
    <div class="px-4 space-y-2">
        @if(!$emailConnect)
            @if(!$signIn)
                <x-connect.options/>
            @else
                <x-connect.options signIn/>
            @endif
        @elseif($emailConnect && !$signIn)
            <form wire:submit.prevent="">

            </form>
            Sign Up with Email HERE
        @else
            <form wire:submit.prevent="">

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

