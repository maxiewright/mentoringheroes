<x-layout.app>
    <div class="container mx-auto flex flex-wrap py-6">
        <div class="w-full md:w-2/3 flex flex-col px-3">
            <div class="">
                <x-typography.section-header> Login </x-typography.section-header>
            </div>
            <div>

                <form method="POST" action="{{ route('login') }}"
                      class="form bg-white w-2/3 mx-auto"
                      novalidate>
                    @csrf

                    @if (session('status'))
                        <div class="mb-4 font-medium text-sm text-green-600">
                            {{ session('status') }}
                        </div>
                    @endif

                    <x-form.input :value="old('email')" type="email" name="email"
                                  placeholder="Email" class="mb-2"
                    />

                    <x-form.input  type="password" placeholder="New Password"
                                   name="password" required autocomplete="new-password"
                                   class="mb-2"
                    />

                    <div class="block mt-4">
                        <label class="flex items-center">
                            <input type="checkbox" class="form-checkbox" name="remember">
                            <span class="ml-2 text-sm text-gray-600">{{ __('Remember me') }}</span>
                        </label>
                    </div>

                    <div class="mb-3">
                        <input type="submit" value="Reconnect"
                               class="cursor-pointer w-full bg-blue-700 text-white font-bold text-sm uppercase rounded hover:bg-blue-700 flex items-center justify-center px-2 py-3 mt-4">
                    </div>
                    @if (Route::has('password.request'))
                        <a class="underline text-sm text-gray-600 hover:text-gray-900" href="{{ route('password.request') }}">
                            {{ __('Forgot your password?') }}
                        </a>
                    @endif
                </form>
            </div>
        </div>

        <x-layout.front-end.aside>
            <livewire:blog.aside.tab-component />
        </x-layout.front-end.aside>
    </div>
</x-layout.app>


