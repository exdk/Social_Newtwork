<?php
if($_GET['r']=='')
{
include"../configs.php";
include"../style/verh.php";
echo "<div class='bordur'>Всё об ICQ и даже больше</div>";
echo "<div class='menu'>
&#187; <a href='?r=what'>Что такое ICQ?</a><br>
&#187; <a href='?r=inviz'>Что такое номер невидимка?</a><br>
&#187; <a href='?r=bez'>Защита ICQ</a><br>
&#187; <a href='?r=serv'>Сервера ICQ</a><br>
&#187; <a href='?r=bot'>Сервисы в  ICQ</a><br>
&#187; <a href='?r=disconnect'>Disconnect(если не соединяется...)</a><br>
&#187; <a href='?r=oshibka'>Ошибки ICQ</a><br>
&#187; <a href='?r=search'>Поиск в ICQ</a><br>
<a href='index.php'>В сервисы</a><br/></div>";
include"../style/niz.php";
}


if($_GET['r']=='what')
{
include"../configs.php";
include"../style/verh.php";
echo "<div class='bordur'>Что такое ICQ?</div>";
echo "<div class='menu'>
ICQ - 'I Seek You'. Система мгновенной передачи информации в виде сообщений через интернет, позволяющая двум собеседникам общаться фактически в режиме реального времени как при обычном разговоре. Сообщения передаются путем набора на клавиатуре компьютера, смартфона, телефона. Через ICQ могут общаться два участника сети ICQ независимо в каких странах они находятся.<br>
<a href='icq.php'>Всё об ICQ</a></div>";
include"../style/niz.php";
}

if($_GET['r']=='inviz')
{
include"../configs.php";
include"../style/verh.php";
echo "<div class='bordur'>Что такое номер невидимка?</div>";
echo "<div class='menu'>
Невидимка или invisible обычно обозначает то что такой номер не привязан к Primary email, то есть не имеет хозяина номера, так как владелец primary email – является настоящим владельцем icq номера. Таким статусом обладают номера, которые гарантированно не использовались ни кем более шести лет. Первый же введенный email-адрес в анкету станет Primary, и с его помощью можно задать вопросы и ответы для восстановления пароля icq номера. Чтобы такой номер появился в поиске и в каталогах ICQ, достаточно просто заполнить одно любое поле из своей анкеты – но таким образом номер перестанет быть невидимкой.<br>
<a href='icq.php'>Всё об ICQ</a></div>";
include"../style/niz.php";
}


if($_GET['r']=='bez')
{
include"../configs.php";
include"../style/verh.php";
echo "<div class='bordur'>Защита ICQ</div>";
echo "<div class='menu'>
*Не ставить простой пароль.
Ни в коем случае нельзя ставить пароли короче 4 символов, простые пароли вида 123456, а также пароли, имеющие смысловое значение: password, icqpass, myuin, masha, windows и т.п. Пароль должен быть достаточно сложным, чтобы исключить возможность его подбора и при этом таким, чтобы вы могли его вспомнить и через пару лет. Очень удобно ставить в качестве пароля кличку своей собаки или кота. Например у моего кота кличка D5ju673mXcQ94... Очень легко запоминается. Не правда ли? )))<br>
*Не сохранять пароль в ICQ-клиенте и не использовать официальные клиенты младше ICQ Lite.
Наиболее популярная ошибка. Здесь есть один очень важный момент: некоторые ICQ-клиенты (например, все официальные клиенты версий младше ICQ Lite) физически в любом случае сохраняют пароль, даже если галочку Сохранить пароль вы не ставили. Проверить это можно специальной утилитой (программа только показывает пароли и ничего никуда не отправляет). Чаще других к нам обращаются именно люди, которые уже ни один год использовали, к примеру, ICQ 2003а, абсолютно уверенные, что пароль они не сохраняли (ведь коварную галочку они никогда не ставили). И вот в однажды угораздило же их поймать к себе на компьютер троянского коня, который тут же достал 'не сохранённый' пароль и отправил его злоумышленникам.<br>
*Не кликать ни по каким ссылкам, присылаемым вам через ICQ или е-мейл незнакомыми или малознакомыми людьми.
Это одно из основных правил безопасной работы в Сети, но некоторым людям почему-то часто кажется, что их ICQ-знакомый, с которым они уже целых два дня интересно общаются, не может прислать им ссылку на вирус (или страницу, заражённую с вирусом). Люди, будьте бдительны!
*Не использовать свой номер ICQ в интернет-кафе, клубах и т.п. заведениях.
В любой локальной сети, имеющей выход в интернет может быть установлена программа, которая ловит все пароли от ICQ. Это может быть как легально установленная программа, результаты работы которой никто не будет использовать с целью украсть ваш номер, так и троянский конь, пойманный неопытным администратором.<br><
<a href='icq.php'>Всё об ICQ</a></div>";
include"../style/niz.php";
}


