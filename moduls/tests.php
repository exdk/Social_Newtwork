<?php
if ($_GET[act]=="") 
{
include"../configs.php";
include"../style/verh.php";
echo '<div class="menu">
<b>Онлайн Тесты:</b><br>
» <a href="tests.php?act=sosed">Хороший ли вы сосед?</a><br>
» <a href="tests.php?act=dly_devushek">Насколько вы застенчивы? (Для девушек)</a><br>
» <a href="tests.php?act=dobrota">Добрый ли вы человек?</a><br>
» <a href="tests.php?act=ulica">Можно ли тебя выпускать на улицу?</a><br>
» <a href="tests.php?act=les">Можно ли тебя пускать в лес?</a><br>
» <a href="tests.php?act=tv">Являешься ли ты помешанным(ой) на телевидении?</a><br>
» <a href="tests.php?act=jadnii">Жадный ли ты человек?</a><br>
» <a href="tests.php?act=doverch">Тест на доверчивость</a><br>
» <a href="tests.php?act=schast">Ожидает ли тебя счастье в семейной жизни?</a><br>
» <a href="tests.php?act=sueverie">Суеверны ли вы?</a><br>
» <a href="tests.php?act=tarakans">Есть ли у Вас в голове тараканы?</a><br></div>';
include"../style/niz.php";
}

if ($_GET[act]=="sosed") 
{
include"../configs.php";
include"../style/verh.php";
echo '<div class="menu">';
echo '<b>Хороший ли вы сосед?</b><br><br>';

echo '
<script language="JavaScript">

<!-- Hide JavaScript from Java-Impaired Browsers

function dataBase(tests) {
	var counter=0;
	if (tests.q1[2].checked)	{counter++;}
	if (tests.q2[2].checked)	{counter++;}
	if (tests.q3[2].checked)	{counter++;}
	if (tests.q4[2].checked)	{counter++;}
	if (tests.q5[2].checked)	{counter++;}
	if (tests.q6[2].checked)	{counter++;}
	if (tests.q7[2].checked)	{counter++;}
if (tests.q8[2].checked)	{counter++;}
if (tests.q9[2].checked)	{counter++;}
if (tests.q10[0].checked)	{counter++;}
	
	
	document.tests.display.value = counter;
}

// End Hiding Script -->

</script>
<meta name="Description" content="">
<meta name="Keywords" content="">
</head>



</body>

  <table cols="1" width="660">
    <tbody>
      <tr>
        <td width="652">
          <p align="center"><strong><em></em></strong></p>
    <form action="remove_it?subject=Answer on test questions" method="post" name="tests">
      <hr>
      <div align="left"><p style="margin-left: 90"><strong>1. Живёт ли у
        вас в квартире одно из перечисленных
        животных: лошадь, корова, гуси, скунс,
        бешеная собака?<br>
      <input name="q1" type="radio" value="17" checked>А как же! Плюс
        кобра.<br>
      <input name="q1" type="radio" value="18">Хорошая мысль!
        Завтра же пойду в зоомагазин.<br>
      <input name="q1" type="radio" value="19">Вроде
        никого из этих животных дома не замечал(а).</strong></p>
      </div><hr>
      <p style="margin-left: 90"><strong>2. Любите ли вы
      слушать музыку &quot;на всю катушку&quot;,
      причем часто с открытым окном?<br>
      <input name="q2" type="radio" value="27" checked>Конечно! Иначе
      никакого удовольствия!<br>
      <input name="q2" type="radio" value="28">Да, несу культуру
      в массы.<br>
      <input name="q2" type="radio" value="29">Нет.</strong></p>
      <hr>
      <p style="margin-left: 90"><strong>3. Храните ли вы дома
      взрывчатку (тротил, атомная бомба и пр.)?<br>
      <input name="q3" type="radio" value="37" checked>А где же мне ещё её
      хранить?<br>
      <input name="q3" type="radio" value="38">Хорошо, что
      напомнили! Надо поискать, валяется где-то...<br>
      <input name="q3" type="radio" value="39">Нет, у меня
      аллергия на взрывчатые вещества.</strong></p>
      <hr>
      <p style="margin-left: 90"><strong>4. Сморкаетесь ли вы
      на дверь соседа?<br>
      <input name="q4" type="radio" value="47" checked>Не скажу.<br>
      <input name="q4" type="radio" value="48">Ну, было...<br>
      <input name="q4" type="radio" value="49">Как вам в голову
      могла прийти такая глупость?</strong></p>
      <hr>
      <p style="margin-left: 90"><strong>5. Любите ли вы заводить
      ли вы у себя в квартире мотоцикл без
      глушителя?<br>
      <input name="q5" type="radio" value="57" checked>Очень редко (бензин
      дорогой).<br>
      <input name="q5" type="radio" value="58">А разве нельзя? Я
      только с глушителем...<br>
      <input name="q5" type="radio" value="59">У меня вроде и
      мотоцикла-то в квартире нет...</strong></p>
      <hr>
      <p style="margin-left: 90"><strong>6. Когда вы чихаете -
      дребезжат ли стекла? <br>
      <input name="q6" type="radio" value="67" checked>Да, это я люблю.<br>
      <input name="q6" type="radio" value="68">Стекла не
      дребезжат, но вороны во дворе сразу
      взлетают.<br>
      <input name="q6" type="radio" value="69">Нет.</strong></p>
      <hr>
      <p style="margin-left: 90"><strong>7. Любите ли вы
      устраивать у себя шумные вечеринки?<br>
      <input name="q7" type="radio" value="77" checked>А где же их еще
      устраивать?<br>
      <input name="q7" type="radio" value="78">А что ж нам, в
      шахматы играть?<br>
      <input name="q7" type="radio" value="79">Нет.</strong></p>
      <hr>
      <p style="margin-left: 90"><strong>8. Что вы говорите
      друзьям о своих соседях?<br>
      <input name="q8" type="radio" value="87" checked>Что они дураки.<br>
      <input name="q8" type="radio" value="88">Что они уроды.<br>
      <input name="q8" type="radio" value="89">Ничего плохого.</strong></p>
      <hr>
      <p style="margin-left: 90"><strong>9. Здороваетесь ли вы
      с соседями?<br>
      <input name="q9" type="radio" value="97" checked>Ну, вот еще! А если
      они бациллоносители? Пусть лучше рта не
      открывают!<br>
      <input name="q9" type="radio" value="98">Я с ними
      здороваюсь, но мысленно, на
      португальском языке.<br>
      <input name="q9" type="radio" value="99">Да.</strong></p>
      <hr>
      <p style="margin-left: 90"><strong>10. Охотно ли вы
      оказываете помощь соседям, когда они вас
      об этом просят?<br>
      <input name="q10" type="radio" value="17" checked>Да, и получаю
      удовольствие от этого.<br>
      <input name="q10" type="radio" value="18">Ко мне с такими
      просьбами никто не обращается.<br>
      <input name="q10" type="radio" value="19">Я же не бюро
      добрых услуг!</strong></p>
      <hr>
          <table>
              <tbody>
                <tr>
                  <td colSpan="3">
                    <div align="center">
                      <center>
                      <strong>Нажмите на кнопку&nbsp;&nbsp; и
                      получите результат</strong></div>
                    </center></td>
                </tr>
                <tr align="middle">
                  <td><b><input name="check" onclick="dataBase(this.form)" type="button" value=" Проверь себя "></b></td>
                  <td><b><textarea cols="5" name="display" rows="1" wrap="VIRTUAL"></textarea></b></td>
                  <td><b><input type="reset" value="Очистить форму"></b></td>
                </tr>
              </tbody>
            </table>
            </form>
            <p align="left"><b>Подведем итоги. Если вы
            набрали:<br>
            <font color="#FF0000">8-10 очков - Да вы замечательный сосед!<br>
           0-7 очков - Надо задуматься...</font></b></p>
            
          </td>
      </tr>
    </tbody>
  </table>


    <p align="center">&nbsp;</p>


';
echo '</div>';
include"../style/niz.php";
}

