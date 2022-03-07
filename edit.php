<?php // 1st line defines file type or tag
/* filePathName: edit_php/edit.php */
/* Uploaded: 23:46:13,  Mon 7 Mar 2022 */
/* LineNo: 137 */

// Free Open Source - Created by -  Ian Small, Australia

header('Content-type: text/html; charset=utf-8');
header("Cache-Control: no-cache, no-store, must-revalidate");
header("Pragma: no-cache");
header("Expires: 0"); 
touch('.chosen');
@chmod('.chosen',0666);  
$cb='CB='.date('U');
$D=new DateTime("now", new DateTimeZone('Australia/Melbourne'));
$udt=$D->format("G:i:s,  D j M Y");

if(isset($_REQUEST['dpn'])){
 $dpn=$_REQUEST['dpn'];
 $bn=basename($dpn);
 $fn=str_replace($bn,'',$dpn);
 $fn='../'.basename($fn).'/'. str_replace('_','.',basename($fn));
 $h = fopen('.chosen', "w+");
 fwrite($h,$fn."\n");
 fclose($h);
 $dpn=str_replace($bn,'BAK/zdel'.Date('.m.d.H.i.').$bn, $dpn);
 rename($_REQUEST['dpn'],$dpn);
 exit();
}

if(isset($_REQUEST['x'])) {
  echo 'testGot: '.urldecode($_REQUEST['x']);
  exit();
}

if(isset($_REQUEST['h'])) {
   $ptn='/\* Uploaded:(.*?) \*/i';
   $rs='* Uploaded: '.$udt.' *';
   $ns= trim(preg_replace($ptn, $rs, $_REQUEST['h'],1));
   $ns=preg_replace("/\r\n/","\n",$ns);
   $pn=trim(preg_replace("/\*\//", "",
                   explode(': ',explode("\n",$ns)[1])[1]),'*/>" ');
   if(strlen($pn)<5) $pn='Error/noPathName';

   $spn=explode('/',$pn);
   $p=dirname(getcwd());
   $d=$spn[0];
   $n=$spn[1];
   $np=$p.'/'.$d.'/'; 
   $npn=$p.'/'.$pn;
   $bup=$p.'/'.$d.'/BAK';
   $bun=pathinfo($n)['filename']
             .Date('.m.d.H.i.s.')
             .pathinfo($n)['extension'];
   $bupn=$bup.'/'.$bun;
  @mkdir($np);
  @chmod($np,0777);
  @mkdir($bup);
  @chmod($bup,0777); 
 
  file_put_contents($npn, $ns);
  file_put_contents($bupn, $ns);
  @chmod($npn,0666);
  @chmod($bupn,0666);
  exit;
}

