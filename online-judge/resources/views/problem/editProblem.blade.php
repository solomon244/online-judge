@extends('layouts.app') 
@extends('layouts.contest')

@section('content')
    <div class="container">
        <div class="title">
            <h3>Update problem</h3>
        </div>
        <div class="problem p-3" style="width: 75%; min-width: 650px;">
            <table>
                <tr>
                    <td>
                        <label for="" class="pr-4 pt-2">Id</label>
                    </td>
                    <td>
                        <label type="text"></label> <strong>{{$problem->id}}</strong></label>
                    </td>
                </tr>
                <tr>
                    <td>
                        <label for="" class="pr-4 pt-2">Name</label>
                    </td>
                    <td>
                        <input type="text" value="{{$problem->name}}" name="name" id="name">
                    </td>
                </tr>
                <tr>
                    <td class="pr-3 pt-2">
                        <label for="">Pdf_file</label>
                    </td>
                    <td class="pr-3 pt-2 justify-content-between">
                        <label for="" name ="selected_pdf" >Pdf_file</label>
                        <button onclick="enableFile('pdf_file')" class="btn btn-link">edit</button>
                    </td>
                    <td class="pr-3 pt-2">
                        <input type="file" name='pdf_file' id="pdf_file" disabled="true">
                    </td>
                </tr>
                <tr>
                    <td class="pr-3 pt-2">
                        <label for="">Input</label>
                    </td>
                    <td class="pr-3 pt-2 justify-content-between">
                        <label for="" name ="selected_input" >Input</label>
                        <button onclick="enableFile('input')" class="btn btn-link">edit</button>
                    </td>
                    <td class="pr-3 pt-2">
                        <input type="file" name='input' id="input" disabled="true">
                    </td>
                </tr>
                <tr>
                    <td class="pr-3 pt-2">
                        <label for="">Output</label>
                    </td>
                    <td class="pr-3 pt-2 justify-content-between">
                        <label for="" name ="selected_output" >Output</label>
                        <button onclick="enableFile('output')" class="btn btn-link">edit</button>
                    </td>
                    <td class="pr-3 pt-2">
                        <input type="file" name='output' id="output" disabled="true">
                    </td>
                </tr>
            </table> 
            <div class="save p-4">
                <input class="btn btn-primary" type="submit" value="Save changes" >
            </div>    
        </div>
        
    </div>

    <script type="text/javascript">
        function enableFile(element){
            var temp = document.getElementsByTagName("pp");
            temp.textContent = "asd";
       }
    </script>

@endsection
