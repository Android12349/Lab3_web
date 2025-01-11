<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class FriendController extends Controller
{
    public function addFriend(User $user)
    {
        $currentUser = auth()->user();

        $currentUser->friends()->syncWithoutDetaching([$user->id]);
        $user->friends()->syncWithoutDetaching([$currentUser->id]);

        return back()->with('success', 'Пользователь добавлен в друзья!');
    }

    public function removeFriend(User $user)
    {
        $currentUser = auth()->user();

        $currentUser->friends()->detach($user->id);
        $user->friends()->detach($currentUser->id);

        return back()->with('success', 'Пользователь удалён из друзей!');
    }
}

