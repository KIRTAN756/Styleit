<!doctype html>
<html lang="en">
  <head>
    <title>Collection</title>
  </head>
  <body>
@extends('tailornavbar')
@section('content')
<form>
    <table class="table">
        <tr>
            <td>
                <h3>Collection</h3>
            </td>
        </tr>
        <tr>
            <td>
                <a href='#' class="btn btn-primary">Add New Design</a>
            </td>
        </tr>   
        <tr>
            <td>
                <div class="scroll">
                    <table class="table">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Design</th>
                                <th>Cost</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $n = 1; ?>
                            @foreach ($design as $d)
                            <tr>
                                <td><br><br>
                                    <?php echo $n; $n++;?>
                                </td>
                                <td>
                                    <table class='table'>
                                        <tbody>
                                            <tr>
                                                <th>Material</th>
                                                <td>{{$d->Material_Name}}</td>
                                                <th>Sleeve</th>
                                                <td>{{$d->Sleeve_Name}}</td>
                                            </tr>
                                            <tr>
                                                <th>Pattern</th>
                                                <td>{{$d->Pattern_Name}}</td>
                                                <th>Collar</th>
                                                <td>{{$d->Collar_Name}}</td>
                                            </tr>
                                            <tr>
                                                <th>Color</th>
                                                <td style="background:{{$d->Material_Color}}" colspan='3'></td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </td>
                                <td><br><br>{{$d->Design_Price}}</td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </td>
        </tr>
    </table>
</form>
@endsection
</body>
</html>