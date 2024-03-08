@extends('layouts.app')

@section('title', 'Projects')

@section('content')
    <div class="sm:ml-64 sm:p-0 p-8">
        <div class="flex justify-between items-center mt-10">
            <h1 class="text-3xl font-bold text-white">Projects</h1>
            <form method="POST" action="{{ route('execute.job') }}">
                @csrf
                <button type="submit" class="px-4 py-2 bg-white rounded">Execute Job</button>
            </form>
        </div>
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
                <p class="text-gray-600 dark:text-gray-400">Please <a href="{{ route('login') }}"
                        class="text-blue-600 dark:text-blue-400">sign in</a> to view your projects.</p>
            @endauth
        </div>
    </div>
@endsection
