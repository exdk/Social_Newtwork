<?php
Error_Reporting(0);
@fopen('forum/data/online.dat','a+'); @fclose('forum/data/online.dat');
@fopen('forum/data/day.dat','a+'); @fclose('forum/data/day.dat');
//===============================================================
$ip_t = $_SERVER['REMOTE_ADDR'];
$time_t= date('H').date('i');
$day_t= date('j');
$brauz_t = $_SERVER['HTTP_USER_AGENT'];
$a= fopen('forum/data/day.dat','r');
$day_l= fgets($a,10);
fclose($a);
//===========================  online ===========================
$vsego =file('forum/data/online.dat');
$online =0;
//--------------------
 if ($day_t == $day_l )
    {
       $i =0;
       while ( isset( $vsego[$i]))
           { $w =strlen( $vsego[$i]);
             $vsego[$i] = substr( $vsego[$i] , 0 , $w -1);
             $i++; }
       $i =0;
       $time_l= $time_t -5 ;
       unlink('forum/data/online.dat');
       $fp =@fopen('forum/data/online.dat','a+');
       flock($fp,LOCK_EX);
       while ( isset( $vsego[$i]))
           { if ( $vsego[$i] != $login )
                { if ( $vsego[$i +1] > $time_l )
                      { fputs($fp , $vsego[$i] ."\n");
                        fputs($fp , $vsego[$i +1] ."\n");
                        fputs($fp , $vsego[$i +2] ."\n");
                        fputs($fp , $vsego[$i +3] ."\n");
                        $online++;
                       }
                  else { }
                 }
             $i = $i +4;
            }
        flock ($fp,LOCK_UN);
        fclose($fp);
        @chmod('forum/data/online.dat', 0666);
    }
//----------------------
 else { unlink('forum/data/day.dat');
        $fp =@fopen('forum/data/day.dat','a+');
        flock($fp,LOCK_EX);
        fputs($fp , $day_t );
        flock ($fp,LOCK_UN);
        fclose($fp);
        @chmod('forum/data/day.dat', 0666);
        unlink('forum/data/online.dat');
        @fopen('forum/data/online.dat','a+');
        @fclose('forum/data/online.dat');
      }

if ( $login !='' &&
     $login !=' ' &&
     isset($login) &&
     $pass !='' &&
     $pass !=' ' &&
     isset($pass))
     {
$fp = fopen('forum/data/online.dat','a+');
flock($fp,LOCK_EX);
fputs($fp , $login ."\n");
fputs($fp , $time_t ."\n");
fputs($fp , $ip_t ."\n");
fputs($fp , $brauz_t ."\n");
flock ($fp,LOCK_UN);
fclose($fp);
@chmod('forum/data/online.dat', 0666);
$online++;//                всего онлайн!!!
}
//===============================================================
unlink('forum/data/day.dat');
$fp =@fopen('forum/data/day.dat','a+');
flock($fp,LOCK_EX);
fputs($fp , $day_t );
flock ($fp,LOCK_UN);
fclose($fp);
?>