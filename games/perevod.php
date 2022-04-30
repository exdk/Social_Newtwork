<?php
include"../configs.php";
include"../style/verh.php";
echo'<div class="menu">';
$mess = $_POST['mess'];
$mess = htmlspecialchars(stripslashes($mess));
echo "<b>$mess</b> на Японском-";
$mess=strtr($mess,array("a"=>"ka","b"=>"zu","c"=>"mi","d"=>"te","e"=>"ku","f"=>"lu","g"=>"ji","h"=>"ri","i"=>"ki","j"=>"zu","k"=>"me","l"=>"ta","m"=>"rin","n"=>"to","o"=>"mo","p"=>"no","q"=>"ke","r"=>"shi","s"=>"ari","t"=>"chi","u"=>"do","v"=>"ru","w"=>"mei","x"=>"ra","y"=>"fu","z"=>"z"));
echo "<b>$mess</b><br/>"; 
$mess=strtr($mess,array("_"=>" ","!"=>".","a"=>"а","b"=>"б","v"=>"в","g"=>"г","d"=>"д","e"=>"е","yo"=>"ё","zh"=>"ж","z"=>"з","i"=>"и","j"=>"й","k"=>"к","l"=>"л","m"=>"м","n"=>"н","o"=>"о","p"=>"п","r"=>"р","s"=>"с","t"=>"т","u"=>"у","f"=>"ф","h"=>"х","c"=>"ц","ch"=>"ч","sh"=>"ш","sch"=>"щ","q"=>"ъ","x"=>"ы","'"=>"ь","ye"=>"э","yu"=>"ю","ya"=>"я"));
echo "Произношение по русскому-<b>$mess</b><br/>";
echo'</div>';
include"../style/niz.php";
?>
