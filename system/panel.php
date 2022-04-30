<?php
include "../configs.php";
include "../style/verh.php";
if ( !isset($top) && $status =='admin' && !isset($param)) 
{
echo"<div class='bordur'>Админка</div>";
echo"<div class='menu'>
<a href='$url/system/forum.php?add=razdel&'>Создать раздел на форуме</a><br>
<a href='$url/system/users.php'>Управление пользователями</a><br>
<a href='$url/system/news.php?act=adm'>Добавить новость</a><br>
<a href='$url/system/dir2.php'>Редактор файлов</a><br>
</div>";
}
else {
echo"<div class='bordur'>Ошибка!</div>";
echo"<div class='menu'>
<img src='$url/style/image/error.png' alt='' /> Извините, но такой страницы не существует!<br></div>";
}
include"../style/niz.php";
?>