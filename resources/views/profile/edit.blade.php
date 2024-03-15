@extends('layouts.app')

@section('title', 'Editing Profile of ' . Auth::user()->name)

@section('content')
    <div class="p-8 sm:ml-64 sm:p-0">
        <h1 class="mt-10 text-3xl font-bold text-white">Edit Profile</h1>
        <div class="mt-10 space-y-10">
            <form method="POST" action="{{ route('profile.update', Auth::user()->username) }}" enctype="multipart/form-data">
                @csrf
                @method('PATCH')

                <div class="p-4 bg-white rounded-xl">
                    @include('profile.partials.update-username')
                </div>
                <div class="p-4 mt-4 bg-white rounded-xl">
                    @include('profile.partials.update-profile-picture')
                </div>
                <div class="p-4 mt-4 bg-white rounded-xl">
                    <button type="submit"
                        class="flex w-full justify-center rounded-md bg-indigo-700 text-white px-3 py-1.5 text-sm font-semibold leading-6 shadow-sm hover:bg-indigo-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-white">Save
                        Changes</button>
                </div>
            </form>
        </div>
    </div>
@endsection
