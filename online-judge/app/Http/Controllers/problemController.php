<?php

namespace App\Http\Controllers;

use App\Models\submissions;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;



class problemController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    
    public function list($contestt){
        //query builder
        if ($contestt > 0) {
            $problems= DB::table('problems')->where('visibility', 'up comming')
                                            ->where('contest', $contestt)->distinct()->orderBy('id','DESC')->get();
            return view('problem',['problems'=>$problems, 'Contests'=>contestController::Contests(), 
                                                        'con_reg'=>contestController::con_reg(), 
                                                        'Count'=>contestController::Count(),
                                                        'contestt'=>$contestt]);

        }else {
            $problems= DB::table('problems')->where('visibility', 'passed')->distinct()->orderBy('id','DESC')->get();
        return view('problem',['problems'=>$problems, 'Contests'=>contestController::Contests(), 
                                                        'con_reg'=>contestController::con_reg(), 
                                                        'Count'=>contestController::Count(),
                                                        'contestt'=>$contestt]);}

        }
        
    public function problem(){
        //query builder
        $problems= DB::table('problems')->distinct()->orderBy('id','DESC')->get();
        // $submissions= DB::table('submissions')->distinct()->orderBy('id','DESC')->get();
        return view('problem',['problems'=>$problems,  'Contests'=>contestController::Contests(), 
                                                        'con_reg'=>contestController::con_reg(), 
                                                        'Count'=>contestController::Count()]);
    }

    public function addProblem()
    {
        return view('problem.addProblem',['contestt'=>0]);
    }
    public function add (Request $request){
        DB::table('problems')->insertOrIgnore(

            ['name'=>$request->name,
            'time_limit'=>$request->time_limit,
            'memory_limit'=>$request->memory_limit,
            'solved'=>'0',
            'pdf_file'=>$request->pdf_file,
            'input'=>$request->input,
            'output'=>$request->output,
            'visibility'=>'passed',
            ]
        );
    return redirect('/p');
    }

    public function show($id, $contestt){
    $problem = DB::table('problems')->where('id', $id)->first();
    // if($contestt == 0)
        return view('problem.solve_Problem', ['problem' => $problem,  'Contests'=>contestController::Contests(), 
                                                                        'con_reg'=>contestController::con_reg(), 
                                                                        'Count'=>contestController::Count(),
                                                                        'contestt'=>$contestt]);
    // else {
    //     return view('problem.solve_Problem', ['problem' => $problem, 'contest'=>$contest]);
    //     }
    }

    public function update($id){
        $problem = DB::table('problems')->where('id', $id)->first();            
        return view('problem.editProblem', ['problem' => $problem]);
    }

    public function delete($id)
    {
        DB::table('problems')->where('id',$id)->delete();
        return redirect('/p');
    }

    
}
