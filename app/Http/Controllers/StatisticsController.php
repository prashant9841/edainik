<?php

namespace App\Http\Controllers;

use App\{Post,User};
use Carbon\Carbon;
use Illuminate\Http\Request;

class StatisticsController extends Controller
{
	public function __construct()
	{
		return $this->middleware('superAdmin');
	}

	public function userStats(User $user)
	{
			
		/*$yesterday = Carbon::now();
		$today = Carbon::now();
		$weeks_ago = Carbon::now()->subWeeks(3);
*/

		$allPosts= Post::where('user_id',$user->id)
		        ->orderBy('created_at', 'DESC');
		//$between = $allPosts->where('created_at', '>=', $weeks_ago)->where('created_at', '<=', $yesterday);

		return view('dashboard.stats.userStats')->with([
			'userPosts' => $allPosts->get(), 
			'user' => $user,
			'todayCount' => $allPosts->whereRaw('created_at < CURRENT_DATE + INTERVAL 1 DAY')->whereRaw('created_at > CURRENT_DATE - INTERVAL 1 DAY')->count(),
			'verificationCount' => $allPosts->where(['status' => 1, 'verified' => 1])->count(),
			]);
	}
}

