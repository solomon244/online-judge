
@extends('layouts.app')   
@extends('layouts.contest')

@section('content')
<div class=" pl-3" style="margin-left: 30px;">
  <div class="add pl-5 justify-content-between d-flex pr-lg-5 pr-5">
{{-- <fluent-design-system-provider fill-color="#F7F7F7" base-layer-luminance="1" direction="ltr"><edge-chromium-page config-instance-src="default" instance-id="EdgeChromiumPageWC" data-t="{&quot;n&quot;:&quot;EdgeChromiumPageWC&quot;,&quot;t&quot;:8}"></edge-chromium-page></fluent-design-system-provider> --}}
    <a href=""></a>
    @if (Auth::user()->role == "admin")
      <a href="/createContest" 
        style="border:none; border-radius:2px; margin-right:100px; text-decoration: none" 
        class="btn-primary p-1"> Create Contest</a>
    @endif
  </div>

  <div class="container pt-2">
    <div class="container" style="height: 700px; min-width: 500px; width: 97%; float: left; padding-left: 15px;">
      <div style ="border: 1px solid #cecece; border-radius: 5px;">
      <div class="" style="font-weight: bold; padding-left: 40px; width: 100%; background-color: #cecece; height: 28px; border: 1px solid #cecece; border-radius: 5px;">
        <label style = "">Live or Upcomming Contests</label>
      </div>
      <table class="table table-sm table-bordered table-hover  table-sm" style="font-size: 14px;">
          <thead>
            <tr>
              <th style="min-width: 20px; width: 5%; max-width: fit-content;" scope="col">No</th>
              <th style="width: 20%; min-width: ;150px;" scope="col">Name</th>
              <th scope="col">Type</th>
              <th scope="col">Start-Time</th>
              <th scope="col">Length</th>
              
              <th style="width: 7%; min-width: 20px;" scope="col">Problems</th>
              <th scope="col" style="width: 10%;">Contestants</th>
            </tr>
          </thead>
          <tbody>
            @foreach ($LUcontests as $contest)
            <tr>
              @if ($contest->creator == Auth::user()->username)
                <th scope="row"><a href="/c/toDetail/{{$contest->id}}" style="font-weight: normal; color: rgb(226, 15, 15)">{{ $contest->id }}</a></th>
              @else
                <th scope="row"><a href="/c/Detail/{{$contest->id}}" style="font-weight: normal; color: rgb(226, 15, 15)">{{ $contest->id }}</a></th>
              @endif
              <td>{{ $contest->name}}</td>
              <td>{{ $contest->type}}</td>
              <td>{{ $contest->start_time}}</td>
              <td>{{ $contest->end_time }}</td>
              <td style="text-align: center;">
                @if ($contest->problems > 0)
                    <a class="link" href="/c/toProblems/{{$contest->id}}">{{ $contest->problems}}</a>
                @else
                    {{ $contest->problems}}
                @endif
              </td>
              <td><a style="text-decoration: none;" href="/lc/contestant/{{$contestt}}">{{ $contest->contestants}}</a></td>
              
              
            </tr>

            @endforeach
            <tfoot>
                <tr>
                    {{-- <td colspan="2">Number of problems : {{ $counts }}</td>
                    <td colspan="2">Min : {{ $min }} Max : {{ $max }} Average : {{  $avg}}</td> --}}
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

    {{-- ******************* PAST CONTEST **************************** --}}
    <div style ="border: 1px solid #cecece; border-radius: 5px; margin-top: 50px;">
    <div class="" style="font-weight: bold; padding-left: 40px; width: 100%; background-color: #cecece; height: 28px; border: 1px solid #cecece; border-radius: 5px;">
      <label style = "">Past Contests</label>
    </div>
    <table class="table table-sm table-bordered table-hover  table-sm" style="font-size: 14px;">
      <thead>
        <tr>
          <th style="min-width: 20px; width: 5%; max-width: fit-content;" scope="col">No</th>
          <th style="width: 20%; min-width: ;150px;" scope="col">Name</th>
          <th scope="col">Type</th>
          <th scope="col">Start-Time</th>
          <th scope="col">Length</th>
          
          <th style="width: 7%; min-width: 20px;" scope="col">Problems</th>
          <th scope="col" style="width: 10%;">Score Board</th>
        </tr>
      </thead>
      <tbody>
        @foreach ($Pcontests as $contest)
        <tr>
          <th scope="row"><a href="/c/Detail/{{$contest->id}}" style="font-weight: normal; color: blue">{{ $contest->id }}</a></th>

          <td>{{ $contest->name}}</td>
          <td>{{ $contest->type}}</td>
          <td>{{ $contest->start_time}}</td>
          <td>{{ $contest->end_time }}</td>
          
          <td>
            @if ($contest->problems > 0)
                <a class="link" href="/c/toProblems/{{$contest->id}}">{{ $contest->problems}}</a>
            @else
                {{ $contest->problems}}
            @endif
          </td>
          <td><a style="text-decoration: none;" href="/lc/scoreboard/{{$contestt}}">{{ $contest->contestants}}</a></td>
        </tr>

        @endforeach
        <tfoot>
            <tr>
                {{-- <td colspan="2">Number of problems : {{ $counts }}</td>
                <td colspan="2">Min : {{ $min }} Max : {{ $max }} Average : {{  $avg}}</td> --}}
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

</div>
@endsection
