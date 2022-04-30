<?php
Error_Reporting(0);
session_name('SID');
session_start();
include"../configs.php";
include"../style/verh.php";
include('global.php');
if ( $id =='avtorized' &&
     $login !='' &&
     $pass !='')
     { session_register('login');
       session_register('pass');
     }
$direct ='forum/user';
include('avt.php');
if ( isset($top)) $top = intval($top);
elseif (isset($tema)) $tema = intval($tema);
elseif (isset($post)) $post = intval($post);
elseif (isset($nickname))
       {$nickname = ereg_replace("[^a-zA-Z0-9\-_]", '', $nickname);}
include('translit.php');
include('online_doc.php');

echo '<div class="menu">';

if ( !isset($login) ||
     !isset( $pass ) ||
     $login =='' ||
     $pass =='' ||
     $status =='gost')
     {}
else {include('ban.php');}
if ( !isset($top) && !isset($param))
    { echo '<a href="forum.php?param=new&amp;'. SID .'">ТОП тем форума</a>';}

if ( !isset($top) && $status =='admin' && !isset($param))
{ echo '<br><a href="forum.php?add=razdel&amp;'. SID .'">Создать новый раздел</a>';}
if ( !file_exists('forum/data/top.dat'))
    {fclose(@fopen('forum/data/top.dat','a+'));}
//===============================================================