if ($_GET[act]=="dly_devushek") 
{
include"../configs.php";
include"../style/verh.php";
echo '<div class="menu">';
echo '<b>Насколько вы застенчивы?(Тест для девушек)</b><br><br>';

echo '

<script language="JavaScript">

<!-- Hide JavaScript from Java-Impaired Browsers

function dataBase(tests) {
	var counter=0;
	if (tests.q1[0].checked)	{counter++;}
	if (tests.q2[0].checked)	{counter++;}
	if (tests.q3[0].checked)	{counter++;}
	if (tests.q4[0].checked)	{counter++;}
	if (tests.q5[0].checked)	{counter++;}
	if (tests.q6[0].checked)	{counter++;}
	if (tests.q7[0].checked)	{counter++;}
	if (tests.q8[0].checked)	{counter++;}
	if (tests.q9[1].checked)	{counter++;}
	if (tests.q10[1].checked)	{counter++;}
	if (tests.q11[1].checked)	{counter++;}
	if (tests.q12[1].checked)	{counter++;}
	if (tests.q13[1].checked)	{counter++;}
	if (tests.q14[1].checked)	{counter++;}
	if (tests.q15[1].checked)	{counter++;}
	if (tests.q16[1].checked)	{counter++;}
	
	document.tests.display.value = counter;
}

// End Hiding Script -->

</script>
<meta name="Description" content="Прикольные тесты">
<meta name="Keywords" content="Юмористические прикольные тесты">

    <form action="remove_it?subject=Answer on test questions" method="post" name="tests">
<!--ENCTYPE="text/plain"-->
      <hr>
      <div align="left"><p style="margin-left: 100">
        <font face="Arial">
        1. Если мой наряд на вечеринке разительно отличается от одежды остальных, я почувствую себя неловко.
   
 <br>
      <input name="q1" type="radio" value="13" checked>Да.<br>
      <input name="q1" type="radio" value="14">Нет.</p>
      </div><hr>
      <p style="margin-left: 100">  2. Мне будет неприятно, если кто-то захочет почитать  
мой дневник или личную переписку. 
 <br>
      <input name="q2" type="radio" value="23" checked>Да.<br>
      <input name="q2" type="radio" value="24">Нет.</p>
      <hr>
      <p style="margin-left: 100">3. Мне трудно решиться пригласить кого-то на ужин, так  
как я боюсь услышать отказ. 
 <br>
      <input name="q3" type="radio" value="33" checked>Да.<br>
      <input name="q3" type="radio" value="34">Нет.</p>
      <hr>
      <p style="margin-left: 100">4. Если меня пригласят принять участие в незнакомой  
игре, я, скорее всего, откажусь. 
 <br>
      <input name="q4" type="radio" value="43" checked>Да.<br>
      <input name="q4" type="radio" value="44">Нет.</p>
      <hr>
      <p style="margin-left: 100">5. Опоздав на собрание, я не осмелюсь войти в  
помещение, потому что взгляды всех присутствующих устремятся на меня.  <br>
      <input name="q5" type="radio" value="53" checked>Да.<br>
      <input name="q5" type="radio" value="54">Нет.
           </p>
      <hr>
      <p style="margin-left: 100">6. Выступая перед аудиторией, я не смогу оторвать  
взгляд от заранее подготовленного текста, даже если прекрасно знакома с темой доклада. 
<br>
      <input name="q6" type="radio" value="63" checked>Да. <br>
      <input name="q6" type="radio" value="64">Нет.</p>
      <hr>
      <p style="margin-left: 100">7. В гимнастическом зале или на танцах я обычно скромно  
стою у стенки, стесняясь собственной неповоротливости. 
 <br>
      <input name="q7" type="radio" value="73" checked>Да.<br>
      <input name="q7" type="radio" value="74">Нет.
      
      </p>
      <hr>
      <p style="margin-left: 100">8. Я избегаю рассказывать анекдоты или смешные истории.  
Заметив, что меня внимательно слушают, я обычно смущаюсь и теряю нить повествования. 
 <br>
      <input name="q8" type="radio" value="83" checked>Да.<br>
      <input name="q8" type="radio" value="84">Нет.
     
      </p>
      <hr>
      <p style="margin-left: 100">9. Когда я на кого-то зла, я всегда даю ему это понять. 
<br>
      <input name="q9" type="radio" value="93" checked>Да. <br>
      <input name="q9" type="radio" value="94">Нет.
     
      </p>
      <hr>
      <p style="margin-left: 100">10. Мне доставляет удовольствие показываться в  
общественных местах в новой модной одежде. 
 <br>
      <input name="q10" type="radio" value="13" checked>Да. <br>
      <input name="q10" type="radio" value="14">Нет.<br>
           </p>
      <hr>
 <p style="margin-left: 100">11. С неудовольствием принимаю участие в соревнованиях вне  
зависимости от уровня моей подготовки. <br>
      <input name="q11" type="radio" value="113" checked>Да.<br>
      <input name="q11" type="radio" value="114">Нет. <br>
           </p>
      <hr>
 <p style="margin-left: 100">12. Если после лекции что-то все же осталось непонятным, я  
попрошу преподавателя объяснить еще раз. 
<br>
      <input name="q12" type="radio" value="123" checked>Да. <br>
      <input name="q12" type="radio" value="124">Нет. <br>
           </p>
      <hr>
 <p style="margin-left: 100">13. На пляже или в бассейне я без малейшего стеснения  
облачаюсь в купальный костюм. 
 <br>
      <input name="q13" type="radio" value="133" checked>Да.<br>
      <input name="q13" type="radio" value="134">Нет.
           </p>
      <hr>
 <p style="margin-left: 100">14. Когда на уроке танцев или в спортивном клубе тренер  
выбирает партнера, чтобы продемонстрировать упражнение, я всегда надеюсь, что он обратит внимание  
на меня.  <br>
      <input name="q14" type="radio" value="143" checked>Да. <br>
      <input name="q14" type="radio" value="144">Нет.
           </p>
      <hr>
 <p style="margin-left: 100">15. Я с удовольствием слушаю отзывы других о моей  
работе.<br>
      <input name="q15" type="radio" value="153" checked>Да.<br>
      <input name="q15" type="radio" value="154">Нет.</p>
      <hr>
 <p style="margin-left: 100">16. Став объектом шутки, я всегда посмеюсь вместе со всеми и  
нисколько не обижусь. 
<br>
      <input name="q16" type="radio" value="163" checked>Да.<br>
      <input name="q16" type="radio" value="164">Нет.
           </p>

      <hr>
      <table>
<TBODY>
        <tr>
          <td colspan="3"><div align="center"><center>Нажмите на кнопку &nbsp;
          и получите результат. </font>
              </div>
            </center></td>
        </tr>
        <tr align="center">
          <td><strong><input name="check" onclick="dataBase(this.form)" type="button"
          value=" Проверь себя "></strong></td>
          <td><strong><textarea cols="5" name="display" rows="1" wrap="VIRTUAL"></textarea></strong></td>
          <td><strong><input type="reset" value="Очистить форму"></strong></td>
        </tr>
</TBODY>
      </table>
    </form>
    <hr>
    <p align="left" style="margin-left: 20; margin-right: 20">
    <font color="#FF0000"><b>Подведем итоги: </b></font>
    <br>
   От 14 до 16. Вы ужасно застенчивы. Вы 
    слишком много обращаете внимания на то, что думают другие о вашей внешности, 
    фигуре, интеллекте или умении контактировать с людьми. Пора стать более 
    независимой и научиться отстаивать собственное мнение! r>
    <br>
    От 10 до 13. Мнение окружающих важно для вас, и иногда такая зависимость 
    может стать причиной неприятностей. Следует научиться чувствовать себя более 
    раскованно, и тогда вы избавитесь от страха быть не признанным обществом.
    <br>
    <br>
    От 7 до 9. Застенчивость — это одна из черт вашего характера, но вы успешно 
    с ней боретесь. Просмотрите список вопросов, чтобы определить свое наиболее 
    уязвимое место: интеллект (ответы «да» на 2 и 6; «нет» на 12 и 15), 
    внешность («да» на 1 и 5; «нет» на 10 и 13), социальное положение («да» на 3 
    и 8; «нет» на 9 и 16) или спортивная форма («да» на 4 и 7; «нет» на 11 и 
    14). <br>
    <br>
    От 3 до 6. В жизни вы идете собственной дорогой, считаясь при этом с мнением 
    окружающих. Оптимальное равновесие! <br>
    <br>
    От 0 до 2. Мнение других о вашей персоне абсолютно вас не интересует. Вы 
    плывете собственным курсом, но по отношению к окружающим держитесь слишком 
    холодно и равнодушно. Немного внимания к людям сделает вашу жизнь более 
    легкой и интересной. <br></p>
';
echo '</div>';
include"../style/niz.php";
}

