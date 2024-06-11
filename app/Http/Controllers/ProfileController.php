<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class ProfileController extends Controller
{
    public function show($id)
    {
        $user = User::findOrFail($id);

        if (Auth::id() !== $user->id) {
            abort(403, 'Unauthorized action.');
        }

        return view('profile.show', compact('user'));
    }

    public function edit($id)
    {
        $user = User::findOrFail($id);

        if (Auth::id() !== $user->id) {
            abort(403, 'Unauthorized action.');
        }

        return view('profile.edit', compact('user'));
    }

    public function update(Request $request, $id)
    {
        $user = User::findOrFail($id);

        if (Auth::id() !== $user->id) {
            abort(403, 'Unauthorized action.');
        }

        // Validate and update user data
        $request->validate([
            'name' => 'required|string|max:255',
            'birthday' => 'required|date',
            'about' => 'nullable|string|max:500',
            'avatar' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048'
        ]);

        // Handle avatar upload
        if ($request->hasFile('avatar')) {
            $avatarPath = $request->file('avatar')->store('avatars', 'public');
            $user->avatar = $avatarPath;
        }

        // Update other user data
        $user->name = $request->name;
        $user->birthday = $request->birthday;
        $user->about = $request->about;
        $user->save();

        return redirect()->route('profile.show', $user->id)->with('success', 'Profile updated successfully.');
    }
}