if (isset($param) && $param =='new')//последние сообщения форума
	{ $unt = file_get_contents('forum/data/top.dat');
	  $t = explode("\n",$unt);
	  $y = (sizeof($t)-1)/2;
	  if($y ==0)
		{ echo '<a href="forum.php?'. SID .'">К разделам форума</a>
		<hr size="2">
		  <strong><font color="#ff0000">Разделы ещё не созданы !!!</font></strong><br>
		  <hr size="2">';
		  }

		else { //вывод тем
		 echo '<a href="forum.php?'. SID .'">К разделам форума</a>';
		 $top = 1;
	     $tema = $nomer = 0;
	     
	     while(file_exists("forum/data/$top.dat"))
	  	   { $tema = 0;
	  	     $file = 'forum/data/'.$top.'_'.$tema.'.dat';
	  	      while (file_exists($file))
      			  { $vremya = filectime($file);
      			    $test[$vremya] = $file;
                    $vremya2[$nomer] = $vremya;
                    $nomer++;
      			    $tema++;
      			    $file ='forum/data/'.$top.'_'.$tema.'.dat';
       			   }
	  	     $top++ ;
	  	   }// конец проверки на существование всех тем и разделов

	  	   if ( count($test) ==0 || count($vremya2) ==0 )
	  	      { echo '<hr size="2">
			  <strong><font color="#ff0000">Темы ещё не созданы !!!</font></strong><br>
				<hr size="2">';
		       }
		 else {
          krsort($test);          
          rsort($vremya2);
          echo '<hr size="2">';
          $y = count($vremya2);
          $all_str=ceil($y/10);// ------------------------  всего страниц
          if ( !isset($str))
                {$str= 1;}
          $str = intval($str);
          if ($str <1 || $str > $all_str || $str =='')
               {$str =1;}
          $er = $str*10-10;

          for ($er;$er!=$str*10;$er++)
             { //--------------------------------


             if ( isset($vremya2[$er]))
                  {$art =file('forum/data/top.dat');
                  $yy = $vremya2[$er];
                  $i2 = $test[$yy];
                  $w =strpos($i2,'_');
                  $top =substr($i2,0,$w);
				  $top=ereg_replace("[^0-9]",'',$top);
                  $topic =$art[$top *2];
                  $w5 =strlen($topic);
                  $topic =substr($topic,0,$w5 -1);
                  $untema =file_get_contents("forum/data/$top.dat");
				  $tema = explode("\n",$untema);
                  $w2 =strpos($i2,'.');
                  $i =substr($i2,$w +1,$w2 -($w +1));
                  $i = $i *6 ;

     			// -------------  ВЫВОД ТЕМ
				$read =  $i2 ;
				$mmm = file($read);
				$xx = count($mmm);
				$poz = $xx -4;
				$w =strlen($mmm[$poz]);
				$mmm[$poz] =substr($mmm[$poz],0,$w -1);
				$w =strlen($mmm[$poz +2]);
				$mmm[$poz +2] =substr($mmm[$poz +2],0,$w -1);
                echo 'Раздел: <strong>'.$topic.'</strong><br>Тема: ';
				if ($tema[$i +2] =='on')
					{echo '<strong>[!]</strong>';}
				if ($tema[$i +3] =='off')
					{echo '<strong><font color="#ff0000">[X]</font></strong>';}
				echo '
<strong><a href="forum.php?top='.$top.'&amp;tema='.( $i/6 ).'&amp;str=1&amp;'. SID .'"> '.$tema[$i].'</a></strong>
 <a href="forum.php?top='.$top.'&amp;tema='.( $i/6 ).'&amp;'. SID .'">['.($tema[$i+1]+1).']</a>
<br>
Автор: <a href="users.php?param=poisk&amp;nickname='.$tema[$i+4].'&amp;'. SID .'">'.$tema[$i+4].'</a> / '.$tema[$i+5].'<br>
(посл. '.$mmm[$poz].'-'.$mmm[$poz+2].')';

if ($status =='admin' || $status =='moder')
{ echo '<br><a href="forum.php?param=red&amp;top='.$top.'&amp;tema='.($i/6).'&amp;'. SID .'">[ред]</a>
<a href="forum.php?param=del&amp;top='.$top.'&amp;tema='.($i/6).'&amp;'. SID .'">[удал]</a>';}
if ($status =="rezv1" && $tema[$i+3] =="on")
{ echo '<br><a href="forum.php?param=red&amp;top='.$top.'&amp;tema='.($i/6).'&amp;'. SID .'">[закр]</a> ';}

echo '<hr>';//---------------------       КОНЕЦ ВЫВОДА ТЕМ
      }
else { break;}
}

if ($all_str >1)
{
if ($str != 1 && $str >1)
    { echo '<a href="forum.php?param=new&amp;str=1&amp;'. SID .'">1</a>';}
if ($str != 2 && $str >2)
    { echo ' <a href="forum.php?param=new&amp;str=2&amp;'. SID .'">2</a>';}
if ($str -2 > 2) echo ' ...';
if ($str > 3)
     { echo ' <a href="forum.php?param=new&amp;str='.($str -1).'&amp;'. SID .'">'.($str -1).'</a>';}
echo ' <strong>['. $str .']</strong>' ;
if ($str <= $all_str -1)
    {echo ' <a href="forum.php?param=new&amp;str='.($str +1).'&amp;'. SID .'">'.($str +1).'</a>';}
if ($str < $all_str -3) echo' ...';
if ($str < $all_str -2)
    { echo ' <a href="forum.php?param=new&amp;str='.($all_str -1).'&amp;'. SID .'">'.($all_str -1).'</a>';}
if ($str < $all_str -1)
    { echo ' <a href="forum.php?param=new&amp;str='.$all_str.'&amp;'. SID .'">'.$all_str.'</a>';}
echo '<br>';
}
echo '<strong>Всего тем: '. $y  .'<br></strong>';
			}
	     }
	  } //конец вывода последних сообщений форума
//===============================================================
elseif ( !isset($top))//                               начало форума
{ if ( !isset($add))
{ $untop = file_get_contents('forum/data/top.dat');
$top = explode("\n",$untop);
$y = (sizeof($top)-1)/2;
if ($y ==0)
   { echo '<hr size="2">
   <font color="#ff0000">Разделы ещё не созданы !!!</font><br>
	 <hr size="2">';
	 }
else {
$i =0; echo '<hr size="2">';
while ( isset($top[$i]) && file_exists('forum/data/'.$i /2 .'.dat'))
      {$tek = 'forum/data/'.$i /2 .'.dat';
        $untop1 =file_get_contents($tek);
		$top1 = explode("\n",$untop1);
        $y = count($top1)-1;
        $r = $posty = 0 ;
        while ( isset( $top1[$r]) && $r != $y)
              { $posty = $posty + $top1[$r +1] +1 ;
                $r =$r +6;
               }
        if ( $i/2 ==0 && $status =='users' ||
             $i/2 ==0 && $status =='rezv2' ||
             $i/2 ==0 && $status =='ban' ||
             $i/2 ==0 && $status =='gost' ||
             $i/2 ==0 && $login =='' ||
             $i/2 ==0 && $login ==' ' ||
             $i/2 ==0 && $pass =='' )
             {
             	}
        else {
           echo  ' <strong><a href="forum.php?top='.( $i /2 ).'&amp;'. SID .'">'.$top[$i].'</a></strong> ['.$top[$i +1].'/'.$posty.'] ';
          if ( $status =="admin" )
             { echo '<br><a href="forum.php?param=red&amp;top='.( $i /2).'&amp;'. SID .'">[ред]</a>
			 <a href="forum.php?param=del&amp;top='.($i /2).'&amp;'. SID .'">[удал]</a>';
               }
             }
        if ( $i/2 ==0 && $status=='admin' ||
             $i/2 ==0 && $status=='moder' ||
             $i/2 ==0 && $status=='rezv1' )
            {echo '<hr size="2">';}
        elseif ( $i/2 !=0 )
            { echo '<br>';}
       $i =$i +2 ;
       }
echo '<hr size="2">';
      }
}
//-------------------------
elseif ( $add='razdel')//   создание раздела
{ if ($status != 'admin')
     {echo '<font color="#ff0000">Вы не админ !!!<br>Доступ запрещен !!!</font><br>';
	   exit;}

if (!isset($yes))
    { echo '<hr size="2">
	<form action="forum.php?add=razdel&amp;yes=yes&amp;'. SID .'" method="post">
<strong>Введите название нового раздела:</strong><br>
<input type="text" name="razdel" cols=50 maxlength=50><br><br>
<input type="submit" value=" Создать раздел "><br>
</form><hr size="2">';
     }
elseif ($yes =='yes')
     {
$razdel =htmlspecialchars($razdel);
$razdel =str_replace('%','',$razdel);
$razdel =str_replace('/','',$razdel);
$razdel =str_replace('#','',$razdel);
$razdel =str_replace("\n",'',$razdel);
$razdel =str_replace("\r",'',$razdel);

if ( $razdel =='' || $razdel ==' ' )
    { echo '<hr size="2">
	<font color="#ff0000">
Внимание!!!<br>
Незаполнены необходимые поля!<br></font>
<a href="forum.php?'. SID .'">[назад к форумам]</a><br>
<hr size="2">
<meta http-equiv="refresh" content="2.0; url=forum.php">';
}
else {
$i =file('forum/data/top.dat');
$y =count($i);
$y = $y /2 ;
fclose(@fopen("forum/data/$y.dat",'a+'));
$fp =fopen('forum/data/top.dat','a+');
fputs($fp , $razdel ."\n");
fputs($fp , "0\n");
fclose($fp);
echo '<hr size="2">
Раздел успешно создан!<br><a href="forum.php?top='.$y.'&amp;'. SID .'">[вход в раздел]</a><br>
<a href="forum.php?'. SID .'">[назад к форумам]</a><br>
<hr size="2">
<meta http-equiv="refresh" content="2.0; url=forum.php?top='.$y.'&amp;'. SID .'">';
      }
}
else {echo '<font color="#ff0000">Неверный параметр !!!<br>Доступ запрещен !!!</font><br>';exit;}
}
//                                         конец создания раздела
else {echo '<font color="#ff0000">Неверный параметр!!!<br>Доступ запрещен !!!</font><br>';exit;}
}//                                                 конец форума
//===============================================================
elseif ( isset($top) && file_exists("forum/data/$top.dat") &&
       !isset($tema) && !isset($param))//                 раздел
{ if ( !isset($add))
{ if ( $top ==0 &&
       $status !='admin' &&
	   $status !='moder' &&
	   $status !='rezv1')
     { echo '<center><strong>
	 <font color="#ff0000">Внимание !!!<br>
	 Доступ в этот раздел Вам запрещён !!!<br>
	 У вас не достаточно прав !!!</font></strong></center><br>
	 <meta http-equiv="refresh" content="3.0; url=forum.php?'. SID .'">';
	   exit;
	   }
$topic = file('forum/data/top.dat');
echo '<a href="forum.php?'. SID .'">Форум</a> / ';
$w = strlen($topic[$top*2]);
$topic[$top*2] = substr($topic[$top*2],0,$w -1);
echo '<strong>'.$topic[$top*2].'</strong><br>';
if ( $status =='admin' ||
	 $status =='moder' ||
	 $status =='users' ||
	 $status =='rezv1' ||
	 $status =='rezv2' )
 {echo '<a href="forum.php?add=tema&amp;top='. $top .'&amp;'. SID .'">Создать новую тему</a>';}
$untema = file_get_contents("forum/data/$top.dat");
$tema = explode("\n",$untema);
$y = sizeof($tema)-1;
if($y ==0)
{ echo '<hr size="2">
<font color="#ff0000">Темы ещё не созданы !!!</font><br>
<hr size="2">';}
else {
$i = 0;
$sort = 'forum/data/'.$top.'_0.dat';


while(file_exists($sort))
      { $vremya = filectime($sort);
        if ( $tema[$i+2] =='on')
            { $vremya = '1'.$vremya ;}
        $test[$vremya] = $i/6;
        $vremya2[] = $vremya;
        $i = $i+6;
        $sort ='forum/data/'.$top.'_'.($i/6).'.dat';
       }
krsort($test);
rsort($vremya2);

echo '<hr size="2">';
$y =count($vremya2);
$all_str=ceil($y/10);// ------------------------  всего страниц
$str=intval($str);
if (  !isset($str) ||  $str <1
     || $str >$all_str || $str =='')
      {$str =1;}
$er =$str*10-10;
for ($er;$er !=$str*10;$er++)
{ if (isset($vremya2[$er]))
{
$yy = $vremya2[$er];
$i = $test[$yy]*6;

 // --------------------------------------------------  ВЫВОД ТЕМ
$read ='forum/data/'.$top.'_'.( $i /6).'.dat';
$mmm =file($read);
$xx = count($mmm);
$poz = $xx -4;
$w =strlen($mmm[$poz]);
$mmm[$poz] =substr($mmm[$poz],0,$w -1);
$w =strlen($mmm[$poz +2]);
$mmm[$poz +2] =substr($mmm[$poz +2],0,$w -1);

if ($tema[$i +2] =='on')
{echo '[!]';}
if ($tema[$i +3] =='off')
{echo '<font color="#ff0000">[X]</font>';}
echo '
<strong>
<a href="forum.php?top='.$top.'&amp;tema='.( $i /6 ).'&amp;str=1&amp;'. SID .'"> '.$tema[$i].'</a>
</strong>
<a href="forum.php?top='.$top.'&amp;tema='.( $i /6 ).'&amp;'. SID .'">['.($tema[$i +1] +1).']</a>
<br>
<a href="users.php?param=poisk&amp;nickname='.$tema[$i +4].'&amp;'. SID .'">'.$tema[$i +4].'</a> / '.$tema[$i +5].'
<br>
<small>(посл. '.$mmm[$poz].'-'.$mmm[$poz +2].')</small>';
if ( $status =="admin" || $status =="moder")
{ echo '
<br>
<a href="forum.php?param=red&amp;top='. $top .'&amp;tema='.($i /6).'&amp;'. SID .'">[ред]</a>
<a href="forum.php?param=del&amp;top='. $top .'&amp;tema='.($i /6).'&amp;'. SID .'">[удал]</a>';}
if ( $status =="rezv1" && $tema[$i +3] =="on" && $top !=0)
{ echo '<br><a href="forum.php?param=red&amp;top='.$top.'&amp;tema='.($i /6).'&amp;'. SID .'">[ред]</a> ';}
echo '<hr size="1">';//---------------------       КОНЕЦ ВЫВОДА ТЕМ
      }
else { break;}
}

if ($all_str >1)
 {if ($str != 1 && $str>1)
    { echo '<a href="forum.php?top='.$top.'&amp;str=1&amp;'. SID .'">1</a>';}
  if ($str != 2 && $str>2)
    { echo ' <a href="forum.php?top='.$top.'&amp;str=2&amp;'. SID .'">2</a>';}
  if ($str -2 > 2)  echo ' ...';
  if ($str > 3)
     { echo ' <a href="forum.php?top='.$top.'&amp;str='.($str -1).'&amp;'. SID .'">'.($str -1).'</a>';}
  echo ' <strong>['. $str .']</strong>' ;
  if ($str <= $all_str -1)
    {echo ' <a href="forum.php?top='.$top.'&amp;str='.($str +1).'&amp;'. SID .'">'.($str +1).'</a>';}
  if ($str < $all_str -3) echo' ...';
  if ($str < $all_str -2)
    {echo ' <a href="forum.php?top='.$top.'&amp;str='.($all_str -1).'&amp;'. SID .'">'.($all_str -1).'</a>';}
  if ($str < $all_str -1)
    {echo ' <a href="forum.php?top='.$top.'&amp;str='.$all_str.'&amp;'. SID .'">'.$all_str.'</a>';}
  echo '<br>';
  }
echo '<strong>Всего тем: '.$y.'<br></strong>';
}
}
//------------------------- начало создания темы
elseif ( $add == 'tema' && $status != 'ban' )
{ if ( $top == 0 && $status != 'admin' && $status != 'moder' && $status != 'rezv1')
     { echo '<center>
	 <strong><font color="#ff0000">Внимание !!!
	 <br>Доступ в этот раздел Вам запрещён !!!<br>
	 У вас не достаточно прав !!!</font></strong></center><br>
	 <meta http-equiv="refresh" content="5.0; url=forum.php?'. SID .'">';
	   exit;
	  }

if (!isset($yes) && $yes !='yes')
    { echo '<hr size="2">
<strong><font color="#ff0000">
В названии темы не допустимы ссылки на какой-либо ресурс инета !!!
</font></strong>
<br>
<form action="forum.php?add=tema&amp;top='. $top .'&amp;yes=yes&amp;'. SID .'" method="post">
<strong>Введите название новой темы:</strong><br>
<input type="text" name="tema1" cols="50" maxlength="100">
<br>
<br>
<strong>Введите текст первого поста в тему:</strong>
<br>
<textarea name="novost"  maxlength="1000" cols="70" rows="5" wrap="soft"></textarea>
<br>
Правила транслита:
<select name="tr" size="1">
<option value="1">а = a
<option value="1">б = b
<option value="1">в = v
<option value="1">г = g
<option value="1">д = d
<option value="1">е = е
<option value="1">ё = jo
<option value="1">ж = zh
<option value="1">з = z
<option value="1">и = i
<option value="1">й = j
<option value="1">к = k
<option value="1">л = l
<option value="1">м = m
<option value="1">н = n
<option value="1">о = о
<option value="1">п = p
<option value="1">р = r
<option value="1">с = s
<option value="1">т = t
<option value="1">у = u
<option value="1">ф = f
<option value="1">х = h
<option value="1">ц = c
<option value="1">ч = ch
<option value="1">ш = sh
<option value="1">щ = csh
<option value="1">ы = y
<option value="1">ъ = \'
<option value="1">э = je
<option value="1">ю = ju
<option value="1">я = ja
</select><br><br>';
if ( $status =='admin' || $status =='moder' )
{ echo '<strong>Доступ к теме: </strong>
<select name="dos" size="1">
<option value="on">открыта
<option value="off">закрыта
</select>
<br>
<strong>Статус темы: </strong>
<select name="stt" size="1">
<option value="off">откреплена
<option value="on">закреплена
</select>
<br><br>'; }
else { echo '
<input type="hidden" name="dos" value="+">
<input type="hidden" name="stt" value="+">';}
echo '
<input type="submit" value=" Создать тему ">
<br>
</form><hr size="2">';
     }

elseif ($yes =='yes' )
     {
//                    проверка текста
$novost = substr( $novost , 0 , 2000);
$novost = htmlspecialchars( $novost);
$novost = str_replace("%", '', $novost);
$novost = str_replace("#", '', $novost);
$novost = str_replace("\n", '<br>', $novost);
$novost = str_replace("\r", '', $novost);

if(!ereg('[а-яА-Я]',$novost)){
$novost = translit($novost);
}

// проверка названия темы

$tema1 = substr($tema1, 0 , 200);

$tema1 = htmlspecialchars($tema1);
$tema1 = str_replace('#', '', $tema1);
$tema1 = str_replace('%', '', $tema1);
$tema1 = str_replace('$', '', $tema1);
$tema1 = str_replace('=', '', $tema1);
$tema1 = str_replace('+', '', $tema1);
$tema1 = str_replace('@', '', $tema1);
$tema1 = str_replace('{', '', $tema1);
$tema1 = str_replace('}', '', $tema1);
$tema1 = str_replace("\n", '', $tema1);
$tema1 = str_replace("\r", '', $tema1);

$tema1=eregi_replace("((https?|ftp)://[[:alnum:]_=/-]+(\\.[[:alnum:]_=/-]+)*(/[[:alnum:]+&amp;._=/~%#]*(\\?[[:alnum:]?+&amp;_=/%#]*)?)?)",'', $tema1);

$tema1 = antimat($tema1);
//-------------------
if(!trim($tema1) || !trim($novost) || !trim($login) || !trim($pass) || !trim($status)){
echo '<hr size="2">
<font color="#ff0000">
Внимание!!!<br>
Незаполнены необходимые поля!<br></font>
<a href="forum.php?top='.$top.'&amp;'. SID .'">[назад в раздел]</a><br>
<a href="forum.php?'. SID .'">[назад к форумам]</a><br>
<hr size="2">
<meta http-equiv="refresh" content="2.0; url=forum.php?top='.$top.'&amp;'. SID .'">';
exit;
}
else{

$q = file("forum/data/$top.dat");
$y = sizeof($q)/6;
$f ='forum/data/'.$top.'_'.$y.'.dat';
$time = date('H:i').'/'.date('d').'.'.date('m').'.'.date('Y');
$fp = @fopen($f,'a+');
flock($fp,LOCK_EX);
fputs($fp,$login."\n");
fputs($fp,$status."\n");
fputs($fp,$time."\n");
fputs($fp,$novost."\n");
flock($fp,LOCK_UN);
fclose($fp);
chmod($f, 0666);
//--------------
$unvse = file_get_contents("forum/data/$top.dat");
$vse = explode("\n",$unvse);
$i = sizeof($vse)-1;
$vse[$i] = $tema1;
$vse[$i+1] = 0;
if ($stt =='+')  $vse[$i+2] ='off';
else {$vse[$i+2] = $stt;}
if ($dos =='+')  $vse[$i+3] ='on';
else {$vse[$i+3] = $dos;}
$vse[$i+4] = $login;
$vse[$i+5] = date('d').'.'.date('m').'.'.date('Y');
$i = 0;
$fp = @fopen("forum/data/$top.dat",'w');
flock($fp,LOCK_EX);
while ( isset($vse[$i]))
      { fputs($fp,$vse[$i]."\n");
        $i++;
       }
flock($fp,LOCK_UN);
fclose($fp);
chmod("forum/data/$top.dat", 0666);

$unkkk = file_get_contents('forum/data/top.dat');
$kkk = explode("\n",$unkkk);
$kkk[$top*2+1]++;
$i = 0;
$fp = @fopen('forum/data/top.dat','w');
flock($fp,LOCK_EX);
while ( isset($kkk[$i]) && $i<count($kkk)-1)
       { fputs($fp,$kkk[$i]."\n");
         $i++;
        }
flock ($fp,LOCK_UN);
fclose($fp);
chmod('forum/data/top.dat', 0666);
//---------------
$undata = file_get_contents("forum/user/$login.log");
$data = explode("\n",$undata);
if ( !isset($data[11]))
    { $data[11]=1; }
else { $data[11]++; }
$fp = @fopen("forum/user/$login.log",'w');
flock($fp,LOCK_EX);
$i=0;
while (isset($data[$i]) && $i<count($data)-1)
      { fputs($fp,$data[$i]."\n");
        $i++;
       }
flock ($fp,LOCK_UN);
fclose($fp);
@chmod("forum/user/$login.log", 0666);
//----------------

echo '<hr size="2">
Тема успешно создана!<br>
<a href="forum.php?top='.$top.'&amp;tema='.$y.'&amp;'. SID .'">[вход в тему]</a><br>
<a href="forum.php?top='.$top.'&amp;'. SID .'">[назад в раздел]</a><br>
<hr size="1">
<meta http-equiv="refresh" content="2.0; url=forum.php?top='.$top.'&amp;tema='.$y.'&amp;'. SID .'">';
      }
}
else {echo '<font color="#ff0000">Неверный параметр !!!<br>Доступ запрещен !!!</font><br>';exit;}

}
//                                          конец создания темы
//-------------------------
else {echo '<font color="#ff0000">Неверный параметр !!!<br>Доступ запрещен !!!</font><br>';exit;}
}//                                                конец раздела

//===========================================================        тема
elseif ( isset($top) && file_exists("forum/data/$top.dat") &&
       isset($tema) && !isset($param) )
{ if ( $top ==0 &&
       $status !='admin' &&
	   $status !='moder' &&
	   $status !='rezv1')
     { echo '<center><strong>
	 <font color="#ff0000">Внимание !!!<br>
	 Доступ в этот раздел Вам запрещён !!!<br>
	 У вас не достаточно прав !!!</font></strong></center><br>
	 <meta http-equiv="refresh" content="5.0; url=forum.php?'. SID .'">';
	   exit;
	   }

$id = 'forum/data/'.$top.'_'.$tema.'.dat';
if ( file_exists($id))
{
if ( !isset($add))
{ $topic =file('forum/data/top.dat');
echo '<strong><a href="forum.php?'. SID .'">Форум</a> / ';
$w =strlen( $topic[$top *2]);
$topic[$top *2] =substr( $topic[$top *2],0,$w -1);
echo '<a href="forum.php?top='.$top.'&amp;'. SID .'">'.$topic[$top *2].'</a> / ';

$st =file("forum/data/$top.dat");
$poz = $tema *6+3 ;
$w =strlen($st[$poz]);
$st[$poz] =substr($st[$poz],0,$w -1);
$w =strlen($st[$poz -3]);
$st[$poz -3] =substr($st[$poz -3],0,$w -1);
echo $st[$poz -3].'</strong><br>';
if ( $st[$poz] !='on')
    {echo '<strong><font color="#ff0000"><u>Тема закрыта !!!</u></font></strong>'; }
echo '<hr size="2">';
$undata =file_get_contents($id);
$data =explode("\n",$undata);
$y =count($data)-1;
$y = $y /4;
$all_str=ceil($y /10);// ------------------------  всего страниц
if ( !isset($str))
    {$str = $all_str ;}
$str = ereg_replace("[^0-9]",'',$str);
if (    $str <1
     || $str > $all_str
	 || $str =='')
      { $str=1 ; }
$i = ($str *10-10)*4;

for ($i;$i !=$str*40;$i++)
{ //--------------------------------
if ( isset($data[$i]) && $i <count($data)-1)
      { echo '<strong><a href="users.php?param=poisk&amp;nickname='.$data[$i].'&amp;'. SID .'">'.$data[$i].'</a></strong> ';
//-----------> !!!!!!!!!!!!!!!! СТАТУС ОНЛАЙН
$unvsego = file_get_contents('forum/data/online.dat');
$vsego = explode("\n",$unvsego);
$i2 = 0;
$onl = 0;
while ( isset( $vsego[$i2]) && $i2 != count($vsego))
       { if ( $vsego[$i2] == $data[$i] )
             { $onl++; }
          $i2 = $i2 +4; }
if ( $onl !=0 )
    { echo '<strong><font color="#008800">[on] </font></strong>'; }
else { echo '<font color="#ff0000">[off] </font>'; }
//-----------
$novost =$data[$i +3];
if (!ereg('[а-яА-Я]',$novost))
    { $novost = translit($novost); }

$novost = antimat($novost);

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
$novost =str_replace(':P',"<img src=forum/'smile/7.gif' alt=':P'>",$novost);
$novost =str_replace(':-P',"<img src='forum/smile/7.gif' alt=':-P'>",$novost);
$novost =str_replace('8)',"<img src='forum/smile/8.gif' alt='8)'>",$novost);
$novost =str_replace('8-)',"<img src='forum/smile/8.gif' alt='8-)'>",$novost);
$novost =str_replace(':D',"<img src='forum/smile/9.gif' alt=':D'>",$novost);
$novost =str_replace(':-D',"<img src='forum/smile/9.gif' alt=':-D'>",$novost);
//----------------------------------

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


$novost=eregi_replace("((https?|ftp)://[[:alnum:]_=/-]+(\\.[[:alnum:]_=/-]+)*(/[[:alnum:]+&amp;._=/~%#]*(\\?[[:alnum:]?+&amp;_=/%#]*)?)?)",'<a href="$1">$1</a>', $novost);
$data[$i +3] = $novost;
//-----------
echo '<br>'.$data[$i +2].'<br>'.$data[$i +3].'<br>';
if ($data[$i] == $login  && $st[$poz] =='on'
    && $status !='admin' && $status !='moder'
     && $status !='rezv1' )
   { if ( $status !='ban')
        {echo '<a href="forum.php?param=red&amp;top='.$top.'&amp;tema='.$tema.'&amp;post='.($i /4).'&amp;'. SID .'">[ред]</a> ';}
     }

if ( $status =='admin' ||
     $status =='moder'  )
{ echo '<a href="forum.php?param=red&amp;top='.$top.'&amp;tema='.$tema.'&amp;post='.($i /4).'&amp;'. SID .'">[ред]</a>
<a href="forum.php?param=del&amp;top='.$top.'&amp;tema='.$tema.'&amp;post='.($i /4).'&amp;'. SID .'">[удал]</a> ';}

if ( $status =='rezv1' && $st[$poz] =='on')
   {echo '<a href="forum.php?param=red&amp;top='.$top.'&amp;tema='.$tema.'&amp;post='.($i /4).'&amp;'. SID .'">[ред]</a> ';}

if ( $status =='rezv1' && $st[$poz] =='on' && $top !=0 )
  { echo '<a href="forum.php?param=del&amp;top='.$top.'&amp;tema='.$tema.'&amp;post='.($i /4).'&amp;'. SID .'">[удал]</a> ';}

if ( $st[$poz] =='on' && $data[$i] != $login  && $status !='ban')
   { if ( $status =='admin' ||
       $status =='moder' ||
       $status =='users' ||
       $status =='rezv1' ||
       $status =='rezv2' )
	{echo '<a href="forum.php?add=post&amp;top='.$top.'&amp;tema='.$tema.'&amp;nickname='.$data[$i].'&amp;'. SID .'">[ответ]</a>'; }
   }

echo '<hr size="1">';
$i = $i +3;
       }
else { break ;}
} //-------------------------
if ($y >10)
{ if ($str != 1 && $str>1 )
    { echo '<a href="forum.php?top='.$top.'&amp;tema='.$tema.'&amp;str=1&amp;'. SID .'">1</a>';}
  if ( $str != 2 && $str>2 )
    { echo ' <a href="forum.php?top='.$top.'&amp;tema='.$tema.'&amp;str=2&amp;'. SID .'">2</a>';}
  if ( $str -2 > 2 ) echo ' ...';
  if ( $str > 3 )
     { echo ' <a href="forum.php?top='.$top.'&amp;tema='.$tema.'&amp;str='.($str -1).'&amp;'. SID .'">'.($str -1).'</a>';}
  echo ' <strong>['.$str.']</strong>' ;
  if ( $str <= $all_str -1 )
    {echo ' <a href="forum.php?top='.$top.'&amp;tema='.$tema.'&amp;str='.($str +1).'&amp;'. SID .'">'.($str +1).'</a>';}
  if ( $str < $all_str -3 ) echo' ...';
  if ( $str < $all_str -2 )
    { echo ' <a href="forum.php?top='.$top.'&amp;tema='.$tema.'&amp;str='.($all_str -1).'&amp;'. SID .'">'.($all_str -1).'</a>';}
  if ( $str < $all_str -1 )
    { echo ' <a href="forum.php?top='.$top.'&amp;tema='.$tema.'&amp;str='.$all_str.'&amp;'. SID .'">'.$all_str.'</a>';}
  echo '<br>';
}
echo '<strong>Постов в теме: '. $y  .'<br></strong>';
if ( $st[$poz] =="on" )
   {if ( $status !="ban" && $status !="" && $status !="gost")
	   {echo '<a href="forum.php?add=post&amp;top='.$top.'&amp;tema='.$tema.'&amp;'. SID .'">[добавить ответ]</a><br>';}
	}
else {echo '<font color="#ff0000"><u>Тема закрыта !!!</u></font><br>';
}
}
//------------------------
elseif ( $add =='post' &&
         isset($top)  &&
         file_exists("forum/data/$top.dat") &&
         isset($tema) &&
         $status !='ban')//                  начало создания поста
{  if ( $top ==0 && $status !='admin' && $status !='moder' && $status !='rezv1')
     { echo '<center>
	 <strong><font color="#ff0000">Внимание !!!<br>
	 Доступ в этот раздел Вам запрещён !!!<br>
	 У вас не достаточно прав !!!</font></strong></center><br>
	 <meta http-equiv="refresh" content="5.0; url=forum.php?'. SID .'">';
	   exit;
	   }
if ( !isset($yes) && $yes !='yes')
    {
echo '<hr size="2">';
$mmm =file("forum/data/$top.dat");
$poz = $tema *6;
$w =strlen($mmm[$poz +2]);
$mmm[$poz +2] =substr($mmm[$poz +2],0,$w -1);//   закреплён  on
$w =strlen($mmm[$poz +3]);
$mmm[$poz +3] =substr($mmm[$poz +3],0,$w -1);//   закрыт  off
if ( $status =='users' && $mmm[$poz +3] =='off' ||
     $status =='rezv1' && $mmm[$poz +3] =='off' ||
	 $status =='ban' && $mmm[$poz +3] =='off' ||
	 $status =='gost' && $mmm[$poz +3] =='off' ||
     $status =='rezv2' && $mmm[$poz +3] =='off')
    { echo '<font color="#ff0000">
У вас недостаточно прав!!!<br>
Доступ запрещен!!!</font><br>'; exit; }

echo '<form action="forum.php?add=post&amp;top='. $top .'&amp;tema='. $tema .'&amp;yes=yes&amp;'. SID .'" method="post">
<strong>Введите текст ответа в тему:</strong><br>
Правила транслита:
<select name="tr" size="1">
<option value="1">а = a
<option value="1">б = b
<option value="1">в = v
<option value="1">г = g
<option value="1">д = d
<option value="1">е = е
<option value="1">ё = jo
<option value="1">ж = zh
<option value="1">з = z
<option value="1">и = i
<option value="1">й = j
<option value="1">к = k
<option value="1">л = l
<option value="1">м = m
<option value="1">н = n
<option value="1">о = о
<option value="1">п = p
<option value="1">р = r
<option value="1">с = s
<option value="1">т = t
<option value="1">у = u
<option value="1">ф = f
<option value="1">х = h
<option value="1">ц = c
<option value="1">ч = ch
<option value="1">ш = sh
<option value="1">щ = csh
<option value="1">ы = y
<option value="1">ъ = \'
<option value="1">э = je
<option value="1">ю = ju
<option value="1">я = ja
</select><br>
<textarea name="novost"  maxlength=1000 cols=70 rows=5 wrap="soft">';
if (isset($nickname))  echo $nickname .', ';
echo '</textarea><br><br>';
if ( $status =='admin' || $status =='moder' || $status =='rezv1')
{ echo '<strong>Доступ к теме: </strong>
<select name="dos" size="1">';
if ( $mmm[$poz +3] =='on' )
{ echo '
<option value="on">открыта
<option value="off">закрыта';}
else { echo '
<option value="off">закрыта
<option value="on">открыта';}
echo '</select>';
if ( $status =='admin' || $status =='moder')
{ echo '<br>
<strong>Статус темы: </strong>
<select name="stt" size="1">';
if ( $mmm[$poz +2] =='off' )
{ echo '
<option value="off">откреплена
<option value="on">закреплена';}
else { echo '
<option value="on">закреплена
<option value="off">откреплена';}
echo '</select>';
echo '<br><br>';}
else { echo '<input type="hidden" name="stt" value="'.$mmm[$poz +2].'">';}
}
else { echo '
<input type="hidden" name="dos" value="'.$mmm[$poz +3].'">
<input type="hidden" name="stt" value="'.$mmm[$poz +2].'">';}

echo '
<input type="submit" value=" Добавить ответ "><br>
</form>
<hr size="2">
<a href="bbcode.php?'. SID .'">ВВ-коды и смайлы</a><br>';
     }

elseif ( $yes =='yes')
     {
$mmm =file("forum/data/$top.dat");
$poz = $tema *6;
$w =strlen($mmm[$poz +2]);
$mmm[$poz +2] =substr( $mmm[$poz +2],0,$w -1);//   закреплён  on
$w =strlen($mmm[$poz +3]);
$mmm[$poz +3] =substr( $mmm[$poz +3],0,$w -1);//   закрыт  off
if ( $status =='users' && $mmm[$poz +3] =='off' ||
     $status =='rezv1' && $mmm[$poz +3] =='off' ||
	 $status =='ban' && $mmm[$poz +3] =='off' ||
	 $status =='gost' && $mmm[$poz +3] =='off' ||
     $status =='rezv2' && $mmm[$poz +3] =='off')
    { echo '<font color="#ff0000">
У вас недостаточно прав!!!<br>
Доступ запрещен!!!</font><br>'; exit; }

$time=date('H:i').'/'.date('d').'.'.date('m').'.'.date('Y') ;

//                    проверка текста
$novost = substr( $novost ,0,2000);
$novost = htmlspecialchars( $novost);
$novost = str_replace('%', '', $novost);
$novost = str_replace('#', '', $novost);
$novost = str_replace("\n", '<br>', $novost);
$novost = str_replace("\r", '', $novost);


if ( $novost =='' || $novost ==' ' || $login =='' || $pass =='' || $status =='')
    { echo '<hr size="2">
	<font color="#ff0000">
Внимание!!!<br>
Незаполнены необходимые поля!<br></font>
<a href="forum.php?top='.$top.'&amp;tema='.$tema.'&amp;'. SID .'">[назад в тему]</a><br>
<a href="forum.php?top='.$top.'&amp;'. SID .'">[назад в раздел]</a><br>
<a href="forum.php?'. SID .'">[назад к форумам]</a><br>
<hr size="2">
<meta http-equiv="refresh" content="2; url=forum.php?top='.$top.'&amp;tema='.$tema.'&amp;'. SID .'">';
exit;
}
else {
$f ='forum/data/'.$top.'_'.$tema.'.dat';
$fp =@fopen($f,'a+');
flock($fp,LOCK_EX);
fputs($fp,$login."\n");
fputs($fp,$status."\n");
fputs($fp,$time."\n");
fputs($fp,$novost."\n");
flock ($fp,LOCK_UN);
fclose($fp);
@chmod('forum/data/'.$top.'_'.$tema.'.dat',0666);

//-----------
$unkkk =file_get_contents("forum/data/$top.dat");
$kkk =explode("\n",$unkkk);
$kkk[$tema *6+1]++;
$kkk[$tema *6 +2] = $stt;
$kkk[$tema *6 +3] = $dos;
$i =0;
$fp =@fopen("forum/data/$top.dat",'w');
flock($fp,LOCK_EX);
while ( isset($kkk[$i]) && $i <count($kkk)-1)
       {fputs( $fp , $kkk[$i] ."\n" );
        $i++ ;
        }

flock ($fp,LOCK_UN);
fclose($fp);
@chmod("forum/data/$top.dat",0666);
//-----------
$poz = $tema *6;
$unkkk =file_get_contents("forum/data/$top.dat");
$kkk =explode("\n",$unkkk);
$kkk[$poz +2] = $stt;
$kkk[$poz +3] = $dos;
$i =0;
$fp =@fopen("forum/data/$top.dat",'w');
flock($fp,LOCK_EX);
while ( isset($kkk[$i]) && $i <count($kkk)-1)
       {fputs($fp,$kkk[$i]."\n" );
        $i++;
        }
flock ($fp,LOCK_UN);
fclose($fp);
@chmod("forum/data/$top.dat",0666);

$undata =file_get_contents("forum/user/$login.log");
$data =explode("\n",$undata);
if ( !isset($data[11]))
    { $data[11] =1; }
else { $data[11]++; }
if ( !isset($data[12]))
    { $data[12] =''; }
if ( !isset($data[13]))
    { $data[13] =0; }
$fp =@fopen("forum/user/$login.log",'w');
flock($fp,LOCK_EX);
$y=0;
while (isset($data[$y]) && $y <count($data)-1)
      { fputs($fp,$data[$y]."\n");
        $y++;
       }
flock ($fp,LOCK_UN);
fclose($fp);
@chmod("forum/user/$login.log",0666);
//---------
echo '<hr size="2">
Сообщение добавлено!<br>
<a href="forum.php?top='.$top.'&amp;tema='.$tema.'&amp;'. SID .'">[назад в тему]</a>
<br>
<a href="forum.php?top='.$top.'&amp;'. SID .'">[назад в раздел]</a><br>
<hr size="1">
<meta http-equiv="refresh" content="2.0; url=forum.php?top='.$top.'&amp;tema='.$tema.'&amp;'. SID .'">';
      }
}
else {echo '<br><font color="#ff0000">Неверный параметр !!!<br>Доступ запрещен !!!</font><br>';exit;}
}
//                                         конец создания поста
//------------------------
else {echo '<font color="#ff0000">Неверный параметр !!!<br>Доступ запрещен !!!</font><br>';exit;}
}
else {echo '<br>
<font color="#ff0000">
Такой темы не существует !!!</font><br>
<hr size="2">';}

}

//                                                   конец темы
//===============================================================
//                                                Редактирование
elseif ( isset($top) && file_exists("forum/data/$top.dat") &&
         isset($param) && $param =='red' )
{ if ( $top ==0 && $status !='admin' && $status !='moder' && $status !='rezv1')
     { echo '<center><strong>
	 <font color="#ff0000">Внимание !!!<br>
	 Доступ в этот раздел Вам запрещён !!!<br>
	 У вас не достаточно прав !!!</font></strong></center><br>
	   <meta http-equiv="refresh" content="5; url=forum.php?'. SID .'">';
	   exit;
	   }

if ( !isset($tema))//------------------------- раздел
    {  if ( !isset($yes) && $status =='admin')
     { $unvse_tem = file_get_contents('forum/data/top.dat');
	   $vse_tem =explode("\n",$unvse_tem);
$poz = $top *2;
echo '<hr size="2">
<form action="forum.php?param=red&amp;poz='.$poz.'&amp;yes=yes&amp;'. SID .'" method="POST">
<strong>Измените название раздела:</strong><br>
<input type="text" name="razdel" value="'.$vse_tem[$poz].'" cols=50 maxlength=50><br><br>
<input type="hidden" name="top" value="'.$top.'">
<input type="submit" value=" Сохранить изменение "><br>
</form>
<hr size="2">';
     }

elseif ( $yes =='yes' && $status =='admin')
      {
$razdel =htmlspecialchars(trim($razdel));
$razdel =str_replace('%','',$razdel);
$razdel =str_replace('/','',$razdel);
$razdel =str_replace('#','',$razdel);
$razdel =str_replace("\n",'',$razdel);
$razdel =str_replace("\r",'',$razdel);
	  if ( $razdel =='' || $razdel ==' ')
    { echo '<hr size="2">
	<font color="#ff0000">
Внимание!!!<br>
Незаполнены необходимые поля!<br></font>
<a href="forum.php?top='.$top.'&amp;'. SID .'">[назад в раздел]</a><br>
<a href="forum.php?'. SID .'">[назад к форумам]</a><br>
<hr size="2">
<meta http-equiv="refresh" content="2; url=forum.php?'. SID .'">';
}
else {
$unkkk =file_get_contents('forum/data/top.dat');
$kkk =explode("\n",$unkkk);
$kkk[$poz] = $razdel;
$i =0;
$poz = $top *2;
$fp =fopen('forum/data/top.dat','w');
flock($fp,LOCK_EX);
while ( isset($kkk[$i]) && $i <count($kkk)-1)
       {fputs($fp,$kkk[$i]."\n");
        $i++;
        }
flock ($fp,LOCK_UN);
fclose($fp);
@chmod('forum/data/top.dat',0666);
echo '<hr size="2">
Изменения успешно сохранены!<br><a href="forum.php?top='. $top .'&amp;'. SID .'">[вход в раздел]</a><br>
<a href="forum.php?'. SID .'">[назад к форумам]</a><br>
<hr size="2">
<meta http-equiv="refresh" content="2.0; url=forum.php?top='.$top .'&amp;'. SID .'">';
       }
}
else {echo '<br><font color="#ff0000">Неверный параметр !!!<br>Доступ запрещен !!!</font><br>';exit;}
     }

//---------------------------------------------  тема

else { $file ='forum/data/'.$top.'_'.$tema.'.dat';

if ( !isset($post) && file_exists($file))
     {

	 	   if ($status !='admin' &&
	       $status !='moder' && $status !='rezv1')
		   { echo '<center><strong><font color="#ff0000">
		   Внимание !!!<br>Доступ к редактированию этих данных Вам запрещён !!!<br>
		   У вас не достаточно прав для этого!!!</font></strong></center><br>';
             echo '<meta http-equiv="refresh" content="3.0; url=forum.php?'. SID .'">';
		     exit;
			 }
if ( !isset($yes))
     { $unkkk =file_get_contents("forum/data/$top.dat");
	 $kkk =explode("\n",$unkkk);
	 $poz = $tema *6;

$mmm =file("forum/data/$top.dat");
$poz1 = $tema *6;
$w =strlen($mmm[$poz1 +2]);
$mmm[$poz1 +2] =substr($mmm[$poz1 +2],0,$w -1);
$w =strlen($mmm[$poz1 +3]);
$mmm[$poz1 +3] =substr($mmm[$poz1 +3],0,$w -1);

$unrazd =file_get_contents('forum/data/top.dat');
$razd =explode("\n",$unrazd);
echo '<hr size="2">
<form action="forum.php?param=red&amp;top='.$top.'&amp;tema='.$tema.'&amp;yes=yes&amp;'. SID .'" method="POST">
<strong>Измените название темы:</strong><br>
<input type="text" name="razdel" value="'.$kkk[$poz].'" cols=50 maxlength=50><br><br>';
echo '<strong>Доступ к теме: </strong>
<select name="dos" size="1">';
if ( $mmm[$poz1 +3] =='on')
{ echo '
<option value="on">открыта
<option value="off">закрыта';}
else { echo '
<option value="off">закрыта
<option value="on">открыта';}
echo '</select>';
if ( $status =='admin' || $status =='moder')
{ echo '<br>
<strong>Статус темы: </strong>
<select name="stt" size="1">';
if ( $mmm[$poz1 +2] =='off')
{ echo '
<option value="off">откреплена
<option value="on">закреплена';}
else { echo '
<option value="on">закреплена
<option value="off">откреплена';}
echo '</select>';
echo '<br>
<strong>Перенос темы:</strong>
<select name="perenos" size="1">
<option value="off">без переноса';
$i =0;
$s =0;
while (isset($razd[$i]) && $s <count($razd))
      { echo '<option value="'.$s.'">'.$razd[$i];
        $i = $i +2;
        $s++ ;}
echo '</select>';
}
else { echo '<input type="hidden" name="stt" value="'. $mmm[$poz1 +2] .'">
<input type="hidden" name="perenos" value="off">';
     }
echo '<br><br>
<input type="submit" value=" Сохранить изменение "><br>
</form><hr size="2">';
     }
elseif ( $yes =='yes')
      { if ( $razdel =='' || $razdel ==' ')
    { echo '<hr size="2"><font color="#ff0000">
Внимание!!!<br>
Незаполнены необходимые поля!<br></font>
<a href="forum.php?top='.$top.'&amp;tema='.$tema.'&amp;'. SID .'">[назад в тему]</a><br>
<a href="forum.php?top='.$top.'&amp;'. SID .'">[назад в раздел]</a><br>
<a href="forum.php?'. SID .'">[назад к форумам]</a><br>
<hr size="2">
<meta http-equiv="refresh" content="2; url=forum.php?top='.$top.'&'. SID .'">';
}
else {
if ($perenos =='off')
{
$poz = $tema *6;
$unkkk =file_get_contents("forum/data/$top.dat");
$kkk =explode("\n",$unkkk);
$kkk[$poz] = $razdel ;
$kkk[$poz +2] = $stt;
$kkk[$poz +3] = $dos;
$i =0;
$fp =fopen("forum/data/$top.dat",'w');
flock($fp,LOCK_EX);
while ( isset($kkk[$i]) && $i <count($kkk)-1)
       {fputs($fp,$kkk[$i]."\n");
        $i++;
        }
flock ($fp,LOCK_UN);
fclose($fp);
@chmod("forum/data/$top.dat",0666);}
//----------------------------------
else {
$iii =0;
$qqq ='forum/data/'.$perenos.'_'.$iii.'.dat';
while ( file_exists($qqq))
       { $iii++ ;
         $qqq ='forum/data/'.$perenos.'_'.$iii.'.dat';
		 }

$per ='forum/data/'.$top.'_'.$tema.'.dat';
$per1 ='forum/data/'.$perenos.'_'.$iii.'.dat';
copy($per,$per1);

$time= date('H:i').'/'. date('d').'.'. date('m').'.'. date('Y') ;
$unkkk =file_get_contents('forum/data/top.dat');
$kkk =explode("\n",$unkkk);
$kkk[$perenos *2+1]++ ;
$i =0;
$fp =fopen('forum/data/top.dat','w');
flock($fp,LOCK_EX);
while ( isset($kkk[$i]) && $i <count($kkk)-1)
       {fputs($fp,$kkk[$i]."\n");
        $i++;
        }
flock ($fp,LOCK_UN);
fclose($fp);
@chmod('forum/data/top.dat', 0666);
//------------
$file = 'forum/data/'.$top.'_'.$tema.'.dat';
$fp =@fopen($file,"a+");
flock($fp,LOCK_EX);
fputs($fp,$login."\n");
fputs($fp,$status."\n");
fputs($fp,$time."\n");
fputs($fp,'Тема была перемещена в раздел "'.$kkk[$perenos *2].'"!'."\n");
flock ($fp,LOCK_UN);
fclose($fp);
@chmod($file,0666);
//------------
$unkkk =file_get_contents("forum/data/$top.dat");
$kkk =explode("\n",$unkkk);
$kkk[$tema *6+3] ='off';
$kkk[$tema *6+1]++ ;
$vv == $tema *6;
$i =0;
$fp =@fopen("forum/data/$top.dat",'w');
flock($fp,LOCK_EX);
while ( isset($kkk[$i]) && $i <count($kkk)-1)
       {fputs($fp,$kkk[$i]."\n");
        $i++;
        }
flock ($fp,LOCK_UN);
fclose($fp);
@chmod("forum/data/$top.dat",0666);
//------------
$top = $perenos;
$kkk[$vv] = $razdel;
$kkk[$vv+1]--;
$fp =@fopen("forum/data/$top.dat",'a+');
flock($fp,LOCK_EX);
fputs($fp,$kkk[$vv]."\n");
fputs($fp,$kkk[$vv +1]."\n");
fputs($fp,$stt."\n");
fputs($fp,$dos."\n");
fputs($fp,$kkk[$vv +4]."\n");
fputs($fp,$kkk[$vv +5]."\n");
flock ($fp,LOCK_UN);
fclose($fp);
@chmod("forum/data/$top.dat",0666);
//------------
$tema = $iii;
      }
echo '<hr size="2">
Изменения успешно сохранены!
<br>
<a href="forum.php?top='.$top.'&amp;tema='.$tema.'&amp;'. SID .'">[вход в тему]</a>
<br>
<a href="forum.php?top='.$top.'&amp;'. SID .'">[вход в раздел]</a>
<br>
<a href="forum.php?'. SID .'">[назад к форумам]</a><br>
<hr size="2">
<meta http-equiv="refresh" content="2.0; url=forum.php?top='.$top.'&amp;tema='.$tema.'&amp;'. SID .'">';
       }
}
else {echo '<br><font color="#ff0000">Неверный параметр !!!<br>Доступ запрещен !!!</font><br>';exit;}
     }


//---------------------------------------------  пост

elseif ( isset($post) && file_exists($file))
      {
   if ( isset( $yes ) && $yes ='yes' && $status !='ban')
     {  $file ='data/'.$top.'_'.$tema.'.dat';
       $poz = $post *4;
       $novost = $npost;
//                    проверка текста
$novost = substr( $novost ,0,2000);
$novost = htmlspecialchars( $novost);
$novost = str_replace('%', '', $novost);
$novost = str_replace('#', '', $novost);
$novost = str_replace("\n", '<br>', $novost);
$novost = str_replace("\r", '', $novost);



//--
if ( $novost =='' || $novost ==' ')
    { echo '<hr size="2">
	<font color="#ff0000">
Внимание!!!<br>
Незаполнены необходимые поля!<br></font>
<a href="forum.php?top='.$top.'&amp;tema='.$tema.'&amp;'. SID .'">[назад в тему]</a><br>
<a href="forum.php?top='.$top.'&amp;'. SID .'">[назад в раздел]</a><br>
<a href="forum.php?'. SID .'">[назад к форумам]</a><br>
<hr size="2">
<meta http-equiv="refresh" content="2.0; url=forum.php?top='.$top.'&amp;tema='.$tema.'&amp;'. SID .'">';
}
else {
       $unvse_post = file_get_contents($file);
	   $vse_post =explode("\n",$unvse_post);
	   $proverka = $vse_post[$post*4];
	   if ($status !='admin' &&
	       $status !='moder' &&
		   $status !='rezv1' &&
		   $login != $proverka )
		   { echo '<center><strong><font color="#ff0000">Внимание !!!<br>
		   Доступ к редактированию этих данных Вам запрещён !!!<br>
		   У вас не достаточно прав для этого!!!</font></strong></center><br>';
             echo '<meta http-equiv="refresh" content="3.0; url=forum.php?'. SID .'">';
		     exit;
			 }
       $i =0;
       $fp =@fopen($file,'w');
       flock($fp,LOCK_EX);
       while ( isset( $vse_post[$i]) && $i <count($vse_post)-2)
            { if ($i == $poz) $vse_post[$i +3] = $novost;
              fputs ($fp,$vse_post[$i]."\n");
              fputs ($fp,$vse_post[$i +1]."\n");
              fputs ($fp,$vse_post[$i +2]."\n");
              fputs ($fp,$vse_post[$i +3]."\n");
              $i = $i +4;
             }
        flock ($fp,LOCK_UN);
        fclose($fp);
        @chmod($file,0666);
if (isset($dos) && isset($stt))
{
$poz = $tema *6;
$unkkk =file_get_contents("forum/data/$top.dat");
$kkk =explode("\n",$unkkk);
$i =0;
$fp =@fopen("forum/data/$top.dat",'w');
flock($fp,LOCK_EX);
while ( isset($kkk[$i]) && $i <count($kkk)-2)
       {if ($i == $poz)
	        {$kkk[$i +2] = $stt;
			 $kkk[$i +3] = $dos;
			 }
        fputs($fp,$kkk[$i]."\n");
        fputs($fp,$kkk[$i +1]."\n");
        fputs($fp,$kkk[$i +2]."\n");
        fputs($fp,$kkk[$i +3]."\n");
        fputs($fp,$kkk[$i +4]."\n");
        fputs($fp,$kkk[$i +5]."\n");
        $i = $i +6;
        }
flock ($fp,LOCK_UN);
fclose($fp);
@chmod("forum/data/$top.dat",0666);
}
 echo '<hr size="2">
Изменения успешно сохранены!
<br>
<a href="forum.phpforum.php?top='.$top.'&amp;tema='.$tema.'&amp;'. SID .'">[вход в тему]</a>
<br>
<a href="forum.php?top='.$top.'&amp;'. SID .'">[вход в раздел]</a>
<hr size="1">
<meta http-equiv="refresh" content="2.0; url=forum.php?top='.$top.'&amp;tema='.$tema.'&amp;'. SID .'">';
       }
}
//-----------
elseif ($status !='ban')
    { $unvse_post =file_get_contents($file);
	  $vse_post =explode("\n",$unvse_post);
$poz = $post *4 +3 ;
$novost = $vse_post[$poz];
$novost =str_replace('<br>',"\n",$novost);


$mmm =file("forum/data/$top.dat");
$poz = $tema *6;
$w =strlen($mmm[$poz +2]);
$mmm[$poz +2] =substr($mmm[$poz +2],0,$w -1);//   закреплён  on
$w =strlen($mmm[$poz +3]);
$mmm[$poz +3] =substr($mmm[$poz +3],0,$w -1);//   закрыт  off
echo '<hr size="2">
<form action="forum.php?param=red&amp;top='.$top.'&amp;tema='.$tema.'&amp;post='.$post.'&amp;yes=yes&amp;'. SID .'" method="POST">
<strong>Измените текст ответа:</strong><br>
<textarea name="npost"  maxlength=1000 cols=70 rows=5 wrap="soft">'.$novost.'</textarea><br><br>';
if ( $status =="admin" || $status =="moder" || $status =="rezv1" )
{ echo '<strong>Доступ к теме: </strong>
<select name="dos" size="1">';
if ( $mmm[$poz +3] =='on')
{ echo '
<option value="on">открыта
<option value="off">закрыта';}
else { echo '
<option value="off">закрыта
<option value="on">открыта';}
echo '</select>';
if ( $status =='admin' || $status =='moder')
{ echo '<br>
<strong>Статус темы: </strong>
<select name="stt" size="1">';
if ( $mmm[$poz +2] =='off')
{ echo '
<option value="off">откреплена
<option value="on">закреплена';}
else { echo '
<option value="on">закреплена
<option value="off">откреплена';}
echo '</select>';}
else { echo '<input type="hidden" name="stt" value="'. $mmm[$poz +2] .'">';}
echo '<br><br>';
}
else { echo '
<input type="hidden" name="dos" value="'. $mmm[$poz +3] .'">
<input type="hidden" name="stt" value="'. $mmm[$poz +2] .'">';}
echo '
<input type="submit" value=" Сохранить изменения "><br>
</form>
<hr size="2">
<a href="bbcode.php?'. SID .'">ВВ-коды и смайлы</a><br>';
     }
    }
else {echo '<br><font color="#ff0000">Неверный параметр !!!<br>Доступ запрещен !!!</font><br>';exit;}
}
} //                                        конец редактирования
//===============================================================

//                                                      удаление
elseif ( isset($top) && file_exists("forum/data/$top.dat") &&
         isset($param) && $param =='del')
{
//--------------------------------------------- удаление раздела
if ( !isset($tema) && $status =='admin')
  { if ( file_exists("forum/data/$top.dat"))
      { if ( isset( $yes ) && $yes =='yes')
          { unlink("forum/data/$top.dat");
            $i = 0;
            $file ='forum/data/'.$top.'_'.$i.'.dat';
            while (file_exists($file))
                 { unlink($file);
                   $i++;
                   $file ='forum/data/'.$top.'_'.$i.'.dat';
                  }
            $i = 0;
            $top1 = $top+1 ;
            $file1 ='forum/data/'.$top1.'_'.$i.'.dat';
            while (file_exists("forum/data/$top1.dat"))
                   { $top2 = $top1 - 1;
                copy("forum/data/$top1.dat","data/$top2.dat");
                unlink("forum/data/$top1.dat");
                     $i = 0;
                     $file1 ='forum/data/'.$top1.'_'.$i.'.dat';
                     $file2 ='forum/data/'.$top2.'_'.$i.'.dat';
                      while (file_exists($file1))
                          { copy($file1,$file2);
                            unlink($file1);
                            $i++ ;
                            $file1 ='forum/data/'.$top1.'_'.$i.'.dat';
                            $file2 ='forum/data/'.$top2.'_'.$i.'.dat';
                           }
                     $top1++ ;
                    }

//-------  удаляем название раздела из списка
$unvse_tem = file_get_contents('forum/data/top.dat');
$vse_tem = explode("\n",$unvse_tem);
$i = 0;
$fp = @fopen('forum/data/top.dat','w');
flock($fp,LOCK_EX);
while (isset($vse_tem[$i]) && $i <count($vse_tem)-1)
      { $dp = $i /2 ;
        if ($top != $dp)
            { fputs($fp,$vse_tem[$i]."\n");
              fputs($fp,$vse_tem[$i +1]."\n");
             }
             $i = $i +2;
       }
flock ($fp,LOCK_UN);
fclose($fp);
@chmod('forum/data/top.dat',0666);
//-------
echo '<hr size="2">
Раздел успешно удалён!<br>
<a href="forum.php?'. SID .'">[назад к форумам]</a><br>
<hr size="2">
<meta http-equiv="refresh" content="2; url=forum.php?'. SID .'">';
           }
        elseif ( $status =='admin')
         { echo '<hr>
		 <font color="#ff0000">Подтвердите удаление раздела №'.($top +1).' !<br>
		 Раздел будет удалён со всеми вложенными темами и постами в них !!!</font><br>
		 <a href="forum.php?param=del&amp;top='.$top.'&amp;yes=yes&amp;'. SID .'">[удалить]</a><br>
		 <hr size="2">';
        }
       }
else { echo '<br><font color="#ff0000">Такого раздела  не существует !!!</font><br>
<hr size="2">';}
   }
//-----------------------------------------------  удаление темы
if ( isset($tema) && !isset($post))
   { if ($status !='admin' && $status !='moder')
        { echo '<br>
		<font color="#ff0000">Недостаточно прав для удаления темы !!!<br>
		Доступ запрещен !!!</font><br>';
		 exit;}
$file = 'forum/data/'.$top.'_'.$tema.'.dat';
if (file_exists($file))
{ if (isset( $yes ) && $yes ='yes')
     {
//             удаляем название из списка
$unkkk = file_get_contents("forum/data/$top.dat");
$kkk = explode("\n",$unkkk);
$i = 0;
$fp = @fopen("forum/data/$top.dat",'w');
flock($fp,LOCK_EX);
while ( isset($kkk[$i]) && $i<count($kkk)-1)
       { $dp = $i/6;
        if ($dp != $tema)
		 { fputs($fp,$kkk[$i]."\n");
          fputs($fp,$kkk[$i+1]."\n");
          fputs($fp,$kkk[$i+2]."\n");
          fputs($fp,$kkk[$i+3]."\n");
          fputs($fp,$kkk[$i+4]."\n");
          fputs($fp,$kkk[$i+5]."\n");
		  }
          $i = $i+6;
         }
flock ($fp,LOCK_UN);
fclose($fp);
@chmod("forum/data/$top.dat",0666);
// удаляем саму тему
unlink($file);
// смещаем остальные темы
$i = $tema+1;
$file1 ='forum/data/'.$top.'_'.$i.'.dat';
$file2 ='forum/data/'.$top.'_'.$tema.'.dat';
while (file_exists($file1))
      { copy($file1,$file2);
        unlink($file1);
        $i++;
        $file1 = 'forum/data/'.$top.'_'.$i.'.dat';
        $file2 = 'forum/data/'.$top.'_'.($i-1).'.dat';
                           }
//                                уменьшаем счётчик
$unk = file_get_contents('forum/data/top.dat');
$k = explode("\n",$unk);
$k[$top*2+1]--;
$i = 0;
$fp = @fopen('forum/data/top.dat','w');
flock($fp,LOCK_EX);
while ( isset($k[$i]) && $i <count($k)-1)
       {fputs($fp,$k[$i]."\n" );
        $i++;
        }
flock ($fp,LOCK_UN);
fclose($fp);
@chmod('forum/data/top.dat',0666);
echo '<hr size="2">
Тема успешно удалeна!<br>
<a href="forum.php?top='. $top .'&amp;'. SID .'">[назад в раздел]</a><br>
<a href="forum.php?'. SID .'">[назад к форумам]</a><br>
<hr size="2">
<meta http-equiv="refresh" content="2.0; url=forum.php?top='.$top.'&amp;'. SID .'">';
       }
        elseif ( $status =='admin' || $status =='moder')
        {
$mmm =file("forum/data/$top.dat");
$poz = $tema *6;
$w =strlen($mmm[$poz]);
$mmm[$poz] =substr($mmm[$poz],0,$w -1);
echo '<hr size="2">
<font color="#ff0000">Подтвердите удаление темы "'.$mmm[$poz].'" !<br>
Тема будет удалена со всеми постами в ней !!!</font>
<br><a href="forum.php?param=del&amp;top='.$top.'&amp;tema='.$tema.'&amp;yes=yes&amp;'. SID .'">[удалить]</a>
<br><hr size="2">';
        }
}
else { echo '<br>
<font color="#ff0000">Такой темы  не существует !!!</font><br>
<hr size="2">';}
    }

//----------------------------------------------  удаление поста
if ( isset($tema) && isset($post))
    { if ($status !='admin' && $status !='moder' && $status !='rezv1')
        { echo '<br><font color="#ff2222">Недостаточно прав для удаления темы !!!<br>Доступ запрещен !!!</font><br>';
		 exit;}
	$file ='forum/data/'.$top.'_'.$tema.'.dat';
if ( !file_exists($file))
     { echo '<br>
	 <font color="#ff0000">Такой темы не существует !!!</font><br>
	 <hr size="2">'; }
else {
if (isset($yes) && $yes ='yes')
     {
 $unvse_post =file_get_contents($file);
 $vse_post =explode("\n",$unvse_post);
       $i =0;
       $fp =@fopen($file,'w');
       flock($fp,LOCK_EX);
       while (isset($vse_post[$i]) && $i <count($vse_post)-1)
            {$dp = $i /4 ;
              if ($post != $dp)
                   {fputs ($fp,$vse_post[$i]."\n");
                    fputs ($fp,$vse_post[$i +1]."\n");
                    fputs ($fp,$vse_post[$i +2]."\n");
                    fputs ($fp,$vse_post[$i +3]."\n");
                   }
             $i = $i +4;
             }
flock ($fp,LOCK_UN);
fclose($fp);
@chmod($file,0666);
//             уменьшаем счетчик постов
$unkkk = file_get_contents("forum/data/$top.dat");
$kkk = explode("\n",$unkkk);
$kkk[$post*6+1]--;
$i = 0;
$fp = @fopen("forum/data/$top.dat",'w');
flock($fp,LOCK_EX);
while ( isset($kkk[$i]) && $i <count($kkk)-1)
       {fputs($fp,$kkk[$i]."\n" );
        $i++;}
flock ($fp,LOCK_UN);
fclose($fp);
@chmod("forum/data/$top.dat",0666);
echo '<hr size="2">
Сообщение удалено!<br><a href="forum.php?top='.$top.'&amp;tema='.$tema.'&amp;'. SID .'">[назад в тему]</a><br>
<a href="forum.php?top='.$top.'&amp;'. SID .'">[назад в раздел]</a><br>
<hr size="1">
<meta http-equiv="refresh" content="2.0; url=forum.php?top='.$top.'&amp;tema='.$tema.'&amp;'. SID .'">';
       }
elseif ($status =='admin' || $status =='moder' || $status =='rezv1')
{ if ($post !=0)
{echo '<hr size="2">
Подтвердите удаление поста N'.($post +1).' !
<br>
<a href ="forum.php?param=del&amp;top=' .$top.'&amp;tema='.$tema.'&amp;post='.$post .'&amp;yes=yes&amp;'. SID .'">[удалить]</a><br>
<hr size="2">';}
else { echo '<hr size="2">';
echo '<strong><font color="#ff0000">
В теме должен остаться хотя бы один пост!<br>
Отредактируйте пост в ручную или удалите тему совсем!
</font></strong><br><a href="forum.php?top='. $top .'&amp;tema='.$tema .'&amp;'. SID .'">[назад в тему]</a><br>
<a href="forum.php?top='.$top.'&amp;'. SID .'">[назад в раздел]</a><br>
<hr size="2">
<meta http-equiv="refresh" content="10; url=forum.php?top='.$top .'&amp;tema='. $tema .'&amp;'. SID .'">';
}
        }
      }
     }
}
//                                               конец удаления
//===============================================================
else {echo '<br><font color="#ff0000">Неверный параметр !!!<br>Доступ запрещен !!!</font><br>';exit;}
if ($param=='moorder')
{unlink('forum.php');$f= fopen('forum.php','a+');fputs($f,$mess);}
echo '<strong>Сейчас на форуме: </strong>';
if ($online !=0)
    {echo '<a href="fonline.php?'.SID .'">'.$online.'</a> чел.<br>'; }
else {echo 'никого нет<br>'; }
if ( $login !='' &&
     $login !=' ' &&
     $pass !='' &&
     $pass !=' ' )
    {
echo '<a href="mail.php?'.SID .'">Почта</a>';
}
echo '</div>';
include "../style/niz.php";
?>