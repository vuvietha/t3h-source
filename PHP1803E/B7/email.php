<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title>Demo email php</title>
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css">
	<style type="text/css">
		form{
			padding: 12px;
			border: 1px solid #ccc;
			margin-top: 10px;
		}
		
	</style>

</head>
<body>
	<div class="container">
		<div class="row">
			<div class="col-md-6 offset-md-3">
				<form action="server/sendmail.php" method="POST">
					<div class="form-group">
						<label for="txtEmail">Email address</label>
						<input type="email" class="form-control" id="txtEmail" name="txtEmail">					
					</div>
					<div class="form-group">
						<label for="txtSubject">Subject</label>
						<input type="text" class="form-control" id="txtSubject" name ="txtSubject">
					</div>
					<div class="form-group">
						<label for="txtContent">Content</label>
						 <textarea class="form-control" id="txtContent" name="txtContent" rows="8"></textarea>
					</div>
					<button type="submit" name="btnSendMail" class="btn btn-primary">Send mail</button>
				</form>
			</div>
			
		</div>
		
		
	</div>
</body>
</html>