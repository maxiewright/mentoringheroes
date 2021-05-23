<x-layout.app>
    <div class="container mx-auto flex flex-wrap py-6">
        <div class="w-full md:w-2/3 flex flex-col px-3">
            <div class="">
                <x-typography.section-header> Reset Password </x-typography.section-header>
            </div>
            <div>
                <form method="POST" action="{{ route('password.update') }}"
                      class="form bg-white w-2/3 mx-auto"
                      novalidate>
                    @csrf
                    @method('POST')

                    <input type="hidden" name="token" value="{{ $request->route('token') }}">

                    <x-form.input :value="old('email', $request->email)" type="email" name="email"
                                  placeholder="Email" class="mb-2"
                    />

                    <x-form.input  type="password" placeholder="New Password"
                                   name="password" required autocomplete="new-password"
                                   class="mb-2"
                    />
                    <div class="mb-2">
                        <x-form.input type="password" placeholder="Confirm Password"
                                      name="password_confirmation" required autocomplete="new-password"
                                      class="mb-2"
                        />
                    </div>

                    <div class="">
                        <input type="submit" value="Reset Password"
                               class="w-full bg-blue-700 text-white font-bold text-sm uppercase rounded hover:bg-blue-700 flex items-center justify-center px-2 py-3 mt-4">
                    </div>
                </form>
            </div>
            </div>

        <x-layout.front-end.aside>
            <livewire:blog.aside.tab-component />
        </x-layout.front-end.aside>
    </div>
</x-layout.app>
