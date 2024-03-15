@extends('layouts.app')

@section('title', 'Home')

@section('content')
    <div class="p-8 sm:ml-64 sm:p-0">
        <h1 class="mt-10 text-3xl font-bold text-white">Dashboard</h1>
        <div class="p-4 mt-10 bg-white rounded">
            <p class="text-gray-600 dark:text-gray-400">Welcome to the Gitlab Data Viewer dashboard. This is a
                simple application to view your Gitlab projects and issues.</p>
            <p class="mt-2 text-gray-600 dark:text-gray-400">This dashboard will contain things such as, Metrics, Project information, you name it.</p>
        </div>
    </div>
@endsection
