@extends('layouts.auth')

@section('title', 'Login')

@section('content')
    <div class="flex min-h-full flex-col justify-center px-6 py-12 lg:px-8">
        <div class="sm:mx-auto sm:w-full sm:max-w-sm">
            <h2 class="mt-10 text-center text-2xl font-bold leading-9 tracking-tight text-white">Sign in to your account
            </h2>
        </div>

        <div class="mt-10 sm:mx-auto sm:w-full sm:max-w-sm bg-white p-4 rounded-md">
            <form class="space-y-6" action="{{ route('login') }}" method="POST">
                @csrf
                <div>
                    <label for="email" class="block text-sm font-medium leading-6">Email address</label>
                    <div class="mt-2">
                        <input id="email" name="email" type="email" autocomplete="email" required value="{{ old('email') }}"
                            class="block w-full rounded-md border-0 py-1.5 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-black sm:text-sm sm:leading-6">
                    </div>
                </div>

                <div>
                    {{-- maybe add this later --}}
                    {{-- <div class="flex items-center justify-between">
                        <div class="text-sm">
                            <a href="#" class="font-semibold hover:text-indigo-500">Forgot
                                password?</a>
                            </div>
                        </div> --}}
                    <label for="password" class="block text-sm font-medium leading-6">Password</label>
                    <div class="mt-2">
                        <input id="password" name="password" type="password" autocomplete="current-password" required
                            class="block w-full rounded-md border-0 py-1.5 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-black sm:text-sm sm:leading-6">
                    </div>
                </div>

                <div>
                    <button type="submit"
                        class="flex w-full justify-center rounded-md bg-indigo-700 text-white px-3 py-1.5 text-sm font-semibold leading-6 shadow-sm hover:bg-indigo-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-white">Sign
                        in</button>
                </div>
            </form>

            <p class="mt-10 text-center text-sm text-gray-600 font-semibold">
                Don't have an account?
                <a href="{{ route('register') }}" class="font-semibold leading-6 text-indigo-700 hover:text-indigo-500">Sign up here!</a>
            </p>
        </div>
    </div>
@endsection
