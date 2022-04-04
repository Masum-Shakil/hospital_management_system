<!DOCTYPE html>
<html lang="en">
<head>
	@include('admin.style')
	<style>
		table {
			border-collapse: collapse;
			margin: auto;
			padding: 50px;
			width: 50%;
		}

		th, td {
			padding: 8px;
			text-align: center;
			border: 1px solid #ddd;
		}

		tr:hover {background-color: lightpink;}
	</style>
</head>
<body>
	<div class="container-scroller">
		<div class="row p-0 m-0 proBanner" id="proBanner">
			<div class="col-md-12 p-0 m-0">
				<div class="card-body card-body-padding d-flex align-items-center justify-content-between">
					<div class="ps-lg-1">
						<div class="d-flex align-items-center justify-content-between">
							<p class="mb-0 font-weight-medium me-3 buy-now-text">Free 24/7 customer support, updates, and more with this template!</p>
							<a href="https://www.bootstrapdash.com/product/corona-free/?utm_source=organic&utm_medium=banner&utm_campaign=buynow_demo" target="_blank" class="btn me-2 buy-now-btn border-0">Get Pro</a>
						</div>
					</div>
					<div class="d-flex align-items-center justify-content-between">
						<a href="https://www.bootstrapdash.com/product/corona-free/"><i class="mdi mdi-home me-3 text-white"></i></a>
						<button id="bannerClose" class="btn border-0 p-0">
							<i class="mdi mdi-close text-white me-0"></i>
						</button>
					</div>
				</div>
			</div>
		</div>
		@include('admin.side')
		@include('admin.nav')
		<div class="container-fluid page-body-wrapper">
			<div class="container">
				<h1 style="text-align: center; text-decoration: underline; font-size: 50px; margin-bottom: 30px;">Appointments</h1>

				<table>
					<tr>
						<th style="width:10%;">Patient Name</th>
						<th style="width:10%;">Email</th>
						<th style="width:10%;">Phone</th>
						<th style="width:10%;">Doctor Name</th>
						<th style="width:10%;">Date</th>
						<th style="width:10%;">Message</th>
						<th style="width:10%;">Status</th>
						<th style="width:10%;">Approve</th>
						<th style="width:10%;">Cancel</th>
						<th style="width:10%;">Send Mail</th>
					</tr>
					@foreach($appointments as $appointment)
					<tr>
						<td>{{ $appointment->name }}</td>
						<td>{{ $appointment->email }}</td>
						<td>{{ $appointment->phone }}</td>
						<td>{{ $appointment->doctor_selected }}</td>
						<td>{{ $appointment->date }}</td>
						<td>{{ $appointment->message }}</td>
						<td>{{ $appointment->status }}</td>
						<td><a class="btn btn-success" href="{{ url('appointment_approve',$appointment->id) }}">Approve</a></td>
						<td><a class="btn btn-danger" href="{{ url('appointment_cancel',$appointment->id) }}">Cancel</a></td>
						<td><a class="btn btn-primary" href="{{ url('email_view',$appointment->id) }}">Send Mail</a></td>
					</tr>
					@endforeach

				</table>
			</div>
		</div>
		@include('admin.scripts')
	</body>
	</html>