if(isset($_REQUEST['newPrj'])) {
   $fn=$_REQUEST['newPrj'];
   $spn=explode('.',$fn);
   $d=$spn[0].'_'.$spn[1];
   $p=dirname(getcwd());
   $np=$p.'/'.$d.'/';
   $h = fopen('.chosen', "w+");
   fwrite($h, '../'.$d.'/'.$fn."\n");
   fclose($h);
   if(is_dir($np)) {
      echo "Project Already Exists"; 
      exit;
   }
  @mkdir($np);
  @chmod($np,0777);
   $np=$p.'/'.$d.'/BAK/';
  @mkdir($np);
  @chmod($np,0777);
   $npn=$p.'/'.$d.'/'.$fn;
   if($spn[1]=='svg') {
     $t="<!--\n"
         ."/* FilePathName: ".$d.'/'.$fn." */\"\n"
         ."/* Uploaded: ".$udt." */\n"
         ."/* LineNo: 4 */ -->\n"
         ."<svg xmlns=\"http://www.w3.org/2000/svg\" "
         ."viewBox=\"0 0 100 100\"\n"
         ."    style=\"background:yellow;\">\n"
         ."<rect id=\"sbox\" width=\"48\" height=\"48\" x=\"24\" y=\"24\"\n"
         ."   style=\"fill:grey;outline:solid 6px cyan;\"/>\n\n"
         ." <animateTransform href=\"#sbox\" attributeName=\"transform\"\n" 
         ."  attributeType=\"XML\" type=\"rotate\"\n"
         ."  from=\"0 50 50\" to=\"360 50 50\" dur=\"10s\" begin=\"0s\"\n"
         ."  repeatCount=\"indefinite\"/>\n\n</svg>\n\n";
   } else {
     $t="<!DOCTYPE html>\n"
        ."<html data-a=\"/* FilePathName: ".$d.'/'.$fn." */\"\n"
        ."           data-b=\"/* Uploaded: ".$udt." */\"\n"
        ."           data-c=\"/* LineNo: 4 */\"\n"
        ."  lang=\"en\">\n"
        ."<head>\n"
        ."<meta http-equiv=\"Content-Type\""
        ." content=\"text/html;\" charset=\"utf-8\">\n"
        ."<meta name=\"format-detection\" content=\"telephone=no\">\n"
        ."<meta name=\"HandheldFriendly\" content=\"True\">\n"
        ."<meta name=\"MobileOptimized\" content=\"320\">\n"
        ."<meta name=\"apple-mobile-web-app-status-bar-style\""
        ." content=\"black\">\n"
        ."<meta name=\"apple-mobile-web-app-capable\" content=\"yes\">\n"
        ."<meta name=\"viewport\" content=\n    \"width=device-width,"
        ."user-scalable=yes\">\n"
        ."<meta name=\"channel\" content=\"channel:content:to:define!\">\n"
        ."</head>\n<body>\n<h3>&nbsp;This is - ".$d.'/'.$fn."</h3>\n";
        if($spn[1]=='php') $t.="\n<?php phpinfo(); ?>\n\n";
        $t.="<link rel='stylesheet' href='".$spn[0].".css'>\n"
        ."<script src=".$spn[0].".js></script>\n"
        ."</body>\n</html>\n";
   }
   file_put_contents($npn, $t);
  @chmod($npn,0666);
   $npn=$p.'/'.$d.'/'.$spn[0].'.js';
   $t="// commented or blank 1st  line for this editor system no tag for js\n"
        ."/* filePathName: ".$d.'/'.$spn[0].'.js'." */\n"
        ."/* Uploaded: ".$udt." */\n"
        ."/* LineNo: 4 */\n\n"
        ." setTimeout(function(){alert('This is ".$d.'/'.$spn[0].'.js'."');},300);\n\n";
   file_put_contents($npn, $t);
  @chmod($npn,0666);
   $npn=$p.'/'.$d.'/'.$spn[0].'.css';
   $t="/* Comment out 1st line for this editor system no tag for css */\n"
        ."/* filePathName: ".$d.'/'.$spn[0].'.css'." */\n"
        ."/* Uploaded: ".$udt." */\n"
        ."/* LineNo: 4 */\n\n body{margin:0;padding:0;background:#af5;}\n\n";
   file_put_contents($npn, $t);
  @chmod($npn,0666);
  exit;
}

$fn='';
if(isset($_REQUEST['fn'])) {
  $fn=$_REQUEST['fn'];
  if(strlen($fn)>5){
    $h = fopen($fn, "r");
    echo fread($h, filesize($fn));
    fclose($h);
    $h = fopen('.chosen', "w+");
    fwrite($h,$fn."\n");
    fclose($h);
  }
  exit;
}

if(isset($_REQUEST['ch'])) {
  $h = fopen('.chosen', "r");
  echo fread($h, filesize('.chosen'));
  fclose($h);
  exit;
}

function remall($d) { 
   if (is_dir($d)) { 
     $os = scandir($d); 
     foreach ($os as $o) { 
       if ($o != "." && $o != "..") { 
         if (filetype($d."/".$o) == "dir") {
            remall($d."/".$o);
         } else {
            unlink($d."/".$o); 
         }
       } 
     } 
     reset($os); 
     rmdir($d); 
   } 
} 

if(isset($_REQUEST['remall'])) {
   $dir=$_REQUEST['remall'];
   if($dir=='../edit_php') {
     echo "Project is Protected\n\n".$dir;
     exit;
   }
   $h = fopen('.chosen', "w+");
   fwrite($h, '0_BEGIN_txt/0_BEGIN.txt'."\n");
   fclose($h);
   remall($dir);
   exit;
}