if ($_GET[act]=="dobrota") 
{
include"../configs.php";
include"../style/verh.php";
echo '<div class="menu">';
echo '<b>Добрый ли вы человек?</b><br><br>';

echo '

<script language="JavaScript" type="text/javascript">
function count(){

//first we will check which answer was selected
//and calculate points that person will get
// start checking question 1

if (document.forms[0].q1[0].checked){
var a1 = document.forms[0].q1[0].value}
if (document.forms[0].q1[1].checked){
var a1 = document.forms[0].q1[1].value}

// end 1
// start 2

if (document.forms[0].q2[0].checked){
var a2 = document.forms[0].q2[0].value}
if (document.forms[0].q2[1].checked){
var a2 = document.forms[0].q2[1].value}

// end 2
// start 3

if (document.forms[0].q3[0].checked){
var a3 = document.forms[0].q3[0].value}
if (document.forms[0].q3[1].checked){
var a3 = document.forms[0].q3[1].value}

// end 3
// start 4

if (document.forms[0].q4[0].checked){
var a4 = document.forms[0].q4[0].value}
if (document.forms[0].q4[1].checked){
var a4 = document.forms[0].q4[1].value}

// end 4
// start 5

if (document.forms[0].q5[0].checked){
var a5 = document.forms[0].q5[0].value}
if (document.forms[0].q5[1].checked){
var a5 = document.forms[0].q5[1].value}

// end 5
// start 6

if (document.forms[0].q6[0].checked){
var a6 = document.forms[0].q6[0].value}
if (document.forms[0].q6[1].checked){
var a6 = document.forms[0].q6[1].value}

// end 6
// start 7

if (document.forms[0].q7[0].checked){
var a7 = document.forms[0].q7[0].value}
if (document.forms[0].q7[1].checked){
var a7 = document.forms[0].q7[1].value}

// end 7

// start 8

if (document.forms[0].q8[0].checked){
var a8 = document.forms[0].q8[0].value}
if (document.forms[0].q8[1].checked){
var a8 = document.forms[0].q8[1].value}

// end 8

// start 9

if (document.forms[0].q9[0].checked){
var a9 = document.forms[0].q9[0].value}
if (document.forms[0].q9[1].checked){
var a9 = document.forms[0].q9[1].value}

// end 9

// start 10

if (document.forms[0].q10[0].checked){
var a10 = document.forms[0].q10[0].value}
if (document.forms[0].q10[1].checked){
var a10 = document.forms[0].q10[1].value}

// end 10

// start 11

if (document.forms[0].q11[0].checked){
var a11 = document.forms[0].q11[0].value}
if (document.forms[0].q11[1].checked){
var a11 = document.forms[0].q11[1].value}

// end 11

// start 12

if (document.forms[0].q12[0].checked){
var a12 = document.forms[0].q12[0].value}
if (document.forms[0].q12[1].checked){
var a12 = document.forms[0].q12[1].value}

// end 12


//now we will check whether all questions were answered

if (typeof a1=="string" && typeof a2=="string" && typeof a3=="string" 
&& typeof a4=="string" && typeof a5=="string" && typeof a6=="string" 
&& typeof a7=="string" && typeof a8=="string" && typeof a9=="string" && typeof a10=="string" && typeof a11=="string" && typeof a12=="string"){

//these are variants of conclusion

good = "Общение с вами, надо признаться, порой бывает просто мукой даже для самых близких вам людей. Будьте доброжелательнее, и у вас будет больше друзей. Ведь дружба требует доброго отношения...";
pour = "Ну что же, ваша доброта — вопрос случая. Добры вы далеко не со всеми. Для одних вы можете пойти на все, но общение с вами более чем неприятно для тех, кто вам не нравится. Это не так уж плохо. Но, наверное, надо стараться быть ровным со всеми, чтобы люди не обижались.";
bad = "Вы любезны, нравитесь окружающим, умеете общаться с людьми. У вас, наверное, много друзей. Одно предостережение: никогда не пытайтесь иметь хорошие отношения со всеми — всем не угодишь, да и на пользу это вам не пойдет.";

result = parseInt(a1)+parseInt(a2)+parseInt(a3)+parseInt(a4)+
parseInt(a5)+parseInt(a6)+parseInt(a7)+parseInt(a8)+parseInt(a9)+parseInt(a10)+parseInt(a11)+parseInt(a12);

//this is system of assessment

if (result>=0 && result<=3){
document.forms[0].output.value = good;
}
else if (result>=4 && result<=8){
document.forms[0].output.value = pour;
}
else if (result>=9 && result<=12){
document.forms[0].output.value = bad;
}
} else {
alert("Вы ответили не на все вопросы!");
}
}
</script>
<meta name="Description" content="Добрый ли вы? Прикольные тесты">
<meta name="Keywords" content="Юмористические прикольные тесты">
</head>




</body>

    <form>
      <hr>
      <div align="left"><p style="margin-left: 100"><font face="Arial">
        1. У вас появились деньги. Могли бы вы истратить все, что у вас есть, на 
        подарки друзьям? <br>
      <input name="q1" type="radio" value="1" checked>Да.<br>
      <input name="q1" type="radio" value="0">Нет.</p>
      </div><hr>
      <p style="margin-left: 100">2. Товарищ 
      рассказывает вам о своих невзгодах. Дадите ли вы ему понять, что вас это 
      мало интересует, даже если это так? <br>
      <input name="q2" type="radio" value="0" checked>Да.<br>
      <input name="q2" type="radio" value="1">Нет.</font></p>
      <hr>
      <p style="margin-left: 100"><font face="Arial">3. Если ваш партнер 
      плохо играет в шахматы или другую игру, будете ли вы иногда ему 
      поддаваться, чтобы сделать приятное? <br>
      <input name="q3" type="radio" value="1" checked>Да! <br>
      <input name="q3" type="radio" value="0">Нет.</font></p>
      <hr>
      <p style="margin-left: 100"><font face="Arial">4. Часто ли вы 
      говорите приятное людям, просто чтобы поднять им настроение? <br>
      <input name="q4" type="radio" value="1" checked><span lang="ru">Да.</span><br>
      <input name="q4" type="radio" value="0"><span lang="ru">Нет.</span></font></p>
      <hr>
      <p style="margin-left: 100"><font face="Arial">5. Любите ли вы 
      злые шутки? <br>
      <input name="q5" type="radio" value="0" checked>Да.<br>
      <input name="q5" type="radio" value="1">Нет.</font></p>
      <hr>
      <p style="margin-left: 100"><font face="Arial">6. Вы злопамятны?
      <br>
      <input name="q6" type="radio" value="1" checked>Да.<br>
      <input name="q6" type="radio" value="0">Нет.</font></p>
      <hr>
      <p style="margin-left: 100"><font face="Arial">7. Можете ли вы 
      терпеливо выслушать даже то, что вас совершенно не интересует? <br>
      <input name="q7" type="radio" value="1" checked>Да.<br>
      <input name="q7" type="radio" value="0">Нет.</font></p>
      <hr>
      <p style="margin-left: 100"><font face="Arial">8. Умеете ли вы на 
      практике применять свои способности? <br>
      <input name="q8" type="radio" value="0" checked>Да.<br>
      <input name="q8" type="radio" value="1">Нет.</font></p>
      <hr>
      <p style="margin-left: 100"><font face="Arial">9. Бросаете ли игру, 
      когда начинаете проигрывать? <br>
      <input name="q9" type="radio" value="0" checked><span lang="ru">Да.</span><br>
      <input name="q9" type="radio" value="1"><span lang="ru">Нет.</span></font></p>
      <hr>
      <p style="margin-left: 100"><font face="Arial">10. Если вы уверены 
      в своей правоте, отказываетесь ли выслушать аргументы оппонента? <br>
      <input name="q10" type="radio" value="0" checked>Да.<br>
      <input name="q10" type="radio" value="1">Нет.</font></p>
      <hr>
      <p style="margin-left: 100"><font face="Arial">11. Вы охотно 
      выполняете просьбы? <br>
      <input name="q11" type="radio" value="1" checked>Да!<br>
      <input name="q11" type="radio" value="0">Нет.</font></p>
      <hr>
      <p style="margin-left: 100"><font face="Arial">12. Станете ли вы 
      подтрунивать над кем-то, чтобы развеселить окружающих? <br>
      <input name="q12" type="radio" value="0" checked>Да.<br>
      <input name="q12" type="radio" value="1">Нет.</font></p>
      <hr>
      <div align="center"><center><font face="Arial">Нажмите на кнопку и
      получите результат<b> </b></font> 
      </center></div><div align="center"><center><textarea cols="50" name="output"
      rows="3"></textarea></center></div><div align="center"><center><input type="button"
      onclick="count()" value="Проверьте себя"> <input type="reset"
      value="Очистить форму"></center></div>
    </form>
    <hr align="center">    
   
<br>
&nbsp;

';
echo '</div>';
include"../style/niz.php";
}

