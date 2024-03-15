<div class="flex flex-col w-64 h-64">
    <img src="{{ Auth::user()->getImageUrl() }}" alt="Profile Image"
        class="object-contain w-full h-full bg-black rounded-xl">
    <a href="{{ route('profile.edit', Auth::user()->username) }}"
        class="w-64 px-4 py-2 mt-4 text-gray-800 bg-white rounded-md">Change Profile Picture</a>
</div>
<div class="w-full px-4 pt-20 pb-0 rounded sm:px-0 sm:pt-0 md:ml-32 sm:mt-0">
    <h1 class="text-3xl font-semibold text-white">
        {{ Auth::user()->username }}
    </h1>
    <div>
        <a href="{{ route('profile.edit', Auth::user()->username) }}"
            class="inline-block px-4 py-2 mt-4 text-gray-800 bg-white rounded-md">Edit Profile
        </a>
    </div>
    <div class="mt-8">
        <h1 class="text-xl font-medium text-white">
            {{ __('User Information') }}
        </h1>
        <h1 class="mt-3 text-lg font-bold text-white">
            {{ ucfirst(Auth::user()->name) }}
        </h1>
        <p class="text-sm text-white">{{ Auth::user()->email }}</p>
        <div class="mt-6">
            <p class="text-white text-md">
                <span class="font-semibold">Member Since:</span>
            </p>
            <p class="text-sm text-white">
                {{ Auth::user()->dateFormatted() }}
                ({{ Auth::user()->created_at->diffForHumans() }})
            </p>
        </div>
    </div>
</div>
