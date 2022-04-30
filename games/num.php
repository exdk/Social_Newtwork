<?php 
include"../configs.php";
include"../style/verh.php";
echo'<div class="menu">';

############
##Нстройки##
############

$lownumber = 0;         // Самое маленькое число
$highnumber = 100;        // Самое большое число
$maxhighscore = 100;    // Количество записей в рекордах
$date = date("d-m-Y");  // Дата.

##################
##Конец настроек##
##################

session_start(); 
session_name($REMOTE_ADDR);

if( isset($usernick) )
{

	$usernick = trim($usernick);
	if( $usernick == "" )
	{
                                                                                 ###### Без имянная страница ######


echo "<html>\r
<head>\r
<title>Угадай число</title>\r
</head>\r
<body bgcolor=\"black\" onload=\"document.forms[0].usernick.focus()\">\r

	<table class=\"sitemenu\" align=\"center\" bgcolor=\"gray\" bordercolor=\"silver\" border=\"1\" cellpadding=\"5\" cellspacing=\"0\">\r
	<tr align=\"center\">\r
	<td class=\"sitemenutopic\"><b>.: No Name :.</b></td></tr>\r
	<tr><td>\r

		<table class=\"site\" align=\"center\" bordercolor=\"silver\" border=\"0\" cellpadding=\"0\">\r
		<tr><td align=\"center\">\r

		<form action=\"$PHP_SELF\" method=\"post\">\r
		<b>Smarty you have to enter a name.</b><br>\r
		Enter your name:<br>
		<input type=\"text\" name=\"usernick\" maxlength=\"25\"><br>\r
		<input type=\"submit\" value=\"Submit\">\r
		</form>\r

		</td></tr>\r
		</table>\r

	</td></tr>\r
	</table>\r
</body>\r
</html>
";
echo'</div>';
include"../style/niz.php";
	exit;	
	}
}
                                                                                 ###### Запись базы ######
if( $_SESSION['do'] == "write" )
{
	$usernick = htmlspecialchars($usernick);
	$usernick = stripslashes($usernick);
	$usernick = substr($usernick, 0, 25);
	$file = fopen("list.txt","a+");
	fwrite($file,"\n$num_tries|$usernick|$date|");
	fclose($file);

	$file = "list.txt";
	$fd = fopen ($file, "r");
	$contents = fread ($fd, filesize ($file));
	fclose ($fd);
	$pieces = explode ("\n", $contents);
	natcasesort($pieces);
	if( $maxhighscore != "0" )
	{$pieces = array_slice($pieces, 0, $maxhighscore);}

	$fp = fopen ("list.txt", "w+");
	$blarg = implode("\n",$pieces); 
	fwrite($fp,$blarg,strlen($blarg));
	fclose ($fp);

                                                                                 ###### Страница - очки добавлены ######
echo "<html>\r
<head>\r
<title>Угадай число</title>\r
</head>\r

	
	<p align=\"center\">\r
	<center><b>.: Очки добавлены :.</b></center>\r
	

		<center>
		Твои очки вошли в рекорды $usernick.<br>\r
		
	
	Нажми <a href=\"$PHP_SELF\">сюда</a> ,чтобы начать новую игру.<br>\r
		и  <a href=\"highscore.php\">сюда</a> ,чтобы посмотреть рекорды.\r
	
	
</center>
</body>\r
</html>
";
echo'</div>';
include"../style/niz.php";
	exit;
}

if( $lownumber >= $highnumber )
{
print "Config error edit \$lownumber & \$highnumber";
exit;
}

$num_to_guess = ( isset( $num_to_guess ) ) ? $num_to_guess : rand($lownumber,$highnumber);
session_register("num_to_guess");

$message = "";
$num_tries = ( isset( $num_tries ) ) ? ++$num_tries : 0;
session_register("num_tries");
if ( ! isset( $guess ) )
   {
   $message = "<br>Угадай число";
   }
elseif ( $guess < $lownumber | $guess > $highnumber )
   {
   $message = "<b><br>$guess не подходит числу от $lownumber до $highnumber</b>";
   --$num_tries;
   }
elseif ( $guess > $num_to_guess )
   {
   $message = "<b>Число $guess слишком большое!</b><br>Возьми число поменьше";
   }
elseif ( $guess < $num_to_guess )
   {
   $message = "<b>Число $guess слишком маленькое!</b><br>Возьми число побольше";
   }
elseif ( $guess == $num_to_guess )
   {
                                                                                 ###### Страница - вы выиграли ######
echo "<html>\r
<head>\r
<title>Угадай число</title>\r
</head>\r
<body bgcolor=\"black\" onload=\"document.forms[0].usernick.focus()\">\r

                                                <center><b>.: Вы выиграли :.</b></center>\r

		
		<palign=\"center\">\r

		<form action=\"$PHP_SELF\" method=\"post\">\r
		Ты выиграл с $num_tries попытками.<br>\r
		Ввели своё имя:<br>
		<input type=\"text\" name=\"usernick\" maxlength=\"25\"><br>\r
		<input type=\"submit\" value=\"Ввести\">\r
		</form>\r

</body>\r
</html>
";


	$do = "write";
	session_register("do");
	echo'</div>';
        include"../style/niz.php";
	exit;
   }
else
   {
   $message = "<font color=\"red\">Error</font><br>\n";
   }
                                                                                 ###### Главная страница игры ######
?>
<html>
<head>
<title>Угадай число</title>
</head>
	<b>.: Угадай число :.</b><br/>
		
		<b>Угадай число от <?php print "$lownumber до $highnumber" ?></b><br>
		Количество попыток: <?php print $num_tries ?><br>
		<?php print $message ?><br>
		<form action="<?php print $PHP_SELF ?>" method="POST">
		Число:<br>
		<input type="text" name="guess"><br>
		<input type="submit" value="Угадать !">
		</form>Нажми <a href="<?php print $PHP_SELF ?>">сюда</a> ,чтобы начать новую игру.<br>
</body>
</html>
<?php
echo'</div>';
include"../style/niz.php";
?>