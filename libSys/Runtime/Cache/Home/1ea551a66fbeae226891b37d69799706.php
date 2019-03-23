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
    <link rel="stylesheet" type="text/css" href="/mksys/Public/syspkg/css/jiaoxue.css">
    <link href="/mksys/Public/syspkg/css/fram.css" rel="stylesheet" >
    <script type="text/javascript" src="/mksys/Public/syspkg/js/fram.js"></script>
    <title>教师成果网-普通教师端</title>
    <style>
       body.my-skin.layui-layer-btn1{background-color: #BC2F2E;}
        input
      {
        outline: none;
      }
      select
        {

              outline: none;
        }
    </style>
</head>
  <script type="text/javascript">
   $(document).ready(function(){


var pageId = '<?php echo ($page); ?>';
//页面编码为： page1 
 //            page21 page22 page23
 //            page31 page32 page33 page34 page35
 //            ......
//switch case 实例：
if(pageId=='page32')
{
    $("#drp3").click();
    $("#m32").css("background-color","#363536");
    $("#d32").css("display","inline");
}

$("#dd").click(function(){
    var heit = $("div.nameOfTeacher").css("height");
    
    if(heit=="30px"){
    $("div.nameOfTeacher").animate(
    {
        height:'100px'
    },"fast")}else if(heit=="100px"){
    $("div.nameOfTeacher").animate(
    {
        height:'30px'
    },"fast")}
})

    })</script>
<script>

    layer.config({
        skin:'my-skin'
    });
              /*编辑项目*/
       $(document).ready(function(){
       $("button.update").click(function(){
            var id = $(this).attr("id");
            var name = $("td#"+id+"-name").text();
            var pub = $("td#"+id+"-pub").text();
            var partner = $("td#"+id+"-partner").text();
            var tm = $("td#"+id+"-tm").text();
           
         
        layer.confirm('编辑项目后，已通过的项目将重新提交审核', {
            btn: ['确定','取消'], //按钮
               time:10000
        }, function(){
               
               layer.open({
                   type: 2,
                   title: '编辑',
                   shadeClose: true,
                   shade: 0.8,
                   area: ['700px', '480px'],
                   content: "generalTeacherResearchMpbEdit.html" ,//iframe的url
                    success: function(layero,index)
                    {
                      var input_name = layer.getChildFrame('#name',index);
                      input_name.val(name);
                      var input_pub = layer.getChildFrame('#pub',index);
                      input_pub.val(pub);
                      var input_partner = layer.getChildFrame('#partner',index);
                      input_partner.val(partner);
                      var input_tm = layer.getChildFrame('#tm',index);
                      input_tm.val(tm);
                      var input_id = layer.getChildFrame('#updateOld',index);
                      input_id.click(function(){
                         var form1 = layer.getChildFrame('form#changeTa', index);

                         form1.ajaxSubmit({
                          url : "<?php echo U('Home/updateResearchMpb');?>",
                          data: { data : id },
                          type : "post",
                          enctype : "multipart/form-data",
                          dataType:'json',
                          success: function(data){
                          
                            if(data == 'success'){
                               layer.closeAll();
                              window.location.reload();
                             }else if(data=='uploadfail'){
                              alert('文件上传失败');
                             }else{
                               alert('更新失败！');
                             }
                           
                          }
                        });
                          
                      });
                    }
               });
           }, function(){
               layer.closeAll();
            });
         
      
         });
        });
    /*添加项目*/
    $(document).ready(function(){
        $("button.add").click(function(){
            layer.open({
                type: 2,
                title: '添加',
                shadeClose: true,
                shade: 0.8,
                area: ['700px', '480px'],
                content: 'generalTeacherResearchMpbAdd.html', //iframe的url
                success: function(layero,index)
                {
                  var button = layer.getChildFrame('#btn',index);
                  button.click(function(){
                    var form = layer.getChildFrame('form#addresearchmpb',index);
                   
                      form.ajaxSubmit({
                          url : "<?php echo U('Home/insertResearchMpb');?>",
                          type : "post",
                          enctype : "multipart/form-data",
                          dataType:'json',
                          success: function(data){
                             if(data == "success"){
                              layer.closeAll(); 
                             window.location.reload();
                           }
                           else if(data == "cookiefail"){
                            window.location.href = "<?php echo U('Index/index');?>";
                          }else{
                            alert('添加失败！');
                           }
                          }
                        });
                          
                  });
                  
                }
            });  
            });
    });

 
      $(document).ready(function(){
        /*删除项目*/
        $("button.delete").click(function(){
            var  id = $(this).attr("id");
            layer.confirm('可点击“编辑”以再次编辑并重新提交审核,删除后将不可恢复，确定删除该项目吗？',{
                    btn:['确定','取消']
                },function () {
                    //删除确定的ajax代码应该放在这里
                     $.post("<?php echo U('Home/deleteResearchMpb');?>",{
                        data  : id
                      },
                      function(data,status){
                        if(status == "success"){
                          if(data=='fail'){
                             alert("删除失败！");
                          }else{
                             $("tr#"+data).hide();
                          }
                        }         
                      }
                      );
                    layer.closeAll();
                    window.location.reload();
                },
                function () {
                    layer.closeAll();
                });        
        });

        /*退出登录*/
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
        if(auth == 'B1_A'){
            $("li.see").hide();
            $("ul.see").hide();
        }
    });
</script>
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
<!-- 主体部分 -->
    <div class="main">
        <div class="home" style="width:220px">
            <h style="font-weight: bold;">学术专著/译著出版</h>
        </div>
        <div class="teacher" style="margin-left: 130px;">
            <h name="xi"><?php echo ($researchMpb_WAIT); ?>项待审核 
            <?php echo ($researchMpb_YES); ?>项已通过 
            <?php echo ($researchMpb_NO); ?>项未通过</h>    
        </div>
        <div class="hr0">
            <hr>
        </div>
        <script type="text/javascript">
        $('#bPass').tab('show') // Select tab by name
        $('#bStay').tab('show') // Select first tab
        $('#noPass').tab('show') // Select last tab
        </script>
        <script >
               
        </script>
        
        <button class="b active" href="#stay" id="bStay" data-toggle="tab" >待审核</button>
        <button class="b" href="#pass" id="bPass" data-toggle="tab" >已通过</button>
        <button class="b" href="#noPass" id="bNoPass" data-toggle="tab" >未通过</button>
        <button class="add">添加</button>
        
        <div class="tab-content">
       
         <!-- 待审核 -->
        <div id="stay" class="tab-pane active">
        <table>
            <thead>
                <tr>
                    <td>
                        专著、译著名称
                    </td>
                    <td>
                        出版社
                    </td>
                    <td>
                        合著情况
                    </td>
                    <td>
                        出版时间
                    </td>
                     <td>
                        操作
                    </td>
                </tr>
            </thead>
            <tbody>
              <?php if(is_array($researchMpbWAIT)): $i = 0; $__LIST__ = $researchMpbWAIT;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$ta): $mod = ($i % 2 );++$i;?><tr id="<?php echo ($ta['num']); ?>-<?php echo ($ta['years']); ?>-WAIT">
              <td id="<?php echo ($ta['num']); ?>-<?php echo ($ta['years']); ?>-WAIT-name"><?php echo ($ta['name']); ?></td>
                <td id="<?php echo ($ta['num']); ?>-<?php echo ($ta['years']); ?>-WAIT-pub"><?php echo ($ta['pub']); ?></td>
                <td id="<?php echo ($ta['num']); ?>-<?php echo ($ta['years']); ?>-WAIT-partner"><?php echo ($ta['partner']); ?></td>
                <td id="<?php echo ($ta['num']); ?>-<?php echo ($ta['years']); ?>-WAIT-tm"><?php echo ($ta['tm']); ?></td>
                <td><button class="update" id="<?php echo ($ta['num']); ?>-<?php echo ($ta['years']); ?>-WAIT">编辑</button>
                 <button class="delete" id="<?php echo ($ta['num']); ?>-<?php echo ($ta['years']); ?>-WAIT">删除</button></td>
              </tr><?php endforeach; endif; else: echo "" ;endif; ?>
   
            </tbody>
        </table>
        </div>
         <!-- 已通过 -->
        <div id="pass" class="tab-pane">
        <table>
            <thead>
                <tr>
                    <td>
                        专著、译著名称
                    </td>
                    <td>
                        出版社
                    </td>
                     <td>
                        合著情况
                    </td>
                     <td>
                        出版时间
                    </td>
                     <td>
                        操作
                    </td>
                </tr>
            </thead>
            <tbody>
                   <?php if(is_array($researchMpbYES)): $i = 0; $__LIST__ = $researchMpbYES;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$ta): $mod = ($i % 2 );++$i;?><tr id="<?php echo ($ta['num']); ?>-<?php echo ($ta['years']); ?>-YES">
                <td id="<?php echo ($ta['num']); ?>-<?php echo ($ta['years']); ?>-YES-name"><?php echo ($ta['name']); ?></td>
                <td id="<?php echo ($ta['num']); ?>-<?php echo ($ta['years']); ?>-YES-pub"><?php echo ($ta['pub']); ?></td>
                <td id="<?php echo ($ta['num']); ?>-<?php echo ($ta['years']); ?>-YES-partner"><?php echo ($ta['partner']); ?></td>
                <td id="<?php echo ($ta['num']); ?>-<?php echo ($ta['years']); ?>-YES-tm"><?php echo ($ta['tm']); ?></td>
                <td><button class="update" id="<?php echo ($ta['num']); ?>-<?php echo ($ta['years']); ?>-YES">编辑</button>
                 <button class="delete" id="<?php echo ($ta['num']); ?>-<?php echo ($ta['years']); ?>-YES">删除</button></td>
              </tr><?php endforeach; endif; else: echo "" ;endif; ?>
            </tbody>
        </table>
        </div>
         <!-- 未通过 -->
        <div id="noPass" class="tab-pane">
        <table>
            <thead>
                <tr>
                    <td>
                        专著、译著名称
                    </td>
                    <td>
                        出版社
                    </td>
                    <td>
                        合著情况
                    </td>
                    <td>
                        出版时间
                    </td>
                    <td>
                        未通过理由
                    </td>
                     <td>
                        操作
                    </td>
                </tr>
            </thead>
            <tbody>
                   
            <?php if(is_array($researchMpbNO)): $i = 0; $__LIST__ = $researchMpbNO;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$ta): $mod = ($i % 2 );++$i;?><tr id="<?php echo ($ta['num']); ?>-<?php echo ($ta['years']); ?>-NO">
                <td id="<?php echo ($ta['num']); ?>-<?php echo ($ta['years']); ?>-NO-name"><?php echo ($ta['name']); ?></td>
                <td id="<?php echo ($ta['num']); ?>-<?php echo ($ta['years']); ?>-NO-pub"><?php echo ($ta['pub']); ?></td>
                <td id="<?php echo ($ta['num']); ?>-<?php echo ($ta['years']); ?>-NO-partner"><?php echo ($ta['partner']); ?></td>
                <td id="<?php echo ($ta['num']); ?>-<?php echo ($ta['years']); ?>-NO-tm"><?php echo ($ta['tm']); ?></td>
                <td id="<?php echo ($ta['num']); ?>-<?php echo ($ta['years']); ?>-NO-reason"><?php echo ($ta['reason']); ?></td>
                <td><button class="update" id="<?php echo ($ta['num']); ?>-<?php echo ($ta['years']); ?>-NO">编辑</button>
                 <button class="delete" id="<?php echo ($ta['num']); ?>-<?php echo ($ta['years']); ?>-NO">删除</button></td>
              </tr><?php endforeach; endif; else: echo "" ;endif; ?>
            </tbody>
        </table>
        </div>
        </div>
      
        
        
        
</body>
</html>