@extends('layouts.app')

@section('title', 'Projects')

@section('content')
    <div class="sm:ml-64">
        <h1 class="text-3xl font-bold text-white mt-10">Projects</h1>
        <div class="bg-white rounded p-4 mt-10">

            @auth
                <ul class="space-y-4">
                    <li>
                        <a href="#" class="block p-4 bg-gray-100 dark:bg-gray-800 rounded-lg">Project 1</a>
                    </li>

                    <li>
                        <a href="#" class="block p-4 bg-gray-100 dark:bg-gray-800 rounded-lg">Project 2</a>
                    </li>

                </ul>
            @else
                <p class="mt-6 text-gray-600 dark:text-gray-400">Please <a href="{{ route('login') }}"
                        class="text-blue-600 dark:text-blue-400">sign in</a> to view your projects.</p>
            @endauth
        </div>
    </div>
@endsection
