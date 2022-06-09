@extends('layouts.app2')
@extends('layouts.contest')

@section('content')
    <div class="container" style="height: 700px; min-width: 450px;  
        @foreach ($contest as $c)
            @if ($c->status == "upcomming")
                width: 95%;
            @else
                width: 55%;
                margin-left: 300px;;
            @endif
        @endforeach
        float: left; padding-left: 50px;">
        <div style ="border: 1px solid #cecece; border-radius: 5px;">
        <div class="" style="font-weight: bold; padding-left: 40px; width: 100%; background-color: #cecece; height: 40px; border: 1px solid #cecece; border-radius: 5px;">
            <label style = "padding-top: 5px;">Contestant</label>
        </div>
        <table class="table table-striped table-bordered table-hover table-sm" style="text-align: center; padding-left: 40px; min-width: 400px; width: 100%" >
            <thead>
            <tr style="height: 35px;">

                <th style="min-width: 20px; width: 5%" scope="col">No</th>
                <th style="min-width: 150px; " scope="col">User</th>
                @foreach ($contest as $c)
                    @if ($c->status == "upcomming")
                        <th style="min-width: 150px; width: 25%" scope="col">Status</th>
                        @if (Auth::user()->role == "admin")
                            <th style="min-width: 150px; width: 25%" scope="col">Aciton</th>
                        @endif
                    @endif
                @endforeach
                        
            </tr>
            </thead>
            <tbody>
            
            <?php 
            $no = 0;
            ?>

            @foreach ($contestant as $user)
            @if (Auth::user()->role == "user" && $user->status != 'Rejected')
                <tr>
                <th scope="row">{{ ++$no }}</th>
                <td><a href="#" style="text-decoration: none;">{{ $user->user}}</a></td>
                <td>{{ $user->status }}</td>
                </tr> 
            @endif
            @if (Auth::user()->role == "admin")
            <tr>
                <th scope="row">{{ ++$no }}</th>
                <td><a href="#" style="text-decoration: none;">{{ $user->user }}</a></td>
                @if ($c->status == "upcomming")
                <td id="action">{{ $user->status }}</td>
                    @foreach ($contest as $c)
                    <td>
                        @if ($user->status == "Pending" || $user->status == "Rejected")
                            <a href="/contestant/accept/{{ $user->id }}"
                            style="text-decoration: none;"
                            class="btn-primary btn-sm">Accept</a>
                        @endif
                        @if ($user->status == "Accepted")
                            <a href="/contestant/reject/{{ $user->id }}"
                            style="text-decoration: none;"
                            class="btn-danger btn-sm">Reject</a>
                        @endif
                    </td>
                @endforeach
                @endif
                </tr>
                @endif
            @endforeach
            
        </table>
    </div>
</div>
</div>
@endsection