$fc=0;
if(isset($_REQUEST['cf'])) { 
  $h = fopen('.chosen', "r");
  $fpc=fread($h, filesize('.chosen'));
  fclose($h);
  $i=0;
  $fp='';
  $d    = '../';
  $p= scandir($d);
  foreach ($p as $k => $v) {
   if($i%2)$bg='#eee5;';else $bg='#bbb5;'; 
   if(!strchr($v,'.') and strchr($v,'_')) 
      echo '<pre class=cfb style=background:'.$bg.'>'; 
    if(!strchr($v,'.') and strchr($v,'_') and is_dir($d.$v)) {
       $f=scandir($d.$v);
       echo '<i onclick=ra(\''.$d.$v.'\'); class=cfd>In Directory: '.$d.$v
               ."/</i>\n";
       foreach ($f as $c => $n) {
          $fp=$d.$v.'/'.$n;
          if(is_file($fp)){
             $fc++; 
             $selected='';
             $style='';
              $fillsp='';
             if(strstr($fpc,$fp)) {
                 $selected='SELECTED'; 
                 $style=' style=background:#7f7; ';
                 $fillsp='           << '.$selected
                            .'                                                          ';
             }
           echo '<b onclick=getFile("'.$fp.'"); id='.$selected
                     .$style.' >'
                    .'<b class=fcc>'.$fc.'</b> '.$fp.$fillsp."</b>\n";
          }
       }
     }
     $i++;
     if(!strchr($v,'.'))  echo "</pre>\n";
   }

   echo "<br>&nbsp;&nbsp;&nbsp;&nbsp;End of List<br><br><br>\n";
  exit;
} /****************************************************/ ?>
<!DOCTYPE html> 
<html lang="en">
<head>
<meta charset="utf-8">
<meta http-equiv="x-dns-prefetch-control" content="off">
<meta http-equiv="X-UA-Compatible" content="IE=edge, chrome=1">
<meta http-equiv="Content-Type" content="text/html;" charset="utf-8">
<meta name="format-detection" content="telephone=no">
<meta name="HandheldFriendly" content="True">
<meta name="MobileOptimized" content="320">
<meta name="apple-mobile-web-app-status-bar-style" content="black">
<meta name="apple-mobile-web-app-capable" content="yes">
<meta name="viewport" content=
    "width=device-width,initial-scale=1,maximum-scale=1,user-scalable=no">
<meta name="channel" content="channel:content:to:define!">
<script>
'use strict'

window.onerror=function(m,u,l,c){
   m=m.replace(': ','   — \n'); c-=1; l+=224;
      alert(m+'\n@File: '+u+'\n@Line: '+l+',       @Char: '+c+'\n');
      moveToLine(l);
   return;
 }
 function tc(e){alert(e.stack);return;}

  // alert(document.currentScript.id+'\n\n'+document.currentScript.src);
function hasFocus(i){return document.activeElement.id==i;}
function qS(t){return document.querySelector(t);}
function qC(t){return document.querySelector(t).style;}
function gE(i){return document.getElementById(i);}
function gS(i){return document.getElementById(i).style;}
function isVisible(i){return gS(i).visibility=='visible';}
function cE(t){return document.createElement(t);}
function hA(o){document.head.appendChild(o);}
function baF(){document.body.appendChild(dF);}
function sT(p,t){p.style.cssText=t;}
function adF(e){dF.appendChild(e);}
function aC(p,c){p.appendChild(c);}
function cN(p,n){p.className=n;}
function iH(p,t){p.innerHTML=t;}
function gET(t){return document.getElementsByTagName(t);}
function cR(s,r){return document.styleSheets[s].cssRules[r].style;}
function sC(v){document.styleSheets[0].cssRules[1].style.content='"'+v+'"';}
function gCP(v) {
  return getComputedStyle(document.documentElement).getPropertyValue(v);
}
function gCPI(p) {return parseInt(gCP(p));}
function sCP(p,v) {
      document.documentElement.style.setProperty(p,v);
}
</script>
</head>
<body>
<b id="hideAll" style="text-align:center;font:bold 40px/200px '';
  position:fixed;top:0;left:0;height:110vh;width:100vw;
  display:inline-block;color:red;background:#afa;z-index:100;
"></b><b id="topEditorHost">HOST DETAILS</b>
<s><textarea id="lines"></textarea>
<q></q><u></u><p></p><b id="hl"></b>
<textarea id="ta"
  onclick="selectLine(event, 1)" onkeyup="//valChange(event)"></textarea>
</s>
<b id="tMenu"><b id="info">info</b>
<b id="lineClicked" onclick="lastEditedLine(this)">Line Clicked</b>
<input id="gtn" type="text" inputmode="decimal" placeholder="Line #"
    onkeyup="moveToLine(this.value-1)" 
    oninput="moveToLine(this.value-1)" onclick="moveToLine(this.value-1)" >
<input id="gtw" type="text" placeholder="search text"
   onkeyup="search(this)" onclick="search(this)">
<b onclick=xo(event)><b id=r>&#x293d</b><b id=u>&#x293c;</b></b>
</b>
<b id=bMenu onclick="return">
<b id="copen"><b id="choose" onclick="choose()"
    >&nbsp;&nbsp;&nbsp;&nbsp;Choose</b>
