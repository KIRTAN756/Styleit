<!doctype html>
<html lang="en">
  <head>
    <title>Measurments</title>
  </head>
  <body>
@extends('home')
@section('content')
<table class="table">
    <tr>
        <td>
            <h3>Measurments</h3>
        </td>
    </tr>
    <tr>
        <td>
            <div class="scroll">
                <table class="table">
                   <thead>
                        <tr align="center">
	                	    <th>No</th>
	                	    <th>Name</th>
	                	    <th>Chest</th>
	                	    <th>Waist</th>
	                	    <th>Sleeve Length</th>
	                	    <th>Shoulder</th>
	                	    <th>Neck</th>
	                	    <th>Length</th>
	                	    <th>Edit</th>
	                	    <th>Delete</th>
	                	</tr>
                    </thead>
                    <tbody>
                        <?php
                            $n = 1;
                        ?>
                        @foreach ($measurment as $d)

                        <tr align="center">
                            <td>
                                <?php 
                                    echo $n;
                                    $n++;
                                ?>
                            </td>
                            <td>{{$d->M_userName}}</td>
                            <td>{{$d->M_Chest}} cm</td>
                            <td>{{$d->M_Waist}} cm</td>
                            <td>{{$d->M_Sleeve}} cm</td>
                            <td>{{$d->M_Shoulder}} cm</td>
                            <td>{{$d->M_Neck}} cm</td>
                            <td>{{$d->M_Length}} cm</td>
                            <td>
                                <b4-link>
                                    <a href="editMeasur?id={{$d->Measurment_id}}">Edit</a>
                                </b4-link>
                            </td>
                            <td>
                                <b4-link>
                                    <a href="delMeasur?id={{$d->Measurment_id}}" onclick="return confirm('Are you sure you want to Delete?')">Delete</a>
                                </b4-link>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </td>
    </tr>
    <tr>
        <td align='center'>
            <b4-link>
                <a href="addMeas" class="btn btn-primary"> Add New Measurment</a>
            </b4-link>    
        </td>    
    </tr>
</table>
@endsection
  </body>
</html>
