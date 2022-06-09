<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

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
        $contestants = DB::table('users')->orderBy('rating', 'DESC')->paginate(10);
        $contests = DB::table('contests')->orderBy('id', 'DESC')->get();

        return view('/dashboard', [ 'Contests'=>contestController::Contests(), 
                                            'con_reg'=>contestController::con_reg(), 
                                            'Count'=>contestController::Count(),
                                            'contestants'=>$contestants,
                                            'contestt'=>0,
                                            'contests'=>$contests]);

    }
}
