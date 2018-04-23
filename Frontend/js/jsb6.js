console.log('jsb6');
let myString = "chung ta dang hoc js buoi 5";
let pos = myString.indexOf('js',20);
let pos2 = myString.lastIndexOf('js',20);
console.log(pos,pos2);

let newString = myString.slice(9,17);
console.log(newString);

let fruit = 'cam,quyt,mit,dua,le,tao,oi';
let newArrFruit = fruit.split(',');
console.log(newArrFruit);
let newStringFruit = newArrFruit.join('*');
console.log(newStringFruit);

let url='http://abc.com/news/bat-tam-giam-can-bo-.-pj.tham-nhung-inhhhj-99999888.html';

let cham = url.lastIndexOf('.');
let gachNgang = url.lastIndexOf('-');
let str = url.slice(gachNgang+1, cham);
console.log(str);
let test = myString.substr(9,17);
let test2 = myString.slice(9,-17);
let test3 = myString.substring(9,-17);
console.log(test);
console.log(test2);
console.log(test3);
let upFruit = fruit.toUpperCase();
console.log(upFruit);

//let btcq = /^[1-9]{1}[0-9]{1}[0,2,4,6,8]{1}$/gi;
//let btcq = /^[1-9][0-9][0,2,4,6,8]$/gi;  //neu xuat hien 1 lan thi ko can viet {1}
let btcq = /^[1-9]\d[0,2,4,6,8]$/gi;
//[0-9] ~ \d (digital number)
//[aA-zZ] khong phan biet chu hoa thuong
//[a-z] chi co chu thuong
//[A-Z] chi co chu hoa
let num =123;
if(btcq.test(num)){
	console.log(` ${num} hop le`);

}else {
	console.log(` ${num} khong hop le`);
}

let testString1 = 'sap duoc nghi roi'; 
let btcq1 = /nghi/gi; // /^nghi$/gi

if(btcq1.test(testString1)){
	console.log('ok');
}else {
	console.log('fail');
}

let string2 = 'hom nay la ngay 1sdg2a roi. Mai di choi thoi';

//let btcq2 =/[0-9]/gi;
let btcq2 =/\d/gi;

if(btcq2.test(string2)){
	console.log('ok');
}else {
	console.log('fail');
}


let btcq3 =/\./gi; //. la ky tu dac biet nen phai them dau \
if(btcq3.test(string2)){
	console.log('ok');
}else {
	console.log('fail');
}

let btcq4 = /^[0][9][6-8]\d{7}$|^[0][1][6][2-9]\d{7}$/gi;
let myNumber = '01684185619';
if(btcq4.test(myNumber)){
	console.log('ok');
}else {
	console.log('fail');
}

let btcq5 = /^(0[1-9]|1[0-9]|2[0-9]|3[0-1])\/(0[1-9]|1[0-2])\/([1-9]\d{3})$/gi
let date = "29/02/2000";
if(btcq5.test(date)){
	console.log('ok');
}else {
	console.log('fail');
}
//let result = btcq5.exec(date);
let result2 = date.match(btcq5);
if(result2!==null){
	let res = result2[0];
	let arrRes = res.split('/');
	let d = eval(arrRes[0]);
	let m = eval(arrRes[1]);
	let y = eval(arrRes[2]);

	console.log(typeof(y));
	if(m==02){
		if(d==29){
			//let yNum = eval(y);
			if((y%4==0)||( y%400 == 0 && y%100 == 0)){
				console.log('Dung dinh dang ngay thang');
			}else {
				console.log('Sai dinh dang ngay thang');
			}

		}else if(d<29) {
			console.log('Dung dinh dang ngay thang');
		}else {
			console.log('Sai dinh dang ngay thang');
			
		}
	}

}

//let checkPass = /^(?=.*\d)(?=.*[a-z])(?=.*[A-Z])[0-9a-z-A-Z]{8,}$/g
let checkPass = /^(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}$/g
let pass ='123456 78a Abb';
if(checkPass.test(pass)){
	console.log('Pass is valid');
}else {
	console.log('Pass is invalid');
}


//kiem tra mot so bat ky la so chan hay ko 

// let checkSoChan = /^[-]{0,1}[\d]{0,}[0,2,4,6,8]$/gi
// let so = '-02';
// if(checkSoChan.test(so)){
// 	console.log('la so chan');
// }else {
// 	console.log('khong la so chan');
// }

// let checkSoChan = /([1-9]+)(.*\d)[0,2,4,6,8]$/gi;
// let so = '-02';
// if(checkSoChan.test(so)){
// 	console.log('la so chan');
// }else {
// 	console.log('khong la so chan');
// }

let checkSoChan = /^[-]{0,1}\d*[0,2,4,6,8]$/gi
let so = '2';
if(checkSoChan.test(so)){
	console.log('la so chan');
}else {
	console.log('khong la so chan');
}