<x-layout.app>
    <div class="container mx-auto flex flex-wrap py-6">
        <div class="w-full md:w-2/3 flex flex-col px-3">
            <div class="">
                <x-typography.section-header> Reset Password </x-typography.section-header>
            </div>
            <div class="bg-white w-2/3 mx-auto">
                <div class="mb-4 text-sm text-gray-600">
                    {{ __('Just let us know your email address and we will email you a password reset link that will allow you to choose a new one.') }}
                </div>
                @if (session('status'))
                    <div class="mb-4 font-medium text-sm text-green-600">
                        {{ session('status') }}
                    </div>
                @endif
                <form method="POST" action="{{ route('password.email') }}" class="form" novalidate>
                    @csrf
                    <x-form.input :value="old('email')" type="email" name="email"
                                  placeholder="Email" class="mb-2" />

                    <div class="mb-3">
                        <input type="submit" value="Send me the Password Reset Link"
                               class="cursor-pointer w-full bg-blue-700 text-white font-bold text-sm uppercase rounded hover:bg-blue-700 flex items-center justify-center px-2 py-3 mt-4">
                    </div>

                </form>
            </div>
        </div>

        <x-layout.front-end.aside>
            <livewire:blog.aside.tab-component />
        </x-layout.front-end.aside>
    </div>
</x-layout.app>
