<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title>DEMO AJAX JQ-PHP</title>
	<link rel="stylesheet" href="">
	<style type="text/css">
		*{
			margin: 0;
			padding: 0;
		}
		.container{
			width: 980px;
			margin: 10px auto;
			border: 1px solid #ccc;
			padding: 20px;
		}
		div.container div.search{
			width: 100%;
			margin: auto;
			padding: 10px;
		}
		div.container div.search input{
			width: 80%;
			height: 25px;
			border: 1px solid #ccc;
			border-radius: 3px;
			padding:  3px 5px;
		}
		button{
			padding: 8px 25px;
		}
		button:hover{
			cursor: pointer;
		}
		#loading{
			display: none;
			text-align: center;
		}
	</style>
	<script src="js/jquery-3.3.1.js" type="text/javascript"> </script>
</head>
<body>
	<div class="container">
		<div class="search">
			<input type="text" placeholder="Enter keyword" id="txtKeyword">
			<button type="button" class="button">Search</button>
		</div>
		<div id="loading">
			<img src="img/loading.gif" alt="">
		</div>
		<div class="result">
				
		</div>
	</div>
	<script type="text/javascript">
		$(function(){
			//bat su kien button
			$('button[type="button"]').click(function(){
				//alert('hello you');
				var keyword = $('#txtKeyword').val().trim();
				if(keyword!==''){
					//alert(keyword);
					//Su dung cu phap ajax
					//Ky tu $ tuong ung voi jquery
					$.ajax({

						//giong nhu action trong form
						url: 'server/search.php',
						//giong nhu method trong form 
						//POST OR GET				
						type:"POST",
						//Toan bo du lieu muon gui di
						//object,array,string
						data: {
							key:keyword,
							num:10
						},
						beforeSend: function(){
							//Lam hanh dong gi do truoc khi du lieu duoc gui di
							$('#loading').show();

						},
						success:function(res){
							//noi du lieu tu phia server tra ve thong qua tham so trong ham (res)
							//res co the la 1 xml - html -json - text tuy vao server tra ve nhu the nao

							//Khi server tra ve la mot chuoi json thi client muon lay duoc du lieu tu trong do thi can phai chuan hoa no ve dung la object trong javascript
							$('#loading').hide();
							//res = $.parseJSON(res);
							//alert(`Toi nhan duoc data roi : ${res.key}`)

							$('.result').html(res);

						}

					}); 
				}else {
					alert('Enter keyword');
				}
				
			});
		});
	</script>
</body>
</html>