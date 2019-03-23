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
	<link rel="stylesheet" type="text/css" href="/libSys/public/syspkg/css/admin_head.css" >
    <link rel="stylesheet" type="text/css" href="/libSys/public/syspkg/css/admin_index.css" >
	<title>index</title>
</head>
<body class="body">

<!-- html中尽量不要写样式，也不要写属性，html只用来布局框架，css写入public/syspkg/css文件夹下，使用vue后js大部分由vue承担，若需额外js，写到pbulic/syspkg/js文件夹下 -->

<div id="head" class="head">
	<div class="tit" ><h> Bibliosoft Library Management System</h> </div>
	<div class="" style="float: right;margin-top: 20px;margin-right: 300px;">
		<img src="/libSys/public/syspkg/images/notlogin.png" class="img_head dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
		<!--<ul class="dropdown-menu" style="top:100px;right: 250px;">-->
			<!--<li ><a href="#">edit my profit</a></li>-->
			<!--<li ><a href="#">log out</a></li>-->
		<!--</ul>-->
	</div>
</div>


<div class="home" id="home">
    <div class="block">

        <div class="line">
            <label>Account</label>
            <span><input type="text" name="account" v-model="account" id="account"></span>
        </div>
        <div class="line">
            <label>Password</label>
            <span><input type="password" name="password" v-model="password" id="password"></span>
        </div>
        <div class="line">
            <button class="btn" v-on:click="submit">Login</button>
        </div>

    </div>
    <div class="canvasBlock">
        <canvas></canvas>
    </div>
</div>


