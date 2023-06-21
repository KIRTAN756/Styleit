<!doctype html>
<html lang="en">
  <head>
    <title>Pattern</title>
  </head>
  <body>
@extends('adminnavbar')
@section('content')
<form method='post' action='addPattern'>
    @csrf
    <table class="table table2">
        <tr>
            <td>
                <h3>Pattern</h3>
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
                                Pattern Name
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
                        @foreach ($pattern as $d)
                        <tr>
                            <td>
                                <?php echo $n; $n++;?>
                            </td>
                            <td>{{$d->Pattern_Name}}</td>
                            <td>
                                <b4-link>
                                    <a href="editPattern?id={{$d->Pattern_id}}">Edit</a>
                                </b4-link>
                            </td>
                            <td>
                                <b4-link>
                                    <a href="/delPattern?id={{$d->Pattern_id}}" onclick="return confirm('Are you sure you want to Delete?')">Delete</a>
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
                  <label>Pattern Name</label>
                  <input type="text"
                    class="form-control" name="pname" placeholder="Ex. Solid" required>
                </div>
            </td>
        </tr>
        <tr>
            <td colspan='2' align='center'>
                <button type="submit" class="btn btn-primary" onclick="return alert('Pattern Has Been Added')">Add</button>
            </td>
        </tr>
    </table>
</form>
@endsection    
  </body>
</html>
