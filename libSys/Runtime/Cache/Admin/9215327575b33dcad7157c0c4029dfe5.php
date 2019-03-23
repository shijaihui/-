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
	<link rel="stylesheet" type="text/css" href="/libSys/public/syspkg/css/modify.css">
	<title>index</title>
</head>
<body>

<!-- html中尽量不要写样式，也不要写属性，html只用来布局框架，css写入public/syspkg/css文件夹下，使用vue后js大部分由vue承担，若需额外js，写到pbulic/syspkg/js文件夹下 -->
	<div class="home" id="home">
		<p><strong>modify librarian</strong></p>
			<div class="line">
				<label>staff_id
				<span><input type="text" id="staff_id" readonly="readonly"></span>
				</label>
			</div>
			<div class="line">
				<label>name
				<span><input type="text" id="name"></span>
				</label>
			</div>					
			<div class="line">
				<label>introduction
				<span><input type="text" id="introduction"></span>
				</label>
			</div>
			<div class="line">
				<label>telnum
				<span><input type="text" id="tel"></span>
				</label>
			</div>
		    <div class="line">
				<label>password
				<span><input type="text" id="pwd"></span>
			    </label>
		    </div>
			<div class="line">
				<button class="btn" id="submit">submit</button>
			</div>
	</div>
<script type="text/javascript" src="/libSys/public/syspkg/js/addInput.js">
    // Vue.directives('focus', {
    //     // 当被绑定的元素插入到 DOM 中时……
    //     inserted: function (el) {
    //         // 聚焦元素
    //         el.focus()
    //     }
    // })
    // $("input").focus(function() {
    //     $(this).parent("span").addClass("active");
    // });
    // $("input").blur(function() {
    //     if ($(this).val() == "") {
    //         $(this).parent("span").removeClass("active");
    //     }
    // })
    // var app = new Vue({
	// 	data:{
    //         isActive: [
    //             true, false, false, false, false
    //         ],
	// 	},
    //     methods: {
    //         select: function (index) {
    //             for(var i = 0; i <= 4; i++){
    //                 this.isActive.splice(i, 0, false)
	// 			}
    //             this.isActive.splice(index, 0, true)
    //         }
    //     }
    // })
</script>
</body>
</html>