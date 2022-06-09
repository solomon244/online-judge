@extends('layouts.app') 

@section('content')
    <form action="p/add" method="GET">
        <div class="container p-2">
            <div class="title">
                <h2>Add new problem</h2>
            </div>
            <table>
                <tr>
                    <td class="pr-3 pt-2">
                        <label for="">Name</label>
                    </td>
                    <td class="pr-3 pt-2">
                        <input type="text" name="name" id="name" >
                    </td> 
                </tr>
                <tr>
                    <td class="pr-3 pt-2">
                        <label for="">Time Limit</label>
                    </td>
                    <td class="pr-3 pt-2">
                        <input type="text" name="time_limit" id="time_limit" placeholder="in ms">
                    </td> 
                </tr>
                <tr>
                    <td class="pr-3 pt-2">
                        <label for="">Memory Limit</label>
                    </td>
                    <td class="pr-3 pt-2">
                        <input type="text" name="memory_limit" id="memory_limit" placeholder="in kb">
                    </td> 
                </tr>
                <tr>
                    <td class="pr-3 pt-2">
                        <label for="">Pdf_file</label>
                    </td>
                    <td class="pr-3 pt-2" >
                        <input type="file" name='pdf_file' id="pdf_file">
                    </td>
                </tr>
                <tr>
                    <td class="pr-3 pt-2">
                        <label for="">Input</label>
                    </td>
                    <td class="pr-3 pt-2">
                        <input type="file" name='input' id="input" >
                    </td>
                </tr>
                <tr>
                    <td class="pr-3 pt-2">
                        <label for="">Output</label>
                    </td>
                    <td class="pr-3 pt-2">
                        <input type="file" name='output' id="output" >
                    </td>
                </tr>
            </table>
            
            <div class="save p-4">
                <input class="btn btn-primary" type="submit" value="Add Problem" >
            </div>
        </div>
    </form>
@endsection