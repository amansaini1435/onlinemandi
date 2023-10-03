<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\UserProfile;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;


class UserProfileController extends Controller
{
    public function edit()
    {
        $user = auth()->user();
        $userProfile = $user->profile;
        return view('users.edit', compact('userProfile', 'user'));
    }

    public function update(Request $request)
    {
        $user = Auth::user();
        $user->name = $request->input('name');
        $user->email = $request->input('email');
        $user->save();

        $userProfile = $user->userProfile;

        if (!$userProfile) {
            $userProfile = new UserProfile();
            $userProfile->user_id = $user->id;
        }

        $name = $request->input('name');
        $email = $request->input('email');
        $address = $request->input('address');
        $phone = $request->input('phone');

        if (
            $userProfile->name !== $name ||
            $userProfile->email !== $email ||
            $userProfile->address !== $address ||
            $userProfile->phone !== $phone
        ) {

            $existingUserProfile = UserProfile::where('user_id', $user->id)->first();

            if ($existingUserProfile) {
                $existingUserProfile->name = $name;
                $existingUserProfile->email = $email;
                $existingUserProfile->address = $address;
                $existingUserProfile->phone = $phone;

                if ($request->filled('croppedImage')) {
                    $extension = explode('/', mime_content_type($request->croppedImage))[1];
                    $imageName = "UserProfile-" . now()->timestamp . "." . $extension;
                    Storage::disk('public')->put(
                        'images/' . $imageName,
                        file_get_contents($request->croppedImage)
                    );
                    $existingUserProfile["image"] = $imageName;
                }
                $existingUserProfile->save();
            } else {
                $userProfile->name = $name;
                $userProfile->email = $email;
                $userProfile->address = $address;
                $userProfile->phone = $phone;

                if ($request->hasFile('image')) {
                    $image = $request->file('image');
                    $imageName = "UserProfile-" . now()->timestamp . "." . $image->getClientOriginalExtension();
                    Storage::disk('public')->put('images/' . $imageName, file_get_contents($image));
                    $userProfile->image = $imageName;
                }

                if ($request->croppedImage != null) {
                    $extension = explode('/', mime_content_type($request->croppedImage))[1];
                    $imageName = "userProfile-" . now()->timestamp . "." . $extension;
                    // Image::make(file_get_contents($request->croppedImage))->save($path); 
                    Storage::disk('public')->put(
                        $imageName,
                        file_get_contents($request->croppedImage)
                    );
                    $creationData["image"] = $imageName;
                }
                $userProfile->save();
            }
        }
        return redirect()->route('user_profile.edit')->with('status', 'Profile information updated successfully');
    }
}
