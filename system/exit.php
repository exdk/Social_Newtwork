<?php
Error_Reporting(0);
session_name('SID');
session_start();
include"../configs.php";
include"../style/verh_reg.php";
include('global.php');
echo '<div class="bordur">Выход</div><div class="menu">';
echo '<meta http-equiv="refresh" content="5; url=../index.php">
Спасибо за посещение нашего сайта.<br>
Мы рады будем увидеть вас здесь при следующем его посещении Вами.<br>
До встречи.</div>';
include('../style/niz.php');
session_destroy();
?>