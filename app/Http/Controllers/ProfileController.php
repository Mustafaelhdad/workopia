<?php

namespace App\Http\Controllers;

use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class ProfileController extends Controller
{
    public function update(Request $request): RedirectResponse
    {
        $user = Auth::user();

        $validatedData = $request->validate([
            'name' => 'required|string',
            'email' => 'required|string|email',
            'avatar' => 'nullable|image|mimes:png,jpg,jpeg,gif|max:2048',
        ]);

        // get user name and email
        $user->name = $request->input('name');
        $user->email = $request->input('email');

        // handle avatar upload
        if ($request->hasFile('avatar')) {
            // delete old avatar if exists
            if ($user->avatar) {
                Storage::delete('public/' . $user->avatar);
            }

            // store new avatar
            $avatarPath = $request->file('avatar')->store('avatars', 'public');
            $user->avatar = $avatarPath;
        }

        $user->save($validatedData);

        return redirect()->route('dashboard')->with('success', "Profile info updated!");
    }
}