if ($_GET[act]=="ulica") 
{
include"../configs.php";
include"../style/verh.php";
echo '<div class="menu">';
echo '<b>Можно ли тебя выпускать на улицу?</b><br><br>';

echo '

<script language="JavaScript">

<!-- Hide JavaScript from Java-Impaired Browsers

function dataBase(tests) {
	var counter=0;
	if (tests.q1[0].checked)	{counter++;}
	if (tests.q2[2].checked)	{counter++;}
	if (tests.q3[2].checked)	{counter++;}
	if (tests.q4[2].checked)	{counter++;}
	if (tests.q5[2].checked)	{counter++;}
	if (tests.q6[2].checked)	{counter++;}
	if (tests.q7[1].checked)	{counter++;}
        if (tests.q8[1].checked)	{counter++;}
	if (tests.q9[0].checked)	{counter++;}
	
	
	
	
	document.tests.display.value = counter;
}

// End Hiding Script -->

</script><meta name="Description" content="Прикольные тесты">
<meta name="Keywords" content="Юмористические прикольные тесты">
</head>

    <form action="remove_it?subject=Answer on test questions" method="post" name="tests">
      <hr>
      <div align="left"><p style="margin-left: 100"><strong>1. В государстве
      Сингапур тот, кто плюнул на тротуар, подвергается
      штрафу <br>
      в 500 долларов. Есть ли у тебя такая привычка? <br>
      <input name="q1" type="radio" value="14" checked>Нет. Разве я похож(а) на
      верблюда?<br>
      <input name="q1" type="radio" value="15">А если мне плюнуть
      захотелось, куда же мне плевать? На прохожих? <br>
      <input name="q1" type="radio" value="16">А у меня в слюне микробы!
      Мне их что - глотать?!</strong></p>
      </div><hr>
      <p style="margin-left: 100"><strong>2. Если ты с кем-то поспорил(а),
      стараешься ли ты укусить своего оппонента?<br>
      <input name="q2" type="radio" value="24" checked>А что - разве нельзя
      немножко укусить?<br>
      <input name="q2" type="radio" value="25">Не только укусить, но и
      загрызть могу.<br>
      <input name="q2" type="radio" value="26">До сих пор всегда
      удерживался(-лась).</strong></p>
      <hr>
      <p style="margin-left: 100"><strong>3. Есть ли у тебя вредная
      привычка ходить по улицам с оружием (пистолет,
      гранатомет, рогатка и пр.)?<br>
      <input name="q3" type="radio" value="34" checked>Да, я джигит, я без оружия
      не могу.<br>
      <input name="q3" type="radio" value="35">Есть у меня такая вредная
      привычка.<br>
      <input name="q3" type="radio" value="36">Нет, от этого больше
      проблем, чем пользы.</strong></p>
      <hr>
      <p style="margin-left: 100"><strong>4. Некоторые люди, если им
      что-то (или кто-то) не нравится, сразу лезут в
      драку. Одобряешь ли ты это?<br>
      <input name="q4" type="radio" value="44" checked>Да. Но я не сразу лезу в
      драку. Сначала я бросаю гранату.<br>
      <input name="q4" type="radio" value="45">Ну, а если мне не нравятся,
      к примеру, болельщики ЦСКА - что мне с ними -
      спорить до хрипоты? Или писать жалобу в
      Организацию Объединенных Наций?<br>
      <input name="q4" type="radio" value="46">Не одобряю.</strong></p>
      <hr>
      <p style="margin-left: 100"><strong>5. Есть ли у тебя привычка
      гулять по улицам с крокодилом?<br>
      <input name="q5" type="radio" value="54" checked>Ага! Только у меня не
      крокодил, а злая собака!<br>
      <input name="q5" type="radio" value="55">Я сам не хуже крокодила.<br>
      <input name="q5" type="radio" value="56">Нет.</strong></p>
      <hr>
      <p style="margin-left: 100"><strong>6. Ты у перекрестка
      собираешься перейти улицу. Когда это можно
      сделать?<br>
      <input name="q6" type="radio" value="64" checked>Когда поблизости нет
      машин.<br>
      <input name="q6" type="radio" value="65">Когда поблизости нет
      милиции.<br>
      <input name="q6" type="radio" value="66">Когда загорится зеленый
      свет.</strong></p>
      <hr>
      <p style="margin-left: 100"><strong>7. Когда на улице ты
      разворачиваешь конфету или мороженое, что ты
      делаешь с фантиком (оберткой)?<br>
      <input name="q7" type="radio" value="74" checked>Тут же бросаю на тротуар.<br>
      <input name="q7" type="radio" value="75">Ищу ближайшую урну.<br>
      <input name="q7" type="radio" value="76">Да я и не помню. В следующий
      раз понаблюдаю за собой.</strong></p>
      <hr>
      <p style="margin-left: 100"><strong>8. Любишь ли ты грызть на улице
      семечки?<br>
      <input name="q8" type="radio" value="84" checked>Обожаю! Это одно из моих
      любимых развлечений!<br>
      <input name="q8" type="radio" value="85">Нет, это так некультурно!<br>
      <input name="q8" type="radio" value="86">А что - теперь уж и семечки
      на улице погрызть нельзя?</strong></p>
      <hr>
      <p style="margin-left: 100"><strong>9. Состоишь ли ты на учете в
      психиатрической клинике как буйный и
      общественно опасный больной?<br>
      <input name="q9" type="radio" value="97" checked>Пока нет. (И надеюсь, что
      никогда не буду.)<br>
      <input name="q9" type="radio" value="98">Состою! Ну и что?<br>
      <input name="q9" type="radio" value="99">Не состою, потому что я
      сжег их картотеку! Ха-ха-ха!</strong></p>
      <hr>
      <table>
<TBODY>
        <tr>
          <td colspan="3"><div align="center"><center><strong>Нажми на кнопку &nbsp;
          и получишь результат</strong>
              </div>
            </center></td>
        </tr>
        <tr align="center">
          <td><strong><input name="check" onclick="dataBase(this.form)" type="button"
          value=" Проверь себя "></strong></td>
          <td><strong><textarea cols="5" name="display" rows="1" wrap="VIRTUAL"></textarea></strong></td>
          <td><strong><input type="reset" value="Очистить форму"></strong></td>
        </tr>
</TBODY>
      </table>
    </form>
    <p align="center"><strong><font color="#FF0000">Подведем итоги. Если ты набрал(а):</font><br>
    9 очков. Ты просто украшение улицы!<br>
    0-8 очков. Где-то произошел недобор - разберись. Но
    если ты не нападаешь <br>
    на прохожих, можешь сейчас выйти погулять.</strong></p>
    

';
echo '</div>';
include"../style/niz.php";
}

if ($_GET[act]=="les") 
{
include"../configs.php";
include"../style/verh.php";
echo '<div class="menu">';
echo '<b>Можно ли тебя пускать в лес?</b><br><br>';

echo '

<script language="JavaScript">

<!-- Hide JavaScript from Java-Impaired Browsers

function dataBase(tests) {
	var counter=0;
	if (tests.q1[2].checked)	{counter++;}
	if (tests.q2[2].checked)	{counter++;}
	if (tests.q3[2].checked)	{counter++;}
	if (tests.q4[0].checked)	{counter++;}
	if (tests.q5[2].checked)	{counter++;}
	if (tests.q6[2].checked)	{counter++;}
		
	
	
	
	document.tests.display.value = counter;
}

// End Hiding Script -->

</script>	
<meta name="Description" content="Прикольные тесты">
<meta name="Keywords" content="Юмористические прикольные тесты">
</head>


<table cols="1" width="654">
  <tr>
    <td width="646">
    <form action="remove_it?subject=Answer on test questions" method="post" name="tests">
      <hr>
      <div align="left"><p style="margin-left: 100"><font size="4">1. С чем ты
        любишь ходить в лес?<br>
        </font><strong>
      <input name="q1" type="radio" value="14" checked>С ружьем.<br>
      <input name="q1" type="radio" value="15">С топором.<br>
      <input name="q1" type="radio" value="16">С корзинкой.</p>
      </div><hr>
      </strong>
        <p style="margin-left: 100"><font size="4">2. Любишь ли ты поджигать
        все, что попадается под руку? <br>
        </font><strong>
      <input name="q2" type="radio" value="24" checked>Да, я, как Наполеон,
        люблю огонь!<br>
      <input name="q2" type="radio" value="25">Поджигаю только
        все бумажное и деревянное.<br>
      <input name="q2" type="radio" value="26">Нет, я не
        поджигатель...</p>
      <hr>
      </strong><p style="margin-left: 100"><font size="4">3. Можешь ли ты
        заблудиться в трех соснах?<br>
      </font><strong>
      <input name="q3" type="radio" value="34" checked>Да, я абсолютный
        топографический кретин...<br>
      <input name="q3" type="radio" value="35">В трех соснах не
        заблужусь, но в пяти - запросто.<br>
      <input name="q3" type="radio" value="36">Не заблужусь!</p>
      <hr>
      </strong><p style="margin-left: 100"><font size="4">4. Отличаешь
      ли ты ядовитые грибы от неядовитых?<br>
      </font><strong>
      <input name="q4" type="radio" value="44" checked>Конечно!<br>
      <input name="q4" type="radio" value="45">А что - бывают
      ядовитые грибы?! Впрочем, один гриб знаю -
      &quot;ложная поганка&quot;...<br>
      <input name="q4" type="radio" value="46">Нет, они все такие
      похожие...</p>
      <hr>
      </strong><p style="margin-left: 100"><font size="4">5. Любишь ли
      ты песню со словами &quot;Некому березу
      заломати, некому кудряву заломати...&quot;?<br>
      </font><strong>
      <input name="q5" type="radio" value="54" checked>Правильная песня!&nbsp;<br>
      <input name="q5" type="radio" value="55">Как это: &quot;некому
      заломати?&quot; Я всегда готов!<br>
      <input name="q5" type="radio" value="56">Кошмарные стихи.&nbsp;</p>
      <hr>
      </strong><p style="margin-left: 100"><font size="4">6. Когда ты
      идешь в лес, нужно ли к тебе прикреплять
      бригаду мусорщиков?<br>
      </font><strong>
      <input name="q6" type="radio" value="64" checked>Конечно! Ведь в
      лесу должно быть чисто!<br>
      <input name="q6" type="radio" value="65">Бригаду не надо.
      Одного человека достаточно.<br>
      <input name="q6" type="radio" value="66">Мусор в лесу не
      оставляю.</strong></p>
      <hr>
      <table>
<TBODY>
        <tr>
          <td colspan="3"><div align="center"><center><strong>Нажми на кнопку &nbsp;
          и получишь результат</strong>
              </div>
            </center></td>
        </tr>
        <tr align="center">
          <td><strong><input name="check" onclick="dataBase(this.form)" type="button"
          value=" Проверь себя "></strong></td>
          <td><strong><textarea cols="5" name="display" rows="1" wrap="VIRTUAL"></textarea></strong></td>
          <td><strong><input type="reset" value="Очистить форму"></strong></td>
        </tr>
</TBODY>
      </table>
    </form>
      <p align="center"><strong>Подведем итоги. У тебя
      набрано:<br>
      5-6 очков. Ты можешь ходить в лес! Но
      береги его!<br>
      0-4 очка. Лес для тебя - не самое
      подходящее место отдыха...</strong></p>
        <hr align="center">
    </td>
  </tr>
</table>


';
echo '</div>';
include"../style/niz.php";
}

