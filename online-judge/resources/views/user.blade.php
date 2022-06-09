@extends('layouts.app')   
@extends('layouts.contest')

@section('content')

<div class="container" style="height: 700px; min-width: 450px; width: 95%; float: left; padding-left: 50px;">
    <div style ="border: 1px solid #ddd; border-radius: 5px;">
    <div class="" style="font-weight: bold; padding-left: 40px; width: 100%; background-color: #eee; height: 28px; border: 1px solid #eee; border-radius: 5px;">
      <h6 style = "">Users</h6>
    </div>
  <table class="table table-striped table-bordered table-hover table-sm" style="padding-left: 40px; min-width: 400px; width: 100%; height: 20px;" >
      <thead>
        <tr style="height: 35px;">
          <th style="min-width: 20px; width: 5%" scope="col">No</th>
          <th style="min-width: 150px; width: 25%" scope="col">Name</th>
          <th style="min-width: 150px; width: 25%" scope="col">Username</th>
          <th scope="col">Email</th>
          <th style="min-width: 150px; width: 8%"scope="col">Role</th>
          @if (Auth::user()->role == "admin")
            <th style="min-width: 80px; width: 12%" scope="col">Action</th>
          @endif
          
        </tr>
      </thead>
      <tbody>
      
      <?php 
        $no = 0;
      ?>

        @foreach ($users as $user)
        <tr>
          <th scope="row">{{ ++$no }}</th>
          <td><a href="/u/{{$user->id}}" style="text-decoration: none;">{{ $user->name }}</a></td>
          <td>{{ $user->username }}</td>
          <td>{{ $user->email }}</td>
          <td>{{ $user->role }}</td>
          <td>
            @if (Auth::user()->role == "admin")
              <a href="/u/delete/{{ $user->id }}"
                class="btn btn-danger btn-sm" 
                style="height: 25px;"
                onclick="return myFunction();">Delete</a>
            @endif
          
            </td>
          </tr>

        @endforeach
        <tfoot>
            <tr>
               
            </tr>
            <tr></tr>
                <td colspan="4">
                  
              </td>
            </tr>
        </tfoot>
        </tbody>
    </table>
  </div>
</div>
@endsection
<script>
  function myFunction() {
      if(!confirm("Are You Sure to delete this"))
      event.preventDefault();
  }
 </script>