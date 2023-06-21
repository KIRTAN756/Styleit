<!doctype html>
<html lang="en">
  <head>
    <title>Edit</title>
  </head>
  <body>
@extends('home')
@section('content')
<form method='post' action='/updtMeasurs'>
    @csrf
    <table class="table">
        <tr>
            <td>
                <h3>Edit Measurments</h3>
            </td>
            <td align='right'>
                <b4-link>
                    <a href="{{ url()->previous() }}"><i class="bi-x-square" style='font-size: 30px; color: black;'></i></a>
                </b4-link>
            </td>
        </tr>
        <tr>
            <td colspan="2">
                <div class="scroll">
                    <table class="table">
                        <tbody>
                            <tr>
                                <td>
                                    <div class="form-group">
                                      <label>Name</label>
                                      <input type="text" class="form-control" name="uname" pattern="[A-Za-z]{1,50}" placeholder="User name" value="{{$measurment->M_userName}}" required>
                                      <input type="hidden" class="form-control" name="mid" value="{{$measurment->Measurment_id}}" required>
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <div class="form-group">
                                      <label>Chest</label>
                                      <input type="text"
                                        class="form-control" name="chest" min="1" pattern="\d+(\.\d+)?" placeholder="40.00" value="{{$measurment->M_Chest}}"required>
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <div class="form-group">
                                      <label>Waist</label>
                                      <input type="text"
                                        class="form-control" name="waist" min="1" pattern="\d+(\.\d+)?" placeholder="38.00" value="{{$measurment->M_Waist}}" required>
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <div class="form-group">
                                      <label>Sleeve Length</label>
                                      <input type="text"
                                        class="form-control" name="sleeve" min="1" pattern="\d+(\.\d+)?" placeholder="25.00" value="{{$measurment->M_Sleeve}}" required>
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <div class="form-group">
                                      <label>Shoulder</label>
                                      <input type="text"
                                        class="form-control" name="shoulder" min="1" pattern="\d+(\.\d+)?" placeholder="17.5" value="{{$measurment->M_Shoulder}}" required>
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <div class="form-group">
                                      <label>Neck</label>
                                      <input type="text"
                                        class="form-control" name="neck" min="1" pattern="\d+(\.\d+)?" placeholder="16.50" value="{{$measurment->M_Neck}}" required>
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <div class="form-group">
                                      <label>Length</label>
                                      <input type="text"
                                        class="form-control" name="length" min="1" pattern="\d+(\.\d+)?" placeholder="28.00" value="{{$measurment->M_Length}}" required>
                                    </div>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </td>
        </tr>
        <tr>
            <td colspan='2' align='center'>
                <button type="submit" class="btn btn-primary" onclick="return alert('Measurments Has Been Updated')">Update</button>
            </td>
        </tr>
    </table>
</form>
  @endsection
  </body>
</html>
