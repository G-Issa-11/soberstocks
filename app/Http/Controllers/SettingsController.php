<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;

class SettingsController extends Controller
{
    public function index() {
        return view('menupages.settings');
    }

    public function updatePassword(Request $request) {
        $request->validate([
            'current_password' => 'required',
            'new_password' => 'required|string|min:8|confirmed',
        ]);

        $user = Auth::user();

        if (!Hash::check($request->current_password, $user->password)) {
            return redirect()->back()->with('error', 'Current password is incorrect.');
        }

        $user->update(['password' => Hash::make($request->new_password)]);

        return redirect()->back()->with('success', 'Password updated successfully.');
    }

    // public function updateProfile(Request $request) {
    //     $request->validate([
    //         'name' => 'required|string|max:255',
    //         'profile_picture' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
    //         'delete_profile_picture' => 'nullable|boolean', // New validation rule for the delete checkbox
    //     ]);

    //     $user = Auth::user();

    //     $user->update(['name' => $request->name]);

    //     // Check if the delete checkbox is selected
    //     if ($request->input('delete_profile_picture')) {
    //         // Delete the existing profile picture
    //         if ($user->profile_picture) {
    //             Storage::disk('public')->delete($user->profile_picture);
    //             $user->update(['profile_picture' => null]);
    //         }
    //     } elseif ($request->hasFile('profile_picture')) {
    //         // Upload a new profile picture if a file is provided
    //         $path = $request->file('profile_picture')->store('profile_pictures', 'public');
    //         $user->update(['profile_picture' => $path]);
    //     }

    //     return redirect()->back()->with('success_profile', 'Profile updated successfully.');
    // }

    public function updateProfile(Request $request) {
        $request->validate([
            'name' => 'required|string|max:255',
            'profile_picture' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);
    
        $user = Auth::user();
    
        $user->update(['name' => $request->name]);
    
        if ($request->hasFile('profile_picture')) {
            // Upload a new profile picture if a file is provided
            $path = $request->file('profile_picture')->store('profile_pictures', 'public');
            $user->update(['profile_picture' => $path]);
        }
    
        return redirect()->back()->with('success_profile', 'Profile updated successfully.');
    }

    public function deleteProfilePicture() {
        $user = Auth::user();
    
        // Delete the existing profile picture
        if ($user->profile_picture) {
            Storage::disk('public')->delete($user->profile_picture);
            $user->update(['profile_picture' => null]);
            return redirect()->back()->with('success_profilepic', 'Profile picture deleted successfully.');
        } else {
            return redirect()->back()->with('error_profilepic', 'No profile picture to delete.');
        }
    }
    
    

}
