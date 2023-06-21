<!doctype html>
<html lang="en">
  <head>
    <title>Material</title>
  </head>
<body>

@extends('adminnavbar')
@section('content')
<form method='post' action='/addMats'>
    @csrf
    <table class="table table2">
        <tr>
            <td>
                <h3>Material</h3>
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
                                Material Name
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
                        @foreach ($material as $d)
                        <tr>
                            <td>
                                <?php echo $n; $n++;?>
                            </td>
                            <td>{{$d->Material_Name}}</td>
                            <td>
                                <b4-link>
                                    <a href="/editMats?id={{$d->Material_id}}">Edit</a>
                                </b4-link>
                            </td>
                            <td>
                                <b4-link>
                                    <a href="/delMats?id={{$d->Material_id}}" onclick="return confirm('Are you sure you want to Delete?')">Delete</a>
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
                  <label>Material Name</label>
                  <input type="text"
                    class="form-control" name="mname" placeholder="Ex. Cotton" required>
                </div>
            </td>
        </tr>
        <tr>
            <td colspan='2' align='center'>
                <button type="submit" class="btn btn-primary" onclick="return alert('Material Has Been Added')">Add</button>
            </td>
        </tr>
    </table>
</form>
@endsection
  </body>
</html>
</script>    