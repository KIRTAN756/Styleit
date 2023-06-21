<!doctype html>
<html lang="en">
  <head>
    <title>Edit</title>
  </head>
  <body>
@extends('adminnavbar')
@section('content')
<form method='post' action='/updtCity'>
    @csrf
    <table class="table">
        <tr>
            <td colspan=>
                <h3>Edit City</h3>
            </td>
            <td align='right'>
                <b4-link>
                    <a href="{{ url()->previous() }}"><i class="bi-x-square" style='font-size: 30px; color: black;'></i></a>
                </b4-link>
            </td>
        </tr>
        @foreach ($city as $d)
        <tr>
            <td>
                <div class="dropdown form-group">
                    <label>State</label>
                    <select class="form-control" required name='state'>
                        <option disabled>--</option>
                        <option value="{{$d->State_id}}" Selected>{{$d->State_Name}}</option>
                        @foreach ($state as $d1)
                            <option value="{{$d1->State_id}}">{{$d1->State_Name}}</option>
                        @endforeach
                    </select>
                </div>
            </td>
            <td>
                <div class="form-group">
                  <label>City Name</label>
                  <input type="text"
                    class="form-control" name="cname" placeholder="Ex. Ahmedabad" value="{{$d->City_Name}}" required>
                  <input type="hidden"
                    class="form-control" name="cid" value="{{$d->City_id}}" required>
                </div>
            </td>
        </tr>
        @endforeach
        <tr>
            <td colspan='3' align='center'>
                <button type="submit" class="btn btn-primary" onclick="return alert('City Has Been Updated')">Update</button>
            </td>
        </tr>
    </table>
</form>
@endsection    
  </body>
</html>