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
	<div class="homemodify" id="home">		
			<div class="line">
				<label>Title</label>
				<span><input  class="inp" type="text" id="title" ></span>
			</div>			
			<div class="line">
				<label>Author</label>
				<span><input class="inp"  type="text" id="author" ></span>
			</div>
			<div class="line">
				<label>Press</label>
				<span><input  class="inp" type="text" id="press" ></span>
			</div>
			<div class="line">
				<label>Category</label>
				<span><input class="inp"  type="text" id="category" ></span>
			</div>
			<div class="line">
				<label>PubDate</label>
				<span><input class="inp"  type="date" id="pub_date" ></span>
			</div><div class="line">
				<label>Price</label>
				<span><input  class="inp" type="text" id="price" ></span>
			</div>
			<div class="line">
				<label >Floor</label>
				<span><input  class="inp" type="text" id="floor" ></span>
			</div>			
			<div class="line">
				<label>Bookshelf</label>
				<span><input class="inp"  type="text" id="bookshelf" ></span>
			</div>
			<div class="line">
				<label>Area Code</label>
				<span><input class="inp"  type="text" id="area_code" ></span>
			</div>
			<div class="line">
				<button class="btnadd" id="modify" >Modify</button>
			</div>
	</div>
</body>
</html>