@extends('layouts.app2')  

@section('content')
<style>
    .link{
        color: #aaa;
        text-decoration: none;
    }
</style>

    <form action="/c/contestSchedule/{{$contestt}}" method="get">
        @foreach ($contests as $contest)

        <div class="container p-2"  style="width: 700px; margin: auto;">
            <div class="title justify-content-center d-flex" style="align-self: center; width: 700px; margin: auto;">
                <h3 style="padding-right: 50px; color: rgba(8, 111, 245, 0.993); font-style: italic;">Create Contest </h3>
                <h6 class="pt-2 pl-2" style ="color: #494949">
                    <a class="link" href="/c/toDetail/{{$contestt}}">Detail</a> > <strong> Schedule </strong>> 
                </h6> 
                <h6 class="pt-2 pl-2" style ="color: #aaa">> 
                    <a class="link" href="/c/toProblemNo/{{$contestt}}">No_of_problems</a> > 
                    @if ($contest->problems > 0)
                        <a class="link" href="/c/toProblems/{{$contestt}}">Problems</a>
                    @else
                        Problems
                    @endif
                </h6> 
            </div>

            <div class="pt-5 pb-1">     {{-- ///////////////\\\\\\\\\\\\\\\     break     //////////////\\\\\\\\\\\\\--}}
                <caption class="caption"><strong>Contest Registration</strong></caption>
            </div>
            <div style="border: 1px solid gray; border-radius: 5px; width: 700px;">
                <div class="justify-content-between d-flex  p-2">
                    <div>
                        <td class="p-3">
                            <label for="">Reg-Start-Date</label>
                        </td>
                        <td class="p-3" >
                            <input type="date" name='reg_start_date' id="reg_start_date">
                        </td>
                    </div>
                    <div>
                        <td class="p-3">
                            <label for="">Reg-Start-Time</label>
                        </td>
                        <td class="p-3" >
                            <input type="time" name='reg_start_time' id="reg_start_time">
                        </td>
                    </div>
                </div>
                    
                <div class="justify-content-between d-flex  p-2">
                    <div>
                        <td class="p-3">
                            <label class="pr-1" for="">Reg-End-Date</label>
                        </td>
                        <td class="p-3" >
                            <input type="date" name='reg_end_date' id="reg_end_date">
                        </td>
                    </div>
                    <div>
                        <td class="p-3">
                            <label for="">Reg-End-Time</label>
                        </td>
                        <td class="p-3" >
                            <input type="time" name='reg_end_time' id="reg_end_time">
                        </td>
                    </div>
                </div>         
            </div>

            <div class="pt-5 pb-1">     {{-- ///////////////\\\\\\\\\\\\\\\     break     //////////////\\\\\\\\\\\\\--}}
                <caption class="caption"><strong>Contest Period</strong></caption>
            </div>
            <div style="border: 1px solid gray; border-radius: 5px; width: 700px;">
                <div class="justify-content-between d-flex  p-2">
                    <div>
                        <td class="p-3">
                            <label for="">Start-Date</label>
                        </td>
                        <td class="p-3" >
                            <input type="date" name='start_date' id="start_date">
                        </td>
                    </div>
                    <div>
                        <td class="p-3">
                            <label for="">Start-Time</label>
                        </td>
                        <td class="p-3" >
                            <input type="time" name='start_time' id="start_time">
                        </td>
                    </div>
                </div>
                    
                <div class="justify-content-between d-flex  p-2">
                    <div>
                        <td class="p-3">
                            <label class="pr-1" for="">End-Date</label>
                        </td>
                        <td class="p-3" >
                            <input type="date" name='end_date' id="end_tdate">
                        </td>
                    </div>
                    <div>
                        <td class="p-3">
                            <label for="">End-Time</label>
                        </td>
                        <td class="p-3" >
                            <input type="time" name='end_time' id="end_time">
                        </td>
                    </div>
                </div>         
            </div>


            <div class="pt-5 pb-1">     {{-- ///////////////\\\\\\\\\\\\\\\     break     //////////////\\\\\\\\\\\\\--}}
                <caption class="caption"><strong>Contest Freez</strong></caption>
            </div>
            <div style="border: 1px solid gray; border-radius: 5px; width: 700px;">
                <div class="justify-content-between d-flex  p-2">
                    <div>
                        <td class="p-3">
                            <label for="">Freez-Start-Date</label>
                        </td>
                        <td class="p-3" >
                            <input type="date" name='freez_start_date' id="freez_start_date">
                        </td>
                    </div>
                    <div>
                        <td class="p-3">
                            <label for="">Freez-Start-Time</label>
                        </td>
                        <td class="p-3" >
                            <input type="time" name='freez_start_time' id="freez_start_time">
                        </td>
                    </div>
                </div>
                    
                <div class="justify-content-between d-flex  p-2">
                    <div>
                        <td class="p-3">
                            <label class="pr-1" for="">Freez-End-Date</label>
                        </td>
                        <td class="p-3" >
                            <input type="date" name='freez_end_date' id="freez_end_date">
                        </td>
                    </div>
                    <div>
                        <td class="p-3">
                            <label for="">Freez-End-Time</label>
                        </td>
                        <td class="p-3" >
                            <input type="time" name='freez_end_time' id="freez_end_time">
                        </td>
                    </div>
                </div>         
            </div>




            <div class="save p-5 justify-content-between d-flex " style="width: 700px;">
                <div ></div>
                <div class="d-flex" style="margin-left: 100px; align-self: flex-end;">
                    <input href="/c/toProblemNo/{{$contestt}}" style="margin-right: 20px; width: 85px;" class="btn btn-primary pr-2" value="Next >>" >
                    <input class="btn btn-primary pr-3" type="submit" value="Save" >
                </div>
            </div>
            @endforeach
        </div>
    </form>
@endsection