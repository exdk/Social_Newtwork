<?php
if ($_GET[act]=="") 
{
include"../configs.php";
include"../style/verh.php";
echo'<div class="bordur">Калькулятор<br></div>
<div class="menu">
<form action="calculator.php?act=end" method="POST">
1число:<br><input type="text" name="a" format="*N"/>
<select name="option">
<option value="s">+
<option value="v">-
<option value="u">&#215;
<option value="d">&#247;
<option value="k">Корень квадр.
</select>
<br>
2число:<br><input type="text" format="*N" name="b">
<input type="submit" value="=">
</form></div>';
include"../style/niz.php";
}

if ($_GET[act]=="end") 
{
include"../configs.php";
include"../style/verh.php";
echo'<div class="bordur">Калькулятор<br></div>';
$a=$_POST['a']; $b=$_POST['b'];
$v=($a-$b);
$s=($a+$b);
$u=($a*$b);
$d=($a/$b);
$k=sqrt($a);
echo "<div class='menu'><b>", $$_POST['option'], "</b><br>\n";
echo '<br><a href="calculator.php">Считать ещё</a>'; 
echo '<br><a href="/">Главная</a></div>';
include"../style/niz.php";
}
?>