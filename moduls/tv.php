<?php
include"../configs.php";
require_once"../style/verh.php";
echo'<div class="menu">';
$host = "wapos.ru";
$path = "/tvprogs/?".$_SERVER['QUERY_STRING'];;
$fp = fsockopen($host,80,$errno,$errstr,30);
if(!$fp) echo"К сожалению сервис временно недоступен.<br />\n";
else{
$headers = "GET $path HTTP/1.0\r\n";
$headers .= "Host: $host\r\n";
$headers .= "Accept: text/html, application/xml;q=0.9, application/xhtml+xml, image/png, image/jpeg, image/gif, image/x-xbitmap, */*;q=0.1\r\n";
$headers .= "Accept-Charset: iso-8859-1, utf-8, utf-16, *;q=0.1\r\n";
$headers .= "Accept-Language: ru-RU,ru;q=0.9,en;q=0.8\r\n";
$headers .= "Referer: http://$host/\r\n";
$headers .= "User-Agent: Opera/9.27 (Windows NT 5.1; U; ru)\r\n\r\n";
fwrite($fp,$headers);
while($file != "\r\n") $file = fgets($fp,128);
$file = "";
while(!feof($fp)) $file .= fgets($fp,4096);
fclose($fp);
}
$file = str_replace('<title>&#x0422;&#x0412; &#x043F;&#x0440;&#x043E;&#x0433;&#x0440;&#x0430;&#x043C;&#x043C;&#x0430;</title> 
<link rel="stylesheet" type="text/css" href="../styles/orange.css"/> 
</head> <body> 
<div class="logo"><img src="../imgs/o/logo.gif" alt=""/></div> 
 
<div class="about"> 
WAPOS.RU
</div>','',$file);
$file = str_replace('<div class="top">
	<a href="http://wapos.ru/services.php">&lt;&lt; &#x0421;&#x0435;&#x0440;&#x0432;&#x0438;&#x0441;&#x044B;</a>
	<br/>
	<a href="http://wapos.ru/index.php">&lt;&lt; WAPOS.RU</a>
	</div><br/>
<div class="foot"><img class="ico" src="../imgs/o/f.gif" alt=""/> 
(c) Wapos.ru 2009
</div>
<p><a href="http://waplog.net/ru/c.shtml?4102"><img src="http://c.waplog.net/ru/4102.cnt" alt="w" /></a></p></body>
</html>','',$file);
$file = str_replace('<div class="t">','<div class="bordur">',$file);
$file = str_replace('<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd"><html xmlns="http://www.w3.org/1999/xhtml" xml:lang="ru" lang="ru"> 
<head>','',$file);
$file = str_replace('<div class="top">
	<a href="index.php">&lt;&lt; &#x041D;&#x0430;&#x0437;&#x0430;&#x0434;</a>
	<br/>
	<a href="http://wapos.ru/index.php">&lt;&lt; WAPOS.RU</a>
	</div><br/>
	<div class="foot"><img class="ico" src="../imgs/o/f.gif" alt=""/> 
(c) Wapos.ru 2009
</div>','',$file);
$file = str_replace('<p><a href="http://waplog.net/ru/c.shtml?4102"><img src="http://c.waplog.net/ru/4102.cnt" alt="w" /></a></p>','',$file);
$file = str_replace('<img src="i/ort.gif" alt="-"/>','<img src="http://wapos.ru/tvprogs/i/ort.gif" alt="-"/>',$file);
$file = str_replace('<img src="i/rtr.gif" alt="-"/>','<img src="http://wapos.ru/tvprogs/i/rtr.gif" alt="-"/>',$file);
$file = str_replace('<img src="i/tvc.gif" alt="-"/>','<img src="http://wapos.ru/tvprogs/i/tvc.gif" alt="-"/>',$file);
$file = str_replace('<img src="i/ntv.gif" alt="-"/>','<img src="http://wapos.ru/tvprogs/i/ntv.gif" alt="-"/>',$file);
$file = str_replace('<img src="i/kult.gif" alt="-"/>','<img src="http://wapos.ru/tvprogs/i/kult.gif" alt="-"/>',$file);
$file = str_replace('<img src="i/spo.gif" alt="-"/>','<img src="http://wapos.ru/tvprogs/i/spo.gif" alt="-"/>',$file);
$file = str_replace('<img src="i/sts.gif" alt="-"/>','<img src="http://wapos.ru/tvprogs/i/sts.gif" alt="-"/>',$file);
$file = str_replace('<img src="i/tnt.gif" alt="-"/>','<img src="http://wapos.ru/tvprogs/i/tnt.gif" alt="-"/>',$file);
$file = str_replace('<img src="i/ren.gif" alt="-"/>','<img src="http://wapos.ru/tvprogs/i/ren.gif" alt="-"/>',$file);
$file = str_replace('<img src="i/tv3.gif" alt="-"/>','<img src="http://wapos.ru/tvprogs/i/tv3.gif" alt="-"/>',$file);
$file = str_replace('<img src="i/7tv.gif" alt="-"/>','<img src="http://wapos.ru/tvprogs/i/7tv.gif" alt="-"/>',$file);
$file = str_replace('<img src="i/domashnii.gif" alt="-"/>','<img src="http://wapos.ru/tvprogs/i/domashnii.gif" alt="-"/>',$file);
$file = str_replace('<img src="i/zvezda.gif" alt="-"/>','<img src="http://wapos.ru/tvprogs/i/zvezda.gif" alt="-"/>',$file);
$file = str_replace('<img src="i/dar.gif" alt="-"/>','<img src="http://wapos.ru/tvprogs/i/dar.gif" alt="-"/>',$file);
$file = str_replace('<img src="i/mtv.gif" alt="-"/>','<img src="http://wapos.ru/tvprogs/i/mtv.gif" alt="-"/>',$file);
$file = str_replace('<img src="i/muztv.gif" alt="-"/>','<img src="http://wapos.ru/tvprogs/i/muztv.gif" alt="-"/>',$file);
$file = str_replace('index.php','tv.php',$file);

echo $file;
echo'<a href="index.php">В сервисы</a><br/></div></div></div>';
require_once"../style/niz.php";
?>