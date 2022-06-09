@extends('layouts.app2')  
<style>
    .link{
        color: #aaa;
        text-decoration: none;
    }
</style>

@section('content')
<?php $problems = 0;?>  {{-- initialize problems variable --}}
    <form action="/c/contestProblems/{{$contestt}}" method="get">
        @foreach ($contests as $contest)
            <?php $problems = $contest->problems;?>   {{-- update problems variable --}}
        <div class="container p-2"  style="width: 700px; margin: auto;">
            <div class="title justify-content-center d-flex" style="align-self: center; width: 700px; margin: auto;">
                <h3 style="padding-right: 50px; color: rgba(8, 111, 245, 0.993); font-style: italic;">Create Contest </h3>
                <h6 class="pt-2 pl-2" style ="color: #494949">
                    <a class="link" href="/c/toDetail/{{$contestt}}">Detail</a> > 
                    <a class="link" href="/c/toSchedule/{{$contestt}}">Schedule</a> ><strong> No_of_problems </strong>> 
                </h6> 
                <h6 class="pt-2 pl-2" style ="color: #aaa">> 
                    @if ($contest->problems > 0)
                        <a class="link" href="/c/toProblems/{{$contestt}}">Problems</a>
                    @else
                        Problems
                    @endif
                </h6>  
            </div>

            <div class="pt-5 pb-1">     {{-- ///////////////\\\\\\\\\\\\\\\     break     //////////////\\\\\\\\\\\\\--}}
                <caption class="caption"><strong>Contest Problems</strong></caption>
            </div>
            <div style="border: 1px solid gray; border-radius: 5px; width: 700px;">
                <div class="justify-content-between p-4">
                    
                    <table>
                        <tr>
                            <td class="p-2">
                                <label for="">No-Of-Problems</label>
                            </td>
                            <td class="p-2" >   
                                <input type="number" name='no_of_problems' id="no_of_problems" value="{{$contest->problems}}">
                            </td>
                        </tr>
                    </table>
                </div>
            </div>


            <div class="save p-5 justify-content-between d-flex " style="width: 700px;">
                <div ></div>
                <div class="d-flex" style="margin-left: 100px; align-self: flex-end;">
                    <input class="btn btn-primary pr-3" type="submit" @if ($contest->problems > 0)
                        @disabled(true)
                    @endif value="Save" onclick="return myFunction();">
                </div>
            </div>
        </div>
        
        @endforeach
    </form>
@endsection

<script>
    function myFunction() {
        if ({{$problems}} > 0) {
            if(!confirm("Are You Sure? Saved problems under this contest will be deleted!"))
            event.preventDefault();
        }
        
    }
</script>