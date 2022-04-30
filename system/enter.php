<?php
error_Reporting(0);
session_name('SID');
session_start();
include"../style/verh_reg.php";
include('global.php');
include('online_doc.php');

echo '<div class="bordur">Авторизация</div><div class="menu">';
echo '<form action="forum.php?id=avtorized" method="post">
<b>Логин :</b><br>
<input name="login" maxlength="15" ><br>
<b>Пароль :</b><br>
<input type="password" name="pass" maxlength="15"><br><br>
<input type="submit" value=" Авторизация ">
<br>
</form></div>';
include "../style/niz.php";
?>