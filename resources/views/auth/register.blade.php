<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="{{ asset('backend/images/favicon.ico') }}">

    <title>LASMS - Registration </title>

	<!-- Vendors Style-->
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css" integrity="sha384-xOolHFLEh07PJGoPkLv1IbcEPTNtaed2xpHsD9ESMhqIYd0nLMwNLD69Npy4HI+N" crossorigin="anonymous">

	<link rel="stylesheet" href="{{ asset('backend/css/vendors_css.css') }}">

	<!-- Style-->
    <link rel="stylesheet" href=" https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css">

    <link rel="stylesheet" href=" https://cdn.jsdelivr.net/gh/lykmapipo/themify-icons@0.1.2/css/themify-icons.css">

	<link rel="stylesheet" href="{{asset ('backend/css/vendors_css.css') }}">

	<!-- Style-->
	<link rel="stylesheet" href="{{asset ('backend/css/style.css') }}">
	<link rel="stylesheet" href="{{asset ('backend/css/skin_color.css') }}">

</head>

<body class="hold-transition theme-primary bg-gradient-primary">

	<div class="container h-p100">
		<div class="row align-items-center justify-content-md-center h-p100">

			<div class="col-12">
				<div class="row justify-content-center no-gutters">
					<div class="col-lg-4 col-md-5 col-12">
						<div class="content-top-agile p-10">
							<h2 class="text-white">Get started</h2>
							<p class="text-white-50">Register new account</p>
						</div>
						<div class="p-30 rounded30 box-shadowed b-2 b-dashed">


                        <form method="POST" action="{{ route('register') }}">
                                @csrf
								<div class="form-group">
									<div class="input-group mb-3">
										<div class="input-group-prepend">
											<span class="input-group-text bg-transparent text-white"><i class="ti-user"></i></span>
										</div>
										<input id="name" type="text" name="name" class="form-control pl-15 bg-transparent text-white plc-white" placeholder="Full Name">
									</div>
								</div>
								<div class="form-group">
									<div class="input-group mb-3">
										<div class="input-group-prepend">
											<span class="input-group-text bg-transparent text-white"><i class="ti-email"></i></span>
										</div>
										<input id="email" type="email" name="email" class="form-control pl-15 bg-transparent text-white plc-white" placeholder="Email">
									</div>
								</div>
								<div class="form-group">
									<div class="input-group mb-3">
										<div class="input-group-prepend">
											<span class="input-group-text bg-transparent text-white"><i class="ti-lock"></i></span>
										</div>
										<input id="password" type="password" name="password" class="form-control pl-15 bg-transparent text-white plc-white" placeholder="Password">
									</div>
								</div>
								<div class="form-group">
									<div class="input-group mb-3">
										<div class="input-group-prepend">
											<span class="input-group-text bg-transparent text-white"><i class="ti-lock"></i></span>
										</div>
										<input id="password_confirmation" type="password" name="password_confirmation" class="form-control pl-15 bg-transparent text-white plc-white" placeholder="Retype Password">
									</div>
								</div>
								  <div class="row">
									<div class="col-12">
									  <div class="checkbox text-white">
										<input type="checkbox" id="basic_checkbox_1" >
										<label for="basic_checkbox_1">I agree to the <a href="#" class="text-warning"><b>Terms</b></a></label>
									  </div>
									</div>
									<!-- /.col -->
									<div class="col-12 text-center">
									  <button type="submit" class="btn btn-info btn-rounded mt-10">SIGN UP</button>
									</div>
									<!-- /.col -->
								  </div>
							</form>

							<div class="text-center">
								<p class="mt-15 mb-0 text-white">Already have an account?<a href="{{ route('login') }}" class="text-danger ml-5"> Sign In</a></p>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>


	<!-- Vendor JS -->
	<script src="{{asset ('backend/js/vendors.min.js') }}"></script>
    <script src="{{ asset('../assets/icons/feather-icons/feather.min.js') }}"></script>


</body>
</html>
