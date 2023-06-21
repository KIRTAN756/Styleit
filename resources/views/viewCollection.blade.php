<!doctype html>
<html lang="en">
  <head>
    <title>Collection</title>
  </head>
  <body>
@extends('home')
@section('content')
<form>
    <table class="table">
        <tr>
            <td>
                <h3>Collection</h3>
            </td>
        </tr>
        <tr>
            <td>
                <div class="scroll">
                    <table class="table">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Tailor</th>
                                <th>Collection</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $n = 1; ?>
                            @foreach ($address as $a)
                                @foreach ($tailor as $d)
                                    @if($a->Address_State == $d->Address_State && $a->Address_City == $d->Address_City)
                                        <tr>
                                            <td>
                                                <?php echo $n; $n++;?>
                                            </td>
                                            <td>{{$d->Tailor_Name}}</td>
                                            <td>
                                                <a href="#">View Collection</a>
                                            </td>
                                        </tr>
                                    @endif
                                @endforeach
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
</html>