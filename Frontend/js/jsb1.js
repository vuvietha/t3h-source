//Hien thi du lieu ra ngoai trinh duyet
// document.write('Hello World');

// //Tao dialog thong bao
// alert('Hello you');

// let name = prompt('moi nhap ho ten');

// console.log(name);

//Kieu du lieu number
var number = 10;
console.log(typeof(number));

var myString = 'LPHP1803E';
console.log(typeof(myString));

var check = true;
console.log(typeof(test));

var checkData;
console.log(typeof(checkData));

var dataNull = null;
console.log(typeof(dataNull));

var emptyString = '';

console.log(typeof(emptyString));

// var 123ab; //sai bien khong bat dau bang so
// var break; //sai bien trung voi tu khoa

//Quy tac dat ten bien chu cai dau tien ko viet hoa cac tu tiep theo chu cai dau tien viet hoa : myName

function test(){
	let a = 20;
	var b = 40;
	if(true){
		let a = 30;
		console.log(a);
		var b =100;
		console.log(b);
	}
	console.log(a);
	console.log(b);
}

test();
const PI = 3.14;
console.log(PI);

var myNumber = 10;
//var myNumber = 100; => //Khong nen dung vi thua tai nguyen cap phat 
myNumber = 100;
console.log(myNumber);

// let myNumber1 = 10;
// let myNumber1 = 100;
// console.log(myNumber1); => Loi voi tu khoa let ko cho phep dinh nghia lai bien 

let abc = false;

//false==''==0
if(abc==''){
	console.log('yes');
}else {
	console.log('no');
}

//So sanh === la so sanh tuyet doi ca kieu du lieu va gia tri
if(abc===''){
	console.log('yes');
}else {
	console.log('no');
}

let num1 = 100;
let num2 = '1';
let sum = num1 + num2;
console.log(sum);

let str1 = 'Hello world';
let str2 = ' you';
let str3 = str1 + str2;
console.log(str3);

let i =10;
let j =5;
console.log(i++ + j);
console.log(++i +j);