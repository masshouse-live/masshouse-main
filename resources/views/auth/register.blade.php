@extends('layouts.auth')

@section('content')
    <form method="POST" action="{{ route('register') }}">
        @csrf
        <div class="text-center font-bold text-xl">{{ __('Register') }}</div>
        <div class="flex flex-col space-y-2">
            <label for="name" class="col-md-4 col-form-label text-md-end">{{ __('Name') }}</label>

            <div class="flex flex-col ">
                <input id="name" type="text"
                    class="border-2 rounded px-3 py-2 bg-primary @error('name') border-red-400 @enderror" name="name"
                    value="{{ old('name') }}" required autocomplete="name" autofocus>

                @error('name')
                    <span class=" text-red-700 rounded relative" role="alert">
                        <span>{{ $message }}</span>
                    </span>
                @enderror
            </div>
        </div>

        <div class="flex flex-col py-2">
            <label for="email" class="col-md-4 col-form-label text-md-end">{{ __('Email Address') }}</label>

            <div class="flex flex-col space-y-2">
                <input id="email" type="email"
                    class="border-2 rounded px-3 py-2 bg-primary @error('email') border-red-400 @enderror" name="email"
                    value="{{ old('email') }}" required autocomplete="email">

                @error('email')
                    <span class=" text-red-700 rounded relative" role="alert">
                        <span>{{ $message }}</span>
                    </span>
                @enderror
            </div>
        </div>

        <div class="flex flex-col py-2">
            <label for="password" class="col-md-4 col-form-label text-md-end">{{ __('Password') }}</label>

            <div class="flex flex-col space-y-2">
                <input id="password" type="password"
                    class="border-2 rounded px-3 py-2 bg-primary @error('password') border-red-400 @enderror"
                    name="password" required autocomplete="new-password">

                @error('password')
                    <span class=" text-red-700 rounded relative" role="alert">
                        <span>{{ $message }}</span>
                    </span>
                @enderror
            </div>
        </div>

        <div class="flex flex-col py-2">
            <label for="password-confirm" class="col-md-4 col-form-label text-md-end">{{ __('Confirm Password') }}</label>

            <div class="flex flex-col space-y-2">
                <input id="password-confirm" type="password" class="border-2 rounded px-3 py-2 bg-primary"
                    name="password_confirmation" required autocomplete="new-password">
            </div>
        </div>

        <div class="flex flex-col space-y-2  py-2">
            <button type="submit" class="bg-accent shadow rounded text-white px-4 py-2">
                {{ __('Register') }}
            </button>
        </div>
    </form>
@endsection
