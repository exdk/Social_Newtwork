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
if ( isset($top)) { $top= ereg_replace("[^0-9]",'', $top );}
elseif (isset($tema)) { $tema= ereg_replace("[^0-9]",'', $tema );}
elseif (isset($post)) { $post= ereg_replace("[^0-9]",'', $post );}
echo '<div class="bordur">BB-коды</div><div class="menu">';
echo '<b>Привет, '. $login .'</b><br>';
$direct1 ='forum/mail';
include('privat.php');
if ( $new !=0 )
    { echo '<br><a href="mail.php?param=in&amp;'. SID .'">
<b><font color="#ff0000">Вам письмо!!!</font></b>
</a> <img src="forum/smile/email.gif" alt=""> ['. $new .']';}
if ( $status == 'admin' || $status == 'moder' || $status == 'rezv1' )
{ echo '<b><u>Коды, используемые на форуме:</b></u><br><br>
<b>[b]Жирный шрифт[/b]</b><br>
[u]<u>Подчёркнутый шрифт</u>[/u]<br>
[i]<i>Курсив</i>[/i]<br>';}
?>
<font color="#ff0000">[color=1]Красный[/color]</font><br>
<font color="#ffff22">[color=2]Жёлтый[/color]</font><br>
<font color="#00bb00">[color=3]Зелёный[/color]</font><br>
<font color="#0000bb">[color=4]Синий[/color]</font><br>
<big>[big]Большой шрифт[/big]</big><br>
<small>[small]Малый шрифт[/small]</small><br>
<br>

<b><u>
Смайлы, используемые на форуме:</u></b>
<u><br><br>
Смайл > Символика<br></u>
<img src='smile/1.gif' alt=""> :-)<br>
<img src='smile/2.gif' alt=""> :-(<br>
<img src='smile/3.gif' alt=""> :-|<br>
<img src='smile/4.gif' alt=""> :-O<br>
<img src='smile/5.gif' alt=""> :'(<br>
<img src='smile/6.gif' alt=""> ;-)<br>
<img src='smile/7.gif' alt=""> :-P<br>
<img src='smile/8.gif' alt=""> 8-)<br>
<img src='smile/9.gif' alt=""> :-D<br>
<?php
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