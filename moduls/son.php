<?php
include"../configs.php";
require_once"../style/verh.php";
echo'<div class="menu">';
$host = "wapac.ru";
$path = "/services/sonnic/?".$_SERVER['QUERY_STRING'];;
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
$file = str_replace('<a href="http://wapac.ru/news/dl/"><img src="http://c.waplog.net/46477.cnt" alt="waplog" /></a>','',$file);
$file = str_replace('<a href="/index.php">wapac.ru</a>, &copy; 2009-2010</div>','',$file);
$file = str_replace('<a href="/" class="link2">На главную Сайта</a></div>','',$file);
$file = str_replace('<a href="../">Сервисы</a>|<a href="../../">Главная</a>','',$file);
$file = str_replace('index.php','son.php',$file);
$file = str_replace('<div class="title">','<div class="bordur">',$file);
echo $file;
echo'<a href="index.php">В сервисы</a><br/></div></div></div></div>';
require_once"../style/niz.php";
?>