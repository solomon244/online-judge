
@section('contest')
@if ($contestt == 0)
    @if ($Count > 0)  

<form register="">
    <?php $i=0;?>
    <div id ="full_panel" style=" background-color: #fcfcfc; min-width: 180px; width: 230px; margin:auto; align-content: center; border: 1px solid #ddd; border-radius: 5px;">
        <div style="font-weight: bold; padding-left: 25px; width: 100%; background-color: #eeeeee; height: 28px; border: 1px solid #eeeeee; border-radius: 5px;">
            <h6 style=" font-size: 15px;">Upcomming Contest</h6>
        </div>
            @foreach ($Contests as $contest)  
                                           
            <?php $c_id = $contest->id ?>
            <div id ="panel{{$i}}" class="div pl-2" style ="width : 100%; margin: auto; align-content: center">
                <?php $i++?>
                <table>
                    <tr><td>
                        <a class="div p-2" href="#" style ="width : 100%; margin: auto; text-decoration: none;" id="contest{{$c_id}}" >{{$contest->name}}</a></td>
                    </tr>
                    <tr><td>
                        <!-- Display the countdown timer in an element -->
                        <strong id="time{{$c_id}}" style="color: #555; letter-spacing: 1px; margin-left: 67px;"></strong></td>
                    </tr>
                    <tr><td style="text-align: center; margin-left: 28px;">
                        <a class="btn btn-link pl-5" style="border: none;"  href = "/p/{{$c_id}}" onclick="btnclicked()" id="enter{{$c_id}}"></a>
                        <a class="btn btn-link pl-5" style="border: none;"  href = "/lc/add/contestant/{{$c_id}}" onclick="btnclicked()" id="register{{$c_id}}"></a>
                        <label class="pl-5 " style=" color: #555;" id="time_left{{$c_id}}"></label>
                        <a href="/lc/contestant/{{$c_id}}" id="contestant{{$c_id}}" style="text{{$c_id}}-decoration: none;"></a></td>
                    </tr>

                </table>

            </div>
            <script>
                function btnclicked(){
                    var btn_name = document.getElementById("register{{$c_id}}").innerHTML;
                    if(btn_name == "Register"){
                        document.location.href="/lc/add/contestant/{{$contest->id}}";
                    }
                    else if(btn_name == "Enter"){
                        document.location.href="/p/{{$contest->id}}";
                    }
                }
            </script>            
            <script>

                // Set the date we're counting down to
                                
                var count = '<?=$Count?>';

                // for (let i = 0; i < count; i++) {
                    var Reg_start{{$c_id}} = '<?=$contest->reg_start_time?>';
                    var Reg_end{{$c_id}} = '<?=$contest->reg_end_time?>';

                    // var id = '<?=$contest->id?>';

                    Reg_start{{$c_id}} = new Date(Reg_start{{$c_id}}).getTime();
                    Reg_end{{$c_id}} = new Date(Reg_end{{$c_id}}).getTime();                  
                
                    // Update the count down every 1 second
                    var x{{$c_id}} = setInterval(function() {
                    
                    var now{{$c_id}} = new Date().getTime();
                    
                    // Find the end_distance between now and the count down date
                    var start_time{{$c_id}} = Reg_start{{$c_id}} - now{{$c_id}};
                    var end_time{{$c_id}} = Reg_end{{$c_id}} - now{{$c_id}};
                    
                    // Time calculations for days, hours, minutes and seconds to register
                    var days1{{$c_id}} = Math.floor(start_time{{$c_id}} / (1000 * 60 * 60 * 24));
                    var hours1{{$c_id}} = Math.floor((start_time{{$c_id}} % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
                    var minutes1{{$c_id}} = Math.floor((start_time{{$c_id}} % (1000 * 60 * 60)) / (1000 * 60));
                    var seconds1{{$c_id}} = Math.floor((start_time{{$c_id}} % (1000 * 60)) / 1000);

                    // Time calculations for days, hours, minutes and seconds for restration to end
                    var days2{{$c_id}} = Math.floor(end_time{{$c_id}} / (1000 * 60 * 60 * 24));
                    var hours2{{$c_id}} = Math.floor((end_time{{$c_id}} % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
                    var minutes2{{$c_id}} = Math.floor((end_time{{$c_id}} % (1000 * 60 * 60)) / (1000 * 60));
                    var seconds2{{$c_id}} = Math.floor((end_time{{$c_id}} % (1000 * 60)) / 1000);

                    // If registration time is not yet reached
                    if(start_time{{$c_id}} > 0){
                            document.getElementById("time{{$c_id}}").innerHTML = days1{{$c_id}} + "d " + hours1{{$c_id}} + ": "
                            + minutes1{{$c_id}} + ": " + seconds1{{$c_id}};
                            document.getElementById("time_left{{$c_id}}").innerHTML = "Before register";
                        }

                    // Display the result in the element with id="demo"
                    else if (end_time{{$c_id}} > 0) {
                                                
                        if ({{$con_reg[$c_id]}} == {{$c_id}}) {
                            clearInterval(x{{$c_id}});
                            enter();
                        }
                        else{
                            document.getElementById("time_left{{$c_id}}").innerHTML = "";
                            document.getElementById('time{{$c_id}}').innerHTML = days2{{$c_id}} + "d " + hours2{{$c_id}} + ": "
                            + minutes2{{$c_id}} + ": " + seconds2{{$c_id}};

                            document.getElementById("register{{$c_id}}").innerHTML = "Register";
                        }
                        
                    }
                    // If the registration count down is finished, start contest count down
                    if (end_time < 0 && {{$con_reg[$c_id]}} == {{$c_id}}) {
                        clearInterval(x{{$c_id}});
                        enter();
                    }else{                                           // TurnOFF Visibility
                        var panel= document.getElementById("panel{{$c_id}}").innerHTML = "none";
                        panel.style.disable = "none";
                    }
                    
                    }, 1000);

                    // count down for contest time
                    function enter(){
                            var contest_start{{$c_id}} = '<?=$contest->start_time?>';
                            var contest_end{{$c_id}} = '<?=$contest->end_time?>';

                            contest_start{{$c_id}} = new Date(contest_start{{$c_id}}).getTime();
                            contest_end{{$c_id}} = new Date(contest_end{{$c_id}}).getTime();

                        var x1{{$c_id}} = setInterval(function() {
                        var now1{{$c_id}} = new Date().getTime();
                        
                        // Find the distance between now and the count down date
                        var start_time1{{$c_id}} = contest_start{{$c_id}} - now1{{$c_id}};
                        var end_time1{{$c_id}} = contest_end{{$c_id}} - now1{{$c_id}};
                        
                        // Time calculations for days, hours, minutes and seconds to start contest
                        var days3{{$c_id}} = Math.floor(start_time1{{$c_id}} / (1000 * 60 * 60 * 24));
                        var hours3{{$c_id}} = Math.floor((start_time1{{$c_id}} % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
                        var minutes3{{$c_id}} = Math.floor((start_time1{{$c_id}} % (1000 * 60 * 60)) / (1000 * 60));
                        var seconds3{{$c_id}} = Math.floor((start_time1{{$c_id}} % (1000 * 60)) / 1000);

                        // Time calculations for days, hours, minutes and seconds for contest to end
                        var days4{{$c_id}} = Math.floor(end_time1{{$c_id}} / (1000 * 60 * 60 * 24));
                        var hours4{{$c_id}} = Math.floor((end_time1{{$c_id}} % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
                        var minutes4{{$c_id}} = Math.floor((end_time1{{$c_id}} % (1000 * 60 * 60)) / (1000 * 60));
                        var seconds4{{$c_id}} = Math.floor((end_time1{{$c_id}} % (1000 * 60)) / 1000);
                        
                        // If contest time is not yet reached
                        if(start_time1{{$c_id}} > 0){
                                document.getElementById("time{{$c_id}}").innerHTML = days3{{$c_id}} + "d " + hours3{{$c_id}} + ": "
                                + minutes3{{$c_id}} + ": " + seconds3{{$c_id}};
                                var label{{$c_id}} =document.getElementById("time_left{{$c_id}}");
                                label{{$c_id}}.innerHTML = "Registered";
                                label{{$c_id}}.style.color = "red";

                                document.getElementById('contestant{{$c_id}}').innerHTML = ">>";
                            }

                        // If contest start time is reached 
                        else if (end_time1{{$c_id}} > 0) {
                            document.getElementById("time_left{{$c_id}}").innerHTML = "";
                            document.getElementById("register{{$c_id}}").innerHTML = "";
                            document.getElementById("contestant{{$c_id}}").innerHTML = "";
                            document.getElementById('time{{$c_id}}').innerHTML = days4{{$c_id}} + "d " + hours4{{$c_id}} + ": "
                            + minutes4{{$c_id}} + ": " + seconds4{{$c_id}};
                            
                            document.getElementById("enter{{$c_id}}").innerHTML = "Enter";
                            }
                        // If the contesttime is finished, display some information
                        if (end_time1{{$c_id}} < 0) {
                            clearInterval(x1{{$c_id}});
                            document.getElementById("time{{$c_id}}").innerHTML = "Finished";
                            document.getElementById("register{{$c_id}}").innerHTML = "";
                            document.getElementById("enter{{$c_id}}").innerHTML = "";
                            document.getElementById("contestant{{$c_id}}").innerHTML = "";
                        }
                        }, 1000);
                        }
                // }
            </script>
            <hr>
        @endforeach
    </div>
</form>
@endif
@endif 
@endsection
