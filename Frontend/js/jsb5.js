console.log('jsb5');
class Animals{
	constructor(name='Test'){
		console.log(name);

	}
	eatSomething(){
		return "rice";
	}
}
class dogs extends Animals{
	//override. lop con dinh nghia lai phuong thuc lop cha
	constructor(name='demo'){
		//Chong override cho magic method constructor
		super();
		console.log(name);

	}
	eatSomething(){
		return "meat";
	}
	run(){
		//return this.eatSomething();
		//chong override cho phuong thuc binh thuong
		return super.eatSomething(); 
	}
}

let dog = new dogs();
let run = dog.run();
console.log(run);
console.log(dog.eatSomething());

//tu khoa static trong class JS
class student{
	static learning(){
		return "Javascript";
		//return this.chupAnhKiYeu();
	}
	static diNhauCUoiNam(){
		return this.learning();
	}
	thiHocKy(){
		return student.learning();
	}
	chupAnhKiYeu(){
		return "Van Mieu";
	}
}
let st = new student();
console.log(student.learning());
console.log(st.thiHocKy());
console.log(student.learning.bind(st)()); //bind la truyen doi tuong st hoac truyen vao con tro
console.log(student.diNhauCUoiNam());