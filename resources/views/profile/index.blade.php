@extends('layouts.app')

@section('title', 'Profile')

@section('content')
    <div class="sm:ml-64 sm:p-0 p-8">
        <h1 class="text-3xl font-bold text-white mt-10">Profile</h1>
        <div class="mt-10 flex flex-col md:flex-row">
            <div class="flex flex-col">
                <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcQearoVADR6cVELwQsaVllGnWEvnbQ1Q_vXi_o2B1_-8A&s" alt="Profile Image" class="w-64 h-64 bg-white rounded-xl">
                <button class="bg-white text-gray-800 px-4 py-2 rounded-md mt-4 w-64">Change Profile Picture</button>
            </div>
            <div class="rounded p-4 md:ml-32 overflow-ellipsis w-full">
                <h1 class="font-semibold text-3xl text-white">
                    {{ Auth::user()->name }}
                </h1>
                <p class="text-white text-sm">{{ Auth::user()->email }}</p>
                <div>
                    <a href="#" class="bg-white text-gray-800 px-4 py-2 rounded-md mt-4 inline-block">Edit Profile
                    </a>
                </div>
                <div class="mt-4">
                    <h1 class="text-lg text-white font-medium">
                        {{ __('User Information') }}
                    </h1>
                    <div class="mt-6">
                        <p class="text-white text-md">
                            <span class="font-semibold">Member Since:</span>
                        </p>
                        <p class="text-sm text-white">
                            {{ Auth::user()->created_at->format('F j, Y') }}
                            ({{ Auth::user()->created_at->diffForHumans() }})
                        </p>
                    </div>
                </div>
            </div>
        </div>

        <div class="mt-10 flex justify-center sm:justify-start flex-col">
            <h1 class="text-white text-2xl">
                {{ __('Account Information') }}
            </h1>
        </div>
        <div class="mt-10">
            <h1 class="text-2xl font-bold text-white">Most Popular Repositories</h1>
            <div class="mt-10 bg-white rounded p-4">
                <ul class="space-y-4 mb-6">
                    <li>
                        <a href="#" class="block p-4 bg-gray-100 dark:bg-gray-800 rounded-lg">Repository 1</a>
                    </li>

                    <li>
                        <a href="#" class="block p-4 bg-gray-100 dark:bg-gray-800 rounded-lg">Repository 2</a>
                    </li>
                </ul>

                <a href="#" class="p-4 underline">View All Repositories</a>
            </div>

            <h1 class="text-2xl font-bold text-white mt-10">Recent Issues</h1>
            <div class="mt-10 bg-white rounded p-4">
                <ul class="space-y-4 mb-6">
                    <li>
                        <a href="#" class="block p-4 bg-gray-100 dark:bg-gray-800 rounded-lg">Issue 1</a>
                    </li>

                    <li>
                        <a href="#" class="block p-4 bg-gray-100 dark:bg-gray-800 rounded-lg">Issue 2</a>
                    </li>
                </ul>

                <a href="#" class="p-4 underline mt-6">View All Issues</a>
            </div>

            <h1 class="text-2xl font-bold text-white mt-10">Recent Pull Requests</h1>
            <div class="mt-10 bg-white rounded p-4">
                <ul class="space-y-4 mb-6">
                    <li>
                        <a href="#" class="block p-4 bg-gray-100 dark:bg-gray-800 rounded-lg">Pull Request 1</a>
                    </li>

                    <li>
                        <a href="#" class="block p-4 bg-gray-100 dark:bg-gray-800 rounded-lg">Pull Request 2</a>
                    </li>
                </ul>

                <a href="#" class="p-4 underline mt-6">View Pull Requests</a>
            </div>
        </div>
    @endsection