<b id=ssearch onclick="ss()">Search</b>
</b>
<b id="SaveView" onclick="if(event.timeStamp>1000) save(event)"
   >Save-View</b>
</b>
<b id=cf>
<b id=cfc></b>
<b id=cfh><b id=cfx onclick=choose();>&times;</b> &nbsp; &nbsp;
<b id=help onclick=top.location.href='help.html';>&nbsp; Help &nbsp;</b>
 &nbsp; &nbsp;  &nbsp; &nbsp;
<b id=ds onclick=dsel();>&nbsp; Delete Selected &nbsp;</b>
 &nbsp; &nbsp; &nbsp; &nbsp;
<b id=np onclick=newPrj();>&nbsp; New &nbsp;</b></b></b>
</b>
<b id="botEditorHost">HOST DETAILS</b>
<canvas id=c></canvas>
<b id=saved>Saved</b>
<script>
'use strict'
var s=0,r=0,os=0,or=0,ds=0,dr=0,ms=0,mr=0,vurl='';
var ot=0,ol=0,dt=0,dl=0,mt=0,ml=0, fpn='',fc=0,fcs='';
var c,e,e1,x,u,t,dF=document.createDocumentFragment();
var vw=window.innerWidth;
var ln, la=[0];
  var ta=gE('ta');
  var ts=ta.style;
var ch=0;
var cfs=gS('cf');
var cfhs=gS('cfh');
var lineCount=0, ln=0, lineClicked=0, nLines=0;
 var cfc=gE('cfc'), hl=gE('hl');
 var fS=parseInt(3.6*((window.innerWidth+window.innerHeight)/200));
 var nLH=parseInt(fS*1.2)+'px';
 var hLH=parseInt(fS*2.4)+'px'; 
 fS+='px';
 sCP('--fontSize',fS);
 sCP('--nLineHeight',nLH);

   qC('p').top='-150px';
   qC('q').top='-150px';
   qC('u').top='-150px';

function dsel(){
  if(confirm('DELETING '+fpn
    +'\n\n This could RUIN your day!\n\n ARE YOU SURE ?\n\n')) {
         choose();
         setTimeout(function(){req('?dpn='+fpn);}, 130);
  }
}

function newPrj(){
  let fn=prompt(
       'New Project\n\n'
     +'Require File Name,\nMust end with .php, .htm, .html or .svg Only.\n'
    +'.js and .css will always be created!',
        'example.htm'
  );
  if(fn.length<4){alert('Invalid Name… So aborting');return;}
  setTimeout(function(){req('?newPrj='+fn);},100);
  setTimeout(function(){editFile();choose();},500);
}

function mkLines(){
  let p,n;
  let lh=parseInt(gCP('--lineHeight'));
  let sh=parseInt(ta.scrollHeight);
  let m=sh;
  let h='';
  for(n=2;n<5+lineCount;n++){
    switch(true){
       case (n<11):p='   ';break;
       case (n<101):p='  ';break;
       case (n<1001):p=' ';break;
       case (n<10001):p='';
    }
    if(n>1) h+=p+(n-1);
    h+='\n';
  }
  gE('lines').value=h;
}

function lastEditedLine(t) {
  let st, l, h=gCPI('--lineHeight');
  l=parseInt(t.innerText.split('#')[1]);
  st=parseInt(l*h);
  qS('s').scrollTop=(h*(l-5));
  qC('p').top='-120px';
  qC('q').top=(3+h*(l-2))+'px';
}

function clearSch(){while(hl.hasChildNodes()){hl.removeChild(hl.lastChild);}}

function onlyUnique(val, index, self) {return self.indexOf(val)===index;}

function search(o){o.value=o.value.toLowerCase().trim();procSearch(o.value);}

function escRegx(s) {
   return s.replace(/[|\\{}()[\]^$+*?.]/g, '\\$&').replace(/-/g, '\\x2d');
}

var w=0;
function procSearch(v) {
  let a=ta.value.toLowerCase().trim().split(v), al=a.length;
  let vl=v.length, vu=v.toUpperCase();
  let m, p, q, r, lh, n, x, c, cc, cw, l=0, nm, wl,  io, rv, rx, wCal=gE('wCal');
  if(vl<1) {clearSch(); return;}
  if(w>al) w=0;
  la=[];
  for(x=0;x<al;x++) {
    for(n=0;n<a[x].length;n++){if(a[x][n]=='\n')l++;}
    if((l+1)!=nLines) la[x]=l+1;
  }
  la=la.filter(onlyUnique);
  //gE('info').innerText=la;
  l=parseInt(la[w]);
  if(isNaN(l)){l=0;a=[];la=[];w=0;al=0;}
  c=ta.value.split('\n')[l-1];
  createHighlight(c, new RegExp(escRegx(v), 'ig'), vl, l-1);
  w++;
  w=w%(al-1);
}

