<?php
if($_GET['r']=='')
{
$host = "wap.rp5.ru";
$path = "/?$QUERY_STRING";
$fp = fsockopen($host,80,$errno,$errstr,30);
if(!$fp) echo"$errstr ($errno)<br />\n";
else{
$headers = "GET $path HTTP/1.0\r\n";
$headers .= "Host: $host\r\n";
$headers .= "Referer: http://$host/\r\n";
$headers .= "User-Agent: Opera/9.27 (Windows NT 5.1; U; ru)\r\n\r\n";
fwrite($fp,$headers);
while($file != "\r\n") $file = fgets($fp,128);
$file = "";
while(!feof($fp)) $file .= fgets($fp,4096);
fclose($fp);
}
include"../configs.php";
include "../style/verh.php";
echo'<div class="menu">';
$file = preg_replace('|(.*)<body>|si','',$file);
$file = preg_replace('|action="(.*?)"|','action="weather.php"',$file);
$file = str_replace('<p class', '<div class',$file);
$file = str_replace('<p>', '<div>',$file);
$file = str_replace('</p>', '</div>',$file);
$file = str_replace('<small>', '',$file);
$file = str_replace('</small>', '',$file);
$file = preg_replace('|<p id="footer">(.*)</html>|si','',$file);
$file = str_replace('</body>', '',$file);
$file = str_replace('</html>', '',$file);
$file = str_replace('http://wap.rp5.ru/', 'weather.php',$file);
$file = str_replace('<img src="/pda/img/', '<img src="http://wap.rp5.ru/pda/img/',$file);
$file = str_replace('<h1>', '<div>',$file);
$file = str_replace('</h1>', '</div><br/>',$file);
$file = preg_replace("/<(\/|)span.*?>/","",$file);
$file = preg_replace("/<(\/|)table.*?>/","",$file);
$file = preg_replace("/<(\/|)tr.*?>/","",$file);
$file = preg_replace("/<(\/|)td.*?>/","",$file);
$file = str_replace('<a href="', '<a href="weather.php?r=2&module=',$file);
echo $file;
echo'<a href="index.php">В сервисы</a><br/></div>';
include "../style/niz.php";
}

if($_GET['r']=='2')
{
$host = "wap.rp5.ru";
$path = "/$module?$QUERY_STRING";
$fp = fsockopen($host,80,$errno,$errstr,30);
if(!$fp) echo"$errstr ($errno)<br />\n";
else{
$headers = "GET $path HTTP/1.0\r\n";
$headers .= "Host: $host\r\n";
$headers .= "Referer: http://$host/\r\n";
$headers .= "User-Agent: Opera/9.27 (Windows NT 5.1; U; ru)\r\n\r\n";
fwrite($fp,$headers);
while($file != "\r\n") $file = fgets($fp,128);
$file = "";
while(!feof($fp)) $file .= fgets($fp,4096);
fclose($fp);
}
include"../configs.php";
include "../style/verh.php";
echo'<div class="menu">';
$file = preg_replace('|(.*)<body>|si','',$file);
$file = preg_replace('|action="(.*?)"|','action="weather.php"',$file);
$file = str_replace('<p class', '<div class',$file);
$file = str_replace('<p>', '<div>',$file);
$file = str_replace('</p>', '</div>',$file);
$file = str_replace('<small>', '',$file);
$file = str_replace('</small>', '',$file);
$file = preg_replace('|<p id="footer">(.*)</html>|si','',$file);
$file = str_replace('</body>', '',$file);
$file = str_replace('</html>', '',$file);
$file = str_replace('http://wap.rp5.ru/', 'weather.php',$file);
$file = str_replace('<img src="/pda/img/', '<img src="http://wap.rp5.ru/pda/img/',$file);
$file = str_replace('<h1>', '<div>',$file);
$file = str_replace('</h1>', '</div><br/>',$file);
$file = preg_replace("/<(\/|)span.*?>/","",$file);
$file = preg_replace("/<(\/|)table.*?>/","",$file);
$file = preg_replace("/<(\/|)tr.*?>/","",$file);
$file = preg_replace("/<(\/|)td.*?>/","",$file);
$file = str_replace('<a href="', '<a href="weather.php?r=2&module=',$file);
echo $file;
echo'<a href="index.php">В сервисы</a><br/></div>';
include "../style/niz.php";
}
?>