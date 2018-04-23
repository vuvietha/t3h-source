console.log('jsb7');
let d = new Date();
console.log(d);
let d2 = new Date(2017,10,10);
console.log(d2);
let date = d.getDate();
console.log(date);
let month = d.getMonth();
console.log(month);
let year = d.getYear(); // Moc 1/1/1970 
console.log(year);
let time = d.getTime();
console.log(time);
let d3 = new Date('2018-04-01'); // khong nen dung vi cac trinh duyet se tinh toan thoi gian khac nhau nen dung new Date(2017,10,10);
console.log(d3);
let time2 = Date.parse('2018-04-01'); //Khong nen dung vi ko chuan nen dung ham getTime()
console.log(time2); 
let testDate = d.setDate(10);
let date123 = d.getDate();
console.log(date123);

function checkBirthday (birthDay){
	let today = new Date();
	let time = birthDay.getTime();
	let d = today.getDate();
	let m = today.getMonth()+1;
	let y = today.getFullYear();
	let date = new Date(y,m,d);
	let timeNow = date.getTime();
	let t = time - timeNow;

	if(t>0){
		let days = t/86400000;
		return days;

	}else if(t==0) {
		return 0;
	}else {
		let days = t/86400000;
		return days;
	}
}

let birthDay = new Date(2018,4,25);
let checkBirth = checkBirthday(birthDay);
console.log(checkBirth);
