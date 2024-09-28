@extends('layouts.renter')

@section('content')
    <div class="flex justify-center items-center min-h-screen m-20">
        <form action="{{ route('register') }}" method="POST" class="w-full max-w-lg p-6 bg-white shadow-lg rounded-lg">
            <legend class="text-2xl font-semibold text-center mb-6">Register</legend>
            @csrf

            <!-- Name Field -->
            <div>
                <x-input-label for="name" :value="__('Name')" />
                <x-text-input id="name" type="text" name="name" :value="old('name')" required autofocus
                    autocomplete="name"
                    class="mt-1 block w-full rounded-md shadow-sm border-gray-300 focus:border-indigo-500 focus:ring focus:ring-indigo-500 focus:ring-opacity-50" />
                <x-input-error :messages="$errors->get('name')" class="mt-2" />
            </div>

            <!-- Email Field -->
            <div class="mt-4">
                <x-input-label for="email" :value="__('Email')" />
                <x-text-input id="email" type="email" name="email" :value="old('email')" required autocomplete="email"
                    class="mt-1 block w-full rounded-md shadow-sm border-gray-300 focus:border-indigo-500 focus:ring focus:ring-indigo-500 focus:ring-opacity-50" />
                <x-input-error :messages="$errors->get('email')" class="mt-2" />
            </div>

            <!-- Password Field -->
            <div class="mt-4">
                <x-input-label for="password" :value="__('Password')" />
                <x-text-input id="password" type="password" name="password" required autocomplete="new-password"
                    class="mt-1 block w-full rounded-md shadow-sm border-gray-300 focus:border-indigo-500 focus:ring focus:ring-indigo-500 focus:ring-opacity-50" />
                <x-input-error :messages="$errors->get('password')" class="mt-2" />
            </div>

            <!-- Confirm Password Field -->
            <div class="mt-4">
                <x-input-label for="password_confirmation" :value="__('Confirm Password')" />
                <x-text-input id="password_confirmation" type="password" name="password_confirmation" required
                    autocomplete="new-password"
                    class="mt-1 block w-full rounded-md shadow-sm border-gray-300 focus:border-indigo-500 focus:ring focus:ring-indigo-500 focus:ring-opacity-50" />
                <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
            </div>

            <!-- License Number Field -->
            <div class="mt-4">
                <x-input-label for="license_number" :value="__('License Number')" />
                <x-text-input id="license_number" type="text" name="license_number" required
                    autocomplete="license_number"
                    class="mt-1 block w-full rounded-md shadow-sm border-gray-300 focus:border-indigo-500 focus:ring focus:ring-indigo-500 focus:ring-opacity-50" />
                <x-input-error :messages="$errors->get('license_number')" class="mt-2" />
            </div>

            <!-- Register Button and Link to Login -->
            <div class="mt-6">
                <input type="submit" value="Register"
                    class="w-full px-4 py-2 text-white bg-indigo-600 rounded-md hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-opacity-50">
                <p class="text-sm font-thin text-center my-4">Already have an Account?</p>
                <a href="{{ route('login') }}"
                    class="w-full px-4 py-2 text-white bg-indigo-600 rounded-md hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-opacity-50">
                    Login on Existing Account
                </a>
            </div>
        </form>
    </div>
@endsection
