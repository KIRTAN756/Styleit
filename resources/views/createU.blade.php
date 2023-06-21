<!doctype html>
<html lang="en">
  <head>
    <title>Create</title>
  </head>
  <body>

@extends('home')
@section('content')
<form method='post' action='/addDesign'>
    @csrf
    <table class="table">
        <tr>
            <td>
                <h3>Create Design</h3>
            </td>
        </tr>
        <tr>
            <td>
                <div class='scroll'>
                    <table class="table">
                        <tr>
                            <td>
                                <div class="dropdown form-group">
                                    <label>Material</label>
                                    <select class="form-control" required name='material'>
                                        <option disabled selected>--</option>
                                        @foreach ($material as $d)
                                        <option value='{{$d->Material_Name}}'>{{$d->Material_Name}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <div class="form-group">
                                  <label>Material Color</label>
                                  <input type="color"
                                    class="form-control form-control-color" name="cname" required value='#102d5b'>
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <div class="dropdown form-group">
                                    <label>Pattern</label>
                                    <select class="form-control" required name='pattern'>
                                        <option disabled selected>--</option>
                                        @foreach ($pattern as $d)
                                        <option value='{{$d->Pattern_Name}}'>{{$d->Pattern_Name}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <div class="dropdown form-group">
                                    <label>Collar</label>
                                    <select class="form-control" required name='collar'>
                                        <option disabled selected>--</option>
                                        @foreach ($collar as $d)
                                        <option value='{{$d->Collar_Name}}'>{{$d->Collar_Name}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <div class="dropdown form-group">
                                    <label>Sleeve</label>
                                    <select class="form-control" required name='sleeve'>
                                        <option disabled selected>--</option>
                                        @foreach ($sleeve as $d)
                                        <option value='{{$d->Sleeve_Name}}'>{{$d->Sleeve_Name}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <div class="dropdown form-group">
                                    <label>Measurment</label>
                                    <select class="form-control" required name='measurment'>
                                        <option disabled selected>--</option>
                                        @foreach ($measurment as $d)
                                        <option value='{{$d->Measurment_id}}'>{{$d->M_userName}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <div class="dropdown form-group">
                                    <label>Address</label>
                                    <select class="form-control" required name='address'>
                                        <option disabled selected>--</option>
                                        <?php $n = 1;?>
                                        @foreach ($address as $d)
                                        <option value='{{$d->Address_id}}'><?php echo $n; $n++;?> - {{$d->Address_State}} , {{$d->Address_City}} , {{$d->Address_Street}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </td>
                        </tr> 
                    </table>
                </div>
            </td>
        </tr>
        <tr>
            <td align='center'>
                <button type="submit" class="btn btn-primary" onclick="return alert('Design Has Been Added')">Create</button>
            </td>
        </tr>
    </table>
</form>
@endsection
</body>
</html>