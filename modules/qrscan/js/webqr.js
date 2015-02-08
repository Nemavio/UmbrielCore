// QRCODE reader Copyright 2011 Lazar Laszlo
// http://www.webqr.com

var gCtx = null;
var gCanvas = null;
var c=0;
var stype=0;
var gUM=false;
var webkit=false;
var moz=false;
var v=null;

var imghtml='<div id="qrfile"><canvas id="out-canvas" width="320" height="240"></canvas>'+
    '<div id="imghelp">D&eacute;placez un code QR ici'+
	'<br>ou s&eacute;lectionnez un fichier'+
	'<input type="file" onchange="handleFiles(this.files)"/>'+
	'</div>'+
'</div>';

var vidhtml = '<video id="v" autoplay></video>';
function getQuerystring(key, default_) {
       if (default_==null) default_="";
       key = key.replace(/[\[]/,"\\\[").replace(/[\]]/,"\\\]");
       var regex = new RegExp("[\\?&]"+key+"=([^&#]*)");
       var qs = regex.exec(window.location.href);
       if(qs == null) return default_; else return qs[1];
   }
function dragenter(e) {
  e.stopPropagation();
  e.preventDefault();
}

function dragover(e) {
  e.stopPropagation();
  e.preventDefault();
}
function drop(e) {
  e.stopPropagation();
  e.preventDefault();

  var dt = e.dataTransfer;
  var files = dt.files;
  if(files.length>0)
  {
	handleFiles(files);
  }
  else
  if(dt.getData('URL'))
  {
	qrcode.decode(dt.getData('URL'));
  }
}

function handleFiles(f)
{
	var o=[];
	
	for(var i =0;i<f.length;i++)
	{
        var reader = new FileReader();
        reader.onload = (function(theFile) {
        return function(e) {
            gCtx.clearRect(0, 0, gCanvas.width, gCanvas.height);

			qrcode.decode(e.target.result);
        };
        })(f[i]);
        reader.readAsDataURL(f[i]);	
    }
}

function initCanvas(w,h)
{
    gCanvas = document.getElementById("qr-canvas");
    gCanvas.style.width = w + "px";
    gCanvas.style.height = h + "px";
    gCanvas.width = w;
    gCanvas.height = h;
    gCtx = gCanvas.getContext("2d");
    gCtx.clearRect(0, 0, w, h);
}


function captureToCanvas() {
    if(stype!=1)
        return;
    if(gUM)
    {
        try{
            gCtx.drawImage(v,0,0);
            try{
                qrcode.decode();
            }
            catch(e){       
                console.log(e);
                setTimeout(captureToCanvas, 500);
            };
        }
        catch(e){       
                console.log(e);
                setTimeout(captureToCanvas, 500);
        };
    }
}

