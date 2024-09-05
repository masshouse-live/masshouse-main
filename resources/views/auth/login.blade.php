@extends('layouts.auth')

@section('content')
    <form method="POST" action="{{ route('login') }}" class="flex flex-col w-full py-5 space-y-4">
        @csrf
        <div class="text-center font-bold text-xl">{{ __('Login') }}</div>
        <div class="flex flex-col space-y-2">
            <label for="email" class="text-sm font-semibold text-textSecondary">{{ __('Email Address') }}</label>

            <div class="flex flex-col ">
                <input id="email" type="email"
                    class="border-2 rounded px-3 py-2 @error('email') border-red-400 @enderror" name="email"
                    value="{{ old('email') }}" required autocomplete="email" autofocus>

                @error('email')
                    <span class=" text-red-700 rounded relative" role="alert">
                        <span>{{ $message }}</span>
                    </span>
                @enderror
            </div>
        </div>

        <div class="flex flex-col space-y-2">
            <label for="password" class="text-sm font-semibold text-textSecondary">{{ __('Password') }}</label>

            <div class="flex flex-col space-y-2">
                <input id="password" type="password"
                    class="border-2 rounded px-3 py-2 @error('password') border-red-400 @enderror" name="password" required
                    autocomplete="current-password">

                @error('password')
                    <span class=" text-red-700 rounded relative" role="alert">
                        <span>{{ $message }}</span>
                    </span>
                @enderror
            </div>
        </div>

        <div class="flex flex-col">
            <div class="flex items-center space-x-2">
                <input type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>

                <label for="remember">
                    {{ __('Remember Me') }}
                </label>
            </div>
        </div>

        <div class="flex flex-col py-2">
            <button type="submit" class="bg-accent shadow rounded text-white px-4 py-2">
                {{ __('Login') }}
            </button>

            @if (Route::has('password.request'))
                <a class="btn btn-link" href="{{ route('password.request') }}">
                    {{ __('Forgot Your Password?') }}
                </a>
            @endif
        </div>
    </form>
@endsection
