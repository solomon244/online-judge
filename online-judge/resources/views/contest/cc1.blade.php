@extends('layouts.app2')  

@section('content')
<style>
    .link{
        color: #aaa;
        text-decoration: none;
    }
</style>
    <form action="/c/contestDetail/{{$contestt}}" method="get">

        <div class="container p-2"  style="width: 700px; margin: auto;">
            @foreach ($contests as $contest)

            <div class="title justify-content-center d-flex" style="align-self: center; width: 700px; margin: auto;">
                <h3 style="padding-right: 50px; color: rgba(8, 111, 245, 0.993); font-style: italic;">Create Contest </h3>
                <h6 class="pt-2 pl-2" style ="color: #494949"><strong>Detail </strong>> </h6> 
                <h6 class="pt-2 pl-2" style ="color: #aaa">> 
                    <a class="link" href="/c/toSchedule/{{$contestt}}">Schedule</a> > 
                    <a class="link" href="/c/toProblemNo/{{$contestt}}">No_of_problems</a> > 
                    @if ($contest->problems > 0)
                        <a class="link" href="/c/toProblems/{{$contestt}}">Problems</a>
                    @else
                        Problems
                    @endif
                </h6> 
            </div>
            
            <div class="pt-5 pb-1">     {{-- ///////////////\\\\\\\\\\\\\\\     break     //////////////\\\\\\\\\\\\\--}}
                <caption class="caption"><strong>Contest Information</strong></caption>
            </div>
            <div style="border: 1px solid gray; border-radius: 5px; width: 700px;">
                <div class="justify-content-between p-2">
                    
                    <table>
                        <tr>
                            <td class="p-2">
                                <label for="">Contest Name</label>
                            </td>
                            <td class="p-2" >
                                <input style="width: 500px;" type="text" name='name' id="name" value="{{$contest->name}}">
                            </td>
                        </tr>
                        <tr>
                            <td class="p-2">
                                <label for="">Contest Logo</label>
                            </td>
                            <td class="p-2" >
                                <input type="file" name='logo' id="logo">
                            </td>
                        </tr>

                        <tr>
                            <td></td>
                            <td class="d-flex">
                                <div id="logoimage" style="max-width: 250px; max-width: 250px; width: fit-content; height: fit-content;">
                                    <input name='Elogo' id="Elogo" type="image" src="../../image/{{$contest->logo}}" alt="" width="250" height="250">
                                    <label style="float: right;" >{{$contest->logo}}</label>
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <div>
                                <td class="p-2">
                                    <label class="pr-1" for="">Contest Type</label><br><br>
                                </td>
                            </div>
                        
                            <td class="p-2 " colspan="2" style="align-self: right;">
                                <input  type="radio" name='type_radio' id="individual"> Individual<br>
                                <input type="radio" name='type_radio' id="team"> Team
                            </td>
                        </tr>
                        <tr>
                            <div>
                                <td class="p-2">
                                    <label class="pr-1" for="">Contest place</label><br><br>
                                </td>
                            </div>
                        
                            <td class="p-2 " colspan="2" style="align-self: right;">
                                <input  type="radio" name='mode_radio' id="individual"> On-Site<br>
                                <input type="radio" name='mode_radio' id="team"> Online
                            </td>
                        </tr>
                    </table>
                </div>
            </div>

            <div class="pt-5 pb-1">     {{-- ///////////////\\\\\\\\\\\\\\\     break     //////////////\\\\\\\\\\\\\--}}
                <caption class="caption"><strong>Contest Participants</strong></caption>
            </div>
            <div style="border: 1px solid gray; border-radius: 5px; width: 700px;">
                <div class="justify-content-between p-2">
                    
                    <table>
                        <tr>
                            <td class="p-2">
                                <label for="">Contest Owner</label>
                            </td>
                            <td class="p-2">
                                <input style="width: 500px;" type="text" name='owner' id="owner" value="{{$contest->owner}}">
                            </td>
                        </tr>

                        <tr>
                            <td class="p-2">
                                <label for="">Contest Creator</label>
                            </td>
                            <td class="p-2" >
                                <input style="width: 500px;" type="text" name='creator' id="creator" value="{{Auth::user()->username}}" disabled="true">
                            </td>
                        </tr>

                        <tr>
                            <td class="p-2">
                                <label for="">Official contestants</label>
                            </td>
                            <td class="p-2" >
                                <input style="width: 500px;" type="text" name='contestants' id="contestants" value="{{$contest->officials}}">
                            </td>
                        </tr>

                        <tr>
                            <td class="p-2">
                                <label for="">Contest sponsers</label>
                            </td>
                            <td class="p-2" >
                                <input type="text" style="width: 500px;" name='sponsers' id="sponsers" placeholder="separate sponsers with comma(,)" value="{{$contest->sponsers}}">
                            </td>
                        </tr>

                        <tr>
                            <td class="p-2">
                                <label for="">Sponsers Logo</label>
                            </td>
                            <td class="p-2" >
                                <input type="file" name='sponserslogo' id="sponserslogo">
                            </td>
                        </tr>
                        <tr>
                            <td></td>
                            <td>
                                <div id="logoimage" style="max-width: 250px; max-width: 250px; width: fit-content; height: fit-content;">
                                    <input  name='Esponserslogo' id="Esponserslogo" type="image" src="../../image/{{$contest->sponserslogo}}" alt="" width="250" height="200">
                                </div>
                                <label style="float: right;">{{$contest->sponserslogo}}</label>
                            </td>
                        </tr>
                    </table>
                </div>
            </div>
            
            <div class="pt-5 pb-1">     {{-- ///////////////\\\\\\\\\\\\\\\     break     //////////////\\\\\\\\\\\\\--}}
                <caption class="caption"><strong>Contest Description</strong></caption>
            </div>
            <div style="border: 1px solid gray; border-radius: 5px; width: 700px;">
                <div class="justify-content-between p-2">
                    
                    <table>
                        <tr>
                            <td class="p-3" >
                                <textarea style="border: none;" type="textarea" cols="85" rows="10" name='description' id="description" >{{$contest->description}}</textarea>
                            </td>
                        </tr>
                    </table>
                </div>
            </div>

            <div class="save p-5 justify-content-between d-flex " style="width: 700px;">
                <div ></div>
                <div class="d-flex" style="min-width: 150px; margin-left: 100px; align-self: flex-end;">
                    <a href="/c/toSchedule/{{$contestt}}" style="margin-right: 20px; width: 90px;" class="btn btn-primary p-2" >Next >></a>
                    <input class="btn btn-primary pr-3" type="submit" value="Save" >
                </div>
            </div>
            @endforeach
        </div>

    </form>
@endsection