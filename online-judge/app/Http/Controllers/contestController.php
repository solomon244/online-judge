<?php

namespace App\Http\Controllers;

use App\Models\contest;
use App\Models\problem;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class contestController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function list(){
        //query builder
        $LUcontests= DB::table('contests')->where('status', 'upcomming')->distinct()->orderBy('id','DESC')->get();
        $Pcontests= DB::table('contests')->where('status', 'passed')->distinct()->orderBy('id','DESC')->get();

        return view('contest.contest',['LUcontests'=>$LUcontests, 'Pcontests'=>$Pcontests,
                                        'Contests'=>contestController::Contests(),
                                        'con_reg'=>contestController::con_reg(),
                                        'Count'=>contestController::Count(),
                                        'contestt'=>0]);}

        public function createContest (Request $request){
            $max = DB::table('contests')->max('id');
            $con = DB::table('contests')->where('id', $max)->get();
            foreach ($con as $c){
                if ($c->registration == "") {
                    DB::table('contests')->where('id', $max)->update(
                            ['status'=>'upcomming',
                        ]
                    );
                }
                else {
                    DB::table('contests')->insertOrIgnore(
                        ['creator'=>Auth::user()->username,
                        'status'=>'upcomming',
                        'contestants'=>0,
                        ]
                    );
                }
            }

            $max = DB::table('contests')->max('id');
            $contests = DB::table('contests')->where('id', $max)->get();

            return view('contest.createContest1', ['contestt' => $max, 'contests' => $contests]);
    }
    public function detail ($contestt){
        $contest = DB::table('contests')->where('id', $contestt)->get();
        return view('contest.contestDetail',['contestt' =>$contestt, 'contest' => $contest]);
    }
    public function contestDetail (Request $request, $contestt){
        $logo = '';
        $sponserslogo = '';

        if ($request->logo == '') {
            $logo = $request->Elogo;
        }
        else {
            $logo = $request->logo;
        }

        if ($request->sponserslogo == '') {
            $sponserslogo = $request->Esponserslogo;
        }
        else {
            $sponserslogo = $request->sponserslogo;
        }

        DB::table('contests')->where('id', $contestt)->update(
            ['name'=>$request->name,
            'logo'=>$logo,
            'type'=>$request->type,
            'place'=>$request->mode,

            'owner'=>$request->owner,
            'officials'=>$request->owner,
            'sponsers'=>$request->sponsers,
            'sponserslogo'=>$sponserslogo,

            'description'=>$request->description,
        ]
    );
        $contests = DB::table('contests')->where('id', $contestt)->get();
    return view('contest.cc1', ['contestt' => $contestt, 'contests' => $contests]);
    }

    public function contestSchedule (Request $request, $contestt){
        DB::table('contests')->where('id', $contestt)->update(

            ['reg_start_time'=>$request->reg_start_date . ' ' . $request->reg_start_time,
            'reg_end_time'=>$request->reg_end_date . ' ' . $request->reg_end_time,
            'start_time'=>$request->start_date . ' ' . $request->start_time,
            'end_time'=>$request->end_date . ' ' . $request->end_time,
            'freez_time'=>$request->freez_start_date . ' ' . $request->freez_start_time,
            'unfreez_time'=>$request->freez_end_date . ' ' . $request->freez_end_time,
            ]

        );
        $contests = DB::table('contests')->where('id', $contestt)->get();
    return view('contest.createContest2', ['contestt' => $contestt, 'contests' => $contests]);
    }

    public function contestProblemNo (Request $request, $contestt){

        if($request->no_of_problems < 1)
            $problems = 1;
        else
            $problems = $request->no_of_problems;

        DB::table('contests')->where('id', $contestt)->update(
            ['problems'=>$problems,]
        );
        $contests = DB::table('contests')->where('id', $contestt)->get();

    return view('contest.createContest3', ['problems' => $problems, 'contestt' => $contestt, 'contests' => $contests]);
    }

    public function contestProblems (Request $request, $contestt){
        // delete the previous problems saved for this contest
        DB::table('problems')->where('contest',$contestt)->delete();
        DB::table('testcases')->where('contest',$contestt)->delete();

        // if null value is given saved it as one
        if($request->no_of_problems < 1)
            $problems = 1;
        else
            $problems = $request->no_of_problems;

        // update no of problems in the contest
        DB::table('contests')->where('id', $contestt)->update(
            ['problems'=>$problems,]
        );
        $contest = DB::table('contests')->where('id', $contestt)->get();

        // initialize problems with null value
        $alphabet = ['A', 'B', 'C', 'D', 'E', 'F', 'G', 'H','I', 'J', 'K', 'L', 'M', 'N', 'O', 'P', 'Q', 'R', 'S', 'T', 'U', 'V', 'W', 'X', 'Y', 'Z'];
        for ($i=0; $i < $request->no_of_problems; $i++) {

            DB::table('problems')->insertOrIgnore(
                ['p_in_s'=>$alphabet[$i],
                'visibility'=>'up comming',
                'solved'=>0,
                'testcase'=>1,
                'contest' => $contestt]
            );
        }
        $problems = DB::table('problems')->where('contest',$contestt)->get();
        $testcases = DB::table('testcases')->where('contest', $contestt)->orderBy('id')->get();

        return view('contest.createContest4', ['contestt'=> $contestt, 'contest' => $contest, 'problems' => $problems, 'testcases'=>$testcases]);
    }

    public function saveContestProblems (Request $request, $contestt){
        $problemNumbers = DB::table('problems')->where('contest', $contestt)->get();
        $count = DB::table('problems')->where('contest', $contestt)->count();
        $i=0;
        $tc = [];
        $p_in_s = [];
        foreach ($problemNumbers as $pn) {
            $tc[$i] = $pn->testcase;
            $p_in_s[$i] = $pn->p_in_s;
            $i++;
        }

        $contestproblems = DB::table('contests')->where('id', $contestt)->get();
        $problems = 0;
        foreach ($contestproblems as $p){
            $problems = $p->problems;
        }
        $alphabet = ['A', 'B', 'C', 'D', 'E', 'F', 'G', 'H','I', 'J', 'K', 'L', 'M', 'N', 'O', 'P', 'Q', 'R', 'S', 'T', 'U', 'V', 'W', 'X', 'Y', 'Z'];
        $max = DB::table('testcases')->max('contest');

        for ($i=0; $i < $problems; $i++) {
            $name = $request->input('name'.$alphabet[$i]);
            $time_limit = $request->input('time'.$alphabet[$i]);
            $memory = $request->input('memory'.$alphabet[$i]);
            if ($request->input('pdf'.$alphabet[$i]) == "") {
                $pdf_file = $request->input('pdf_file'.$alphabet[$i]);
            }else {
                $pdf_file = $request->input('pdf'.$alphabet[$i]);
            }

            $testcases = $request->input('testcases'.$alphabet[$i]);

            DB::table('problems')->where('contest', $contestt)->where('p_in_s', $alphabet[$i])->update(

                ['name'=>$name,
                'time_limit'=>$time_limit,
                'memory_limit'=>$memory,
                'pdf_file'=>$pdf_file,
                'testcase'=>$testcases,
                ]

            );
            if ($max < $contestt) {
                for ($j=1; $j <= $testcases; $j++) {
                    DB::table('testcases')->insertOrIgnore([
                        'contest'=>$contestt,
                        'problem'=>$alphabet[$i],
                        'input'=>'',
                        'answer'=>'',
                        'code'=>$j,
                    ]);
                }
            }

        }
        $problemNumbers1 = DB::table('problems')->where('contest', $contestt)->get();
        $i1=0;
        $tc1 = [];
        $p_in_s1 = [];
        foreach ($problemNumbers1 as $pn1) {
            $tc1[$i1] = $pn1->testcase;
            $p_in_s1[$i1] = $pn1->p_in_s;
            $i1++;
        }
        for ($k=1; $k <= $count; $k++) {
            if ($tc[$k-1] != $tc1[$k-1]) {
                DB::table('testcases')->where('contest', $contestt)->where('problem', $alphabet[$k-1])->delete();

                for ($l=1; $l <= $tc1[$k]; $l++) {
                    DB::table('testcases')->insertOrIgnore([
                        'contest'=>$contestt,
                        'problem'=>$alphabet[$l],
                        'input'=>'',
                        'answer'=>'',
                        'code'=>$l,
                    ]);
                }
            }
        }
        $testcases = DB::table('testcases')->where('contest', $contestt)->orderBy('id')->get();
        $contest = DB::table('contests')->where('id', $contestt)->get();
        $problems = DB::table('problems')->where('contest', $contestt)->get();
        return view('contest.createContest4', ['problems' => $problems, 'contestt' => $contestt,
                                                'contest'=> $contest, 'testcases' => $testcases]);
    }

    public function addTestcases(Request $request, $contestt, $p_in_s){
        $problems = DB::table('problems')->where('contest', $contestt)->where('p_in_s', $p_in_s)->get();
        $problem = 0;
        foreach ($problems as $p) {
            $problem = $p->testcase;
        }

        for ($i=1; $i <= $problem; $i++) {
            $input = $request->input($p_in_s.'input'.$i);
            $answer = $request->input($p_in_s.'answer'.$i);

            if ($input == '') {
                $input = $request->input($p_in_s.'Einput'.$i);
            }

            if ($answer == '') {
                $answer = $request->input($p_in_s.'Eanswer'.$i);
            }

            DB::table('testcases')->where('contest', $contestt)->where('problem', $p_in_s)->where('code', $i)->update([
                'input'=>$input,
                'answer'=>$answer,
            ]);
        }

        $testcases = DB::table('testcases')->where('contest', $contestt)->orderBy('id')->get();
        $contest = DB::table('contests')->where('id', $contestt)->get();
        $problems = DB::table('problems')->where('contest', $contestt)->get();
        return view('contest.createContest4', ['problems' => $problems, 'contestt' => $contestt,
                                                'contest'=> $contest, 'testcases' => $testcases]);
    }

    public function finishContestReg($contestt){
        DB::table('contests')->where('id', $contestt)->update(
            ['registration'=> "completed"]
        );

        $contests= DB::table('contests')->distinct()->orderBy('id','DESC')->get();
        return view('contest.contest',['contests'=>$contests,  'Contests'=>contestController::Contests(),
                                                                'con_reg'=>contestController::con_reg(),
                                                                'Count'=>contestController::Count(),
                                                                'contestt'=>0]);
    }

    public function toDetail($contestt){
        $contests = DB::table('contests')->where('id', $contestt)->get();
        return view('contest.createContest1', ['contests' => $contests, 'contestt' => $contestt]);
    }

    public function toSchedule($contestt){
        $contests = DB::table('contests')->where('id', $contestt)->get();
        return view('contest.createContest2', ['contests' => $contests, 'contestt' => $contestt]);
    }

    public function toNoOfProblems($contestt){
        $contests = DB::table('contests')->where('id', $contestt)->get();
        return view('contest.createContest3', ['contests' => $contests, 'contestt' => $contestt]);
    }

    public function toProblems($contestt){
        $testcases = DB::table('testcases')->where('contest', $contestt)->orderBy('id')->get();
        $contest = DB::table('contests')->where('id', $contestt)->get();
        $problems = DB::table('problems')->where('contest', $contestt)->get();
        return view('contest.createContest4', ['problems' => $problems, 'contestt' => $contestt,
                                                'contest'=> $contest, 'testcases'=> $testcases]);
    }

    public function show($id){
    $problem = DB::table('problems')->where('id', $id)->first();

    return view('problem.solveProblem', ['problem' => $problem] /* or compact('texts', 'text') */);
    }

    public function update($id){
        $problem = DB::table('problems')->where('id', $id)->first();

        return view('problem.editProblem', ['problem' => $problem]);
    }

    public function delete($id)
    {
        DB::table('problems')->where('id',$id)->delete();
        return redirect('/c');
    }

    public function problem($contest){
        //query builder
        $problems = DB::table('problems')->where('contest', $contest)->orderBy('id')->get();
        $Contests = DB::table('contests')->where('status', 'upcomming')->get();
        $Count = DB::table('contests')->where('status', 'upcomming')->count();
        return view('liveContest.clarification1',['problems'=>$problems, 'Contests'=>$Contests, 'Count'=> $Count]);

    }

    public function submissions(){
        $submissions = "null";

        return view('liveContest.submission', ['submissions' => $submissions]);
    }
    public function scoreboard(){
        $scoreboard = "null";
        return view('liveContest.scoreboard', ['scoreboard' => $scoreboard]);
    }
    public function clarification(){
        $clarification = "null";
        return view('liveContest.clarification', ['calrification' => $clarification]);
    }

    public static function Contests(){
        $Contests= DB::table('contests')->where('status', 'upcomming')->orderBy('id', 'DESC')->get();
        return $Contests;
    }
    public static function count(){
        $Count= DB::table('contests')->where('status', 'upcomming')->count();
        return $Count;
    }
    public static function con_reg(){
        $Contests= DB::table('contests')->where('status', 'upcomming')->get();
        $contestant =DB::table('contestants')->where('user', Auth::user()->username)->orderBy('id','DESC')->get();

        // fetch all upcomming contests
        $up_comming = 0;
        $contest_id = [];
        foreach($Contests as $c){
            $contest_id[$up_comming] = $c->id;
            $up_comming++;
        }

        // fetch the contests that the contestant registered
        $registered = 0;
        $con_reg = [];
        foreach($contestant as $c){
            for ($i=0; $i < $up_comming; $i++) {
                $id = $contest_id[$i];
                if ($c->contest == $id){
                    $con_reg[$id] = $id;
                    $registered++;
                }
                else
                    $con_reg[$id] = -1;
            }
        }
        return $con_reg;
    }
}

