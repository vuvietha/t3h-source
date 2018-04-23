console.log('js');
let car = {
	color:'blue',
	model:'bmw',
	weight: 500,
	price:80000,
	tech:{
		electric: 'AZOF',
		green:'BGGH'

	},
	drive: function(){
		return 'lai xe';
	},
	break: function(){
		return 'break';
	}
}

//truy cap vao thuoc tinh nam trong object
let color = car.color;
console.log(color);

//truy cap vao phuong thuc nam trong object
let drive = car.drive();
console.log(drive);


let green = car.tech.green;
console.log(green);

//truy cap vao tat ca cac phan tu nam trong object
for(let items in car){
	console.log(car[items]);

}

function giaiPTBN(a,b){
	this.x =a;
	this.y = b;
	this.giaiPT = function(){
		return -this.y/this.x;
	}
}

let pt = new giaiPTBN(4,5);
let kq = pt.giaiPT();
console.log(`Nghiem la: ${kq}`);

function kiemTraSoNguyenTo(a){
	this.x = a;
	this.check = function(){
		if (this.x<=0){

			return false;
		}else if(this.x==1||this.x==2){
			return true;
			
		}else {
			for(let i=2; i<Math.sqrt(this.x);i++){
				if (this.x%i==0)
					return false;
			}
			return true;

		}

	}
}

let number= new kiemTraSoNguyenTo(8);
let result = number.check();
console.log(result);


function PTBH(a,b,c){
	this.x=a;
	this.y=b;
	this.z=c;
	this.giaiPTBH = function(){
		if(this.x==0){
			if(this.y==0){
				if(this.z==0){
					return 'VO so nghiem';
				}else {
					return 'vo nghiem'
				}
			}else {
				return -this.z/this.y;
			}
		}else {
			let delta = (this.y*this.y)-(4*this.x*this.z);
			if(delta<0){
				return 'vo nghiem'
			}else if(delta ==0){
				return -this.y/(2*this.x);
			}else{
				let x = (-this.y + Math.sqrt(delta))/(2*this.x);
				let y = (-this.y - Math.sqrt(delta))/(2*this.x);
				return (`Nghiem x = ${x} & y = ${y}`);
			}
		}

	};
	this.showResult = function(){
		return this.giaiPTBH();
	}
}

let ptb2 = new PTBH(1,2,1);
let ketqua = ptb2.showResult();
console.log(ketqua);

function sinhVien(){
	this.age = 20;
	this.add = 'Hà Noi';
	this.learn = function(){
		return 'LPHP1803E';
	}
}

//Ke thua them cac thuoc tinh hay phuong thuc nao do ta dung prototype. prototype dung trong es5 tro xuong khi muon ke thua cho mot object
sinhVien.prototype.height = 170;
sinhVien.prototype.playFootball = function(){
	return "Playing football";
}

let st = new sinhVien();
console.log(st.height);
class sport{
	constructor(tennis ,football){
		this._tennis = tennis;
		this._football = football;

	}
	playTennis(){
		return this._tennis;
	}
}

//dinh nghia class trong js
class worker extends sport{
	//Khong cho phep khai bao thuoc tinh o day ma phai dung constructor
	constructor(a,b){
		super(a,b);
		//Dinh nghia thuoc tinh o day
		this.name = 'VVH';
		this.age = 28;
		console.log('Dang chay vao constructor');

	}
	//dinh nghia phuong thuc trong class
	doSomething(){
		// console.log('Dang chay vao doSomething');
		return this.age;

	}
	doEatSomething(){
		if(this.doSomething()==28){
			return "Hotdog";
		}else {
			return "Chua du tuoi de an mon nay";
		}
	}
	doPlaySport(){
		return this.playTennis();
	}
}




// console.log(work.doSomething());
// console.log(work.doEatSomething());
// console.log(work.doPlaySport());

let sp = new sport('NaDal','Messi');
let work = new worker('NaDal','Messi'); //Goi vao constructor
console.log(work.doPlaySport());

let numberArray = [100,300,500,9,2,3,10,8];
class searchMin{
	constructor(arrNum){
		this._arrNum = arrNum;
	}
	getMin(){
		let count = this._arrNum.length;
		let min =this._arrNum[0];
		let max =this._arrNum[0];
		for(let i=0;i<count;i++){
			if(min>this._arrNum[i]){
				min = this._arrNum[i];
			}
		}
		return min;

	}
	showMin(){
		return this.getMin();
	}

}

class searchMax extends searchMin{
	constructor(arrNum){
		super(arrNum);
	}
	getMax(){
		let count = this._arrNum.length;
		let max =this._arrNum[0];
		for(let i=0;i<count;i++){
			if(max<this._arrNum[i]){
				max = this._arrNum[i];
			}
		}
		return max;
	}
	showResult(){
		let min = this.showMin();
		let max = this.getMax();
		return[min,max];
		
	}
}

let search = new searchMax(numberArray);
let searhArr = search.showResult();
console.log(`Min: ${searhArr[0] } & Max: ${searhArr[1]}`);