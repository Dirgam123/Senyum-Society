<x-guest-layout>
    <x-auth-card>
        <x-slot name="logo">
            <a href="/">
                <img src="https://media.discordapp.net/attachments/285049657954926592/1298991993082347586/senyumin_ae_blay.png?ex=673154d1&is=67300351&hm=941218fadb57bed86229b2cdbd8f5c84c237be64e372d093090eeb4fd9eed4e4&=&format=webp&quality=lossless" class="w-20 h-20" alt="Logo"/>
            </a>
        </x-slot>

        <x-auth-session-status class="mb-4" :status="session('status')" />

        <form method="POST" action="{{ route('login') }}">
            @csrf

            <div>
                <x-input-label for="email" :value="__('Email')" />

                <x-text-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autofocus />

                <x-input-error :messages="$errors->get('email')" class="mt-2" />
            </div>

            <div class="mt-4">
                <x-input-label for="password" :value="__('Password')" />

                <x-text-input id="password" class="block mt-1 w-full"
                                type="password"
                                name="password"
                                required autocomplete="current-password" />

                <x-input-error :messages="$errors->get('password')" class="mt-2" />
            </div>

            <div class="block mt-4">
                <label for="remember_me" class="inline-flex items-center">
                    <input id="remember_me" type="checkbox" class="rounded border-gray-300 text-indigo-600 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50" name="remember">
                    <span class="ml-2 text-sm text-gray-600">{{ __('Remember me') }}</span>
                </label>
            </div>



    <a href="{{ route('register') }}" class="underline text-sm text-gray-600 hover:text-gray-900">
        {{ __('Go to Register') }}
    </a>

    <x-primary-button class="ml-3">
        {{ __('Log in') }}
    </x-primary-button>
</div>

        </form>
    </x-auth-card>
</x-guest-layout>
