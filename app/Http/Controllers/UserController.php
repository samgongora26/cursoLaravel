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

        $request->validate([
            'name'      => 'required',
            'email'     => ['required', 'email', 'unique:users'],
            'password'  => ['required', 'min:8'],
        ]);

        User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => bcrypt($request->password),
        ]);
        return back();
    }

    public function destroy(User $user){
        $user->delete();
        return back();
    }
}
