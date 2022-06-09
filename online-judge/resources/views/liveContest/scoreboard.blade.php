@extends('layouts.live')
@section('content')

<div class=" pl-1" style="margin-left: 30px; width: 100%;">
  <div class="pl-3 pb-2">
    
  </div>
  <?php $mn_width = 145 +($problem_no * 52)?>
  <div class="container" style="height: 700px; min-width: {{$mn_width}}px; width: 95%; float: left;">
    <div style ="border: 1px solid #cecece; border-radius: 5px;">
    <div class="" style="font-weight: bold; padding-left: 20px; width: 100%; background-color: #ccc; height: 40px; border: 1px solid #cecece; border-radius: 5px;">
      <label style = "padding-top: 5px;">Scoreboard</label>
    </div>
    <table class="table table-striped table-bordered table-hover table-sm" style="font-size: 14px; aline-content: center;">
        <thead>
          
          <tr style="height: 35px;">
            <th style="min-width: 20px; width: 5%" scope="col" rowspan="2">RN</th>
            <th style="min-width: 110px; width: 300px;" scope="col" rowspan="2">Contestant</th>
            <th style="min-width: 10px; width: 15px; text-align: center;" scope="col" rowspan="2">SC</th>

            <th style=" text-align: center;" scope="col" colspan="{{$problem_no}}">Problems</th>
          </tr>

          <tr>
            @foreach ($problems as $problem)
              <th style="margin: auto; width: 60px; min-width: 47px;  text-align: center;" scope="col">{{$problem->p_in_s}}</th>
            @endforeach
          </tr>

        </thead>
        <tbody>
          <?php $rank=1;?>
          @foreach ($competants as $competant)
          <tr>
            <th style ="" scope="row">{{ $rank++}}</th>
            <td><a href="#" style="text-decoration: none;">{{$competant->user}}</a></td>
            <td style="text-align: center;">{{$competant->total_solved}}</td>

            @foreach ($problems as $problem)
            
              <?php $try = 0; $accepted = false; ?>
              @foreach ($submissions as $submission)
                @if ($submission->user == $competant->user && $submission->p_in_s == $problem->p_in_s)
                
                  <?php $try++;?>
                  @if ($submission->verdict == 'Accepted')
                    <?php $accepted = true;
                      $date = $submission->date;
                      // $now = new date();
                      break;
                    ?>
                  @endif

                @endif
              @endforeach

              @if ($accepted == true)
                <td style="background-color: rgb(2, 140, 2);  text-align: center;" > {{--first solved--}}
                  <div>
                    <strong class="justify-content-center">125</strong>
                    <div style="align-self: center;">
                      <label>{{$try}} try</label>
                    </div>
                  </div>
                  </td>
              @elseif ($accepted == false && $try > 0)
                  <td rowpan="2" class="pt-2" style="background-color: rgb(243, 99, 92); text-align: center;" > {{--first solved--}}
                    {{-- <strong style="color: rgb(243, 99, 92)">.</strong> --}}
                    <div style="align-self: center;">
                      <label>{{$try}} try</label>
                    </div>
                  </td>
              @else
              <td style="height: 45px;"></td>
              @endif
              
            {{-- @endif --}}

            {{-- <td style="background-color: rgb(2, 185, 2);" >    accepted --}}
            @endforeach
            </tr>
            <?php ?>
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
@endsection
