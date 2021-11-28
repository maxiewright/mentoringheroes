<div>
    <div class="my-4 w-full">
        <x-alert.success message="Registration Success!"/>
    </div>

    <p class="mb-4">
        {{__('Welcome to the Journey! Before letting us know your thoughts, please verify your email
        address by clicking on the link we just emailed to you. If you did not receive the email, we
        will gladly send you another.')}}
    </p>

    @if(session('status') == 'verification-link-sent')
        <div class="mb-4 font-medium text-sm text-green-600">
            {{ __('A new verification link has been sent to the email address you provided during registration.') }}
        </div>
    @endif

    <form method="POST" action="{{ route('verification.send') }}">
        @csrf
        <div class="">
            <x-button.submit value="{{ __('Resend Verification Email') }}" class="w-full"/>
        </div>
    </form>

    <div class="mt-4 flex items-center justify-between">
        <form method="POST" action="{{ route('logout') }}">
            @csrf

            <button type="submit" class="underline text-sm text-gray-600 hover:text-gray-900">
                {{ __('Logout') }}
            </button>
        </form>
    </div>

</div>


