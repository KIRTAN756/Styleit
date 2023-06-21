<!doctype html>
<html lang="en">
  <head>
    <title>Add Address</title>
  </head>
  <body>
@extends('home')
@section('content')
<form method='post' action='/addAddress'>
    @csrf
    <table class="table table2">
        <tr>
            <td>
                <h3>Measurments</h3>
            </td>
            <td align='right'>
                <b4-link>
                    <a href="{{ url()->previous() }}"><i class="bi-x-square" style='font-size: 30px; color: black;'></i></a>
                </b4-link>
            </td>
        </tr>
        <tr>
            <td colspan='2'>
                <table class="table">
                    <tbody>
                        <tr>
                            <td>
                                <div class="dropdown form-group">
                                    <label>State</label>
                                    <select class="form-control" required name='state' id="state">
                                        <option disabled selected>--</option>
                                        @foreach ($state as $d)
                                        <option value='{{$d->State_id}}'>{{$d->State_Name}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </td>
                            <td> 
                                <div class="dropdown form-group">
                                    <label>City</label>
                                    <select class="form-control" required name='city' id="city">
                                        <option disabled selected>--</option>
                                    </select>
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <td> 
                                <div class="form-group">
                                  <label for="">Zipcode</label>
                                  <input type="text"
                                    class="form-control" name="zipcode" id='zipcode' maxlength="6" pattern="[0-9]{6}"  placeholder="380018" >
                                </div>
                            </td>
                            <td> 
                                <div class="form-group">
                                  <label for="">Street</label>
                                  <textarea class="form-control" name="street" id="street" placeholder='Saraspur' rows="2"></textarea>
                                </div>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </td>
        </tr>
        <tr>
            <td colspan='2' align='center'>
                <button type="submit" class="btn btn-primary" onclick="return alert('Address Has Been Added')">Add</button>
            </td>
        </tr>
    </table>
</form>
@endsection
  </body>
</html>
<script src="https://code.jquery.com/jquery-3.1.1.min.js"></script>
<script>
    jQuery(document).ready(function(){
        jQuery('#state').change(function(){
            let sid = jQuery(this).val();
            jQuery.ajax({
                type:'POST',
                url:'/getCity',
                data:'sid='+sid+'&_token={{csrf_token()}}',
                success:function(result){
                    jQuery('#city').html(result);
                }
            });
        });
    });
</script>