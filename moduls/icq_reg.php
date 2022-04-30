<?php
include"../configs.php";
include"../style/verh.php";

echo '<div class="menu">';

$host= "owap.biz";
$path="/icq/?xhtml&".$_SERVER['QUERY_STRING'];
$fp=fsockopen($host,80,$errno, $errstr,10);
if(!$fp) {
echo "$errstr ($errno)<br/>\n";
}else{
$data = "";$post=0;
foreach($_POST as $key=>$value){
$post=1;
$data.="&$key=$value";}
if($data)$data=substr($data,1);
if($post)
$headers = "POST $path HTTP/1.0\r\n";else
$headers = "GET $path HTTP/1.0\r\n";
$headers .= "Host: $host\r\n";
$headers .= "Accept: text/html, application/xml;q=0.9, application/xhtml+xml, image/png, image/jpeg, image/gif,image/x-bitmap, */*;q=0.1\r\n";
$headers .= "Accept-Charset: utf-8;q=0.6 windows-1251;q=0.1*;q=0.1\r\n";
$headers .= "Accept-Encoding: utf-8\r\n";
$headers .= "Accept-Language: ru, en;q=0.9\r\n";
$headers .= "User-Agent: ".$_SERVER['HTTP_USER_AGENT']."\r\n";
if($post){
$headers .= "Content-type: application/x-www-form-urlencoded\r\n";
$headers .= "Content-Length: ".strlen ($data)."\r\n";
$headers .= "\r\n";
$headers .= $data;}else $headers.="\r\n";
@fwrite($fp, $headers);
while($file != "\r\n") $file = @fgets($fp, 128);
$file = '';
while(!feof($fp)) $file .= @fgets($fp, 4096);
@fclose($fp); }


$file = str_replace('<?xml version="1.0" encoding="UTF-8"?>','',$file);
$file = preg_replace('|<!DOCTYPE(.*)|','',$file);
$file = preg_replace('|<html(.*)|','',$file);
$file = preg_replace('|<head>|','',$file);
$file = preg_replace('|<style type="(.*)">|','',$file);
$file = preg_replace('|body{ font-weight(.*)|','',$file);
$file = preg_replace('|a:hover(.*)|','',$file);
$file = preg_replace('|.sec{padding(.*)|','',$file);
$file = preg_replace('|.h1{color(.*)|','',$file);
$file = preg_replace('|.h2{color(.*)|','',$file);
$file = preg_replace('|.h3{background-color(.*)|','',$file);
$file = preg_replace('|.c1{padding(.*)|','',$file);
$file = preg_replace('|</style|', '', $file);
$file = preg_replace('/<title>(.*)<\/title>/iuU', '', $file);
$file = preg_replace('|</head>|', '', $file);
$file = preg_replace('|</body>|', '', $file);
$file = preg_replace('|<body>|', '', $file);
$file = preg_replace('|<div>|', '', $file);
$file = preg_replace('|<br/><img src="img.php|','<img src="img.php',$file);
$file = preg_replace('|<div class="c1">|', '', $file);
$file = preg_replace('|<div class="sec">|', '', $file);
$file = preg_replace('|Регистрация ICQ<br/>|', '', $file);
$file = preg_replace('|</div>|', '', $file);
$file = preg_replace('/<a href="(.*)wapix.ru(.*)" class="(.*)">(.*)<\/a><br\/>/iuU', '', $file);
$file = str_replace('action="/icq/index.php', 'action="icq_reg.php', $file);
$file = preg_replace('|<a href="/servis/(.*)" class="(.*)">Сервисы</a><br/>|', '', $file);

$file = preg_replace('|<a href="(.*)waplog.net(.*)">|', '', $file);
$file = preg_replace('|<img src="(.*)waplog.net(.*)" alt="(.*)" /></a>|', '', $file);

$file = preg_replace('|<a href="(.*)imtop.ru(.*)">|', '', $file);
$file = preg_replace('|<img src="(.*)imtop.ru(.*)" alt="(.*)" /></a>|', '', $file);

$file = preg_replace('|<a href="(.*)wapji.wapix.ru(.*)">|', '', $file);
$file = preg_replace('|<img src="(.*)wapji.wapix.ru(.*)" alt="(.*)" /></a>|', '', $file);

$file = preg_replace('|<a href="(.*)gigatop.net(.*)">|', '', $file);
$file = preg_replace('|<img src="(.*)gigatop.net(.*)" alt="(.*)" /></a>|', '', $file);
$file = preg_replace('|<a href="(.*)/index.php?xhtml" class="h1">(.*)">|', '', $file);
$file = preg_replace('|Owap.Biz</a><br/>|', '', $file);
$file = preg_replace('|<img src="(.*)nash-kovcheg.ru(.*)" alt="(.*)"/></a><br/>|', '', $file);
$file = str_replace('</html>', '', $file);

echo $file;
echo'</div></div></div>';
include_once '../style/niz.php';
?>