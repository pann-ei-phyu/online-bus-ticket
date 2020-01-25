@extends('template')
 @section('content')
	<!-- contact form -->
	<div class="container booking">
		<div class="card my-5 shadow">
			<div class="row">
				<div class="col-12 col-md-6 col-lg-6 d-none d-md-block">
					<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3816.8825615012!2d96.15679624981486!3d16.931084220205175!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x30c1914eb74d34a7%3A0xc749eb9e0fd8f398!2sFamous%20Traveller%20Express!5e0!3m2!1sen!2smm!4v1577418295085!5m2!1sen!2smm" width="100%" height="100%"></iframe>
				</div>
				<div class="col-12 col-md-6 col-lg-6">
					<h3 class="text-center mt-3">Contact Us</h3>
					<form class="form mx-3 mb-5 mt-3" action="{{route('contacts.store')}}" method="POST" enctype="multipart/form-data">
						@csrf
						<div class="form-group">
							<label for="name">Name</label>
							<input type="text" name="name" id="name" required="required" class="form-control">
						</div>
						<div class="form-group">
							<label for="email">Email</label>
							<input type="email" name="email" id="email" required="required" class="form-control">
						</div>
						<div class="form-group">
							<label for="phone">Phone Number</label>
							<input type="text" name="phone" id="phone" required="required" class="form-control">
						</div>
						<div class="form-group">
							<label for="note">Note</label>
							<textarea class="form-control" id="note" required="required" name="note"></textarea>
						</div>
						<div class="form-group">
							<input type="submit" name="submit" class="btn btn-outline-info submit " value="Send" style="width: 100%; height:50px; font-size:20px;">
						</div>
					</form>
				</div>
			</div>
		</div>
	</div>
	<script type="text/javascript">
		$(document).ready(function () {
			$('.submit').click(function () {
				alert('Message Was Send.');
			})
		})
	</script>
@endsection

	