<?php
echo"<div class='bordur'><a href='$url'>На главную</a></div>";
echo"<div class='reklama'>";
$a = mt_rand(1,15);
if ($a==1){echo "&#8226; <a target='_blank' href='$url/?act=go'>Чат 21+</a><br/>";}
if ($a==2){echo "&#8226; <a target='_blank' href='$url/?act=go'>Секреты ОпСоСов</a><br/>";}
if ($a==3){echo "&#8226; <a target='_blank' href='$url/?act=go'>Загрузки (480000)*</a><br/>";}
if ($a==4){echo "&#8226; <a target='_blank' href='$url/?act=go'>Dirty Jack</a><br/>";}
if ($a==5){echo "&#8226; <a target='_blank' href='$url/?act=go'>Бесплатнейший загрузон</a><br/>";}
if ($a==6){echo "&#8226; <a target='_blank' href='$url/?act=go'>Все для symbian</a><br/>";}
if ($a==7){echo "&#8226; <a target='_blank' href='$url/?act=go'>Море бесплатных загрузок</a><br/>";}
if ($a==8){echo "&#8226; <a target='_blank' href='$url/?act=go'>Мобильные знакомства!</a><br/>";}
if ($a==9){echo "&#8226; <a target='_blank' href='$url/?act=go'>БЕСПЛАТНЫЙ САЙТ</a><br/>";}
if ($a==10){echo "&#8226; <a target='_blank' href='$url/?act=go'>Галактика знакомств</a><br/>";}
if ($a==11){echo "&#8226; <a target='_blank' href='$url/?act=go'>Загрузки ВАПа</a><br/>";}
if ($a==12){echo "&#8226; <a target='_blank' href='$url/?act=go'>Лучший софт для iPhone</a><br/>";}
if ($a==13){echo "&#8226; <a target='_blank' href='$url/?act=go'>Загрузки всех форматов</a><br/>";}
if ($a==14){echo "&#8226; <a target='_blank' href='$url/?act=go'>ICQ Новинки 2010 года! СУПЕР!</a><br/>";}
if ($a==15){echo "&#8226; <a target='_blank' href='$url/?act=go'>ICQ Новинки 2010 года! СУПЕР!</a><br/>";}
echo"</div><div class='zagolovok'>$top1<br>";
echo"$copy</div></body></html>";
$end_time = microtime();
$end_array = explode(" ",$end_time);
$end_time = $end_array[1] + $end_array[0];
$time = $end_time - $start_time;
printf("%f",$time);
?>