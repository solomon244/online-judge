@extends('layouts.live') 

@section('content')
<style>
    .link{
        color: #aaa;
        text-decoration: none;
    }
</style>

<?php 
    $alphabet = ['A', 'B', 'C', 'D', 'E', 'F', 'G', 'H','I', 'J', 'K', 'L', 'M', 'N', 'O', 'P', 'Q', 'R', 'S', 'T', 'U', 'V', 'W', 'X', 'Y', 'Z'];
    $index = 0;
?>
    <form action="/c/savecontestProblems/{{$contestt}}" method="get">
        <div class="container p-2"  style="width: 700px;">
            

            <div class="title justify-content-center d-flex" style="align-self: center; width: 700px; margin: auto;">
                <h3 style="padding-right: 50px; color: rgba(8, 111, 245, 0.993); font-style: italic;">Create Contest </h3>
                <h6 class="pt-2 pl-2" style ="color: #494949">
                    <a class="link" href="/c/toDetail/{{$contestt}}">Detail</a> > 
                    <a class="link" href="/c/toSchedule/{{$contestt}}">Schedule</a> > 
                    <a class="link" href="/c/toProblemNo/{{$contestt}}">NO_of_problems</a> > <strong>Problems</strong>
                </h6> 
            </div>

            @foreach ($problems as $problem)
            <div class="pt-5 pb-1">     {{-- ///////////////\\\\\\\\\\\\\\\     break     //////////////\\\\\\\\\\\\\--}}
                <caption class="caption"><strong>Problem {{$alphabet[$index]}}</strong></caption>
                <?php $index++;?>
            </div>

            <div style="border: 1px solid gray; border-radius: 5px; ">
                {{-- <label><strong>Problem {{$problem->p_in_s}}</strong></label> --}}
                
                <div class="pl-5" style="padding-left: 150px; width: 1600px; margin: auto;">
                    <table class="pl-5">
                        <tr>
                            <div>
                                <td class="p-2">
                                    <label for="" name ="{{$problem->p_in_s}}" id ="{{$problem->p_in_s}}">Problem Name</label>
                                </td>
                                <td class="p-2" >
                                    <input type="text" name ="name{{$problem->p_in_s}}" id ="name{{$problem->p_in_s}}" value="{{$problem->name}}">
                                </td>

                            </div>
                        </tr>
                        <tr>
                            <div>
                                <td class="p-2">
                                    <label for="" name ="{{$problem->p_in_s}}" id ="{{$problem->p_in_s}}">Time Limit</label>
                                </td>
                                <td class="p-2" >
                                    <input type="text" name ="time{{$problem->p_in_s}}" id ="time{{$problem->p_in_s}}" value="{{$problem->time_limit}}" placeholder="in microsecond">
                                </td>

                            </div>
                        </tr>
                        <tr>
                            <div>
                                <td class="p-2">
                                    <label for="" name ="{{$problem->p_in_s}}" id ="{{$problem->p_in_s}}">Memory Limit</label>
                                </td>
                                <td class="p-2" >
                                    <input type="text" name ="memory{{$problem->p_in_s}}" id ="memory{{$problem->p_in_s}}" value="{{$problem->memory_limit}}" placeholder="in kilobyte">
                                </td>

                            </div>
                        </tr>
                        <tr>
                            <div>
                                <td class="p-2">
                                    <label for="">Problem File</label>
                                </td>
                                <td class="p-2">
                                    <input type="file" name ="pdf{{$problem->p_in_s}}" id ="pdf{{$problem->p_in_s}}" 
                                           value={{$problem->pdf_file}}>
                                </td>
                                
                            </div>
                        </tr>
                        <tr>
                            <td></td>
                            <td style="padding-left: 8px; padding-bottom: 5px;">
                                <label style="text-align: left;" type="text" name ="pdf_file{{$problem->p_in_s}}" 
                                        id ="pdf_file{{$problem->p_in_s}}">{{$problem->pdf_file}}</label>
                            </td>
                        </tr>
                        <tr>
                            <div>
                                <td class="p-2">
                                    <label for="">No of testcase</label>
                                </td>
                                <td class="p-2" >
                                    <input type="number" name="testcases{{$problem->p_in_s}}" 
                                            id ="testcases{{$problem->p_in_s}}" 
                                            style="width: 100px; margin-right: 20px;" value={{$problem->testcase}}>
                                    <a type="button" style="font-weight: normal; text-decoration: none; width: 60px; text-align: center;" 
                                                class="btn-sm btn-success" data-bs-toggle="modal" data-bs-target="#popup{{$problem->p_in_s}}"
                                                id="add{{$problem->p_in_s}}">Add</a>                               
                                </td>
                                {{-- script to disable if testcase is updated--}}
                                
                            </div>
                        </tr>
                        
                    </table>
                </div>
            </div>
            
            <!-- Modal -->
                <div style="height: 100%; width: 100%; margin: auto; display: none;"
                    class="modal fade" id="popup{{$problem->p_in_s}}" data-bs-backdrop="static" data-bs-keyboard="false" 
                    tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable" style="min-width: 35%;">
                        <div class="modal-content" style="overflow: auto;">
                            <div class="modal-header" style="height: 40px;">
                                <h6 class="modal-title" id="staticBackdropLabel">Testcases for problem {{$problem->p_in_s}}</h6>
                                <button type="button" class="btn-close btn-sm" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            
                            <form action="/c/addTestcases/{{$contestt}}/{{$problem->p_in_s}}">                        
                            <div class="modal-body" style="background-color: #f6f6f6;  overflow: auto; max-height: 500px;">
                                {{-- @for ($j = 1; $j <= $problem->testcase ; $j++) --}}
                                @foreach ($testcases as $testcase)
                                    
                                    @if ($testcase->problem == $problem->p_in_s)
                                        
                                    <div>

                                    </div>
                                    <div style=" border: 1px solid #dedede; background-color: white; border-radius: 4px; margin-bottom: 20px;" class="p-3">
                                        <table style="text-align: center; ">
                                            <tr>
                                                <td>Testcase: #<strong>{{$testcase->code}}</strong></td>
                                            </tr>
                                            <tr>
                                                <td class="p-1"> <label >Input</label> </td>
                                                <td class="p-2"> <input type="file" id="{{$testcase->problem}}input{{$testcase->code}}" name="{{$testcase->problem}}input{{$testcase->code}}"><br> </td>
                                            </tr>
                                            <tr>
                                                <td></td>
                                                <td><input style="border: none;" type="text" id="{{$testcase->problem}}Einput{{$testcase->code}}" name="{{$testcase->problem}}Einput{{$testcase->code}}"  value="{{$testcase->input}}"></td>
                                            </tr>
                                            <tr>
                                                <td class="p-1"><label >Answer</label> </td>
                                                <td class="p-2"> <input type="file" id="{{$testcase->problem}}answer{{$testcase->code}}" name="{{$testcase->problem}}answer{{$testcase->code}}"><br> </td>
                                            </tr>
                                            <tr>
                                                <td></td>
                                                <td><input style="border: none;" type="text" id="{{$testcase->problem}}Eanswer{{$testcase->code}}" name="{{$testcase->problem}}Eanswer{{$testcase->code}}"  value="{{$testcase->answer}}"></td>

                                            </tr>
                                        </table>
                                    </div>
                                {{-- @endfor --}}
                                @endif

                                @endforeach
                            </div>
                            <div class="modal-footer">
                                <button class="button btn-primary" type="submit" style="border: none; border-radius: 4px;">Save</button>
                                <button class="button" style="border: 1px solid #ccc; border-radius: 4px;" data-bs-dismiss="modal"> Close</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            @endforeach

            <div class="save p-5 justify-content-between d-flex " style="width: 700px; disa">
                <div ></div>
                <div>
                    {{-- <a href="/c/finishReg/{{$contestt}}" class="btn btn-primary pl-3 pr-3" type="button">Finish</a> --}}
                    <input class="btn btn-primary pr-3" type="submit" value="Save" >
                </div>
            </div>
            
        </div>
    </form>
    
@endsection

