<?
include_once '../configs.php';
include_once '../style/verh.php';
echo'<div class="menu">';

error_reporting(0);



$text = $_GET['text'];


echo '<form method="get">';
echo 'Текст:<br><input type="text" name="text"><br>Исходный язык:<br><select name="sl"><option value="auto">Определить язык</option><option value="separator" disabled>&#8212;</option><option  value="sq">албанский</option><option value="en">английский</option><option  value="ar">арабский</option><option  value="af">африкаанс</option><option  value="be">белорусский</option><option  value="bg">болгарский</option><option  value="cy">валлийский</option><option  value="hu">венгерский</option><option  value="vi">вьетнамский</option><option  value="gl">галисийский</option><option  value="nl">голландский</option><option  value="el">греческий</option><option  value="da">датский</option><option  value="iw">иврит</option><option  value="yi">идиш</option><option  value="id">индонезийский</option><option  value="ga">ирландский</option><option  value="is">исландский</option><option  value="es">испанский</option><option  value="it">итальянский</option><option  value="ca">каталанский</option><option  value="zh-CN">китайский</option><option  value="ko">корейский</option><option  value="ht">Креольский (Гаити) ALPHA</option><option  value="lv">латышский</option><option  value="lt">литовский</option><option  value="mk">македонский</option><option  value="ms">малайский</option><option  value="mt">мальтийский</option><option  value="de">немецкий</option><option  value="no">норвежский</option><option  value="fa">персидский</option><option  value="pl">польский</option><option  value="pt">португальский</option><option  value="ro">румынский</option><option  value="ru">русский</option><option  value="sr">сербский</option><option  value="sk">словацкий</option><option  value="sl">словенский</option><option  value="sw">суахили</option><option  value="tl">тагальский</option><option  value="th">тайский</option><option  value="tr">турецкий</option><option  value="uk">украинский</option><option  value="fi">финский</option><option  value="fr">французский</option><option  value="hi">хинди</option><option  value="hr">хорватский</option><option  value="cs">чешский</option><option  value="sv">шведский</option><option  value="et">эстонский</option><option  value="ja">японский</option></select><br>Язык перевода:<br><select name="tl"><option  value="sq">албанский</option><option  value="en">английский</option><option  value="ar">арабский</option><option  value="af">африкаанс</option><option  value="be">белорусский</option><option  value="bg">болгарский</option><option  value="cy">валлийский</option><option  value="hu">венгерский</option><option  value="vi">вьетнамский</option><option  value="gl">галисийский</option><option  value="nl">голландский</option><option  value="el">греческий</option><option  value="da">датский</option><option  value="iw">иврит</option><option  value="yi">идиш</option><option  value="id">индонезийский</option><option  value="ga">ирландский</option><option  value="is">исландский</option><option  value="es">испанский</option><option  value="it">итальянский</option><option  value="ca">каталанский</option><option  value="zh-TW">китайский (традиционный)</option><option  value="zh-CN">китайский (упрощенный)</option><option  value="ko">корейский</option><option  value="ht">Креольский (Гаити) ALPHA</option><option  value="lv">латышский</option><option  value="lt">литовский</option><option  value="mk">македонский</option><option  value="ms">малайский</option><option  value="mt">мальтийский</option><option  value="de">немецкий</option><option  value="no">норвежский</option><option  value="fa">персидский</option><option  value="pl">польский</option><option  value="pt">португальский</option><option  value="ro">румынский</option><option SELECTED value="ru">русский</option><option  value="sr">сербский</option><option  value="sk">словацкий</option><option  value="sl">словенский</option><option  value="sw">суахили</option><option  value="tl">тагальский</option><option  value="th">тайский</option><option  value="tr">турецкий</option><option  value="uk">украинский</option><option  value="fi">финский</option><option  value="fr">французский</option><option  value="hi">хинди</option><option  value="hr">хорватский</option><option  value="cs">чешский</option><option  value="sv">шведский</option><option  value="et">эстонский</option><option  value="ja">японский</option></select><br>';
echo'<input type="submit" value="Перевести"></form><br>';



if($text=='' || empty($text))
{
echo'</div>';
include_once '../style/niz.php';
exit;
}

$from = $_GET['sl'];
$to = $_GET['tl'];


$text = urlencode($text);


    $header = "GET translate.google.ru/m?sl=".$from."&tl=".$to."&prev=_m&q=".$text." HTTP/1.0\r\n";
    $header .= "Accept: */*\r\n";
    $header .= "Referer: http://e-mail.ru\r\n";
    $header .= "Accept-Language: ru\r\n";
    $header .= "Content-Type: multipart/form-data\r\n";
    $header .= "Proxy-Connection: Keep-Alive\r\n";
    $header .= "User-Agent: Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1; .NET CLR 1.1.4322)\r\n";
    $header .= "Host: e-mail.ru\r\n";
    $header .= "Pragma: no-cache\r\n\r\n";
    $header .= $auth_data;

    $sckt = fsockopen("translate.google.ru",80);
    fputs($sckt,$header);

    while(!feof($sckt))
    {
        $serv_answer = fgets($sckt,2048);

        $trans = $trans.$serv_answer;
    }




$ot = explode('class="t0">',$trans);
$ot2 = explode('>',$ot[1]);
$ot2[0]=strip_tags($ot2[0]);
$slo = explode('<p class="thead">Словарь:',$trans);

$slo2 = explode('<br><br></div>',$slo[1]);
$slo2[0] = str_replace('</div>','',$slo2[0]);
$slo2[0] = str_replace('<div>','',$slo2[0]);
$slo2[0] = str_replace('</p>','',$slo2[0]);


if($ot2[0]=='')
{
echo 'Сервер недоступен, либо невозможно определить язык!';
include_once"themes/$config_themes/foot.php";
exit;
}




echo'<b>Перевод:</b><br>';


echo '<div style="background-color : #e3e5e3; 
border-style : dotted; 
color: red;
border-width : 1px; 
border-color : #b8c1b7; 
padding : 10px; 
padding-left : 35px; 
background-repeat : repeat-y; 
font-size : 11px;">'.$ot2[0].'</div></div><br>';

if($slo2[0]!='')
{
echo '<b>Словарь:</b><br>';
echo '<div style="background-color : #e3e5e3; 
border-style : dotted; 
border-width : 1px; 
border-color : #b8c1b7;
color: red; 
padding : 10px; 
padding-left : 35px;
background-repeat : repeat-y; 
font-size : 11px;">'.$slo2[0].'</div></div>';
}

echo'</div>';
include_once '../style/niz.php';
?>