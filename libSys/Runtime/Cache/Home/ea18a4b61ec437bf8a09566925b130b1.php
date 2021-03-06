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
	<script type="text/javascript" src="/libSys/public/syspkg/jquery.cookie.js"></script>
	<!-- require user-defined -->
	<script type="text/javascript" src="/libSys/public/syspkg/js/GetQueryString.js"></script>
	<script type="text/javascript" src="/libSys/public/syspkg/js/jsonStrToObject.js"></script>

	<title>notice</title>
	<style type="text/css">
		body{
			background: #F5F5F5;
		}
		#home{
			width: 95%;
			min-height: 580px;
			background: white;
			margin-top : 100px;
			margin-left: auto;
			margin-right: auto;
			box-shadow: 5px 0 5px #B8B8B8;
		}
		#book{
			padding: 29px 29px 0 29px;
		}
		#title{
			font-size: 34px;
			line-height: 1.15;
			font-weight: 400;
		}
		#summary{
			margin : 20px 0 10px 0;
			font-size: 25px;
			word-wrap: break-word;
			text-indent: 2em;
			line-height: 24px;
			color: #666666;
		}
		#board{
			margin-top: 30px;
	 		padding-top: 4px;
	 		background: #DDDDDD;
	 		color: black;
	 		font-weight: bold;
	 		font-size: 18px;
	 		width: 80px;
	 		height: 35px;
	 		text-align: center;
		}
		#time{
			font-size: 20px;
			color : #B0B0B0;
			margin-left: 20px;
		}
		#header{
			z-index: 1;
			position: fixed;
			top:0px;
			width: 100%;
			height: 55px;
			padding: 0 0 0 10px;
			/* background: white;
			display: flex;
			align-items: center;
			box-shadow: 0px 3px 5px #EBEBEB; */
			background: white;
			display: flex;
			align-items: center;
			box-shadow: 0px 3px 5px #EBEBEB;
		}
		#header-search{
	 		display: flex;
	 		justify-content: center;
	 		margin-left: 5px;
	 	}
	 	.header-text{
			margin-left: 380px;
			width: 40px;
			height: 20px;
			font-size: 13px;
			color : black;
			text-align: center;
		}
	</style>
</head>
<body class="body">
	<div id="header">
				<div id="header-logo">
					<a  href="<?php echo U('Index/browse');?>">
						<img src="/libSys/Public/syspkg/images/logo1.png" width="101" height="45">
					</a>
				</div>
	</div>
<!-- html中尽量不要写样式，也不要写属性，html只用来布局框架，css写入public/syspkg/css文件夹下，使用vue后js大部分由vue承担，若需额外js，写到pbulic/syspkg/js文件夹下 -->
	<div class="home" id="home">
		<div id="book">
			<div id="title">{{noticelist[0].notice_title}}<span id="time">{{noticelist[0].release_time}}</span></div>
			<div id="summary">{{noticelist[0].notice_body}}</div>
		</div>
	</div>
<!-- vue写到body结束标签的前面，因为vue需要挂载dom，所以必须写到dom结构的后面，vue用来做数据绑定，可以绑定数据、事件、dom属性等功能强大，异步数据访问用jquery ajax来做，路由由tp框架做，可以保证我们的项目是处于一个统一的路由下 -->
	<script type="text/javascript">
		/*vue*/
		var app = new Vue({
			el : '#home',
			data : {
				account : "",
				password : "",
				noticelist : [],
			},
			created:function(){
				var that = this		
				var noticeid = GetQueryString('noticeid','?s=/Home/Index/notice/')	
					$.ajax({
						url : "<?php echo U('Index/getNoticebyID');?>",
						type : "post",
						contentType : "application/x-www-form-urlencoded;charset=utf-8",
						data : {
							noticeid : noticeid
						},
						dataType : "json",
						success : function(data){
							if(data.code == 'success'){
								that.noticelist = jsonStrToObject(data.data)
							}
							if(data.code == 'fail'){
								layer.msg("fail")
							}
						}
					})
			},
			methods : {

			}
		})
	</script>
</body>
</html>