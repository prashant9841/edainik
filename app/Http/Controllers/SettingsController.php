<?php

namespace App\Http\Controllers;

use Auth;
use Hash;
use App\Http\Requests\PasswordRequest;
use Illuminate\Http\Request;

class SettingsController extends Controller
{
    public function index()
    {
    	return view('dashboard.settings.index');
    }

    public function password()
    {
    	return view('dashboard.settings.password');
    }

    public function changePassword(PasswordRequest $request)
    {
        if (Hash::check($request->current_password, Auth::user()->password)) {
    		$request->user()->fill([
                'password' => Hash::make($request->new_password)
            ])->save();
            $request->session()->flash('sucMsg','Password changed successfully');
            return redirect()->back();
        }
        $request->session()->flash('errMsg','The given password didn\'t match the password');
        return redirect()->back();
    }
}
