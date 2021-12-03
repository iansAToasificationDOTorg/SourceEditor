// commented or blank 1st  line for this editor system no tag for js
/* filePathName: editor_php/editor.js */
/* Uploaded: 14:47:05,  Thu 18 Nov 2021 */
/* LineNo: 327 */

var s=0,r=0,os=0,or=0,ds=0,dr=0,ms=0,mr=0,vurl='';
var ot=0,ol=0,dt=0,dl=0,mt=0,ml=0,fpn='',fc=0,fcs='';
var c,e,e1,x,u,t,dF=document.createDocumentFragment();
var vw=window.innerWidth;
var ln, gFpn;

function isVisible(i){return gE(i).style.visibility=='visible';}
function hasFocus(i){return document.activeElement.id==i;}
function gE(i){return document.getElementById(i);}
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
function sC(v){
  document.styleSheets[0].cssRules[1].style.content='"'+v+'"';
}

function gCP(v) {
  return getComputedStyle(document.documentElement).getPropertyValue(v);
}

function sCP(p,v) {
      document.documentElement.style.setProperty(p,v);
}
 
 var cfc=gE('cfc');
 var fS=parseInt(3.6*((window.innerWidth+window.innerHeight)/200));
 var nLH=parseInt(fS*1.2)+'px';
 var hLH=parseInt(fS*2.4)+'px'; 
 fS+='px';
 sCP('--fontSize',fS);
 sCP('--lineHeight',nLH);
 sCP('--nLineHeight',nLH);

function dsel(){
  if(confirm('DELETING '+fpn
    +'\n\n This could RUIN your day!\n\n ARE YOU SURE ?\n\n')) {
         cf();
         setTimeout(function(){req('?dpn='+fpn);},3);
  }
}

function mkLines(){
  let p,n,z=gE('z');
  let lh=parseInt(gCP('--lineHeight'));
  let sh=parseInt(ta.scrollHeight);
  let m=parseInt(sh/lh);
  let h='Line.         Source Code.          (Editor: '+top.location+')';
  for(n=1;n<m;n++){
    switch(true){
       case (n<11):p='   ';break;
       case (n<101):p='  ';break;
       case (n<1001):p=' ';break;
       case (n<10001):p='';
    }
    if(n>1) h+=p+(n-1);
    h+='\n';
  }
  z.innerText=h
}

var lineClicked=0;
function wc(e,t){
  let pos=e.pageY+t.scrollTop;
  let h=parseInt(gCP('--lineHeight'));
  lineClicked=parseInt(1+pos/h);
  zgtln();
}

function zgtln(){
  gE('lineClicked').innerText='Line #'+lineClicked;
  lnt();
  setTimeout(function(){gtln(lineClicked)},10);
  if(!isVisible('rudo'))
      setTimeout(function(){gE('ru').style.visibility='visible'},10);
}

function gtln(l){
  let h=parseInt(gCP('--lineHeight'));
  let p=(h<40)?8:4.15;
  let t, gtn=parseInt(gE('gtn').value);
  l=parseInt(l);
  t=(l<1)?gtn:l;
  ta.scrollTop=parseInt(t*h-(h*p));
  sss++;
}

function sgln(){gE('gtn').value=lineClicked;}

function lnt(){
  let h=parseInt(gCP('--lineHeight'));
  let l=parseInt(gE('gtn').value);
  l=(isNaN(l))?0:l-1
  let s=ta.scrollTop;
  gE('highlight').style.top=((h*l)-s)+'px';
  gE('lch').style.top=((h*(lineClicked-1))-s)+'px';
  gE('z').style.top=(-h-s)+'px';
}

var lTimer;
var tlon=0;
function tlonoff(){
  let lnf=gE('lonoff');
  tlon++; tlon=tlon%2;
  tlon?lnf.innerText='Normal': lnf.innerText='Higher';
  tlon?sCP('--lineHeight',hLH):sCP('--lineHeight',nLH);
  mkLines();
  lnt();
  gtln(lineClicked);
}

