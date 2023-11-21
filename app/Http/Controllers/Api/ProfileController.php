<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Http\Requests\UserRequest;
use Illuminate\Support\Facades\Storage;

class ProfileController extends Controller
{
    /**
     * Update the image from the token bearer from resource.
     */
    public function image(UserRequest $request)
    {
        $user = User::findorFail($request->user()->id);
        if (!is_null($user->image)) {
            Storage::disk('public')->delete($user->image);
        }

        $user->image = $request->file('image')->storePublicly('images', 'public');

        $user->save();
        return $user;
    }

    /**
     * Display the specified info of the token beearer.
     */
    public function show(Request $request)
    {
        return $request->user();
    }
}
