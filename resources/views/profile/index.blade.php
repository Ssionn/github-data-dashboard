@extends('layouts.app')

@section('title', 'Profile')

@section('content')
    <div class="p-8 sm:ml-64 sm:p-0">
        <h1 class="mt-10 text-3xl font-bold text-white">Profile</h1>
        <div class="flex flex-col mt-10 space-y-16 md:flex-row md:space-y-0">
            @include('components.profile.user-information')
        </div>

        <div class="flex flex-col justify-center mt-10 sm:justify-start">
            <h1 class="text-2xl font-semibold text-white">
                {{ __('Account Information') }}
            </h1>
        </div>
        <div class="mt-10">
            @include('components.profile.account-information')
        </div>
    @endsection
