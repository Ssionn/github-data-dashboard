@extends('layouts.app')

@section('title', 'Projects')

@section('content')
    <div class="p-8 sm:ml-64 sm:p-0">
        <div class="flex items-center justify-between mt-10">
            <h1 class="text-3xl font-bold text-white">Projects</h1>
            <form method="POST" action="{{ route('execute.job', Auth::user()->id) }}">
                @csrf
                <button type="submit" class="px-4 py-2 bg-white rounded">Execute Job</button>
            </form>
        </div>
        <p class="mt-2 text-xs text-white">{{ __('All dates are shown in the "little-endian" format') }}</p>
        <div class="p-4 mt-10 mb-10 bg-white rounded">
            <ul class="space-y-4">
                @include('projects.partials.repositories')
            </ul>
            <div class="mt-3">
                {{ $projects->links() }}
            </div>
        </div>

    </div>
@endsection
