<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;

class UsersController extends Controller
{
	public function __construct()
	{
		$this->middleware('superAdmin');
	}
    /**
     * @param User $user
     * @return $this
     */
    public function index(User $user)
    {
        return view('dashboard.user.index')->with(['users' => $user->all()]);
    }

    public function addAsEditor(User $user)
    {
        if($user->update(['type' => 'editor'])){
            return redirect()->back();
        }
        return redirect()->back();
    }

    public function removeFromEditor(User $user)
    {
        if($user->update(['type' => null])){
            return redirect()->back();
        }
        return redirect()->back();
    }
}
