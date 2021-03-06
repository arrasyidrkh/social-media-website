<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use Intervention\Image\Facades\Image;

class ProfilesController extends Controller
{
    public function index(User $user)
    {
        return view('profiles.index', compact('user'));
    }

    public function edit(User $user)
    {
        return view('profiles.edit',compact('user'));
    }

    public function update(User $user)
    {
        $data = request()->validate([
            'title' => 'required',
            'description' => 'required',
            'url' => 'url',
            'avatar' => '',
        ]);

        if (request('avatar')) {
          $imagePath = request('avatar')->store('profile', 'public');

          $image = Image::make(public_path("storage/{$imagePath}"))->fit(1000, 1000);
          $image->save();

          $imageArray = ['avatar' => $imagePath];
        }

        auth()->user()->update(array_merge(
            $data,
            $imageArray ?? []
        ));

        return redirect("/profile/{$user->id}");
    }
}