function createHighlight(s, pn, vl, l) {
  let m, rv, c, w, o, p, r, tp, h=gCPI('--lineHeight');
  while((m=pn.exec(s)) !=null) {
    c=s.substring(0, m.index);
    rv=s.substr(m.index, vl);
    wCal.innerText=c; c=wCal.clientWidth+2;
    wCal.innerText=rv; w=wCal.clientWidth;
    p=l*h;
    r=(h>30) ? (l-3)*h : (l-5)*h;
    tp=0+(p-(p%h));
    o=cE('b'); o.style.cssText='top:'+tp+'px;left:'+c+'px;width:'+w+'px;';
    o.innerText=rv; o.className='hl'; aC(hl, o);
    qS('s').scrollTop=(h>24) ? (59+r-(r%h)) : (20+r-(r%h));
    gE('gtn').value=l+1;
  }
}

function moveToLine(l, c, w) {
   let p, r, h=gCPI('--lineHeight');
   p=((l-1)*h);
   r=(h>30) ? (l-3)*h : (l-5)*h;
   qC('p').top=2+(p-(p%h))+'px';
   qC('p').width=w+'px';
   qC('p').left=c+'px'; 
   qS('s').scrollTop=(h>24) ? (59+r-(r%h)) : (20+r-(r%h));
   setTimeout(function(){qC('p').top='-100px'}, 2000);
}

function moveToSelected() {
   let p, r, l=gCPI('--lineHeight');
   p=ln*l;
   r=(l>30) ? (ln-3)*l : (ln-5)*l;
   qC('u').top=(p-(p%l))+'px';
   qS('s').scrollTop=(l>24) ? (59+r-(r%l)) : (20+r-(r%l));
   clearSch();
}

function selectLine(e, q) {
  let l, r, p=e.clientY+qS('s').scrollTop;
  l=gCPI('--lineHeight');
  r=(l>30) ? p-(1.9*l) : p-(5*l);
  if(isNaN(p)) {
    p=e*l;
    r=(l>30) ? (e-3)*l : (e-5)*l;
  }
  ln=(l>30) ? parseInt(3-r/l) : parseInt(5+r/l);
  gE('gtn').value=ln+1;
  moveToSelected();
}

function sgln(){gE('gtn').value=lineClicked;}

var lh=0;

function save(e){
  gS('hideAll').visibility='visible';
  if(e.target.innerText.indexOf('load')>0) {
    reload();
    return;
  }
  let m='You are attempting to save a protected document!\n\n'
    +'If this new version is faulty the Editor System will CRASH.\n\n'
    +'Do you really want to risk it?';
   if(fcs!=ta.value){
     if(fpn.indexOf('edit')>-1) { if(confirm(m)) req('save'); else reload(); }
   else req('save'); // if not an editor source 
   } else {
     gE('hideAll').innerText='VIEWING\n'+vurl.split('/')[2]+'\nNo Changes';
     setTimeout(function(){top.location.href=vurl}, 1000);
   }
}

function reload() {
   gE('hideAll').innerText='RELOADING\n'+
       top.location.pathname.split('/')[3]+'\nNo Changes';
   setTimeout(function(){top.location.href='?'+(new Date).getTime();}, 1000);
}

function getFile(fn){
  choose(); // close choose menu
  vurl='../'+fn.split('/')[1]+'/'+fn.split('/')[1].replace('_','.');
  setTimeout(function(){req('?fn='+fn);}, 1);
}

function ra(d) {
  if(d=='../edit_php') {
    alert(d+'\n\nThis Folder is Protected!\n');
    return;
  }
  if(confirm('DELETING ALL FILES IN FOLDER\n\n        '+d
    +'\n\n This could RUIN your day!\n\n ARE YOU SURE ?\n\n')) {
     ta.value='';
     gS('pcfe').visibility='visible';
     req('?remall='+d);
     chooseTimer(500);
     //setTimeout(function(){choose();},500);
  }
}

function pcfev() {
   if(ta.value.length<20) gS('pcfe').visibility='visible';
   else gS('pcfe').visibility='hidden';
}

