<?
function trans($tr)
{
return str_replace(
array('--','_','YA','Ya','ya','yee','YO','yo','Yo','ZH','zh','Zh','Z','z','CH','ch','Ch','SH','sh','Sh','YE','ye','Ye','YU','yu','Yu','JA','ja','Ja','A','a','B','b','V','v','G','g','D','d','E','e','I','i','J','j','K','k','L','l','M','m','N','n','O','o','P','p','R','r','S','s','T','t','U','u','F','f','H','h','W','w','q','Y','y','C','c','X','x'),
array('',' ','Я','Я','я','ые','Ё','ё','Ё','Ж','ж','Ж','З','з','Ч','ч','Ch','Ш','ш','Ш','Э','э','Э','Ю','ю','Ю','Я','я','Я','А','а','Б','б','В','в','Г','г','Д','д','Е','е','И','и','Й','й','К','к','Л','л','М','м','Н','н','О','о','П','п','Р','р','С','с','Т','т','У','у','Ф','ф','Х','х','Щ','щ','ь','Ы','ы','Ц','ц','Х','х'),
$tr);
}

function trans2($tr)
{return str_replace('_',' ',$tr);}

function go($pg,$all,$nom)
{
$page1 = $pg - 2;
$page2 = $pg - 1;
$page3 = $pg + 1;
$page4 = $pg + 2;

if($nom)
{$nom = '&amp;nom='.$nom;}

if($page1 > 0)
{$go.= '<a href="?pg='.$page1.$nom.'">'.$page1.'</a> ';}

if($page2 > 0)
{$go.= '<a href="?pg='.$page2.$nom.'">'.$page2.'</a> ';}

$go.= $pg.' ';

if($page3 <= $all)
{$go.= '<a href="?pg='.$page3.$nom.'">'.$page3.'</a> ';}

if($page4 <= $all)
{$go.= '<a href="?pg='.$page4.$nom.'">'.$page4.'</a> ';}

if($all > 3 && $all > $page4)
{$go.= '... <a href="?pg='.$all.$nom.'">'.$all.'</a>';}

if($page1 > 1)
{$go = '<a href="?pg=1'.$nom.'">1</a> ... '.$go;}

if($go == $pg.' ')
{return;}
else
{return $go.'<br/>';}
}
?>