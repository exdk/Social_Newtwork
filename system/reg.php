<?php
Error_Reporting(0);
include"../style/verh_reg.php";
include('global.php');
echo '<div class="bordur">Регистрация</div><div class="menu">';
//===============================================================
if ( !isset($_GET['action']))
     { echo '<form action="reg.php?action" method="POST">
При заполнении полей "Ваш логин" и "Пароль" допустимы
только символы ЛАТИНСКОГО алфавита и цифры!!!<br>
В обоих полях недопустимы символы пунктуации!!!<br>
<b>Ваш логин:</b><br>
<input name="login" maxlenght=15 ><br><br>
<b>Пароль:</b><br>
<input type="password" name="pass" maxlenght=15 ><br><br>
<input type="submit" value=" Регистрация ">
</form>';}
//===============================================================
else {
//===============================================================
if ( eregi("[^a-zA-Z0-9_-]" , $login )||
     eregi("[^a-zA-Z0-9]" , $pass ))
    { echo '<center><h1>
<font color="#ff0000">
Читай какие символы можно использовать при регистриции!<br>
</font></h1></center>';
for ( $xep =0 ; $xep <1000000 ; $xep++)
     { echo '&#160;';
     	}
exit;
     }
$login = trim($login );
$login = ereg_replace("[^a-zA-Z0-9_-]", '', $login );
//-------------------------------------------
$pass = trim($pass );
$pass = ereg_replace("[^a-zA-Z0-9]", '', $pass );
//===============================================================

if ( $pass =='' || $login =='' ||
     $login ==' ' || $pass ==' ')
{ echo '
<b><font color="#ff0000">
Внимание!!!<br>
Незаполнены все необходимые поля!</font></b><hr>
<a href="reg.php">Повторить регистрацию</a>';}

//-------------------------------------------------------
else {
$dir =opendir('forum/user');
while ( $nickname =readdir($dir))
       { $nickname = str_replace('.log', '', $nickname );
          $nick[] = $nickname ;}
closedir($dir);
$i =0;
$sovp =0;
while (isset($nick[$i]))
       { if ( eregi( $nick[$i] ,$login ) &&
              strlen($nick[$i]) == strlen($login) )
             { $sovp++; }
         $i++ ;
        }
if ($sovp != 0 )
       { echo '<b><font color="#ff0000">Юзер с таким логином уже зарегистрирован! Используйте другой!</font></b><hr>
<a href="reg.php">Повторить регистрацию</a><br>';}

//--------------------------------------------------------
else { $time= date('d').'.'. date('m').'.'. date('Y');
$hex =md5( md5( $pass ));
$fp =@fopen("forum/user/$login.log",'a+');
fputs( $fp , $hex ."\n");
if ( !file_exists('forum/user/vsego.dat'))
    { fputs( $fp , "admin\n"); }
else {fputs( $fp , "users\n");}
fputs( $fp , $time ."\n");
fputs( $fp , "\n");
fputs( $fp , "\n");
fputs( $fp , "\n");
fputs( $fp , "\n");
fputs( $fp , "\n");
fputs( $fp , "\n");
fputs( $fp , "\n");
fputs( $fp , "\n");
fputs( $fp , "0\n");
fputs( $fp , "\n");
fputs( $fp , "\n");
fputs( $fp , "\n");
fclose( $fp);

$fp =@fopen('forum/user/vsego.dat','a+');
fputs(  $fp , $login. "\n");
fclose($fp);

$text ='Спасибо за регистрацию на нашем форуме!<br>Сохраните Ваши регистрационные данные в надёжном месте и не забывайте их.<br>Ваши данные при регистрации:<br>Логин: <b>'. $login .'</b><br>Пароль: <b>'. $pass .'</b>';
$time= date('H:i').'/'. date('d').'.'. date('m').'.'. date('Y') ;

$fp =@fopen("forum/mail/$login.in",'a+');
$admin =file("forum/user/vsego.dat");
$w =strlen($admin[0]);
$admin[0] =substr($admin[0],0,$w-1);
fputs($fp , $admin[0]."\n");
fputs($fp , $time ."\n");
fputs($fp , $text ."\n");
fputs($fp , "new\n");
@fclose("forum/mail/$login.in");
@fopen("forum/mail/$login.out","a+");
@fclose("forum/mail/$login.out");

echo '
<br/>
<b>
Вы успешно зарегистрировались!</b><br>
Ваш логин: <b>'. $login .'</b><br>
Ваш пароль: <b>'. $pass .'</b><br><br>
<a href="../index.php?id=avtorized&amp;login='.$login.'&amp;pass='.$pass .'">Войти на форум</a>';
}
}
//===============================================================
}
echo'</div>';
include "../style/niz.php";
?>