if ($_GET[act]=="tv") 
{
include"../configs.php";
include"../style/verh.php";
echo '<div class="menu">';
echo '<b>Являешься ли ты помешанным(ой) на
телевидении?</b><br><br>';

echo '

<script language="JavaScript">

<!-- Hide JavaScript from Java-Impaired Browsers

function dataBase(tests) {
	var counter=0;
	if (tests.q1[0].checked)	{counter++;}
	if (tests.q2[0].checked)	{counter++;}
	if (tests.q3[0].checked)	{counter++;}
	if (tests.q4[0].checked)	{counter++;}
	if (tests.q5[0].checked)	{counter++;}
	if (tests.q6[0].checked)	{counter++;}
	if (tests.q7[0].checked)	{counter++;}
	
	
	
	
	document.tests.display.value = counter;
}

// End Hiding Script -->

</script>
	
<meta name="Description" content="Прикольные тесты">
<meta name="Keywords" content="Юмористические прикольные тесты">
</head>

<p align="center">&nbsp;</p>
    <form action="remove_it?subject=Answer on test questions" method="post" name="tests">
      <hr>
      <div align="left"><p style="margin-left: 100"><strong>1. Смотришь ли ты
      телевизор больше двух часов в день? <br>
      <input name="q1" type="radio" value="14" checked>Конечно, там же столько
      интересного!<br>
      <input name="q1" type="radio" value="15">Некогда мне!<br>
      <input name="q1" type="radio" value="16">Есть вещи и поинтереснее.</strong></p>
      </div><hr>
      <p style="margin-left: 100"><strong>2. Смотришь ли ты хотя бы один
      телесериал? <br>
      <input name="q2" type="radio" value="24" checked>Да, а разве это плохо?<br>
      <input name="q2" type="radio" value="25">Нет, у меня своих проблем
      полно!<br>
      <input name="q2" type="radio" value="26">Ох, не люблю я эти мыльные
      оперы!</strong></p>
      <hr>
      <p style="margin-left: 100"><strong>3. Если не удалось посмотреть
      очередную серию любимого сериала,
      расстраиваешься ли ты? <br>
      <input name="q3" type="radio" value="34" checked>Ну конечно!<br>
      <input name="q3" type="radio" value="35">Кто-то сказал: &quot;Не
      расстраивайтесь по пустякам! Берегите здоровье
      для крупных неприятностей!&quot;<br>
      <input name="q3" type="radio" value="36">Нет, не смотрю сериалы.</strong></p>
      <hr>
      <p style="margin-left: 100"><strong>4.&nbsp; Портится ли у тебя
      настроение надолго, если у героев любимого
      сериала неприятности? <br>
      <input name="q4" type="radio" value="44" checked>А как же! Я ведь за них
      переживаю!<br>
      <input name="q4" type="radio" value="45">Мне бы их проблемы!<br>
      <input name="q4" type="radio" value="46">Нет, это же кино!</strong></p>
      <hr>
      <p style="margin-left: 100"><strong>5. Предпочитаешь ли ты, чтобы в
      твоей квартире телевизор был включен целый день?<br>
      <input name="q5" type="radio" value="54" checked>А почему бы и нет? Время от
      времени там что-то интересное показывают.<br>
      <input name="q5" type="radio" value="55">Нет, я тогда сойду с ума.<br>
      <input name="q5" type="radio" value="56">Могу потерпеть, если он
      будет в другой комнате.</strong></p>
      <hr>
      <p style="margin-left: 100"><strong>6. Каждый раз, когда ты
      ужинаешь, ты включаешь телевизор на кухне или
      идешь с тарелкой смотреть его в комнату.<br>
      <input name="q6" type="radio" value="64" checked>Да!<br>
      <input name="q6" type="radio" value="65">Иногда случается.<br>
      <input name="q6" type="radio" value="66">Нет, это не способствует
      правильному пищеварению. Да и вообще не хочу.</strong></p>
      <hr>
      <p style="margin-left: 100"><strong>7. Ты сторонник того, чтобы
      количество телевизоров в квартире равнялось
      количеству членов семьи?<br>
      <input name="q7" type="radio" value="74" checked>Конечно!<br>
      <input name="q7" type="radio" value="75">Меня этот вопрос мало
      интересует.<br>
      <input name="q7" type="radio" value="76">Может, еще и кошке
      телевизор купить? </strong></p>
      <hr>
      <table>
<TBODY>
        <tr>
          <td colspan="3"><div align="center"><center><strong>Нажми на кнопку &nbsp;
          и получишь результат</strong>
              </div>
            </center></td>
        </tr>
        <tr align="center">
          <td><strong><input name="check" onclick="dataBase(this.form)" type="button"
          value=" Проверь себя "></strong></td>
          <td><strong><textarea cols="5" name="display" rows="1" wrap="VIRTUAL"></textarea></strong></td>
          <td><strong><input type="reset" value="Очистить форму"></strong></td>
        </tr>
</TBODY>
      </table>
    </form>
    <p align="center"><strong><font color="#FF0000">Подведем итоги. У тебя
    набрано:</font><br>
    6-7 очков. Диагнозы о помешательстве имеет право
    ставить только психиатр. Мы просто скажем, что
    телевизор для тебя - полноправный член семьи.
    Если тебе не жалко времени, смотри на здоровье! (Хотя,
    впрочем, здоровья от этого не прибавится.
    А еще лучше почитай книжку).<br>
    4-5 очков. Ситуация получше. Но следует
    понаблюдать за собой со стороны.<br>
    0-3 очка. Всё в порядке! Ты не раб телевидения. И не помешан на нем.</strong></p>
    

';
echo '</div>';
include"../style/niz.php";
}

if ($_GET[act]=="jadnii") 
{
include"../configs.php";
include"../style/verh.php";
echo '<div class="menu">';
echo '<b>Жадный ли ты человек?</b><br><br>';

echo '

<script language="JavaScript">

<!-- Hide JavaScript from Java-Impaired Browsers

function dataBase(tests) {
	var counter=0;
	if (tests.q1[0].checked)	{counter++;}
	if (tests.q2[0].checked)	{counter++;}
	if (tests.q3[0].checked)	{counter++;}
	if (tests.q4[0].checked)	{counter++;}
	if (tests.q5[0].checked)	{counter++;}
	
	
	
	document.tests.display.value = counter;
}

// End Hiding Script -->

</script>
<meta name="Description" content="Прикольные тесты">
<meta name="Keywords" content="Юмористические прикольные тесты">
</head>


<p align="center">&nbsp;</p>
    <form action="remove_it?subject=Answer on test questions" method="post" name="tests">
<!--ENCTYPE="text/plain"-->
      <hr>
      <div align="left"><p style="margin-left: 50"><strong>1. Если друг
      попросит у тебя миллион долларов, ты скажешь: <br>
      <input name="q1" type="radio" value="14" checked>Мне для друга ничего не
      жалко.<br>
      <input name="q1" type="radio" value="15">Не могу, у меня у самого
      сейчас денежные проблемы.<br>
      <input name="q1" type="radio" value="16">Приходи завтра, а еще
      лучше, в следующем тысячелетии.</strong></p>
      </div><hr>
      <p style="margin-left: 50"><strong>2. Твой друг что-то покупает в
      магазине, и ему не хватает одной копейки. Ты: <br>
      <input name="q2" type="radio" value="24" checked>доплатишь за друга
      копейку.<br>
      <input name="q2" type="radio" value="25">скажешь: &quot;Копейка рубль
      бережет!&quot;<br>
      <input name="q2" type="radio" value="26">скажешь: &quot;Давай не будем
      это покупать!&quot;</strong></p>
      <hr>
      <p style="margin-left: 50"><strong>3. Если тебе подарят слона,
      будешь ли ты катать на нем друзей?<br>
      <input name="q3" type="radio" value="34" checked>Конечно!<br>
      <input name="q3" type="radio" value="35">Ты скажешь: &quot;Слону
      нельзя переутомляться!&quot;<br>
      <input name="q3" type="radio" value="36">Ты скажешь друзьям:
      &quot;Катайтесь, но потом поменяйтесь со слоном
      местами!&quot;</strong></p>
      <hr>
      <p style="margin-left: 50"><strong>4. Ты несешь выбрасывать
      сломанную игрушечную машину, а маленький мальчик
      во дворе попросил тебя дать эту игрушку ему. Ты:<br>
      <input name="q4" type="radio" value="44" checked>отдашь ему игрушку.<br>
      <input name="q4" type="radio" value="45">продашь ему игрушку.<br>
      <input name="q4" type="radio" value="46">выбросишь ее, чтобы никому
      не досталась.</strong></p>
      <hr>
      <p style="margin-left: 50"><strong>5. У тебя в квартире из бутылки
      с шипучкой появился старик Хоттабыч и попросил
      его накормить. Ты:<br>
      <input name="q5" type="radio" value="54" checked>накормишь голодного
      волшебника.<br>
      <input name="q5" type="radio" value="55">скажешь: &quot;У меня тут не
      столовая для пенсионеров&quot;.<br>
      <input name="q5" type="radio" value="56">постараешься запихнуть
      старика обратно в бутылку.</strong></p>
      <hr>
      <table>
<TBODY>
        <tr>
          <td colspan="3"><div align="center"><center><strong>Нажми на кнопку &nbsp;
          и получишь результат</strong>
              </div>
            </center></td>
        </tr>
        <tr align="center">
          <td><strong><input name="check" onclick="dataBase(this.form)" type="button"
          value=" Проверь себя "></strong></td>
          <td><strong><textarea cols="5" name="display" rows="1" wrap="VIRTUAL"></textarea></strong></td>
          <td><strong><input type="reset" value="Очистить форму"></strong></td>
        </tr>
</TBODY>
      </table>
    </form>
    <p align="center"><strong>Подведем итоги. Если ты набрал
    больше одного очка, ты, несомненно, добрый и
    великодушный человек. Таким и оставайся!<br>
    Если ты не набрал ни одного очка, можешь считать
    себя человеком не жадным, а экономным. </strong>
</p>


';
echo '</div>';
include"../style/niz.php";
}

