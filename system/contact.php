<?php
include"../configs.php";
include "../style/verh.php";
$theme = "From $adres";
if(!trim($_POST['mes']))
{
print '<div class="menu">
<form action="contact.php" method="post">
Обратный Адрес<br/>
<input type="text" name="mail" value=""/><br/>
*Cообщение<br/>
<textarea name="mes" rows="8" cols="42"></textarea><br/>
Транслит <br/>
<input type="checkbox" name="trans"/><br/>
<input type="submit" value="Отправить"/><br>
</div>
</form>';
}
else
{
$mes = trim($_POST['mes']);
if($_POST['trans'])
{
$mes = str_replace(
array('YA','Ya','ya','yee','YO','yo','Yo','ZH','zh','Zh','Z','z','CH','ch','Ch','SH','sh','Sh','YE','ye','Ye','YU','yu','Yu','JA','ja','Ja','A','a','B','b','V','v','G','g','D','d','E','e','I','i','J','j','K','k','L','l','M','m','N','n','O','o','P','p','R','r','S','s','T','t','U','u','F','f','H','h','W','w','q','Y','y','C','c','X','x'),
array('Я','Я','я','ые','Ё','ё','Ё','Ж','ж','Ж','З','з','Ч','ч','Ч','Ш','ш','Ш','Э','э','Э','Ю','ю','Ю','Я','я','Я','А','а','Б','б','В','в','Г','г','Д','д','Е','е','И','и','Й','й','К','к','Л','л','М','м','Н','н','О','о','П','п','Р','р','С','с','Т','т','У','у','Ф','ф','Х','х','Щ','щ','ь','Ы','ы','Ц','ц','Х','х'),
$mes);
}

if(trim($_POST['mail']))
{$mes.= "\n".'Связь: '.trim($_POST['mail']);}

if(mail($mail, '=?utf-8?B?'.base64_encode($theme).'?=', $mes, 'From: robot@'.$_SERVER['HTTP_HOST']."\r\n".'Content-type: text/plain; charset=utf-8'))
{print '<div class="menu">Ваше сообщение успешно отправлено!<br/></div>';}
else
{print '<div class="menu">Сообщение не отправлено!<br/></div>';}
}
include "../style/niz.php";
?>