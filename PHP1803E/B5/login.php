<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title>DEMO LOGIN AJAX</title>
	<script src="js/jquery-3.3.1.js" type="text/javascript"> </script>
	<style type="text/css">
		*{
			margin: 0;
			padding: 0;
		}
		.form-login{
			width: 350px;
			margin: 5px auto;
			padding: 10px;
			border: 1px solid pink;
			border-radius: 3px;
		}
		.form-group{
			width: 100%;
			display: block;
			margin: 10px 0px;
		}
		input{
			width: 100%;
			padding: 3px;
			border: 1px solid #ccc;
			border-radius: 3px;
			height: 22px;
		}
		button{
			padding: 5px 15px;
			margin-top: 10px;
		}
		button:hover{
			cursor: pointer;
		}
	</style>
</head>
<body>
	<div class="form-login">
		<div class="form-group">
			<label for="txtUser">Username:</label>
			<input type="text" name="txtUser" id="txtUser" placeholder="username">						
		</div>
		<div class="form-group">
			<label for="txtPass">Password:</label>
			<input type="password" name="txtPass" id="txtPass" placeholder="password">
		</div>
		<button type="button" class="btn-login">Login</button>
		
	</div>
	<script type="text/javascript">
		$(function(){
			$('button[type="button"]').click(function(){
				let user = $('#txtUser').val().trim();
				let pass = $('#txtPass').val().trim();
				if(user==''||pass==''){
					alert("Enter data, please");
				}else{
					$.ajax({
						url:"server/handle_login.php",
						type:"POST",
						data:{user:user,pass:pass},
						beforeSend:function(){
							$('button[type="button"]').text('Loading...!');
						},
						success:function(data){
							$('button[type="button"]').text('Login');
							data = $.trim(data);
							if(data==='OK'){
								window.location.href = 'home.php';
							}else{
								alert('dang nhap khong thanh cong');
							}

						}
					})

				}

			});
		})
	</script>
</body>
</html>