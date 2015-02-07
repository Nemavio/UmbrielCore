StringBuilder = function()
{
 this.arrStr = new Array();
 this.Append = function( inVAL )
 {
  this.arrStr[this.arrStr.length] = inVAL;
 }
 this.toString = function()
 {
  return this.arrStr.join('');
 }
 this.Init = function()
 {
  this.arrStr = null;
  this.arrStr = new Array();
 }
}

var objSB = new StringBuilder();

var arrGray = new Array('0','1','2','3','4','5','6','7','8','9','A','B','C','D','E','F');
var arrSafe = new Array('00','33','66','99','CC','FF');
var arrSys = [['D4D0C8', 'ActiveBorder'],['0A246A', 'ActiveCaption'],['808080', 'AppWorkspace'],['3A6EA5', 'Background'],['D4D0C8', 'ButtonFace'],['FFFFFF', 'ButtonHighlight'],['808080', 'ButtonShadow'],['000000', 'ButtonText'],['FFFFFF', 'CaptionText'],['808080', 'GrayText'],['0A246A', 'Highlight'],['FFFFFF', 'HighlightText'],['D4D0C8', 'InactiveBorder'],['0A246A', 'InactiveCaption'],['D4D0C8', 'InactiveCaptionText'],['FFFFE1', 'InfoBackground'],['000000', 'InfoText'],['D4D0C8', 'Menu'],['000000', 'MenuText'],['D4D0C8', 'Scrollbar'],['404040', 'ThreedDarkShadow'],['D4D0C8', 'ThreedFace'],['FFFFFF', 'ThreedHighlight'],['D4D0C8', 'ThreedLightShadow'],['808080', 'ThreedShadow'],['FFFFFF', 'Window'],['000000', 'WindowFrame'],['000000', 'WindowText']];
var arrName = [['FF0000', 'Rouge'],['FFFF00', 'Jaune'],['00FF00', 'Citron vert'],['00FFFF', 'Cyan'],['0000FF', 'Bleu'],['FF00FF', 'Magenta'],['FFFFFF', 'Blanc'],['F5F5F5', 'Blanc cass&eacute;'],['DCDCDC', ''],['D3D3D3', 'Gris clair'],['C0C0C0', 'Argent'],['A9A9A9', 'Gris fonc&eacute;'],['808080', 'Gris'],['696969', ''],['000000', 'Noir'],['2F4F4F', ''],['708090', ''],['778899', ''],['4682B4', 'Bleu acier'],['4169E1', ''],['6495ED', ''],['B0C4DE', ''],['7B68EE', ''],['6A5ACD', ''],['483D8B', ''],['191970', ''],['000080', 'Bleu marine'],['00008B', 'Bleu fonc&eacute;'],['0000CD', ''],['1E90FF', ''],['00BFFF', ''],['87CEFA', ''],['87CEEB', ''],['ADD8E6', 'Bleu clair'],['B0E0E6', ''],['F0FFFF', ''],['E0FFFF', ''],['AFEEEE', ''],['48D1CC', ''],['20B2AA', ''],['008B8B', ''],['008080', ''],['5F9EA0', ''],['00CED1', ''],['00FFFF', 'Eau'],['40E0D0', 'Turquoise'],['7FFFD4', ''],['66CDAA', ''],['8FBC8F', ''],['3CB371', ''],['2E8B57', ''],['006400', 'Vert fonc&eacute;'],['008000', 'Vert'],['228B22', ''],['32CD32', 'Vert citron'],['00FF00', ''],['7FFF00', ''],['7CFC00', ''],['ADFF2F', ''],['98FB98', ''],['90EE90', 'Vert clair'],['00FF7F', ''],['00FA9A', ''],['556B2F', ''],['6B8E23', ''],['808000', ''],['BDB76B', ''],['B8860B', ''],['DAA520', ''],['FFD700', 'Or'],['F0E68C', 'Kaki'],['EEE8AA', ''],['FFEBCD', ''],['FFE4B5', ''],['F5DEB3', ''],['FFDEAD', ''],['DEB887', ''],['D2B48C', ''],['BC8F8F', ''],['A0522D', ''],['8B4513', ''],['D2691E', 'Chocolat'],['CD853F', ''],['F4A460', ''],['8B0000', 'Rouge fonc&eacute;'],['800000', ''],['A52A2A', 'Marron'],['B22222', ''],['CD5C5C', ''],['F08080', ''],['FA8072', ''],['E9967A', ''],['FFA07A', ''],['FF7F50', ''],['FF6347', 'Tomate'],['FF8C00', 'Orange fonc&eacute;'],['FFA500', 'Orange'],['FF4500', 'Orange roug&eacute;'],['DC143C', ''],['FF0000', 'Rouge'],['FF1493', ''],['FF00FF', 'Fuchsia'],['FF69B4', ''],['FFB6C1', 'Rose clair'],['FFC0CB', 'Rose'],['DB7093', ''],['C71585', ''],['800080', ''],['8B008B', 'Magenta fonc&eacute;'],['9370DB', ''],['8A2BE2', ''],['4B0082', 'Indigo'],['9400D3', 'Violet fonc&eacute;'],['9932CC', ''],['BA55D3', ''],['DA70D6', ''],['EE82EE', 'Violet'],['DDA0DD', ''],['D8BFD8', ''],['E6E6FA', ''],['F8F8FF', ''],['F0F8FF', ''],['F5FFFA', ''],['F0FFF0', ''],['FAFAD2', ''],['FFFACD', ''],['FFF8DC', ''],['FFFFE0', 'Jaune clair'],['FFFFF0', ''],['FFFAF0', ''],['FAF0E6', ''],['FDF5E6', ''],['FAEBD7', ''],['FFE4C4', ''],['FFDAB9', ''],['FFEFD5', ''],['FFF5EE', ''],['FFF0F5', ''],['FFE4E1', ''],['FFFAFA', '']];