if ($_GET[act]=="doverch") 
{
include"../configs.php";
include"../style/verh.php";
echo '<div class="menu">';
echo '<b>Тест на доверчивость</b><br><br>';

echo '

<script language="JavaScript">

<!-- Hide JavaScript from Java-Impaired Browsers

function dataBase(tests) {
	var counter=0;
	if (tests.q1[1].checked)	{counter++;}
	if (tests.q2[1].checked)	{counter++;}
	if (tests.q3[1].checked)	{counter++;}
	if (tests.q4[1].checked)	{counter++;}
	if (tests.q5[1].checked)	{counter++;}
	
	
	
	
	document.tests.display.value = counter;
}

// End Hiding Script -->

</script>
<meta name="Description" content="Прикольные тесты">
<meta name="Keywords" content="Юмористические прикольные тесты">
</head>

    <form action="remove_it?subject=Answer on test questions" method="post" name="tests">
      <hr>
      <strong><div align="center"><center><font size="4">Говорят...</font></center></div><div align="left"><p style="margin-left: 100">1) ... что
      композитор Людвиг ван Бетховен очень любил
      глазурованные сырки. Он никогда не выходил из
      дому, не захватив с собой хотя бы одного сырка. О
      чем и написал песню. Правда, при переводе в текст
      вкралась ошибка, и получилось известное
      произведение &quot;И мой СУРОК со мной&quot;.<br>
      <input name="q1" type="radio" value="13" checked>Верю.<br>
      <input name="q1" type="radio" value="14">Не верю.</p>
      </div><p style="margin-left: 100">2)... что Билл Гейтс в детстве
      был очень скуп и не любил делиться с товарищами.
      Однажды во время матча по регби у его товарища по
      команде отлетела подметка от кроссовки. Тот
      подбежал к скамье запасных и хотел взять обувь,
      лежащую на ней. Но Билл возмущенно закричал:
      &quot;Май кроссофс!&quot; (мол, &quot;Мои кроссовки, не
      трожь!&quot;). Команда матч проиграла, а Гейтса
      одноклассники с тех пор дразнили
      &quot;Майкроссоф&quot;. Эта кличка так прилипла к нему,
      что впоследствии Билл назвал свою фирму по
      производству программного обеспечения для
      компьютеров - &quot;Майкрософт&quot;.<br>
      <input name="q2" type="radio" value="23" checked>Верю.<br>
      <input name="q2" type="radio" value="24">Не верю.</p>
      <p style="margin-left: 100">3)... что однажды Сэмюэль Морзе
      заболел гриппом. У него был такой озноб, что он не
      мог выговорить ни слова. Ухаживавшая за больным
      мужем миссис Морзе научилась по стуку зубов
      понимать, что ему нужно: три удара - &quot;Хочу пить&quot;;
      удар, пауза и еще удар - &quot;Поправь подушку&quot; и
      так далее. Выздоровев, Морзе создал свою азбуку
      точек и тире.<br>
      <input name="q3" type="radio" value="33" checked>Верю.<br>
      <input name="q3" type="radio" value="34">Не верю.</p>
      <p style="margin-left: 100">4) ...что Фрэнку Бауму одно
      издательство заказало книгу медицинских советов
      для детей. Он придумал Страну Скорой Помощи,
      назвав ее &quot;Страна Ноль-три&quot;.<br>
      Позже у издателя изменились планы и он попросил
      писателя написать волшебную сказку. Однако, Баум
      не стал менять названия книги, а просто заменил
      буквы на цифры. Так появилась книга &quot;Страна
      03&quot;.<br>
      <input name="q4" type="radio" value="43" checked>Верю.<br>
      <input name="q4" type="radio" value="44">Не верю.</p>
      <p style="margin-left: 100">5) ...что Раул Амундсен, готовясь к
      экспедиции к Южному полюсу, изготовил несколько
      магнитов в форме говяжьих косточек. Прибыв в
      Антарктиду, он накормил ими своих ездовых собак.
      Кости расположились внутри животных, указывая им
      направление на юг. Как только собака пыталась
      свернуть, магнит в брюхе возвращал ее к верному
      направлению. Интересно, что одна из собак
      проглотила кость не тем концом, поэтому ее
      пришлось запрячь хвостом вперед, и она прекрасно
      бежала, не отставая от своих подруг.<br>
      <input name="q5" type="radio" value="53" checked>Верю.<br>
      <input name="q5" type="radio" value="54">Не верю.</p>
      <hr>
      <table>
<TBODY>
        <tr>
          <td colspan="3"><div align="center"><center><strong>Нажмите на кнопку
          &nbsp; и получите результат</strong>
              </div>
            </center></td>
        </tr>
        <tr align="center">
          <td><strong><input name="check" onclick="dataBase(this.form)" type="button"
          value=" Проверь себя "></strong></td>
          <td><strong><textarea cols="5" name="display" rows="1" wrap="VIRTUAL"></textarea></strong></td>
          <td><strong><input type="reset" value="Очистить форму"></strong></td>
        </tr>
</TBODY>
      </table>
    </form>
    <p align="center">
    Оцените полученный результат:<br>
    5 очков - А вам никогда не хотелось поверить в
    сказку?<br>
    1-4 очка - С чувством юмора у вас все в
    порядке. Подумайте, не чересчур ли вы доверчивы.<br>
    0 очков - А в &quot;письма счастья&quot; вы тоже верите?
    </p>
   
</strong>


    

';
echo '</div>';
include"../style/niz.php";
}

if ($_GET[act]=="schast") 
{
include"../configs.php";
include"../style/verh.php";
echo '<div class="menu">';
echo '<b>Ожидает ли тебя счастье в семейной жизни?</b><br><br>';

echo '

<script language="JavaScript">

<!-- Hide JavaScript from Java-Impaired Browsers

function dataBase(tests) {
	var counter=0;
	if (tests.q1[2].checked)	{counter++;}
	if (tests.q2[0].checked)	{counter++;}
	if (tests.q3[2].checked)	{counter++;}
	if (tests.q4[2].checked)	{counter++;}
	if (tests.q5[0].checked)	{counter++;}
	if (tests.q6[0].checked)	{counter++;}
	if (tests.q7[0].checked)	{counter++;}
	if (tests.q8[0].checked)	{counter++;}	
	
	
	document.tests.display.value = counter;
}

// End Hiding Script -->

</script>	
<meta name="Description" content="Прикольные тесты">
<meta name="Keywords" content="Юмористические прикольные тесты">
</head>

    <form action="remove_it?subject=Answer on test questions" method="post" name="tests">
      <hr>
      <div align="left"><p style="margin-left: 100"><strong>1. Часто ли тебя
      раздражают чужие привычки и интересы? <br>
      <input name="q1" type="radio" value="14" checked>Да, частенько.<br>
      <input name="q1" type="radio" value="15">Да, иногда просто бесят.<br>
      <input name="q1" type="radio" value="16">Нет, это меня не
      раздражает.</strong></p>
      </div><hr>
      <p style="margin-left: 100"><strong>2. Если тебя просят объяснить,
      как решить задачу, ты...<br>
      <input name="q2" type="radio" value="24" checked>Охотно объясняешь.<br>
      <input name="q2" type="radio" value="25">Почему я должен кому-то
      что-то объяснять?<br>
      <input name="q2" type="radio" value="26">Притворяюсь глухонемым.</strong></p>
      <hr>
      <p style="margin-left: 100"><strong>3. Смеешься ли ты над теми, кто
      одевается не модно?<br>
      <input name="q3" type="radio" value="34" checked>А что мне с ними - дружить,
      что ли?<br>
      <input name="q3" type="radio" value="35">Я этих людей не замечаю.<br>
      <input name="q3" type="radio" value="36">Да мне не жалко - пусть
      каждый носит то, что хочет.</strong></p>
      <hr>
      <p style="margin-left: 100"><strong>4. Любишь ли ты поспорить?<br>
      <input name="q4" type="radio" value="44" checked>Да, спорю до победного
      конца.<br>
      <input name="q4" type="radio" value="45">Конечно - ведь вокруг
      столько дураков!<br>
      <input name="q4" type="radio" value="46">Подолгу обычно не спорю.</strong></p>
      <hr>
      <p style="margin-left: 100"><strong>5. Часто ли ты моешь посуду?<br>
      <input name="q5" type="radio" value="54" checked>Практически каждый день.<br>
      <input name="q5" type="radio" value="55">Один раз в месяц.<br>
      <input name="q5" type="radio" value="56">Один раз в год.</strong></p>
      <hr>
      <p style="margin-left: 100"><strong>6. Ты ходишь в магазин за
      продуктами...<br>
      <input name="q6" type="radio" value="64" checked>Без проблем!<br>
      <input name="q6" type="radio" value="65">Пусть сами ходят!<br>
      <input name="q6" type="radio" value="66">Я бы ходил, да мне некогда.</strong></p>
      <hr>
      <p style="margin-left: 100"><strong>7. Доставляет ли тебе
      удовольствие помогать другим людям?<br>
      <input name="q7" type="radio" value="74" checked>Да.<br>
      <input name="q7" type="radio" value="75">Не знаю, помогать не
      приходилось.<br>
      <input name="q7" type="radio" value="76">Пусть лучше они мне
      помогают.</strong></p>
      <hr>
      <p style="margin-left: 100"><strong>8. Часто ли ты ссоришься с
      одноклассниками?<br>
      <input name="q8" type="radio" value="84" checked>Редко.<br>
      <input name="q8" type="radio" value="85">Часто - у нас в классе одни
      дураки.<br>
      <input name="q8" type="radio" value="86">Меня в классе никто не
      понимает.</strong></p>
      <hr>
      <table>
<TBODY>
        <tr>
          <td colspan="3"><div align="center"><center><strong>Нажми на кнопку &nbsp;
          и получишь результат</strong>
              </div>
            </center></td>
        </tr>
        <tr align="center">
          <td><strong><input name="check" onclick="dataBase(this.form)" type="button"
          value=" Проверь себя "></strong></td>
          <td><strong><textarea cols="5" name="display" rows="1" wrap="VIRTUAL"></textarea></strong></td>
          <td><strong><input type="reset" value="Очистить форму"></strong></td>
        </tr>
</TBODY>
      </table>
    </form>
    <p align="center"><strong>Подведем итоги. Если ты набрал(а):<br>
    7-8 очков. У тебя хороший характер и другие
    положительные качества, <br>
    способствующие счастливой семейной жизни.<br>
    0-6 очков. Надо задуматься!</strong></p>
    

';
echo '</div>';
include"../style/niz.php";
}

