<?
include"../configs.php";
include"../style/verh.php";
echo'<div class="menu">';
$scr=$PHP_SELF;
$max=25; //Максимальное число столбцов или строк
$min=5; //минимальное количество строк, столбцов или мин
$cd=7;
$rd=7;
$md=10;
session_start();


function otkr($xo, $yo){
global $kl, $c, $ko, $k, $Row, $Col;
   $p=1;
   $x=$xo-$p;
   $y=$yo-$p;
   $cc=1;
   $k=0;
   $kk=0;
	while($cc<5){

      if(!$kl[$x][$y]){
         $c[$x][$y]="<img src=b.gif border=0>";
         $ko[$x][$y]=1;
       }elseif($kl[$x][$y]>=1){
          $c[$x][$y]=$kl[$x][$y];
          $ko[$x][$y]=1;
      }

      if($cc==1){
            $x++;  if($x==($xo+$p) || $x>=$Col){$cc=2;}
      }elseif($cc==2){
      		$y++;  if($y==($yo+$p)){$cc=3;}
      }elseif($cc==3){
            $x--;  if($x==($xo-$p)){$cc=4;}
      }elseif($cc==4){
            $y--;  if($y==($yo-$p)){$cc=5;}
      }


	}

}

?>
<html>
<meta http-equiv="Content-Type" content="text/html; charset=windows-1251">
<title>Сапёр</title>

<?
if (!$submit1 && $Row<$min) {
session_unset();
session_register('kl', 'kp', 'ko', 'Row', 'Col', 'Mine', 'time');
     $Mine=$md;
     $Row=$rd;
     $Col=$cd;
     $g=1;
}elseif($submit1){
session_unset();
session_register('kl', 'kp', 'ko', 'Row', 'Col', 'Mine', 'time');
$Row=$_POST['Row'];
$Col=$_POST['Col'];
$Mine=$_POST['Mine'];
if (($Row<$min) || ($Col<$min) || ($Mine<$min)) {

     $Mine=$md;
     $Row=$rd;
     $Col=$cd;
}
$g=1;
}
if($Row>$max){$Row=$max;}
if($Col>$max){$Col=$max;}
if($Mine>Round(($Row*$Col*0.75), 0)){$Mine=Round(($Row*$Col*0.75), 0);}
$click=0;
if($g==1){

$ii=0;
for($i=0; $i<($Row*$Col); $i++){
if($ii<$Mine){
$m[$i]="1";
}else{
$m[$i]="0";
}
$ii++;
}
srand((double)microtime()*100000000);
shuffle($m);

$iii=0; $qq=0;
for($i=0; $i<$Row; $i++){

   		for($ii=0; $ii<$Col; $ii++){
   			$c[$ii][$i]="<a href='$scr?xo=$ii&yo=$i'><img src=p.gif border=0></a><a href='$scr?xm=$ii&ym=$i'><img src=m.gif title='Пометить' border=0></a>";
   			if($m[$iii]==1){$kl[$ii][$i]='*'; $y[$qq]=$i; $x[$qq]=$ii; $qq++;}else{$kl[$ii][$i]='';}
          	$iii++;
        }
}



for($i=0; $i<count($x); $i++){

for($n=$y[$i]-1; $n<=$y[$i]+1; $n++){
    for($nn=$x[$i]-1; $nn<=$x[$i]+1; $nn++){
      if($kl[$nn][$n]!='*'){$kl[$nn][$n]++;}
    }
}
}

}else{
//Поле уже сгенерировано
$cmine=0;
if($xo!='' && $yo!=''){$ko[$xo][$yo]=1;}
if(!$kl[$xo][$yo] && $xo!='' && $yo!=''){
otkr($xo, $yo);
}

if (count($ko)>0){

foreach($ko as $key=>$value){
	if($key>=0 && $key<$Col){
	foreach($ko[$key] as $kk=>$val){
       if($val==1 && $kk>=0 && $kk<$Row){$click++;}
	}
	}
}
}
if(!$time){$time=time();}


if(!$kp[$xm][$ym]){$kp[$xm][$ym]=1;}else{unset($kp[$xm][$ym]);}

if($kl[$xo][$yo]=='*'){
    $msg="<font color=darkred><div class=a>ПРОИГРЫШ!</div></font>";

    for($i=0; $i<$Row; $i++){
   		for($ii=0; $ii<$Col; $ii++){
             $ko[$ii][$i]=1;
        }
}


}elseif((($Row*$Col)-$Mine)==$click){
	$gtime=time()-$time;
    $sch=Round((($Row*$Col*sqrt($Mine))/$gtime)*100);
    $msg="<font color=darkred><div class=a>ВЫИГРЫШ! СЧЕТ: $sch ВРЕМЯ: $gtime</div></font>";

    for($i=0; $i<$Row; $i++){
   		for($ii=0; $ii<$Col; $ii++){
             $ko[$ii][$i]=1;
        }

}
}

for($i=0; $i<$Row; $i++){
   		for($ii=0; $ii<$Col; $ii++){
             if($ko[$ii][$i]==1){
                        $c[$ii][$i]=$kl[$ii][$i];
                     		if(!$kl[$ii][$i]){
                        		$c[$ii][$i]="<img src=b.gif border=0>";
                     		}elseif($kl[$ii][$i]=='*'){
                                   $c[$ii][$i]="<img src=mn.gif>";
                     		}
            }elseif($kp[$ii][$i]==1){
                    $c[$ii][$i]="<a href='$scr?xo=$ii&yo=$i'><img src=fl.gif border=0></a><a href='$scr?xm=$ii&ym=$i'><img src=m.gif title='Снять метку' border=0></a>";
            $cmine++;
            }else{
             		$c[$ii][$i]="<a href='$scr?xo=$ii&yo=$i'><img src=p.gif border=0></a><a href='$scr?xm=$ii&ym=$i'><img src=m.gif title='Пометить' border=0></a>";
            }

        }
}



//Поле уже сгенерировано
}

if(!$msg){$msg="Осталось мин: ".($Mine-$cmine);}
echo "<table align=center border=1 cellpadding=1>";

for($i=0; $i<$Row; $i++){
   echo "<tr>";
   		for($ii=0; $ii<$Col; $ii++){
                    	echo "<td width=20 height=20>{$c[$ii][$i]}</td>";

        }
   echo "</tr>";
}
echo "</table><b><div align=center>$msg</div></b>";

?></div>

<form method=post action=<?=$scr?>

<div class=a>Столбцы: <input type=text name=Row value=<?=$Row?> size=2>
<div class=a>Ряды: <input type=text name=Col value=<?=$Col?> size=2>
<div class=a>Мины: <input type=text name=Mine value=<?=$Mine?> size=2>

<input type=submit name=submit1 value='Играть'>
<input type=hidden name=generer value=1>
</form><hr>
</body>
</html>
<?php
echo'</div>';
include"../style/niz.php";
?>