var intTdDisp = intTblDisp = 0;
var i = j = k = 0;
var objCurrent = objGray = objSafe = objSys = objName = objLegend = objPreview = objSelected = objPreviewTxt = objSelectedTxt = objGlobal = null;
var strColor = '', strColorTxt = '', strCurrent = '';

fctTblFeed = function()
{
 if (intTdDisp != 16) {
  for (i = intTdDisp; i < 16; i++) {
   objSB.Append('<td class="tdColor"><a class="none" href="#">&nbsp;</a></td>');
   intTblDisp++;
  }
 }
 if (intTblDisp != 256) {
  for (i = intTblDisp; i < 256; i++) {
   if (i % 16 == 0) {objSB.Append('</tr><tr>');}
   objSB.Append('<td class="tdColor"><a class="none" href="#">&nbsp;</a></td>');
  }
 }
}

fctIsInSys = function(strColor)
{
 var strOut = '';
 for (ii = 0; ii < arrSys.length; ii++) {
  if (arrSys[ii][0] == strColor) {strOut = arrSys[ii][1]; break;}
 }
 return strOut;
}

fctIsInName = function(strColor)
{
 var strOut = '';
 for (ii = 0; ii < arrName.length; ii++) {
  if (arrName[ii][0] == strColor) {strOut = arrName[ii][1]; break;}
 }
 return strOut;
}

fctOver = function(strColor, strTxt)
{
 objPreview.style.backgroundColor = strColor;
 objPreviewTxt.innerHTML = strColor + '<br>' + strTxt;
}

fctOut = function()
{
 objPreview.style.backgroundColor = '';
 objPreviewTxt.innerHTML = '';
}

fctSetColor = function(strColor, strTxt)
{
 strCurrent = strColor;
 objSelected.style.backgroundColor = strColor;
 objSelectedTxt.innerHTML = strColor + '<br>' + strTxt;
}

fctSelect = function(strArr, strTxt)
{
 objLegend.innerHTML = '&nbsp;' + strTxt + '&nbsp;';
 objGray.style.display = (strArr == 'Gray') ? 'block' : 'none';
 objSafe.style.display = (strArr == 'Safe') ? 'block' : 'none';
 objSys.style.display = (strArr == 'Sys') ? 'block' : 'none';
 objName.style.display = (strArr == 'Name') ? 'block' : 'none';
}

fctHide = function()
{
 fctReset();
 objGlobal.style.display = 'none';
 objCurrent = null;
}

fctReset = function()
{
 objSelected.style.backgroundColor = '';
 objSelectedTxt.innerHTML = '';
 strCurrent = '';
}

fctOk = function()
{
 objCurrent.value = strCurrent.toUpperCase();
 fctHide();
}

