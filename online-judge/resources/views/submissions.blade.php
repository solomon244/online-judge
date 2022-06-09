@extends('layouts.live')
@extends('layouts.app')
@extends('layouts.contest')

@section('content')

<div class=" pl-5" style="margin-left: 30px; width: 100%;">
  <div class="pl-3 pb-2">

  </div>
  <div class="container" style="height: 700px; min-width: 500px; width: 95%; float: left;">
    <div style ="border: 1px solid #cecece; border-radius: 5px;">
    <div class="" style="font-weight: bold; padding-left: 40px; width: 100%; background-color: #eeeeee; height: 28px; border: 1px solid #eeeeee; border-radius: 5px;">
      <label style = "">Submissions</label>
    </div>
    <table class="table table-sm table-bordered table-striped table-hover  table-sm" style="font-size: 14px; text-align: center;">
        <thead>

          <tr style="height: 35px;">
            <th style="min-width: 20px; font-size: 17px; width: fit-content; width: 5%;" scope="col">#</th>

            @if ($contestt == 0)
              <th scope="col">problem</th>
              <th scope="col">user</th>
            @endif

            @if ($contestt > 0)
              <th scope="col" style="width: 30%;">problem</th>
            @endif

            <th scope="col" style="width: 7%;">language</th>
            <th scope="col" style="width: 170px; text-align: center;">date</th>
            <th scope="col" style="width: 180px; text-align: center;">verdict</th>
            <th scope="col" style="width: 8%;">cpu-time</th>
            <th scope="col" style="width: 8%;">memory</th>
          </tr>
        </thead>
        <tbody>
          <?php $i=$count; ?>
          @foreach ($submissions as $submission)
          <tr style="height: 10px;">
            @if ($contestt > 0)
              <th scope="row" style="font-weight: normal; ">{{ $i }}</th>
              <?php $i--;?>
            @endif

            @if ($contestt == 0)
              <th scope="row">
                <!-- Button trigger modal -->
                <a type="button" style="font-weight: normal; border: none; color: blue;" class="btn-sm btn-link" data-bs-toggle="modal" data-bs-target="#staticBackdrop">{{ $submission->id }}
                  </a>


                {{-- <a href="#detailModal" style="font-weight: normal; color: blue" data-toggle="modal" data-target="#detailModal"></a></th>   --}}
            @endif

            <td>{{ $submission->problem}}</td>
            @if ($contestt == 0)
            <td>{{ $submission->user}}</td>
            @endif
            <td>{{ $submission->language}}</td>
            <td style=" text-align: center;" >{{$submission->date }}</td>

            @if ($submission->verdict == 'Accepted')
            <td style="color: green; text-align: center;">{{ $submission->verdict}}</td>
            @endif

            @if ($submission->verdict == 'Wrong Answer')
              <td style="color: rgba(236, 32, 32, 0.822); text-align: center;">{{ $submission->verdict}}</td>
            @endif

            @if ($submission->verdict == 'Time Limit Excedes')
              <td style="color: rgb(189, 135, 151); text-align: center;">{{ $submission->verdict}}</td>
            @endif

            @if ($submission->verdict == 'Compilation Error')
              <td style="color: #777; text-align: center;">{{ $submission->verdict}}</td>
            @endif

            <td>{{ $submission->cpu_time }} ms</td>
            <td>{{ $submission->memory}} kb</td>
          </tr>



          @endforeach
          <tfoot>
              <tr>

              </tr>
              <tr>
                  <td colspan="4">
                    {{-- {{ $users->onEachSide(5)->links() }} --}}
                </td>
              </tr>
          </tfoot>
          </tbody>
      </table>
    </div>
  </div>
</div>
@endsection


<!-- Modal -->
<div style="height: 100%; width: 100%; margin: auto;"
class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false"
tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
<div class="modal-dialog modal-dialog-centered modal-dialog-scrollable" style="min-width: 80%;">
<div class="modal-content">
<div class="modal-header" style="height: 40px;">
 <h6 class="modal-title" id="staticBackdropLabel">User Problem Cpu_time Memory Verdict</h6>
 <button type="button" class="btn-close btn-sm" data-bs-dismiss="modal" aria-label="Close"></button>
