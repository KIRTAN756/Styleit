<!doctype html>
<html lang="en">
  <head>
    <title>Password</title>
  </head>
  <body>
@extends('tailornavbar')
@section('content')
<form method='post' action='/updtPwdT'>
    @csrf
    <table class="table">
        <tr>
            <td>
                <h3>Change Password</h3>
            </td>
            <td align='right'>
                <b4-link>
                    <a href="/manageT"><i class="bi-x-square" style='font-size: 30px; color: black;'></i></a>
                </b4-link>
            </td>
        </tr>
        <tr>
            <td colspan='2'>
                <table class="table">
                    <tbody>
                        <tr>
                            <td> 
                                <div class="form-group">
                                  <label>Current Password</label>
                                  <input type="password"
                                    class="form-control" name="cupwd" placeholder="Current" required>
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <td> 
                                <div class="form-group">
                                  <label>New Password</label>
                                  <input type="password"
                                    class="form-control" name="npwd" placeholder="New" required>
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <td> 
                                <div class="form-group">
                                  <label for="">Confirm Password</label>
                                  <input type="password"
                                    class="form-control" name="copwd" placeholder="Confirm" required>
                                </div>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </td>
        </tr>
        <tr>
            <td colspan='2' align='center'>
                <button type="submit" class="btn btn-primary">Update</button>
            </td>
        </tr>
    </table>
</form>
@endsection
</body>
</html>
