@extends('layouts.app')

@section('title', 'Editing Profile of ' . Auth::user()->name)

@section('content')
    <div class="sm:ml-64 sm:p-0 p-8">
        <h1 class="text-3xl font-bold text-white mt-10">Edit Profile</h1>
        <div class="mt-10 space-y-10">
            <form method="POST" action="{{ route('profile.update', Auth::user()->username) }}" enctype="multipart/form-data">
                @csrf
                @method('PATCH')

                <div class="bg-white p-4 rounded-xl">
                    @include('profile.partials.update-username')
                </div>
                <div class="bg-white p-4 rounded-xl mt-4">
                    @include('profile.partials.update-profile-picture')
                </div>
                <div class="bg-white p-4 rounded-xl mt-4">
                    <button type="submit"
                        class="flex w-full justify-center rounded-md bg-indigo-700 text-white px-3 py-1.5 text-sm font-semibold leading-6 shadow-sm hover:bg-indigo-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-white">Save
                        Changes</button>
                </div>
            </form>
        </div>
    </div>
@endsection
