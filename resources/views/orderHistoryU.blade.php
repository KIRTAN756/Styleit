<!doctype html>
<html lang="en">
  <head>
    <title>Order History</title>
  </head>
  <body>
@extends('home')
@section('content')
<form>
    <table class="table">
        <tr>
            <td>
                <h3>Order History</h3>
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
                                <th>Tailor</th>
                                <th>Details</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $n = 1; ?>
                            @foreach ($order as $d)
                                @if ($d->Order_Status == 'F')
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
                                    <td><br>
                                        <div class="card">
                                            <div class="card-body">
                                                <a href="/orderHistoryU/viewTailor?id={{$d->Tailor_id}}" class="card-link">    
                                                    <h4 class="card-title">{{$d->Tailor_Name}}</h4>
                                                </a>
                                                <p class="card-text">Organization: {{$d->Tailor_Org}}</p>
                                            </div>
                                        </div>
                                    </td>
                                    <td><br><br>
                                        <a href="/orderHistoryU/viewDetail?id={{$d->Order_id}}">View Details</a>
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