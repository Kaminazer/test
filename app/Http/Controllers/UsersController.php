<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class UsersController extends Controller
{
    public function create()
    {
        User::create([
            "name" => "Nazar",
            "email" => "test57@gmail.com",
            "password" => "test",
        ]);
    }
    
    public function update()
    {
        $user = User::find(1);
        $user->update([
            "name" => "Ivan",
            "email" => "test@gmail.com",
            "password" => "test",
        ]);
    }
    
    public function delete()
    {
        $user = User::find(11);
        $user->delete();
    }
    public function show()
    {
        $user = User::withTrashed()->find(11);
        $user->restore();
        echo "$user->name";
        return view('users');
    }

    public function firstOrCreate()
    {
        $user = User::firstOrCreate([
            "email" => "test27@gmail.com",
        ],
        [
            "name" => "Stepan",
            "email" => "test28@gmail.com",
            "password" => "test588",
        ]);
        dump($user->email);
    }

    public function updateOrCreate()
    {
        $user = User::updateOrCreate([
            "email" => "test295@gmail.com",
        ],
        [
            "name" => "Artem",
            "email" => "test368@gmail.com",
            "password" => "test578",
        ]);
        dump($user->email);
    }
    public function about()
    {
        return view('about');
    }
    public function home()
    {
        return view('welcome');
    }
    public function contacts()
    {
        return view('contacts');
    }
}
