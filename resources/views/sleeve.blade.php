<!doctype html>
<html lang="en">
  <head>
    <title>Sleeve</title>
  </head>
  <body>
@extends('adminnavbar')
@section('content')
<form method='post' action='addSleeve'>
    @csrf
    <table class="table table2">
        <tr>
            <td>
                <h3>Sleeve</h3>
            </td>
        </tr>
        <tr>
            <td colspan='2'>
                <table class="table">
                    <thead>
                        <tr>
                            <th>
                                No
                            </th>
                            <th>
                                Sleeve Name
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
                        @foreach ($sleeve as $d)
                        <tr>
                            <td>
                                <?php echo $n; $n++;?>
                            </td>
                            <td>{{$d->Sleeve_Name}}</td>
                            <td>
                                <b4-link>
                                    <a href="editSleeve?id={{$d->Sleeve_id}}">Edit</a>
                                </b4-link>
                            </td>
                            <td>
                                <b4-link>
                                    <a href="/delSleeve?id={{$d->Sleeve_id}}" onclick="return confirm('Are you sure you want to Delete?')">Delete</a>
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
                <div class="form-group">
                  <label>Sleeve Name</label>
                  <input type="text"
                    class="form-control" name="sname" placeholder="Ex. Full Sleeve" required>
                </div>
            </td>
        </tr>
        <tr>
            <td colspan='2' align='center'>
                <button type="submit" class="btn btn-primary" onclick="return alert('Sleeve Has Been Added')">Add</button>
            </td>
        </tr>
    </table>
</form>
@endsection    
  </body>
</html>