var lh=0;
function tlh(){
  let x=0,n=0;
  let lhl=gE('tlhl');
  lh++;
  lh=lh%2;
  sCP('--lineHeight',nLH);
  mkLines();
 }

var rlt;
async function readCb(){
  try{rlt=await navigator.clipboard.readText();}catch(e){rlt=e.message;}
  alert(rlt);
  setTimeout(function(){top.location.href=rlt;},3000);
}

async function writeCb(){
  let t=top.location.href.split('?')[0]+'?'+fpn;
  await navigator.clipboard.writeText(t);
}

function okToSave(){
  let m='You are attempting to save a protected document!\n\n'
    +'If this new version is faulty the Editor System will CRASH.\n\n'
    +'Do you really want to risk it?';
   if(fcs!=ta.value){
     if(fpn.indexOf('editor')>1) { if(confirm(m)) req('save'); }
     else req('save');
   } else top.location.href=vurl;
}

function getFile(fn){
    if(fn.length<3) {
      setTimeout(function(){req('?ch=x');},10);
      setTimeout(function(){req('?fn='+fpn);},30);
    }
    setTimeout(function(){req('?fn='+fn);},3);
    setTimeout(function(){cf();},333);
    mkLines();
}

function req(n){
 let t, lnS='/* LineNo:', fpnS='/* filePathName:';
 let x = new XMLHttpRequest();
   ta.scrollTop=0;
   x.onreadystatechange = function() {
    if (this.readyState == 4 && this.status == 200) {
      t=this.responseText;
      if(n.indexOf('dpn=')>-1){
         setTimeout(function(){cf();},333);
         return;
      }
      if(n.indexOf('ch=')>-1){ // Read .chosen Return PathName
        if(t.length>3){
          fpn=t;
          with(top.location){
            vurl='../'+fpn.split('/')[1]+'/'+fpn.split('/')[1].replace('_','.');
// alert(fpn+'\n'+fpn.split('/')[1]+'\n'+vurl);
          }
        }
        return;
      }
      if(n.indexOf('cf=x')>-1){
 //alert(this.responseText);
        gE('cfc').innerHTML = this.responseText;
        return;
      }
         if(t.length>100){
           t+='\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n';
           ta.value=t;
           fcs=t;
           setTimeout(function(){mkLines()},50);
           setTimeout(function(){req('?ch=x')},150);
           if(n.indexOf('fn=')>-1){
               if(t.indexOf(fpnS)>-1) {
               gFpn=t.split(fpnS)[1].split('*/')[0].trim();
           }
           if(t.indexOf(lnS)>-1) {
               ln=parseInt(t.split(lnS)[1].split('*/')[0]);
               lineClicked=ln;
               setTimeout(function(){zgtln()},333);
           }
        }
      } 
      if(n.indexOf('save')>-1) {
        setTimeout(function(){editFile();},10);
        setTimeout(function(){saved.visibility='visible';},300); 
        setTimeout(function(){
            saved.visibility='hidden';
            top.location.href=vurl;
        },1000);
      }
    }
  };
  if(n.indexOf('save')>-1){
    let tav=ta.value.replace(lnS+' '+ln+' */', lnS+' '+lineClicked+' */');
    x.open("POST", 'editor.php', true);
    x.setRequestHeader("Content-type","application/x-www-form-urlencoded");
    x.send('h='+encodeURIComponent(tav));
    return;
  }
  if(n.length>4){
    x.open("GET", n, true);
    x.send();
  }
}

function editFile(){
  req('?ch=x');
  setTimeout(function(){
    req('?fn='+fpn);
  },100);
}

var sss=1;
function ss(){
 let s=gE('ssearch');
 let gt=gE('goTo').style;
 cfClose();
sss++;
sss=sss%2;
 if(sss==1){
    s.innerHTML='!Search';
    gt.display='inline-block';
 } else {
    s.innerHTML='Search';
    gt.display='none';
 }
}

