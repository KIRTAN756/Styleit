<!doctype html>
<html lang="en">
  <head>
    <title>Collar</title>
  </head>
  <body>
@extends('adminnavbar')
@section('content')
<form method='post' action='addCollar'>
    @csrf
    <table class="table table2">
        <tr>
            <td>
                <h3>Collar</h3>
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
                                Collar Name
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
                        @foreach ($collar as $d)
                        <tr>
                            <td>
                                <?php echo $n; $n++;?>
                            </td>
                            <td>{{$d->Collar_Name}}</td>
                            <td>
                                <b4-link>
                                    <a href="editCollar?id={{$d->Collar_id}}">Edit</a>
                                </b4-link>
                            </td>
                            <td>
                                <b4-link>
                                    <a href="/delCollar?id={{$d->Collar_id}}" onclick="return confirm('Are you sure you want to Delete?')">Delete</a>
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
                  <label>Collar Name</label>
                  <input type="text"
                    class="form-control" name="cname" placeholder="Ex. The Spread Collar" required>
                </div>
            </td>
        </tr>
        <tr>
            <td colspan='2' align='center'>
                <button type="submit" class="btn btn-primary" onclick="return alert('Collar Has Been Added')">Add</button>
            </td>
        </tr>
    </table>
</form>
@endsection    
  </body>
</html>
