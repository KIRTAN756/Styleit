<!doctype html>
<html lang="en">
  <head>
    <title>Title</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
  </head>
  <body>
    <form>
        <table class="table">
            <tbody>
                <tr>
                    <td scope="row" align='center'>This Named user already Exist</td>
                </tr>
                <tr>
                    <td align='center'>Register Again With Different Username</td>
                </tr>
                <tr> 
                    <td align='center'>
                        <b4-link>
                            <a href="{{ url()->previous() }}">Register</a>
                        </b4-link>
                    </td>
                </tr>
            </tbody>
        </table>
</form>
</body>
</html>