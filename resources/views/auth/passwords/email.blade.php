@extends('layouts.auth')

@section('content')
    <div class="flex flex-col">
        <div class="text-center font-bold text-xl">{{ __('Reset Password') }}</div>

        <div class="flex flex-col">
            @if (session('status'))
                <div class="alert alert-success" role="alert">
                    {{ session('status') }}
                </div>
            @endif

            <form method="POST" action="{{ route('password.email') }}">
                @csrf

                <div class="flex flex-col space-y-2 py-2">
                    <label for="email" class="col-md-4 col-form-label text-md-end">{{ __('Email Address') }}</label>

                    <div class="flex flex-col ">
                        <input id="email" type="email"
                            class="border-2 rounded px-3 py-2 bg-primary @error('email') border-red-500 @enderror"
                            name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>

                        @error('email')
                            <span class=" text-red-700 rounded relative" role="alert">
                                <span>{{ $message }}</span>
                            </span>
                        @enderror
                    </div>
                </div>


                <div class="flex flex-col py-2">
                    <button type="submit" class="bg-accent shadow rounded text-white px-4 py-2">
                        {{ __('Send Password Reset Link') }}
                    </button>
                </div>
            </form>
        </div>
    </div>
@endsection
