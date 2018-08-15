<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title>Demo login using ajax and read data from file</title>
	<script src="../PHP1803E/B5/js/jquery-3.3.1.js" type="text/javascript"></script>
	<style type="text/css">
		*{
			margin: 0;
			padding: 0;
		}
		div.container{
			width: 350px;
			margin: auto;
			border: 1px solid #ccc;
			padding: 20px;
			margin-top: 10px;
		}
		div.form input{
			width: 100%;
			height: 20px;
		}
		div.container h3{
			text-align: center;
		}
		button{
			padding: 5px 10px;
		}
		button:hover{
			cursor: pointer;
		}
	</style>

</head>
<body>
	<div class="container">
		<h3>Register User</h3>
		<div class="form">
			<label for="txtemail">Email</label>
			<input type="email" name="txtemail" id="txtemail">
			<br><br>
			<label for="txtpass">Pass</label>
			<input type="password" name="txtpass" id="txtpass">
			<br><br>
			<button type="submit" name="btnRegister" id="btnRegister">Register</button>
		</div>		
	</div>
	<script type="text/javascript" >
		$(function(){
			$('#btnRegister').click(function(){
				let email = $('#txtemail').val().trim();
				let password = $('#txtpass').val().trim();
				if(email===''||password===''){
					alert('vui long nhap email, password');
				}else {
					$.ajax({
						url:'server/login_handle.php',
						type:"POST",
						data:{
							email:email,
							password:password
						},
						success:function(result){
							console.log(result);
							if(result=="true"){
								alert("Dang nhap thanh cong");
								window.location.href="home.php";
							}else {
								alert("Dang nhap ko thanh cong");
							}


						}
					})
				}

			});

		});
	</script>
</body>
</html>