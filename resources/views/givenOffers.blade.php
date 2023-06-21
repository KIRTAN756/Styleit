<!doctype html>
<html lang="en">
  <head>
    <title>Given Offers</title>
  </head>
  <body>
@extends('tailornavbar')
@section('content')
<form>
    <table class="table">
        <tr>
            <td>
                <h3>Given Offer</h3>
            </td>
        </tr>
        <tr>
            <td>
                <div class="scroll">
                    <table class="table">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>User</th>
                                <th>Design</th>
                                <th>Cost</th>
                                <th>Reply</th>
                            </tr>
                        </thead>

                        <tbody>
                            <?php $n = 1;?>
                            @foreach ($offer as $d)
                            <tr>
                                <td><br><br>
                                    <?php echo $n; $n++;?>
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
                                <td><br><br>{{$d->Offer_Price}}</td>
                                @if ($d->Offer_Answer == 'P')
                                    <td><br><br>Pending</td>
                                @elseif ($d->Offer_Answer == 'A')
                                    <td><br><br>Accepted</td>
                                @else
                                    <td><br><br>Rejected</td>
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