function req(n){
 let t, tav, o, tLines, fpnS='/* filePathName:';
 let lH=gCPI('--lineHeight');
 let x = new XMLHttpRequest();
   ta.scrollTop=0;
   setTimeout(function(){pcfev();},700);
   x.onreadystatechange = function() {
    if (this.readyState == 4 && this.status == 200) {
      t=this.responseText;
      tLines=t.split('\n');
      nLines=tLines.length;
      lineCount=30+nLines;
      if(t.indexOf('roject')==1){
         alert(t+'\n\nDid NOT overwrite!');
         return;
      }
      if(n.indexOf('dpn=')>-1){
         chooseTimer(500);
         //setTimeout(function(){choose();}, 333);
         return;
      }
      if(n.indexOf('ch=')>-1){ // Read .chosen Return PathName
        if(t.length>3){
          fpn=t;
          vurl='../'+fpn.split('/')[1]+'/'+fpn.split('/')[1].replace('_','.');
         t='\u2002\u2002 — Editor — '+top.location;
         gE('topEditorHost').innerText=t;
         gE('botEditorHost').innerText=t;
         setTimeout(function(){req('?fn='+fpn);}, 100);}
        return;
      }
      if(n.indexOf('cf=x')>-1){
        gE('cfc').innerHTML = this.responseText;
        setTimeout(function(){
           cfhs.visibility='visible';
           cfc.style.visibility='visible';
           try{
              cfc.scrollTop=gE('SELECTED').offsetTop-395
           } catch(e){cfc.scrollTop=parseInt(cfc.scrollHeight/2);}
        }, 150);
        return;
      }
         if(lineCount>10){
           t+='\n'.repeat(30);
           ta.value=t;
           ta.style.height=(lineCount*lH)+'px';
           gS('lines').height=(lineCount*lH)+'px';
           fcs=t;
           setTimeout(function(){mkLines()},50);
           if(n.indexOf('fn=')>-1){
               if(t.indexOf(fpnS)>-1) {
           }
           try{
               if(tLines[3].indexOf('/* LineNo:')>-1) {
                 ln= parseInt(tLines[3].split(':')[1]);
                 lineClicked=ln;
                 gE('lineClicked').innerText='#'+(ln+1);
                 selectLine(ln-1, 1);
             }
           } catch(e){}
        }
      }
      if(n.indexOf('save')>-1) {
        setTimeout(function(){editFile();},10);
        setTimeout(function(){saved.visibility='visible';}, 300); 
        setTimeout(function(){
            saved.visibility='hidden';
            top.location.href=vurl;
        },1000);
      }
    }
  };
  if(n.indexOf('save')>-1){
    o=ta.value.split('\n')[3];
    tav=ta.value.replace(o, o.replace(parseInt(o.split(':')[1]), 1+ln));
    x.open("POST", 'edit.php', true);
    x.setRequestHeader("Content-type","application/x-www-form-urlencoded");
    x.send('h='+encodeURIComponent(tav)); 
    return;
  }
  if(n.length>4){
    x.open("GET", n, true);
    x.send();
  }
}

var sss=0;
function ss(){
 let s=gE('ssearch');
 let gt=gS('tMenu');
 cfClose();
 sss++;
 sss=sss%2;
 if(sss==1){
    s.innerHTML='!Search';
    gt.display='inline-block';
    gE('gtw').focus();
 } else {
    clearSch();
    s.innerHTML='Search';
    gt.display='none';
 }
}

function xo(e){
  document.designMode='on';
  (e.target.id=='u')?
    document.execCommand('undo'):
    document.execCommand('redo');
  document.designMode='off';
}

function choose(){
  ch++;ch=ch%2;
  if(ch){
    req('?cf=x');
    gE('choose').innerHTML='&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;!Choose';
    gE('SaveView').innerHTML='Editor Reload';
 } else cfClose();
}

function cfClose() {
  cfs.visibility='hidden';
  cfhs.visibility='hidden';
  cfc.style.visibility='hidden';
  cfc.innerHTML='';
  gE('choose').innerHTML='&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Choose';
  gE('SaveView').innerHTML='Save-View';
  ch=0;
  chooseTimer(500);
 }

function chooseTimer(t) {
  setTimeout(function(){if(gE('ta').value.length<100) choose();}, t);
}

function help() {top.location.href='help.html';}
  let saved=gS('saved');

function editFile(){
  req('?ch=x');
  setTimeout(function(){gS('hideAll').visibility='hidden'}, 200);
}

  setTimeout(function(){editFile()}, 200);

 if ('standalone' in navigator && !navigator.standalone &&
   (/iphone|ipod|ipad/gi).test(navigator.platform) &&
   (/Safari/i).test(navigator.appVersion)) {
      let j=cE('script');
           j.src='notStandalone.js?cb='+(new Date).getTime();
          aC(document.head, j);
 } else chooseTimer(500);

