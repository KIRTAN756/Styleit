<!doctype html>
<html lang="en">
  <head>
    <title>Pending Order</title>
  </head>
  <body>
@extends('tailornavbar')
@section('content')
<form>
    <table class="table">
        <tr>
            <td>
                <h3>Pending Order</h3>
            </td>
        </tr>
        <tr>
            <td>
                <div class="scroll">
                    <table class="table">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Name</th>
                                <th>Design</th>
                                <th>Measurment</th>
                                <th>Due Date</th>
                                <th>Order Status</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $n = 1; ?>
                            @foreach ($order as $d)
                                @if ($d->Order_Status == 'P')
                                <tr>
                                    <td><br><br>
                                        <?php echo $n; $n++; ?>
                                    </td>
                                    <td><br><br>{{$d->M_userName}}</td>
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
                                    <td>
                                        <table class="table">
                                            <tbody>
                                                <tr>
                                                    <th>Chest</th>
                                                    <td>{{$d->M_Chest}} cm</td>
                                                    <th>Waist</th>
                                                    <td>{{$d->M_Waist}} cm</td>
                                                </tr>
                                                <tr>
                                                    <th>Sleeve</th>
                                                    <td>{{$d->M_Sleeve}} cm</td>
                                                    <th>Shoulder</th>
                                                    <td>{{$d->M_Shoulder}} cm</td>
                                                </tr>
                                                <tr>
                                                    <th>Neck</th>
                                                    <td>{{$d->M_Neck}} cm</td>
                                                    <th>Length</th>
                                                    <td>{{$d->M_Length}} cm</td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </td>
                                    <td><br><br>Not Stored Yet</td>
                                    <td><br><br>
                                        <a href="finished?id={{$d->Order_id}}" onclick="return alert('Order Has been Finished')" class="btn btn-primary">Finished</a>
                                    </td> 
                                </tr>
                                @else
                                @endif
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