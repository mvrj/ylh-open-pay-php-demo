<!DOCTYPE html>
<html>
<head>
    <title>云联惠开放平台支付接口</title>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <style>
        *{
            margin:0;
            padding:0;
        }
        ul,ol{
            list-style:none;
        }
        body{
            font-family: "Helvetica Neue",Helvetica,Arial,"Lucida Grande",sans-serif;
        }
        .hidden{
            display:none;
        }
        .new-btn-login-sp{
            padding: 1px;
            display: inline-block;
            width: 75%;
        }
        .new-btn-login {
            background-color: #02aaf1;
            color: #FFFFFF;
            font-weight: bold;
            border: none;
            width: 100%;
            height: 30px;
            border-radius: 5px;
            font-size: 16px;
        }
        #main{
            width:100%;
            margin:0 auto;
            font-size:14px;
        }
        .red-star{
            color:#f00;
            width:10px;
            display:inline-block;
        }
        .null-star{
            color:#fff;
        }
        .content{
            margin-top:5px;
        }
        .content dt{
            width:100px;
            display:inline-block;
            float: left;
            margin-left: 20px;
            color: #666;
            font-size: 13px;
            margin-top: 8px;
        }
        .content dd{
            margin-left:120px;
            margin-bottom:5px;
        }
        .content dd input {
            width: 85%;
            height: 28px;
            border: 0;
            -webkit-border-radius: 0;
            -webkit-appearance: none;
        }
        #foot{
            margin-top:10px;
            position: absolute;
            bottom: 15px;
            width: 100%;
        }
        .foot-ul{
            width: 100%;
        }
        .foot-ul li {
            width: 100%;
            text-align:center;
            color: #666;
        }
        .note-help {
            color: #999999;
            font-size: 12px;
            line-height: 130%;
            margin-top: 5px;
            width: 100%;
            display: block;
        }
        #btn-dd{
            margin: 20px;
            text-align: center;
        }
        .foot-ul{
            width: 100%;
        }
        .one_line{
            display: block;
            height: 1px;
            border: 0;
            border-top: 1px solid #eeeeee;
            width: 100%;
            margin-left: 20px;
        }
        .am-header {
            display: -webkit-box;
            display: -ms-flexbox;
            display: box;
            width: 100%;
            position: relative;
            padding: 7px 0;
            -webkit-box-sizing: border-box;
            -ms-box-sizing: border-box;
            box-sizing: border-box;
            background: #1D222D;
            height: 50px;
            text-align: center;
            -webkit-box-pack: center;
            -ms-flex-pack: center;
            box-pack: center;
            -webkit-box-align: center;
            -ms-flex-align: center;
            box-align: center;
        }
        .am-header h1 {
            -webkit-box-flex: 1;
            -ms-flex: 1;
            box-flex: 1;
            line-height: 18px;
            text-align: center;
            font-size: 18px;
            font-weight: 300;
            color: #fff;
        }
    </style>
    <script src="jquery.min.js"></script>
    <script src="qrcode.js"></script>
</head>
<body text=#000000 bgColor="#ffffff" leftMargin=0 topMargin=4>
<header class="am-header">
    <h1>云联惠开放平台支付接口</h1>
</header>
<div id="main">
    <div id="qrcode" style="
    /* text-align: center; */
    width: 256px;
    /* height: 1px; */
    margin: 0 auto;
    margin-top: 10px;
"></div>

</div>



</body>
<script language="javascript">

    new QRCode(document.getElementById('qrcode'), "yunlianhuiApp://OPENQR."+getQueryVariable("order_token"));


    function getQueryVariable(variable)
    {
        var query = window.location.search.substring(1);
        var vars = query.split("&");
        for (var i=0;i<vars.length;i++) {
            var pair = vars[i].split("=");
            if(pair[0] == variable){return pair[1];}
        }
        return(false);
    }

</script>
</html>