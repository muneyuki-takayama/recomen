<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use App\Http\Requests\UserRequest;
use Illuminate\Support\Facades\Storage;

class UserController extends Controller
{
    public function show(string $name)
    {
        $user = User::where('name', $name)->first();
        $products = $user->products->sortByDesc('created_at');

        return view('users.show', [
            'user' => $user,
            'products' => $products,
        ]);
    }

    public function edit(string $name)
    {
        $user = User::where('name', $name)->first();

        return view('users.edit', ['user' => $user]);
    }

    public function update(UserRequest $request, User $user)
    {
        $user->fill($request->all());

        $image_prof = $request->file('profile_photo');
        $path = Storage::disk('s3')->putFile('recomen', $image_prof, 'public');
        $user->profile_photo = Storage::disk('s3')->url($path);

        $user->save();
        return redirect()->route('users.show');
    }

    public function likes(string $name)
    {
        $user = User::where('name', $name)->first();

        $products = $user->likes->sortByDesc('created_at');

        return view('users.likes', [
            'user' => $user,
            'products' => $products,
        ]);
    }

    public function followings(string $name)
    {
        $user = User::where('name', $name)->first();
 
        $followings = $user->followings->sortByDesc('created_at');
 
        return view('users.followings', [
            'user' => $user,
            'followings' => $followings,
        ]);
    }
    
    public function followers(string $name)
    {
        $user = User::where('name', $name)->first();
 
        $followers = $user->followers->sortByDesc('created_at');
 
        return view('users.followers', [
            'user' => $user,
            'followers' => $followers,
        ]);
    }

    public function follow(Request $request, string $name)
    {
        $user = User::where('name', $name)->first();
 
        if ($user->id === $request->user()->id)
        {
            return abort('404', 'Cannot follow yourself.');
        }
 
        $request->user()->followings()->detach($user);
        $request->user()->followings()->attach($user);
 
        return ['name' => $name];
    }
    
    public function unfollow(Request $request, string $name)
    {
        $user = User::where('name', $name)->first();
 
        if ($user->id === $request->user()->id)
        {
            return abort('404', 'Cannot follow yourself.');
        }
 
        $request->user()->followings()->detach($user);
 
        return ['name' => $name];
    }
}
