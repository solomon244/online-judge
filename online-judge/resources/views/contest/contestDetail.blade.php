@extends('layouts.app2')

@section('content')
<style>
    .anchor{
        background-color: #e9ecf3;
    }
    .anchor:hover{
        background-color: #d9dcf3;
        color: #0123cc;
    }
</style>
<div class="justify-content-between d-flex">
    <div></div>
    <div style="width: 850px;">
        <div>
            @foreach ($contest as $c)

            <div class="p-2" style="align-items: center;">
                @if ($c->status == "passed")
                <table style="min-width: 300px;">
                    <tr>
                        <td style="padding-right: 15px;">
                            <a class="anchor p-2" style="border-radius: 4px; min-width: 100px; text-decoration: none;" 
                                 href="#staticBackdrop" data-bs-toggle="modal" data-bs-target="#staticBackdrop">schedule</a>
                        </td>
                        <td style="padding-right: 15px;">
                            <a class="anchor p-2" style="border-radius: 4px; min-width: 100px; text-decoration: none;"  
                                href="/lc/contestant/{{$c->id}}">Contestants</a>
                        </td>
                        <td style="padding-right: 15px;">
                            <a class="anchor p-2" style="border-radius: 4px; min-width: 100px; text-decoration: none;"  
                                href="/lc/scoreboard/{{$c->id}}">scoreboard</a>
                        </td>
                        <td style="padding-right: 15px;">
                            <a class="anchor p-2" style="border-radius: 4px; min-width: 100px; text-decoration: none;"  
                                href="#winners{{$c->id}}">Winners</a>
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
                                href="/lc/contestant/{{$c->id}}">Contestants</a>
                        </td>
                    </tr>
                </table>
                @endif
            </div>

            <div style="width: 850px; height: fit-content; border-left: 2px solid gray;" class="">
                <div style="padding-left: 10px;">
                    <div style="color: #1122cc; font-size: 28px; font-weight: 600;">
                        {{$c->name}}
                    </div>
                    
                    <div>
                        Created By <label style="color: rgb(200, 160, 2)">{{$c->creator}}</label>
                    </div>

                    <div class="d-flex" style="height: 300px;">
                        <textarea style="min-width: 70%; height: 100%; padding-top: 10px; padding-right: 15px; overflow: hidden; border: none; resize: none;"disabled ="true" cols="100%;">
                            {{$contest->description}}
                        </textarea>
                        <div style="max-width: 30%; width: fit-content; height: fit-content; max-height: 200px; align-self: center;" >
                            <img src="../../image/{{$c->logo}}" alt="no" width="250" height="250">
                        </div>
                    </div>

                    <div style="padding-top: 15px;">
                        <div style="padding-bottom: 8px;">
                            <strong>Contest Type: </strong>{{$c->type}}
                        </div>
                    
                        <div style="padding-bottom: 8px;">
                            <strong>Contest Place: </strong>{{$c->place}}
                        </div>
                    
                        <div style="padding-bottom: 8px;">
                            <strong>Official contestants: </strong>{{$c->officials}}
                        </div>
                    </div>
                    
                    @if ($c->status == "passed")
                    <div style="" id="winners">
                        <div style="padding: 5px; font-weight: 600;">Conttest Winners</div>
                        <div style="padding-left: 15px; padding-bottom: 5px; font-weight: 600;">1, <label for=""> First Winners</label></div>
                        <div style="padding-left: 15px; padding-bottom: 5px; font-weight: 600;">2, <label for=""> Second Winners</label></div>
                        <div style="padding-left: 15px; padding-bottom: 5px; font-weight: 600;">3, <label for=""> Third Winners</label></div>
                    </div>
                    @endif

                    <div class="p-2">
                        <strong>Sponsers: </strong>
                        {{$c->sponsers}}
                        <div style="border: 1px solid red; max-width: 30%; width: fit-content; height: fit-content; max-height: 200px; align-self: center;" >
                            <img src="{{$c->logo}}" alt="no">
                        </div>
                    </div>
                </div>
            </div>
            @endforeach
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
                body
            </div>
        </div>
    </div>
</div>

