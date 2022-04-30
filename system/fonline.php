<?php
Error_Reporting(0);
$refer =$_SERVER['HTTP_REFERER'];
if(!$refer)
{$refer = 'forum.php';}

session_name('SID');
session_start();
include"../configs.php";
include"../style/verh.php";
include('global.php');
if ( isset($login) &&
     isset( $pass ) &&
     $login !='' &&
     $pass !='')
     {
      $direct ='forum/user';
      include('avt.php');
      }
echo '<div class="menu">';
$vsego =file('forum/data/online.dat');
$i =0;
while ( isset( $vsego[$i]))
    { $w =strlen( $vsego[$r]);
      $vsego[$i] = substr( $vsego[$i] , 0 , $w -1);
      $i++; }
$i =0;
while ( isset( $vsego[$i]))
    { if ($vsego[$i] !='Guest')
    {echo '<b><a href="users.php?param=poisk&amp;nickname='. $vsego[$i] .'&amp;'. SID .'">'. $vsego[$i] .'</a></b>';}
    else { echo '<b>Гость</b>';}

$vsego[$i +2] =htmlspecialchars($vsego[$i +2]);
$vsego[$i +2] =str_replace('%', '', $vsego[$i +2]);
$vsego[$i +2] =str_replace('#', '', $vsego[$i +2]);
echo '<br>
IP: '. $vsego[$i +2] ;
$vsego[$i +3] =htmlspecialchars($vsego[$i +3]);
$vsego[$i +3] =str_replace('%', '', $vsego[$i +3]);
$vsego[$i +3] =str_replace('#', '', $vsego[$i +3]);

echo '<br>
Браузер: '. $vsego[$i +3] ;
echo '<hr size="2">';
      $i = $i +4;
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