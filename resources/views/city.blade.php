<!doctype html>
<html lang="en">
  <head>
    <title>City</title>
  </head>
  <body>
@extends('adminnavbar')
@section('content')
<form method='post' action='addCity'>
    @csrf
    <table class="table table2">
        <tr>
            <td colspan='3'>
                <h3>City</h3>
            </td>
        </tr>
        <tr>
            <td colspan='3'>
                <table class="table">
                    <thead>
                        <tr>
                            <th>
                                No
                            </th>
                            <th>
                                City Name
                            </th>
                            <th>
                                State Name
                            </th>
                            <th>
                                Edit
                            </th>
                            <th>
                                Delete
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $n = 1; ?>
                        @foreach ($city as $d)
                        <tr>
                            <td>
                                <?php echo $n; $n++;?>
                            </td>
                            <td>{{$d->City_Name}}</td>
                            <td>{{$d->State_Name}}</td>
                            <td>
                                <b4-link>
                                    <a href="editCity?id={{$d->City_id}}&sid={{$d->State_id}}" >Edit</a>
                                </b4-link>
                            </td>
                            <td>
                                <b4-link>
                                    <a href="delCity?id={{$d->City_id}}"  onclick="return confirm('Are you sure you want to Delete?')">Delete</i></a>
                                </b4-link>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </td>
        </tr>
        <tr>
            <td>
                <div class="dropdown form-group">
                    <label>State</label>
                    <select class="form-control" required name='state'>
                        <option disabled selected>--</option>
                        @foreach ($state as $d)
                        <option value='{{$d->State_id}}'>{{$d->State_Name}}</option>
                        @endforeach
                    </select>
                </div>
            </td>
            <td>
                <div class="form-group">
                  <label>City Name</label>
                  <input type="text"
                    class="form-control" name="cname" placeholder="Ex. Ahmedabad" required>
                </div>
            </td>
        </tr>
        <tr>
            <td colspan='3' align='center'>
                <button type="submit" class="btn btn-primary" onclick="return alert('City Has Been Added')">Add</button>
            </td>
        </tr>
    </table>
</form>
@endsection    
  </body>
</html>
