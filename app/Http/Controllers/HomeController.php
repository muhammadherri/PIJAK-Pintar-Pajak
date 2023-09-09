<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;
class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $lastLogin = Auth::user()->updated_at;
        $lastLoginTime = Carbon::createFromFormat('Y-m-d H:i:s',$lastLogin);
        $now = Carbon::now();
        $timeDifferent = $now->diffForHumans($lastLoginTime);
        // dd($timeDifferent);
        // $now = Carbon::now()->format('Y-m-d H:i');
        $user=Auth::user();
        $id=Auth::user()->id;
        User::where('id',$id)->update([
            'updated_at'=>now(),
        ]);
        $a= \DB::commit();
        
        return view('home',compact('user'));
    }
}
