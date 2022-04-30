<?
if ($_GET[act]=="") 
{
include"../configs.php";
include"../style/verh.php";
require 'functions.php';

echo'<div class="bordur">Чат | <a href="chat.php?act=add">Добавить сообщение</a>';
echo'</div><div class="menu">';
$pg = intval($_GET['pg']);
if($pg < 1)
{$pg = 1;}

$f = file($chat);
$all = sizeof($f)-1;
$st = ceil($all / $show);

if($all > $show)
{
$do = $pg * $show;
$ot = $do - $show;
}
else
{
$do = $all;
$ot = 0;
}

if($do > $all)
{$do = $all;}


if($comment)
{

do
{
list($t,$d) = explode('|',$f[$all-$ot]);

$d = trim(rawurldecode($d));
$get = str_replace('/',',',$d);
$get = str_replace('.',',',$d);

print '<div class="border">'.$d.' <a href="com/?nom='.$d.'">('.(int)@file_get_contents('com/cont/'.$get.'.dat').')</a><br/></div><div>'.$t.'<br/></div>';
}
while(++$ot <= $do);

}
else
{

do
{
list($t,$d) = explode('|',$f[$all-$ot]);
print '<div class="border">'.$d.'</a><br/></div><div>'.$t.'<br/></div>';
}
while(++$ot <= $do);

}

print '<div class="border">'.go($pg,$st,0).'</div></div>';
include "../style/niz.php";
}

if ($_GET[act]=="add") 
{
include"../configs.php";
include"../style/verh.php";

if(!trim($_POST['text']) || !trim($_POST['date']))
{
print '<div class="menu">
<form method="post" action="chat.php?act=add&">
Сообщение<br/>
<textarea name="text" rows="16" cols="64"></textarea><br/>
<input type="hidden" name="date" value="' .$login. ' (' .$tm. '):"/><br/>
<br/>
<input type="submit" value="Добавить"/>
</form>
</div>';
}
else
{
$_POST['text'] = preg_replace("#(^|\s)((http|https|news|ftp)://\w+\.+[^\s\[\]]+)#i","\\1<a href=\"\\2\">\\2</a>",$_POST['text']);
$_POST['text'] = trim(str_replace("\n",'<br/>',$_POST['text']));
$_POST['text'] = str_replace("\r",null,$_POST['text']);

$_POST['date'] = trim(str_replace("\n",null,$_POST['date']));
$_POST['date'] = str_replace("\r",null,$_POST['date']);

$f = @fopen($chat, 'a');
@fseek($f,0,SEEK_END);
@fputs($f, $_POST['text'].'|'.$_POST['date']."\n");
@fclose($f);



print '<div class="menu">Добавлено!</br><a href="chat.php">В чат</a></div>';
}
include"../style/niz.php";
}
?>