<!DOCTYPE html>
<html>
<head>
	
	<title>Send Mail</title>
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
</head>
<body>
	<table class="table table-striped table-dark">
		<tbody>
			<tr>
				<td>Car Name</td>
				<td>{{$operatorname}}</td>
			</tr>
			<tr>
				<td>Bus Type:</td>
				<td>{{$bustype}}</td>
			</tr>
			
			<tr>
				<td>Route:</td>
				<td>{{$from}}-{{$to}}</td>
			</tr>
			<tr>
				<td>Seat No:</td>
				<td>{{$seatno}}</td>
			</tr>
			<tr>
				<td>Total Price:</td>
				<td>{{$price}}</td>
			</tr>
			<tr>
				<td>Dept Date:</td>
				<td>{{$deptdate}} / {{$ctime}}</td>
			</tr>
				
		</tbody>	
	</table>
	
	
</body>
</html>