console.log('btjs01');

class gaCho{
	constructor(soCon=36, soChan=100){
		this._soCon= soCon;
		this._soChan = soChan;

	}
	tinhSoCon(){
		let max = this._soChan/4;
		for(let i=0;i<max;i++){
			if(i*2+(this._soCon-i)*4==this._soChan){
				let soConGa=i;
				let soConCho = this._soCon-i;
				return[soConGa,soConCho];
			}
		}
		return false;

	}
}

let gc = new gaCho(36,100);
let ketQua = gc.tinhSoCon();
if(ketQua==false){
	console.log('Sai so luong con hoac so luong chan');
}else {
	console.log(`So con ga: ${ketQua[0]} & So con cho: ${ketQua[1]}`);
}

//Giai he phuong trinh a1x + b1y = c1 a2x + b2y = c2

class HPTBN{
	constructor(a1,b1,c1,a2,b2,c2){
		this._a1 = a1;
		this._b1 =b1;
		this._c1 = c1;
		this._a2 = a2;
		this._b2 = b2;
		this._c2 = c2;
	}
	giaiHPTBN(){
		let d = this._a1*this._b2 - this._b1*this._a2;
		let dx = this._b2*this._c1 - this._b1*this._c2;
		let dy = this._a1*this._c2 - this._a2*this._c1;
		if(d==0){
			if(dx!=0||dy!=0){
				return 'He phuong trinh vo nghiem';
			}else {
				return 'He phuong trinh vo so nghiem';
			}
		}else {
			let x = dx/d;
			let y = dy/d;
			return (`He phuong trinh co nghiem duy nhat x = ${x} y = ${y} `);
		}

	}
}

let hptbn = new HPTBN(1,1,36,2,4,100);
let result = hptbn.giaiHPTBN();
console.log(result);