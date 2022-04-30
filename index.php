<?php


Error_Reporting(0);
session_name('SID');
session_start();
include"configs.php";
include"style/verh.php";
include('global.php');
if ( $id =='avtorized' &&
     $login !='' &&
     $pass !='')
     { session_register('login');
       session_register('pass');
     }
/*$direct ='system/forum/user';
include('system/avt.php');
if ( isset($top)) $top = intval($top);
elseif (isset($tema)) $tema = intval($tema);
elseif (isset($post)) $post = intval($post);
elseif (isset($nickname))
       {$nickname = ereg_replace("[^a-zA-Z0-9\-_]", '', $nickname);}
include('system/translit.php');
include('system/online_doc.php');
if ( !isset($login) ||
     !isset( $pass ) ||
     $login =='' ||
     $pass =='' ||
     $status =='gost')
     {}
else {include('system/ban.php');}

Error_Reporting(0);
$refer =$_SERVER['HTTP_REFERER'];
if(!$refer)
{$refer = 'system/forum.php';}
session_name('SID');
session_start();
include('system/global.php');
if ( isset($login) &&
     isset( $pass ) &&
     $login !='' &&
     $pass !='')
     {
      $direct ='system/forum/user';
      include('system/avt.php');
      }*/
if ( $login !='' &&
     $login !=' ' &&
     $pass !='' &&
     $pass !=' ' )
{
echo"<div class='bordur'><center>Добавь в закладки <b>$url</b></center></div>";
echo'<div class="menu">';
include"system/holiday.php";
echo'&raquo; <a href="system/news.php">Новости</a>:<br>'; 
include"system/news/news.php";
echo'
&raquo; <a href="system/menu.php">Мое меню</a><br/>
&raquo; <a href="system/forum.php">Форум</a> | <a href="system/chat.php">Чат</a><br/>
&raquo; <a href="system/users.php?param=spisok">Обитатели</a>';
include"system/forum/obitateli.php";
echo'
&raquo; <a href="games/">Онлайн игры</a><br/>
&raquo; <a href="moduls/">Сервисы</a><br/>
&raquo; <a href="system/contact.php">Контакты</a><br/>
&raquo; <a href="system/exit.php">Выход</a><br/></div>';
}
else {echo '<div class="bordur">Авторизация</div>
<div class="menu">*<a href="http://7bx.ru">Бесплатные загрузки</a><br>
<img src="style/image/vopr.png" alt="" /> <a href="info.php">Что это?</a></div>
<div class="menu"><form action="index.php?id=avtorized" method="post">
<b>Логин :</b><br>
<input name="login" maxlength="15" ><br>
<b>Пароль :</b><br>
<input type="password" name="pass" maxlength="15"><br>
<input type="submit" value=" Авторизация "></form></div>
<div class="menu">Нас уже:';
include"system/forum/obitateli.php";
echo'<a href="system/rules.php">Присоединяйся!</a></div>';}
include"style/niz.php";


if ($_GET[act]=="go") 
{
include "configs.php";
echo "<meta http-equiv='refresh' content='0; url=$rek'>";
}

if ($_GET[act]=="error") 
{
$glav=1;
include "configs.php";
include "style/verh_reg.php";
echo"<div class='bordur'>Ошибка!</div>";
echo"<div class='menu'>
<img src='style/image/error.png' alt='' /> Извините, но такой страницы не существует!<br></div>
<div class='bordur'><a href='$url'>На главную</a></div>";
include"style/niz.php";
}
?>