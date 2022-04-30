<?php
function translit($msg)
{
$mix = strpos($msg,',');
if ($mix<15)
    { $nik =substr($msg ,0, $mix );
	$msg =substr($msg,$mix);
	}
$trans1= array('CSH','Csh','ZH','Zh','CH','Ch','SH','Sh','JO','Jo','JE','Je','JU','Ju','JA','Ja','csh','zh','ch','sh','jo','je','ju','ja','A','B','V','G','D','E','Z','I','J','K','L','M','N','O','P','R','S','T','U','F','H','C','&#39;',"'",'Y','a','b','v','g','d','e','z','i','j','k','l','m','n','o','p','r','s','t','u','f','h','c','&#39;',"'",'y');
$trans2 = array( 'Щ',  'Щ',  'Ж', 'Ж', 'Ч', 'Ч', 'Ш', 'Ш', 'Ё', 'Ё', 'Э', 'Э', 'Ю', 'Ю', 'Я', 'Я', 'щ',  'ж', 'ч', 'ш', 'ё', 'э', 'ю', 'я','А','Б','В','Г','Д','Е','З','И','Й','К','Л','М','Н','О','П','Р','С','Т','У','Ф','Х','Ц',  'ь',  'ь','Ы','а','б','в','г','д','е','з','и','й','к','л','м','н','о','п','р','с','т','у','ф','х','ц',  'ь',  'ь','ы');
$msg = str_replace($trans1,$trans2,$msg);
if (isset($nik) && $nik != '')
   { $msg = $nik . $msg;}
return $msg;
}


function antimat($string)
   {
    $zamena = '<font color="#ff0000">[..censored..]</font>';
//	$string=preg_replace('/(с|c|С|C)(у|y|Y|У)(ч|4|Ч)?(к|k|K|К|ча|чa|4a|4а)?(а|a)/i',$zamena,$string);
//	$string=preg_replace('/(п|n|П)(и|u|И)(д|g|Д)(о|o|0|a|а|e|е)?(р|p)(а|a)?(з|c|с)?/i',$zamena,$string);
//	$string=preg_replace('/(х|x|X|Х)(у|У|Y|y)(й|и|Й|И|u|е|e|Е|Ё|ё|Я|я)(b|в)?(o|0|о|a|а)?/i',$zamena,$string);
//	$string=preg_replace('/(Г|г|к|К)(О|о|А|а|O|o|a|A)(H|н|Н)(д|Д)(o|O|о|О)?/i',$zamena,$string);
//	$string=preg_replace('/(П|п)(o|O|о|О)(|х|x| |X|Х)(х|x|X|Х|у|У|Y|y)(ю|Ю|у|У|Y|y)?(ю|Ю)?/i',$zamena,$string);
//	$string=preg_replace('/(п|n|П)(и|u|И)(з|3|З)(д|g|Д)?/i',$zamena,$string);
//	$string=preg_replace('/(y| ||Y|У|у)(е|Ё|ё|e|E|Е)(б|6|Б)(а|и|И|a|А|A|Ё|ё)(к|К|н|Н|H|т|с|С|л)?/i',$zamena,$string);
//	$string=preg_replace('/( )(б|6|Б)(л|Л)(я|Я)/i',$zamena,$string);
//	$string=preg_replace('/(е|e|E|Е)(б|6|Б)(у|У|Y|y|л|Л)(ч|Ч|a|A|а|А)?/i',$zamena,$string);
//	$string=preg_replace('/(з|3|З)(a|A|а|А)(е|e|E|Е|ё|Ё)(б|6|Б)?/i',$zamena,$string);
	$string=str_replace('хуй',$zamena,$string);
	$string=str_replace('песд',$zamena,$string);
	$string=str_replace('пезд',$zamena,$string);
	$string=str_replace('бледво',$zamena,$string);
	$string=str_replace('педик',$zamena,$string);
	$string=str_replace('гнида',$zamena,$string);
    return $string;
}

?>