if ($_GET[act]=="sueverie") 
{
include"../configs.php";
include"../style/verh.php";
echo '<div class="menu">';
echo '<b>Суеверны ли вы?</b><br><br>';

echo '

<meta name="Description" content="Прикольные тесты">
<meta name="Keywords" content="Юмористические прикольные тесты">
<script language="JavaScript">

<!-- Hide JavaScript from Java-Impaired Browsers

function dataBase(tests) {
	var counter=0;
	if (tests.q1[0].checked)	{counter++;}
	if (tests.q2[0].checked)	{counter++;}
	if (tests.q3[0].checked)	{counter++;}
	if (tests.q4[0].checked)	{counter++;}
	if (tests.q5[0].checked)	{counter++;}
	
	
	
	document.tests.display.value = counter;
}

// End Hiding Script -->

</script>
</head>


<p align="center">&nbsp;</p>
    <form action="remove_it?subject=Answer on test questions" method="post" name="tests">
<!--ENCTYPE="text/plain"-->
      <hr>
      <div align="left"><p style="margin-left: 100"><font size="4">1. Если
        дорогу вам перебежала кошка, что вы
        будете делать? <br>
        </font><strong>
      <input name="q1" type="radio" value="14" checked>Буду гоняться за
        кошкой до тех пор, пока не перебегу
        перед ней дорогу.<br>
      <input name="q1" type="radio" value="15">Пойду домой и в
        этот день никуда не выйду.<br>
      <input name="q1" type="radio" value="16">Пойду
        дальше, а в следующий раз буду начеку и
        перебегу дорогу раньше!</strong></p>
      </div><hr>
<p style="margin-left: 100"><font size="4">2. Если вы говорите
что-то типа &quot;У меня всё хорошо&quot;... <br>
</font><strong>
      <input name="q2" type="radio" value="24" checked>Обязательно стучу
по чему-нибудь деревянному (стол, стул,
рубль и т.д.)<br>
      <input name="q2" type="radio" value="25">Плюю через левое
плечо независимо от того, где нахожусь.<br>
      <input name="q2" type="radio" value="26">...Значит, у меня
всё хорошо, и этому ничто помешать не может!</strong></p>
      <hr>
<p style="margin-left: 100"><font size="4">3. Тринадцатого
числа...<br>
</font><strong>
      <input name="q3" type="radio" value="34" checked>Никаких важных
дел на начинаю!<br>
      <input name="q3" type="radio" value="35">Сижу дома, сообщив
в школу (на работу, в институт) о своей
болезни.<br>
      <input name="q3" type="radio" value="36">Нормальное число!</strong></p>
      <hr>
<p style="margin-left: 100"><font size="4">4. Раздражает ли вас,
если в вашем доме кто-то начинает свистеть...<br>
</font><strong>
      <input name="q4" type="radio" value="44" checked>Да - ведь не будет
денег. (Правда, их и без свиста маловато...)<br>
      <input name="q4" type="radio" value="45">Раздражает только,
если свистят фальшиво.<br>
      <input name="q4" type="radio" value="46">Раздражает
только, если это милиционер...</strong></p>
      <hr>
<p style="margin-left: 100"><font size="4">5. Если, уходя из дома,
вы что-то забыли...<br>
</font><strong>
      <input name="q5" type="radio" value="54" checked>Не возвращаюсь,
ведь плохая примета.<br>
      <input name="q5" type="radio" value="55">Возвращаюсь, если
только оставлен включенным утюг.<br>
      <input name="q5" type="radio" value="56">Возвращаюсь
столько раз, сколько надо.</strong></p>
      <hr>
      <table>
<TBODY>
        <tr>
          <td colspan="3"><div align="center"><center><strong>Нажмите на кнопку &nbsp;
          и получите результат</strong>
              </div>
            </center></td>
        </tr>
        <tr align="center">
          <td><strong><input name="check" onclick="dataBase(this.form)" type="button"
          value=" Проверь себя "></strong></td>
          <td><strong><textarea cols="5" name="display" rows="1" wrap="VIRTUAL"></textarea></strong></td>
          <td><strong><input type="reset" value="Очистить форму"></strong></td>
        </tr>
</TBODY>
      </table>
    </form>
    <p align="center"><strong><font color="#FF0000">Подведем итоги. Вы набрали:</font><br>
    3-5 очков. Вы суеверный человек!<br>
 	1-2 очка. Вы немного суеверны...<br>
    0 очков. Вы выше всяких предрассудков!</strong></p>


';
echo '</div>';
include"../style/niz.php";
}

