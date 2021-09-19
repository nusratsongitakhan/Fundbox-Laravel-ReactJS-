<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $title }} | FundBox</title>
    <link rel="stylesheet" href="{{ asset('/css/pages/signin&signup.css') }}"><!--Header-->
</head>
<body>

<nav aria-label="breadcrumb" class="breadcrumb">
	<div class="">
		<a href="{{URL::to('/')}}" class="text-success">Back Home</a></li>
	</div>
</nav>
<div class="card-content">
    <div class="card-body">
		<div class="alert alert-success alert-dismissible mb-2" role="alert">
			<div class="d-flex align-items-center">
				<i class="bx bx-like"></i>
				<b style="color: red;">
					{{ session()->get('message') }}
				</b>
			</div>
		</div>
	</div>
</div>
<br>

<div class="container" id="container">
	
	<div class="form-container sign-up-container">
		<form action="/SignUp" method="POST">
		@csrf
			<h1>Create Account</h1>
			<span>or use your email for registration</span>
			<input type="text" name="signup_name" placeholder="Full Name" required/>
			<input type="text" name="signup_username" placeholder="Username" required/>
			<input type="email" name="signup_email" placeholder="Email" required/>
			<input type="number" name="signup_phone" placeholder="Phone" required/>
			<input type="password" name="signup_password" placeholder="Password" required/>
			<input type="password" name="signup_con_password" placeholder="Confirm Password" required/>

			<button type="submit">Sign Up</button><br>
			<div class="col s12 m6 offset-m3 center-align">
				<a class="oauth-container btn darken-4 white black-text" href="{{ url('auth/google') }}" style="text-transform:none">
					<div class="left col-md-6">
						<img width="20px"  alt="Google sign-in" src="https://upload.wikimedia.org/wikipedia/commons/thumb/5/53/Google_%22G%22_Logo.svg/512px-Google_%22G%22_Logo.svg.png" />
					</div>
					SignUp with Google
				</a>
			</div>
		</form>
	</div>
	
	<div class="form-container sign-in-container">
		
		<form action="/SignIn" method="POST">
		@csrf
			<h1>Sign in</h1>
			<span>or use your account</span>
			<input type="email" name="login_email" placeholder="Email" required/>
			<input type="password" name="login_password" placeholder="Password" required/>

			<a href="#">Forgot your password?</a>
			<button type="submit">Sign In</button>

			<br>
			<div class="col s12 m6 offset-m3 center-align">
				<a class="oauth-container btn darken-4 white black-text" href="{{ url('auth/google') }}" style="text-transform:none">
					<div class="left col-md-6">
						<img width="20px"  alt="Google sign-in" 
							src="https://upload.wikimedia.org/wikipedia/commons/thumb/5/53/Google_%22G%22_Logo.svg/512px-Google_%22G%22_Logo.svg.png" />
					</div>
					Login with Google
				</a>
			</div>
			<!-- <a href="{{ url('auth/google') }}" style="margin-top: 20px;" class="btn btn-lg btn-success btn-block">
					<strong>Login With Google</strong>
				</a> -->
			
		</form>	
	</div>
	
	<div class="overlay-container">
		<div class="overlay">
			<div class="overlay-panel overlay-left">
				<h1>Welcome Back!</h1>
				<p>To keep connected with us please login with your personal info</p>
				<button class="ghost" id="signIn">Sign In</button>
			</div>
			<div class="overlay-panel overlay-right">
				<h1>Hello, Friend!</h1>
				<p>Enter your personal details and start journey with us</p>
				<button class="ghost" id="signUp">Sign Up</button>
			</div>
		</div>
	</div>

	
</div>
	<script>
		const signUpButton = document.getElementById('signUp');
		const signInButton = document.getElementById('signIn');
		const container = document.getElementById('container');

		signUpButton.addEventListener('click', () => {
			container.classList.add("right-panel-active");
		});

		signInButton.addEventListener('click', () => {
			container.classList.remove("right-panel-active");
		});
	</script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0-beta/js/materialize.min.js"></script>
</footer>
</body>
</html>