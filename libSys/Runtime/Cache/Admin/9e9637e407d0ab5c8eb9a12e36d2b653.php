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
	<link rel="stylesheet" type="text/css" href="/libSys/public/syspkg/css/returnperiod.css">
	<title>index</title>
</head>
<body>

<!-- html中尽量不要写样式，也不要写属性，html只用来布局框架，css写入public/syspkg/css文件夹下，使用vue后js大部分由vue承担，若需额外js，写到pbulic/syspkg/js文件夹下 -->
	<div class="home" id="home">
		<div class="line"></div>
			<div class="line">
				<label>new_period</label>
				<span><input type="text" id="new_period" value=""></span>
			</div>

			<div class="line">
				<button class="btn" id="submit">submit</button>
			</div>
	</div>
</body>
</html>