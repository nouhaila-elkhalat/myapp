<?php

namespace App\Http\Controllers\admin;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class UserController extends Controller
{
    public function index()
    {
        $users= User::with('roles')->get;
        return view('admin.users.index',[
            "users" => $users
        ]);
    }
}
