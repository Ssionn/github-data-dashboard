<div class="flex flex-col">
    <label for="username" class="font-medium">Username</label>
    <input type="text" name="username" id="username" value="{{ $user->username }}"
        class="mt-2 rounded-md border-0 py-1.5 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-black sm:text-sm sm:leading-6">
</div>

<div class="flex flex-col mt-4">
    <label for="email" class="font-medium">Email</label>
    <input type="email" name="email" id="email" value="{{ $user->email }}"
        class="mt-2 rounded-md border-0 py-1.5 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-black sm:text-sm sm:leading-6">
</div>
