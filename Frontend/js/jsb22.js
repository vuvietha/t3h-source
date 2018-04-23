let food = ['tao','oi','xoi','ga'];
let food2 = new Array('tao','oi','xoi','ga');
let arrNum = [[1,2,3],[100,200,[600,700]],['xoi','ga']];
let count = food.length; //length dem so phan tu trong mang
console.log(count);
console.log(food2[2]);
console.log(arrNum[1][2][1]);

let number = [1,2,6,9,10,4,5,3];
let countNumber = number.length;
//Khi muon thay doi cac gia tri trong mang number
for(let i=0;i<countNumber;i++){
	console.log(`key: ${i} - value: ${number[i]}`);

}
//callback function 
//Khi chi muon view dung callback function
number.forEach(function(item,index){
	console.log(`key : ${index} - value: ${item}`);

});

console.log(number);
let numberArr = [1,2,6,9,10,4,5,3];
numberArr.push(100);
console.log(numberArr);

let lastEl = numberArr.pop();
console.log(numberArr);
console.log(lastEl);

numberArr.unshift(100);
console.log(numberArr);

let firstEl = numberArr.shift();
console.log(numberArr);
console.log(firstEl);

let check = numberArr.indexOf(90,0);
if(check==-1){
	console.log('Phan tu khong nam trong mang')
}else {
	console.log(check);
}

let numberSlice = numberArr.slice(3,6);
console.log(numberSlice);

 numberArr.splice(3,3,100,200,300);
console.log(numberArr);

let testMyNum = [1,2,6,9,12,10,4,5,3];

function checkNum(arr){
	let index = arr.indexOf(12);
	if(index==-1){
		arr.unshift(12);
		return arr;

	}else {
		let newarr = arr.slice(index,arr.length);
		return newarr;
		
	}

}

console.log(checkNum(testMyNum));

let arrClass = ['java','php','css','js'];

// ham join bien mang ve chuoi, cac phan tu trong mang ngan cacsh nhau boi tham so truyen vao ham join
let strArrClass = arrClass.join('*');
console.log(strArrClass);

//ToString bien mang ve chuoi 
let strArrClass2 = arrClass.toString();
console.log(strArrClass2);

console.log(typeof(strArrClass2));

//Kiem tra xem day co phai la mang hay khong
if(Array.isArray(arrClass)){
	console.log('yes');
}else {
	console.log('no');
}

let arrNumber = [100,1,2,200,4,5,9,10,21];
//Ham sap xep mang sort truyen vao 1 callback function
arrNumber.sort(function(a,b){
	// return a-b;
	return b-a;
})

console.log(arrNumber);
let sapXepMangTangDan = (arrNumberSort) => {
	let count = arrNumberSort.length;
	for(let i = 0 ; i< count;i++){
		for(let j= i+1; j<count;j++){
			if (arrNumberSort[i]>arrNumberSort[j]){
				let temp = arrNumberSort[i];
				arrNumberSort[i] = arrNumberSort[j];
				arrNumberSort[j] = temp;

			}


		}

	}
	return arrNumberSort;

}

console.log(sapXepMangTangDan(arrNumber));

let timGiaTriNhoNhatLonNhat = (arrNumber) =>{
	let count = arrNumber.length;
	let min = arrNumber[0]
	let max = arrNumber[0]
	for(let i = 0 ; i< count;i++){
		if(min>arrNumber[i]){

			min = arrNumber[i]
		}else {
			max = arrNumber[i]
		}

	}
	return (`min: ${min} & max: ${max}`);
}

console.log(timGiaTriNhoNhatLonNhat(arrNumber));

