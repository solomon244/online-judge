@extends('layouts.app')   
@extends('layouts.contest')

@extends('layouts.app')
{{-- @foreach ($problems as $problem)
                <tr>
                    <?php $file = 'm.pdf'; ?>
                <a href="/pdf/{{ $file }}">view</a>
                </tr>
            @endforeach  --}}
@section('content')
    <div class="container d-flex">
        <div class="problem" style="width: 75%; min-width: 650px;">
            <table>
                <tr>
                    <td>
                        <label for="" class="pr-4 pt-3">Id</label>
                    </td>
                    <td>
                        <input type="text" value="{{$user->id}}">
                    </td>
                </tr>
                <tr>
                    <td>
                        <label for="" class="pr-4 pt-3">Name</label>
                    </td>
                    <td>
                        <input type="text" value="{{$user->name}}">
                    </td>
                </tr>
                <tr>
                    <td>
                        <label for="" class="pr-4 pt-3">Email</label>
                    </td>
                    <td>
                        <input type="text" value="{{$user->email}}">
                    </td>
                </tr>
            </table> 
                
        </div>
        
    </div>
@endsection 