<!doctype html>
<html lang="en">
  <head>
    <title>Details</title>
  </head>
  <body>
@extends('tailornavbar')
@section('content')
<form>
    <table class="table">
        <tr>
            <td>
                <h3>Order</h3>
            </td>
            <td align='right'>
                <b4-link>
                    <a href="{{ url()->previous() }}"><i class="bi-x-square" style='font-size: 30px; color: black;'></i></a>
                </b4-link>
            </td>
        </tr>
        <tr>
            <td colspan='2'>
                <div class='scroll'>
                    <table class="table">
                        <tbody>
                            @foreach ($order as $d)
                            <tr>
                                <th>
                                    <h4>Tailor</h4>
                                </th>
                                <td colspan='6'>
                                    {{$d->Tailor_Name}}
                                </td>
                            </tr>
                            <tr>
                                <td colspan='6'>
                                </td>
                            </tr>
                            <tr>
                                <td colspan='6'>
                                    <h4>Design</h4>
                                </td>
                            </tr>
                            <tr>
                                <th>Material Name</th>
                                <td>{{$d->Material_Name}}</td>
                                <th>Material Color</th>
                                <td style="background:{{$d->Material_Color}};" ></td>
                                <td colspan='3'></td>
                            </tr>
                            <tr>
                                <th>Pattern Name</th>
                                <td>{{$d->Pattern_Name}}</td>
                                <th>Collar Name</th>
                                <td colspan='3'>{{$d->Collar_Name}}</td>
                            </tr>
                            <tr>
                                <th>Sleeve Name</th>
                                <td>{{$d->Sleeve_Name}}</td>
                            </tr>
                            <tr>
                                <td colspan='6'>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <h4>Cost</h4>
                                </td>
                                <td colspan='6'>
                                    {{$d->Order_Cost}}
                                </td>
                            </tr>
                            <tr>
                                <td colspan='6'>
                                </td>
                            </tr>
                            <tr>
                                <td colspan='6'>
                                    <h4>Measurment</h4>
                                </td>
                            </tr>
                            <tr>
                                <th>Name</th>
                                <td>{{$d->M_userName}}</td>
                            </tr>
                            <tr>
                                <th>Chest</th>
                                <td>{{$d->M_Chest}}</td>
                                <th>Waist</th>
                                <td>{{$d->M_Waist}}</td>
                                <th>Sleeve</th>
                                <td>{{$d->M_Sleeve}}</td>
                            </tr>
                            <tr>
                                <th>Shoulder</th>
                                <td>{{$d->M_Shoulder}}</td>
                                <th>Neck</th>
                                <td>{{$d->M_Neck}}</td>
                                <th>Length</th>
                                <td>{{$d->M_Length}}</td>
                            </tr>
                            <tr>
                                <td colspan='6'>
                                </td>
                            </tr>
                            <tr>
                                <td colspan='6'>
                                    <h4>Address</h4>
                                </td>
                                <tr>
                                    <th>State</th>
                                    <td>{{$d->Address_State}}</td>
                                    <th>City</th>
                                    <td colspan='3'>{{$d->Address_City}}</td>
                                </tr>
                                <tr>
                                    <th>Zipcode</th>
                                    <td>{{$d->Address_Zipcode}}</td>
                                    <th>Street</th>
                                    <td colspan='3'>{{$d->Address_Street}}</td>
                                </tr>
                            </tr>
                            <tr>
                                <td colspan='6'>
                                </td>
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