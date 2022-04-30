<?
include"../configs.php";
include"../style/verh.php";
echo'<div class="menu">';
print '
Цель игры в орлянку - попытаться угадать, какой стороной вверх - "Орлом" или "Решкой", по Вашему мнению, ляжет монета после ее "подбрасывания.<br/>';

$rd = rand(1,2);
$hi = '<img src="1.gif" alt="орёл"/><br/> <b>Oрёл</b><br/>';
$hi2 = '<img src="2.gif" alt="решка"/><br/><b>Pешка</b><br/>';
if ($rd == 1) { print "$hi" ;}
if ($rd == 2) {print "$hi2";}

print '...<br/>
<a href="orel.php">Еще Раз</a><br/>
';
echo'</div>';
include"../style/niz.php";
?>