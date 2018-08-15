<?php
//Viet ham validate data o day
function checkPassword($pass){
	$btcq = "/^(?=.*\d)(?=.*[a-z])(?=.*[A-Z])[a-zA-Z0-9]{8,}$/";
	if(preg_match($btcq, $pass)){
		return true;
	}
	return false;
}
function checkEmail($email){
	if(filter_var($email,FILTER_VALIDATE_EMAIL)){
		return true;
	}
	return false;

}
function checkPhone($phone){
	$btcqPhone = "/^\d{10}$/";
	if(preg_match($btcqPhone, $phone)){
		return true;
	}
	return false;

}
function validateAddUser($user,$pass,$email,$phone){
	$errors = [];
	$errors['user'] = ($user==='' OR strlen($user)<3) ? 'Invalid Username' : '';
	$errors['pass'] = (checkPassword($pass)) ? '' : 'Invalid Password';
	$errors['email'] = (checkEmail($email)) ? '' : 'Invalid Email';
	$errors['phone'] = (checkPhone($phone)) ? '' : 'Invalid Phone';
	return  $errors;

}

?>