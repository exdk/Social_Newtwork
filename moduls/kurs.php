<?php
include"../configs.php";
include"../style/verh.php";
$content = get_content();
$pattern = "#<Valute ID=\"([^\"]+)[^>]+>[^>]+>([^<]+)[^>]+>[^>]+>[^>]+>[^>]+>[^>]+>[^>]+>([^<]+)[^>]+>[^>]+>([^<]+)#i";
preg_match_all($pattern, $content, $out, PREG_SET_ORDER);
$dollar = $euro = '';
foreach($out as $cur)
{
if($cur[2] == 840) $dollar = str_replace(',','.',$cur[4]);
if($cur[2] == 978) $euro = str_replace(',','.',$cur[4]);
}

function get_content()
{
// Настоящая дата  цб за сегодня
$link = 'http://www.cbr.ru/scripts/XML_daily.asp?date_req='.date('d/m/Y');
$text = '';
$fd = fopen($link, 'r');
if(!$fd) echo '404 Not Found!';
else
{
while(!feof ($fd)) $text .= fgets($fd, 4096);
}
fclose($fd);
return $text;
}
$rf = date('d.m.Y H:i:s');
echo'<div class="bordur">Курс валют</div><div class="menu">';
echo "Курц ЦБ: <br/>";
echo "1 евро - $euro<br/> ";
echo "1 доллар - $dollar</div> ";
include"../style/niz.php";
?>