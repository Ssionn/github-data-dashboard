@extends('layouts.app')

@section('title', 'Projects')

@section('content')
    <div class="sm:ml-64 sm:p-0 p-8">
        <div class="flex justify-between items-center mt-10">
            <h1 class="text-3xl font-bold text-white">Projects</h1>
            <form method="POST" action="{{ route('execute.job', Auth::user()->id) }}">
                @csrf
                <button type="submit" class="px-4 py-2 bg-white rounded">Execute Job</button>
            </form>
        </div>
        <div class="bg-white rounded p-4 mt-10">
            <ul class="space-y-4">
                @if ($projects && $projects->count() > 0)
                    @foreach ($projects as $project)
                        <li>
                            <a href="{{ $project->html_url }}" target="_blank">
                                <div class="p-4 bg-gray-100 rounded-xl">
                                    <div class="flex justify-between">
                                        <h1>{{ $project->name }}</h1>
                                        <p class="text-gray-400 text-sm">
                                            {{ __('Updated At: ') . $project->updated_at }}
                                        </p>
                                    </div>
                                    <p class="text-gray-400 text-sm">{{ $project->owner }}</p>
                                </div>
                            </a>
                        </li>
                    @endforeach
                @else
                    <p class="text-gray-600 dark:text-gray-400">
                        {{ __('You have no projects. Either create one, or sync using the button above.') }}</p>
                @endif
            </ul>
        </div>
    </div>
@endsection
