$(function(){
	$('.img').zoom();
	// var boxImages = $('.slider ul');
	// var imageWidth = $('.slider ul li:first-child').children('img').width();
	// var imageLength = $('.slider ul').children('li').length;
	// console.log(imageWidth);
	// console.log(imageLength);
			
	// 		//Thay doi lai kich thuoc cua box image
	// 		$(boxImages).css('width',imageWidth*imageLength);
	// 		var currentImage = 1;
	// 		$('.box button').click(function(){
	// 			//xac dinh xem dang bam vao nut nao
	// 			var whichBtn = $(this).text().trim().toLowerCase();
	// 			console.log(whichBtn);

	// 			if(whichBtn==='next'){
	// 				//bam vao nut next
	// 				if(currentImage===imageLength){
	// 					return false;
	// 				}else {
	// 					currentImage++;
	// 					myAnimate(currentImage,imageWidth);
	// 				}

	// 			}else if(whichBtn=='prev'){
	// 				//bam vao nut prev
	// 				if(currentImage===1){
	// 					return false;
	// 				}else {
	// 					currentImage--;
	// 					myAnimate(currentImage,imageWidth);

	// 				}

	// 			}

	// 		});
	// 		function myAnimate(currentImage,imageWidth){
	// 			let vaulePxLeft = -((currentImage-1)*imageWidth);
	// 			$(boxImages).animate({
	// 				left:vaulePxLeft
	// 			},1500);

	// 		}

		});