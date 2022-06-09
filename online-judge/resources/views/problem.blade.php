
@extends('layouts.live')
@extends('layouts.app')
@extends('layouts.contest')

@section('content')
<div class="add pl-5 justify-content-between d-flex pr-lg-5 pr-5 p-2">

  <a href=""></a>
  @if (Auth::user()->role == "admin")
  <a href="/addProblem" 
    style="border:none; border-radius:2px; margin-right:150px; text-decoration: none" 
    class="btn-primary p-1"> Add new Problem</a>
  @endif
  
</div>

<div class="container pt-2">
  <div class="container" style="height: 700px; min-width: 500px; width: 95%; float: left; padding-left: 40px;">
    <div style ="border: 1px solid #ddd; border-radius: 5px;">
    <div class="" style="font-weight: bold; padding-left: 40px; width: 100%; background-color: #eeeeee; height: 28px; border: 1px solid #eeeeee; border-radius: 5px;">
      <label style = "">Problems</label>
    </div>
  <table class="table table-sm table-bordered table-hover table-striped table-sm" style="font-size: 14px;">
      <thead>
        <tr>
          <th style="min-width: 20px; font-size: 17px; width: 5%" scope="col">#</th>
          <th class="pr-5" style="width: 70%;" scope="col">Name</th>
          <th class="pr-5" style="width: 60px;" scope="col">solved</th>
          @if (Auth::user()->role == "admin")
          <th  style="min-width: 120px; max-width: 200px; width: 12%">Actions</th>
          @endif  
          

        </tr>
      </thead>
      <tbody>
        @foreach ($problems as $problem)
        <tr>
          <td>{{ $problem->id }}</td>
          <td><a href="/p/{{$problem->id}}/{{$contestt}}" style="text-decoration: none; color: blue;">{{ $problem->name }}</a></td>
          <td><a href="/s/{{$contestt}}/{{$problem->name}}">{{ $problem->solved }}</a></td>
          @if (Auth::user()->role == "admin")
            <td>
              <a href="p/edit/{{ $problem->id }}" 
                  style="border:none; border-radius:4px; text-decoration: none; height: 25px;" 
                  class="btn btn-success btn-sm pr-2 pl-2">Edit</a>

              <a href="p/delete/{{ $problem->id }}"
                  class="btn btn-danger btn-sm" 
                  style="height: 25px;"
                  onclick="return myFunction();">Delete</a>
            </td>
          @endif
          
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
</div>
@endsection
<script>
  function myFunction() {
      if(!confirm("Are You Sure to delete this"))
      event.preventDefault();
  }
 </script>