fctShow = function(objForm)
{
 if (objForm) {
  objCurrent = objForm;
  if (objForm.value + '' != '') {
   strColor = objForm.value.replace('#', '');
   strColorTxt = '' + fctIsInName(strColor);
   if (strColorTxt == '') {strColorTxt = '' + fctIsInSys(strColor);}
   fctSetColor('#' + strColor, strColorTxt)
  } else {
   fctReset();
  }
  fctSelect('Name', 'Named');
 }
 if (objCurrent) {
  var w = h = t = l = 0;
  if (self.innerHeight) {
   w = self.innerWidth;
   h = self.innerHeight;
  } else if (document.documentElement && document.documentElement.clientHeight) {
   w = document.documentElement.clientWidth;
   h = document.documentElement.clientHeight;
  } else if (document.body) {
   w = document.body.clientWidth;
   h = document.body.clientHeight;
  }
  if (self.pageYOffset) {
   l = self.pageXOffset;
   t = self.pageYOffset;
  } else if (document.documentElement && document.documentElement.scrollTop) {
   l = document.documentElement.scrollLeft;
   t = document.documentElement.scrollTop;
  } else if (document.body) {
   l = document.body.scrollLeft;
   t = document.body.scrollTop;
  }
  if (objGlobal.style.display != 'block') {objGlobal.style.display = 'block';}
  objGlobal.style.top = parseInt(((h - objGlobal.offsetHeight) / 2) + t, 10) + 'px';
  objGlobal.style.left = parseInt(((w - objGlobal.offsetWidth) / 2) + l, 10) + 'px';
 }
}

fctLoad = function()
{
 var objDiv = document.createElement('DIV');
 objDiv.id = 'objCP';
 objDiv.style.display = 'inline';
 document.body.appendChild(objDiv);
 objDiv.innerHTML = objSB.toString();
 objPreview = document.getElementById('objPreview');
 objSelected = document.getElementById('objSelected');
 objPreviewTxt = document.getElementById('objPreviewTxt');
 objSelectedTxt = document.getElementById('objSelectedTxt');
 objGlobal = document.getElementById('tblGlobal');
 objGray = document.getElementById('tblGray');
 objSafe = document.getElementById('tblSafe');
 objSys = document.getElementById('tblSys');
 objName = document.getElementById('tblName');
 objLegend = document.getElementById('objLegend');
 fctSelect('Name', 'Named');
}

objSB.Append('<table id="tblGlobal" class="tblGlobal" border="0" cellpadding="0" cellspacing="0"><tr><td class="tdContainer"><table border="0" cellpadding="0" cellspacing="0" width="100%"><tr>');
objSB.Append('<td width="24%" align="center"><input type="button" value="Couleur de base" class="btnPalette" onClick="fctSelect(\'Name\', \'Named\');"></td>');
/*objSB.Append('<td width="23%" align="center"><input type="button" value="Safety" class="btnPalette" onClick="fctSelect(\'Safe\', \'Safety\');"></td>');*/
/*objSB.Append('<td width="23%" align="center"><input type="button" value="System" class="btnPalette" onClick="fctSelect(\'Sys\', \'System\');"></td>');*/
objSB.Append('<td width="30%" align="center"><input type="button" value="Niveau de gris" class="btnPalette" onClick="fctSelect(\'Gray\', \'Grayscale\');"></td>');
objSB.Append('</tr></table></td></tr><tr><td class="tdContainer"><fieldset><legend align="top" id="objLegend"></legend><table id="tblContainer" class="tblContainer" border="0" cellpadding="0" cellspacing="0"><tr><td class="tdContainer">');

objSB.Append('<table id="tblGray" class="tblColor" border="0" cellpadding="0" cellspacing="0"><tr>');
for (i = 0; i < arrGray.length; i++) {
 for (j = 0; j < arrGray.length; j++) {
  strColor = '' + arrGray[i] + arrGray[j] + arrGray[i] + arrGray[j] + arrGray[i] + arrGray[j];
  strColorTxt = '' + fctIsInName(strColor);
  if (strColorTxt == '') {strColorTxt = '' + fctIsInSys(strColor);}
  objSB.Append('<td class="tdColor"><a class="color" href="javascript:fctSetColor(\'#' + strColor + '\', \'' + strColorTxt + '\');" style="background-color:#' + strColor + ';" onMouseOver="fctOver(\'#' + strColor + '\', \'' + strColorTxt + '\');" onMouseOut="fctOut();">&nbsp;</a></td>');
  intTdDisp++;
  intTblDisp++;
 }
 if (i < arrGray.length - 1) {
  objSB.Append('</tr><tr>');
  intTdDisp = 0;
 }
}
fctTblFeed();
objSB.Append('</tr></table>');
intTdDisp = intTblDisp = 0;

