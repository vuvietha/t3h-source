<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title>BT PHP 01 - GIAI PT BAC HAI</title>
	<script src="../PHP1803E/B5/js/jquery-3.3.1.js" type="text/javascript"></script>
	<style type="text/css">
	*{
		padding: 0;
		margin: 0;
		border: 0;
	}
	div.container{
		width: 500px;
		height: 350px;
		margin: auto;
		border: 1px solid green;
		background: #e2dfdf;
		padding: 10px;
		margin-top: 20px;
		box-shadow: 10px 10px 5px 2px #ccc;

	}
	div.container h2{
		text-align: center;
		margin-top: 25px;
	}
	p#error{
		color: red;
		font-weight: bold;
		text-align: center;
		display: none;
		
	}
	div.row{
		width: 100%;
		padding: 3px 10px;
	}
	input[label]{
		width: 30%;
	}
	input[type]{
		width: 70%;
		height: 25px;
		border: 2px solid #ccc;
		border-radius: 5px;
		margin: 10px 3px;
	}
	div.form button{
		padding: 7px 5px;
		color: white;
		background-color: #4a4ae8;
		border: 1px solid black;
		border-radius: 5px;
		cursor: pointer;
	}
	#giaiPT{
		margin-left: 150px;
	}
	p#result {
		font-weight: bold;
		font-size: 18px;
	}

</style>
</head>
<body>
	<div class="container">
		<h2>Giải phương trình bậc 2</h2>
		<p id="error">Vui lòng nhập hệ số phương trình và dữ liệu phải là số</p>
		<div class="form">
			<div class="row">
				<label for="txtHSa">Nhập hệ số a</label>
				<input type="text" name="txtHSa" id="txtHSa">
			</div>
			<div class="row">
				<label for="txtHSb">Nhập hệ số b</label>
				<input type="text" name="txtHSb" id="txtHSb">
			</div>
			<div class="row">
				<label for="txtHSc">Nhập hệ số c</label>
				<input type="text" name="txtHSc" id="txtHSc">
			</div>
			<div class="row">
				<button type="submit" name="giaiPT" id="giaiPT">Giải Phương Trình</button>
				<button type="submit" name="reset" id="reset">Reset</button>
			</div>
			<div class="row">
				<p id="result"></p>
				<p id="nghiem"></p>
			</div>
			
		</div>
		
	</div>
	<script type="text/javascript">
		$(function(){
			$('#giaiPT').click(function(){
				let a = $('#txtHSa').val().trim();
				let b = $('#txtHSb').val().trim();
				let c = $('#txtHSc').val().trim();
				let checka,checkb,checkc;
				$('#result').text('');
				$('#nghiem').text('');
				if(a===''||isNaN(a)){
					checka=false;
					$('#txtHSa').css('border','2px solid red');
				}else {
					checka = true;
					$('#txtHSa').css('border','2px solid #ccc');
				}
				if(b===''||isNaN(b)){
					checkb=false;
					$('#txtHSb').css('border','2px solid red');
				}else {
					checkb = true;
					$('#txtHSb').css('border','2px solid #ccc');
				}
				if(c===''||isNaN(c)){
					checkc=false;
					$('#txtHSc').css('border','2px solid red');
				}else {
					checkc = true;
					$('#txtHSc').css('border','2px solid #ccc');
				}
				console.log(a);
				console.log(b);
				console.log(c);
				console.log(checka);
				console.log(checkb);
				console.log(checkc);
				if(checka&&checkb&&checkc){
					$('#error').css('display','none');
					$.ajax({
						url:"server/gptbh.php",
						type:"POST",
						data:{
							a:a,
							b:b,
							c:c
						},
						success:function(result){
							result = $.parseJSON(result);
							console.log(result);
							$('#result').text(result[0]);
							$('#nghiem').text(result[1]);
							
						}
					})

				}else {
					$('#error').css('display','block');
					
				}

			});
			$('#reset').click(function(){
				window.location.reload(true);

			});

		});
	</script>

</body>

</html>