@extends('layouts.app')

@section('title', 'Home')

@section('content')
    <div class="sm:ml-64">
        <h1 class="text-3xl font-bold text-white mt-10">Dashboard</h1>
        <div class="mt-10 bg-white rounded p-4">
            <p class="text-gray-600 dark:text-gray-400">Welcome to the Gitlab Data Viewer dashboard. This is a
                simple application to view your Gitlab projects and issues.</p>
            <p class="text-gray-600 dark:text-gray-400 mt-2">This dashboard will contain things such as, Metrics, Project information, you name it.</p>
        </div>
    </div>
@endsection
