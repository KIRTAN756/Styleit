<!doctype html>
<html lang="en">
  <head>
    <title>Offers</title>
  </head>
  <body>
@extends('tailornavbar')
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
                                <th>Material</th>
                                <th>Color</th>
                                <th>Pattern</th>
                                <th>Collar</th>
                                <th>Sleeve</th>
                                <th>Detail</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php 
                                $n = 1;
                            ?>
                            @foreach ($address as $a)
                                @foreach ($design as $d)
                                    @if ($a->Address_State == $d->Address_State && $a->Address_City == $d->Address_City)
                                        <tr>
                                            <td scope="row">
                                                <?php echo $n; $n++; ?>
                                            </td>
                                            <td>{{$d->M_userName}}</td>
                                            <td>{{$d->Material_Name}}</td>
                                            <td style="background: {{$d->Material_Color}}"></td>
                                            <td>{{$d->Pattern_Name}}</td>
                                            <td>{{$d->Collar_Name}}</td>
                                            <td>{{$d->Sleeve_Name}}</td>
                                            <td>
                                                <a href="/offersT/giveOffer?id={{$d->Design_id}}">View Detail</a>
                                            </td>
                                        </tr>
                                    @else    
                                    @endif
                                @endforeach
                                @break
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