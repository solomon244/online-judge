<?php

namespace App\Http\Controllers;

use App\Models\contest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class livecontestController extends Controller
{
    public function problem($contest){
        //query builder
        $problems= DB::table('problems')->where('contest', $contest)->orderBy('id')->get();
        $Contests= DB::table('contests')->where('status', 'upcomming')->get();
        $Count= DB::table('contests')->where('status', 'upcomming')->count();
        return view('liveContest.problem',['problems'=>$problems, 'contest'=>$contest, 'Count'=> $Count]);

    }

    public function showProblem($id, $contest){
        // $problem = DB::table('problems')->where('id', $id)->first();
          
        // return view('liveContest.solve_Problem', ['problem' => $problem, 'contest'=>$contest,]);
    }


    public function clarification($contestt){
        
        $clarifications = DB::table('clarifications')->where('contest', $contestt)->orderBy('id')->get();
        
        return view('liveContest.cla',['clarifications'=>$clarifications, 'contestt'=>$contestt]);

    }

    public function submission($contest){

        // $submission = DB::table('submission')->where('contest', $contest)->orderBy('id')->get();
        
        // return view('liveContest.submission',['submission'=>$submission, 'contest'=>$contest,]);

    }
    
    public function scoreboard($contestt){
        $contestants= DB::table('contestants')->where('contest', $contestt)->orderBy('total_solved', 'DESC')->get();
        $contests= DB::table('contests')->where('id', $contestt)->get();
        $submissions= DB::table('submissions')->where('contest', $contestt)->get();
        $problems = DB::table('problems')->where('contest', $contestt)->orderBy('p_in_s')->get();
        foreach ($contests as $contest) {
            $problem_no = $contest->problems;
        }
        return view('liveContest.scoreboard',['competants'=>$contestants, 'submissions'=>$submissions,'contestt'=>$contestt, 'problem_no'=>$problem_no, 'problems'=>$problems]);

    }

}
