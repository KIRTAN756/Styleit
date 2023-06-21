<!doctype html>
<html lang="en">
  <head>
    <title>Edit</title>
  </head>
  <body>
@extends('adminnavbar')
@section('content')
<form method='post' action='/updtPattern'>
    @csrf
    <table class="table">
        <tr>
            <td colspan=>
                <h3>Edit Pattern</h3>
            </td>
            <td align='right'>
                <b4-link>
                    <a href="{{ url()->previous() }}"><i class="bi-x-square" style='font-size: 30px; color: black;'></i></a>
                </b4-link>
            </td>
        </tr>
        <tr>
            <td colspan='2'>
                <div class="form-group">
                  <label>Pattern Name</label>
                  <input type="text"
                    class="form-control" name="pname" placeholder="Ex. Cotton" value="{{$pattern->Pattern_Name}}" required>
                  <input type="hidden"
                    class="form-control" name="pid" value="{{$pattern->Pattern_id}}" required>
                </div>
            </td>
        </tr>
        <tr>
            <td colspan='3' align='center'>
                <button type="submit" class="btn btn-primary" onclick="return alert('Pattern Has Been Updated')">Update</button>
            </td>
        </tr>
    </table>
</form>
@endsection    
  </body>
</html>