<!DOCTYPE html>
<html lang="en">
<head>
	<base href="/public">
	@include('admin.style')

	<style>
		* {
			box-sizing: border-box;
		}

		input[type=text], select, option{
			width: 100%;
			padding: 12px;
			border: 1px solid #ccc;
			border-radius: 4px;
			resize: vertical;
			color: black;
		}

		label {
			padding: 12px 12px 12px 0;
			display: inline-block;
		}

		input[type=submit] {
			background-color: #04AA6D;
			color: white;
			padding: 12px 20px;
			border: none;
			border-radius: 4px;
			cursor: pointer;
			width: 100%;
		}

		input[type=submit]:hover {
			background-color: #45a049;
		}

		.container {
			padding: 20px;
		}

		.col-25 {
			float: left;
			width: 25%;
			margin-top: 6px;
		}

		.col-75 {
			float: left;
			width: 75%;
			margin-top: 6px;
		}

		/* Clear floats after the columns */
		.row:after {
			content: "";
			display: table;
			clear: both;
		}

		/* Responsive layout - when the screen is less than 600px wide, make the two columns stack on top of each other instead of next to each other */
		@media screen and (max-width: 600px) {
			.col-25, .col-75, input[type=submit] {
				width: 100%;
				margin-top: 0;
			}
		}
		.alert {
			padding: 20px;
			background-color: skyblue;
			color: white;
		}

		.closebtn {
			margin-left: 15px;
			color: white;
			font-weight: bold;
			float: right;
			font-size: 22px;
			line-height: 20px;
			cursor: pointer;
			transition: 0.3s;
		}

		.closebtn:hover {
			color: black;
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
					<h1 style="text-align: center; text-decoration: underline; font-size: 50px; margin-bottom: 30px;">Update the Doctor's Info</h1>
					@if(session()->has('message'))
					<div class="alert">
						<span class="closebtn" onclick="this.parentElement.style.display='none';">&times;</span> 
						<strong>Notification: </strong> {{ session()->get('message') }}
					</div>
					@endif
					<form action="{{ url('update_doctor', $doctor->id) }}" method="POST" enctype="multipart/form-data">@csrf
						<div class="row">
							<div class="col-25">
								<label>Doctor Name</label>
							</div>
							<div class="col-75">
								<input type="text" name="ndname" value="{{ $doctor->dname }}">
							</div>
						</div>
						<div class="row">
							<div class="col-25">
								<label>Phone</label>
							</div>
							<div class="col-75">
								<input type="text" name="ndphone" value="{{ $doctor->dphone }}" required>
							</div>
						</div>
						<div class="row">
							<div class="col-25">
								<label>Speciality</label>
							</div>
							<div class="col-75">
								<input type="text" name="ndspeciality" value="{{ $doctor->dspeciality }}" required>
							</div>
						</div>
						<div class="row">
							<div class="col-25">
								<label>Room Number</label>
							</div>
							<div class="col-75">
								<input type="text" name="ndroom" value="{{ $doctor->droom }}" required>
							</div>
						</div>
						<div class="row">
							<div class="col-25">
								<label>Existing Image of Doctor</label>
							</div>
							<div class="col-75">
								<img src="/doctorimage/{{ $doctor->dimage }}">
							</div>
						</div>
						<div class="row">
							<div class="col-25">
								<label>New Image of Doctor (If Applicable)</label>
							</div>
							<div class="col-75">
								<input type="file" name="ndimage">
							</div>
						</div>
						<div class="row">
							<div class="col-25"></div>
							<div class="col-75">
								<input type="submit" value="Update">
							</div>
						</div>
					</form>
				</div>
			</div>
			@include('admin.scripts')
		</body>
		</html>