<?php
include"../configs.php";
include"../style/verh.php";
echo'<div class="menu">';
echo '<center><b>Гадалка</b></center>';
header("Cache-Control: no-cache");
header("Content-type: text/html; charset=utf-8");
if($act!='ans'){
print('Задайте свой вопрос, ответ на который должен быть позитивным или негативным.<br><br>
Позитивный ответ будет <font color="blue"><b>синим</b></font>.<br>
Негативный ответ будет <font color="red"><b>красным</b></font>.<br>
Неопределенный ответ будет <b>черным</b>.<br><br>
<form method="post" action="gad.php?act=ans">
<b>Ваше имя:</b><font color="green">(max. 15)</font><br>
<input type="text" name="name" maxlength="15"><br>
<b>Ваш вопрос:</b><font color="green">(max. 100)</font><br>
<input type="text" name="qw" maxlength="100"><br>
<input type="submit" value="Спросить"></form>');}

if($act=='ans'){
if($name!=''){
$name = substr($name, 0, 15);
$name = htmlspecialchars(stripslashes($name));
if($qw!=''){
$qw = substr($qw, 0, 100);
$qw = htmlspecialchars(stripslashes($qw));
$ans = array('да', 'конечно', 'наверное, да', 'несомнено, это так', 'это верно на все 100', 'затрудняюсь дать ответ', 'не знаю', 'даже не знаю, что ответить', 'не могу ответить на этот вопрос', 'не знаю, что сказать', 'нет', 'это не так', 'конечно, нет', 'однозначно, нет', 'наверное нет');
$n = rand(0, 14);

print('<b>Ваш вопрос:</b> '.$qw.'<br>
<b>Ответ:</b> ');
if($n>=0 & $n<=4){print('<font color="blue"><b>'.$name.', я думаю, '.$ans[$n].'</b></font>.');}
if($n>=5 & $n<=9){print('<b>'.$name.', я '.$ans[$n].'</b>.');}
if($n>=10 & $n<=14){print('<font color="red"><b>'.$name.', я думаю '.$ans[$n].'</b></font>.');}

print('<br>[<a href="gad.php">Гадать еще</a>]');

} else {

print('Вы не задали вопрос!');}

} else {

print('Вы не написали свое имя!');}}
echo'</div>';
include"../style/niz.php";
?>