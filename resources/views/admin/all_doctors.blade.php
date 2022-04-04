<!DOCTYPE html>
<html lang="en">
<head>
	@include('admin.style')
	<style>
		table {
			border-collapse: collapse;
			width: 100%;
			margin: auto;
			padding: 50px;
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
				<h1 style="text-align: center; text-decoration: underline; font-size: 50px; margin-bottom: 30px;">All Doctors</h1>

				<table>
					<tr>
						<th>Doctor Name</th>
						<th>Phone</th>
						<th>Speciality</th>
						<th>Room No</th>
						<th>Image</th>
						<th>Delete</th>
						<th>Update</th>
					</tr>
					@foreach($doctors as $doctor)
					<tr>
						<td>{{ $doctor->dname }}</td>
						<td>{{ $doctor->dphone }}</td>
						<td>{{ $doctor->dspeciality }}</td>
						<td>{{ $doctor->droom }}</td>
						<td><img src="/doctorimage/{{ $doctor->dimage }}" style="height:100px; width:100px; margin:auto;"></td>
						<td><a class="btn btn-danger" href="{{ url('doctor_delete',$doctor->id) }}" onclick="return confirm('Are you sure to delete the doctor from the system?')">Delete</a></td>
						<td><a class="btn btn-primary" href="{{ url('doctor_update',$doctor->id) }}">Update</a></td>
					</tr>
					@endforeach

				</table>
			</div>
		</div>
		@include('admin.scripts')
	</body>
	</html>