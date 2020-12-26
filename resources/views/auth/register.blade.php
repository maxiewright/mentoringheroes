<x-layouts.front-end.master>
    <div class="w-full flex flex-col px-3">
        <div class="">
            <x-typography.section-header>
                Register
            </x-typography.section-header>
        </div>
        <div class="w-1/2 mx-auto">
            <form method="POST" action="{{ route('register') }}" class="form bg-white relative" novalidate>
                @csrf
                @method('POST')
                {{--            <h3 class="text-2xl text-gray-900 font-semibold">Let us contact you!</h3>--}}
                <div class="mb-2">
                    <x-form.input type="text" name="name" placeholder="Your Name" class=""/>
                </div>
                <div class="mb-2">
                    <x-form.input type="text" name="email" placeholder="Your Email" class=""/>
                </div>
                <div class="mb-2 ">
                    <x-form.input  type="password" placeholder="Your Password" name="password" required autocomplete="new-password"/>
                </div>
                <div class="mb-2">
                    <x-form.input type="password" placeholder="Confirm Password" name="password_confirmation" required autocomplete="new-password"/>
                </div>
                <div class="mb-2">
                    <a class="underline text-sm text-gray-600 hover:text-gray-900" href="{{ route('login') }}">
                        {{ __('Already registered?') }}
                    </a>
                </div>

                <div class="">
                    <input type="submit" value="Register"
                           class="w-full bg-black text-white font-bold text-sm uppercase rounded hover:bg-blue-700 flex items-center justify-center px-2 py-3 mt-4">
                </div>
            </form>
        </div>
    </div>
{{--    <x-layouts.front-end.aside />--}}
</x-layouts.front-end.master>


