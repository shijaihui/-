<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0">
    <meta name="description"content="Basic HTML5 App generated by MyEclipse Mobile Tools" />

     <!--引入jquery-->
    <script type="text/javascript" src="/mksys/Public/syspkg/jquery-3.2.1.min.js"></script>
      <!--导入jQueryForm插件-->
    <script type="text/javascript" src="/mksys/Public/syspkg/jquery-form.js"></script>
    <!--引入Bootstrap-->
    <link href="/mksys/Public/syspkg/bootstrap3.3.7/css/bootstrap.css" rel="stylesheet" >
    <script type="text/javascript" src="/mksys/Public/syspkg/bootstrap3.3.7/js/bootstrap.js"></script>
    <!-- 引入layui -->
    <script type="text/javascript" src="/mksys/Public/syspkg/layer/layer.js"></script>
    <link href="/mksys/Public/syspkg/css/fram.css" rel="stylesheet" >
    <script type="text/javascript" src="/mksys/Public/syspkg/js/fram.js"></script>
    <title>教师成果网-普通教师端</title>
    <style>

       
          select
        {
            width: 91px;
            height: 30px;
             border-radius: 10px;
        }
         .home
        {
            
            width:180px;
            height: 35px;
            line-height: 35px;
            color: rgba(16, 16, 16, 1);
            font-size: 24px; 
            text-align: center;
            font-family: Roboto;

        }

        .hr0
        {
           position: relative;
            top: -20px;
           width: 100%
            height: 12px;

        }
        table
        {
            margin-top: 20px;
            border: solid;
            border-radius: 10px;
            background-color: rgba(255, 255, 255, 1);
            text-align: center;
            border-collapse: separate;
            border: 2px solid #A6A6A6 ;
            padding-left: 
        }
        td
        {
            width: 200px;
            height: 45px;

        }
        thead td
        {
            border-bottom: 1px solid #A6A6A6 ;
        }
        thead td.tdHead
        {
            font-size: 20px;
            font-weight: bold;
        }
        tbody td.tdHead
        {
            font-size: 16px;
            font-weight: bold;
        }
        .tdRest
        {

        }
         input
  {
   outline:none;
  }
    select
  {
    outline:none;
  }
    </style>
<script>

       /*自动检测*/
    $(document).ready(function(){


        var pageId = '<?php echo ($page); ?>';
       //页面编码为： page1 
 //            page21 page22 page23
 //            page31 page32 page33 page34 page35
 //            ......
//switch case 实例：
if(pageId=='page81')
{
    $("#drp1").click();
    $("#m11").css("background-color","#363536");
    $("#d11").css("display","inline");
}






        // 自动检测年份
        var years = '<?php echo ($years); ?>';
        if(years == '时间不限'){
            $("option#years-all").attr("selected","selected");
        }else if(years == '2017'){
             $("option#years-2017").attr("selected","selected");
        }else if(years == '2018'){
            $("option#years-2018").attr("selected","selected");
        }  
        //  自动检测下拉选框
        var dep = '<?php echo ($dep); ?>';
        if(dep == '所有系'){
            $("option#depall").attr("selected","selected");
        }else if(dep == '思想政治教育系'){
            $("option#dep1").attr("selected","selected");
        }else if(dep == '马克思主义基本原理系'){
            $("option#dep2").attr("selected","selected");
        }else if(dep == '马克思主义中国化研究系'){
            $("option#dep3").attr("selected","selected");
        }else if(dep == '中国近现代史基本问题研究系'){
            $("option#dep4").attr("selected","selected");
        }else if(dep == '思修与形势政策系教学成果奖'){
            $("option#dep5").attr("selected","selected");
        }

    });
    $(document).ready(function(){
        $("select#years").change(function(){
            $("input#submit").click();
        });
        $("select#dep").change(function(){
            $("input#submit").click();
        });
    });

     /*退出登录*/
        $(document).ready(function(){
             $("a#quit").click(function(){
          $.post("<?php echo U('Index/quit');?>",
            function(){
              $(location).prop('href',"<?php echo U('Index/index');?>");
            }
            );
        });
        });
    $(document).ready(function(){
        // 权限检测
        var auth = '<?php echo (cookie('login_auth')); ?>';
        if(auth == 'C1_B5' || auth == 'C2_B5'){
            $("li.userpd").hide();
            $("li.adminpd").hide();
            if(auth == 'C1_B5'){
                $("h#auth").text("教学秘书");
            }else{
                $("h#auth").text("科研秘书");
            }
        }else{
            $("h#auth").text("超级管理员");
        }
        });
