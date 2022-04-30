<?php
Error_Reporting(0);
session_name('SID');
session_start();
include"../configs.php";
include"../style/verh.php";
include('global.php');
if (isset($_POST['pol'])) $pol = $_POST['pol'];
if (isset($_POST['vozrast'])) $vozrast = $_POST['vozrast'];
if (isset($_POST['gorod'])) $gorod = $_POST['gorod'];
if (isset($_POST['mobile'])) $mobile = $_POST['mobile'];
if (isset($_POST['icq'])) $icq = $_POST['icq'];
if (isset($_POST['osebe'])) $osebe = $_POST['osebe'];
if (isset($_POST['email'])) $email = $_POST['email'];
if (isset($_POST['site'])) $site = $_POST['site'];
if (isset($_POST['foto'])) $foto = $_POST['foto'];
$direct ='forum/user';
include('avt.php');
echo '<div class="menu">';
if ( !isset($login) ||
      $login =='' ||
      $login ==' ' ||
      $pass =='' ||
      $pass ==' ' ||
     !isset($pass) ||
     $status =='gost')
    { echo '<font color="#ff0000">Внимание!!!<br>Доступ запрещен!!!<br>Вы не авторизованы!!!</font><br>';}
else {
//===============================================================
if (!isset($nickname))
    { $nickname = $login;}

if ( eregi( '../' , $nickname ))
       {echo '<center><h1>
<font color="#ff0000">
Внимание!!!<br>
Доступ запрещен!!!<br>
Не стоит так больше делать !!!
</font></h1></center>';
exit;}
else {
$nickname = htmlspecialchars($nickname);
$nickname=ereg_replace("[^a-zA-Z0-9\-_]",'',$nickname);
}
//===============================================================


if ( !file_exists("forum/user/$nickname.log"))
      { echo '
<font color="#ff0000">Юзер с таким логином не зарегистрирован!!!</font><br><br>
<a href="users.php?'. SID .'">Продолжить</a>';
       }

else  {
 if (!isset($param))
{
 $undata =file_get_contents("forum/user/$nickname.log");
$data=explode("\n",$undata);
if ( isset($data[3]) && $data[3] =="m") { $pol='мужской';}
elseif ( isset($data[3]) && $data[3] =="w") { $pol='женский';}
else { $pol ='...'; }
        echo '<b>Анкета юзера <u>'. $nickname .'</u> :</b><br>

Статус : ';
if ($data[1] =='admin') {echo 'администратор<br>';}
elseif ($data[1] =='moder') {echo 'модератор<br>';}
elseif ($data[1] =='ban') {echo '<b><font color="#ff0000"> - BANNED</font></b><br>';}
elseif ($data[1] =='users') {
if ( isset($data[11]))
   { if ($data[11] < 10)
         { echo 'новичёк<br>';}
     elseif ($data[11] >= 10 && $data[11] < 50 )
              { echo 'пользователь<br>';}
     elseif ($data[11] >= 50 && $data[11] < 100 )
              { echo 'постоялец<br>';}
     elseif ($data[11] >= 100 && $data[11] < 500 )
              { echo 'бывалый<br>';}
     elseif ($data[11] >= 500 && $data[11] < 1000 )
              { echo 'наш человек<br>';}
     elseif ($data[11] >= 1000 && $data[11] < 3000 )
              { echo 'старожил сайта<br>';}
     elseif ($data[11] >= 3000 )
              { echo 'VIP-юзер<br>';}
     else { echo 'новичёк<br>';}
     }
else { echo 'новичёк<br>';}
}
elseif ($data[1] =='rezv1') {echo 'помощник<br>';}
elseif ($data[1] =='rezv2') {echo 'резерв2<br>';}
else {echo '...<br>';}
if (isset($data[2]) && $data[2] !="")
   { echo 'Дата регистрации: '. $data[2] .'<br>';}
if (isset($data[3]) && $data[3] !="")
   { echo 'Пол: '. $pol .'<br>';}
if (isset($data[4]) && $data[4] !="")
   { echo 'Возраст: '. $data[4] .'<br>';}
if (isset($data[5]) && $data[5] !="")
   { echo 'Город: '. $data[5] .'<br>';}
if (isset($data[6]) && $data[6] !="")
   { echo 'Мобила: '. $data[6] .'<br>';}
if (isset($data[7]) && $data[7] !="")
   { echo 'ICQ: '. $data[7] .'<br>';}
if (isset($data[12]) && $data[12] !="")
   { echo 'О себе: '. $data[12] .'<br>';}
if (isset($data[11]) && $data[11] !="")
   { echo 'Постов на форуме: '. $data[11] .'<br>';}
if (isset($data[8]) && $data[8] !="")
   { echo 'E-mail: <a href="mailto://'. $data[8] .'">написать</a><br>';}
if (isset($data[9]) &&
          $data[9] !="" &&
          $data[9] !='http://' )
   { echo 'Сайт: <a href="http://'. $data[9].'">перейти</a><br>';}
if (isset($data[10]) &&
          $data[10] !="" &&
          $data[10] !='http://' )
   { echo 'Фото: <a href="http://'. $data[10] .'">смотреть</a><br>';}


echo '<hr size="2">';
if ($nickname != $login )
{echo '<a href="mail.php?param=otvet&amp;nickname='. $nickname .'&amp;'. SID .'">[отправить сообщение]</a><br>';}
if ( $nickname == $login && $status =="users" ||
      $nickname == $login && $status =="rezv1" ||
       $nickname == $login && $status =="rezv2" ||
     $nickname == $login && $status =="moder" )
    { //---------------------------------------------------------------

echo '<a href="anketa.php?param=red&amp;nickname='. $nickname .'">[изменить анкету]</a><br>';}

if ($status =='admin' || $status =='moder')
{
if ($status =='moder' &&
    $data[1] =='admin' ||
    $status =='moder' &&
    $data[1] =='moder')
    {echo ' ';}

else {
if ($status =='admin')
{ echo '<a href="users.php?param=password&amp;nickname='. $nickname .'&amp;'. SID .'">[изм.пароль]</a><br>';
if ($data[1] !='admin')
{echo '<a href="users.php?param=del&amp;nickname='. $nickname .'&amp;'. SID .'">[удалить]</a><br>';}
 }

if ( $status =="admin" && $data[1] !="admin" ||
     $status =="moder" && $data[1] =="users" ||
     $status =="moder" && $data[1] =="rezv1" ||
     $status =="moder" && $data[1] =="rezv2" )
 {echo '<a href="users.php?param=ban&amp;nickname='. $nickname .'&amp;'. SID .'">[бан/разбан]</a><br>';
echo '<a href="users.php?param=status&amp;nickname='. $nickname .'&amp;'. SID .'">[изм.статус]</a><br>';
  }

echo '<a href="anketa.php?param=red&amp;nickname='. $nickname .'&amp;'. SID .'">[изменить анкету]</a><br>';
}
       }
}
//===============================================================
elseif ($param =='red' && $status =='admin' ||
        $param =='red' && $status =='moder' ||
        $param =='red' && $nickname == $login )
     {
//------------------------------------------------
if (    !isset($yes) )
{  $undata =file_get_contents("forum/user/$nickname.log");
$data=explode("\n",$undata);
echo '
<form action="anketa.php?param=red&amp;nickname='. $nickname .'&amp;yes=yes&amp;'. SID .'" method="POST">
<b>Анкета юзера <u>'. $nickname .'</u> :</b><br>
Ваш пол:<br>
<select name="pol" size="1">
<option value="m">мужской
<option value="w">женский
</select>
<br>
Возраст: <br>
<input name="vozrast" size=3';
if (isset($data[4]) && $data[4] !="")
   { echo ' value="'. $data[4].'"' ;}
 echo ' maxlength=2>
<br>
Город: <br>
<input name="gorod" size=15';
if (isset($data[5]) && $data[5] !="")
   { echo ' value="'. $data[5].'"'  ;}
 echo ' maxlength=24>
<br>
Мобила: <br>
<input name="mobile" size=15';
if (isset($data[6]) && $data[6] !="")
   { echo ' value="'. $data[6] .'"' ;}
 echo ' maxlength=14>
<br>
ICQ: <br>
<input name="icq" size=10';
if (isset($data[7]) && $data[7] !="")
   { echo ' value="'. $data[7] .'"' ;}
 echo ' maxlength=10>
<br>
О себе: <br>
<input name="osebe" ';
if (isset($data[12]) && $data[12] !="")
   { echo ' value="'. $data[12] .'"' ;}
 echo ' maxlength=100>
<br>
E-mail: <br>
<input name="email" ';
if (isset($data[8]) && $data[8] !="")
   { echo ' value="'. $data[8].'"'  ;}
 echo ' maxlength=24>
<br>
Сайт: <br>
<input name="site"';
if (isset($data[9]) && $data[9] !="")
   { echo ' value="http://'. $data[9] .'"'  ;}
else { echo ' value="http://"'  ;}
 echo ' maxlength=50>
<br>
Фото: <br>
<input name="foto" ';
if (isset($data[10]) && $data[10] !="")
   { echo ' value="http://'. $data[10] .'"'  ;}
else { echo ' value="http://"'  ;}
 echo ' maxlength=50>
<br><br>
<input type="submit" value=" Сохранить ">
</form>';

}
//---------------------------------------------------
elseif ( isset($yes) && $yes =='yes' )
{

//------
$gorod=htmlspecialchars($gorod);
$gorod = str_replace('?', '', $gorod);
$gorod = str_replace('./', '', $gorod);
$gorod = str_replace('%', '', $gorod);
$gorod = str_replace('$', '', $gorod);
$gorod = str_replace('@', '', $gorod);
$gorod = str_replace('#', '', $gorod);
$gorod = str_replace('|', '', $gorod);
$gorod = str_replace('^', '', $gorod);
$gorod = str_replace('(', '', $gorod);
$gorod = str_replace(')', '', $gorod);
$gorod = str_replace('_', '', $gorod);
$gorod = str_replace('=', '', $gorod);
$gorod = str_replace('+', '', $gorod);
//--------
$osebe=htmlspecialchars($osebe);
$osebe = str_replace('./', '', $osebe);
$osebe = str_replace('#', '', $osebe);
$osebe = str_replace('%', '', $osebe);
$osebe = str_replace('+', '', $osebe);
$osebe = str_replace('=', '', $osebe);
//--------
$mobile = eregi_replace("[^a-zA-Zа-яА-Я0-9]", '', $mobile);

//--------
$icq = ereg_replace("[^0-9]", '', $icq);
$pol = ereg_replace("[^mw]", '', $pol);
$vozrast = ereg_replace("[^0-9]", '', $vozrast);
if ( $vozrast < 10 || $vozrast > 60 )
    { $vozrast ="";}
if ( !preg_match("/^[a-z0-9\._\-]+@[a-z0-9\._\-]+\.[a-z]{2,6}$/i",  $email))
    { $email ='';}
$site=htmlspecialchars($site);
$site = str_replace('!', '', $site);
$site = str_replace('@', '', $site);
$site = str_replace('#', '', $site);
$site = str_replace('%', '', $site);
$site = str_replace('^', '', $site);
$site = str_replace('$', '', $site);
$site = str_replace('+', '', $site);
$site = str_replace('*', '', $site);
$site = str_replace(';', '', $site);
$site = str_replace('{', '', $site);
$site = str_replace('}', '', $site);
$site = str_replace('[', '', $site);
$site = str_replace(']', '', $site);
$site = str_replace('(', '', $site);
$site = str_replace(')', '', $site);
$site = str_replace('http://', '', $site);
//--------
$foto=htmlspecialchars($foto);
$foto = str_replace(')', '', $foto);
$foto = str_replace('(', '', $foto);
$foto = str_replace('!', '', $foto);
$foto = str_replace('@', '', $foto);
$foto = str_replace('#', '', $foto);
$foto = str_replace('%', '', $foto);
$foto = str_replace('^', '', $foto);
$foto = str_replace('$', '', $foto);
$foto = str_replace('=', '', $foto);
$foto = str_replace('+', '', $foto);
$foto = str_replace('*', '', $foto);
$foto = str_replace(';', '', $foto);
$foto = str_replace('{', '', $foto);
$foto = str_replace('}', '', $foto);
$foto = str_replace('[', '', $foto);
$foto = str_replace(']', '', $foto);
$foto = str_replace('http://', '', $foto);
//---------
$undata =file_get_contents("forum/user/$nickname.log");
$data=explode("\n",$undata);
$data[3] = $pol;
$data[4] = $vozrast;
$data[5] = $gorod;
$data[6] = $mobile;
$data[7] = $icq;
$data[8] = $email;
$data[9] = $site;
$data[10] = $foto;
if ( !isset($data[11]))    { $data[11] =0;}
$data[12] = $osebe ;
if ( !isset($data[13]))    { $data[13] =0;}

$fp =@fopen("forum/user/$nickname.log","w");
$y=0;
while (isset($data[$y]))
      { fputs( $fp , $data[$y] ."\n");
        $y++;
       }
fclose( $fp );
echo '<b>Готово! Данные успешно изменены!</b><br>
<a href="anketa.php?nickname='. $nickname .'&amp;'. SID .'">Продолжить</a>
<meta http-equiv="refresh" content="5.0; url=anketa.php?nickname='. $nickname .'&amp;'. SID .'">';
}
//-----------------------------------------------------
else {echo 'У вас недостаточно прав!!!<br>Доступ запрещен!!!<br>';exit;}
      }
//===============================================================
else {echo 'У вас недостаточно прав!!!<br>Доступ запрещен!!!<br>';exit;}
}

//===============================================================
}
if ( $login !='' &&
     $login !=' ' &&
     $pass !='' &&
     $pass !=' ' )
    {
echo '<a href="mail.php?'.SID .'">Почта</a> | ';
}
echo '<a href="forum.php?'.SID .'">Форум</a></div>';
include "../style/niz.php";
?>