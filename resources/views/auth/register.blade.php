<x-layout.front-end.master>
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
                <h3 class="text-2xl text-gray-900 font-semibold">Become apart of our team!</h3>
                <div class="flex space-x-5 my-2">
                    <x-form.input type="text" name="first_name" placeholder="First Name" class="w-1/2"/>
                    <x-form.input type="text" name="last_name" placeholder="Last Name" class="w-1/2"/>
                </div>
                <x-form.input type="text" name="email" placeholder="Your Email" class="mb-2"/>
                <x-form.textarea name="about" placeholder="Briefly describe yourself"
                                 class="w-full mt-3" cols="10" rows="3" />
                <x-form.input  type="password" placeholder="Your Password"
                               name="password" required autocomplete="new-password"
                               class="mb-2"
                />
                <div class="mb-2">
                    <x-form.input type="password" placeholder="Confirm Password"
                                  name="password_confirmation" required autocomplete="new-password"
                                  class="mb-2"
                    />
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
</x-layout.front-end.master>


