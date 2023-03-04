<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class UserController extends Controller
{
    public function edit(User $user){
        // return view('user.edit', compact('user'));
        if(!$user->can('edit', $user)){
            dd('1');
        }
    }
}
