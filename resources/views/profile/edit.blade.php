@extends('layouts.app')

@section('title', 'Editing Profile of' . Auth::user()->name)

@section('content')
    <div class="sm:ml-64 sm:p-0 p-8">
        <h1 class="text-3xl font-bold text-white mt-10">Edit Profile</h1>
    </div>
@endsection
