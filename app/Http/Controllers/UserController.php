<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class UserController extends Controller
{
    public function index(){
        //Para crear usuarios
        // $users = User::factory()->count(12)->create();
        //Para obtener los usuarios
        $users = User::latest()->get();

        return view('users.index', [
            'users' => $users
        ]);
    }

    public function store(Request $request){
        User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => $request->password,
        ]);
        return back();
    }

    public function destroy(User $user){
        $user->delete();
        return back();
    }
}