</script>
  <script type="text/javascript">
   $(document).ready(function(){
$("#dd").click(function(){
    var heit = $("div.nameOfTeacher").css("height");
    
    if(heit=="30px"){
    $("div.nameOfTeacher").animate(
    {
        height:'95px'
    },"fast")}else if(heit=="95px"){
    $("div.nameOfTeacher").animate(
    {
        height:'30px'
    },"fast")}
})

    })</script>
</head>

<body class="body">
<!-- 头部 -->
    <header>

    <!-- 头顶状态栏 -->
        <div class="head">

            <div  class="nameOfTeacher" style="border: solid;border-radius: 10px;background-color: white;font-weight: bold; ">
                <h ><?php echo (cookie('user_name')); ?></h>
                    <span  id="dd" class="iconBlack glyphicon glyphicon-triangle-bottom "style=" float: right;height:20px;width:20px;border: none;background-color: white;margin-right: 10px;margin-top: 3px;" ></span>

            </div>
        </div>
    </header>
    <div id="ddm" style="position: fixed;right: 5px;top: 72px;width: 100px;display:none; z-index: 1;">
        <ul  style="list-style-type: none;padding-left: 0px;padding-top: 0px;">
            <li style="padding-left: 10px;padding-top: 10px;"><a href="<?php echo U('Home/generalTeacherUserInf');?>" style="color: black;" >个人信息</a></li>
            <li  style=";padding-left: 10px;padding-top: 10px;"><a id="quit" style="color: black;">退出</a></li>
        </ul>
    </div>
    <!-- 导航栏 -->
   
    <nav class="nave" style="">
        <ul style="list-style-type: none;line-height: 60px;margin-left: -40px; ">
