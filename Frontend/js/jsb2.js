//dinh nghia ham trong js
function kiemTraChanLe(a){
	if(a%2==0){
		return true;
	}
	return false;
}
let num = 8
let check = kiemTraChanLe(num);
if(check){
	console.log(`${num} la so chan`); //ES6
	//console.log(num +' la so chan');
}else {
	console.log(`${num} la so le`);
}

function kiemTraSoNguyenTo(a){
	if(a<=0){
		return false;
	}
	else if(a==1||a==2){
		return true;
	}else{
		for(let i=0;i<Math.sqrt(a);i++){
			if (a%i==0)
			return false;

		}
	
		return true;
		
	}
	
	
}
let num2 = 9
let test = kiemTraSoNguyenTo(num2);
console.log(test);

function helloWord(hello = 'LPHP1803E'){ // Gan gia tri mac dinh cho tham so hinh thuc. hello duoc goi la tham so hinh thuc. tham so hinh thuc la tham so gan khi dinh nghia ham
	console.log(hello);
}
helloWord();
helloWord('LJAVA'); //LJAVA la tham so thuc la tham so truyen vao ham khi goi ham de thuc thi

function myTest(c){
	console.log(c);
}

myTest();

//Hang so ham
let giaiPTBN = function(a,b){
	return -b/a;
}

console.log(typeof(giaiPTBN));
let nghiem = giaiPTBN(6, 9);
console.log(`Nghiem pt la : ${nghiem}`);

let giaiPTB2 = function(a,b,c){
	if(a==0){
		if(b==0){
			if(c==0){
				return (`Phuong trinh co vo so nghiem`);
			}else{
				return false;

			}

			
		}else {
			let x = -c/b
			return (`Phuong trinh co nghiem ${x}`);
		}
	

	}else{
		let delta = b*b - 4*a*c;
		if(delta<0){
				return false;
			}else if(delta==0){
				let x = -b/(2*a);
				return (`Phuong trinh co nghiem la : ${x}`);

			}else {
				let x = (-b+ Math.sqrt(delta))/(2*a);
				let y = (-b- Math.sqrt(delta))/(2*a);
				return (`Phuong trinh co 2 nghiem la : x= ${x} va y= ${y}`);
			}
		
		}

	
}
 let nghiemPT = giaiPTB2(1,3,2);
 if(!nghiemPT){
 	console.log('PT vo nghiem');
 }else{
 	console.log(nghiemPT);
 }

 function chuViHCN(a,b){
 	function sum(a,b){
 		return a+b;

 	}
 	function multiply(){
 		return sum(a,b)*2;
 	}
 	return multiply();

 }

 let cv = chuViHCN(10, 20);
 console.log(`chu vi hinh chu nhat la:  ${cv}`);

 function dienTichHinhThang(a,b,c){
 	function sum(){
 		return a+b;
 	}
 	function multiply(){
 		return sum()*c;
 	}

 	function divide(){
 		return multiply()/2;
 	}
 	return divide();
 }
 let dienTich = dienTichHinhThang(4,10,3);
 console.log(`dien tich hinh thanh: ${dienTich}`);

 function dienTichHV(a){
 	function multiply(){
 		return a*a;
 	}
 	return multiply;
 }
 let dTHV = dienTichHV(10)(); 
 console.log(dTHV);

 function dtHCN(a){
 	function multiply(b){
 		return a*b;
 	}
 	return multiply;

 }
  let dTHCN = dtHCN(10)(30); 
 console.log(dTHCN);

 //constructor function 
 var testConstruc = new Function('a','b', 'return a+b');
 let mySum = function(x,y){
 	return testConstruc(x,y);

 }

 console.log(mySum(6, 5));


 //Arrow function 
 //trong arrow function con tro this co pham vi hoat dong rat lon
 let demoArrow = () =>{
 	console.log('this is arrow function');
 }
 demoArrow();

 let number1 = prompt('moi nhap he so a');
 number1 = Number.parseInt(number1);
 let number2 = prompt('moi nhap he so b');
  number2 = Number.parseInt(number2);
 let totalNumber = number1 + number2;
 console.log(totalNumber);
if(Number.isInteger(totalNumber)){
	console.log('yes');
}else {
	console.log('no');
}
if(Number.isNaN(totalNumber)){
	console.log('yes');
}else {
	console.log('no');
}

