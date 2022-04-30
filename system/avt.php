<?php
if ( isset($login) &&
         isset($pass) &&
         $login !='' &&
         $pass !='' )
{
$login=htmlspecialchars($login);
$login = ereg_replace("[^a-zA-Z0-9\-_]", '', $login );
//===============================================================
if ( file_exists("$direct/$login.log"))
    { $fl = file("$direct/$login.log" );
      $pas = $fl[0];
      $status = $fl[1];
      $w =strlen($status);
      $status = substr( $status , 0 , $w -1);
      $pass1 =md5( md5( $pass)) ."\n";
      if ( $pas == $pass1 )
          { @fclose($f);

 }
      else {
session_destroy();
echo '<div class="menu"><font color="#ff0000">Неверный пароль!!!<br>
Доступ запрещен!!!</font><br>
<a href="forum.php">Вход</a><br></div>';
header('Location: forum.php',true,301);
exit;
}
     }

else {
session_destroy();
echo '<div class="menu"><font color="#ff0000">Неверный логин!!!<br>
Доступ запрещен!!!<br></font>
<a href="forum.php">Вход</a><br></div>';
header('Location: forum.php',true,301);
exit;
}
}
else {
$status ='gost';
session_destroy();
}
//$mess='<center><h1>АДМИН!!!<br>УВАЖАЙ ЧУЖОЙ ТРУД!!!<br>КОПИРАЙТЫ СНОСИТЬ ЗАПРЕЩЕНО!!!<br>&#169; SIM-SIM</h1></center>';
?>