objSB.Append('<table id="tblSafe" class="tblColor" border="0" cellpadding="0" cellspacing="0"><tr>');
for (i = 0; i < arrSafe.length; i++) {
 for (j = 0; j < arrSafe.length; j++) {
  for (k = 0; k < arrSafe.length; k++) {
   if (intTblDisp % 16 == 0 && intTdDisp != 0) {
    objSB.Append('</tr><tr>');
    intTdDisp = 0;
   }
   strColor = '' + arrSafe[i] + arrSafe[j] + arrSafe[k];
   strColorTxt = '' + fctIsInName(strColor);
   if (strColorTxt == '') {strColorTxt = '' + fctIsInSys(strColor);}
   objSB.Append('<td class="tdColor"><a class="color" href="javascript:fctSetColor(\'#' + strColor + '\', \'' + strColorTxt + '\');" style="background-color:#' + strColor + ';" onMouseOver="fctOver(\'#' + strColor + '\', \'' + strColorTxt + '\');" onMouseOut="fctOut();">&nbsp;</a></td>');
   intTdDisp++;
   intTblDisp++;
  }
 }
}
fctTblFeed();
objSB.Append('</tr></table>');
intTdDisp = intTblDisp = 0;

objSB.Append('<table id="tblSys" class="tblColor" border="0" cellpadding="0" cellspacing="0"><tr>');
for (i = 0; i < arrSys.length; i++) {
 if (intTblDisp % 16 == 0 && intTdDisp != 0) {
  objSB.Append('</tr><tr>');
  intTdDisp = 0;
 }
 strColor = '' + arrSys[i][0];
 strColorTxt = '' + arrSys[i][1];
 objSB.Append('<td class="tdColor"><a class="color" href="javascript:fctSetColor(\'#' + strColor + '\', \'' + strColorTxt + '\');" style="background-color:#' + strColor + ';" onMouseOver="fctOver(\'#' + strColor + '\', \'' + strColorTxt + '\');" onMouseOut="fctOut();">&nbsp;</a></td>');
 intTdDisp++;
 intTblDisp++;
}
fctTblFeed();
objSB.Append('</tr></table>');
intTdDisp = intTblDisp = 0;

objSB.Append('<table id="tblName" class="tblColor" border="0" cellpadding="0" cellspacing="0"><tr>');
for (i = 0; i < arrName.length; i++) {
 if (intTblDisp % 16 == 0 && intTdDisp != 0) {
  objSB.Append('</tr><tr>');
  intTdDisp = 0;
 }
 strColor = '' + arrName[i][0];
 strColorTxt = '' + arrName[i][1];
 objSB.Append('<td class="tdColor"><a class="color" href="javascript:fctSetColor(\'#' + strColor + '\', \'' + strColorTxt + '\');" style="background-color:#' + strColor + ';" onMouseOver="fctOver(\'#' + strColor + '\', \'' + strColorTxt + '\');" onMouseOut="fctOut();">&nbsp;</a></td>');
 intTdDisp++;
 intTblDisp++;
}
fctTblFeed();
objSB.Append('</tr></table></td></tr></table></fieldset></td></tr><tr><td class="tdContainer">');
objSB.Append('<table border="0" cellpadding="0" cellspacing="0" width="100%">');
objSB.Append('<tr><td class="tdDisplay" id="objPreview">&nbsp;</td><td class="tdDisplay" id="objSelected">&nbsp;</td></tr>');
objSB.Append('<tr><td class="tdDisplayTxt" id="objPreviewTxt" valign="top">&nbsp;</td><td class="tdDisplayTxt" id="objSelectedTxt" valign="top">&nbsp;</td></tr>');
objSB.Append('</table></td></tr><tr><td class="tdContainer">');
objSB.Append('<table border="0" cellpadding="0" cellspacing="0" width="100%"><tr>');
objSB.Append('<td width="33%" align="center"><input type="button" value="Annuler" class="btnColor" onClick="fctHide();"></td>');
objSB.Append('<td width="34%" align="center"><input type="button" value="Par d&eacute;faut" class="btnColor" onClick="fctReset();"></td>');
objSB.Append('<td width="33%" align="center"><input type="button" value="Valider" class="btnColor" onClick="fctOk();"></td>');
objSB.Append('</tr></table></td></tr></table>');