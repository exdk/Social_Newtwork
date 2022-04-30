<?php
include"../configs.php";
require_once"../style/verh.php";
echo'<div class="menu">';
$host = "seclub.org";
$path = "/mod/lntru.php?".$_SERVER['QUERY_STRING'];;
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
$file = str_replace('<a href="http://owap.su/6260.go?page"><img class="counts" src="http://imtop.ru/6890/small.png" alt="imTop.ru" /></a>','',$file);
$file = str_replace('<a href="http://gigatop.net/in.php?7385"><img class="counts" src="http://gigatop.net/c.php?7385" alt="GigaTop.Net" /></a>','',$file);
$file = str_replace('<a href="http://owap.su/6260.go?page"><img src="http://owap.su/6260.img" alt="owap.su" /></a>','',$file);
$file = str_replace("<a href='/index.php'>На главную</a><br/>",'',$file);
$file = str_replace('<img src="/images/img/logo_index.gif" alt="" /><br/>','',$file);
$file = str_replace('mod/lntru.php','moduls/news.php',$file);
$file = str_replace('<img src="prelnt.php','<img src="http://seclub.org/mod/prelnt.php',$file);
$file = str_replace('/mod/serv.php?sesid','/?r=mods&sesid',$file);
$file = str_replace('<img src="http://seclub.org:8080/navig/gif/home.gif" alt="" align="middle"/>','',$file);
$file = str_replace('<a href="http://waplog.net/ru/c.shtml?134"><img src="http://c.waplog.net/ru/134.cnt" alt="-" /></a>','',$file);
$file = str_replace('<span style="color:#E7C403; font-size: small">[Сжатие: выкл]</span><br/>','',$file);
$file = str_replace('<style type="text/css">
body { font-weight: normal; font-size: medium; font-family: sans-serif; color: #FFFFFF; background-color: #295723 }
a:link,a:visited { text-decoration: underline; color : #34EB5E }
a:active { text-decoration: underline; color : #67C4FF }
a:hover { text-decoration: none; color : #FF0000 }
div { margin: 1px 0px 1px 0px; padding: 4px 4px 4px 4px }
div.d0 { background-color: #3B7D32 }
div.d1 { background-color: #295723 }
a.halt { text-decoration: none; color: #FF0000 }
a.halt:hover { text-decoration: underline; color : #67C4FF }
hr { border: none; height: 1px; color: #34EB5E; background-color: #34EB5E }
</style>','',$file);
$file = str_replace('<div style="text-align: center">','',$file);
$file = str_replace('<span style="color:#E7C403; font-size: small">[ON: ','',$file);
$file = str_replace('<span style="color:#E7C403; font-size: small">[Перех: ','',$file);
$file = str_replace(']','',$file);
$file = str_replace('00:00</span><br/>','',$file);
$file = str_replace('1</span><br/>','',$file);

echo $file;
echo'</div></div></div>';
require_once"../style/niz.php";
?>