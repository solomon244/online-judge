@extends('layouts.app')
@extends('layouts.contest')

@section('content')
<style>
    .anchor:hover{
        background-color: #d9dcf3;
        color: #0123cc;
    }
</style>

<div style="width: 90%; min-width: ; margin: auto; ">
    @foreach ($contests as $contest)
    <div class="p-4">
        <div style="color: #1122cc; font-size: 28px; font-weight: 600;">
            {{$contest->name}}
        </div>
        
        <div>
            Created By <label style="color: rgb(200, 160, 2)">{{$contest->creator}}</label>
        </div>
        <div style="width: 100%; height: fit-content; border-left: 2px solid gray;" class="">
            <div style="padding-left: 10px;">

                <div class="d-flex" style="height: 300px;">
                    <textarea style="min-width: 70%; height: 100%; padding-top: 10px; padding-right: 15px; overflow: hidden; border: none; resize: none;"disabled ="true" cols="100%;">
                        {{$contest->description}}
                    </textarea>
                    <div style="max-width: 30%; width: fit-content; height: 100%; max-height: 200px; align-self: center;" >
                        <img src="../../image/{{$contest->logo}}" alt="no" width="250" height="250">
                    </div>
                </div>

                <div style="padding-top: 15px;">
                    <div style="padding-bottom: 8px;">
                        <strong>Contest Type: </strong>{{$contest->type}}
                    </div>
                
                    <div style="padding-bottom: 8px;">
                        <strong>Contest Place: </strong>{{$contest->place}}
                    </div>
                
                    <div style="padding-bottom: 8px;">
                        <strong>Official contestants: </strong>{{$contest->officials}}
                    </div>
                </div>

                @if ($contest->status == "passed")
                <div style="">
                    <div style="padding: 5px; font-weight: 600;">Conttest Winners</div>
                    <div style="padding-left: 15px; padding-bottom: 5px; font-weight: 600;">1, <label for=""> First Winners</label></div>
                    <div style="padding-left: 15px; padding-bottom: 5px; font-weight: 600;">2, <label for=""> Second Winners</label></div>
                    <div style="padding-left: 15px; padding-bottom: 5px; font-weight: 600;">3, <label for=""> Third Winners</label></div>
                </div>
                @endif

                <div class="p-2">
                    <strong>Sponsers: </strong>
                    {{$contest->sponsers}}
                    <div style="border: 1px solid red; max-width: 30%; width: fit-content; height: fit-content; max-height: 200px; align-self: center;" >
                        <img src="{{$contest->logo}}" alt="no">
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div style="width: 95%; border: 1px solid #ccc; border-radius: 4px; height: 45px; margin-left: 20px; margin-bottom: 25px;" 
         class=" d-flex ">
         
        <label class="p-2" style="padding-right: 100px;">{{$contest->name}}</label>
        <div class="p-2">
            @if ($contest->status == "passed")
            <table style="min-width: 300px;">
                <tr>
                    <td style="padding-right: 15px;">
                        <a class="anchor p-2" style="border-radius: 4px; min-width: 100px; text-decoration: none;" 
                                href="">schedule</a>
                    </td>
                    <td style="padding-right: 15px;">
                        <a class="anchor p-2" style="border-radius: 4px; min-width: 100px; text-decoration: none;"  
                            href="/lc/contestant/{{$contest->id}}">Contestants</a>
                    </td>
                    <td style="padding-right: 15px;">
                        <a class="anchor p-2" style="border-radius: 4px; min-width: 100px; text-decoration: none;"  
                            href="/lc/scoreboard/{{$contest->id}}">scoreboard</a>
                    </td>
                </tr>
            </table>
            @else
            <table style="min-width: 200px;">
                <tr>
                    <td style="padding-right: 15px;">
                        <a class="anchor p-2" style="border-radius: 4px; min-width: 100px; text-decoration: none;" 
                                href="">schedule</a>
                    </td>
                    <td style="padding-right: 15px;">
                        <a class="anchor p-2" style="border-radius: 4px; min-width: 100px; text-decoration: none;"  
                            href="/lc/contestant/{{$contest->id}}">Contestants</a>
                    </td>
                </tr>
            </table>
            @endif
        </div>
    </div>
    @endforeach
</div>
@endsection

@section('toprated')
<div style ="border: 1px solid #ddd; border-radius: 5px; width: 90%; margin: auto; margin-top: 35px;">
    <div class="" style="font-weight: bold; width: 100%; background-color: #eeeeee; height: 28px; border: 1px solid #eeeeee; text-align: center; border-radius: 5px;">
    <h6 style=" font-size: 15px;">Top rated</h6>
    </div>
    <table class="table table-sm table-bordered table-hover table-striped table-sm" style="font-size: 14px;">
        <thead>
          <tr>
            <th style="min-width: 20px; font-size: 17px; width: 5%" scope="col">#</th>
            <th class="pr-5" style="width: 70%;" scope="col">User</th>
            <th class="pr-5" style="width: 60px;" scope="col">Rating</th>            
          </tr>
        </thead>
        <tbody>
            <?php $i = 1;?>
        @foreach ($contestants as $contestant)
          <tr>
            <td>{{$i}}</></td> <?php $i++; ?>
            <td>{{ $contestant->username }}</td>
            <td>{{ $contestant->rating }}</td>
          </tr>
          @if ($i==10)
              @break
          @endif
        @endforeach
        </tbody>
      </table>
</div>
@endsection

