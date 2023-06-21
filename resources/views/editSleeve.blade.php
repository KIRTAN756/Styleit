<!doctype html>
<html lang="en">
  <head>
    <title>Edit</title>
  </head>
  <body>
@extends('adminnavbar')
@section('content')
<form method='post' action='/updtSleeve'>
    @csrf
    <table class="table">
        <tr>
            <td colspan=>
                <h3>Edit Sleeve</h3>
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
                  <label>Sleeve Name</label>
                  <input type="text"
                    class="form-control" name="sname" placeholder="Ex. Cotton" value="{{$sleeve->Sleeve_Name}}" required>
                  <input type="hidden"
                    class="form-control" name="sid" value="{{$sleeve->Sleeve_id}}" required>
                </div>
            </td>
        </tr>
        <tr>
            <td colspan='3' align='center'>
                <button type="submit" class="btn btn-primary" onclick="return alert('Sleeve Has Been Updated')">Update</button>
            </td>
        </tr>
    </table>
</form>
@endsection    
  </body>
</html>