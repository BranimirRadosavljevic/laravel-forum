<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\User;
use Illuminate\Http\Request;

class UserAvatarController extends Controller
{
    public function store(User $user)
    {
        request()->validate([
            'avatar' => ['required', 'image']
        ]);

        $user->update([
            'avatar_path' => request()->file('avatar')->store('avatars', 'public')
        ]);

        return response([], 204);
    }
}