function htmlEntities(str) {
    return String(str).replace(/&/g, '&amp;').replace(/</g, '&lt;').replace(/>/g, '&gt;').replace(/"/g, '&quot;');
}
function requestHTTP(z)
{
	if(window.XMLHttpRequest)
		xhr_object = new XMLHttpRequest(); 
	  else if(window.ActiveXObject)
		xhr_object = new ActiveXObject("Microsoft.XMLHTTP"); 
	else {
		alert("Votre navigateur ne supporte pas les objets XMLHTTPRequest..."); 
		return; 
	} 
	 
	xhr_object.open("POST", "qread.php", true); 
	     
	xhr_object.onreadystatechange = function() { 
	if(this.readyState == 4) {
	var resp = this.responseText;
	
	var reg_valget=new RegExp("[&]+", "g");
	var valget=resp.split(reg_valget);
	var reg_val=new RegExp("[=]+", "g");
	var val_etat=valget[0].split(reg_val);
	var val_id=valget[1].split(reg_val);
	var val_mail=valget[2].split(reg_val);
	var m="<b>Billet</b> "+val_id[1]+"<br />"+"<b>Compte associ&eacute;</b> "+val_mail[1];
	affMsg(val_etat[1], m);
	}
	} 
	 
	xhr_object.setRequestHeader("Content-type", "application/x-www-form-urlencoded"); 
	var data = "qrdata="+z; 
	xhr_object.send(data);
	
}
function read(a)
{
    var html="<br>";
    html+="<b>"+htmlEntities(a)+"</b><br><br>";
    document.getElementById("result").innerHTML=html;
	requestHTTP(a);
	setTimeout(function () {load();}, 1500);
}	

function isCanvasSupported(){
  var elem = document.createElement('canvas');
  return !!(elem.getContext && elem.getContext('2d'));
}
function success(stream) {
    if(webkit)
        v.src = window.webkitURL.createObjectURL(stream);
    else
    if(moz)
    {
        v.mozSrcObject = stream;
        v.play();
    }
    else
        v.src = stream;
    gUM=true;
    setTimeout(captureToCanvas, 500);
}
		
function error(error) {
    gUM=false;
    return;
}

function load()
{
	if(isCanvasSupported() && window.File && window.FileReader)
	{
		initCanvas(800, 600);
		qrcode.callback = read;
		document.getElementById("mainbody").style.display="inline";
        setwebcam();
	}
	else
	{
		document.getElementById("mainbody").style.display="inline";
		document.getElementById("mainbody").innerHTML='<p id="mp1">Umbriel System - QRScan</p><br>'+
        '<br><p id="mp2">Navigateur non support&eacute; !</p>';
	}
}
//chrome
function gotSources(sourceInfos) {
	var videoSelect = document.querySelector('select#videoSource');
for (var i = 0; i !== sourceInfos.length; ++i) {
var sourceInfo = sourceInfos[i];
var option = document.createElement('option');
option.value = sourceInfo.id;
 if (sourceInfo.kind === 'audio') {
 }else
if (sourceInfo.kind === 'video') {
option.text = sourceInfo.label || 'camera ' + (videoSelect.length + 1);
videoSelect.appendChild(option);
} else {
console.log('Some other kind of source: ', sourceInfo);
}
}
}
//end chrome
function setwebcam()
{
	if (typeof MediaStreamTrack.getSources === 'undefined'){
document.getElementById("select").style.visibility="hidden";
} else {
MediaStreamTrack.getSources(gotSources);
}


	document.getElementById("result").innerHTML="<img src=\"scan.gif\"/><br /><div id=\"blink\">En attente</div>";
    if(stype==1)
    {
        setTimeout(captureToCanvas, 500);    
        return;
    }
    var n=navigator;
    document.getElementById("outdiv").innerHTML = vidhtml;
    v=document.getElementById("v");

    if(n.getUserMedia){
	if(getQuerystring('src') != ''){
			var srcCam = getQuerystring('src');
		n.getUserMedia({video: {optional: [{sourceId: srcCam}]}, audio: false}, success, error);
		}else{
		n.getUserMedia({video: true, audio: false}, success, error);
		}
    }else
    if(n.webkitGetUserMedia)
    {
		webkit = true;
		if(getQuerystring('src') != ''){
			var srcCam = getQuerystring('src');
		n.webkitGetUserMedia({video: {optional: [{sourceId: srcCam}]}, audio: false}, success, error);
		}else{
		n.webkitGetUserMedia({video: true, audio: false}, success, error);
		}

    }
    else
    if(n.mozGetUserMedia)
    {
        moz=true;
        n.mozGetUserMedia({video: true, audio: false}, success, error);
    }

    //document.getElementById("qrimg").src="qrimg2.png";
    //document.getElementById("webcamimg").src="webcam.png";
    document.getElementById("qrimg").style.opacity=0.2;
    document.getElementById("webcamimg").style.opacity=1.0;

    stype=1;
    setTimeout(captureToCanvas, 500);
}
function setimg()
{
	document.getElementById("result").innerHTML="";
    if(stype==2)
        return;
    document.getElementById("outdiv").innerHTML = imghtml;
    //document.getElementById("qrimg").src="qrimg.png";
    //document.getElementById("webcamimg").src="webcam2.png";
    document.getElementById("qrimg").style.opacity=1.0;
    document.getElementById("webcamimg").style.opacity=0.2;
    var qrfile = document.getElementById("qrfile");
    qrfile.addEventListener("dragenter", dragenter, false);  
    qrfile.addEventListener("dragover", dragover, false);  
    qrfile.addEventListener("drop", drop, false);
    stype=2;
}
