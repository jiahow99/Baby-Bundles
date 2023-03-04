<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class UserController extends Controller
{
    public function edit(User $user){
        return view('user.edit', compact('user'));
    }

    public function update(User $user){

        $inputs = request()->validate([
            'name' => 'required|alpha_dash|between:4,10|',
            'email' => 'required|email|unique:users,email',
            'contact' => 'required|between:8,12',
            'gender' => 'required',
            'location' => 'required'
        ]);


    }
}
