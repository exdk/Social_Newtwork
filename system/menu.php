<?php
include "../configs.php";
include "../style/verh.php";
echo"<div class='menu'>";
if ( !isset($top) && $status =='admin' && !isset($param)) 
{echo"&raquo; <a href='../system/panel.php'>Админка</a><br>";}
echo'
&raquo; <a href="anketa.php">Моя анкета</a><br/>
&raquo; <a href="mail.php">Моя почта</a><br/>
&raquo; <a href="exit.php">Выход</a><br/>
</div>';
include"../style/niz.php";
?>