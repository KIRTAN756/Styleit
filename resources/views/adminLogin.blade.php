<!doctype html>
<html lang="en">
  <head>
    <title>Login</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
  </head>
  <body>
      
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <form method='post' action='/logA'>
        @csrf
        <table class="table">
            <tbody>
                <tr align='center'>
                    <td colspan='2'>
                        <h2>Login</h2>
                    </td>
                </tr>
                <tr>
                    <td scope="row" colspan='2'>
                        <div class="form-group">
                          <label>Username</label>
                          <input type="text"
                            class="form-control" name="uname" id="" placeholder="Username">
                        </div>
                    </td>
                </tr>
                <tr>
                    <td scope="row" colspan='2'>
                        <div class="form-group">
                          <label for="">Password</label>
                          <input type="password"
                            class="form-control" name="pwd" id="" placeholder="Password">
                        </div>
                    </td>
                </tr>
                <tr align='center'>
                    <td colspan = '2'>
                        <div class="form-check">
                          <label class="form-check-label">
                            <input type="checkbox" class="form-check-input" name="" id="" value="checkedValue" checked>
                            Remember me
                          </label>
                        </div>
                    </td>
                </tr>
                <tr>
                    <td colspan='2' align='center'>
                        <button type="submit" class="btn btn-primary">Login</button>
                    </td>
                </tr>
            </tbody>
        </table>
</form>
</body>
</html>