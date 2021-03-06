<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title>Login Admin</title>
	<link rel="stylesheet" href="{{ asset('css/admin/bootstrap.min.css') }}">
	<style type="text/css">
		form{
			border: 1px solid #ccc;
			padding: 10px;
			margin-top: 20px;
			border-radius: 5px;
		}
		
	</style>
</head>
<body>
	<div class="container">
		<div class="row">
			<div class="col-lg-6 offset-3">
				<form action="{{ route('admin.handleLogin') }}" method="POST">
					  @csrf
					<div class="form-group">
						<label for="txtEmail">@lang('loginlang.email')</label>
						<input type="email" class="form-control" id="txtEmail" name="txtEmail" placeholder="Enter email">	
					</div>
					<div class="form-group">
						<label for="txtPass">@lang('loginlang.password')</label>
						<input type="password" class="form-control" id="txtPass" name="txtPass" placeholder="Password">
					</div>					
					<button type="submit" class="btn btn-primary">@lang('loginlang.login')</button>
					<a class="nav-link" href="{{ route('language',['lang' => 'en']) }}">English</a>
					<a class="nav-link" href="{{ route('language',['lang' => 'vi']) }}">Vietnamese</a>
				</form>
			</div>
			
		</div>
		
	</div>
</body>
</html>