</div>
<div class="modal-body">
 <h6 style="text-align: start margin-top: 0px;" class="text-facebook">Source code Language: </h6>
 <div style="width: 100%; height: fit-content; max-height: 350px; overflow: auto; background-color: #eeeeee">
  <?php
    // (A) OPEN FILE
    $handle = fopen("C://Users//sola//Documents//Contests//Submissions//3.cpp", "r") or die("Error reading file!");

    // (B) READ LINE BY LINE
    while (($line = fgets($handle)) !== false) {
    // To better manage the memory, you can also specify how many bytes to read at once
    // while (($line = fgets($handle, 4096)) !== false) {
      ?>{{$line}}<br><?php
    }

    // (C) CLOSE FILE
    fclose($handle);
    ?>
 </div>
 <h5>testcase</h5>
 <?php $testcases = array("1"=>1, "2"=>2, "3"=>3, "4"=>4, "5"=>5, "6"=>6, "7"=>7);?>
 @foreach ($testcases as $testacase)
 <div>
   <div class="d-flex">
       {{-- <h6>Test: #{{$submission->id}} cpu-time: {{$submission->cpu_time}} memory: {{$submission->memory}} verdict: {{$submission->verdict}}</h6> --}}
   </div>
   <div style="width: 100%; height: fit-content; background-color: #eeeeee">
     <table class="table table-striped table-sm">
       <th>Input</th>
       <th>Answer</th>
       <th>Output</th>
       @foreach ($testcases as $testacase)
         <tr>
          <td>input.in</td>
          <td>answer.ans</td>
          <td>ouput.out</td>
         </tr>
       @endforeach
     </table>
   </div>
 </div>
 @endforeach
</div>
</div>
</div>
</div>
<style>
  .li:hover{
    background-color: #d9dcf3;
    color: #0123cc;

  }
</style>
@section('filter')
<div id ="full_panel" style="margin-top: 35px; margin-left: 10px;background-color: #fcfcfc; min-width: 180px; width: 230px; align-content: center; border: 1px solid #ddd; border-radius: 5px;">
  <div style="font-weight: bold; padding-left: 25px; width: 100%; background-color: #f2f2f2; height: 28px; border: 1px solid #eeeeee; border-radius: 5px;">
      <h6 style="padding-left: 60px;">Filter</h6>
  </div>
      <div id ="panel{{$i}}" class="div p-2" style ="width : 100%; margin: auto; align-content: center">
          <ul>
              <?php $c=1; ?>
              {{-- <li class="p-1 li" style="width: fit-content;"><a style="text-decoration: none;" href="/s/{{$contestt}}/Accepted"> Accepted</a></li>
              <li class="p-1 li" style="width: fit-content;"><a style="text-decoration: none;" href="/s/{{$contestt}}/Wrong Answer">Wrong Answer</a></li>
              <li class="p-1 li" style="width: fit-content;"><a style="text-decoration: none;" href="/s/{{$contestt}}/Compilation Error">Compilation Error</a></li>
              <li class="p-1 li" style="width: fit-content;"><a style="text-decoration: none;" href="/s/{{$contestt}}/Time Limit Excedes">Time Limit Excedes</a></li>
              <li class="p-1 li" style="width: fit-content;"><a style="text-decoration: none;" href="/s/{{$contestt}}/Memory Limit">Memory Limit Excedes</a></li>
              <li class="p-1 li" style="width: fit-content;"><a style="text-decoration: none;" href="/s/{{$contestt}}/RunTime Error">RunTime Error</a></li> --}}

              <li class="p-1 li" style="width: fit-content;"><a style="text-decoration: none;" href="/sfilter/{{$contestt}}/Accepted"> Accepted</a></li>
              <li class="p-1 li" style="width: fit-content;"><a style="text-decoration: none;" href="/sfilter/{{$contestt}}/Wrong Answer">Wrong Answer</a></li>
              <li class="p-1 li" style="width: fit-content;"><a style="text-decoration: none;" href="/sfilter/{{$contestt}}/Compilation Error">Compilation Error</a></li>
              <li class="p-1 li" style="width: fit-content;"><a style="text-decoration: none;" href="/sfilter/{{$contestt}}/Time Limit Excedes">Time Limit Excedes</a></li>
              <li class="p-1 li" style="width: fit-content;"><a style="text-decoration: none;" href="/sfilter/{{$contestt}}/Memory Limit Excedes">Memory Limit Excedes</a></li>
              <li class="p-1 li" style="width: fit-content;"><a style="text-decoration: none;" href="/sfilter/{{$contestt}}/RunTime Error">RunTime Error</a></li>
          </ul>
      </div>
</div>
@endsection