if($_GET['r']=='serv')
{
include"../configs.php";
include"../style/verh.php";
echo "<div class='bordur'>Сервера ICQ</div>";
echo "<div class='menu'>
При возникновение затруднения при подключение jimm, могут помочь так называемые альтернативные сервера. Альтернативные серверы ICQ можно ввести в настройки сети в пункт имя сервера. ICQ сервера могут быть как виде адреса так и в виде IP. Использование серверов в виде IP адресов должно помогать лучше, так как при подключении - телефон не будет дополнительно обращаться к dns-серверам. С другой стороны, большинство ICQ-серверов в виде адреса обладают плавающими IP адресами для распределения нагрузки на сервер. Некоторые icq клиенты могут перебирать список серверов самостоятельно. Вот небольшой список альтернативных серверов icq:<br>
-login.oscar.aol.com<br>
-ibucp-vip-d.blue.aol.com<br>
-ibucp-vip-m.blue.aol.com<br>
-ibucp2-vip-m.blue.aol.com<br>
-bucp-m08.blue.aol.com<br>
-icq.mirabilis.com<br>
-icq0.mirabilis.com<br>
-icq1.mirabilis.com<br>
-icq2.mirabilis.com<br>
-icq3.mirabilis.com<br>
-icq4.mirabilis.com<br>
-icq5.mirabilis.com<br>
-64.12.161.153 порт 5201, 5101, 5190<br>
-64.12.161.185<br>
-64.12.200.89 порт 5201, 5101, 5190.<br>
-205.188.153.97<br>
-205.188.153.98<br>
-205.188.153.121 порт 5201, 5101, 5190 <br >
-205.188.179.233<br>
-205.188.252.24 <br>
-205.188.252.27<br>
-205.188.252.21<br>
-205.188.254.5 <br>
-205.188.252.33<br>
-205.188.252.22<br>
-205.188.252.31<br>
-205.188.254.3 <br>
-205.188.254.11<br>
-205.188.252.30<br>
-205.188.252.18<br>
-205.188.254.10<br>
-205.188.254.1<br>
-205.188.252.19<br>
-205.188.252.28<br>
Ко всем серверам можно подключиться через любой порт, то есть от 1 до 65 536 стоит заметить что некоторые операторы могут накладывать запрет на использование некоторых портов.<br><
<a href='icq.php'>Всё об ICQ</a></div>";
include"../style/niz.php";
}


if($_GET['r']=='bot')
{
include"../configs.php";
include"../style/verh.php";
echo "<div class='bordur'>Сервисы в ICQ</div>";
echo "<div class='menu'>
БОТ это программа сделанные по принципу автоответчика. Отправив БОТу любой символ или сообщение вы активируете его и получите список команд для управления им. Не все из этих сервисов работают стабильно или работают время от времени. Проверить это можно послав БОТу любое сообщение. К сожалению не все БОТы оптимизированы под stICQ (в частности БОТ 'поисковик') при получении ДЛИННОГО сообщения бывает что 'выкидывает' из stICQ  В настоящий момент создателями этих программ ведется работы по адаптации этих программ под смартфоны.<br>
335297520 -Анекдоты<br>
252110179 -Анекдоты<br>
319550804 -Анекдоты<br>
236615421 -Анекдоты<br>
8666668 -Переводчик<br>
566899 -Информационный бот. (всегда в инвизибле)<br>
100935 -Поисковик<br>
100934 -Игра<br>
307268648 -Стихобот<br>
232751971 -СМСБот<br>
340783220 -СМСБот2<br>
273659333 -СМСБот3<br>
167510139 -Переводчик слов<br>
243969254 -ЧатБот<br>
312579544 -ЧатБот<br>
302396848 -ЧатБот<br>
232874423 -ЧатБот<br>
<a href='icq.php'>Всё об ICQ</a></div>";
include"../style/niz.php";
}


