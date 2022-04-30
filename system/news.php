<?
if ($_GET[act]=="") 
{
include"../configs.php";
include"../style/verh.php";
require 'functions.php';

echo'<div class="bordur">Новости сайта';
if ( !isset($top) && $status =='admin' && !isset($param)) {echo' | <a href="news.php?act=adm">Добавить новость</a>';}
echo'</div><div class="menu">';
$pg = intval($_GET['pg']);
if($pg < 1)
{$pg = 1;}

$f = file($data1);
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

if ($_GET[act]=="adm") 
{

include"../configs.php";
include"../style/verh.php";

if ( !isset($top) && $status =='admin' && !isset($param)) 
{
$title = 'Админка';

print $top;

if(!trim($_POST['text']) || !trim($_POST['date']))
{
print '<div class="menu">
<form method="post" action="news.php?act=adm&">
Новость<br/>
<textarea name="text" rows="16" cols="64"></textarea><br/>
Дата<br/>
<input name="date" value="'.$tm.'"/><br/>
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

$f = @fopen($data1, 'a');
@fseek($f,0,SEEK_END);
@fputs($f, $_POST['text'].'|'.$_POST['date']."\n");
@fclose($f);


$f = @fopen($data2, 'w');
@fputs($f, $_POST['date']);
@fclose($f);


$f = @fopen($data3, 'w');
@fputs($f, $_POST['text']);
@fclose($f);


print '<h4>Ok</h4><div class="bordur"><a href="news.php">В Начало</a></div>';
}
print $foot;
}
else
{
echo"<div class='bordur'>Ошибка!</div>";
echo"<div class='menu'>
<img src='$url/style/image/error.png' alt='' /> Извините, но такой страницы не существует!<br></div>";
include"style/niz.php";
}
include"../style/niz.php";
}
?>