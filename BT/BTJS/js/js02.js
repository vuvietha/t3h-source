console.log('js02');
//biểu thức chính quy check độ mạnh yếu mật khẩu : "từ 8 kí tự trở lên và có 1 nhất 1 chữ số, 1 chữ thường, 1 chữ hoa"
let btcq = /^(?=.*\d)(?=.*[a-z])(?=.*[A-Z])(?=.{8,})/g;
//let btcq = /^(?=.*\d)(?=.*[a-z])(?=.*[A-Z])[0-9a-zA-Z]{8,}$/g;
let pass = "Ahfstgu1a";
if(btcq.test(pass)){
	console.log('ok');
}else {
	console.log('fail');
}