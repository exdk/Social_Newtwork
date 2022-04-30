<?
include_once '../configs.php';
include_once '../style/verh.php';
echo'<div class="menu">';
function mobile_name($mob) { 

$arr=scandir('cod');
for($i=0;$i<count($arr);$i++) {
$str=trim($arr[$i]);
if ($str!=='.' and $str!=='..') {
$name=str_replace('.txt','',$str);
if ($i==($mob+1)) {
return $name;
}}}}
if (empty($_GET['mob'])) {
$arr=scandir('cod');

for($i=0;$i<count($arr);$i++) {
$str=trim($arr[$i]);
if ($str!=='.' and $str!=='..') {
$name=str_replace('.txt','',$str);
$mobile_name=str_replace('_',' ',$name);
echo '<div class="p_m">&raquo; <a href="?mob='.($i-1).'">'.$mobile_name.'</a> ('.ceil(filesize('cod/'.$name.'.txt')/1024).' кб)
</div>
';
}}
} elseif (is_numeric($_GET['mob'])) {
$mob=$_GET['mob'];
$name=mobile_name($mob);
$mobile_name=str_replace('_',' ',$name);



echo '<br /><b>Внимание:</b> Все манипуляции с секретными кодами телефонов вы делаете на свой страх и риск.<br />';
echo '<div class="p_t"><center><b>'.$mobile_name.'</b></center></div>
';
$page=@$_GET['page']?htmlspecialchars($_GET['page']):1;
if (preg_match("/[^0-9]/", $page)) { exit; }
$file=file('cod/'.$name.'.txt');
$count=count($file);
if (!empty($count)) {
echo '<div class="p_m">';
$end=$page*30;
$start=$end-30;
for ($i=$start; $i<$end; $i++) {
if (!empty($file[$i])) {
$str=trim($file[$i]);
echo $str.'<br />';
}}
echo '</div>';
}
$page_nav=ceil($count/30);
if ($page<=$page_nav and $page_nav>1) {
echo '<p>
Страницы: ';
$pages=3;
$link=0;
$link2=0;
if ($page>($page_nav-$pages)) {
$link2=$page_nav-$page;
$link2=$pages-$link2;
}
if ($page>($pages+1) and $page_nav>7) {
echo '<a href="?page=1&amp;mob='.$mob.'">1</a> ';
}
if (($page-$pages)>2 and $page_nav>8) {
echo ' ... ';
}
for ($i=(($page-$pages)-$link2); $i<$page; $i++) {
if ($i>0) {
echo '<a href="?page='.$i.'&amp;mob='.$mob.'">'.$i.'</a> ';
$link++;
}}
$link=$pages-$link;
echo '<b>'.$page.'</b> ';
for ($i=($page+1); $i<((($page+$pages)+1)+$link); $i++) {
if ($i<=$page_nav) {
echo '<a href="?page='.$i.'&amp;mob='.$mob.'">'.$i.'</a> ';
}}
if (($page+$pages)<($page_nav-1) and $page_nav>8) {
echo ' ... ';
}
if ($page<($page_nav-$pages) and $page_nav>7) {
echo '<a href="?page='.$page_nav.'&amp;mob='.$mob.'">'.$page_nav.'</a>';
}
echo '<br />
</p>
';
}
echo '
&laquo; <a href="cod.php">Телефоны</a><br />
';
}
list($generic_newmsec,$generic_newsec)=explode(chr('32'),microtime());
echo'</div>';
include_once '../style/niz.php';
?>