if($_GET['r']=='disconnect')
{
include"../configs.php";
include"../style/verh.php";
echo "<div class='bordur'>Если не соединяется....</div>";
echo "<div class='menu'>
Итак... У вас есть сматфон, Smaper, QIP, Jimm, AM, IM+ или какая нибудь другая программа для Вашего ICQ-общения, но у вас нет СОЕДИНЕНИЯ? :( Ваши попытки соединить тщетны? :( Вы пытаетесь поставить альтернативный IP адрес и у Вас ничего не выходит? Тогда Вам необходимо поставить в Ваш СМАРТФОН эту программу Поясню для чего она и как работает. Аська как правило не конектит при когда стоит фаервол , который блокирует адрес login.icq.com и/или порт 5190. Чтобы его обойти надо поменять в настройках ip login.icq.com и заменить порт. Для подбора ip устанавливаем выше изложенную программу , которая автоматически подберет наилучший ip для для соединения с сервером аськи . Открываем ее (программу) жмем ping , в открывшимся поле, удаляем появившийся www-адрес разработчика, пишем в нем login.icq.com и жмем Ok. После этого прога начинает соединять автоматически , за несколько секунд подбирает рабочий ip для Вашего оператора. Выглядит это примерно так : Reply from 200.153.64.121 : bytes=32 time=721ms TTL=69. Эту процедуру можно повторят несколько раз, и каждый раз программа будет выдавать новый ip который надо будет поставить вместо вашего login.icq.com (в нашем случае это будет 200.153.64.121)<br>
<a href='icq.php'>Всё об ICQ</a></div>";
include"../style/niz.php";
}


if($_GET['r']=='oshibka')
{
include"../configs.php";
include"../style/verh.php";
echo "<div class='bordur'>Ошибки ICQ</div>";
echo "<div class='menu'>
- 100 сервер ICQ не разрешил подключения без каких либо объяснений.<br>
- 111 неверный пароль.<br>
- 112 неверный UIN<br>
- 114 'попытки исчерпаны' если будете слишком часто подключаться к серверу ICQ, он может наложить запрет на подключение в течении 10-20 минут. Повторите попытку позже.<br>
- 116 сообщение отправленное Вам пока Вы были в off'е невозможно обработать и прочитать.<br>
- 118 и 121 не работает GPRS-internet на сотовом. / - 118 так же возможно из за перегрузки сервера ICQ или слабого сигнала<br>
- 120 не настроен GPRS-internet на сотовом, или настроен GPRS-WAP
- 135 1 'пакет отсоединенного канала не обработан' необходимо включить настройку 'безопасный логин', или установить версию Jimm'а не ниже 0.5.1<br>
- 154 может помочь только короткий таймаут пинга.<br>
- 155 ошибка добавления в список, нельзя в один контакт лист добавить пользователей с одинаковым номером UIN<br>
- 160 множественный вход с тем же UIN'ом.<br>
<a href='icq.php'>Всё об ICQ</a></div>";
include"../style/niz.php";
}


if($_GET['r']=='search')
{
include"../configs.php";
include"../style/verh.php";
echo "<div class='bordur'>Для чего нужен поиск в ICQ?</div>";
echo "<div class='menu'>
Я расскажу Вам, как сделать так, чтобы Вас чаще находили через ICQ поиск. Для начала рассмотрим 4 основных фактора, которые влияют на отображение Вашего номера в результатах поискового запроса ICQ.<br>
<br>Основные факторы:<br>
* На поиск в основном влияет то, что Вы напишите в полях: пол, возраст и город. Поэтому их необходимо заполнить в первую очередь. Причем на поиск влияет только 'домашний адрес', поэтому его нужно заполнить правильно (т.е. Москва, а не МАСКВА). Думаю Вы поняли о чем я :)<br>
*Для того чтобы Ваш статус отображался как онлайн в поиске, в ICQ клиенте нужно поставить галочку 'Показывать мой онлайн-статус для web и поиска'. В некоторых случаях желательно отключить авторизацию (хотя это не так критично, но бывает, что и на это реагируют).<br>
*Также чем больше информации о себе Вы напишите, тем больше шанс, что Вы будете видны в поиске. Информация должна быть доброжелательная, желательно чтобы было указано что-то например 'Пишите все! Рады познакомиться!'.<br>
*Вы наверно не раз замечали, что отображаемые в результатах поиска номера начинаются на единицу и состоят меньше чем из 9 цифр. Чем короче Ваш номер, тем больше людей его сможет найти. Например, 5-знаки, если их заполнить данными для поиска будут на первых позициях в поиске.<br>
И напоследок: изменения Вашей информации индексируются сервером ICQ не сразу, а спустя 1 месяц или больше. Бывает, что номер вообще не попадает в поиск, хотя если в вашем городе по поиску человек 15 онлайн, то Вы имеете реальные шансы попасть в поиск, надо только ждать. Конечно, если вписать в поиск свежий ник, который Вы поставили, то поиск, скорее всего, не выдаст его в результатах. Удачи в поисках :)<br><br>
<a href='icq.php'>Всё об ICQ</a></div>";
include"../style/niz.php";
}
?>