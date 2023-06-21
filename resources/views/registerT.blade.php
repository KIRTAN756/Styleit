<!doctype html>
<html lang="en">
  <head>
    <title>Register</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
  </head>
  <body> 
   <form method ='post' action='/regt'>
    @csrf
        <table class="table">
            <tbody>
                <tr align='center'>
                    <td colspan='2'>
                        <h2>Register As Tailor</h2>
                    </td>
                </tr>
                <tr>
                    <td scope="row" colspan='2'>
                        <div class="form-group">
                          <label>Full Name</label>
                          <input type="text"
                            class="form-control" name="fname" placeholder="Full Name" Required>
                        </div>
                    </td>
                </tr>
                <tr>
                    <td>
                        <div class="form-group">
                          <label>Mobile No</label>
                          <input type="text"
                            class="form-control" pattern=[0-9]{10} name="mobno" maxlength="10" placeholder="Mobile Number" Required>
                        </div>
                    </td>
                    <td>
                        <div class="form-group">
                          <label>Email</label>
                          <input type="email"
                            class="form-control" name="email" placeholder="something@gmail.com" Required>
                        </div>
                    </td>
                </tr>
                <tr>
                    <td scope="row" colspan='2'>
                        <div class="form-group">
                          <label>Organization</label>
                          <input type="text"
                            class="form-control" name="org" placeholder="Raymond" Required>
                        </div>
                    </td>
                </tr>
                <tr>
                    <td scope="row" colspan='2'>
                        <div class="form-group">
                          <label>Username</label>
                          <input type="text"
                            class="form-control" name="uname" id="" placeholder="Username" Required>
                        </div>
                    </td>
                </tr>
                <tr>
                    <td scope="row">
                        <div class="form-group">
                          <label for="">Password</label>
                          <input type="password"
                            class="form-control" name="pwd" id="" placeholder="Password" Required>
                        </div>
                    </td>
                    <td scope="row">
                        <div class="form-group">
                          <label for="">Confirm Password</label>
                          <input type="password"
                            class="form-control" name="pwdc" id="" placeholder="Confirm" Required>
                        </div>
                    </td>
                </tr>
                <tr align='center'>
                    <td colspan='2'>
                        <b4-link>
                            <a href="tailor">Login</a>
                        </b4-link>
                    </td>
                </tr>
                <tr>
                    <td colspan='2' align='center'>
                        <button type="submit" class="btn btn-primary">Register</button>
                    </td>
                </tr>
            </tbody>
        </table>
   </form>
</body>
</html>