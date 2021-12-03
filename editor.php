<?php // 1st line defines file type or tag
/* filePathName: editor_php/editor.php */
/* Uploaded: 12:27:13,  Thu 18 Nov 2021 */
/* LineNo: 146 */ 

header('Content-type: text/html; charset=utf-8');
header("Cache-Control: no-cache, no-store, must-revalidate");
header("Pragma: no-cache");
header("Expires: 0"); 
touch('.chosen');
@chmod('.chosen',0666);  
$cb='CB='.date('U');

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
   $D=new DateTime("now", new DateTimeZone('Australia/Melbourne'));
   $rs='* Uploaded: '.$D->format("G:i:s,  D j M Y").' *';
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
       echo '<i class=cfd>In Directory: '.$d.$v."/</i>\n";
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
<link id=hicon rel="apple-touch-icon" sizes="180x180">
<link id=ficon rel="favicon" sizes="180x180"> 
<meta id=title name="apple-mobile-web-app-title" content="SSLe_editor">
<title>SSLe_editor</title>
<link rel='stylesheet' type='text/css' href='editor.css?<?php echo $cb; ?>'></link> 
</head>
<body>
<pre id=z></pre>
<b id=highlight>&nbsp;</b><b id=lch>&nbsp;</b>
<textarea id=ta inputmode=text name=h form=f lang="en"
  onblur="setTimeout(function(){gE('rudo').style.visibility='hidden';
                   gE('ru').style.visibility='hidden';},10);if(lh==1){tlh();}"
  onclick="if(lh==0){wc(event,this);}"
  onscroll=lnt();>
</textarea>
<b id=rudo  onclick=xdo(event); >
<b id=redo>&#x293d</b> <b id=undo>&#x293c;</b>
</b>
<b id=ru onclick=arrows();>&#x293d;</b>
<b id=goTo>
<b id=gtc onclick=gE('goTo').style.display='none';>&times;</b>
<b onclick=tlonoff(); id=lonoff>Higher</b>
<b id=lineClicked onclick="zgtln();ta.focus();">Line Clicked</b>
<input type=text inputmode=decimal id=gtn onkeyup=gtln(0);
    onclick=clearTimeout(lTimer);gtln(0); placeholder=Line#>
<input type=text search=search id=gtw onkeyup=gtw();
     onclick=clearTimeout(lTimer);gtln(0); placeholder="Search">
<b id=nwb onclick=ta.focus();gtw();>Next</b>
</b>
<b id=bMenu onclick=javascript:void();>
<b id=copen><b id=oopen onclick=cf();
    >&nbsp;&nbsp;&nbsp;&nbsp;Open Site</b>
<b id=ssearch onclick=ss();>Search</b>
</b>
<b id=ViewSite onclick=okToSave();>Save-View</b>
</b>
<b id=cf>
<b id=cfc onclick=scrollToSelected();></b>
<b id=cfh><b id=cfx onclick=cf();>&times;</b>
 Choose File &nbsp;
<b id=ds onclick=dsel();>&nbsp; or Delete Current File &nbsp; </b></b>
</b>
<canvas id=c></canvas>
<b id=saved>Saved</b>
<script src='editor.js?<?php echo $cb; ?>' charset='utf-8'></script> 
</body>
</html>
