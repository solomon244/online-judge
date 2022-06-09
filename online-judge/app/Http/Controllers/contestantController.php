<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class contestantController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    
    public function list($c_id){
        //query builder
        // $contestants= DB::table('contestants')->where('id', $c_id)->distinct()->orderBy('id','DESC')->get();
        // return view ('contest.contestant', ['contestant'=>$contestants, 'Contests'=>contestController::Contests(), 
        //                                                                 'con_reg'=>contestController::con_reg(), 
        //                                                                 'Count'=>contestController::Count(),
        //                                                                 'contestt'=>$c_id]);
        $users= DB::table('contestants')->where('contest', $c_id)->orderBy('id')->get();
        $contest= DB::table('contests')->where('id', $c_id)->get();
        return view('contest.contestant', ['contestant'=>$users, 'Contests'=>contestController::Contests(), 
                                                'con_reg'=>contestController::con_reg(), 
                                                'Count'=>contestController::Count(),
                                                'contestt'=>0,
                                                'contest'=>$contest]);
    }

    public function show($id){
        $problem = DB::table('problems')->where('id', $id)->first();
        return view('problem.solveProblem', ['problem' => $problem, 'Contests'=>contestController::Contests(), 
                                                                    'con_reg'=>contestController::con_reg(), 
                                                                    'Count'=>contestController::Count()]);}

    public function update($id){
        // $problem = DB::table('problems')->where('id', $id)->first();
        // return view('problem.editProblem', ['problem' => $problem, 'Contests'=>$Contests, 'Count'=> $Count]);
    }

    public function delete($id)
    {
        // DB::table('problems')->where('id',$id)->delete();
        // return redirect('/p');
    }

    public function add($contestt){

        DB::table('contestants')->insertOrIgnore(
            ['contest'=>$contestt,
            'user'=>Auth::user()->username,
            'total_solved'=>0,
            'status'=>'Pending',
            ]
        );
        
        $users= DB::table('contestants')->where('contest', $contestt)->orderBy('id')->get();
        return view('contest.contestant', ['contestant'=>$users, 'Contests'=>contestController::Contests(), 
                                                'con_reg'=>contestController::con_reg(), 
                                                'Count'=>contestController::Count(),
                                                'contestt'=>0]);
    
    }
    
    public function accept($id)
    {
        DB::table('contestants')->where('id', $id)->update(
            
            ['status'=>"Accepted"]

        );
        $contestants = DB::table('contestants')->where('id', $id)->get();
        $contest = 0;
        foreach ($contestants as $contestant){
            $contest = $contestant->contest;
        }
        $users= DB::table('contestants')->where('contest', $contest)->orderBy('id')->get();
        return view('contest.contestant', ['contestant'=>$users, 'Contests'=>contestController::Contests(), 
                                                'con_reg'=>contestController::con_reg(), 
                                                'Count'=>contestController::Count(),
                                                'contestt'=>0]);
    }

    public function reject($id)
    {
        DB::table('contestants')->where('id', $id)->update(
            
            ['status'=>"Rejected"]

        );
        $contestants = DB::table('contestants')->where('id', $id)->get();
        $contest = 0;
        foreach ($contestants as $contestant){
            $contest = $contestant->contest;
        }
        $users= DB::table('contestants')->where('contest', $contest)->orderBy('id')->get();
        return view('contest.contestant', ['contestant'=>$users, 'Contests'=>contestController::Contests(), 
                                                'con_reg'=>contestController::con_reg(), 
                                                'Count'=>contestController::Count(),
                                                'contestt'=>0]);
    }
}
