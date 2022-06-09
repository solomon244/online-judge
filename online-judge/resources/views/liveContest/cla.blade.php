@extends('layouts.live')

@section('content')
<div class="frame bg-light" style="width: 700px; margin-left: 32%; background-color: #2233440f; margin-top: 0%;">
    <div class="messages p-2" style="max-height: 500px; overflow: auto; background-color: #2233441f">
        @foreach ($clarifications as $clarification)
            
            @if ($clarification->reciever == Auth::user()->username || $clarification->reciever == 'all')
            <div class="justify-content-between d-flex p-1">    
                <div id="{{$clarification->id}}">
                    <div class="p-1" style="width: 95%; margin: auto;">
                        <label >{{$clarification->sender}}</label>
                    </div>
                    <div style="max-width: 100%; height: fit-content;
                                background-color: white; align-content: left;
                                color: rgb(0, 81, 255);
                                border: 1px solid #eee;
                                border-radius: 8px;"
                         class="p-2">
                        
                        <div class="msg_content p-1" style= "width: fit-content; height: fit-content;">
                            <p>{{$clarification->content}}</p>
                        </div>
                        
                        <div class="justify-content-between d-flex" style="height: 20px">
                            <label style="font-style: italic" >{{$clarification->time}}</label>
                            <label href=""></label>
                        </div>
                    </div>
                </div>
                <label href="" style="width: 30%;"></label>
            </div>
            @endif

            @if ($clarification->sender == Auth::user()->username)
            <div class="d-flex justify-content-between p-1">
                <label href="" style="width: 30%"></label>
                <div id="{{$clarification->id}}" style="width: 70%; height: fit-content;
                                                       align-content: right;">
                    <div class="justify-content-between d-flex p-1" style="width: 95%; margin: auto;">
                        @if ($clarification->status == 'seen')
                            <label >seen</label>
                        @else
                            <label >sent</label>
                        @endif
                        
                        <div class="pr-3 pb-1"><label >{{Auth::user()->username}}</label></div>
                    </div>

                    <div style="background-color: rgb(0, 81, 255); 
                                color: white;
                                border: 1px solid rgba(0, 81, 255, 0.788);;
                                border-radius: 8px;"
                         class="p-2">
                        <div >
                                <p>{{$clarification->content}}</p>
                        </div>
                        
                        <div class="justify-content-between d-flex" style="height: 20px;">
                            <label href=""></label>
                            <label style="font-style: italic" >{{$clarification->time}}</label>
                        </div>
                    </div>
                </div>
            </div>
            @endif
            <br>
        @endforeach        
    </div>

    <div class="action p-2 justify-content-around d-flex d-inline" style="align-content: center; margin-top: 5px;
                                                                          background-color: white;">
        <textarea name="" id="message" cols="73" rows="2" placeholder="write your question here"
                    style="border: 1px solid #d5d5d5; border-radius: 8px;"></textarea>
        <button class="btn-primary " style="margin-top: 5px; margin-bottom: 8px; 
                                            padding-left: 10px; border-radius:5px; 
                                            padding-right: 10px; ">send</button>
    </div>
</div>
@endsection