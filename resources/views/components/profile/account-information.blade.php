<h1 class="text-2xl font-medium text-white">{{ __('Most Popular Repositories') }}</h1>
<div class="p-4 mt-10 bg-white rounded-xl">
    <ul class="space-y-4">
        @php
            $sortedProjects = $projects->sortByDesc(function ($project) {
                return $project->events->sum('stargazers_count');
            });
        @endphp
        @if ($sortedProjects->count() > 0)
            @foreach ($sortedProjects as $project)
                <div class="bg-gray-100 rounded-lg dark:bg-gray-800">
                    <li class="p-4 mb-4">
                        <a href="{{ $project->html_url }}" class="flex justify-between">
                            <p class="text-lg font-semibold text-gray-800 dark:text-gray-200">
                                {{ $project->name }}
                            </p>
                            <div class="flex flex-col items-center">
                                <p class="text-sm text-gray-400">
                                    {{ __('Updated: ') . $project->dateFormatted() }}
                                </p>
                                <div class="inline-flex space-x-4">
                                    @if ($project->events->count() > 0)
                                        @foreach ($project->events as $event)
                                            <div class="inline-flex items-center space-x-1">
                                                <svg xmlns="http://www.w3.org/2000/svg" fill="none"
                                                    viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor"
                                                    class="w-4 h-4 text-gray-400">
                                                    <path stroke-linecap="round" stroke-linejoin="round"
                                                        d="M11.48 3.499a.562.562 0 0 1 1.04 0l2.125 5.111a.563.563 0 0 0 .475.345l5.518.442c.499.04.701.663.321.988l-4.204 3.602a.563.563 0 0 0-.182.557l1.285 5.385a.562.562 0 0 1-.84.61l-4.725-2.885a.562.562 0 0 0-.586 0L6.982 20.54a.562.562 0 0 1-.84-.61l1.285-5.386a.562.562 0 0 0-.182-.557l-4.204-3.602a.562.562 0 0 1 .321-.988l5.518-.442a.563.563 0 0 0 .475-.345L11.48 3.5Z" />
                                                </svg>
                                                <p class="text-xs text-gray-400">
                                                    @if ($event->stargazers_count != null)
                                                        {{ $event->stargazers_count }}
                                                    @else
                                                        {{ '?' }}
                                                    @endif
                                                </p>
                                            </div>
                                            <div class="inline-flex items-center space-x-1">
                                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512"
                                                    class="w-4 h-4">
                                                    <path fill="#9ca3af"
                                                        d="M80 104a24 24 0 1 0 0-48 24 24 0 1 0 0 48zm80-24c0 32.8-19.7 61-48 73.3V192c0 17.7 14.3 32 32 32H304c17.7 0 32-14.3 32-32V153.3C307.7 141 288 112.8 288 80c0-44.2 35.8-80 80-80s80 35.8 80 80c0 32.8-19.7 61-48 73.3V192c0 53-43 96-96 96H256v70.7c28.3 12.3 48 40.5 48 73.3c0 44.2-35.8 80-80 80s-80-35.8-80-80c0-32.8 19.7-61 48-73.3V288H144c-53 0-96-43-96-96V153.3C19.7 141 0 112.8 0 80C0 35.8 35.8 0 80 0s80 35.8 80 80zm208 24a24 24 0 1 0 0-48 24 24 0 1 0 0 48zM248 432a24 24 0 1 0 -48 0 24 24 0 1 0 48 0z" />
                                                </svg>
                                                <p class="text-xs text-gray-400">
                                                    @if ($event->forks_count != null)
                                                        {{ $event->forks_count }}
                                                    @else
                                                        {{ '?' }}
                                                    @endif
                                                </p>
                                            </div>
                                            <div class="inline-flex items-center space-x-1">
                                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 576 512"
                                                    class="w-4 h-4">
                                                    <path fill="#9ca3af"
                                                        d="M288 80c-65.2 0-118.8 29.6-159.9 67.7C89.6 183.5 63 226 49.4 256c13.6 30 40.2 72.5 78.6 108.3C169.2 402.4 222.8 432 288 432s118.8-29.6 159.9-67.7C486.4 328.5 513 286 526.6 256c-13.6-30-40.2-72.5-78.6-108.3C406.8 109.6 353.2 80 288 80zM95.4 112.6C142.5 68.8 207.2 32 288 32s145.5 36.8 192.6 80.6c46.8 43.5 78.1 95.4 93 131.1c3.3 7.9 3.3 16.7 0 24.6c-14.9 35.7-46.2 87.7-93 131.1C433.5 443.2 368.8 480 288 480s-145.5-36.8-192.6-80.6C48.6 356 17.3 304 2.5 268.3c-3.3-7.9-3.3-16.7 0-24.6C17.3 208 48.6 156 95.4 112.6zM288 336c44.2 0 80-35.8 80-80s-35.8-80-80-80c-.7 0-1.3 0-2 0c1.3 5.1 2 10.5 2 16c0 35.3-28.7 64-64 64c-5.5 0-10.9-.7-16-2c0 .7 0 1.3 0 2c0 44.2 35.8 80 80 80zm0-208a128 128 0 1 1 0 256 128 128 0 1 1 0-256z" />
                                                </svg>
                                                <p class="text-xs text-gray-400">
                                                    {{ $event->watchers_count ?? '?' }}
                                                </p>
                                            </div>
                                        @endforeach
                                    @endif
                                </div>
                            </div>
                        </a>
                    </li>
                </div>
            @endforeach
            <div class="px-3 mt-3">
                <a href="{{ route('projects') }}" target="_blank"
                    class="underline">{{ __('View All Repositories') }}</a>
            </div>
        @else
            <p class="p-4 text-gray-600 dark:text-gray-400">
                {{ __('You have no projects. Either you haven\'t synced yet, or you have no projects') }}
            </p>
        @endif
    </ul>
</div>

<h1 class="mt-10 text-2xl font-medium text-white">{{ __('Recent Issue') }}</h1>
<div class="p-4 mt-10 bg-white rounded-xl">
    <ul class="mb-6 space-y-4">
        <li>
            <a href="#" class="block p-4 bg-gray-100 rounded-lg dark:bg-gray-800">Issue 1</a>
        </li>

        <li>
            <a href="#" class="block p-4 bg-gray-100 rounded-lg dark:bg-gray-800">Issue 2</a>
        </li>
    </ul>

    <div class="px-3 mt-3">
        <a href="#" class="underline">{{ __('View All Issues') }}</a>
    </div>
</div>

<h1 class="mt-10 text-2xl font-medium text-white">{{ __('Recent Pull Requests') }}</h1>
<div class="p-4 mt-10 bg-white rounded-xl">
    <ul class="mb-6 space-y-4">
        <li>
            <a href="#" class="block p-4 bg-gray-100 rounded-lg dark:bg-gray-800">Pull Request 1</a>
        </li>

        <li>
            <a href="#" class="block p-4 bg-gray-100 rounded-lg dark:bg-gray-800">Pull Request 2</a>
        </li>
    </ul>

    <div class="px-3 mt-3">
        <a href="#" class="underline">{{ __('View All PR\'s') }}</a>
    </div>
</div>