<!-- vue写到body结束标签的前面，因为vue需要挂载dom，所以必须写到dom结构的后面，vue用来做数据绑定，可以绑定数据、事件、dom属性等功能强大，异步数据访问用jquery ajax来做，路由由tp框架做，可以保证我们的项目是处于一个统一的路由下 -->
	<script type="text/javascript">
		/*vue*/
		var app = new Vue({
			el : '#home',
			data : {
				account : "",
				password : ""
			},
			methods : {
				submit : function(event){
					var that = this
					/*
					 * 这里是异步数据访问
					 */
                    var account = this.account;
                    var password = this.password;
                    if(account!=="admin"){
                        layer.open({
                            content:'please reinput account',
                            btn: ['ok'], //按钮
                            yes:function(){
                                window.location.href = "<?php echo U('Index/index');?>"
                            },
                        })
                        return;
                    }
                    if(account=="admin"&&(password == "" || password == null || password == undefined)){
                       // alert("please enter password")
                        layer.open({
                            content:'please enter password',
                            btn: ['ok'], //按钮
                            yes:function(){
                                window.location.href = "<?php echo U('Index/index');?>"

                        },
                        })
                        return;
                    }

					$.ajax({
						url : "<?php echo U('Index/login');?>",
						type : "post",
						contentType : "application/x-www-form-urlencoded;charset=utf-8",
						data : {
							account : that.account,
							password : that.password
						},
						dataType : "json",
						success : function(data){
							if(data.code == '200'){
								window.location.href = "<?php echo U('Index/home');?>"
							}
                            if(data.code == 'account'){
                                alert("account error")
                            }
                            if(data.code == 'password'){
                                alert("password error")
                            }
							if(data.code == '404'){
								alert("fail")
							}
						}
					})
				},
			}
		})
        Object.getOwnPropertyNames(Math).map(function(p) {
            window[p] = Math[p];
        });

        var rand = function(max, min, is_int) {
            var max = (max - 1 || 0) + 1,
                min = min || 0,
                gen = min + (max - min)*random();

            return (is_int)?round(gen):gen;
        };

        var σ = function(c) {
            return (random() < (c || .5))?-1:1;
        }

        var N_POLY = 32,
            c = document.querySelector('canvas'),
            ctx = c.getContext('2d'),
            w = 150, h = 150,
            polygons = [],
            t = 0, r_id = null,
            rep_pt = {'x': 0, 'y': 0},
            cutoff_d = 169;

        var Poly = function(n, R, o, φ, hue, v, af, ω) {
            this.n = n || rand(7, 3, 1);
            this.α = 2*PI/this.n;
            this.R = R || rand(16, 8);
            this.o = o || null;
            this.φ = φ || rand(PI/2);
            this.hue = hue || rand(360, 0, 1);
            this.c = 'hsl(' + this.hue + ',100%,80%)';
            this.v = v || null;
            this.af = af || (25 - this.R)/250 - 1;
            this.ω = ω || σ()*rand(2, .25)*PI/180;
            this.vertices = [];

            this.init = function() {
                var θ = 0;

                if(!this.o) {
                    this.o = {
                        'x': rand(w - this.R, this.R, 1),
                        'y': rand(h - this.R, this.R, 1)
                    };
                }

                if(!this.v) {
                    this.v = {
                        'x': σ()*rand(2, .5),
                        'y': σ()*rand(2, .5)
                    };
                }

                for(var i = 0; i < this.n; i++) {
                    θ = i*this.α + this.φ;

                    this.vertices.push({
                        'x': this.o.x + this.R*cos(θ),
                        'y': this.o.y + this.R*sin(θ)
                    });
                }
            };

            this.move = function() {
                this.v.x += ~~(2/(this.o.x - rep_pt.x));
                this.v.y += ~~(2/(this.o.y - rep_pt.y));

                if(this.v.x > 4) { this.v.x = 4; }
                if(this.v.y > 4) { this.v.y = 4; }
                if(this.v.x < -4) { this.v.x = -4; }
                if(this.v.y < -4) { this.v.y = -4; }

                this.o.x += this.v.x;
                this.o.y += this.v.y;

                this.φ += this.ω;
                this.hue += σ(.8)*rand(5, 1, 1);
                this.c = 'hsl(' + this.hue + ',100%,80%)';

                if(this.o.x < this.R) {
                    this.o.x = this.R;
                    this.v.x *= this.af;
                }
                if(this.o.x > w - this.R) {
                    this.o.x = w - this.R;
                    this.v.x *= this.af;
                }
                if(this.o.y < this.R) {
                    this.o.y = this.R;
                    this.v.y *= this.af;
                }
                if(this.o.y > h - this.R) {
                    this.o.y = h - this.R;
                    this.v.y *= this.af;
                }

                for(var i = 0; i < N_POLY; i++) {
                    if(polygons[i] != this) {
                        if(abs(this.o.x - polygons[i].o.x) < (this.R + polygons[i].R) &&
                            abs(this.o.y - polygons[i].o.y) < (this.R + polygons[i].R)) {
                            this.o.x -= this.v.x;
                            polygons[i].o.x -= polygons[i].v.x;
                            this.v.x *= -1;
                            polygons[i].v.x *= -1;
                            this.o.y -= this.v.y;
                            polygons[i].o.y -= polygons[i].v.y;
                            this.v.y *= -1;
                            polygons[i].v.y *= -1;
                        }
                    }
                }

                for(var i = 0; i < this.n; i++) {
                    θ = i*this.α + this.φ;

                    this.vertices[i] = {
                        'x': this.o.x + this.R*cos(θ),
                        'y': this.o.y + this.R*sin(θ)
                    };
                }
            };

            this.draw = function(ctxt) {
                ctxt.lineWidth = 3;
                ctxt.strokeStyle = this.c;
                ctxt.beginPath();

                for(var i = 0; i < this.n; i++) {
                    if(i == 0) {
                        ctxt.moveTo(this.vertices[i].x, this.vertices[i].y);
                    }
                    else {
                        ctxt.lineTo(this.vertices[i].x, this.vertices[i].y);
                    }
                }

                ctxt.closePath();
                ctxt.stroke();
            };

            this.connectTo = function(ctxt, poly) {
                var min_d = max(w, h), conn_i, conn_j,
                    curr_d, dx, dy,
                    c0, c1, g, la;

                for(var i = 0; i < this.n; i++) {
                    for(var j = 0; j < poly.n; j++) {
                        dx = this.vertices[i].x - poly.vertices[j].x;
                        dy = this.vertices[i].y - poly.vertices[j].y;
                        curr_d = sqrt(pow(dx, 2) + pow(dy, 2));
                        if(min_d > curr_d) {
                            min_d = curr_d;
                            conn_i = i;
                            conn_j = j;
                        }
                    }
                }

                if(min_d < cutoff_d) {
                    la = (1 - min_d/cutoff_d);
                    c0 = 'hsla(' + this.hue + ',100%,80%,' + la + ')';
                    c1 = 'hsla(' + poly.hue + ',100%,80%,' + la + ')';
                    g = ctxt.createLinearGradient(
                        this.vertices[conn_i].x,
                        this.vertices[conn_i].y,
                        poly.vertices[conn_j].x,
                        poly.vertices[conn_j].y
                    );
                    g.addColorStop(0, c0);
                    g.addColorStop(1, c1);

                    ctxt.strokeStyle = g;
                    ctxt.beginPath();
                    ctxt.moveTo(this.vertices[conn_i].x,
                        this.vertices[conn_i].y);
                    ctxt.lineTo(poly.vertices[conn_j].x,
                        poly.vertices[conn_j].y);
                    ctxt.closePath();
                    ctxt.stroke()
                }
            };
        };

        var init = function() {
            var s = getComputedStyle(c);

            if(r_id) {
                cancelAnimationFrame(r_id);
            }

            w = c.width = ~~s.width.split('px')[0];
            h = c.height = ~~s.height.split('px')[0];

            rep_pt = {'x': w/2, 'y': h/2};

            for(var i = 0; i < N_POLY; i++) {
                polygons.push(new Poly());
                polygons[i].init();
            }

            draw();
        };

        var draw = function() {
            var hue_diff;

            ctx.clearRect(0, 0, w, h);

            for(var i = 0; i < N_POLY; i++) {
                polygons[i].move();
                polygons[i].draw(ctx);

                for(var j = 0; j < i; j++) {
                    hue_diff = abs(polygons[i].hue - polygons[j].hue);

                    if(hue_diff < 32 || hue_diff > 328) {
                        polygons[i].connectTo(ctx, polygons[j]);
                    }
                }
            }

            t++;

            r_id = requestAnimationFrame(draw);
        };

        setTimeout(function() {
            init();

            addEventListener('resize', init, false);

            c.addEventListener('mousemove', function(e) {
                rep_pt = {'x': e.clientX, 'y': e.clientY}
            }, false);
        }, 15);
	</script>
</body>
</html>