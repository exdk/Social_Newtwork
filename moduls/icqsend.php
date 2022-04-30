<?
include"../configs.php";

if($_GET[site]==""){$site = "yandex.ru";}else{$site = $_GET[site];}

if(!isset($_POST[uin]) or !isset($_POST[text]))
{
	if(isset($_GET[uin])){
include"../style/verh.php";
	echo '
<div class="bordur"><b>Отправка ICQ-сообщений</b></div>
<div class="menu">
<form method="post" action="icqsend.php">
Номер ICQ:<br>
<input type="Text" name="uin" value="'.$_GET[uin].'" maxlength="9"><br>
Сообщение:<br>
<input type="Text" name="text" value="" maxlength="500"><br>
<input type=submit name="send" value="Отправить">
</form><br><a href="index.php">В сервисы</a><br/></div>';
include"../style/niz.php";
	}else{
include"../style/verh.php";
		echo '
<b><div class="bordur">Отправка ICQ-сообщений</b></div>
<div class="menu">
<b>Все сообщения приходят с номера 13410525!</b><br/>
<form method="post" action="icqsend.php">
Номер ICQ:<br>
<input type="Text" name="uin" value="" maxlength="9"><br>
Сообщение:<br>
<input type="Text" name="text" value="" maxlength="500"><br>
<input type=submit name="send" value="Отправить">
</form><br><a href="index.php">В сервисы</a><br/></div>';
include"../style/niz.php";
}}else{
	include('WebIcqLite.class.php');
	$text=Encode($_POST[text],w);
    $icq = new WebIcqLite();
    if($icq->connect($UIN, $PASSWORD)){
        if(!$icq->send_message($_POST[uin], $text)){
            echo $icq->error;
        }else{
include"../style/verh.php";
            echo '
<b><div class="bordur">Отправка ICQ-сообщений</b></div>
<div class="menu">
Сообщение отправлено.<br>
<a href="icqsend.php">Отправить еще</a><br>
<a href="index.php">В сервисы</a><br/></div>';
include"../style/niz.php";
        }
        $icq->disconnect();
    }else{
        echo $icq->error;
    }
}

function Encode($str,$type=u)
{
	$conv=array();
	for($x=192;$x<=239;$x++)
		$conv[u][chr($x)]=chr(208).chr($x-48);
	for($x=240;$x<=255;$x++)
		$conv[u][chr($x)]=chr(209).chr($x-112);
	$conv[u][chr(168)]=chr(208).chr(129);
	$conv[u][chr(184)]=chr(209).chr(209);
	$conv[w]=array_flip($conv[u]);
	if($type=='w' || $type=='u')
		return strtr($str,$conv[$type]);
	else
		return $str;
}

?>