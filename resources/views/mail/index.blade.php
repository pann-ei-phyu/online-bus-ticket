<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<title>Mail</title>
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
</head>
<body>
	<div class="container my-5">
		<h1 class="text-center">Send Mail</h1>
		<div class="row">
			<div class="col-12 col-md-8 offset-md-2">
				<form method="POST" action="{{route ('sendmail')}}">
					@csrf
					<!-- @if(Session::has("success"))
					<div class="alert alert-info">
						Send email is done
					</div>
					@endif -->
					<div class="form-group">
						<label for="subject">Subject</label>
						<input type="text" name="subject" id="subject" class="form-control" required="">
					</div>
					<div class="form-group">
						<label for="email">Email</label>
						<input type="email" name="email" id="email" class="form-control" required="" value=""	>
					</div>
					<div class="form-group">
						<label for="body">Body</label>
						<textarea class="form-control" id="body" name="body" required="">
							
						</textarea>
					</div>
					<div class="form-group">
						<button type="submit" class="btn btn-success">Send Mail</button>
					</div>
				</form>	
			</div>
		</div>	
	</div>
</body>
</html>