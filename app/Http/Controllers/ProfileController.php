<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class ProfileController extends Controller
{
    public function index()
    {
        return view('profile.index');
    }

    public function edit($username)
    {
        $user = User::where('username', $username)->firstOrFail();

        return view('profile.edit', compact('user'));
    }

    public function update(Request $request)
    {
        $user = $request->user();

        $request->validate([
            'username' => 'required|unique:users,username,' . $user->id,
            'email' => 'required|email|unique:users,email,' . $user->id,
            'image' => 'image|mimes:jpeg,png,jpg,svg|max:2048',
        ]);

        if ($user->username !== $request->username || $user->email !== $request->email) {
            $user->username = $request->username;
            $user->email = $request->email;
            $user->save();
        }

        if ($request->hasFile('image')) {
            $path = $request->file('image')->store('images', ['disk' => 'public']);

            $user->update([
                'image' => $path,
            ]);

            return redirect()->route('profile', $user->username);
        }

        return redirect()->route('profile', $user->username);
    }
}
