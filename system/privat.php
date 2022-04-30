<?php
if ( !isset($direct1)) { $direct1 ='forum/mail';}
$in = @file("$direct1/$login.in");
$in_vsego =count($in) /4 ;
if ( $in_vsego !=0)
{ $i =3; $new =0;
  while (isset($in[$i]))
      {  $in[$i] = substr( $in[$i] , 0 , 3 );
        if ( $in[$i] =='new') { $new++;}
        $i =$i +4;
       }
}
else { $new =0;}

?>