<?php
include"../configs.php";
include"../style/verh.php";
echo'<div class="menu">';
?>
<TABLE BORDER="1" CELLSPACING"0" CELLPADDING="2" RULES="cols"> <SCRIPT> 
<!--
var i,j;
for (i=2; i<=10; i++) 
{ document.write ("<TR>");
for (j=2; j<10; j++)
document.write ("<TD>"+j+"<SUP>"+i+"</SUP>="+Math.pow(i,j)+"</TD>");
document.write ("</TR>");
} 
//-->
</SCRIPT>
</TABLE>
<?
echo'</div>';
include "../style/niz.php";
?>