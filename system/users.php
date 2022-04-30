<?php
Error_Reporting(0);
session_name('SID');
session_start();
include"../configs.php";
include"../style/verh.php";
include('global.php');
if (isset($nickname))
{
	if ( eregi('../', $nickname ))
       {echo '<center><h1>
<font color="#ff0000">
Внимание!!!<br>
Доступ запрещен!!!<br>
Не стоит так больше делать !!!
</font></h1></center>';
echo '<meta http-equiv="refresh" content="5; url=exit.php?'. SID .'">';
exit;}

$nickname = ereg_replace("[^a-zA-Z0-9\-_]", '', $nickname);

}

if ( isset($login) &&
     isset( $pass ) &&
     $login !='' &&
     $pass !='')
     {$direct ='forum/user';
      include('avt.php');
      }

echo '<div class="menu">';
//===============================================================
if ( $login !='' &&
     $login !=' ' &&
     $pass !='' &&
     $pass !=' ' )
{
include('ban.php');}
if (!isset($param))
{ echo '
<a href="users.php?param=spisok">Список пользователей</a>';
if ( !file_exists('forum/user/vsego.dat')) {$vsego = 0;}
  else   {$q =file('forum/user/vsego.dat');
        $vsego =count($q);
        }
echo ' ['. $vsego .']<br><hr>
<form action="users.php?param=poisk" method="POST">
Поиск юзера:<br>
<input name="nickname" maxlength=15><br>
<input type="submit" value=" Искать "><br>
</form>';
}
//===============================================================
elseif ( $param =='spisok')
{ if ( !file_exists('forum/user/vsego.dat')) {$vsego = 0;}
  else   {$log =file('forum/user/vsego.dat');
        $vsego =count($log);
        }

$all_str=ceil( $vsego /10);// --------------------  всего страниц
if ( $all_str ==0)
    {$all_str=1;}
if ( !isset($str))
    {$str=1;}
$str= ereg_replace("[^0-9]",'', $str );
if (    $str <1
     || $str > $all_str )
      { echo '<center><br><b><font color="#ff0000"><u>Внимание!!!<br>Доступ запрещен!!!</u></font></b><br>'; exit; }
$y=$str*10-10;
for ( $y ; $y != $str*10 ; $y++)
     { if ( isset($log[$y]))
           { $w =strlen( $log[$y]);
             $log[$y] = substr( $log[$y] , 0 , $w -1 );
            echo '<a href="users.php?param=poisk&amp;nickname='. $log[$y] .'&amp;'. SID .'">'. $log[$y] .'</a> ';
$data =file("forum/user/$log[$y].log");
$w =strlen( $data[1]);
$data[1] = substr( $data[1] , 0 , $w -1 );
if ($data[1] =='admin') {echo ' - администратор<br>';}
elseif ($data[1] =='moder') {echo ' - модератор<br>';}
elseif ($data[1] =='ban') {echo ' -<b><font color="#ff0000"> BANNED</font></b><br>';}
elseif ($data[1] =='rezv1') {echo ' - помощник<br>';}
elseif ($data[1] =='rezv2') {echo ' - резерв2<br>';}
elseif ($data[1] =='users') {
if ( isset($data[11]))
   { if ($data[11] < 10)
         { echo ' - новичёк<br>';}
     elseif ($data[11] >= 10 && $data[11] < 50 )
              { echo ' - пользователь<br>';}
     elseif ($data[11] >= 50 && $data[11] < 100 )
              { echo ' - постоялец<br>';}
     elseif ($data[11] >= 100 && $data[11] < 500 )
              { echo ' - бывалый<br>';}
     elseif ($data[11] >= 500 && $data[11] < 1000 )
              { echo ' - наш человек<br>';}
     elseif ($data[11] >= 1000 && $data[11] < 3000 )
              { echo ' - старожил сайта<br>';}
     elseif ($data[11] >= 3000 )
              { echo ' - VIP-юзер<br>';}
     else { echo ' - новичёк<br>';}
     }
else { echo ' - новичёк<br>';}
}
else {echo '...<br>';}
           }
      }
echo '<hr size="2">';
if ( $vsego >10 )
{
if ( $str != 1 && $str>1 )
    { echo '<a href="users.php?param=spisok&amp;str=1">1</a>';
     }
if ( $str != 2 && $str>2 )
    { echo ' <a href="users.php?param=spisok&amp;str=2">2</a>';
     }
if ( $str -2 > 2 )//-----------------------------------------80
     { echo ' ...';}

if ( $str > 3 )
     { echo ' <a href="users.php?param=spisok&amp;str='. ($str -1) .'">'. ($str -1) .'</a>';}

echo ' ['. $str .']' ;

if ( $str <= $all_str -1 )
    {echo ' <a href="users.php?param=spisok&amp;str='. ($str +1) .'">'.( $str +1 ).'</a>';}

if ( $str < $all_str -3 )
    { echo' ...';}

if ( $str < $all_str -2 )
    { echo ' <a href="users.php?param=spisok&amp;str='. ($all_str -1) .'">'. ($all_str -1) .'</a>';}

if ( $str < $all_str -1 )
    { echo ' <a href="users.php?param=spisok&amp;str='. $all_str .'">'. $all_str .'</a>';}
echo '<br>';
echo '<b>Всего страниц: '. $all_str .'<br></b>';
}
echo '<b>Всего пользователей: '. $vsego .'<br></b>';
}
//===============================================================
elseif ($param =='status' &&  isset($dan) && $status =='admin' ||
          $param =='status' &&  isset($dan) && $status =='moder')
{
$data =file("forum/user/$nickname.log");
$y=0;
while (isset($data[$y]))
      { $w =strlen( $data[$y]);
        $data[$y] = substr( $data[$y] , 0 , $w -1 );
        $y++;
       }
$data[1] = $dan ;
$fp =@fopen("forum/user/$nickname.log",'w');
$y=0;
while (isset($data[$y]))
      { fputs( $fp , $data[$y] ."\n");
        $y++;
       }
fclose( $fp );
echo '<b>Готово!</b><br>';
echo 'Просмотреть анкету пользователя
<a href="users.php?param=poisk&amp;nickname='. $nickname .'">'. $nickname .'.</a><br>';
echo '<meta http-equiv="refresh" content="5.0; url=users.php?param=poisk&amp;nickname='. $nickname .'&'. SID .'">';
}
//===============================================================
elseif ($param =="status" && !isset($dan) && $status =="admin" ||
          $param =="status" &&  !isset($dan) && $status =="moder")
{ if ( !file_exists("forum/user/$nickname.log"))
      { echo '
<font color="#ff0000">Юзер с таким логином не зарегистрирован!!!</font>';
echo '<hr size="2">';
echo '<a href="users.php">Продолжить</a>';
echo '<meta http-equiv="refresh" content="5.0; url=users.php?'. SID .'">';
       }
else  { $data =file("forum/user/$nickname.log");
$y=0;
while (isset($data[$y]))
      { $w =strlen( $data[$y]);
        $data[$y] = substr( $data[$y] , 0 , $w -1 );
        $y++;
       }

if ( isset($data[3]) && $data[3] =='m') { $pol='мужской';}
elseif ( isset($data[3]) && $data[3] =='w') { $pol='женский';}
else { $pol ='...'; }
        echo '<b>Анкета юзера <u>'. $nickname .'</u> :</b><br>

Статус : ';
if ($data[1] =='admin') {echo 'администратор<br>';}
elseif ($data[1] =='moder') {echo 'модератор<br>';}
elseif ($data[1] =='ban') {echo '<b><font color="#ff0000"> BANNED</font></b><br>';}
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
elseif ($data[1] =="rezv1") {echo 'помощник<br>';}
elseif ($data[1] =="rezv2") {echo 'резерв2<br>';}
else {echo '...<br>';}

echo '<hr>
<form action="users.php?param=status&amp;nickname='. $nickname .'" method="POST">
<select name="dan" size="1">
<option value="users">Пользователь';
if ( $status =="admin")
{ echo '
<option value="moder">Модератор
<option value="admin">Администратор'; }
echo '
<option value="rezv1">Помощник
<option value="rezv2">резерв2
</select>&nbsp&nbsp&nbsp
<input type="submit" value=" Сохранить ">
</form>';}
}
//===============================================================
elseif ($param =='del' && $status =='admin' )
{  if ( isset($yes) && $yes =='yes')
{
if ( @unlink("forum/user/$nickname.log"))
      { $log =file('forum/user/vsego.dat');
$fp =@fopen('forum/user/vsego.dat','w');
$w = count( $log );
for( $y =0 ; $y < $w ; $y++ )
      { if ( $log[$y] != $nickname ."\n" )
            { fputs( $fp , $log[$y] );}
        else { continue; }
       }
fclose($fp);
@unlink("forum/mail/$nickname.in");
@unlink("forum/mail/$nickname.out");
 echo 'Юзер, с логином "'.$nickname .'" успешно удален!<br>
<a href="users.php?param=spisok">Продолжить</a>';
echo '<meta http-equiv="refresh" content="5.0; url=users.php?'. SID .'">';
       }
else { echo '<font color="#ff0000">Ошибка при удалении юзера!!!</font><br>
<a href="users.php">Продолжить</a>';}
}
else {
 echo '<font color="#ff0000">
Подтвердите удаление юзера "'. $nickname .'" !<br>
<a href="users.php?param=del&nickname='. $nickname .'&yes=yes">[удалить]</a><br>';
        }
}
//===============================================================
elseif ($param =='ban' && $status =='admin' ||
        $param =='ban' && $status =='moder')
{ if ( isset($yes) && $yes ='yes')
	{  if ( $chas ==0 )
               { $ban_tek =file('forum/user/banned.dat');
                 $utf =count($ban_tek);
                 $i5 =0;
                 while ( isset($ban_tek[$i5]))
                     { $w =strlen( $ban_tek[$i5]);
                       $ban_tek[$i5] = substr( $ban_tek[$i5] , 0 , $w -1 );
                       $i5++;
                      }
                 if ($utf !=0)
	            {@unlink('forum/user/banned.dat');
	             $fp =@fopen('forum/user/banned.dat','a+');
                     flock($fp,LOCK_EX);
	             $i5 =0;
                     while ( isset($ban_tek[$i5]))
                          { if ( $ban_tek[$i5] != $nickname )
                                {fputs($fp , $ban_tek[$i5] ."\n");
                                 fputs($fp , $ban_tek[$i5 +1] ."\n");
                                 fputs($fp , $ban_tek[$i5 +2] ."\n");
                                 fputs($fp , $ban_tek[$i5 +3] ."\n");
                                 }
                            $i5 = $i5 +4;
                           }
                     flock ($fp,LOCK_UN);
	             fclose( $fp );
                     }
	          $data =file("forum/user/$nickname.log");
	          $y=0;
	          while (isset($data[$y]))
                     { $w =strlen( $data[$y]);
                       $data[$y] = substr( $data[$y] , 0 , $w -1 );
                       $y++;
                       }
	          $data[1] ='forum/users';
	          $fp =@fopen("forum/user/$nickname.log",'w');
                  flock($fp,LOCK_EX);
	          $y=0;
	          while (isset($data[$y]))
                      { fputs( $fp , $data[$y] ."\n");
                        $y++;
                        }
                  flock ($fp,LOCK_UN);
	          fclose( $fp );
                }

         else {
//---------
$novost = htmlspecialchars($novost);
$novost = str_replace('%', '', $novost);
$novost = str_replace('#', '', $novost);
$novost = str_replace('&', '', $novost);
$novost = str_replace('+', '', $novost);
$novost = str_replace('=', '', $novost);
$novost = str_replace('{', '', $novost);
$novost = str_replace('}', '', $novost);
$novost = str_replace("\n", '', $novost);
$novost = str_replace("\r", '', $novost);
//---------
        $time_ban = time() + $chas * 3600;
	$fp =@fopen('forum/user/banned.dat','a+');
	flock($fp ,LOCK_EX);
	fputs($fp , $nickname ."\n");
	fputs($fp , $time_ban ."\n");
	fputs($fp , $login ."\n");
	fputs($fp , $novost ."\n");
	flock ($fp ,LOCK_UN);
	fclose($fp );
	@chmod("$fp", 0777);

	$data =file("forum/user/$nickname.log");
	$y=0;
	while (isset($data[$y]))
      { $w =strlen( $data[$y]);
        $data[$y] = substr( $data[$y] , 0 , $w -1 );
        $y++;
       }
	$data[1] ='forum/ban';
	$fp =@fopen("forum/user/$nickname.log",'w');
	$y=0;
	while (isset($data[$y]))
      { fputs( $fp , $data[$y] ."\n");
        $y++;
       }
	fclose( $fp );
             }

	echo '<b>Готово!</b><br>';
	echo 'Просмотреть анкету пользователя
	<a href="users.php?param=poisk&amp;nickname='. $nickname .'">'. $nickname .'.</a><br>';
	echo '<meta http-equiv="refresh" content="3.0; url=users.php?param=poisk&amp;nickname='. $nickname .'">';
      }
else { echo '
	<form action="users.php?param=ban&amp;nickname='. $nickname .'&amp;yes=yes" method="POST">
	<b>Банить/разбанить юзера <u>'. $nickname .'</u>:</b><br><br>
	<select name="chas" size="1">
	<option value=0 >отмена
	<option value=1 >1 час
	<option value=3 >3 часа
	<option value=6 >6 часов
	<option value=12 >12 часов
	<option value=24 >сутки
	<option value=72 >3 суток
	<option value=148 >неделя
	<option value=720 >месяц
	<option value=216000 >навсегда
	</select><br><br>
        <b>Причина БАНА (неуказывать в случае отмены):</b><br>
        <textarea name="novost"  maxlength=1000 cols=70 rows=5 wrap="soft"></textarea>
        <br>
        <br>
	<input type="submit" value=" Сохранить данные ">
	</form>';
	}
}
//===============================================================
elseif ($param =='password'  && $status =='admin')
{ if ( !isset($newpass))
     { if ( !file_exists("forum/user/$nickname.log"))
          { echo '
<font color="#ff0000">Юзер, с таким логином не зарегистрирован!!!</font>';
echo '<hr size="2">';
echo '<a href="users.php?'. SID .'">Продолжить</a>';
echo '<meta http-equiv="refresh" content="5.0; url=users.php?'. SID .'">';
           }
  else  { $data =file("forum/user/$nickname.log");
$y=0;
while (isset($data[$y]))
      { $w =strlen( $data[$y]);
        $data[$y] = substr( $data[$y] , 0 , $w -1 );
        $y++;
       }
if ( isset($data[3]) && $data[3] =='m') { $pol='мужской';}
elseif ( isset($data[3]) && $data[3] =='w') { $pol='женский';}
else { $pol ='...'; }
        echo '<b>Анкета юзера <u>'. $nickname .'</u> :</b><br>

Статус : ';
if ($data[1] =="admin") {echo 'администратор<br>';}
elseif ($data[1] =="moder") {echo 'модератор<br>';}
elseif ($data[1] =="ban") {echo '<b><font color="#ff0000"> BANNED</font></b><br>';}
elseif ($data[1] =="users") {
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
echo '<hr>
<form action="users.php?param=password&amp;nickname='. $nickname .'" method="post">
<b>Новый пароль:</b><br>
<input type="password" name="newpass" maxlength=15>&nbsp&nbsp&nbsp
<input type="submit" value=" Сохранить ">
</form>';
         }
      }
else { $data =file("forum/user/$nickname.log");
$y=0;
while (isset($data[$y]))
      { $w =strlen( $data[$y]);
        $data[$y] = substr( $data[$y] , 0 , $w -1 );
        $y++;
       }
$data[0] = md5( md5($newpass)) ;
$fp =@fopen("forum/user/$nickname.log",'w');
$y=0;
while (isset($data[$y]))
      { fputs( $fp , $data[$y] ."\n");
        $y++;
       }
fclose( $fp );
echo '<b>Готово! Пароль успешно сохранен.</b><br>
<a href="users.php">Продолжить</a>';
echo '<meta http-equiv="refresh" content="3; url=users.php?param=poisk&nickname='. $nickname .'&'. SID .'">';
      }
}
//===============================================================
elseif ($param =='poisk')
{
if ( !file_exists("forum/user/$nickname.log") ||
      $nickname =='' ||
      $nickname ==' ' ||
      is_dir("$nickname.log"))
      { echo '
<font color="#ff0000">Юзер с таким логином не зарегистрирован!!!</font><br>';
echo '<hr size="2">';
echo '<a href="users.php">Продолжить</a>';
echo '<meta http-equiv="refresh" content="3.0; url=users.php?'. SID .'">';
       }
else  { $data =file("forum/user/$nickname.log");
$y=0;
while (isset($data[$y]))
      { $w =strlen( $data[$y]);
        $data[$y] = substr( $data[$y] , 0 , $w -1 );
        $y++;
       }
if ( isset($data[3]) && $data[3] =='m') { $pol='мужской';}
elseif ( isset($data[3]) && $data[3] =='w') { $pol='женский';}
else { $pol ='...'; }
        echo '<b>Анкета юзера <u>'. $nickname .'</u> :</b><br/>

Статус : ';
if ($data[1] =='admin') {echo 'администратор<br>';}
elseif ($data[1] =='moder') {echo 'модератор<br>';}
elseif ($data[1] =='ban') {echo '<b><font color="#ff0000"> BANNED</font></b><br>';}
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
          $data[9] !='' &&
          $data[9] !='http://' )
   { echo 'Сайт: <a href="http://'. $data[9].'">перейти</a><br>';}
if (isset($data[10]) &&
          $data[10] !="" &&
          $data[10] !='http://' )
   { echo 'Фото: <a href="http://'. $data[10] .'">смотреть</a><br>';}

echo '<hr size="2">';
if ( isset($login) &&
    isset($pass) && $login !='' &&
    $pass !='' && $status !='gost')
    {
if ($nickname != $login )
{echo '<a href="mail.php?param=otvet&amp;nickname='. $nickname .'">[отправить сообщение]</a><br>';}

if ( $nickname == $login && $status =='users' ||
     $nickname == $login && $status =='rezv1' ||
     $nickname == $login && $status =='rezv2' ||
     $nickname == $login && $status =='moder' )
    {echo '<a href="anketa.php?param=red&amp;nickname='. $nickname .'">[изменить анкету]</a><br>';}

if ($status =='admin' || $status =='moder')
{

if ($status =='moder' && $data[1] =='admin' ||
    $status =='moder' && $data[1] =='moder' )
    {echo ' ';}

else {
if ( $status =='moder' && $data[1] !='admin' )
 {echo '<a href="users.php?param=ban&amp;nickname='. $nickname .'">[бан/разбан]</a><br>';
echo '<a href="users.php?param=status&amp;nickname='. $nickname .'">[изм.статус]</a><br>';
  }

elseif ( $status =='admin' && $data[1] !='admin' )
 {echo '<a href="users.php?param=password&amp;nickname='. $nickname .'">[изм.пароль]</a><br>';
echo '<a href="users.php?param=del&amp;nickname='. $nickname .'">[удалить]</a><br>';
echo '<a href="users.php?param=ban&amp;nickname='. $nickname .'">[бан/разбан]</a><br>';
echo '<a href="users.php?param=status&amp;nickname='. $nickname .'">[изм.статус]</a><br>';
  }

echo '<a href="anketa.php?param=red&amp;nickname='. $nickname .'&amp;'. SID .'">[изменить анкету]</a><br>';
}
       }
       }
}

}

//===============================================================
else { echo '<font color="#ff0000">Неправильный параметр!!!<br>Доступ запрещен!!!<br></font>'; exit; }
//===============================================================
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