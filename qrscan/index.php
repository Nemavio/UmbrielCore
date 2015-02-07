<html>
<head>
  <meta http-equiv="Content-type" content="text/html;charset=UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
<title>UmbrielSystem - QR Scan</title>

<style type="text/css">
body{
    width:100%;
    text-align:center;
	background-color:#000;
	font-family: Cambria, Hoefler Text, Liberation Serif, Times, Times New Roman, serif;
}
img{
    border:0;
}
#main{
    margin: 15px auto;
    background:black;
    overflow: auto;
	width: 100%;
}
#header{
    background:black;
    margin-bottom:15px;
}
#mainbody{
    background: black;
    width:100%;
	display:none;
}
#footer{
    background:black;
}
#v{
    width:320px;
    height:240px;
}
#qr-canvas{
    display:none;
}
#qrfile{
    width:320px;
    height:240px;
}
#mp1{
    text-align:center;
    font-size:35px;
	color:#fff;
}
#imghelp{
    position:relative;
    left:0px;
    top:-160px;
    z-index:100;
    font:18px arial,sans-serif;
    background:#ffffff;
	margin-left:35px;
	margin-right:35px;
	padding-top:10px;
	padding-bottom:10px;
	border-radius:20px;
}
.selector{
    margin:0;
    padding:0;
    cursor:pointer;
    margin-bottom:-5px;
}
#outdiv
{
    width:320px;
    height:240px;
	border: solid;
	border-color:#fff;
	border-width: 3px 3px 3px 3px;
	border-radius: 5px;
}
#footer a{
	color: black;
}
.tsel{
    padding:0;
}
#result{
color:#fff;
}
</style>

<script type="text/javascript" src="js/llqrcode.js"></script>
<script type="text/javascript" src="js/webqr.js"></script>
<script type="text/javascript" src="js/jquery-2.1.3.min.js"></script>
<script type="text/javascript" src="js/noty/packaged/jquery.noty.packaged.min.js"></script>
<script type="text/javascript" src="js/noty.js"></script>
<script type="text/javascript" >
    function blink(){
      $("#blink").animate({opacity:0},1000).animate({opacity:1}, 1000);
      setTimeout("blink()",500);
   }
</script>
<script type="text/javascript" src="js/soundmanager/script/soundmanager2.js"></script>
<script type="text/javascript">
soundManager.url = 'js/soundmanager/swf/';
</script>
</head>

<body>
<div id="main">
<div id="header">
<p id="mp1">Umbriel System - QRScan</p>
</div>
<div id="mainbody">
<table class="tsel" border="0" width="100%">
<tr>
<td valign="top" align="center" width="50%">
<table class="tsel" border="0">
<tr>
<div class="select" id="select"><form action="index.php" method="get" id="camChange"><label for="videoSource">Video source: </label><select name="src" id="videoSource" onChange="load();"></select></form><button type="submit" form="camChange">changer</button></div>

<td><img class="selector" id="webcamimg" src="vid.png" onclick="setwebcam()" align="left" /></td>
<td><img class="selector" id="qrimg" src="cam.png" onclick="setimg()" align="right"/></td></tr>
<tr><td colspan="2" align="center">
<div id="outdiv">
</div></td></tr>
</table>
</td>
</tr>
<tr><td colspan="3" align="center">
<div id="result"></div>
<div id="audioplay"></div>
</td></tr>
</table>
</div>&nbsp;
<div id="footer">
<br>

</div>
</div>
<canvas id="qr-canvas" width="800" height="600"></canvas>
<script type="text/javascript">load(); blink();</script>
<p align="center"></p>
<p align="center"><a href="qread.php">Mode manuel</a></p>
</body>

</html>