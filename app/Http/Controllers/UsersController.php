<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;

class UsersController extends Controller
{
    /**
     * @param User $user
     * @return $this
     */
    public function index(User $user)
    {
        return view('dashboard.user.index')->with(['users' => $user->all()]);
    }
}
