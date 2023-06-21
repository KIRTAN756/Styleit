@extends('home')
<!doctype html>
<html lang="en">
  <head>
    <title>Designs</title>
  <body>
@section('content')
<form>
    <table class="table">
        <tr>
            <td>
                <h3>Your Design</h3>
            </td>
        </tr>
        <tr>
            <td>
                <div class="scroll">
                    <table class="table">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Measurments Of</th>
                                <th>Material</th>
                                <th>Color</th>
                                <th>Pattern</th>
                                <th>Collar</th>
                                <th>Sleeve</th>
                                <th>Request Status</th>
                                <th>Do</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $n = 1; ?>
                            @foreach ($design as $d)
                            <tr>
                                <td scope="row">
                                    <?php echo $n; $n++; ?>
                                </td>
                                <td>{{$d->M_userName}}</td>
                                <td>{{$d->Material_Name}}</td>
                                <td bgcolor='{{$d->Material_Color}}'></td>
                                <td>{{$d->Pattern_Name}}</td>
                                <td>{{$d->Collar_Name}}</td>
                                <td>{{$d->Sleeve_Name}}</td>
                                @if ($d->Request_Status == "Y")
                                    <td>On</td>
                                    <td>
                                    <a href="stopReq?id={{$d->Design_id}}" class='btn btn-primary'>Stop Receiving Request</a>
                                    </td>
                                @else
                                    <td>Off</td>
                                    <td>
                                        <a href="makeReq?id={{$d->Design_id}}" class='btn btn-primary'>Make Request</a>
                                    </td>
                                @endif
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