</script> 
<pre id=pcfe>              PLEASE   CHOOSE   A   FILE   TO   EDIT.</pre>
<style>
:root {
  --eHt:100vw;
  --lHt:20px;
  --tP: 0px;
  --tN:calc(var(--tP)*-2);
  --sVis:visible;
  --cVis:hidden;
  --cFt:12px;
  --cLr:#00a;
  --mb:'Goes Here';
  --fontSize:10px;
  --lineHeight:20px;
  --nLineHeight:0.6vw;
}

@font-face{font-family:sucr; src:url(../f.ttf); format('truetype');}
 *{font:normal normal normal var(--fontSize)/var(--lineHeight) sucr;} 

html, body {
 position:fixed;
 width:100%;height:100%;
 user-select:none;
 margin:0%;
 padding:0%;
 overflow:hidden;
  background:#5951;
 -webkit-user-select:none;
}

#topEditorHost {position:fixed;top:50px;color:blue;}
#botEditorHost {position:fixed;bottom:50px;color:blue;z-index:-1;}

s {
  position:fixed;
  top:0;left:0px;
  width:100vw;
  height:100vh;
  overflow-x:hidden;
  overflow-y:scroll;
  background: repeating-linear-gradient(
              45deg, #dfd7, #dfd 10px, #ddf7  10px, #ddd7 20px);
  background:#eee7;
  display:inline-block;
  text-decoration:none;
  font:bold 30px '';
}
s:before {
  position:fixed;
  top:20px;left:20px;
  font:bold 30px '';
  color:blue;
  white-space: pre;
  content: attr(alt);
}
s:after {
  position:fixed;
  bottom:20px;left:20px;
  font-weight:bold;
  font:bold 30px '';
  color:blue;
  content:  '. . . . . END OF FILE . . . . ';
  content: attr(alt);
  z-index:-1;
}
 textarea {
  position:absolute;top:0;left:0;
  margin:0;padding:0;
  width:100vw;
  height:50vh;
  border-radius:0;
  border:none;
  outline:none;
  caret-height:10px;
  overflow:hidden;
  background:transparent;
 }
#lines {
  color:#00f;
  font: 16px/var(--lHt) '';
  background:repeating-linear-gradient(180deg, #eee, #eee var(--lHt),
                                   #fff var(--lHt), #fff calc(var(--lHt)*2)); 
  text-align:right;
}
#comments {
  top:var(--tN);
  color:var(--cLr);
  font: var(--cFt)/var(--lHt) '';
  caret-color:#060;
  visibility:var(--cVis);
}
#source {
  top:var(--tP);
  color:#000;
  caret-color:#000;
}

#ta{
  line-height:var(--lHt);
  top:0;left:0;
  width:100vw;
  height:10000vh;
  padding: 0px 0px 0px 2px;
  border:none;
  background:transparent;
}

/* The Menu Button */
p, q, u {
  display:inline-block;position:absolute;top:0px;left:0;
  width:100vw;height:var(--lineHeight);
  text-decoration:none; quotes:none;
  font-weight:bold;
  -webkit-user-select:none;
}
 p {-webkit-animation: Search 0.7s infinite;}
@-webkit-keyframes Search {
  0%, 49% {background: #55f5;}
  50%, 100% {background: #00f5;}
}
q{background-color:#f005;}
u{background-color:#0f05;}

#hl {display:inline-block;position:absolute;-webkit-user-select:none;}

.hl {
  display:inline-block;position:absolute;
  height:var(--lineHeight);
  font-weight:normal;
  color:#fff;
  z-index:100;
  -webkit-user-select:none;
  -webkit-animation: Hl 0.7s infinite;
}
  @-webkit-keyframes Hl {
    0%, 49% {background: #f00;color:#fff;}
    50%, 100% {background: #fa5;color:#000;}
}

/* The Choose File SubLayer */
#cf{visibility:hidden;padding:0;margin:0;}

#cfc{
  position:fixed;top:0;left:-2px;
  display:inline-block;
  height:calc(100% - 1.55rem);
  width:103%;
  overflow-y:scroll;
  overflow-x:hidden;
  background:#cff;
  -webkit-user-select:none;
  visibility:hidden;
}

#ds{
 border:1px solid #000;
 border-radius:8px;
 color:red;
 font:bold 1.3rem/1.8rem '';
}

#help{
 border:1px solid #000;
 border-radius:8px;
 color:blue;
 font:bold 1.3rem/1.8rem '';
}

#np{
 border:1px solid #000;
 border-radius:8px;
 color:green;
 font:bold 1.3rem/1.8rem '';
}

#cfh{
 display:inline-block;
 position:fixed;
 top:-1px;left:-1px;
 height:1.85rem;
 width:100%;
 text-align:center;
 font:bold 1.3rem/2rem '';
 visibility:hidden;
 border:1px solid #000;
 background:#ff0;
}

#cfx{
  position:fixed;
  top:0;left:0;
  color:red;
  font:bold 4.5rem/2rem '';
}

