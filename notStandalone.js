//
/* FilePathName: edit_php/notStandalone.js */
/* Uploaded: 21:27:33,  Mon 7 Mar 2022 */
/* LineNo: 87 */
'use strict'

function sA(p, a, v){p.setAttribute(a, v);}
function iH(p,t){p.innerHTML=t;} 
var svgNS='http://www.w3.org/2000/svg';
function cENS(t){return document.createElementNS(svgNS, t);}
function sAENS(o,t,a,v){o.setAttributeNS(t,a,v);}
function cTN(t){return document.createTextNode(t);}

 function roundRect(ctx, x, y, w, h, oS, t, sC, r) {
        /*
         * Draws a rounded rectangle using the current state of the canvas.
       */
        x-=oS; y-=oS; w+=(oS*2); h+=(oS*2);
        ctx.stroke();
        ctx.lineWidth=t;
        ctx.fill();
        ctx.strokeStyle=sC;
        ctx.beginPath();
        // Configure the roundedness of the rectangles corners
        if ((w >= r * 2) && (h >= r * 2)) {
            // Handles width and height larger than diameter
            // Keep radius fixed
            ctx.moveTo(x + r, y);  // tr start
            ctx.lineTo(x + w - r, y);  // tr
            ctx.quadraticCurveTo(x + w, y, x + w, y + r);  //tr
            ctx.lineTo(x + w, y + h - r);  // br
            ctx.quadraticCurveTo(x + w, y + h, x + w - r, y + h);  // br
            ctx.lineTo(x + r, y + h);  // bl
            ctx.quadraticCurveTo(x, y + h, x, y + h - r);  // bl
            ctx.lineTo(x, y + r);  // tl
            ctx.quadraticCurveTo(x, y, x + r, y);  // tl
        } else if ((w < r * 2) && (h > r * 2)) {
            // Handles width lower than diameter
            // Radius must dynamically change as half of width
            r = w / 2;
            ctx.moveTo(x + w, y + h - r);  // br start
            ctx.quadraticCurveTo(x + w, y + h, x + w - r, y + h);  // br curve
            ctx.quadraticCurveTo(x, y + h, x, y + h - r)  // bl curve
            ctx.lineTo(x, y + r);  // line
            ctx.quadraticCurveTo(x, y, x + r, y);  // tl
            ctx.quadraticCurveTo(x + w, y, x + w, y + r);  // tl
            ctx.lineTo(x + w, y + h - r);  // line
        } else if ((w > r * 2) && (h < r * 2)) {
            // Handles height lower than diameter
            // Radius must dynamically change as half of height
            r = h / 2;
            ctx.moveTo(x + w - r, y + h);  // br start
            ctx.quadraticCurveTo(x + w, y + h, x + w, y + r);  // br curve
            ctx.quadraticCurveTo(x + w, y, x + w - r, y);  // tr curve
            ctx.lineTo(x + r, y);  // line between tr tl
            ctx.quadraticCurveTo(x, y, x, y + r);  // tl curve
            ctx.quadraticCurveTo(x, y + h, x + r, y + h);  // bl curve
        } else if ((w < 2 * r) && (h < 2 * r)) {
            // Handles width and height lower than diameter
            ctx.moveTo(x + w / 2, y + h);
            ctx.quadraticCurveTo(x + w, y + h, x + w, y + h / 2);  // bl curve
            ctx.quadraticCurveTo(x + w, y, x + w / 2, y);  // tr curve
            ctx.quadraticCurveTo(x, y, x, y + h / 2);  // tl curve
            ctx.quadraticCurveTo(x, y + h, x + w / 2, y + h);  // bl curve
        }
        ctx.stroke();
    }
 ///let c,d,oa,a,i,k,o,p,r,u,x,y,s,R,n=0;
 let i, o;
 i=cENS('svg'); sA(i,'width','100%'); sA(i,'height','100%'); 
 sA(i,'viewBox','150 0 300 300'); sA(i,'fill','none'); sA(i,'stroke','black');
 c="svg{position:fixed;bottom:5%;left:20%;"+
     "width:290px;height:140px;z-index:120;"+
     'fill:#fff;stroke:#07f;stroke-width:6;stroke-linecap:round;}'+
     "text{text-anchor:middle;dominant-baseline:middle;stroke:none;fill:#000;}";
  o=cENS('style'); aC(o,cTN(c)); aC(i,o);
  o=cENS('rect'); sA(o,'x',2); sA(o,'y',34); sA(o,'rx',12); sA(o,'ry',12);
   sA(o,'style','width:75;height:75;'); aC(i,o);
   o=cENS('line'); sA(o,'x1',41); sA(o,'y1',46); sA(o,'x2',41); sA(o,'y2',20);
   sA(o,'style','stroke:#fff;stroke-width:26;'); aC(i,o);
   o=cENS('line'); sA(o,'x1',41); sA(o,'y1',9); sA(o,'x2',41); sA(o,'y2',68); aC(i,o);
   o=cENS('line'); sA(o,'x1',25); sA(o,'y1',19); sA(o,'x2',41); sA(o,'y2',4); aC(i,o);
   o=cENS('line'); sA(o,'x1',57); sA(o,'y1',19); sA(o,'x2',41); sA(o,'y2',4); aC(i,o);
  o=cENS('text');sA(o,'x',320);sA(o,'y',70); sA(o, 'style', "font:normal 70px '';");
  aC(o,cTN("then, 'Add to Homescreen'")); aC(i,o);
  aC(qS('s'),i);
 
  s=180;
  i=cE('canvas'); i.height=s; i.width=s; o=i.getContext("2d");
  i.style.cssText='z-index:120;position:fixed;left:30%;bottom:45%;';
  o.fillStyle="#dfd"; o.fillRect(0, 0, s,s);
  roundRect(o, 0, 0, s, s, -18, 10, 'black', 30);
  roundRect(o, 0, 0, s, s, 5, 25, '#dfd', 60);
 // o.strokeStyle='#e55'; o.lineCap='round'; o.lineWidth=8;
  o.stroke();
  o.font = "120px Arial";
  o.fillText("🖋️",30,130);
  aC(qS('s'),i);
  //aC(document.body,i);
  u=i.toDataURL();
  o=cE('meta'); o.name='apple-mobile-web-app-title';
  o.content='edit'+((new Date).getTime()/1000000000).toFixed(4).split('.')[1];
  aC(document.head,o);
  o=cE('link'); o.rel='apple-touch-icon'; o.sizes='180x180';
  o.href=u; aC(document.head,o);
 setInterval(function(){qS('s').scrollTop=300000},200);

