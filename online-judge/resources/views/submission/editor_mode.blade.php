@extends('layouts.live')
@extends('layouts.app')
@extends('layouts.contest')

@section('content')

<form action="/excecute/{{$contestt}}">
    <div class="container">
        <div class="d-flex justify-content-center">
            <div class="div pb-3">
                <label for="">Problem :</label>
                <input type="text" name='id' id="id" value="{{$problem->id}}" style="width: 100px; border: none; color: white; width: 1px;" disabled = "true" >
                <strong><input for="" name="problem" id="problem" value = "{{$problem->name}}" style="border: none; pointer-events: none; font-weight:bold;"></strong>
            </div>

            <div class="">
                <label for="">Language</label>
                <select name="language" id="language" style="width: 100px; height: 25px;">
                    <option value="c">c</option>
                    <option value="c++">c++</option>
                    <option value="java">java</option>
                    <option value="python">python</option>
                </select>
            </div>
        </div>

        <div class="file pl-4" style ="padding-left: 30px; width: 100%;">
            <textarea style="width: 95%; height: 420px; " name="s_code" id="s_code"></textarea>
            
        </div>

        <div class="justify-content-between d-flex">
            <a>
            </a>
            <div class="save pl-2 pt-1 pr-5" style="padding-right: 60px;">
                <a href="" onclick="editor()" 
                    style="border:none; border-radius:2px; margin-right:30px; margin-top:10px; text-decoration: none" 
                    class="btn-danger p-2"> close Editor</a>
                <input href="/excecute/{{$contestt}}" class="btn btn-success pt-2" type="submit" value="Submit">
            </div>
        </div>
    </div>
</form>
@endsection 
