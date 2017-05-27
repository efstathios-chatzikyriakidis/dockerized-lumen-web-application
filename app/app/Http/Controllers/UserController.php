<?php

// Change here.

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class UserController extends Controller
{
    public function index() {
        $users  = User::all();

        return response()->json($users);
    }

    public function createUser(Request $request) {
        $user = User::create($request->all());

        return response()->json($user);
    }
}

?>