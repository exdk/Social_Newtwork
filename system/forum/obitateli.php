<?php
if ( !file_exists('system/forum/user/vsego.dat')) {$vsego = 0;}
  else   {$q =file('system/forum/user/vsego.dat');
        $vsego =count($q);
        }
echo ' ['. $vsego .']<br>';
?>