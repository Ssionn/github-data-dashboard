<div class="flex flex-col">
    <h3 class="font-bold text-semibold">{{ $project->name }}</h3>
    @if ($project->owner != Auth::user()->username)
        <p class="mt-2 text-sm text-gray-400">{{ __('Owner: ') . $project->owner }}</p>
        <p class="text-sm text-gray-400">{{ __('Collaborator: ') . Auth::user()->username }}</p>
    @else
        <p class="text-sm text-gray-400">{{ Auth::user()->username }}</p>
    @endif
</div>
