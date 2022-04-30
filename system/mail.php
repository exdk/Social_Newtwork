<?php
Error_Reporting(0);
session_name('SID');
session_start();
include"../configs.php";
include"../style/verh.php";
include('global.php');
if ( isset($login) &&
     isset( $pass ) &&
     $login !='' &&
     $pass !='')
     {$direct ='forum/user';
      include('avt.php');
      }
      if ( $status =='admin' ||
           $status =='moder' ||
           $status =='users' ||
           $status =='rezv2' ||
           $status =='rezv1' ||
           $status =='ban')
          {
include('translit.php');
@fopen("forum/mail/$login.in",'a+'); @fclose("forum/mail/$login.in");
@fopen("forum/mail/$login.out",'a+'); @fclose("forum/mail/$login.out");
echo"<div class='menu'>";

//===============================================================
if ( !isset($param)) //                              без параметра
{ $out = file("forum/mail/$login.out");
 $out_vsego =count($out) /3 ;
include('privat.php');
if ($new ==0)
    { echo 'Новых писем нет!<br>';}
else { echo 'У вас непрочитанных- <b><font color="#ff0000">'. $new .' !</font></b><br>';}
echo '<hr size="2">
<a href="mail.php?param=in&amp;'. SID .'">Входящие</a> ['. $in_vsego .']<br>
<a href="mail.php?param=out&amp;'. SID .'">Исходящие</a> ['. $out_vsego .']<br>
<a href="mail.php?param=mail&amp;'. SID .'">Написать</a><br>
<a href="mail.php?param=clear&amp;'. SID .'">Очистить ящик</a><br>
<hr size="2">
<b><font color="#ff0000">Не храните важную информацию в вашем почтовом ящике!!!</font></b><br>';
}
//---------------------------------------------------------------
elseif ($param =='mail')
{
echo '<hr size="2">
<form action="mail.php?param=otvet&amp;yes=yes&amp;'. SID .'" method="POST">
<b>Введите логин получателя:</b><br>(допустимы только символы латинского алфавита!)<br>
<input type="text" name="nickname"  maxlength=15>
<br><br>
<b>Внесите в поле текст письма:</b><br>
<textarea name="novost"  maxlength=500 cols=70 rows=5 wrap="soft"></textarea><br><br>
<input type="submit" value=" Отправить письмо "><br>
</form>';
}
//---------------------------------------------------------------
elseif ($param =='in') //                                входящие
{ $in = file("forum/mail/$login.in");
 $in_vsego =count($in) /4 ;
if ( $in_vsego ==0)
    { echo '<hr size="2">';echo '<b>Входящих писем нет!</b><br>';
echo '<a href="mail.php?'. SID .'">Продолжить</a><br>
<meta http-equiv="refresh" content="5; url=mail.php?'. SID .'">';
     }
else { echo'<b><u>Входящая почта:</u></b><br><hr size="2">';
       $y =count($in);
       $i = $y-4;
       while ( isset($in[$i]))
             { $w =strlen( $in[$i]);
               $in[$i] = substr( $in[$i] , 0 , $w -1);
               $w =strlen( $in[$i +1]);
               $in[$i +1] = substr( $in[$i +1] , 0 , $w -1);
               $w =strlen( $in[$i +2]);
               $in[$i +2] = substr( $in[$i +2] , 0 , $w -1);
               echo 'От кого:
<a href="anketa.php?nickname='. $in[$i] .'&amp;'. SID .'">'. $in[$i] .'</a><br>
<u>'. $in[$i +1] .'</u><br>'. $in[$i +2] .'<br>
<a href="mail.php?param=otvet&amp;nickname='. $in[$i] .'&amp;'. SID .'">[ответить]</a>
<a href="mail.php?param=del&is=in&amp;nomer='. $i .'&amp;'. SID .'"> [удалить]</a><br>
<hr size="2">';
               $i = $i -4;
              }
       @unlink("forum/mail/$login.in");
       $fp =@fopen("forum/mail/$login.in","a+");
       $i =0;
       while ( isset( $in[$i]))
             { fputs( $fp , $in[$i] ."\n");
               fputs( $fp , $in[$i +1] ."\n");
               fputs( $fp , $in[$i +2] ."\n");
               fputs( $fp , "last\n");
               $i = $i +4;
              }
echo '<a href="mail.php?'. SID .'">Вернуться в личку</a><br>';
      }
}
//---------------------------------------------------------------
elseif ( $param =='del' && isset($is) && isset($nomer))
{
  if ( $is =='in' )
   { $in = file("forum/mail/$login.in");
     unlink("forum/mail/$login.in");
     $fp =@fopen("forum/mail/$login.in",'a+');
       $i =0;
       while ( isset($in[$i]))
             { if ( $i != $nomer )
               { $w =strlen( $in[$i]);
               $in[$i] = substr( $in[$i] , 0 , $w -1);
               $w =strlen( $in[$i +1]);
               $in[$i +1] = substr( $in[$i +1] , 0 , $w -1);
               $w =strlen( $in[$i +2]);
               $in[$i +2] = substr( $in[$i +2] , 0 , $w -1);
               $w =strlen( $in[$i +3]);
               $in[$i +3] = substr( $in[$i +3] , 0 , $w -1);
               fputs( $fp , $in[$i] ."\n");
               fputs( $fp , $in[$i +1] ."\n");
               fputs( $fp , $in[$i +2] ."\n");
               fputs( $fp , $in[$i +3] ."\n");
               }
               $i = $i +4;
              }
fclose($fp);
echo '<hr size="2">
<b>Запись  удалена!</b><br>
<a href="mail.php?'. SID .'">Вернуться в личку</a><br>
<meta http-equiv="refresh" content="5; url=mail.php?'. SID .'">';
    }

  elseif ( $is =='out' )
   { $out = file("forum/mail/$login.out");
     unlink("forum/mail/$login.out");
     $fp =@fopen("forum/mail/$login.out",'a+');
       $i =0;
       while ( isset($out[$i]))
             { if ( $i != $nomer )
               { $w =strlen( $out[$i]);
               $out[$i] = substr( $out[$i] , 0 , $w -1);
               $w =strlen( $out[$i +1]);
               $out[$i +1] = substr( $out[$i +1] , 0 , $w -1);
               $w =strlen( $out[$i +2]);
               $out[$i +2] = substr( $out[$i +2] , 0 , $w -1);
               fputs( $fp , $out[$i] ."\n");
               fputs( $fp , $out[$i +1] ."\n");
               fputs( $fp , $out[$i +2] ."\n");
               }
               $i = $i +3;
              }
fclose($fp);
echo '<hr size="2">
<b>Запись  удалена!</b><br>
<a href="mail.php?'. SID .'">Вернуться в личку</a><br>
<meta http-equiv="refresh" content="5; url=mail.php?'. SID .'">';
    }

  else { echo '<font color="#ff0000">Неверный параметр!!!<br>Доступ запрещен!!!</font><br>';exit;
      }
}
//---------------------------------------------------------------
elseif ($param =='out') //                              исходящие
{ $out = file("forum/mail/$login.out");
 $out_vsego =count($out) /3 ;
if ( $out_vsego ==0)
    {
echo '<hr size="2">
<b>Исходящих писем нет!</b><br>
<a href="mail.php?'. SID .'">Продолжить</a><br>
<meta http-equiv="refresh" content="5; url=mail.php?'. SID .'">';
     }
else { echo'<b><u>Исходящая почта:</u></b><hr size="2">';
       $y =count($out);
       $i = $y-3;
       while ( isset($out[$i]))
             { $w =strlen( $out[$i]);
               $name = substr( $out[$i] , 0 , $w -1);
               $w =strlen( $out[$i +1]);
               $time = substr( $out[$i +1] , 0 , $w -1);
               $w =strlen( $out[$i +2]);
               $text = substr( $out[$i +2] , 0 , $w -1);
               echo 'Кому:
<a href="anketa.php?nickname='. $name .'&amp;'. SID .'">'. $name .'</a><br>
<u>'. $time .'</u><br>'. $text .'<br>
<a href="mail.php?param=del&amp;is=out&amp;nomer='. $i .'&amp;'. SID .'">[удалить]</a><br>
<hr size="2">';
               $i = $i -3;
              }
echo '<a href="mail.php?'. SID .'">Вернуться в личку</a><br>';
      }
}
//---------------------------------------------------------------
elseif ($param =='clear') // очистка
{
unlink("forum/mail/$login.in");
unlink("forum/mail/$login.out");
@fopen("forum/mail/$login.in",'a+');
@fclose("forum/mail/$login.in");
@fopen("forum/mail/$login.out",'a+');
@fclose("forum/mail/$login.out");
echo '<hr size="2">
<b>Ваш ящик пуст! Все письма удалены!</b><br>
<a href="mail.php?'. SID .'">Вернуться в личку</a><br>
<meta http-equiv="refresh" content="5; url=mail.php?'. SID .'">';
}
//---------------------------------------------------------------
elseif ($param =='otvet' && isset($nickname)) // ответ
{ 
if ( !file_exists("forum/user/$nickname.log") || ereg('../', $nickname))
    {echo '<font color="#ff0000">Внимание !!!<br>Юзер, с таким логином не зарегистирован !</font><br>';exit;
	}
$nickname = ereg_replace("[^a-zA-Z0-9\-_]", '', $nickname);
if (isset($yes) && $yes =='yes')
     { $time= date('H:i').'/'. date('d').'.'. date('m').'.'. date('Y') ;
//------- проверяем текст на наличие спецсимволов
$novost = htmlspecialchars( $novost);
if (!ereg("[а-яА-Я]",$novost))
    {
$novost = translit($novost); }
$novost = str_replace("%", '', $novost);
$novost = str_replace("#", '', $novost);
$novost = str_replace("&", '', $novost);
$novost = str_replace("\n", '<br>', $novost);
$novost = str_replace("\r", '', $novost);

// ББ коды
$bbcode = array(
'/\[i\](.+)\[\/i\]/isU'=>'<em>$1</em>',
'/\[b\](.+)\[\/b\]/isU'=>'<strong>$1</strong>',
'/\[u\](.+)\[\/u\]/isU'=>'<span style="text-decoration:underline">$1</span>',
'/\[big\](.+)\[\/big\]/isU'=>'<big>$1</big>',
'/\[small\](.+)\[\/small\]/isU'=>'<small>$1</small>',
'/\[code\](.+)\[\/code\]/isU'=>'<code>$1</code>',
'/\[color=1\](.+)\[\/color\]/isU'=>'<font color="#ff0000">$1</font>',
'/\[color=2\](.+)\[\/color\]/isU'=>'<font color="#ffff22">$1</font>',
'/\[color=3\](.+)\[\/color\]/isU'=>'<font color="#00bb00">$1</font>',
'/\[color=4\](.+)\[\/color\]/isU'=>'<font color="#0000bb">$1</font>'
);
$novost = preg_replace(array_keys($bbcode),array_values($bbcode),$novost);

$novost=eregi_replace("((https?|ftp)://[[:alnum:]_=/-]+(\\.[[:alnum:]_=/-]+)*(/[[:alnum:]+&amp;._=/~%#]*(\\?[[:alnum:]?+&amp;_=/%#]*)?)?)",'<a href="$1">[.здесь.]</a>', $novost);


//---------------------------смайлы
$novost =str_replace(':)',"<img src='forum/smile/1.gif' alt=':)'>",$novost);
$novost =str_replace(':-)',"<img src='forum/smile/1.gif' alt=':-)'>",$novost);
$novost =str_replace(':(',"<img src='forum/smile/2.gif' alt=':('>",$novost);
$novost =str_replace(':-(',"<img src='forum/smile/2.gif' alt=':-('>",$novost);
$novost =str_replace(':|',"<img src='forum/smile/3.gif' alt=':|'>",$novost);
$novost =str_replace(':-|',"<img src='forum/smile/3.gif' alt=':-|'>",$novost);
$novost =str_replace(':O',"<img src='forum/smile/4.gif' alt=':O'>",$novost);
$novost =str_replace(':-O',"<img src='forum/smile/4.gif' alt=':-O'>",$novost);
$novost =str_replace('=O',"<img src='forum/smile/4.gif' alt='=O'>",$novost);
$novost =str_replace(":'(","<img src='forum/smile/5.gif'alt=':('>",$novost);
$novost =str_replace(":'-(","<img src='forum/smile/5.gif' alt=':-('>",$novost);
$novost =str_replace(';)',"<img src='forum/smile/6.gif' alt=';)'>",$novost);
$novost =str_replace(';-)',"<img src='forum/smile/6.gif' alt=';-)'>",$novost);
$novost =str_replace(':P',"<img src='forum/smile/7.gif' alt=':P'>",$novost);
$novost =str_replace(':-P',"<img src='forum/smile/7.gif' alt=':-P'>",$novost);
$novost =str_replace('8)',"<img src='forum/smile/8.gif' alt='8)'>",$novost);
$novost =str_replace('8-)',"<img src='forum/smile/8.gif' alt='8-)'>",$novost);
$novost =str_replace(':D',"<img src='forum/smile/9.gif' alt=':D'>",$novost);
$novost =str_replace(':-D',"<img src='forum/smile/9.gif' alt=':-D'>",$novost);
//----------------------------------
$fp =@fopen("forum/mail/$nickname.in",'a+');
fputs($fp , $login ."\n");
fputs($fp , $time ."\n");
fputs($fp , $novost ."\n");
fputs($fp , "new\n");
fclose($fp);
$fp =@fopen("forum/mail/$login.out",'a+');
fputs($fp , $nickname ."\n");
fputs($fp , $time ."\n");
fputs($fp , $novost ."\n");
fclose($fp);

echo '<br/>Письмо для '. $nickname .'`a успешно отправлено!<br>
<hr size="2">
<b>Текст письма:</b> <br>'. $novost .'<br>
<hr size="2">
<a href="mail.php?'. SID .'">Вернуться в личку</a><br>
<meta http-equiv="refresh" content="5; url=mail.php?'. SID .'">';
      }

elseif ( file_exists("forum/user/$nickname.log"))
      { echo '<hr size="2">';echo '
<form action="mail.php?param=otvet&amp;yes=yes&amp;'. SID .'" method="POST">
<input type="hidden" name="nickname" value="'. $nickname .'">
<b>Внесите в поле текст письма для '. $nickname .'`a:</b><br>
<textarea name="novost"  maxlength=500 cols=70 rows=5 wrap="soft"></textarea><br><br>
<input type="submit" value=" Отправить письмо "><br>
</form>';
       }

else { echo '<font color="#ff0000">Неверный параметр!!!<br>Доступ запрещен!!!</font><br>';
      }

}
//---------------------------------------------------------------
else  { echo '<font color="#ff0000">Неверный параметр!!!<br>Доступ запрещен!!!</font><br>';exit;}
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
} //=============================================================
else {echo '<font color="#ff0000">У вас недостаточно прав!!!<br>
Доступ запрещен!!!</font><br>';exit;}
?>