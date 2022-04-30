<?php
error_reporting(0);
$time_tek =time();
$fp =@fopen('forum/user/banned.dat','a+');
fclose($fp);
$ban_tek =file('forum/user/banned.dat');
$utf =count($ban_tek);

if ($utf !=0)
	{
        $i5 =0;
        while ( isset($ban_tek[$i5]))
             { $w =strlen( $ban_tek[$i5]);
               $ban_tek[$i5] = substr( $ban_tek[$i5] , 0 , $w -1 );
               $i5++;
              }
	$fp =@fopen('forum/user/banned.dat','w');
        flock($fp,LOCK_EX);
	$i5 =0;
        while ( isset($ban_tek[$i5]))
        {$ban = $ban_tek[$i5 +1] - $time_tek ;
         if ($ban >0)
             {  fputs($fp , $ban_tek[$i5] ."\n");
             	fputs($fp , $ban_tek[$i5 +1] ."\n");
             	fputs($fp , $ban_tek[$i5 +2] ."\n");
             	fputs($fp , $ban_tek[$i5 +3] ."\n");
             	}
         else { $data =file("forum/user/$ban_tek[$i5].log");
                $y=0;
		while (isset($data[$y]))
     		     { $w =strlen( $data[$y]);
       		       $data[$y] = substr( $data[$y] , 0 , $w -1 );
        	       $y++;
       		      }
	 	$data[1] ='forum/users' ;
		$fp1 =@fopen("forum/user/$ban_tek[$i5].log",'w');
		$y=0;
		while (isset($data[$y]))
      		    { fputs( $fp1 , $data[$y] ."\n");
       		      $y++;
       		     }
		fclose( $fp1 );
             		}
        if ( $ban_tek[$i5] == $login )
             { if ( $ban >0 )
             	{echo '<br><center>
             	<b><font color="#ff0000">
             	<u>Внимание !!!</u><br>
             	Вы забанены !<br>
             	До конца бана осталось ';
             	if ( $ban >= 2592000 )  
                   {echo 'ещё очень долго!<br>Лучше и не ждать, всё равно не дождёшься!';}
             	elseif ( $ban < 2592000 && $ban >= 86400 )  {echo ceil($ban /86400) .' дн. !';}
             	elseif ( $ban >= 3600 && $ban < 86400)  {echo ceil($ban /3600) .' ч. !';}
             	elseif ( $ban >= 60 && $ban < 3600)  {echo ceil($ban /60) .' мин. !';}
             	elseif ( $ban < 60 )  {echo $ban .' сек. !';}
             	echo '</font></b></center>';
             	}

             	else { $data =file("forum/user/$ban_tek[$i5].log");
					$y=0;
					while (isset($data[$y]))
     					 { $w =strlen( $data[$y]);
       					   $data[$y] = substr( $data[$y] , 0 , $w -1 );
        					$y++;
       						}
	 				$data[1] ='forum/users';
					$fp1 =@fopen("forum/user/$ban_tek[$i5].log",'w');
					$y=0;
					while (isset($data[$y]))
      					{ fputs( $fp1 , $data[$y] ."\n");
       					 $y++;
       					}
					fclose( $fp1 );
             		}
             }

         $i5 = $i5 +4;
        }
     flock ($fp,LOCK_UN);
     @fclose($fp);
	}

?>