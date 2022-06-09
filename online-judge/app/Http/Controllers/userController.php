<?php

namespace App\Http\Controllers;

use App\Models\contest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class userController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    
    public function list(){
        //query builder
        $users= DB::table('users')->distinct()->orderBy('name')->get();
        return view('user',['users'=>$users, 'Contests'=>contestController::Contests(), 
                                                'con_reg'=>contestController::con_reg(), 
                                                'Count'=>contestController::Count(),
                                                'contestt'=>0]);
    }

    public function choose(){
        //query builder
        if (Auth::user()->username == "admin"){
            return view('/user');
        }
        else
            return view('/u');
    }

    public function show($id){
        $users = DB::table('users')->where('id', $id)->first();
        return view('user.userDetail', ['user' => $users, 'Contests'=>contestController::Contests(), 
                                                            'con_reg'=>contestController::con_reg(), 
                                                            'Count'=>contestController::Count()]);
    }
    
    function delete($id)
    {
        DB::table('users')->where('id',$id)->delete();
        return redirect('/u');
    }
}
