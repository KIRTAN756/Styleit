<!doctype html>
<html lang="en">
  <head>
    <title>Tailor</title>
  </head>
  <body>
@extends('home')
@section('content')
<form>
<table class="table">
        <tr>
            <td>
                <h3>Tailor Profile</h3>
            </td>
            <td align='right'>
                <b4-link>
                    <a href="{{ url()->previous() }}"><i class="bi-x-square" style='font-size: 30px; color: black;'></i></a>
                </b4-link>
            </td>
        </tr>
        <tr>
            <td colspan='2'>
                <div class="scroll">
                    <table class="table">
                        <tbody>
                            <tr>
    	                	    <td>
                                    <h3>{{$tailor->Tailor_userName}}</h3>
                                </td>
    	                	</tr>
                            <tr>
                                <td> 
                                    <div class="form-group">
                                      <label for="">Full Name</label>
                                      <input type="text"
                                        class="form-control" name="fname" id='fname' disabled placeholder="Kirtan" value="{{$tailor->Tailor_Name}}">
                                    </div>
                                </td>
                                <td> 
                                    <div class="form-group">
                                      <label for="">Email</label>
                                      <input type="email"
                                        class="form-control" name="email" id='email' disabled placeholder="something@gmail.com" value="{{$tailor->Tailor_Email}}">
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <div class="form-group">
                                      <label>Mobile No</label>
                                      <input type="text"
                                        class="form-control" pattern=[0-9]{10} name="mobno" id="mobno" maxlength="10" disabled placeholder="Mobile Number" value="{{$tailor->Tailor_MobileNo}}">
                                    </div>
                                </td>
                                <td>
                                    <div class="form-group">
                                      <label>Tailor Org</label>
                                      <input type="text"
                                        class="form-control" name="org" id="org" disabled placeholder="Raymond" value="{{$tailor->Tailor_Org}}">
                                    </div>
                                </td>
                            </tr>
                            <?php
                              $n = 1;
                              $n1 = 0;
                            ?>
                            @foreach ($address as $d1)
                            <tr>
                                <td>
                                    <h3>
                                        <?php
                                            echo "Address ".$n;
                                            $n++;
                                        ?>
                                    </h3>
                                </td>
                            </tr>
                            <tr>
                                <td> 
                                    <div class="form-group">
                                      <label for="">City</label>
                                      <input type="text"
                                        class="form-control" name="city[]" id='city[{{$d1->Address_id}}]' disabled placeholder="Ahmedabad" value="{{$d1->Address_City}}">
                                        <div class="form-group">
                                          <input type="hidden"
                                            class="form-control" name="aid[]" id="aid<%: d1->Address_id%>" value="{{$d1->Address_id}}">
                                        </div>
                                    </div>
                                </td>
                                <td> 
                                    <div class="form-group">
                                      <label for="">State</label>
                                      <input type="text"
                                        class="form-control" name="state[]" id='state[{{$d1->Address_id}}]' disabled placeholder="Gujarat" value="{{$d1->Address_State}}">
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td> 
                                    <div class="form-group">
                                      <label for="">Zipcode</label>
                                      <input type="text"
                                        class="form-control" name="zipcode[]" id='zipcode[{{$d1->Address_id}}]' disabled maxlength="6" pattern="[0-9]{6}"  placeholder="Zipcode" value="{{$d1->Address_Zipcode}}">
                                    </div>
                                </td>
                                <td> 
                                    <div class="form-group">
                                        <label for="">Street</label>
                                        <textarea class="form-control" name="street[]" id="street[{{$d1->Address_id}}]" disabled placeholder='Saraspur'  rows="2">{{$d1->Address_Street}}</textarea>
                                    </div>
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
</heml>