var w=0;
function gtw(){
  let s=gE('gtw').value.toLowerCase().trim();
  let t=ta.value.toLowerCase().trim();
  let n,x,la=[],l=0, a=t.split(s);
  let al=a.length;
  if(w>al)w=0;
  for(x=0;x<al;x++){
    for(n=0;n<a[x].length;n++){if(a[x][n]=='\n')l++;}
    la[x]=l+1;
  }
  l=parseInt(la[w]);
  if(isNaN(l)){l='';a=[];la=[];w=0;al=0;}
  gE('gtn').value=l;
  w++;
  w=w%(al-1);
  gtln(0);
}

function xdo(e){
  document.designMode='on';
  (e.target.id=='undo')?
    document.execCommand('undo'):
    document.execCommand('redo');
  document.designMode='off';
  setTimeout(function(){gE('rudo').style.visibility='visible'},10);
  setTimeout(function(){gE('ru').style.visibility='hidden'},10);
}

function arrows(){
  setTimeout(function(){gE('rudo').style.visibility='visible'},10);
  setTimeout(function(){gE('ru').style.visibility='hidden'},20);
}

function mkIcon(){
  let u,i,n,c=gE('c');
  let d=c.getContext('2d');
   c.style.left=parseInt((vw/2)-90)+'px';
   c.style.visibility='visible';
   c.width=180;
   c.height=180;
   d.fillStyle='#0ef';
   d.fillRect(0,0,180,180);;
   d.fillStyle='#000';
   d.font = "160px Arial";
   d.fillText(String.fromCodePoint("0x16866"), 16,149);
   d.beginPath();
   d.lineWidth=1;
   d.moveTo(0,0); 
   d.lineTo(180,180);
   d.moveTo(0,180);
   d.lineTo(180,0);
   d.strokeStyle = '#f00'; 

   u=c.toDataURL();
   gE('hicon').href=u;
   gE('ficon').href=u;
 }

function athsi(){
   try{gE('athsi').remove();}catch(e){}
   let w=window.outerWidth;
   let h=window.outerHeight;
   let sw=parseInt((w+h)/4);
   let sh=parseInt(sw/11);
   let l=parseInt((w/2)-(sw/4))+'px';
   let t=parseInt((h/2)-(sh/0.5))+'px';
   let e=cE('b');e.id='athsi';
   let c='font-size:'+parseInt(sw/14)+'px;';
   c+='left:'+l+';width:'+(sw/2)+'px;height:'+sh+'px';
   e.style.cssText=c;
   e.innerText='Please add to Home Screen';
   aC(document.body,e);
   e=cE('meta');e.content='SSLe_editor';
   e.name='apple-mobile-web-app-title';
   aC(document.head,e);
}

 if(!window.navigator.standalone){
   setInterval('athsi()',100); 
   mkIcon();
   setTimeout(function(){gE('c').style.visibility='hidden'},2000);
 }

  setTimeout(function(){lnt()},10);

  var ta=gE('ta');
  var ts=ta.style;

var ch=0;
var cfs=gE('cf').style;
var cfhs=gE('cfh').style;
var oo =gE('oopen');

function cf(){
  ch++;ch=ch%2;
  if(ch){
    req('?cf=x');
    cfs.visibility='visible';
    cfhs.visibility='visible';
    oo.innerHTML='&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;!Open Site';
    scrollToSelected();
 } else cfClose();
}

function cfClose() {
  cfs.visibility='hidden';
  cfhs.visibility='hidden';
  cfc.innerHTML='';
  cfc.style.visibility='hidden';
  oo.innerHTML='&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Open Site';
  ch=0;
 }

 function scrollToSelected() {
    setTimeout(function(){
      cfc.style.visibility='visible';
      cfc.scrollTop=gE('SELECTED').offsetTop-395;
    },200);
}

  let saved=gE('saved').style;
  setTimeout(function(){editFile();},30);
  setInterval(function(){window.scrollTo(0, 1)}, 200);

