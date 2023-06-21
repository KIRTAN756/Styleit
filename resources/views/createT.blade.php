<!doctype html>
<html lang="en">
  <head>
    <title>Create</title>
  </head>
  <body>
@extends('tailornavbar')
@section('content')
<form method='post' action='addDesignT'>
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
                                    class="form-control form-control-color" name="cname" value='#102d5b'>
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
                                    <label>Price</label>
                                    <input type="text"
                                        class="form-control" name="price" pattern="[0-9]{1,5}" placeholder="1500" required>
                                </div>
                            </td>
                        </tr>
                        
                    </table>
                </div>
            </td>
        </tr>
        <tr>
            <td align='center'>
                <button type="submit" class="btn btn-primary" onclick="return alert('Design Has Been Added')">Add To Collection</button>
            </td>
        </tr>
    </table>
</form>
@endsection
</body>
</html>
