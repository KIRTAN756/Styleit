<!doctype html>
<html lang="en">
  <head>
    <title>Profile</title>
  </head>
  <body>
@extends('tailornavbar')
@section('content')
<form method='post' action='/updtProfileT'>
    @csrf
    <table class="table table2">
        <tr>
            <td colspan='2'>
                <h3>Mange Account</h3>
            </td>
        </tr>
        <tr>
            <td colspan='2'>
                <table class="table">
                    <tbody>
                        @foreach($personal as $d)
                        <tr>
    	            	    <td>
                                <h3>{{$d->Tailor_userName}}</h3>
                            </td>
    	            	    <td align='right'>
                                <b4-link>
                                    <a href="#" onclick=enable() class="btn btn-primary"><i class="bi-pencil-square"></i> Edit</a>
                                </b4-link>
                            </td>
    	            	</tr>
                        <tr>
                            <td> 
                                <div class="form-group">
                                  <label for="">Full Name</label>
                                  <input type="text"
                                    class="form-control" name="fname" id='fname' disabled placeholder="Kirtan" value="{{$d->Tailor_Name}}">
                                </div>
                            </td>
                            <td> 
                                <div class="form-group">
                                  <label for="">Email</label>
                                  <input type="email"
                                    class="form-control" name="email" id='email' disabled placeholder="something@gmail.com" value="{{$d->Tailor_Email}}">
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <div class="form-group">
                                  <label>Mobile No</label>
                                  <input type="text"
                                    class="form-control" pattern=[0-9]{10} name="mobno" id="mobno" maxlength="10" disabled placeholder="Mobile Number" value="{{$d->Tailor_MobileNo}}">
                                </div>
                            </td>
                            <td>
                                <div class="form-group">
                                  <label>Tailor Org</label>
                                  <input type="text"
                                    class="form-control" name="org" id="org" disabled placeholder="Raymond" value="{{$d->Tailor_Org}}">
                                </div>
                            </td>
                        </tr>
                        @endforeach
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
                            <td align='right'>
                                <b4-link>
                                    <a href="delAddressT?id={{$d1->Address_id}}" onclick="return confirm('Are you sure you want to Delete?')">Delete</a>
                                </b4-link>
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
            </td>
        </tr>
        <tr>
            <td colspan='2'>
                <b4-link>
                    <a href="addressT" class="btn btn-primary"> Add New Address</a>
                </b4-link>    
            </td>    
        </tr>
        <tr>
            @foreach ($personal as $d)
            <td> 
                <div class="form-group">
                  <label for="">Username</label>
                  <input type="text"
                    class="form-control" name="uname" id='uname' disabled placeholder="Username" value="{{$d->Tailor_userName}}">
                </div>
            </td>
            @endforeach
            <td align='center' class="form-group">
                <b4-link>
                    <a href="changeT" style="font-size: 30px;">Change Password</a>
                </b4-link>
            </td>
        </tr>
        <tr>
            <td colspan='2' align='center'>
                <button type="submit" class="btn btn-primary" id='updt' disabled onclick="return alert('Profile Has Been Updated')">Update</button>  
            </td>    
        </tr>
    </table>
</form>
@endsection
  </body>
</html>

<script>
function enable() {
    if(document.getElementById("fname").disabled){
        document.getElementById("fname").disabled = false;
        document.getElementById("uname").disabled = false;
        document.getElementById("email").disabled = false;
        document.getElementById("mobno").disabled = false;
        document.getElementById("org").disabled = false;
        var elems = document.querySelectorAll('[id^="city"]');
        var elems1 = document.querySelectorAll('[id^="state"]');
        var elems2 = document.querySelectorAll('[id^="zipcode"]');
        var elems3 = document.querySelectorAll('[id^="street"]');
        for (var i = 0; i < elems.length; i++) {
            elems[i].disabled = false;
            elems1[i].disabled = false;
            elems2[i].disabled = false;
            elems3[i].disabled = false;
        }
        document.getElementById("updt").disabled = false;
    }
    else{
        document.getElementById("fname").disabled = true;
        document.getElementById("email").disabled = true;
        document.getElementById("mobno").disabled = true;
        document.getElementById("uname").disabled = true;
        document.getElementById("org").disabled = true;
        var elems = document.querySelectorAll('[id^="city"]');
        var elems1 = document.querySelectorAll('[id^="state"]');
        var elems2 = document.querySelectorAll('[id^="zipcode"]');
        var elems3 = document.querySelectorAll('[id^="street"]');
        for (var i = 0; i < elems.length; i++) {
            elems[i].disabled = true;
            elems1[i].disabled = true;
            elems2[i].disabled = true;
            elems3[i].disabled = true;
        }
        document.getElementById("updt").disabled = true;
    }
}
</script>    