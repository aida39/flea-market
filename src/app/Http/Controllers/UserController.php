<?php

namespace App\Http\Controllers;

use App\Models\Profile;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class UserController extends Controller
{
    public function mypage()
    {
        $user_id = Auth::id();
        $profile = Profile::where('user_id', $user_id)->with('user')->first();
        return view('mypage', compact('profile'));
    }

    public function editProfile()
    {
        $user_id = Auth::id();
        $profile = Profile::where('user_id', $user_id)->with('user')->first();
        return view('profile', compact('profile'));
    }

    public function updateOrCreateProfile(Request $request)
    {
        $user_id = Auth::id();
        $profile = Profile::where('user_id', $user_id)->with('user')->first();

        if ($request->hasFile('image')) {
            // if ($profile) {
            //     $old_image_path = str_replace('storage', 'public', $profile->image_path);
            //     if (Storage::disk('local')->exists($old_image_path)) {
            //         Storage::disk('local')->delete($old_image_path);
            //     }
            // }
            if ($profile) {
                $old_image_path = str_replace('storage', 'public', $profile->image_path);
                Storage::disk('local')->delete($old_image_path);
            }
            $request->file('image')->store('public/images');
            $image_path = 'storage/images/' . $request->file('image')->hashName();
        } else {
            $image_path = $profile ? $profile->image_path : null;
        }

        Profile::updateOrCreate(
            ['user_id' => $user_id],
            array_merge($request->only(['name', 'postal_code', 'address', 'building']), ['user_id' => $user_id, 'image_path' => $image_path])
        );

        return redirect('/mypage');
    }
}