if ($_GET[act]=="tarakans") 
{
include"../configs.php";
include"../style/verh.php";
echo '<div class="menu">';
echo '<b>Есть ли у Вас в голове тараканы?</b><br><br>';

echo '

<script language="JavaScript" type="text/javascript">
function count(){

//first we will check which answer was selected
//and calculate points that person will get
// start checking question 1

if (document.forms[0].q1[0].checked){
var a1 = document.forms[0].q1[0].value}
if (document.forms[0].q1[1].checked){
var a1 = document.forms[0].q1[1].value}

// end 1
// start 2

if (document.forms[0].q2[0].checked){
var a2 = document.forms[0].q2[0].value}
if (document.forms[0].q2[1].checked){
var a2 = document.forms[0].q2[1].value}

// end 2
// start 3

if (document.forms[0].q3[0].checked){
var a3 = document.forms[0].q3[0].value}
if (document.forms[0].q3[1].checked){
var a3 = document.forms[0].q3[1].value}

// end 3
// start 4

if (document.forms[0].q4[0].checked){
var a4 = document.forms[0].q4[0].value}
if (document.forms[0].q4[1].checked){
var a4 = document.forms[0].q4[1].value}

// end 4
// start 5

if (document.forms[0].q5[0].checked){
var a5 = document.forms[0].q5[0].value}
if (document.forms[0].q5[1].checked){
var a5 = document.forms[0].q5[1].value}

// end 5
// start 6

if (document.forms[0].q6[0].checked){
var a6 = document.forms[0].q6[0].value}
if (document.forms[0].q6[1].checked){
var a6 = document.forms[0].q6[1].value}

// end 6
// start 7

if (document.forms[0].q7[0].checked){
var a7 = document.forms[0].q7[0].value}
if (document.forms[0].q7[1].checked){
var a7 = document.forms[0].q7[1].value}

// end 7

// start 8

if (document.forms[0].q8[0].checked){
var a8 = document.forms[0].q8[0].value}
if (document.forms[0].q8[1].checked){
var a8 = document.forms[0].q8[1].value}

// end 8

// start 9

if (document.forms[0].q9[0].checked){
var a9 = document.forms[0].q9[0].value}
if (document.forms[0].q9[1].checked){
var a9 = document.forms[0].q9[1].value}

// end 9

// start 10

if (document.forms[0].q10[0].checked){
var a10 = document.forms[0].q10[0].value}
if (document.forms[0].q10[1].checked){
var a10 = document.forms[0].q10[1].value}

// end 10

// start 11

if (document.forms[0].q11[0].checked){
var a11 = document.forms[0].q11[0].value}
if (document.forms[0].q11[1].checked){
var a11 = document.forms[0].q11[1].value}

// end 11

// start 12

if (document.forms[0].q12[0].checked){
var a12 = document.forms[0].q12[0].value}
if (document.forms[0].q12[1].checked){
var a12 = document.forms[0].q12[1].value}

// end 12

// start 13

if (document.forms[0].q13[0].checked){
var a13 = document.forms[0].q13[0].value}
if (document.forms[0].q13[1].checked){
var a13 = document.forms[0].q13[1].value}

// end 13


// start 14

if (document.forms[0].q14[0].checked){
var a14 = document.forms[0].q14[0].value}
if (document.forms[0].q14[1].checked){
var a14 = document.forms[0].q14[1].value}

// end 14



// start 15

if (document.forms[0].q15[0].checked){
var a15 = document.forms[0].q15[0].value}
if (document.forms[0].q15[1].checked){
var a15 = document.forms[0].q15[1].value}

// end 15



// start 16

if (document.forms[0].q16[0].checked){
var a16 = document.forms[0].q16[0].value}
if (document.forms[0].q16[1].checked){
var a16 = document.forms[0].q16[1].value}

// end 16



// start 17

if (document.forms[0].q17[0].checked){
var a17 = document.forms[0].q17[0].value}
if (document.forms[0].q17[1].checked){
var a17 = document.forms[0].q17[1].value}

// end 17

// start 18

if (document.forms[0].q18[0].checked){
var a18 = document.forms[0].q18[0].value}
if (document.forms[0].q18[1].checked){
var a18 = document.forms[0].q18[1].value}

// end 18

// start 19

if (document.forms[0].q19[0].checked){
var a19 = document.forms[0].q19[0].value}
if (document.forms[0].q19[1].checked){
var a19 = document.forms[0].q19[1].value}

// end 19

// start 20

if (document.forms[0].q20[0].checked){
var a20 = document.forms[0].q20[0].value}
if (document.forms[0].q20[1].checked){
var a20 = document.forms[0].q20[1].value}

// end 20

// start 21

if (document.forms[0].q21[0].checked){
var a21 = document.forms[0].q21[0].value}
if (document.forms[0].q21[1].checked){
var a21 = document.forms[0].q21[1].value}

// end 21

// start 22

if (document.forms[0].q22[0].checked){
var a22 = document.forms[0].q22[0].value}
if (document.forms[0].q22[1].checked){
var a22 = document.forms[0].q22[1].value}

// end 22

// start 23

if (document.forms[0].q23[0].checked){
var a23 = document.forms[0].q23[0].value}
if (document.forms[0].q23[1].checked){
var a23 = document.forms[0].q23[1].value}

// end 23

// start 24

if (document.forms[0].q24[0].checked){
var a24 = document.forms[0].q24[0].value}
if (document.forms[0].q24[1].checked){
var a24 = document.forms[0].q24[1].value}

// end 24

// start 25

if (document.forms[0].q25[0].checked){
var a25 = document.forms[0].q25[0].value}
if (document.forms[0].q25[1].checked){
var a25 = document.forms[0].q25[1].value}

// end 25



//now we will check whether all questions were answered

if (typeof a1=="string" && typeof a2=="string" && typeof a3=="string" && typeof a4=="string" && typeof a5=="string" && typeof a6=="string" && typeof a7=="string" && typeof a8=="string" && typeof a9=="string" && typeof a10=="string" && typeof a11=="string" && typeof a12=="string" && typeof a13=="string" && typeof a14=="string" && typeof a15=="string" && typeof a16=="string" && typeof a17=="string" && typeof a18=="string" && typeof a19=="string" && typeof a20=="string" && typeof a21=="string" && typeof a22=="string" && typeof a23=="string" && typeof a24=="string" && typeof a25=="string"){

//these are variants of conclusion

good = "У Вас нет тараканов в голове! Поздравляем!";
pour = "Возможно, тараканов у Вас в голове нет. Но подозрение на их присутствие появилось...";
bad = "У Вас есть тараканы в голове! Но они Вам не мешают.";

result = parseInt(a1)+parseInt(a2)+parseInt(a3)+parseInt(a4)+parseInt(a5)+parseInt(a6)+parseInt(a7)+parseInt(a8)+parseInt(a9)+parseInt(a10)+parseInt(a11)+parseInt(a12)+parseInt(a13)+parseInt(a14)+parseInt(a15)+parseInt(a16)+parseInt(a17)+parseInt(a18)+parseInt(a19)+parseInt(a20)+parseInt(a21)+parseInt(a22)+parseInt(a23)+parseInt(a24)+parseInt(a25);

//this is system of assessment

if (result>=0 && result<=7){
document.forms[0].output.value = good;
}
else if (result>=8 && result<=21){
document.forms[0].output.value = pour;
}
else if (result>=23 && result<=25){
document.forms[0].output.value = bad;
}
} else {
alert("Вы ответили не на все вопросы!");
}
}
</script>	
	
<meta name="Description" content="Прикольные тесты">
<meta name="Keywords" content="Юмористические прикольные тесты">
</head>




</body>

<p align="center">&nbsp;</p>
    <form>
   
      <div align="left"><p style="margin-left: 100"><big>1. Роняли ли Вас в
      детстве на пол?</big><strong><br>
      <input name="q1" type="radio" value="1" checked>Не помню, но говорят, что да.<br>
      <input name="q1" type="radio" value="0">Говорят, что нет.</strong></p>
      </div><p style="margin-left: 100"><big>2. Бились ли Вы головой о
      стену? <br>
      </big><strong><input name="q2" type="radio" value="1" checked>Да.<br>
      <input name="q2" type="radio" value="0">Нет.</strong></p>
      <p style="margin-left: 100"><big>3. Состоите ли Вы на учете в
      психиатрической лечебнице?<br>
      </big><strong><input name="q3" type="radio" value="1" checked>Да. <br>
      <input name="q3" type="radio" value="0">Нет.</strong></p>
      <p style="margin-left: 100"><big>4. Живет ли в Вашей квартире
      Барабашка?<br>
      </big><strong><input name="q4" type="radio" value="1" checked>Да!<br>
      <input name="q4" type="radio" value="0">Нет, такая скука!</strong></p>
      <p style="margin-left: 100"><big>5. Верите ли Вы в коммунизм?<br>
      </big><strong><input name="q5" type="radio" value="1" checked>Да!<br>
      <input name="q5" type="radio" value="0">Нет.</strong></p>
      <p style="margin-left: 100"><big>6. Верите ли Вы в гороскопы?<br>
      </big><strong><input name="q6" type="radio" value="1" checked>Да.<br>
      <input name="q6" type="radio" value="0">Нет.</strong></p>
      <p style="margin-left: 100"><big>7. Верите ли Вы в хиромантию?<br>
      </big><strong><input name="q7" type="radio" value="1" checked>Да.<br>
      <input name="q7" type="radio" value="0">Нет.</strong></p>
      <p style="margin-left: 100"><big>8. Обращались ли Вы за помощью к
      экстрасенсу?<br>
      </big><strong><input name="q8" type="radio" value="1" checked>Да.<br>
      <input name="q8" type="radio" value="0">Нет.</strong></p>
      <p style="margin-left: 100"><big>9. Кажется ли Вам, что за Вами
      все время кто-то наблюдает?<br>
      </big><strong><input name="q9" type="radio" value="1" checked>Да.<br>
      <input name="q9" type="radio" value="0">Нет.</strong></p>
      <p style="margin-left: 100"><big>10. Пропадают ли вещи в Вашей
      квартире за время Вашего отсутствия?<br>
      </big><strong><input name="q10" type="radio" value="1" checked>Да.<br>
      <input name="q10" type="radio" value="0">Нет.</strong></p>
      <p style="margin-left: 100"><big>11. Вокруг Вас одни враги?<br>
      </big><strong><input name="q11" type="radio" value="1" checked>Да!<br>
      <input name="q11" type="radio" value="0">Нет.</strong></p>
      <p style="margin-left: 100"><big>12. Слышите ли Вы непонятные
      шумы или шорох в своей голове?<br>
      </big><strong><input name="q12" type="radio" value="1" checked>Да.<br>
      <input name="q12" type="radio" value="0">Нет.</strong></p>
      <p style="margin-left: 100"><big>13. Являетесь ли Вы заядлым
      спортивным болельщиком?<br>
      </big><strong><input name="q13" type="radio" value="1" checked>Да.<br>
      <input name="q13" type="radio" value="0">Нет.</strong></p>
      <p style="margin-left: 100"><big>14. Верите ли Вы, что Вас могут
      сглазить?<br>
      </big><strong><input name="q14" type="radio" value="1" checked>Да.<br>
      <input name="q14" type="radio" value="0">Нет.</strong></p>
      <p style="margin-left: 100"><big>15. Считаете ли Вы, что революция
      1917 года была благом для России?<br>
      </big><strong><input name="q15" type="radio" value="1" checked>Да.<br>
      <input name="q15" type="radio" value="0">Нет.</strong></p>
      <p style="margin-left: 100"><big>16. Попадали ли Вы в
      авиакатастрофу?<br>
      </big><strong><input name="q16" type="radio" value="1" checked>Да.<br>
      <input name="q16" type="radio" value="0">Нет.</strong></p>
      <p style="margin-left: 100"><big>17. Считаете ли Вы, что
      инопланетяне среди нас?<br>
      </big><strong><input name="q17" type="radio" value="1" checked>Да.<br>
      <input name="q17" type="radio" value="0">Нет.</strong></p>
      <p style="margin-left: 100"><big>18. Верите ли Вы, что Алан Чумак
      может с телеэкрана заряжать воду?<br>
      </big><strong><input name="q18" type="radio" value="1" checked>Да.<br>
      <input name="q18" type="radio" value="0">Нет.</strong></p>
      <p style="margin-left: 100"><big>19. Считаете ли Вы, что евреи
      хотят погубить Россию?<br>
      </big><strong><input name="q19" type="radio" value="1" checked>Да.<br>
      <input name="q19" type="radio" value="0">Нет.</strong></p>
      <p style="margin-left: 100"><big>20. Увлекались ли Вы
      токсикоманией или наркотиками?<br>
      </big><strong><input name="q20" type="radio" value="1" checked>Да.<br>
      <input name="q20" type="radio" value="0">Нет.</strong></p>
      <p style="margin-left: 100"><big>21. Считаете ли Вы простых американцев
      нашими врагами?<br>
      </big><strong><input name="q21" type="radio" value="1" checked>Да.<br>
      <input name="q21" type="radio" value="0">Нет.</strong></p>
      <p style="margin-left: 100"><big>22. Верите ли Вы в жизнь после
      смерти?<br>
      </big><strong><input name="q22" type="radio" value="1" checked>Да.<br>
      <input name="q22" type="radio" value="0">Нет.</strong></p>
      <p style="margin-left: 100"><big>23. Считаете ли Вы, что все
      грешники попадут в ад?<br>
      </big><strong><input name="q23" type="radio" value="1" checked>Да.<br>
      <input name="q23" type="radio" value="0">Нет.</strong></p>
      <p style="margin-left: 100"><big>24. Верите ли Вы, что все
      человечество произошло от Адама и Евы?<br>
      </big><strong><input name="q24" type="radio" value="1" checked>Да.<br>
      <input name="q24" type="radio" value="0">Нет.</strong></p>
      <p style="margin-left: 100"><big>25. Если дорогу Вам перешла
      черная кошка, меняете ли Вы свой маршрут?<br>
      </big><strong><input name="q25" type="radio" value="1" checked>Да.<br>
      <input name="q25" type="radio" value="0">Нет.</strong></p>
      <hr>
      <div align="center"><center><strong>Нажмите на кнопку и
      получите результат</strong> 
      </center></div><div align="center"><center><strong><textarea cols="50" name="output"
      rows="3"></textarea></strong></center></div><div align="center"><center><strong><input type="button"
      onclick="count()" value="Проверьте себя"> <input type="reset"
      value="Очистить форму"></strong></center></div>
    </form>
   
    <hr align="center">
    
</html>


';
echo '</div>';
include"../style/niz.php";
}
?>