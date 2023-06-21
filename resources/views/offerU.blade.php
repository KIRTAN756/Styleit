<!doctype html>
<html lang="en">
  <head>
    <title>Offers</title>
  </head>
  <body>
@extends('home')
@section('content')
<form>
    <table class="table">
        <tr>
            <td>
                <h3>Offers</h3>
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
                                <th>Cost</th>
                                <th>Offer</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $n = 1; ?>
                            @foreach ($offer as $d)
                                @if ($d->Offer_Answer == 'P')
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
                                                    <a href="/viewOffersU/viewTailor?id={{$d->Tailor_id}}" class="card-link">    
                                                        <h4 class="card-title">{{$d->Tailor_Name}}</h4>
                                                    </a>
                                                    <p class="card-text">Organization: {{$d->Tailor_Org}}</p>
                                                </div>
                                            </div>
                                        </td>
                                        <td><br><br>{{$d->Offer_Price}}</td>
                                        <td><br><br>
                                            <a href="acceptOffer?oid={{$d->Offer_id}}&tid={{$d->Tailor_id}}&cost={{$d->Offer_Price}}&did={{$d->Design_id}}&mid={{$d->Measurment_id}}&aid={{$d->Address_id}}" class="btn btn-primary"><i class="bi-check-square size"></i></a>
                                            <a href="rejectOffer?oid={{$d->Offer_id}}" class="btn btn-primary" onclick="return confirm('Are you sure you want to reject?')"><i class="bi-x-square size"></i></a>
                                        </td>
                                    </tr>
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