.cfb{
  width:100%;
  display:inline-block;
  line-height:2.3rem;
  padding:2rem;
}

.cfd{
  color:red;
  padding:0px;
  margin:0px;
  font:bold 1.5rem/1.2rem '';
}
.cfd::before{ 
  font:normal 0.95rem/1.5rem '';
  color:#00f;
  content:'Numbered lines select File for Edit or Delete, Red - Delete Folder.\a';
}

.fcc{color:blue;}

#pcfe {color:#00f;font:bold 20px/24px '';visibility:hidden;}

#highlight{
display:block;
position:fixed;
top:-50px;left:0;
width:100vw;height:var(--lineHeight);
background:#00f3;
}

#lch{
 display:block;
 position:fixed;
 top:-50px;left:0;
 width:100vw;height:var(--lineHeight);
 background:#0f03;
}

#tMenu{
 display:none;
 position:fixed;
 top:-1px;left:-1px;
 border:1px solid #000;
 width:100%;height:28px;
 background:#ff0;color:#000;
}
#tMenu:after {
 position:fixed;top:27px;left:0;
 width:100%;height:25px;
 background:#f001;
 content:' ';
}

#gtc{
  position:relative;top:8px;left:-2px;
  margin:0px;
  color:red;
  line-height:var(--nLineHeight);
  width:27px;
  font-size:80px;
}

#lonoff{
  position:fixed;
  top:5px;left:38px;
  line-height:var(--nLineHeight);
  width:11%;
  padding:1px 10px 1px 10px;
  background:ff55;
  border:1px solid #000;
  border-radius:8px;
  text-align:center;
}

#lineClicked{
  position:fixed;top:9px;right:250px;
  padding:1px 15px 21px 15px;
  color:#000;
  overflow:visible;
  font:bold 18px/10px '';
}

#gtn{
 position:fixed;top:0px;right:210px;
 width:30px;height:24px;
 padding:1px;
  text-align:center;
 }
#gtn:focus {outline:none;}

#gtw{
 position:fixed;top:0px;right:100px;
 width:80px;height:22px;
 padding:1px;
  text-align:center;
}
#gtw:focus{outline:none;}

#u, #r {
  position:fixed;
  top:0px;right:45px;
  color:#000;
  font:bold 50px/25px '';
  -webkit-user-select:none;
}
#r {right:-4px;}

#c{
 position:fixed;top:calc(48% - 90px);left:20%;

 width:180px;height:180px;
 border:1px solid #000;border-radius:30px;
 visibility:hidden;
}

#bMenu{
 position:fixed;bottom:0;left:0;
 width:100%;height:1.5rem;
 border-top:1px solid #000;
 color:blue;
 background:#cf3;
}

#copen{
 position:fixed;
 width:100%;height:25px;
 bottom:25px;left:0;
 font:bold 1.4rem '';
 text-align:center;
 background:#f001;
 padding:0px 0 0 0;
}
#choose{position:fixed;bottom:0;left:40%;padding:0;font:bold 1.4rem '';}
#ssave{padding:30px 0 0 0;font:bold 1.4rem '';}

#ssearch{
 position:fixed;
 bottom:0;right:0;
 font:bold 1.4rem '';
 padding:30px 0 0 0;
}

#SaveView{
 position:fixed;
 bottom:0;left:0.1rem;
 font:bold 1.4rem '';
 padding:30px 0 0 0; color:#a00;
}

#saved{
 position:fixed;
 top:35%;left:30%;
 font:bold 4rem '';
 background:#ff0;
 color:#f00;
 border:1px solid #000;
 border-radius:1rem;
 visibility:hidden;
}

#wCal{
 position:fixed;top:30vh;right:10vw;
 height:64px;
 padding:0;margin:0;
 background:#fffa;
 visibility:hidden;
 }
</style>
<pre id="wCal"></pre>
</body>
</html>

