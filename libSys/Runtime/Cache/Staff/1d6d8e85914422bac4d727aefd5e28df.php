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
     <script type="text/javascript" src="/libSys/public/syspkg/js/jsbarcode/JsBarcode.all.js"></script>
     <link rel="stylesheet" type="text/css" href="/libSys/public/syspkg/bootstrap3.3.7/css/bootstrap.min.css">
     <!-- require user-defined -->
     <script type="text/javascript"></script>
     <link rel="stylesheet" type="text/css" href="/libSys/public/syspkg/css/add.css">
     <title>index</title>
 </head>


 <body onload="createbarcode()"> 
    <div id="div11" style="text-align:center;">
        <div style="text-align:center;margin-bottom:20px;">
            <button class="btnadd" id="print" style="background-color:rgb(58, 58, 59); border-radius:5px;width:80px;margin-right:2px;" onclick="doPrint()" >Print</button>
            <button class="btnadd" id="ok" style="background-color:rgb(27, 65, 114); border-radius:5px;width:80px;margin-left:2px;">Finish</button>
            <!--startprint-->
            
            <div id="div1" style="text-align:center;margin-top:20px;">
                
                </div>
                <!--endprint-->
        </div>
        <!-- <input type="button"  value="Finish" id="ok"/>
        <input type="button"  value="Print" onclick="window.print();" /> -->
    </div>



  <script>  



function doPrint() {   
    var bdhtml=window.document.body.innerHTML;   
    var sprnstr="<!--startprint-->";   
    var eprnstr="<!--endprint-->";   
    var prnhtml=bdhtml.substr(bdhtml.indexOf(sprnstr)+17);   
    prnhtml=prnhtml.substring(0,prnhtml.indexOf(eprnstr));   
    window.document.body.innerHTML=prnhtml;  
    window.print();   
}



 

var jsonStr = sessionStorage.getItem('idlist');
var codelist = [];
//去掉字符串中的空格
jsonStr = jsonStr.replace(" ", "");
//typeof https://www.cnblogs.com/liu-fei-fei/p/7715870.html
if (typeof jsonStr != 'object') {
    //去掉饭斜杠
    jsonStr = jsonStr.replace(/\ufeff/g, "")
    var jsonObj = JSON.parse(jsonStr)
    codelist = jsonObj
}
for (var i=0;i<codelist.length;i++){
    var divv=document.createElement("div");
    var svgg=document.createElement("img");
    //var node=document.createTextNode(codelist[i]);
    //svgg.appendChild(node);
    JsBarcode(svgg, codelist[i]);
    divv.appendChild(svgg);
    //svgg.JsBarcode(codelist[i]);

    var element=document.getElementById("div1");
    element.appendChild(divv);
}
// var para=document.createElement("p");
// var node=document.createTextNode("这是新段落。");
// para.appendChild(node);

// var element=document.getElementById("div1");
// element.appendChild(para);
</script> 
 </body>
</html>




<!-- <body>
    <img id="barcode"  /> 
    <script>  
    function  test(){ 
        var barcode = document.getElementById('barcode'),
         str = "ZJ2017110922361108";
        //  options = {     
        //      format:"CODE128",    
        //       displayValue:true,   
        //         fontSize:18,   
        //           width: 1,
        //  height:20,
        //  }; 
         JsBarcode(barcode, str);
    
    }
    </script> 
    
     <input type="button"  value="create" onclick="test();" />
     <input type="button"  value="print" onclick="window.print();" />
   </body>
  </html> -->