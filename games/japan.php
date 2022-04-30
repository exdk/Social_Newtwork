<?php
include"../configs.php";
include"../style/verh.php";
echo'<div class="menu">';
echo'
Введите слово на английском языке, не используя верхнего регистра:
<form action="perevod.php" method="post">
<input name="mess" value="">
<input type=Submit value=Поехали!>
</form>';
echo'</div>';
include"../style/niz.php";
?>