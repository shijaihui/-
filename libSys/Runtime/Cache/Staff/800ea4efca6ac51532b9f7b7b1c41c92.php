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
 <body onload="test()">
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
</html>