<div id="d21" style="position:absolute;height:25px;width: 8px;left: -2px;top: 128px;background-color:#BC2F2E;display: none;"></div>
<div id="d22" style="position:absolute;height:25px;width: 8px;left: -2px;top: 168px;background-color:#BC2F2E;display: none;"></div>
<div id="d23" style="position:absolute;height:25px;width: 8px;left: -2px;top: 208px;background-color:#BC2F2E;display: none;"></div>
<div id="d31" style="position:absolute;height:25px;width: 8px;left: -2px;top: 188px;background-color:#BC2F2E;display: none;"></div>
<div id="d32" style="position:absolute;height:25px;width: 8px;left: -2px;top: 228px;background-color:#BC2F2E;display: none;"></div>
<div id="d33" style="position:absolute;height:25px;width: 8px;left: -2px;top: 268px;background-color:#BC2F2E;display: none;"></div>
<div id="d34" style="position:absolute;height:25px;width: 8px;left: -2px;top: 308px;background-color:#BC2F2E;display: none;"></div>
<div id="d35" style="position:absolute;height:25px;width: 8px;left: -2px;top: 348px;background-color:#BC2F2E;display: none;"></div>
<div id="d1" style="position:absolute;height:25px;width: 8px;left: -2px;top: 18px;background-color:#BC2F2E;display: none;"></div>
<div id="d2" style="position:absolute;height:25px;width: 8px;left: -2px;top: 198px;background-color:#BC2F2E;display: none;"></div>
<div id="d3" style="position:absolute;height:25px;width: 8px;left: -2px;top: 258px;background-color:#BC2F2E;display: none;"></div>
<div id="d4" style="position:absolute;height:25px;width: 8px;left: -2px;top: 318px;background-color:#BC2F2E;display: none;"></div>
<div id="d5" style="position:absolute;height:25px;width: 8px;left: -2px;top: 378px;background-color:#BC2F2E;display: none;"></div>
<div id="d11" style="position: absolute;height:25px;width: 8px;left: -2px;top:488px;background-color:#BC2F2E;display: none;"></div>
<div id="d12" style="position:absolute;height:25px;width: 8px;left: -2px;top: 528px;background-color:#BC2F2E;display: none;"></div>
<div id="d13" style="position:absolute;height:25px;width: 8px;left: -2px;top: 568px;background-color:#BC2F2E;display: none;"></div>

        <li id="m1"><a href="<?php echo U('Home/generalTeacher');?>">首页</a></li>
        <li style="" id="drp2"><a style="cursor:pointer">教学情况</a></li>
            <ul style=" list-style-type: none;line-height: 40px;margin-left: -40px;display:none; font-size: 16px; "id="drpmanu2" >
            <li style="" id="dm21"><a href="<?php echo U('Home/generalTeacherTeachAch');?>">教学成果奖</a></li>
            <li style=""id="dm22"><a href="<?php echo U('Home/generalTeacherTeachPro');?>">教改立项/精品课程</a></li>
            <li style=""id="dm23"><a  href="<?php echo U('Home/generalTeacherTeachTbp');?>">教材出版</a></li>
            </ul>
        <li style="" id="drp3"><a style="cursor:pointer">科研情况</a></li>
            <ul style=" list-style-type: none;line-height: 40px;margin-left: -40px;display:none;font-size: 16px; "id="drpmanu3" >     <li style=""id="dm31"><a href="<?php echo U('Home/generalTeacherResearchPap');?>" >论文发表</a></li>
            <li style=""id="dm32"><a href="<?php echo U('Home/generalTeacherResearchMpb');?>">学术专著/译著出版</a></li>
            <li style=""id="dm33"><a href="<?php echo U('Home/generalTeacherResearchAch');?>">科研成果奖</a></li>
            <li style=""id="dm34"><a href="<?php echo U('Home/generalTeacherResearchPro');?>">科研项目主持</a></li>
            <li style=""id="dm35"><a href="<?php echo U('Home/generalTeacherResearchFund');?>">基金类</a></li>
            </ul>
        <li id="m2"><a href="<?php echo U('Home/generalTeacherOtherExc');?>">国际交流</a></li>
        <li id="m3"><a href="<?php echo U('Home/generalTeacherOtherWel');?>">公益活动</a></li>
        <li id="m4"><a href="<?php echo U('Home/generalTeacherOtherNews');?>">新闻记录</a></li>
        <li id="m5"><a href="<?php echo U('Home/generalTeacherUserInf');?>">账号管理</a></li>
         <li style="" class="see" id="drp1"><a>查看院内</a></li>
            <ul class="see" style="list-style-type: none;line-height: 40px;margin-left: -40px;display:none;font-size: 16px;"id="drpmanu1" >     <li style=""id="dm11"><a href="<?php echo U('Home/generalTeacherCount');?>">院内统计信息</a></li>
            <li style="" id="dm12"><a href="<?php echo U('Home/generalTeacherClassifySearch');?>">按分类查看</a></li>
            <li style="" id="dm13"><a href="<?php echo U('Home/generalTeacherUserFind');?>">按教师查看</a></li>
           
            </ul>
        </ul>
    </nav>
    
