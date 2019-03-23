<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>

<head>
	<meta charset="utf-8">
	<!-- require  framework-->
	<script type="text/javascript" src="/libSys/public/syspkg/vue.js"></script>
	<script type="text/javascript" src="/libSys/public/syspkg/jquery-3.2.1.min.js"></script>
	<script type="text/javascript" src="/libSys/public/syspkg/jquery-form.js"></script>
	<script type="text/javascript" src="/libSys/public/syspkg/layer/layer.js"></script>
	<script type="text/javascript" src="/libSys/public/syspkg/bootstrap3.3.7/js/bootstrap.min.js"></script>
	<link rel="stylesheet" type="text/css" href="/libSys/public/syspkg/bootstrap3.3.7/css/bootstrap.min.css">
	<!-- require user-defined -->
	<script type="text/javascript"></script>
	<link rel="stylesheet" type="text/css" href="/libSys/public/syspkg/css/add.css">
	<title>index</title>
</head>

<body>

	<!-- html中尽量不要写样式，也不要写属性，html只用来布局框架，css写入public/syspkg/css文件夹下，使用vue后js大部分由vue承担，若需额外js，写到pbulic/syspkg/js文件夹下 -->
	<div class="homeadd" id="home">
		<div class="line">
			<label>Account</label>
			<span><input class="inp" type="text" id="account" onblur="accountBlur()" ></span>
			<div id="accountId" class="error_prompt">*</div>
		</div>
		<div class="line">
			<label>Password</label>
			<span><input class="inp" type="password" id="password" onfocus="pwdFocus()" onblur="pwdBlur()" value="12345678"></span>
			<div id="pwdId" class="error_prompt">*</div>
		</div>
		<div class="line">
			<label>RePwd</label>
			<span><input class="inp" type="password" id="repassword" onblur="repwdBlur()" value="12345678"></span>
			<div id="repwdId" class="error_prompt">*</div>
		</div>
		<div class="line">
			<label>Name</label>
			<span><input class="inp" type="text" id="name" onfocus="userNameFocus()" onblur="userNameBlur()"></span>
			<div id="userNameId" class="error_prompt">*</div>
		</div>
		<div class="line">
			<label>Email</label>
			<span><input class="inp" type="text" id="email" onfocus="emailFocus()" onblur="emailBlur()"></span>
			<div id="emailId" class="error_prompt">*</div>
		</div>
		<div class="line">
			<label>Balance</label>
			<span><input class="inp" type="text" id="balance" readonly="readonly"></span>
		</div>
		<div class="line">
			<label>Card ID</label>
			<span><input class="inp" type="text" id="card_id"></span>
		</div>
		<div class="line">
			<label>Address</label>
			<span><input class="inp" type="text" id="address"></span>
		</div>
		<div class="line">
			<button class="btnadd" id="submit">submit</button>
		</div>
	</div>
</body>
<script type="text/javascript">

	/*通过ID获取HTML对象的通用方法，使用$代替函数名称*/
	function $(elementId) {

		return document.getElementById(elementId);
	}
	function userNameFocus() {
		var userNameId = $("userNameId");

		userNameId.innerHTML = "just number or letter.4-18";
	}

	
	function userNameBlur() {
		var userName = $("name");
		var userNameId = $("userNameId");

		var reg = /^[0-9a-zA-Z][0-9a-zA-Z_.-]{2,16}[0-9a-zA-Z]$/;

		if (userName.value == "") {

			userNameId.innerHTML = "can not be empty.";
			return false;
		}

		if (reg.test(userName.value) == false) {

			userNameId.innerHTML = "just number or letter.4-18";
			return false;
		}
	
		
		userNameId.innerHTML = "√";
		return true;
	}

	function pwdFocus() {
		var pwdId = $("pwdId");
		
		pwdId.innerHTML = "password 6-16";
	}

	function pwdBlur() {
		var pwd = $("password");
		var pwdId = $("pwdId");
		if (pwd.value == "") {
			
			pwdId.innerHTML = "can not be empty.";
			return false;
		}
		if (pwd.value.length < 6 || pwd.value.length > 16) {
		
			pwdId.innerHTML = "password 6-16";
			return false;
		}
		
		pwdId.innerHTML = "√";
		return true;
	}


	function repwdBlur() {
		var pwd = $("password");
		var repwd = $("repassword");
		var repwdId = $("repwdId");
		if (repwd.value == "") {
			
			repwdId.innerHTML = "ncan not be empty.";
			return false;
		}
		if (pwd.value != repwd.value) {
			
			repwdId.innerHTML = "The password entered two times is inconsistent.";
			return false;
		}
		
		repwdId.innerHTML = "√";
		return true;
	}


	function emailBlur() {
		var email = $("email");
		var emailId = $("emailId");
		var reg = /^\w+@\w+(\.[a-zA-Z]{2,3}){1,2}$/;
		if (email.value == "") {

			emailId.innerHTML = "can not be empty.";
			return false;
		}
		if (reg.test(email.value) == false) {

			emailId.innerHTML = "Secret mail format is incorrect.";
			return false;
		}

		emailId.innerHTML = "√";
		return true;
	}
	function accountBlur() {
		var myreg = /^(((13[0-9]{1})|(15[0-9]{1})|(18[0-9]{1}))+\d{8})$/;
		var phone = $("account");
		var phoneid = $("accountId");
		if (phone.value == "") {
			phoneid.innerHTML = "can not be empty";
		}
		if (myreg.test(phone.value) == false) {
			phoneid.innerHTML = "Please enter a valid cell phone number.";
		}
		 else {
			phoneid.innerHTML = "√"
		}
	}


</script>

</html>