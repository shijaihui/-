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
	<script type="text/javascript" src="/libSys/public/syspkg/js/GetQueryString.js"></script>
	<link rel="stylesheet" type="text/css" href="/libSys/public/syspkg/css/index.css">

	<title>index</title>
	<style type="text/css">
		.bottom-link{

		}
	</style>
</head>
<body class="body">

<!-- html中尽量不要写样式，也不要写属性，html只用来布局框架，css写入public/syspkg/css文件夹下，使用vue后js大部分由vue承担，若需额外js，写到pbulic/syspkg/js文件夹下 -->
	<div class="home" id="home">
		<div class="block">
			<div class="line"><h2>Readers</h2></div>
			<div class="line">
				<label>New Password</label>
				<span><input class="inp" type="password" name="" v-model="newPassword"></span>
			</div>
			<div class="line">
				<label>Confirm Password</label>
				<span><input class="inp" type="password" name="" v-model="conPassword"></span>
			</div>
			<div class="line">
				<button class="btn" v-on:click="submit">Submit</button>
			</div>			
		</div>
	</div>
<!-- vue写到body结束标签的前面，因为vue需要挂载dom，所以必须写到dom结构的后面，vue用来做数据绑定，可以绑定数据、事件、dom属性等功能强大，异步数据访问用jquery ajax来做，路由由tp框架做，可以保证我们的项目是处于一个统一的路由下 -->
	<script type="text/javascript">
		/*vue*/
		var app = new Vue({
			el : '#home',
			data : {
				newPassword : "",
				conPassword : ""
			},
			methods : {
				submit : function(event){
					var that = this
					if(that.newPassword == that.conPassword){
						var password = that.newPassword
						var account = GetQueryString('account','?s=/Home/index/pwdReset/')
						
						/*
						 * 这里是异步数据访问
						 */
						$.ajax({
							url : "<?php echo U('Index/resetPwd');?>",
							type : "post",
							contentType : "application/x-www-form-urlencoded;charset=utf-8",
							data : {
								account : account,
								password : password
							},
							dataType : "json",
							success : function(data){
								layer.msg(data.msg);
							}
						})
					}else{
						layer.msg('newPassword not equal conPassword')
					}
					
				},
			}
		})
	</script>
</body>
</html>