<div class="main" style="">
<div class="home">
            <h style="font-weight: bold;">院内统计信息 <span class="glyphicon glyphicon-save" style="left: 10px;"></span></h>
        </div>
        <div class="teacher">
                  
        </div>
        <div class="hr0">
            <hr>
        </div>
            <div style="margin-top: -20px;">
                <form id="generalTeacherCount" action="<?php echo U('Home/generalTeacherCount');?>" method="POST">
                <select id="years" name="years" style="padding-left: 8px;box-shadow: 0px 0px 2px 0px rgba(188, 47, 46, 1);font-family: Microsoft Yahei;border: 1px solid rgba(188, 47, 46, 1);border-radius: 7px;outline:none;">
                        <option id="years-all" value="不限">时间不限</option>
                        <option id="years-2017" value="2017">2017</option>
                        <option id="years-2018" value="2018">2018</option>
                </select>
          
        
                <select  id="dep" name="dep" style="padding-left: 8px;width: 200px;height: 30px;line-height: 17px;color: rgba(16, 16, 16, 1);font-size: 12px;box-shadow: 0px 0px 2px 0px rgba(188, 47, 46, 1);font-family: Microsoft Yahei;border: 1px solid rgba(188, 47, 46, 1);border-radius: 7px;margin-left: 20px;">
                        <option id="depall" value="所有系">所有系</option>
                        <option id="dep1" value="思想政治教育系">思想政治教育系</option>
                        <option id="dep2" value="马克思主义基本原理系">马克思主义基本原理系</option>
                        <option id="dep3" value="马克思主义中国化研究系">马克思主义中国化研究系</option>
                        <option id="dep4" value="中国近现代史基本问题研究系">中国近现代史基本问题研究系</option>
                        <option id="dep5" value="思修与形势政策系教学成果奖">思修与形势政策系教学成果奖</option>
                </select>
                <input type="submit" name="submit" id="submit" style="display: none;">
                </form>
           </div>
           <table  style="position: relative;">
            <thead>
                <tr  style="border-bottom: 1px solid;border-color:#A6A6A6;">
                <td class="col1">教学情况</td>
                <td>已通过<strong style="color:red"><?php echo ($all['teachAll']); ?></strong>项</td>
                </tr>
            </thead>
            <tbody>
            <tr>
                <td class="col1">教学成果奖</td>
                <td>已通过<strong style="color:red"><?php echo ($all['teach_ach']); ?></strong>项</td>
                </tr>
                <tr>
                <td class="col1">教改立项/精品课程类</td>
                <td>已通过<strong style="color:red"><?php echo ($all['teach_pro']); ?></strong>项</td>
                </tr>
                <tr>
                <td class="col1">教材出版</td>
                <td>已通过<strong style="color:red"><?php echo ($all['teach_tbp']); ?></strong>项</td>
                </tr>
            </tbody>
           </table>
            <table  style="position: relative;">
            <thead>
                <tr style="border-bottom: 1px solid;border-color:#A6A6A6;" >
                <td class="col1">科研情况</td>
                <td>已通过<strong style="color:red"><?php echo ($all['researchAll']); ?></strong>项</td>
                </tr>
            </thead>
            <tbody>
            <tr>
                <td class="col1">论文发表</td>
                <td>已通过<strong style="color:red"></strong><?php echo ($all['research_pap']); ?>项</td>
                </tr>
                <tr>
                <td class="col1">学术专著/译著出版</td>
                <td>已通过<strong style="color:red"><?php echo ($all['research_mpb']); ?></strong>项</td>
                </tr>
                <tr>
                <td class="col1">科研成果奖</td>
                <td>已通过<strong style="color:red"><?php echo ($all['research_ach']); ?></strong>项</td>
                </tr>
                <tr>
                <td class="col1">科研项目主持</td>
                <td>已通过<strong style="color:red"><?php echo ($all['research_pro']); ?></strong>项</td>
                </tr>
                <tr>
                <td class="col1">基金类</td>
                <td>已通过<strong style="color:red"><?php echo ($all['research_fund']); ?></strong>项</td>
                </tr>
            </tbody>
           </table>
            <table  style="position: relative;">
            <thead>
                <tr style="border-bottom: 1px solid;border-color:#A6A6A6;">
                <td class="col1">其他情况</td>
                <td>已通过<strong style="color:red"><?php echo ($all['otherAll']); ?></strong>项</td>
                </tr>
            </thead>
            <tbody>
            <tr>
                <td class="col1">国际交流</td>
                <td>已通过<strong style="color:red"><?php echo ($all['other_exc']); ?></strong>项</td>
                </tr>
                <tr>
                <td class="col1">公益活动</td>
                <td>已通过<strong style="color:red"><?php echo ($all['other_wel']); ?></strong>项</td>
                </tr>
                <tr>
                <td class="col1">新闻记录</td>
                <td>已通过<strong style="color:red"><?php echo ($all['other_news']); ?></strong>项</td>
                </tr>
            </tbody>
           </table>
</div>
    
</body>
</html>