<?php

include "vk_api.php";
require "db.php";

const VK_KEY = "***";  /*
*** */ Токен сообщества
const ACCESS_KEY = "***";  // Тот самый ключ из сообщества
const VERSION = "5.89"; // Версия API VK
function gomsg ($msg,$data)
    {
    $request_params = array(
    'message' => $msg,
    'peer_id' => $data->object->peer_id,
    'access_token' => "***",
    'v' => '5.89'
    );
    $get_params = http_build_query($request_params);
    file_get_contents('https://api.vk.com/method/messages.send?'. $get_params);
    }
function idbyname ($textname)
    {
        if (preg_match("/\[id(\d+)|.+\]/",$textname,$mat)){
        return $mat[1];
        }else{
        return false;
    }
    }
$vk = new vk_api(VK_KEY, VERSION); // создание экземпляра класса работы с api, принимает токен и версию api
$data = json_decode(file_get_contents('php://input')); //Получает и декодирует JSON пришедший из ВК
if ($data->type == 'confirmation') { //Если vk запрашивает ключ
    exit(ACCESS_KEY); //Завершаем скрипт отправкой ключа
}
$vk->sendOK(); //Говорим vk, что мы приняли callback

// ====== Переменные ============
$id = $data->object->from_id; // Узнаем ID пользователя, кто написал нам
$message = $data->object->text; // Само сообщение от пользователя
$fwd_message = $data->object->fwd_messages->text;
$peer_id = $data->object->peer_id; // Узнаем ИД беседы 2000000.....
$cmd = mb_strtolower($message, 'utf-8'); // Изменили текст сообщение из БоТ в бот
$chat_id = $peer_id - 2000000000; // id беседы
$userInfo = $vk->request("users.get", ["user_ids" => $id]);
$first_name = $userInfo[0]['first_name'];
$last_name = $userInfo[0]['last_name'];
$user = R::findOne('users','vkid = ?',array($id)); // берем информацию о пользователе который написал боту [с бд]
$vksonny = 123456789 ;
$vkboardid = 182014168;
$imgyst = ['-182014168_457239033'];
$imgstr = ['-182014168_457239034'];
$imgexit = ['-182014168_457239035','-182014168_457239036','-182014168_457239020','-190994720_457239017','-190994720_457239018','-190994720_457239020','-190994720_457239021'];
$rofl = ['***','***','***','***','***','***','***','***','***','***','***','***','***', '***'];
$userssss = array();
// ====== *************** ============


if ($data->type == 'message_new') { // команда /
    if($cmd == 'как выйти из кф'){
        $vk->sendMessage($peer_id,"Приветствую, я Yuma Helper(бот), сейчас помогу тебе выйти с конф.<br>Чтобы выйти с конфы, тебе нужно:");
        sleep(2);
        $vk->request('messages.send', ['peer_id' => $peer_id ,'message' => "1) Нажать на кол-во участников под названием конференции.",'attachment' => "photo{$imgexit[0]}"]);
        sleep(2);
        $vk->request('messages.send', ['peer_id' => $peer_id ,'message' => "2) Пролистай вниз, и найди кнопку выйти из беседы.",'attachment' => "photo{$imgexit[1]}"]);
        sleep(2);
        $vk->request('messages.send', ['peer_id' => $peer_id ,'message' => "3) Вот и все, спасибо за использование бота Yuma Helper 😈",'attachment' => "photo{$imgexit[2]}"]);
    }
}


if ($data->type == 'message_new') { // команда /
    if($cmd == '***'){
        $vk->sendMessage($peer_id,"Зачем вы обзываетесь?");
    }
}

if ($data->type == 'message_new') {
    if($cmd == 'кто капуста?' OR $cmd == 'кто капуста'){
        if($peer_id == 2000000007){
        $vk->request('messages.send', ['peer_id' => $peer_id ,'message' => "@id532470298(Дмитрий) - 🥬",'attachment' => "photo{$imgexit[3]}"]);
        }
    }
}

if ($data->type == 'message_new') {
    if($cmd == 'капуста'  OR $cmd == 'бот, кто капуста?'){
        if($peer_id == 2000000007){
        $vk->request('messages.send', ['peer_id' => $peer_id ,'message' => "Кто-то сказал капуста? @id532470298(Димка) на месте 🥬",'attachment' => "photo{$imgexit[4]}"]);
    }
    }
}
if ($data->type == 'message_new') {
    if($cmd == 'бот спасибо' OR $cmd == 'спасибо бот'){
        $vk->request('messages.send', ['peer_id' => $peer_id ,'message' => "И тебе спасибо, за использование бота:D<br><br>https://donate.qiwi.com/payin/Sonny_Taylor",'attachment' => "photo{$imgexit[5]}"]);
    }
}

if ($data->type == 'message_new') {
    if($cmd == 'где капуста'){
        if($peer_id == 2000000007){
        $vk->request('messages.send', ['peer_id' => $peer_id ,'message' => "Я точно не знаю, но походу @id532470298(капуста 🥬) тут",'attachment' => "photo{$imgexit[6]}"]);
    }
}
}


if (preg_match("/^\/helpers\s(.+)/",$message,$idacc)) {
    if($user->lvl >= 4){
    if($chat_id > 0){ // Если это беседа
        $messa = mb_substr($message ,9);
      $members = $vk->request('messages.getConversationMembers', ['peer_id' => 2000000013]); // Запрос на получение данных о пользователях беседы
      foreach ($members['profiles'] as $useronline) { // При помощи foreach производим работу над данными из пришедшего нам массива
        if(!($useronline['id'] == 297011258) AND !($useronline['id'] == 378605322) AND !($useronline['id'] == 158434822) AND !($useronline['id'] == 500627849)){
          $Onlinelist .= "@id{$useronline['id']} (🐓)"; // Составили текст с онлайн людьми
        }
      }
      $vk->sendMessage(2000000013, "🆘 Внимание 🆘<br><br>$messa<br><br>{$Onlinelist}");
      $vk->sendMessage($peer_id, "Отправил☢");
    }else{ // Если это лс с ботом
      $vk->sendMessage($peer_id, "Команда '/helpers' доступна только в беседах");
    }
}else{$vk->sendMessage($peer_id, "Нет прав");}
}

if (preg_match("/^\/sendgos\s(.+)/",$message,$idacc)) {
    if($peer_id == 2000000021){
    if($user->lvl >= 4){
    if($chat_id > 0){ // Если это беседа
    $messa = mb_substr($message ,9);
    $gos = R::loadAll('leaders',array(28,29,30,31,32,33,34,35,36,37,38,39,40,41,42,43,44));
    foreach($gos as $gas){
        if(!($gas->vkid == 0)){
          $Onlinelist .= "@id{$gas->vkid} (ᅠ)"; // Составили текст с онлайн людьми
        }
      }
      $vk->sendMessage(2000000025, "🗣 Внимание, обращение от @id$id($user->nick) 👤<br><br>$messa<br>{$Onlinelist}");
      $vk->sendMessage($peer_id, "Доставлено✅");
    }else{ // Если это лс с ботом
      $vk->sendMessage($peer_id, "Команда '/sendldgos' доступна только в беседах");
    }
}else{$vk->sendMessage($peer_id, "Нет прав");}
}else{$vk->sendMessage($peer_id, "⛔⛔Используйте только в конфе гос. следящих⛔⛔");}
}

if (preg_match("/^\/sendzams\s(.+)/",$message,$idacc)) {
    if($peer_id == 2000000021){
    if($user->lvl >= 4){
    if($chat_id > 0){ // Если это беседа
    $messa = mb_substr($message ,10);
    $gos = R::loadAll('leaders',array(28,29,30,31,32,33,34,35,36,37,38,39,40,41,42,43,44));
    $goszams = R::findALL('goszams','ORDER BY id DESC');
    foreach($gos as $gas){
        if(!($gas->vkid == 0)){
          $Onlinelist .= "@id{$gas->vkid} (ᅠ)"; // Составили текст с онлайн людьми
        }
      }
    foreach($goszams as $gaszams){
          $Onlinelist1 .= "@id{$gaszams->vkid} (ᅠ)"; // Составили текст с онлайн людьми
      }
      $vk->sendMessage(2000000029, "🗣 Внимание, обращение от @id$id($user->nick) 👤<br>{$Onlinelist}{$Onlinelist1}<br>$messa");
      $vk->sendMessage($peer_id, "Доставлено✅");
    }else{ // Если это лс с ботом
      $vk->sendMessage($peer_id, "Команда '/sendldzams' доступна только в беседах");
    }
}else{$vk->sendMessage($peer_id, "Нет прав");}
}else{$vk->sendMessage($peer_id, "⛔⛔Используйте только в конфе гос. следящих⛔⛔");}
}




if ($data->type == 'message_new') { // команда /бот для проверки онлайна бота
    if ($message == '/set(sex)1') {
        if($user->lvl >= 8){
        $sex = '/sex';
            $komand = R::findOne('commands','cmd = ?',array($sex));
            $komand = R::load('commands',$komand->id);
            $komand->lvl = 1;
            R::store($komand);
            $vk->sendMessage($peer_id, "Развлекайтесь🤪");
        }
        }
    }

if ($data->type == 'message_new') { // команда /бот для проверки онлайна бота
    if ($message == '/updonline') {
        if($user->lvl >= 7){
$gos = R::findAll('onlines','ORDER BY id DESC');
foreach($gos as $gas){
$ch = curl_init("http://yumahelper.ru/updateonline.php?nick=".$gas->nick);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
curl_setopt($ch,CURLOPT_TIMEOUT,3);
$response = curl_exec($ch);
curl_close($ch);
sleep(1);
$vk->sendMessage($peer_id, "$gas->nick<br>$response");
}
$vk->sendMessage($peer_id, "Выполнено");
}else{$vk->sendMessage($peer_id, "Нет прав");}
}
}

if ($data->type == 'message_new') { // команда /бот для проверки онлайна бота
    if ($message == 'тихо') {
        if($user->lvl >= 9){
        for ($i = 1; $i <= 5; $i++) {
    $vk->sendMessage($peer_id, "‼‼‼КОМЕНДАНТСКИЙ ЧАС‼‼‼<br>‼‼‼КОМЕНДАНТСКИЙ ЧАС‼‼‼<br>‼‼‼КОМЕНДАНТСКИЙ ЧАС‼‼‼<br>");
}
}

}
}

if ($data->type == 'message_new') { // команда /бот для проверки онлайна бота
    if ($message == 'жалобы') {
        if($user->lvl >= 9){
        for ($i = 1; $i <= 40; $i++) {
            sleep(1);
    $vk->sendMessage($peer_id, "*boxerrage(Код ошибки #102, флуд в беседах!!)");
}
}

}
}

if ($data->type == 'message_new') { // команда /бот для проверки онлайна бота
    if ($message == 'stopflood') {
        if($user->lvl >= 9){
        for ($i = 1; $i <= 20; $i++) {
            sleep(1);
    $vk->sendMessage(2000000005, "@boxerrage(Код ошибки #102, флуд в беседах!!)");
}
}

}
}

if ($data->type == 'message_new') { // команда /бот для проверки онлайна бота
    if ($message == '/set(sex)0') {
if($user->lvl >= 8){
            $sex = '/sex';
            $komand = R::findOne('commands','cmd = ?',array($sex));
            $komand = R::load('commands',$komand->id);
            $komand->lvl = 0;
            R::store($komand);
            $vk->sendMessage($peer_id, "‼Комендантский час‼");
}
        }
    }
if ($data->type == 'message_new') {
    if($peer_id == 2000000006){
$vk->sendMessage(2000000031, "$first_name $last_name:<br><br>$message");
    }
}


if ($data->type == 'message_new') { // команда /
    if (preg_match("/^\/idacc\s(.+)/",$message,$idacc)) {
        if($user->lvl >= 4){
            if ($idacc[1] !== ''){
            $accidbd = $idacc[1];
            $ch = curl_init("http://yumahelper.ru/idacc.php?nick=".$accidbd);
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
            curl_setopt($ch,CURLOPT_TIMEOUT,1);
            $response = curl_exec($ch);
            curl_close($ch);
            if($response == ''){
                $vk->sendMessage($peer_id, "Игрового аккаунта с ником $accidbd нету🚫");
            }else{
            $vk->sendMessage($peer_id, "Ид аккаунта $accidbd в бд Yuma[9] - $response ✅");
        }
        }else{
            gomsg('/idacc [Nick_Name]',$data);
        }
    }else{
        $vk->sendMessage($peer_id,"Нет прав");
    }
}
}

if ($data->type == 'message_new') { // команда /
    if (preg_match("/^\/online\s(.+)/",$message,$idacc)) {
        if($user->lvl >= 4){
            if ($idacc[1] !== ''){
            $accidbd = $idacc[1];
            $ch = curl_init("http://yumahelper.ru/nickonline.php?nick=".$accidbd);
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
            curl_setopt($ch,CURLOPT_TIMEOUT,3);
            $response = curl_exec($ch);
            curl_close($ch);
            sleep(3);
            if($response == 'Вы не можете посмотреть онлайн у данного игрока'){
                $vk->sendMessage($peer_id, "⛔ $response ⛔");
            }else{
            $vk->sendMessage($peer_id, "Онлайн $accidbd:<br>$response");
        }
        }else{
            gomsg('/online [Nick_Name]',$data);
        }
    }else{
        $vk->sendMessage($peer_id,"Нет прав");
    }
}
}

if ($data->type == 'message_new') { // команда /
    if (preg_match("/^\/ipaccs\s(.+)/",$message,$idacc)) {
        if($user->lvl >= 4){
            if ($idacc[1] !== ''){
            $accidbd = $idacc[1];
            $ch = curl_init("http://yumahelper.ru/ipaccs.php?ipaccs=".$accidbd);
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
            curl_setopt($ch,CURLOPT_TIMEOUT,3);
            $response = curl_exec($ch);
            curl_close($ch);
            sleep(3);
            if($response == ''){
                $vk->sendMessage($peer_id, "⛔Нету аккаунтов на Yuma[9]⛔");
            }else{
            $vk->sendMessage($peer_id, "✅По вашему запросу - [$accidbd] на Yuma[9] нашел:<br><br>$response");
        }
        }else{
            gomsg('/ipacc [ip]',$data);
        }
    }else{
        $vk->sendMessage($peer_id,"Нет прав");
    }
}
}

if ($data->type == 'message_new') { // команда /бот для проверки онлайна бота
     if (preg_match("/^\/onlinegang\s(.+)/",$message,$idacc)) {
        if($user->lvl >= 4){
            if ($idacc[1] !== ''){
            $accidbd = $idacc[1];
            $ch = curl_init("http://yumahelper.ru/fraconline.php?gang=".$accidbd);
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
            curl_setopt($ch,CURLOPT_TIMEOUT,3);
            $response = curl_exec($ch);
            curl_close($ch);
            sleep(3);
            if(!($accidbd == 'ballas' OR $accidbd == 'grove' OR $accidbd == 'vagos' OR $accidbd == 'rifa' OR $accidbd == 'aztec')){
                $vk->sendMessage($peer_id, "$response");
            }else{
            if($accidbd == 'ballas'){$accidbd = 'East Side Ballas';}
            if($accidbd == 'grove'){$accidbd = 'Grove Street Families';}
            if($accidbd == 'vagos'){$accidbd = 'Los Santos Vagos';}
            if($accidbd == 'rifa'){$accidbd = 'The Rifa';}
            if($accidbd == 'aztec'){$accidbd = 'Varrios Los Aztecas';}
            if($response == '0'){
                $vk->sendMessage($peer_id, "Онлайн банды $accidbd: $response игроков");
            }
            if($response == '1'){
                $vk->sendMessage($peer_id, "Онлайн банды $accidbd: $response игрок");
            }
            if($response == '2'){
                $vk->sendMessage($peer_id, "Онлайн банды $accidbd: $response игрока");
            }
            if($response > 2){
                $vk->sendMessage($peer_id, "Онлайн банды $accidbd: $response игроков");
            }
            }
        }
}
}
}


if ($data->type == 'message_new') { // команда /бот для проверки онлайна бота
    if ($message == '/connect') {
        if($user->lvl > 3){
            $ch = curl_init("http://yumahelper.ru/loglogin.php");
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
            curl_setopt($ch,CURLOPT_TIMEOUT,3);
            $response = curl_exec($ch);
            curl_close($ch);
            $vk->sendMessage($peer_id, "Попытался подключиться проверьте командой /idacc Sonny_Taylor, если будет [38] - залогинился.");
        }else{$vk->sendMessage($peer_id, "Нет прав");}
        }
    }
if ($data->type == 'message_new') { // команда /бот для проверки онлайна бота
    if ($message == '/бот') {
            $vk->sendMessage($peer_id, "Привет, бот работает стабильно😎");


        }
    }

if ($data->type == 'message_new') { // команда /help
    if($cmd == '/help'){
        if($user->lvl < 1){
            $vk->sendMessage($peer_id,"
            У вас нету доступа к этой команде, чтобы получить доступ - попросите вас внести в бд у разработчика vk.com/sonnytaylor<br>Напишите сразу свой ник!
            ");//Это в группе
        }
        if($user->lvl == 1){
            $vk->sendMessage($peer_id,"[D:1] $user->nick | $user->position<br><br>/help - помощь по командам<br>/бот - проверка работает бот или нет<br>/info Nick_Name - информация о нике<br>/leaders - информация о лидерах<br>/psj - уйти по c/ж с поста(без возможности вернуться, для замов или лидеров)");//Это в группе
        }
        if($user->lvl == 2){
            $vk->sendMessage($peer_id,"[D:2] $user->nick | $user->position<br><br>/help - помощь по командам<br>/бот - проверка работает бот или нет<br>/info Nick_Name - информация о нике<br>/leaders - информация о лидерах<br>/zams - информация о моих заместителях<br>/addzam [@idvk] - поставить свою 9ку<br>/remzam [@idvk] - снять свою 9ку<br>/psj - уйти по c/ж с поста(без возможности вернуться, для замов или лидеров)");//Это в группе
        }
        if($user->lvl == 3){
            $vk->sendMessage($peer_id,"[D:3] $user->nick | $user->position<br><br>/help - помощь по командам<br>/бот - проверка работает бот или нет<br>/info Nick_Name - информация о нике<br>/leaders - информация о лидерах<br>/addpred [gang] [причина] - запросить выдачу преда лидеру<br>/addvug [gang] [причина] - запросить выдачу выговора лидеру<br>/opra [gang] [nickname] [1-24 hours] [text] - запросить у игрока опру");
        }
        if($user->lvl == 4){
            if($user->type == 'гетто'){
            $vk->sendMessage($peer_id,"[D:5] $user->nick | $user->position<br><br>/help - помощь по команда<br>/бот - проверка работает бот или нет<br>/test - проверка подключения к бд<br>/kick @id причина - кикнуть пользователя<br>/gkick @id причина - кикнуть из кф курилки,забивов<br>/lkick @id причина - кикнуть лидера и почистить бд<br>/info Nick_Name - информация о нике<br>/leaders - информация о лидерах<br>/zams - информация о заместителях<br>/setnick @id nick_name - добавить/изменить ник<br>/setd @id lvl - изменить доступ<br>/setleader [@idvk] [fraction] - назначить лидером<br>/adduser @id Nick_Name - внести пользователя в бд<br>/addzam [@idvk] [gang] - внести 9ку лидера<br>/remzam [@idvk] [gang] - убрать 9-ку лидера<br>/addpred [gang] [причина] - выдать пред лидеру<br>/removepred [gang] [причина] - снять пред<br>/addvug [gang] [причина] - выдать выговор лидеру<br>/removevug [gang] [причина] - снять выговор<br>/setsrok @id хх.хх.хххх - установить сроку лидеру<br>/addscore @idvk [кол-во баллов] причина - выдать баллы лидеру<br>/removescore @idvk [кол-во баллов] причина - забрать баллы у лидера<br>/sendld текст - отправить оповещение с текстом в кф лидерам гетто<br>/sendldmaf текст - отправить оповещение с текстом в кф лидерам мафий<br>/opra [gang] [nickname] [1-24 hours] [text] - запросить у игрока опру<br>/connect - подключ к логам(если не дает инфу с других команд)<br>/online [Nick_Name] - послед 7 дней онлайна<br>/onlinegang [gang] - онлайн банды(не точная инфа)<br>/idacc [Nick_Name] - узнать ид аккаунта в логах");
           }
           if($user->type == 'мафии'){
            $vk->sendMessage($peer_id,"[D:5] $user->nick | $user->position<br><br>/help - помощь по команда<br>/бот - проверка работает бот или нет<br>/test - проверка подключения к бд<br>/kick @id причина - кикнуть пользователя<br>/gkick @id причина - кикнуть из кф курилки,забивов<br>/lkick @id причина - кикнуть лидера и почистить бд<br>/info Nick_Name - информация о нике<br>/leaders - информация о лидерах<br>/zams - информация о заместителях<br>/setnick @id nick_name - добавить/изменить ник<br>/setd @id lvl - изменить доступ<br>/setleader [@idvk] [fraction] - назначить лидером<br>/adduser @id Nick_Name - внести пользователя в бд<br>/addzam [@idvk] [gang] - внести 9ку лидера<br>/remzam [@idvk] [gang] - убрать 9-ку лидера<br>/addpred [gang] [причина] - выдать пред лидеру<br>/removepred [gang] [причина] - снять пред<br>/addvug [gang] [причина] - выдать выговор лидеру<br>/removevug [gang] [причина] - снять выговор<br>/setsrok @id хх.хх.хххх - установить сроку лидеру<br>/addscore @idvk [кол-во баллов] причина - выдать баллы лидеру<br>/removescore @idvk [кол-во баллов] причина - забрать баллы у лидера<br>/sendld текст - отправить оповещение с текстом в кф лидерам гетто<br>/sendldmaf текст - отправить оповещение с текстом в кф лидерам мафий<br>/opra [gang] [nickname] [1-24 hours] [text] - запросить у игрока опру<br>/connect - подключ к логам(если не дает инфу с других команд)<br>/online [Nick_Name] - послед 7 дней онлайна<br>/onlinegang [gang] - онлайн банды(не точная инфа)");
           }
           if($user->type == 'гос'){
                $vk->sendMessage($peer_id,"[D:5] $user->nick | $user->position<br><br>/help - помощь по команда<br>/бот - проверка работает бот или нет<br>/info Nick_Name - информация о нике<br>/leaders - информация о лидерах<br>/kick [@idvk] [причина] - кикнуть с причиной с этой кф<br>/kickall [@idvk] [причина] - кикнуть со всех конф с причиной<br>/adduser [@idvk] [Nick_Name] - внести пользователя в бд<br>/setnick @id nick_name - добавить/изменить ник<br>/setleader [@idvk] [fraction] - назначить лидером<br>/addpred [@idvk] [причина] - выдать пред лидеру<br>/removepred [@idvk] [причина] - снять пред лидеру<br>/addvug [@idvk] [причина] - выдать выговор лидеру<br>/removevug [@idvk] [причина] - снять выговор лидеру<br>/addscore [@idvk] [кол-во баллов] [причина] - выдать баллы<br>/removescore [@idvk] [кол-во баллов] [причина] - забрать баллы<br>/sendgos [text] - отправить сообщения в кф лидеров с упоминание<br>/addgoszam [@idvk] [fraction] - внести зама");
           }
           if($user->type == 'all'){
            $vk->sendMessage($peer_id,"[D:5] $user->nick | $user->position<br><br>/help - помощь по команда<br>/бот - проверка работает бот или нет<br>/test - проверка подключения к бд<br>/kick @id причина - кикнуть пользователя<br>/gkick @id причина - кикнуть из кф курилки,забивов<br>/lkick @id причина - кикнуть лидера и почистить бд<br>/info Nick_Name - информация о нике<br>/leaders - информация о лидерах<br>/zams - информация о заместителях<br>/setnick @id nick_name - добавить/изменить ник<br>/setd @id lvl - изменить доступ<br>/setleader [@idvk] [fraction] - назначить лидером<br>/adduser @id Nick_Name - внести пользователя в бд<br>/addzam [@idvk] [gang] - внести 9ку лидера<br>/remzam [@idvk] [gang] - убрать 9-ку лидера<br>/addpred [gang] [причина] - выдать пред лидеру<br>/removepred [gang] [причина] - снять пред<br>/addvug [gang] [причина] - выдать выговор лидеру<br>/removevug [gang] [причина] - снять выговор<br>/setsrok @id хх.хх.хххх - установить сроку лидеру<br>/addscore @idvk [кол-во баллов] причина - выдать баллы лидеру<br>/removescore @idvk [кол-во баллов] причина - забрать баллы у лидера<br>/sendld текст - отправить оповещение с текстом в кф лидерам гетто<br>/sendldmaf текст - отправить оповещение с текстом в кф лидерам мафий<br>/opra [gang] [nickname] [1-24 hours] [text] - запросить у игрока опру<br>/connect - подключ к логам(если не дает инфу с других команд)<br>/online [Nick_Name] - послед 7 дней онлайна<br>/onlinegang [gang] - онлайн банды(не точная инфа)<br>/idacc [Nick_Name] - узнать ид аккаунта в логах<br>/ipaccs [ip] - узнать все аккаунты на айпи");
           }
        }
        if($user->lvl == 5){

            if($user->type == 'гетто'){
            $vk->sendMessage($peer_id,"[D:5] $user->nick | $user->position<br><br>/help - помощь по команда<br>/бот - проверка работает бот или нет<br>/test - проверка подключения к бд<br>/kick @id причина - кикнуть пользователя<br>/gkick @id причина - кикнуть из кф курилки,забивов<br>/lkick @id причина - кикнуть лидера и почистить бд<br>/info Nick_Name - информация о нике<br>/leaders - информация о лидерах<br>/zams - информация о заместителях<br>/setnick @id nick_name - добавить/изменить ник<br>/setd @id lvl - изменить доступ<br>/setleader [@idvk] [fraction] - назначить лидером<br>/adduser @id Nick_Name - внести пользователя в бд<br>/addzam [@idvk] [gang] - внести 9ку лидера<br>/remzam [@idvk] [gang] - убрать 9-ку лидера<br>/addpred [gang] [причина] - выдать пред лидеру<br>/removepred [gang] [причина] - снять пред<br>/addvug [gang] [причина] - выдать выговор лидеру<br>/removevug [gang] [причина] - снять выговор<br>/setsrok @id хх.хх.хххх - установить сроку лидеру<br>/addscore @idvk [кол-во баллов] причина - выдать баллы лидеру<br>/removescore @idvk [кол-во баллов] причина - забрать баллы у лидера<br>/sendld текст - отправить оповещение с текстом в кф лидерам гетто<br>/sendldmaf текст - отправить оповещение с текстом в кф лидерам мафий<br>/opra [gang] [nickname] [1-24 hours] [text] - запросить у игрока опру<br>/connect - подключ к логам(если не дает инфу с других команд)<br>/online [Nick_Name] - послед 7 дней онлайна<br>/onlinegang [gang] - онлайн банды(не точная инфа)<br>/idacc [Nick_Name] - узнать ид аккаунта в логах");
           }
           if($user->type == 'мафии'){
            $vk->sendMessage($peer_id,"[D:5] $user->nick | $user->position<br><br>/help - помощь по команда<br>/бот - проверка работает бот или нет<br>/test - проверка подключения к бд<br>/kick @id причина - кикнуть пользователя<br>/gkick @id причина - кикнуть из кф курилки,забивов<br>/lkick @id причина - кикнуть лидера и почистить бд<br>/info Nick_Name - информация о нике<br>/leaders - информация о лидерах<br>/zams - информация о заместителях<br>/setnick @id nick_name - добавить/изменить ник<br>/setd @id lvl - изменить доступ<br>/setleader [@idvk] [fraction] - назначить лидером<br>/adduser @id Nick_Name - внести пользователя в бд<br>/addzam [@idvk] [gang] - внести 9ку лидера<br>/remzam [@idvk] [gang] - убрать 9-ку лидера<br>/addpred [gang] [причина] - выдать пред лидеру<br>/removepred [gang] [причина] - снять пред<br>/addvug [gang] [причина] - выдать выговор лидеру<br>/removevug [gang] [причина] - снять выговор<br>/setsrok @id хх.хх.хххх - установить сроку лидеру<br>/addscore @idvk [кол-во баллов] причина - выдать баллы лидеру<br>/removescore @idvk [кол-во баллов] причина - забрать баллы у лидера<br>/sendld текст - отправить оповещение с текстом в кф лидерам гетто<br>/sendldmaf текст - отправить оповещение с текстом в кф лидерам мафий<br>/opra [gang] [nickname] [1-24 hours] [text] - запросить у игрока опру<br>/connect - подключ к логам(если не дает инфу с других команд)<br>/online [Nick_Name] - послед 7 дней онлайна<br>/onlinegang [gang] - онлайн банды(не точная инфа)");
           }
           if($user->type == 'гос'){
                $vk->sendMessage($peer_id,"[D:5] $user->nick | $user->position<br><br>/help - помощь по команда<br>/бот - проверка работает бот или нет<br>/info Nick_Name - информация о нике<br>/leaders - информация о лидерах<br>/kick [@idvk] [причина] - кикнуть с причиной с этой кф<br>/kickall [@idvk] [причина] - кикнуть со всех конф с причиной<br>/adduser [@idvk] [Nick_Name] - внести пользователя в бд<br>/setnick @id nick_name - добавить/изменить ник<br>/setleader [@idvk] [fraction] - назначить лидером<br>/addpred [@idvk] [причина] - выдать пред лидеру<br>/removepred [@idvk] [причина] - снять пред лидеру<br>/addvug [@idvk] [причина] - выдать выговор лидеру<br>/removevug [@idvk] [причина] - снять выговор лидеру<br>/addscore [@idvk] [кол-во баллов] [причина] - выдать баллы<br>/removescore [@idvk] [кол-во баллов] [причина] - забрать баллы<br>/sendgos [text] - отправить сообщения в кф лидеров с упоминание<br>/addgoszam [@idvk] [fraction] - внести зама");
           }
           if($user->type == 'all'){
                            $vk->sendMessage($peer_id,"[D:5] $user->nick | $user->position<br><br>/help - помощь по команда<br>/бот - проверка работает бот или нет<br>/test - проверка подключения к бд<br>/kick @id причина - кикнуть пользователя<br>/gkick @id причина - кикнуть из кф курилки,забивов<br>/lkick @id причина - кикнуть лидера и почистить бд<br>/info Nick_Name - информация о нике<br>/leaders - информация о лидерах<br>/zams - информация о заместителях<br>/setnick @id nick_name - добавить/изменить ник<br>/setd @id lvl - изменить доступ<br>/setleader [@idvk] [fraction] - назначить лидером<br>/adduser @id Nick_Name - внести пользователя в бд<br>/addzam [@idvk] [gang] - внести 9ку лидера<br>/remzam [@idvk] [gang] - убрать 9-ку лидера<br>/addpred [gang] [причина] - выдать пред лидеру<br>/removepred [gang] [причина] - снять пред<br>/addvug [gang] [причина] - выдать выговор лидеру<br>/removevug [gang] [причина] - снять выговор<br>/setsrok @id хх.хх.хххх - установить сроку лидеру<br>/addscore @idvk [кол-во баллов] причина - выдать баллы лидеру<br>/removescore @idvk [кол-во баллов] причина - забрать баллы у лидера<br>/sendld текст - отправить оповещение с текстом в кф лидерам гетто<br>/sendldmaf текст - отправить оповещение с текстом в кф лидерам мафий<br>/opra [gang] [nickname] [1-24 hours] [text] - запросить у игрока опру<br>/connect - подключ к логам(если не дает инфу с других команд)<br>/online [Nick_Name] - послед 7 дней онлайна<br>/onlinegang [gang] - онлайн банды(не точная инфа)<br>/idacc [Nick_Name] - узнать ид аккаунта в логах<br>/ipaccs [ip] - узнать все аккаунты на айпи");
           }
        }
        if($user->lvl == 6){
           if($user->type == 'гетто'){
            $vk->sendMessage($peer_id,"[D:6] $user->nick | $user->position<br><br>/help - помощь по команда<br>/бот - проверка работает бот или нет<br>/test - проверка подключения к бд<br>/kick @id причина - кикнуть пользователя<br>/gkick @id причина - кикнуть из кф курилки,забивов<br>/lkick @id причина - кикнуть лидера и почистить бд<br>/info Nick_Name - информация о нике<br>/leaders - информация о лидерах<br>/zams - информация о заместителях<br>/setnick @id nick_name - добавить/изменить ник<br>/setd @id lvl - изменить доступ<br>/setleader [@idvk] [fraction] - назначить лидером<br>/adduser @id Nick_Name - внести пользователя в бд<br>/addzam [@idvk] [gang] - внести 9ку лидера<br>/remzam [@idvk] [gang] - убрать 9-ку лидера<br>/addpred [gang] [причина] - выдать пред лидеру<br>/removepred [gang] [причина] - снять пред<br>/addvug [gang] [причина] - выдать выговор лидеру<br>/removevug [gang] [причина] - снять выговор<br>/setsrok @id хх.хх.хххх - установить сроку лидеру<br>/addscore @idvk [кол-во баллов] причина - выдать баллы лидеру<br>/removescore @idvk [кол-во баллов] причина - забрать баллы у лидера<br>/sendld текст - отправить оповещение с текстом в кф лидерам гетто<br>/sendldmaf текст - отправить оповещение с текстом в кф лидерам мафий<br>/opra [gang] [nickname] [1-24 hours] [text] - запросить у игрока опру<br>/connect - подключ к логам(если не дает инфу с других команд)<br>/online [Nick_Name] - послед 7 дней онлайна<br>/onlinegang [gang] - онлайн банды(не точная инфа)<br>/idacc [Nick_Name] - узнать ид аккаунта в логах<br>/ipaccs [ip] - узнать все аккаунты на айпи");
           }
           if($user->type == 'мафии'){
            $vk->sendMessage($peer_id,"[D:6] $user->nick | $user->position<br><br>/help - помощь по команда<br>/бот - проверка работает бот или нет<br>/test - проверка подключения к бд<br>/kick @id причина - кикнуть пользователя<br>/gkick @id причина - кикнуть из кф курилки,забивов<br>/lkick @id причина - кикнуть лидера и почистить бд<br>/info Nick_Name - информация о нике<br>/leaders - информация о лидерах<br>/zams - информация о заместителях<br>/setnick @id nick_name - добавить/изменить ник<br>/setd @id lvl - изменить доступ<br>/setleader [@idvk] [fraction] - назначить лидером<br>/adduser @id Nick_Name - внести пользователя в бд<br>/addzam [@idvk] [gang] - внести 9ку лидера<br>/remzam [@idvk] [gang] - убрать 9-ку лидера<br>/addpred [gang] [причина] - выдать пред лидеру<br>/removepred [gang] [причина] - снять пред<br>/addvug [gang] [причина] - выдать выговор лидеру<br>/removevug [gang] [причина] - снять выговор<br>/setsrok @id хх.хх.хххх - установить сроку лидеру<br>/addscore @idvk [кол-во баллов] причина - выдать баллы лидеру<br>/removescore @idvk [кол-во баллов] причина - забрать баллы у лидера<br>/sendld текст - отправить оповещение с текстом в кф лидерам гетто<br>/sendldmaf текст - отправить оповещение с текстом в кф лидерам мафий<br>/opra [gang] [nickname] [1-24 hours] [text] - запросить у игрока опру<br>/connect - подключ к логам(если не дает инфу с других команд)<br>/online [Nick_Name] - послед 7 дней онлайна<br>/onlinegang [gang] - онлайн банды(не точная инфа)<br>/idacc [Nick_Name] - узнать ид аккаунта в логах<br>/ipaccs [ip] - узнать все аккаунты на айпи");
           }
           if($user->type == 'гос'){
                $vk->sendMessage($peer_id,"[D:6] $user->nick | $user->position<br><br>/help - помощь по команда<br>/бот - проверка работает бот или нет<br>/info Nick_Name - информация о нике<br>/leaders - информация о лидерах<br>/kick [@idvk] [причина] - кикнуть с причиной с этой кф<br>/kickall [@idvk] [причина] - кикнуть со всех конф с причиной<br>/adduser [@idvk] [Nick_Name] - внести пользователя в бд<br>/setnick @id nick_name - добавить/изменить ник<br>/setleader [@idvk] [fraction] - назначить лидером<br>/setd [@idvk] [1-5] - выдать доступ<br>/settype [@idvk] [гетто/мафии/гос] - установить тип доступа<br>/addpred [@idvk] [причина] - выдать пред лидеру<br>/removepred [@idvk] [причина] - снять пред лидеру<br>/addvug [@idvk] [причина] - выдать выговор лидеру<br>/removevug [@idvk] [причина] - снять выговор лидеру<br>/addscore [@idvk] [кол-во баллов] [причина] - выдать баллы<br>/removescore [@idvk] [кол-во баллов] [причина] - забрать баллы<br>/sendgos [text] - отправить сообщения в кф лидеров с упоминание<br>/addgoszam [@idvk] [fraction] - внести зама");
           }
           if($user->type == 'all'){
                            $vk->sendMessage($peer_id,"[D:6] $user->nick | $user->position<br><br>/help - помощь по команда<br>/бот - проверка работает бот или нет<br>/test - проверка подключения к бд<br>/kick @id причина - кикнуть пользователя<br>/gkick @id причина - кикнуть из кф курилки,забивов<br>/lkick @id причина - кикнуть лидера и почистить бд<br>/info Nick_Name - информация о нике<br>/leaders - информация о лидерах<br>/zams - информация о заместителях<br>/setnick @id nick_name - добавить/изменить ник<br>/setd @id lvl - изменить доступ<br>/setleader [@idvk] [fraction] - назначить лидером<br>/adduser @id Nick_Name - внести пользователя в бд<br>/addzam [@idvk] [gang] - внести 9ку лидера<br>/remzam [@idvk] [gang] - убрать 9-ку лидера<br>/addpred [gang] [причина] - выдать пред лидеру<br>/removepred [gang] [причина] - снять пред<br>/addvug [gang] [причина] - выдать выговор лидеру<br>/removevug [gang] [причина] - снять выговор<br>/setsrok @id хх.хх.хххх - установить сроку лидеру<br>/addscore @idvk [кол-во баллов] причина - выдать баллы лидеру<br>/removescore @idvk [кол-во баллов] причина - забрать баллы у лидера<br>/sendld текст - отправить оповещение с текстом в кф лидерам гетто<br>/sendldmaf текст - отправить оповещение с текстом в кф лидерам мафий<br>/opra [gang] [nickname] [1-24 hours] [text] - запросить у игрока опру<br>/connect - подключ к логам(если не дает инфу с других команд)<br>/online [Nick_Name] - послед 7 дней онлайна<br>/onlinegang [gang] - онлайн банды(не точная инфа)<br>/idacc [Nick_Name] - узнать ид аккаунта в логах<br>/ipaccs [ip] - узнать все аккаунты на айпи");
           }
        }
        if($user->lvl == 7){
            $vk->sendMessage($peer_id,"[D:7] $user->nick | $user->position<br><br>/help - помощь по команда<br>/бот - проверка работает бот или нет<br>/test - проверка подключения к бд<br>/kick @id причина - кикнуть пользователя<br>/gkick @id причина - кикнуть из кф курилки,забивов<br>/lkick @id причина - кикнуть лидера и почистить бд<br>/info Nick_Name - информация о нике<br>/leaders - информация о лидерах<br>/zams - информация о заместителях<br>/setnick @id nick_name - добавить/изменить ник<br>/setd @id lvl - изменить доступ<br>/setleader [@idvk] [fraction] - назначить лидером<br>/adduser @id Nick_Name - внести пользователя в бд<br>/addzam [@idvk] [gang] - внести 9ку лидера<br>/remzam [@idvk] [gang] - убрать 9-ку лидера<br>/addpred [gang] [причина] - выдать пред лидеру<br>/removepred [gang] [причина] - снять пред<br>/addvug [gang] [причина] - выдать выговор лидеру<br>/removevug [gang] [причина] - снять выговор<br>/setsrok @id хх.хх.хххх - установить сроку лидеру<br>/addscore @idvk [кол-во баллов] причина - выдать баллы лидеру<br>/removescore @idvk [кол-во баллов] причина - забрать баллы у лидера<br>/sendld текст - отправить оповещение с текстом в кф лидерам гетто<br>/sendldmaf текст - отправить оповещение с текстом в кф лидерам мафий<br>/opra [gang] [nickname] [1-24 hours] [text] - запросить у игрока опру<br>/connect - подключ к логам(если не дает инфу с других команд)<br>/online [Nick_Name] - послед 7 дней онлайна<br>/onlinegang [gang] - онлайн банды(не точная инфа)<br>/idacc [Nick_Name] - узнать ид аккаунта в логах<br>/ipaccs [ip] - узнать все аккаунты на айпи");
        }
        if($user->lvl == 8){
            $vk->sendMessage($peer_id,"[D:8] $user->nick | $user->position<br><br>/help - помощь по командам<br>/бот - проверка работает бот или нет<br>/test - проверка подключения к бд<br>/kick @id причина - кикнуть пользователя<br>/gkick @id причина - кикнуть из кф курилки,забивов<br>/lkick @id причина - кикнуть лидера и почистить бд<br>/info Nick_Name - информация о нике<br>/leaders - информация о лидерах<br>/zams - информация о заместителях<br>/setnick @id nick_name - добавить/изменить ник<br>/setd @id lvl - изменить доступ<br>/setleader [@idvk] [fraction] - назначить лидером<br>/setgs @id гетто/мафии - назначить нового ГС-а<br>/adduser @id Nick_Name - внести пользователя в бд<br>/addzam [@idvk] [gang] - внести 9ку лидера<br>/remzam [@idvk] [gang] - убрать 9-ку лидера<br>/addpred [gang] [причина] - выдать пред лидеру<br>/removepred [gang] [причина] - снять пред<br>/addvug [gang] [причина] - выдать выговор лидеру<br>/removevug [gang] [причина] - снять выговор<br>/setsrok @id хх.хх.хххх - установить сроку лидеру<br>/addscore @idvk [кол-во баллов] причина - выдать баллы лидеру<br>/removescore @idvk [кол-во баллов] причина - забрать баллы у лидера<br>/sendld текст - отправить оповещение с текстом в кф лидерам гетто<br>/sendldmaf текст - отправить оповещение с текстом в кф лидерам мафий<br>/opra [gang] [nickname] [1-24 hours] [text] - запросить у игрока опру<br>/connect - подключ к логам(если не дает инфу с других команд)<br>/online [Nick_Name] - послед 7 дней онлайна<br>/onlinegang [gang] - онлайн банды(не точная инфа)<br>/idacc [Nick_Name] - узнать ид аккаунта в логах<br>/ipaccs [ip] - узнать все аккаунты на айпи<br>/set(sex)[0-1] - вкл/выкл sex<br>/sex - рофл");
        }
        if($user->lvl == 9){
            $vk->sendMessage($peer_id,"[D:9] $user->nick | $user->position<br><br>/help - помощь по командам<br>/бот - проверка работает бот или нет<br>/test - проверка подключения к бд<br>/id - узнать ид беседы<br>/kick @id причина - кикнуть пользователя<br>/gkick @id причина - кикнуть из кф курилки,забивов<br>/lkick @id причина - кикнуть лидера и почистить бд<br>/info Nick_Name - информация о нике<br>/leaders - информация о лидерах<br>/zams - информация о заместителях<br>/setnick @id nick_name - добавить/изменить ник<br>/setd @id lvl - изменить доступ<br>/setleader [@idvk] [fraction] - назначить лидером<br>/setgs @id гетто/мафии - назначить нового ГС-а<br>/adduser @id Nick_Name - внести пользователя в бд<br>/addzam [@idvk] [gang] - внести 9ку лидера<br>/remzam [@idvk] [gang] - убрать 9-ку лидера<br>/addpred [gang] [причина] - выдать пред лидеру<br>/removepred [gang] [причина] - снять пред<br>/addvug [gang] [причина] - выдать выговор лидеру<br>/removevug [gang] [причина] - снять выговор<br>/setsrok @id хх.хх.хххх - установить сроку лидеру<br>/addscore @idvk [кол-во баллов] причина - выдать баллы лидеру<br>/removescore @idvk [кол-во баллов] причина - забрать баллы у лидера<br>/sendld текст - отправить оповещение с текстом в кф лидерам гетто<br>/sendldmaf текст - отправить оповещение с текстом в кф лидерам мафий<br>/opra [gang] [nickname] [1-24 hours] [text] - запросить у игрока опру<br>/connect - подключ к логам(если не дает инфу с других команд)<br>/online [Nick_Name] - послед 7 дней онлайна<br>/onlinegang [gang] - онлайн банды(не точная инфа)<br>/idacc [Nick_Name] - узнать ид аккаунта в логах<br>/ipaccs [ip] - узнать все аккаунты на айпи<br>/set(sex)[0-1] - вкл/выкл sex<br>/sex - рофл");
        }
        if($user->lvl == 10){
            $vk->sendMessage($peer_id,"[D:10] $user->nick | $user->position<br><br>/help - помощь по командам<br>/бот - проверка работает бот или нет<br>/test - проверка подключения к бд<br>/id - узнать ид беседы<br>/kick @id причина - кикнуть пользователя<br>/gkick @id причина - кикнуть из кф курилки,забивов<br>/lkick @id причина - кикнуть лидера и почистить бд<br>/info Nick_Name - информация о нике<br>/leaders - информация о лидерах<br>/zams - информация о заместителях<br>/setnick @id nick_name - добавить/изменить ник<br>/setd @id lvl - изменить доступ<br>/setleader @id банда - назначить лидером<br>/setgs @id гетто/мафии - назначить нового ГС-а<br>/adduser @id Nick_Name - внести пользователя в бд<br>/addzam [@idvk] [gang] - внести 9ку лидера<br>/remzam [@idvk] [gang] - убрать 9-ку лидера<br>/addpred [gang] [причина] - выдать пред лидеру<br>/removepred [gang] [причина] - снять пред<br>/addvug [gang] [причина] - выдать выговор лидеру<br>/removevug [gang] [причина] - снять выговор<br>/setsrok @id хх.хх.хххх - установить сроку лидеру<br>/addscore @idvk [кол-во баллов] причина - выдать баллы лидеру<br>/removescore @idvk [кол-во баллов] причина - забрать баллы у лидера<br>/sendld текст - отправить оповещение с текстом в кф лидерам гетто<br>/sendldmaf текст - отправить оповещение с текстом в кф лидерам мафий<br>/opra [gang] [nickname] [1-24 hours] [text] - запросить у игрока опру<br>/connect - подключ к логам(если не дает инфу с других команд)<br>/online [Nick_Name] - послед 7 дней онлайна<br>/onlinegang [gang] - онлайн банды(не точная инфа)<br>/idacc [Nick_Name] - узнать ид аккаунта в логах<br>/ipaccs [ip] - узнать все аккаунты на айпи<br>/set(sex)[0-1] - вкл/выкл sex<br>/sex - рофл");
        }}}
if ($data->type == 'message_new') { // команда /test для проверки подключения к бд
    if($cmd == '/test'){
        if($user->lvl >= 7){
            if ( !R::testConnection() )
                {
                    $vk->sendMessage($peer_id,"Нету соединения с БД");
                }else{
                    $vk->sendMessage($peer_id,"Все работает ✅");
                }
        }
        else{
            $vk->sendMessage($peer_id,"У вас нету доступа к этой команде!");
        }
    }}
if ($data->type == 'message_new') { // команда /бот для проверки онлайна бота
    if ($message == '/addpred') {
            if($user->lvl >= 4){
                if($user->type == гетто OR $user->type == мафии OR $user->type == all){
                $vk->sendMessage($peer_id, "/addpred [fraction] [причина] - нелегал");
                }
                if($user->type == гос OR $user->type == all){
                $vk->sendMessage($peer_id, "/addpred [@idvk] [причина] - гос");
                }
            }
        }
        if ($message == '/addvug') {
            if($user->lvl >= 4){
                if($user->type == гетто OR $user->type == мафии OR $user->type == all){
                $vk->sendMessage($peer_id, "/addvug [fraction] [причина] - нелегал");
                }
                if($user->type == гос OR $user->type == all){
                $vk->sendMessage($peer_id, "/addvug [@idvk] [причина] - гос");
                }
            }
        }
        if ($message == '/removepred') {
            if($user->lvl >= 4){
                if($user->type == гетто OR $user->type == мафии OR $user->type == all){
                $vk->sendMessage($peer_id, "/removepred [fraction] [причина] - нелегал");
                }
                if($user->type == гос OR $user->type == all){
                $vk->sendMessage($peer_id, "/removepred [@idvk] [причина] - гос");
                }
            }
        }
        if ($message == '/addscore') {
            if($user->lvl >= 4){
                $vk->sendMessage($peer_id, "/addscore [@idvk] [кол-во баллов] [причина]");
            }
        }

        if ($message == '/removescore') {
            if($user->lvl >= 4){
                $vk->sendMessage($peer_id, "/removescore [@idvk] [кол-во баллов] [причина]");
            }
        }

        if ($message == '/removevug') {
            if($user->lvl >= 4){
                if($user->type == гетто OR $user->type == мафии OR $user->type == all){
                $vk->sendMessage($peer_id, "/removevug [fraction] [причина] - нелегал");
                }
                if($user->type == гос OR $user->type == all){
                $vk->sendMessage($peer_id, "/removevug [@idvk] [причина] - гос");
                }
            }
        }
        if ($message == '/setsrok') {
            if($user->lvl >= 4){
                $vk->sendMessage($peer_id, "/setsrok [fraction] [хх.хх.хххх]");
            }
        }
        if ($message == '/settype') {
            if($user->lvl >= 4){
                $vk->sendMessage($peer_id, "/settype [@idvk] гетто/мафии/гос");
            }
        }
        if ($message == '/setgs') {
            if($user->lvl >= 4){
                $vk->sendMessage($peer_id, "/setgs [@idvk] гетто/мафии/гос/згсгос/згсгетто/згсмафии");
            }
        }
        if ($message == '/setleader') {
            if($user->lvl >= 4){
                $vk->sendMessage($peer_id, "/setleader [@idvk] [fraction]");
            }
        }
         if ($message == '/adduser') {
            if($user->lvl >= 4){
                $vk->sendMessage($peer_id, "/adduser [@idvk] [Nick_Name]");
            }
        }
        if ($message == '/addkickkf') {
            if($user->lvl >= 5){
                $vk->sendMessage($peer_id, "/addkickkf [name]");
            }
        }
        if ($message == '/delkickkf') {
            if($user->lvl >= 5){
                $vk->sendMessage($peer_id, "/delkickkf [name]");
            }
        }

 if ($message == '/removeleader') {
            if($user->lvl >= 4){
        $vk->sendMessage($peer_id, "/removeleader [@idvk]");
            }
        }
    }


if ($data->type == 'message_new') { // не рабочая команда /кс
    if($cmd == '/кс'){
        if($user->lvl >= 8){
        if($chat_id < 0){
            $vk->sendMessage($peer_id,"Используйте данную команду в кф где у вас есть админ права!");//Это в группе
        }
        else{
                $get_members = $vk->request('messages.getConversationMembers', ['peer_id' => $peer_id]); // Получили список пользователей беседы
                $vk->sendMessage($peer_id, "$get_members");
                }
        }else{
            $vk->sendMessage($peer_id,"Используйте данную команду в кф где у вас есть админ права!");}}}
if ($data->type == 'message_new') { // команда /setnick

    if (preg_match("/^\/setnick\s(.+)/",$message,$nic)) {
        if($user->lvl >= 4){
        if (!preg_match("/(\[id\d+|.+\])\s+(.+)/",$nic[1],$nic)){
        gomsg("/setnick @упоминание новый_ник",$data);
        return;
        }
        $setnick = $nic[2];
        if (idbyname($nic[1])){}
        $new_nick = mb_substr($message ,9); // еще раз обрезаем и получаем все что написано после /kick_
        $new_nick = explode("|", mb_substr($new_nick, 3))[0]; // Делитель |, обрезаем первые 3 символа (@id) и получаем чистый ID :-)
        $newnick = R::findOne('users','vkid = ?',array($new_nick));
        $oldnick = $newnick->nick;
        if($newnick){
        $newnick->nick = $setnick;
        R::store($newnick);
        }
        $vk->sendMessage($peer_id,"@id$id($user->nick) установил новый ник для @id$new_nick($oldnick)<br>Новый ник: $newnick->nick<br>Прошлый ник: $oldnick");
    }else{$vk->sendMessage($peer_id,"У вас нет прав");}
        }}

if ($data->type == 'message_new') { // команда /kickall
    if (preg_match("/^\/kickall\s(.+)/",$message,$res)) {
        if($user->lvl >= 4){
        if (!preg_match("/(\[id\d+|.+\])\s+(.+)/",$res[1],$res)){
        gomsg("/kick @упоминание причина",$data);
        return;
        }
        $prichine = $res[2];
        if (idbyname($res[1])){}
        $kick_id = mb_substr($message ,9); // еще раз обрезаем и получаем все что написано после /kick_
        $kick_id = explode("|", mb_substr($kick_id, 3))[0]; // Делитель |, обрезаем первые 3 символа (@id) и получаем чистый ID :-)
        $kickid = R::findOne('users','vkid = ?',array($kick_id));
        if($user->lvl > $kickid->lvl){
        $gos = R::findAll('kfkick','ORDER BY peerid DESC');
foreach($gos as $gas){
$kfdu = $gas->peerid-2000000000;
$vk->request('messages.removeChatUser', ['chat_id' => $kfdu, 'member_id' => $kick_id]);
/*$members = $vk->request('messages.getConversationMembers', ['peer_id' => $gas->peerid]); // Запрос на получение данных о пользователях беседы
foreach ($members['profiles'] as $useronline) {
if($useronline['id'] == $kick_id){
$test10 = $useronline['id'];
array_push($userssss, $test10);
$key = array_search('$kick_id', $userssss);
if($key == false){
 $vk->sendMessage($peer_id,"$gas->name | @id$kick_id ($kickid->nick) не кикнул причина:нету в кф⛔");
}
if($key >= 1 && 400 <= $key){
$kfdu = $gas->peerid-2000000000;
$vk->request('messages.removeChatUser', ['chat_id' => $kfdu, 'member_id' => $kick_id]);
//$vk->sendMessage($gas->peerid,"@id$id ($user->nick) кикнул @id$kick_id ($kickid->nick) причина: $prichine");
$vk->sendMessage($peer_id,"@id$kick_id ($kickid->nick) кикнут с $gas->name причина: $prichine ✅");
}
}
}*/
}
$test = R::findOne('leaders','vkid = ?',array($kick_id));
if($test->type == гос){
$vk->sendMessage(2000000029, "@id$id ($user->nick) кикнул @id$kick_id ($kickid->nick) причина: $prichine");
$vk->sendMessage(2000000026, "@id$id ($user->nick) кикнул @id$kick_id ($kickid->nick) причина: $prichine");
}

$test1 = R::findOne('goszams','vkid = ?',array($kick_id));
if($test1){
$vk->sendMessage(2000000029, "@id$id ($user->nick) кикнул @id$kick_id ($kickid->nick) причина: $prichine");
$vk->sendMessage(2000000026, "@id$id ($user->nick) кикнул @id$kick_id ($kickid->nick) причина: $prichine");
}

$goszam = R::findOne('goszams','vkid = ?',array($kick_id));
if($goszam){
$olss = $goszam->nick;
R::exec('DELETE FROM `goszams` WHERE `nick` = ?', array($olss));
R::exec('DELETE FROM `onlines` WHERE `nick` = ?', array($olss));
$vk->sendMessage($peer_id, "Удалил из бд заместителя");
}
$vk->sendMessage($peer_id,"✅");
$zamkick = R::findOne('leaders','vkid = ?',array($kick_id));
        if($zamkick){
            $olss = $zamkick->nick;
                $zamkick = R::load('leaders',$zamkick->id);
                $zamkick->nick = 'free';
                $zamkick->strong = 0;
                $zamkick->vkid = 0;
                $zamkick->oral = 0;
                $zamkick->score = 0;
                $zamkick->firstzam = 0;
                $zamkick->secondzam = 0;
                $zamkick->thirdzam = 0;
                $zamkick->fourzam = 0;
                $zamkick->postavul = '01.01.1991';
                $zamkick->snyal = '01.01.1991';
                R::store($zamkick);
                R::exec('DELETE FROM `onlines` WHERE `nick` = ?', array($olss));
                $vk->sendMessage($peer_id, "Доступ, замов, лидера почистил в бд✅");
                $logleader = R::load('logleader',NULL);
                $logleader->nickadm = $user->nick;
                $logleader->nickleader = $olss;
                $logleader->postavlen = 1;
                $logleader->reason = $prichine;
                $logleader->type = 0;
                $logleader->frac = $zamkick->gang;
                R::store($logleader);
                $vk->sendMessage($peer_id,"Подтвердите причину снятия лидера командой:<br>/rlead $logleader->id");
            }
        if($kickid){
            $kickid = R::load('users',$kickid->id);
            $kickid->position = 'игрок';
            $kickid->lvl = 1;
            R::store($kickid);
        }

            }else{$vk->sendMessage($peer_id,"Вы не можете кикнуть данного пользователя(возможно вы пытаетесь кикнуть себя или выше по доступу пользователя)");}
        }else{$vk->sendMessage($peer_id,"У вас нет прав");}
    }}



if ($data->type == 'message_new') { // команда /kickall
    if (preg_match("/^\/addkickkf\s(.+)/",$message,$res)) {
        if($user->lvl >= 5){
        $kfs = $res[1];
        $kickkf = R::findOne('kfkick','peerid = ?',array($peer_id));
        if($kickkf){
        $vk->sendMessage($peer_id,"Данная беседа уже есть в кик конфах - $kickkf->name | $kickkf->peerid");
        }else{
            $kickkf = R::load('kfkick',NULL);
            $kickkf->name = $kfs;
            $kickkf->peerid = $peer_id;
            R::store($kickkf);
            $vk->sendMessage($peer_id,"Данная беседа занесена в бд - $kickkf->name | $kickkf->peerid");
        }
    }else{$vk->sendMessage($peer_id,"У вас нет прав");}}}

if ($data->type == 'message_new') { // команда /kickall
    if (preg_match("/^\/delkickkf\s(.+)/",$message,$res)) {
        if($user->lvl >= 5){
        $kfs = $res[1];
        $kickkf = R::findOne('kfkick','name = ?',array($kfs));
        if($kickkf){
        R::exec('DELETE FROM `kfkick` WHERE `name` = ?', array($kfs));
        $vk->sendMessage($peer_id,"Данная беседа удаленна из таблицы");
        }else{
            $vk->sendMessage($peer_id,"Данная беседа не занесена в бд");
        }
    }else{$vk->sendMessage($peer_id,"У вас нет прав");}}}



if ($data->type == 'message_new') { // команда /kickall
   if($cmd == '/statskick'){
        if($user->lvl >= 5){
        $gos = R::findAll('kfkick','ORDER BY peerid DESC');
            foreach($gos as $gas){
                $kflist .= "$gas->peerid | $gas->name<br>";
            }
            $vk->sendMessage($peer_id,"$kflist");
        }else{$vk->sendMessage($peer_id,"У вас нет прав");}
    }}


if ($data->type == 'message_new') { // команда /kick с причиной
    if (preg_match("/^\/kick\s(.+)/",$message,$res)) {
        if($user->lvl >= 4){

        if (!preg_match("/(\[id\d+|.+\])\s+(.+)/",$res[1],$res)){
        gomsg("/kick @упоминание причина",$data);
        return;
        }
        $prichine = $res[2];
        if (idbyname($res[1])){}
        $kick_id = mb_substr($message ,6); // еще раз обрезаем и получаем все что написано после /kick_
        $kick_id = explode("|", mb_substr($kick_id, 3))[0]; // Делитель |, обрезаем первые 3 символа (@id) и получаем чистый ID :-)
        $kickid = R::findOne('users','vkid = ?',array($kick_id));
        if($user->lvl > $kickid->lvl){
        $vk->request('messages.removeChatUser', ['chat_id' => $chat_id, 'member_id' => $kick_id]);
        $vk->sendMessage($peer_id, "@id$id ($user->nick) кикнул @id$kick_id ($kickid->nick) причина: $prichine");
        }else{$vk->sendMessage($peer_id,"Вы не можете кикнуть данного пользователя(возможно вы пытаетесь кикнуть себя или выше по доступу пользователя)");}
    }else{$vk->sendMessage($peer_id,"У вас нет прав");}}}




if ($data->type == 'message_new') { // команда /gkick с причиной из конф гетто
    if (preg_match("/^\/gkick\s(.+)/",$message,$res)) {
        if($user->lvl >= 4){

        if (!preg_match("/(\[id\d+|.+\])\s+(.+)/",$res[1],$res)){
        gomsg("/gkick @упоминание причина",$data);
        return;
        }
        $prichine = $res[2];
        if (idbyname($res[1])){}
        $kick_id = mb_substr($message ,7); // еще раз обрезаем и получаем все что написано после /kick_
        $kick_id = explode("|", mb_substr($kick_id, 3))[0]; // Делитель |, обрезаем первые 3 символа (@id) и получаем чистый ID :-)
        $kickid = R::findOne('users','vkid = ?',array($kick_id));
        if($user->lvl > $kickid->lvl){
        $vk->request('messages.removeChatUser', ['chat_id' => 4, 'member_id' => $kick_id]);
        $vk->sendMessage(2000000004, "@id$id ($user->nick) кикнул @id$kick_id ($kickid->nick) причина: $prichine");
        $vk->request('messages.removeChatUser', ['chat_id' => 6, 'member_id' => $kick_id]);
        $vk->sendMessage(2000000006, "@id$id ($user->nick) кикнул @id$kick_id ($kickid->nick) причина: $prichine");
        $konf = R::findOne('konfs','kfid = ?',array(2000000006));
        $vk->sendMessage(2000000007, "@id$kick_id ($kickid->nick) кикнут из кф: $konf->name ✅");
        $konf = R::findOne('konfs','kfid = ?',array(2000000004));
        $vk->sendMessage(2000000007, "@id$kick_id ($kickid->nick) кикнут из кф: $konf->name ✅");
        }else{$vk->sendMessage($peer_id,"Вы не можете кикнуть данного пользователя(возможно вы пытаетесь кикнуть себя или выше по доступу пользователя)");}
    }else{$vk->sendMessage($peer_id,"У вас нет прав");}}}



if ($data->type == 'message_new') { // команда /lkick -> кикнуть лидера и его 9-ток с причиной
    if (preg_match("/^\/lkick\s(.+)/",$message,$res)) {
        if($user->lvl >= 4){
        if (!preg_match("/(\[id\d+|.+\])\s+(.+)/",$res[1],$res)){
        gomsg("/lkick @упоминание причина",$data);
        return;
        }
        if($user->type == "all"){
        $prichine = $res[2];
        $kick_id = mb_substr($message ,7); // еще раз обрезаем и получаем все что написано после /kick_
        $kick_id = explode("|", mb_substr($kick_id, 3))[0]; // Делитель |, обрезаем первые 3 символа (@id) и получаем чистый ID :-)
        $kickid = R::findOne('users','vkid = ?',array($kick_id));
        if($user->lvl > $kickid->lvl){
            $zamkick = R::findOne('leaders','vkid = ?',array($kick_id));
            if($zamkick->gang == "East Side Ballas" OR $zamkick->gang == "Grove Street Families" OR $zamkick->gang == "Los Santos Vagos" OR $zamkick->gang == "The Rifa" OR $zamkick->gang == "Varrios Los Aztecas"){
            $vk->request('messages.removeChatUser', ['chat_id' => 4, 'member_id' => $kick_id]);
            $vk->sendMessage(2000000004, "@id$id ($user->nick) кикнул @id$kick_id ($kickid->nick) причина: $prichine");
            $vk->request('messages.removeChatUser', ['chat_id' => 5, 'member_id' => $kick_id]);
            $vk->sendMessage(2000000005, "@id$id ($user->nick) кикнул @id$kick_id ($kickid->nick) причина: $prichine");
            $vk->request('messages.removeChatUser', ['chat_id' => 6, 'member_id' => $kick_id]);
            $vk->sendMessage(2000000006, "@id$id ($user->nick) кикнул @id$kick_id ($kickid->nick) причина: $prichine");
            // 9-ки лидеро
            $konf = R::findOne('konfs','kfid = ?',array(2000000006));
            $vk->sendMessage($peer_id, "@id$kick_id ($kickid->nick) кикнут из кф: $konf->name ✅");
            $konf = R::findOne('konfs','kfid = ?',array(2000000005));
            $vk->sendMessage($peer_id, "@id$kick_id ($kickid->nick) кикнут из кф: $konf->name ✅");
            $konf = R::findOne('konfs','kfid = ?',array(2000000004));
            $vk->sendMessage($peer_id, "@id$kick_id ($kickid->nick) кикнут из кф: $konf->name ✅");
            if($kickid){
                $kickid = R::load('users',$kickid->id);
                $kickid->position = 'игрок';
                $kickid->lvl = 1;
                R::store($kickid);
            }
            $vk->request('messages.removeChatUser', ['chat_id' => 4, 'member_id' => $zamkick->firstzam]);
            $vk->request('messages.removeChatUser', ['chat_id' => 6, 'member_id' => $zamkick->firstzam]);
            $vk->request('messages.removeChatUser', ['chat_id' => 4, 'member_id' => $zamkick->secondzam]);
            $vk->request('messages.removeChatUser', ['chat_id' => 6, 'member_id' => $zamkick->secondzam]);
            $vk->request('messages.removeChatUser', ['chat_id' => 4, 'member_id' => $zamkick->thirdzam]);
            $vk->request('messages.removeChatUser', ['chat_id' => 6, 'member_id' => $zamkick->thirdzam]);
            $vk->request('messages.removeChatUser', ['chat_id' => 4, 'member_id' => $zamkick->fourzam]);
            $vk->request('messages.removeChatUser', ['chat_id' => 6, 'member_id' => $zamkick->fourzam]);
            if($zamkick){
                $zamkick = R::load('leaders',$zamkick->id);
                $olss = $zamkick->nick;
                $zamkick->nick = 'free';
                $zamkick->strong = 0;
                $zamkick->vkid = 0;
                $zamkick->oral = 0;
                $zamkick->score = 0;
                $zamkick->firstzam = 0;
                $zamkick->secondzam = 0;
                $zamkick->thirdzam = 0;
                $zamkick->fourzam = 0;
                $zamkick->postavul = '01.01.1991';
                $zamkick->snyal = '01.01.1991';
                R::store($zamkick);
                R::exec('DELETE FROM `onlines` WHERE `nick` = ?', array($olss));
                $vk->sendMessage($peer_id, "Доступ, замов, лидера почистил в бд✅");
                $logleader = R::load('logleader',NULL);
                $logleader->nickadm = $user->nick;
                $logleader->nickleader = $olss;
                $logleader->postavlen = 1;
                $logleader->reason = $prichine;
                $logleader->type = 0;
                $logleader->frac = $zamkick->gang;
                R::store($logleader);
                $vk->sendMessage($peer_id,"Подтвердите причину снятия лидера командой:<br>/rlead $logleader->id");
            }
            $vk->sendMessage($peer_id, "Доступ, замов, лидера почистил в бд✅");
            }
            if($zamkick->gang == "Warlock MC" OR $zamkick->gang == "Russian Mafia" OR $zamkick->gang == "La Cosa Nostra" OR $zamkick->gang == "Yakuza"){
            $prichine = $res[2];
            $kick_id = mb_substr($message ,7); // еще раз обрезаем и получаем все что написано после /kick_
            $kick_id = explode("|", mb_substr($kick_id, 3))[0]; // Делитель |, обрезаем первые 3 символа (@id) и получаем чистый ID :-)
            $kickid = R::findOne('users','vkid = ?',array($kick_id));
            if($user->lvl > $kickid->lvl){
            $vk->request('messages.removeChatUser', ['chat_id' => 20, 'member_id' => $kick_id]);
            $vk->sendMessage(2000000020, "@id$id ($user->nick) кикнул @id$kick_id ($kickid->nick) причина: $prichine");
            $vk->request('messages.removeChatUser', ['chat_id' => 19, 'member_id' => $kick_id]);
            $vk->sendMessage(2000000019, "@id$id ($user->nick) кикнул @id$kick_id ($kickid->nick) причина: $prichine");
            $vk->request('messages.removeChatUser', ['chat_id' => 18, 'member_id' => $kick_id]);
            $vk->sendMessage(2000000018, "@id$id ($user->nick) кикнул @id$kick_id ($kickid->nick) причина: $prichine");
            // 9-ки лидеро
            $konf = R::findOne('konfs','kfid = ?',array(2000000018));
            $vk->sendMessage($peer_id, "@id$kick_id ($kickid->nick) кикнут из кф: $konf->name ✅");
            $konf = R::findOne('konfs','kfid = ?',array(2000000020));
            $vk->sendMessage($peer_id, "@id$kick_id ($kickid->nick) кикнут из кф: $konf->name ✅");
            $konf = R::findOne('konfs','kfid = ?',array(2000000019));
            $vk->sendMessage($peer_id, "@id$kick_id ($kickid->nick) кикнут из кф: $konf->name ✅");
            if($kickid){
                $kickid = R::load('users',$kickid->id);
                $kickid->position = 'игрок';
                $kickid->lvl = 1;
                R::store($kickid);
            }
            $zamkick = R::findOne('leaders','vkid = ?',array($kick_id));
            $vk->request('messages.removeChatUser', ['chat_id' => 20, 'member_id' => $zamkick->firstzam]);
            $vk->request('messages.removeChatUser', ['chat_id' => 19, 'member_id' => $zamkick->firstzam]);
            $vk->request('messages.removeChatUser', ['chat_id' => 20, 'member_id' => $zamkick->secondzam]);
            $vk->request('messages.removeChatUser', ['chat_id' => 19, 'member_id' => $zamkick->secondzam]);
            $vk->request('messages.removeChatUser', ['chat_id' => 20, 'member_id' => $zamkick->thirdzam]);
            $vk->request('messages.removeChatUser', ['chat_id' => 19, 'member_id' => $zamkick->thirdzam]);
            $vk->request('messages.removeChatUser', ['chat_id' => 20, 'member_id' => $zamkick->fourzam]);
            $vk->request('messages.removeChatUser', ['chat_id' => 19, 'member_id' => $zamkick->fourzam]);
            if($zamkick){
                $zamkick = R::load('leaders',$zamkick->id);
                $olss = $zamkick->nick;
                $zamkick->nick = 'free';
                $zamkick->strong = 0;
                $zamkick->vkid = 0;
                $zamkick->oral = 0;
                $zamkick->score = 0;
                $zamkick->firstzam = 0;
                $zamkick->secondzam = 0;
                $zamkick->thirdzam = 0;
                $zamkick->fourzam = 0;
                $zamkick->postavul = '01.01.1991';
                $zamkick->snyal = '01.01.1991';
                R::store($zamkick);
                R::exec('DELETE FROM `onlines` WHERE `nick` = ?', array($olss));
                $vk->sendMessage($peer_id, "Доступ, замов, лидера почистил в бд✅");
                $logleader = R::load('logleader',NULL);
                $logleader->nickadm = $user->nick;
                $logleader->nickleader = $olss;
                $logleader->postavlen = 1;
                $logleader->reason = $prichine;
                $logleader->type = 0;
                $logleader->frac = $zamkick->gang;
                R::store($logleader);
                $vk->sendMessage($peer_id,"Подтвердите причину снятия лидера командой:<br>/rlead $logleader->id");
            }
            $vk->sendMessage($peer_id, "Доступ, замов, лидера почистил в бд✅");
            }
        }
    }else{$vk->sendMessage($peer_id,"Вы не можете кикнуть данного пользователя(возможно вы пытаетесь кикнуть себя или выше по доступу пользователя)");}
        }
        if($user->type == "гетто"){
        $prichine = $res[2];
        $kick_id = mb_substr($message ,7); // еще раз обрезаем и получаем все что написано после /kick_
        $kick_id = explode("|", mb_substr($kick_id, 3))[0]; // Делитель |, обрезаем первые 3 символа (@id) и получаем чистый ID :-)
        $kickid = R::findOne('users','vkid = ?',array($kick_id));
        if($user->lvl > $kickid->lvl){
        $vk->request('messages.removeChatUser', ['chat_id' => 4, 'member_id' => $kick_id]);
        $vk->sendMessage(2000000004, "@id$id ($user->nick) кикнул @id$kick_id ($kickid->nick) причина: $prichine");
        $vk->request('messages.removeChatUser', ['chat_id' => 5, 'member_id' => $kick_id]);
        $vk->sendMessage(2000000005, "@id$id ($user->nick) кикнул @id$kick_id ($kickid->nick) причина: $prichine");
        $vk->request('messages.removeChatUser', ['chat_id' => 6, 'member_id' => $kick_id]);
        $vk->sendMessage(2000000006, "@id$id ($user->nick) кикнул @id$kick_id ($kickid->nick) причина: $prichine");
        // 9-ки лидеро
        $konf = R::findOne('konfs','kfid = ?',array(2000000006));
        $vk->sendMessage($peer_id, "@id$kick_id ($kickid->nick) кикнут из кф: $konf->name ✅");
        $konf = R::findOne('konfs','kfid = ?',array(2000000005));
        $vk->sendMessage($peer_id, "@id$kick_id ($kickid->nick) кикнут из кф: $konf->name ✅");
        $konf = R::findOne('konfs','kfid = ?',array(2000000004));
        $vk->sendMessage($peer_id, "@id$kick_id ($kickid->nick) кикнут из кф: $konf->name ✅");
        if($kickid){
            $kickid = R::load('users',$kickid->id);
            $kickid->position = 'игрок';
            $kickid->lvl = 1;
            R::store($kickid);
        }
        $zamkick = R::findOne('leaders','vkid = ?',array($kick_id));
        $vk->request('messages.removeChatUser', ['chat_id' => 4, 'member_id' => $zamkick->firstzam]);
        $vk->request('messages.removeChatUser', ['chat_id' => 6, 'member_id' => $zamkick->firstzam]);
        $vk->request('messages.removeChatUser', ['chat_id' => 4, 'member_id' => $zamkick->secondzam]);
        $vk->request('messages.removeChatUser', ['chat_id' => 6, 'member_id' => $zamkick->secondzam]);
        $vk->request('messages.removeChatUser', ['chat_id' => 4, 'member_id' => $zamkick->thirdzam]);
        $vk->request('messages.removeChatUser', ['chat_id' => 6, 'member_id' => $zamkick->thirdzam]);
        $vk->request('messages.removeChatUser', ['chat_id' => 4, 'member_id' => $zamkick->fourzam]);
        $vk->request('messages.removeChatUser', ['chat_id' => 6, 'member_id' => $zamkick->fourzam]);
        if($zamkick){
            $zamkick = R::load('leaders',$zamkick->id);
            $olss = $zamkick->nick;
            $zamkick->nick = 'free';
            $zamkick->strong = 0;
            $zamkick->vkid = 0;
            $zamkick->oral = 0;
            $zamkick->score = 0;
            $zamkick->firstzam = 0;
            $zamkick->secondzam = 0;
            $zamkick->thirdzam = 0;
            $zamkick->fourzam = 0;
            $zamkick->postavul = '01.01.1991';
            $zamkick->snyal = '01.01.1991';
            R::store($zamkick);
            R::exec('DELETE FROM `onlines` WHERE `nick` = ?', array($olss));
            $vk->sendMessage($peer_id, "Доступ, замов, лидера почистил в бд✅");
            $logleader = R::load('logleader',NULL);
            $logleader->nickadm = $user->nick;
            $logleader->nickleader = $olss;
            $logleader->postavlen = 1;
            $logleader->reason = $prichine;
            $logleader->type = 0;
            $logleader->frac = $zamkick->gang;
            R::store($logleader);
            $vk->sendMessage($peer_id,"Подтвердите причину снятия лидера командой:<br>/rlead $logleader->id");
        }
        $vk->sendMessage($peer_id, "Доступ, замов, лидера почистил в бд✅");
        }else{$vk->sendMessage($peer_id,"Вы не можете кикнуть данного пользователя(возможно вы пытаетесь кикнуть себя или выше по доступу пользователя)");}
        }
        if($user->type == "мафии"){
        $prichine = $res[2];
        $kick_id = mb_substr($message ,7); // еще раз обрезаем и получаем все что написано после /kick_
        $kick_id = explode("|", mb_substr($kick_id, 3))[0]; // Делитель |, обрезаем первые 3 символа (@id) и получаем чистый ID :-)
        $kickid = R::findOne('users','vkid = ?',array($kick_id));
        if($user->lvl > $kickid->lvl){
        $vk->request('messages.removeChatUser', ['chat_id' => 20, 'member_id' => $kick_id]);
        $vk->sendMessage(2000000020, "@id$id ($user->nick) кикнул @id$kick_id ($kickid->nick) причина: $prichine");
        $vk->request('messages.removeChatUser', ['chat_id' => 19, 'member_id' => $kick_id]);
        $vk->sendMessage(2000000019, "@id$id ($user->nick) кикнул @id$kick_id ($kickid->nick) причина: $prichine");
        $vk->request('messages.removeChatUser', ['chat_id' => 18, 'member_id' => $kick_id]);
        $vk->sendMessage(2000000018, "@id$id ($user->nick) кикнул @id$kick_id ($kickid->nick) причина: $prichine");
        // 9-ки лидеро
        $konf = R::findOne('konfs','kfid = ?',array(2000000020));
        $vk->sendMessage($peer_id, "@id$kick_id ($kickid->nick) кикнут из кф: $konf->name ✅");
        $konf = R::findOne('konfs','kfid = ?',array(2000000019));
        $vk->sendMessage($peer_id, "@id$kick_id ($kickid->nick) кикнут из кф: $konf->name ✅");
        $konf = R::findOne('konfs','kfid = ?',array(2000000018));
        $vk->sendMessage($peer_id, "@id$kick_id ($kickid->nick) кикнут из кф: $konf->name ✅");
        if($kickid){
            $kickid = R::load('users',$kickid->id);
            $kickid->position = 'игрок';
            $kickid->lvl = 1;
            R::store($kickid);
        }
        $zamkick = R::findOne('leaders','vkid = ?',array($kick_id));
        $vk->request('messages.removeChatUser', ['chat_id' => 20, 'member_id' => $zamkick->firstzam]);
        $vk->request('messages.removeChatUser', ['chat_id' => 19, 'member_id' => $zamkick->firstzam]);
        $vk->request('messages.removeChatUser', ['chat_id' => 20, 'member_id' => $zamkick->secondzam]);
        $vk->request('messages.removeChatUser', ['chat_id' => 19, 'member_id' => $zamkick->secondzam]);
        $vk->request('messages.removeChatUser', ['chat_id' => 20, 'member_id' => $zamkick->thirdzam]);
        $vk->request('messages.removeChatUser', ['chat_id' => 19, 'member_id' => $zamkick->thirdzam]);
        $vk->request('messages.removeChatUser', ['chat_id' => 20, 'member_id' => $zamkick->fourzam]);
        $vk->request('messages.removeChatUser', ['chat_id' => 19, 'member_id' => $zamkick->fourzam]);
        if($zamkick){
            $zamkick = R::load('leaders',$zamkick->id);
            $olss = $zamkick->nick;
            $zamkick->nick = 'free';
            $zamkick->strong = 0;
            $zamkick->vkid = 0;
            $zamkick->oral = 0;
            $zamkick->score = 0;
            $zamkick->firstzam = 0;
            $zamkick->secondzam = 0;
            $zamkick->thirdzam = 0;
            $zamkick->fourzam = 0;
            $zamkick->postavul = '01.01.1991';
            $zamkick->snyal = '01.01.1991';
            R::store($zamkick);
            R::exec('DELETE FROM `onlines` WHERE `nick` = ?', array($olss));
            $vk->sendMessage($peer_id, "Доступ, замов, лидера почистил в бд✅");
            $logleader = R::load('logleader',NULL);
            $logleader->nickadm = $user->nick;
            $logleader->nickleader = $olss;
            $logleader->postavlen = 1;
            $logleader->reason = $prichine;
            $logleader->type = 0;
            $logleader->frac = $zamkick->gang;
            R::store($logleader);
            $vk->sendMessage($peer_id,"Подтвердите причину снятия лидера командой:<br>/rlead $logleader->id");
        }
        $vk->sendMessage($peer_id, "Доступ, замов, лидера почистил в бд✅");
        }else{$vk->sendMessage($peer_id,"Вы не можете кикнуть данного пользователя(возможно вы пытаетесь кикнуть себя или выше по доступу пользователя)");}
    }

    if($user->type == "гос"){
        $vk->sendMessage($peer_id, "Ваш ещё не доступна команда кикнуть лидера с кф");
        /*
        $prichine = $res[2];
        $kick_id = mb_substr($message ,7); // еще раз обрезаем и получаем все что написано после /kick_
        $kick_id = explode("|", mb_substr($kick_id, 3))[0]; // Делитель |, обрезаем первые 3 символа (@id) и получаем чистый ID :-)
        $kickid = R::findOne('users','vkid = ?',array($kick_id));
        if($user->lvl > $kickid->lvl){
        $vk->request('messages.removeChatUser', ['chat_id' => 20, 'member_id' => $kick_id]);
        $vk->sendMessage(2000000020, "@id$id ($user->nick) кикнул @id$kick_id ($kickid->nick) причина: $prichine");
        $vk->request('messages.removeChatUser', ['chat_id' => 19, 'member_id' => $kick_id]);
        $vk->sendMessage(2000000019, "@id$id ($user->nick) кикнул @id$kick_id ($kickid->nick) причина: $prichine");
        $vk->request('messages.removeChatUser', ['chat_id' => 18, 'member_id' => $kick_id]);
        $vk->sendMessage(2000000018, "@id$id ($user->nick) кикнул @id$kick_id ($kickid->nick) причина: $prichine");
        // 9-ки лидеро
        $konf = R::findOne('konfs','kfid = ?',array(2000000020));
        $vk->sendMessage($peer_id, "@id$kick_id ($kickid->nick) кикнут из кф: $konf->name ✅");
        $konf = R::findOne('konfs','kfid = ?',array(2000000019));
        $vk->sendMessage($peer_id, "@id$kick_id ($kickid->nick) кикнут из кф: $konf->name ✅");
        $konf = R::findOne('konfs','kfid = ?',array(2000000018));
        $vk->sendMessage($peer_id, "@id$kick_id ($kickid->nick) кикнут из кф: $konf->name ✅");
        if($kickid){
            $kickid = R::load('users',$kickid->id);
            $kickid->position = 'игрок';
            $kickid->lvl = 1;
            R::store($kickid);
        }
        $zamkick = R::findOne('leaders','vkid = ?',array($kick_id));
        $vk->request('messages.removeChatUser', ['chat_id' => 20, 'member_id' => $zamkick->firstzam]);
        $vk->request('messages.removeChatUser', ['chat_id' => 19, 'member_id' => $zamkick->firstzam]);
        $vk->request('messages.removeChatUser', ['chat_id' => 20, 'member_id' => $zamkick->secondzam]);
        $vk->request('messages.removeChatUser', ['chat_id' => 19, 'member_id' => $zamkick->secondzam]);
        $vk->request('messages.removeChatUser', ['chat_id' => 20, 'member_id' => $zamkick->thirdzam]);
        $vk->request('messages.removeChatUser', ['chat_id' => 19, 'member_id' => $zamkick->thirdzam]);
        $vk->request('messages.removeChatUser', ['chat_id' => 20, 'member_id' => $zamkick->fourzam]);
        $vk->request('messages.removeChatUser', ['chat_id' => 19, 'member_id' => $zamkick->fourzam]);
        if($zamkick){
            $zamkick = R::load('leaders',$zamkick->id);
            $zamkick->nick = 'free';
            $zamkick->strong = 0;
            $zamkick->vkid = 0;
            $zamkick->oral = 0;
            $zamkick->score = 0;
            $zamkick->firstzam = 0;
            $zamkick->secondzam = 0;
            $zamkick->thirdzam = 0;
            $zamkick->fourzam = 0;
            $zamkick->postavul = '01.01.1991';
            $zamkick->snyal = '01.01.1991';
            R::store($zamkick);
        }
        $vk->sendMessage($peer_id, "Доступ, замов, лидера почистил в бд✅");
        }else{$vk->sendMessage($peer_id,"Вы не можете кикнуть данного пользователя(возможно вы пытаетесь кикнуть себя или выше по доступу пользователя)");}
        */
    }


}else{$vk->sendMessage($peer_id,"У вас нет прав");}
}
}




if ($data->type == 'message_new') { // команда /setd изменить лвл доступа
        if (preg_match("/^\/setd\s(.+)/",$message,$lvlo)) {
            if($user->lvl >= 6){
            if (!preg_match("/(\[id\d+|.+\])\s+(\d+)/",$lvlo[1],$lvlo)){
            if($user->lvl == 6){
                gomsg("/setd @упоминание уровень доступа[1-5]",$data);
                return;
            }
            if($user->lvl == 7){
                gomsg("/setd @упоминание уровень доступа[1-6]",$data);
                return;
            }
            if($user->lvl == 8){
                gomsg("/setd @упоминание уровень доступа[1-7]",$data);
                return;
            }
            if($user->lvl == 9){
                gomsg("/setd @упоминание уровень доступа[1-8]",$data);
                return;
            }
            }

            $changelvl = $lvlo[2];
            if($changelvl < 11){
            if (idbyname($lvlo[1])){}
            $setd_new = mb_substr($message ,6); // еще раз обрезаем и получаем все что написано после /kick_
            $setd_new = explode("|", mb_substr($setd_new, 3))[0]; // Делитель |, обрезаем первые 3 символа (@id) и получаем чистый ID :-)
            $setdnew = R::findOne('users','vkid = ?',array($setd_new));
            if(!($setd_new == 297011258)){
            if(!($setdnew->lvl >= $user->lvl)){
            if($setdnew){
                $setdnew->lvl = $changelvl;
                if($changelvl == 1){$setdnew->position = "Игрок";}
                if($changelvl == 4){$setdnew->position = "Помощник следящего";}
                if($changelvl == 3){$setdnew->position = "И.О Помощника следящего";}
                if($changelvl == 5){$setdnew->position = "Следящий";}
                R::store($setdnew);
                }
                $vk->sendMessage($peer_id,"@id$setdnew->vkid ($setdnew->nick) получил $changelvl уровень доступа");

            }else{$vk->sendMessage($peer_id,"Вы не можете изменить уровень доступа выше или равен вашему");}
        }else{$vk->sendMessage($peer_id,"Вы не можете изменить данному пользователю лвл доступа");}

        }
            else{$vk->sendMessage($peer_id,"Укажите уровень доступа от 1 до 9");}
            }
            else{$vk->sendMessage($peer_id,"У вас нет прав");}
        }

        }


        if ($data->type == 'message_new') {
        if (preg_match("/^\/settype\s(.+)/",$message,$lvlo)) {
            if($user->lvl >= 6){
            if (!preg_match("/(\[id\d+|.+\])\s+(.+)/",$lvlo[1],$lvlo)){
                $vk->sendMessage($peer_id,"/settype [@idvk] [гетто/мафии]");
            }else{
            $setd_new = mb_substr($message ,9); // еще раз обрезаем и получаем все что написано после /kick_
            $setd_new = explode("|", mb_substr($setd_new, 3))[0]; // Делитель |, обрезаем первые 3 символа (@id) и получаем чистый ID :-)
            $setdnew = R::findOne('users','vkid = ?',array($setd_new));
            $changelvl = $lvlo[2];
                if($user->lvl >= 6 AND $user->lvl < 10){
                if($changelvl == 'гетто'){
                $setdnew->type = 'гетто';
                R::store($setdnew);
                $vk->sendMessage($peer_id,"@id$setdnew->vkid ($setdnew->nick) установлен type: $changelvl");
                }
                if($changelvl == 'мафии'){
                $setdnew->type = 'мафии';
                R::store($setdnew);
                $vk->sendMessage($peer_id,"@id$setdnew->vkid ($setdnew->nick) установлен type: $changelvl");
                }
                if($changelvl == 'гос'){
                $setdnew->type = 'гос';
                R::store($setdnew);
                $vk->sendMessage($peer_id,"@id$setdnew->vkid ($setdnew->nick) установлен type: $changelvl");
                }
                if(!($changelvl == 'гетто' OR $changelvl == 'мафии' OR $changelvl == 'гос')){
                $vk->sendMessage($peer_id,"Используйте /settype [@idvk] [гетто/мафии/гос]");
                }
                }

            if($user->lvl == 10){
                if($changelvl == 'гетто'){
                    $setdnew->type = 'гетто';
                    R::store($setdnew);
                    $vk->sendMessage($peer_id,"@id$setdnew->vkid ($setdnew->nick) установлен type: $changelvl");
                }
                if($changelvl == 'мафии'){
                    $setdnew->type = 'мафии';
                    R::store($setdnew);
                    $vk->sendMessage($peer_id,"@id$setdnew->vkid ($setdnew->nick) установлен type: $changelvl");
                }
                if($changelvl == 'all'){
                    $setdnew->type = 'all';
                    R::store($setdnew);
                    $vk->sendMessage($peer_id,"@id$setdnew->vkid ($setdnew->nick) установлен type: $changelvl");
                }
                if($changelvl == 'гос'){
                $setdnew->type = 'гос';
                R::store($setdnew);
                $vk->sendMessage($peer_id,"@id$setdnew->vkid ($setdnew->nick) установлен type: $changelvl");
                }
            }
            }
        }else{$vk->sendMessage($peer_id,"У вас нет прав");}
        }
        }
// ====================== НАЗНАЧИТЬ ЛИДЕРА + ДОБАВИТЬ ЗАМОВ=========================
// ====================== НАЗНАЧИТЬ ЛИДЕРА + ДОБАВИТЬ ЗАМОВ=========================
// ====================== НАЗНАЧИТЬ ЛИДЕРА + ДОБАВИТЬ ЗАМОВ=========================
// ====================== НАЗНАЧИТЬ ЛИДЕРА + ДОБАВИТЬ ЗАМОВ=========================
// ====================== НАЗНАЧИТЬ ЛИДЕРА + ДОБАВИТЬ ЗАМОВ=========================
if ($data->type == 'message_new') { // команда /setleader - установить нового лидера
    if (preg_match("/^\/removeleader\s(.+)/",$message,$lid)) {
    if($user->lvl >= 4){
    if (!preg_match("/(\[id\d+|.+\])/",$lid[1],$lid)){
    gomsg("/removeleader [@idvk]",$data);
    return;
    }
    $new_lid = mb_substr($message ,14); // еще раз обрезаем и получаем все что написано после /kick_
    $new_lid = explode("|", mb_substr($new_lid, 3))[0]; // Делитель |, обрезаем первые 3 символа (@id) и получаем чистый ID :-)
    $newlid = R::findOne('users','vkid = ?',array($new_lid));
    if($newlid){
    $newlid->position = 'игрок';
    $newlid->lvl = 1;
    R::store($newlid);
    }
    $leader = R::findOne('leaders','vkid = ?',array($new_lid));
    $oldleader = $leader->gang;
    if($leader){
    $leader->nick = 'free';
    $leader->postavul = "01.01.1991";
    $leader->snyal = "01.01.1991";
    $leader->vkid = 0;
    $leader->strong = 0;
    $leader->oral = 0;
    $leader->score = 0;
    R::store($leader);
    }
    $vk->sendMessage($peer_id,"@id$id($user->nick) снял лидера $oldleader - @id$new_lid($newlid->nick) ");
}else{$vk->sendMessage($peer_id,"У вас нет прав");}
}
}


if ($data->type == 'message_new') { // команда /setleader - установить нового лидера
    if (preg_match("/^\/setleader\s(.+)/",$message,$lid)) {
    if($user->lvl >= 4){
    if (!preg_match("/(\[id\d+|.+\])\s+(.+)/",$lid[1],$lid)){
    gomsg("/setleader @упоминание банда",$data);
    return;
    }
    $setlid = $lid[2];
   // if(!($setlid == ballas OR $setlid == grove OR $setlid == vagos OR $setlid == rifa OR $setlid == aztec OR $setlid == wolves OR $setlid == игрок)){
    if(!($setlid == ballas OR $setlid == grove OR $setlid == vagos OR $setlid == rifa OR $setlid == aztec OR $setlid == игрок OR $setlid == warlock OR $setlid == rm OR $setlid == lcn OR $setlid == yakuza OR $setlid == lspd OR $setlid == sfpd OR $setlid == lvpd OR $setlid == rcsd OR $setlid == lsmc OR $setlid == sfmc OR $setlid == lvmc OR $setlid == gov OR $setlid == гцл OR $setlid == cb OR $setlid == lsa OR $setlid == sfa OR $setlid == тср OR $setlid == cnnls OR $setlid == cnnsf OR $setlid == cnnlv OR $setlid == fbi OR $setlid == nw)){
    gomsg("Введите ballas/grove/vagos/rifa/nw/aztec/warlock/rm/lcn/yakuza/lspd/sfpd/lvpd/rcsd/lsmc/sfmc/lvmc/gov/гцл/cb/lsa/sfa/тср/cnnls/cnnsf/cnnlv/fbi",$data);
    return;
    }
    else{
                    if($setlid == игрок){
                        $setlid = 'игрок';
                        $new_lid = mb_substr($message ,11); // еще раз обрезаем и получаем все что написано после /kick_
                        $new_lid = explode("|", mb_substr($new_lid, 3))[0]; // Делитель |, обрезаем первые 3 символа (@id) и получаем чистый ID :-)
                        $newlid = R::findOne('users','vkid = ?',array($new_lid));
                        $oldlid = $newlid->position;

                        if($newlid){
                        $newlid->position = $setlid;
                        $newlid->lvl = 1;
                        R::store($newlid);
                        }
                        if(!($oldlid == 'Главный следящий за Гетто' OR $oldlid == 'Главный следящий за Мафиями')){
                        $vk->sendMessage($peer_id,"@id$id($user->nick) снял @id$new_lid($newlid->nick) c поста лидера банды $oldlid");
                        }else{
                            if($oldlid == 'Главный следящий за Гетто'){$oldlid = 'Главного следящего за Гетто';}
                            if($oldlid == 'Главный следящий за Мафиями'){$oldlid = 'Главного следящего за Мафиями';}
                            $vk->sendMessage($peer_id,"@id$new_lid($newlid->nick) снят с поста $oldlid");
                        }
                    }else{
                        $ffl = $setlid;
                if($setlid == ballas){$setlid = 'East Side Ballas';}
                if($setlid == grove){$setlid = 'Grove Street Families';}
                if($setlid == vagos){$setlid = 'Los Santos Vagos';}
                if($setlid == rifa){$setlid = 'The Rifa';}
                if($setlid == aztec){$setlid = 'Varrios Los Aztecas';}
                if($setlid == nw){$setlid = 'Night Wolves';}

                if($setlid == warlock){$setlid = 'Warlock MC';}
                if($setlid == rm){$setlid = 'Russian Mafia';}
                if($setlid == lcn){$setlid = 'La Cosa Nostra';}
                if($setlid == yakuza){$setlid = 'Yakuza';}

                if($setlid == lspd){$setlid = 'Los-Santos Police Departament';}
                if($setlid == sfpd){$setlid = 'San-Fierro Police Departament';}
                if($setlid == lvpd){$setlid = 'Las-Venturas Police Departament';}
                if($setlid == rcsd){$setlid = 'Red-County Sherieff Departament';}
                if($setlid == lsmc){$setlid = 'Los-Santos Medical Center';}
                if($setlid == sfmc){$setlid = 'San-Fierro Medical Center';}
                if($setlid == lvmc){$setlid = 'Las-Venturas Medical Center';}
                if($setlid == gov){$setlid = 'Government';}
                if($setlid == гцл){$setlid = 'Autoschool';}
                if($setlid == cb){$setlid = 'Central Bank';}
                if($setlid == lsa){$setlid = 'Los-Santos Army';}
                if($setlid == sfa){$setlid = 'San-Fierro Army';}
                if($setlid == тср){$setlid = 'Maximum Security Prison';}
                if($setlid == cnnls){$setlid = 'Los-Santos Radio Center';}
                if($setlid == cnnsf){$setlid = 'San-Fierro Radio Center';}
                if($setlid == cnnlv){$setlid = 'Las-Venturas Radio Center';}
                if($setlid == fbi){$setlid = 'Federal Bureau of Investigation';}
                if (idbyname($lid[1]))
                $new_lid = mb_substr($message ,11); // еще раз обрезаем и получаем все что написано после /kick_
                $new_lid = explode("|", mb_substr($new_lid, 3))[0]; // Делитель |, обрезаем первые 3 символа (@id) и получаем чистый ID :-)
                $newlid = R::findOne('users','vkid = ?',array($new_lid));
                if($newlid){
                $newlid->position = $setlid;
                $newlid->lvl = 2;
                R::store($newlid);
                }
                $today = date("j.n.Y");
                $leader = R::findOne('leaders','gang = ?',array($setlid));
                if($leader){
                $leader->nick = $newlid->nick;
                $leader->postavul = $today;
                $leader->vkid = $new_lid;
                $leader->strong = 0;
                $leader->oral = 0;
                $leader->score = 0;
                R::store($leader);
                $logleader = R::load('logleader',NULL);
                $logleader->nickadm = $user->nick;
                $logleader->nickleader = $newlid->nick;
                $logleader->postavlen = 1;
                $logleader->reason = "none";
                $logleader->type = 0;
                $logleader->frac = $ffl;
                R::store($logleader);
                $upd = R::load('onlines',NULL);
                $upd->nick = $newlid->nick;
                R::store($upd);
                }
                $logleader = R::findOne('logleader','nickleader = ?',array($newlid->nick));
                $vk->sendMessage($peer_id,"@id$id($user->nick) назначил @id$new_lid($newlid->nick) на пост лидера $setlid");
                $vk->sendMessage($peer_id,"Укажите каким способом игрок назначен на лидерк, используйте кмд в кф следящих:<br>/flead $logleader->id обзвон<br>/flead $logleader->id передача<br>/flead $logleader->id врио");
            }
        }
            }else{$vk->sendMessage($peer_id,"У вас нет прав");}
                }}












if ($data->type == 'message_new') { // команда внести зама
                    if (preg_match("/^\/addzam\s(.+)/",$message,$pred)) {
                        $lid = R::findOne('leaders','vkid = ?',array($user->vkid));
                        if($user->lvl == 2 AND $lid->type == 'нелегал'){
                            if (!preg_match("/(\[id\d+|.+\])/",$pred[1],$pred)){
                                gomsg("/addzam [@idvk]",$data);
                                return;
                                }
                                $new_zam = mb_substr($message ,8); // еще раз обрезаем и получаем все что написано после /kick_
                                $new_zam = explode("|", mb_substr($new_zam, 3))[0]; // Делитель |, обрезаем первые 3 символа (@id) и получаем чистый ID :-)
                                $predsid = R::findOne('leaders','vkid = ?',array($user->vkid));
                                if($predsid){
                                    R::load('leaders',$user->vkid);
                                    if(!($predsid->firstzam == $new_zam OR $predsid->secondzam == $new_zam OR $predsid->thirdzam == $new_zam OR $predsid->fourzam == $new_zam)){
                                    if(!($predsid->firstzam == 0)){
                                        if(!($predsid->secondzam == 0)){
                                            if(!($predsid->thirdzam == 0)){
                                                if(!($predsid->fourzam == 0)){
                                                    $vk->sendMessage($peer_id,"У вас уже 4+ зама!");
                                                }else{
                                                    $predsid->fourzam = $new_zam;
                                                    R::store($predsid);
                                                    $vk->sendMessage($peer_id,"@id$new_zam внесен как 9ка банды $predsid->gang");
                                                }
                                            }else{
                                                $predsid->thirdzam = $new_zam;
                                                R::store($predsid);
                                                $vk->sendMessage($peer_id,"@id$new_zam внесен как 9ка банды $predsid->gang");
                                            }
                                        }else{
                                            $predsid->secondzam = $new_zam;
                                            R::store($predsid);
                                            $vk->sendMessage($peer_id,"@id$new_zam внесен как 9ка банды $predsid->gang");
                                        }
                                    }else{
                                        $predsid->firstzam = $new_zam;
                                        R::store($predsid);
                                        $vk->sendMessage($peer_id,"@id$new_zam внесен как 9ка банды $predsid->gang");
                                    }
                                }else{
                                    $vk->sendMessage($peer_id,"@id$new_zam уже внесен как 9ка банды $predsid->gang");
                                }
                                R::store($predsid);
                                }
                    }
                        if($user->lvl >= 4){
                        if (!preg_match("/(\[id\d+|.+\])\s+(.+)/",$pred[1],$pred)){
                            gomsg("/addzam [@idvk] [gang]",$data);
                            return;
                            }
                            $banda = $pred[2];
                            $new_zam = mb_substr($message ,8); // еще раз обрезаем и получаем все что написано после /kick_
                            $new_zam = explode("|", mb_substr($new_zam, 3))[0]; // Делитель |, обрезаем первые 3 символа (@id) и получаем чистый ID :-)
                            if($banda == ballas){$banda = 'East Side Ballas';}
                            if($banda == grove){$banda = 'Grove Street Families';}
                            if($banda == vagos){$banda = 'Los Santos Vagos';}
                            if($banda == rifa){$banda = 'The Rifa';}
                            if($banda == aztec){$banda = 'Varrios Los Aztecas';}
                            if($banda == warlock){$banda = 'Warlock MC';}
                            if($banda == rm){$banda = 'Russian Mafia';}
                            if($banda == lcn){$banda = 'La Cosa Nostra';}
                            if($banda == yakuza){$banda = 'Yakuza';}
                            $predsid = R::findOne('leaders','gang = ?',array($banda));
                            if($predsid){
                                R::load('leaders',$banda);
                                if(!($predsid->firstzam == $new_zam OR $predsid->secondzam == $new_zam OR $predsid->thirdzam == $new_zam OR $predsid->fourzam == $new_zam)){
                                if(!($predsid->firstzam == 0)){
                                    if(!($predsid->secondzam == 0)){
                                        if(!($predsid->thirdzam == 0)){
                                            if(!($predsid->fourzam == 0)){
                                                $vk->sendMessage($peer_id,"У лидера уже 4+ зама!");
                                            }else{
                                                $predsid->fourzam = $new_zam;
                                                R::store($predsid);
                                                $vk->sendMessage($peer_id,"@id$new_zam внесен как 9ка банды $banda");
                                            }
                                        }else{
                                            $predsid->thirdzam = $new_zam;
                                            R::store($predsid);
                                            $vk->sendMessage($peer_id,"@id$new_zam внесен как 9ка банды $banda");
                                        }
                                    }else{
                                        $predsid->secondzam = $new_zam;
                                        R::store($predsid);
                                        $vk->sendMessage($peer_id,"@id$new_zam внесен как 9ка банды $banda");
                                    }
                                }else{
                                    $predsid->firstzam = $new_zam;
                                    R::store($predsid);
                                    $vk->sendMessage($peer_id,"@id$new_zam внесен как 9ка банды $banda");
                                }
                            }else{
                                $vk->sendMessage($peer_id,"@id$new_zam уже внесен как 9ка банды $banda");
                            }
                            R::store($predsid);
                            }
                }
                }
                }

if ($data->type == 'message_new') { // команда убрать зама
                    if (preg_match("/^\/remzam\s(.+)/",$message,$pred)) {
                        if($user->lvl == 2){
                            if (!preg_match("/(\[id\d+|.+\])/",$pred[1],$pred)){
                                gomsg("/remzam [@idvk]",$data);
                                return;
                                }
                                $banda = $pred[2];
                                $new_zam = mb_substr($message ,8); // еще раз обрезаем и получаем все что написано после /kick_
                                $new_zam = explode("|", mb_substr($new_zam, 3))[0]; // Делитель |, обрезаем первые 3 символа (@id) и получаем чистый ID :-)
                                $predsid = R::findOne('leaders','vkid = ?',array($user->vkid));
                                if($predsid){
                                    R::load('leaders',$user->vkid);
                                    if(!($predsid->firstzam == $new_zam)){
                                        if(!($predsid->secondzam == $new_zam)){
                                            if(!($predsid->thirdzam == $new_zam)){
                                                if(!($predsid->fourzam == $new_zam)){
                                                    $vk->sendMessage($peer_id,"У вас нету зама с таким id$new_zam");
                                                }else{
                                                    $vk->request('messages.removeChatUser', ['chat_id' => 4, 'member_id' => $predsid->fourzam]);
                                                    $vk->request('messages.removeChatUser', ['chat_id' => 6, 'member_id' => $predsid->fourzam]);
                                                    $vk->request('messages.removeChatUser', ['chat_id' => 4, 'member_id' => $predsid->fourzam]);
                                                    $vk->request('messages.removeChatUser', ['chat_id' => 6, 'member_id' => $predsid->fourzam]);
                                                    $predsid->fourzam = 0;
                                                    R::store($predsid);
                                                    $vk->sendMessage($peer_id,"Вы сняли свою @id$new_zam(9-ку) | $predsid->gang");
                                                }
                                            }else{
                                                $vk->request('messages.removeChatUser', ['chat_id' => 4, 'member_id' => $predsid->thirdzam]);
                                                $vk->request('messages.removeChatUser', ['chat_id' => 6, 'member_id' => $predsid->thirdzam]);
                                                $vk->request('messages.removeChatUser', ['chat_id' => 20, 'member_id' => $predsid->thirdzam]);
                                                $vk->request('messages.removeChatUser', ['chat_id' => 19, 'member_id' => $predsid->thirdzam]);
                                                $predsid->thirdzam = 0;
                                                R::store($predsid);
                                                $vk->sendMessage($peer_id,"Вы сняли свою @id$new_zam(9-ку) | $predsid->gang");
                                            }
                                        }else{
                                            $vk->request('messages.removeChatUser', ['chat_id' => 4, 'member_id' => $predsid->secondzam]);
                                            $vk->request('messages.removeChatUser', ['chat_id' => 6, 'member_id' => $predsid->secondzam]);
                                            $vk->request('messages.removeChatUser', ['chat_id' => 20, 'member_id' => $predsid->secondzam]);
                                            $vk->request('messages.removeChatUser', ['chat_id' => 19, 'member_id' => $predsid->secondzam]);
                                            $predsid->secondzam = 0;
                                            R::store($predsid);
                                            $vk->sendMessage($peer_id,"Вы сняли свою @id$new_zam(9-ку) | $predsid->gang");
                                        }
                                    }else{
                                        $vk->request('messages.removeChatUser', ['chat_id' => 4, 'member_id' => $predsid->firstzam]);
                                        $vk->request('messages.removeChatUser', ['chat_id' => 6, 'member_id' => $predsid->firstzam]);
                                        $vk->request('messages.removeChatUser', ['chat_id' => 20, 'member_id' => $predsid->firstzam]);
                                        $vk->request('messages.removeChatUser', ['chat_id' => 19, 'member_id' => $predsid->firstzam]);
                                        $predsid->firstzam = 0;
                                        R::store($predsid);
                                        $vk->sendMessage($peer_id,"Вы сняли свою @id$new_zam(9-ку) | $predsid->gang");
                                    }
                                R::store($predsid);
                                }
                    }
                        if($user->lvl >= 4){
                        if (!preg_match("/(\[id\d+|.+\])\s+(.+)/",$pred[1],$pred)){
                            gomsg("/remzam [@idvk] [gang]",$data);
                            return;
                            }
                            $banda = $pred[2];
                            $new_zam = mb_substr($message ,8); // еще раз обрезаем и получаем все что написано после /kick_
                            $new_zam = explode("|", mb_substr($new_zam, 3))[0]; // Делитель |, обрезаем первые 3 символа (@id) и получаем чистый ID :-)
                            if($banda == ballas){$banda = 'East Side Ballas';}
                            if($banda == grove){$banda = 'Grove Street Families';}
                            if($banda == vagos){$banda = 'Los Santos Vagos';}
                            if($banda == nw){$banda = 'Night Wolves';}
                            if($banda == rifa){$banda = 'The Rifa';}
                            if($banda == aztec){$banda = 'Varrios Los Aztecas';}
                            if($banda == warlock){$banda = 'Warlock MC';}
                            if($banda == rm){$banda = 'Russian Mafia';}
                            if($banda == lcn){$banda = 'La Cosa Nostra';}
                            if($banda == yakuza){$banda = 'Yakuza';}
                            $predsid = R::findOne('leaders','gang = ?',array($banda));
                            if($predsid){
                                R::load('leaders',$banda);
                                if(!($predsid->firstzam == $new_zam)){
                                    if(!($predsid->secondzam == $new_zam)){
                                        if(!($predsid->thirdzam == $new_zam)){
                                            if(!($predsid->fourzam == $new_zam)){
                                                $vk->sendMessage($peer_id,"У лидера нету зама с таким id$new_zam");
                                            }else{
                                                $vk->request('messages.removeChatUser', ['chat_id' => 4, 'member_id' => $predsid->fourzam]);
                                                $vk->request('messages.removeChatUser', ['chat_id' => 6, 'member_id' => $predsid->fourzam]);
                                                $vk->request('messages.removeChatUser', ['chat_id' => 4, 'member_id' => $predsid->fourzam]);
                                                $vk->request('messages.removeChatUser', ['chat_id' => 6, 'member_id' => $predsid->fourzam]);
                                                $predsid->fourzam = 0;
                                                R::store($predsid);
                                                $vk->sendMessage($peer_id,"Вы убрали @id$new_zam(9-ку) банды $banda");
                                            }
                                        }else{
                                            $vk->request('messages.removeChatUser', ['chat_id' => 4, 'member_id' => $predsid->thirdzam]);
                                            $vk->request('messages.removeChatUser', ['chat_id' => 6, 'member_id' => $predsid->thirdzam]);
                                            $vk->request('messages.removeChatUser', ['chat_id' => 20, 'member_id' => $predsid->thirdzam]);
                                            $vk->request('messages.removeChatUser', ['chat_id' => 19, 'member_id' => $predsid->thirdzam]);
                                            $predsid->thirdzam = 0;
                                            R::store($predsid);
                                            $vk->sendMessage($peer_id,"Вы убрали @id$new_zam(9-ку) банды $banda");
                                        }
                                    }else{
                                        $vk->request('messages.removeChatUser', ['chat_id' => 4, 'member_id' => $predsid->secondzam]);
                                        $vk->request('messages.removeChatUser', ['chat_id' => 6, 'member_id' => $predsid->secondzam]);
                                        $vk->request('messages.removeChatUser', ['chat_id' => 20, 'member_id' => $predsid->secondzam]);
                                        $vk->request('messages.removeChatUser', ['chat_id' => 19, 'member_id' => $predsid->secondzam]);
                                        $predsid->secondzam = 0;
                                        R::store($predsid);
                                        $vk->sendMessage($peer_id,"Вы убрали @id$new_zam(9-ку) банды $banda");
                                    }
                                }else{
                                    $vk->request('messages.removeChatUser', ['chat_id' => 4, 'member_id' => $predsid->firstzam]);
                                    $vk->request('messages.removeChatUser', ['chat_id' => 6, 'member_id' => $predsid->firstzam]);
                                    $vk->request('messages.removeChatUser', ['chat_id' => 20, 'member_id' => $predsid->firstzam]);
                                    $vk->request('messages.removeChatUser', ['chat_id' => 19, 'member_id' => $predsid->firstzam]);
                                    $predsid->firstzam = 0;
                                    R::store($predsid);
                                    $vk->sendMessage($peer_id,"Вы убрали @id$new_zam(9-ку) банды $banda");
                                }
                            R::store($predsid);
                            }
                }
                }
                }


if ($data->type == 'message_new') { // команда /
    if($cmd == '/zams'){
        $today = date("j.n.Y");
        if($user->lvl == 2){
            $zamms = R::findOne('leaders','vkid = ?', array($user->vkid));
            if(!($zamms->firstzam == 0)){
                $zam = $zamms->firstzam;
                $zam3 = '@id';
            }
            if($zamms->firstzam == 0){
                $zam = 'Нету 1-го заместителя';
                $zam3 = '';
            }
            if(!($zamms->secondzam == 0)){
                $zam1 = $zamms->secondzam;
                $zams1 = '@id';
            }
            if($zamms->secondzam == 0){
                $zam1 = 'Нету 2-го заместителя';
                $zams1 = '';
            }
            if(!($zamms->thirdzam == 0)){
                $zam2 = $zamms->thirdzam;
                $zams2 = '@id';
            }
            if($zamms->thirdzam == 0){
                $zam2 = 'Нету 3-го заместителя';
                $zams2 = '';
            }
            if(!($zamms->fourzam == 0)){
                $zam4 = $zamms->fourzam;
                $zams4 = '@id';
            }
            if($zamms->fourzam == 0){
                $zam4 = 'Нету 4-го заместителя';
                $zams4 = '';
            }
  $vk->sendMessage($peer_id,"👹Мои заместители | $zamms->gang | $today 👹<br>$zam3$zam<br>$zams1$zam1<br>$zams2$zam2<br>$zams4$zam4");
}

if($user->lvl >= 4){
    $vk->sendMessage($peer_id,"♻Загружаем информацию♻");
    sleep(3);
    $zamms = R::loadAll('leaders',array(1,2,3,4,5,6,7,8,9,10));
    foreach($zamms as $zamss){
        sleep(1);
        if(!($zamss->firstzam == 0)){
            $zam = $zamss->firstzam;
            $zam3 = '@id';
        }
        if($zamss->firstzam == 0){
            $zam = 'Нету 1-го заместителя';
            $zam3 = '';
        }
        if(!($zamss->secondzam == 0)){
            $zam1 = $zamss->secondzam;
            $zams1 = '@id';
        }
        if($zamss->secondzam == 0){
            $zam1 = 'Нету 2-го заместителя';
            $zams1 = '';
        }
        if(!($zamss->thirdzam == 0)){
            $zam2 = $zamss->thirdzam;
            $zams2 = '@id';
        }
        if($zamss->thirdzam == 0){
            $zam2 = 'Нету 3-го заместителя';
            $zams2 = '';
        }
        if(!($zamss->fourzam == 0)){
            $zam4 = $zamss->fourzam;
            $zams4 = '@id';
        }
        if($zamss->fourzam == 0){
            $zam4 = 'Нету 4-го заместителя';
            $zams4 = '';
        }
    $vk->sendMessage($peer_id,"👹Заместители | $zamss->gang | $today 👹<br>$zam3$zam<br>$zams1$zam1<br>$zams2$zam2<br>$zams4$zam4");
    }
}
}
}


if ($data->type == 'message_new') { // команда /setgs - установить нового гс
    if (preg_match("/^\/setgs\s(.+)/",$message,$gs)) {
    if($user->lvl >= 8){
    if (!preg_match("/(\[id\d+|.+\])\s+(.+)/",$gs[1],$gs)){
    gomsg("/setgs @упоминание гетто/мафии",$data);
    return;
    }
    $setgs = $gs[2];
    if(!($setgs == гетто OR $setgs == мафии OR $setgs == гос OR $setgs == зггос OR $setgs == згсгетто OR $setgs == згсмафии)){
    gomsg("Укажите гетто/мафии/гос/згсгос/згсмафии/згсгетто",$data);
    return;
    }
    else{
    if($setgs == гетто){$setgs = 'Главный следящий за Гетто';}
    if($setgs == мафии){$setgs = 'Главный следящий за Мафиями';}
    if($setgs == гос){$setgs = 'Главный следящий за Гос. Структурами';}
    if($setgs == зггос){$setgs = 'Заместитель главного следящего за Гос. Структурами';}
    if($setgs == згсгетто){$setgs = 'Заместитель главного следящего за Гетто';}
    if($setgs == згсмафии){$setgs = 'Заместитель главного следящего за Мафиями';}
    if (idbyname($gs[1]))
    $new_gs = mb_substr($message ,7); // еще раз обрезаем и получаем все что написано после /kick_
    $new_gs = explode("|", mb_substr($new_gs, 3))[0]; // Делитель |, обрезаем первые 3 символа (@id) и получаем чистый ID :-)
    $newgs = R::findOne('users','vkid = ?',array($new_gs));
    if($newgs){
    $newgs->position = $setgs;
    $newgs->lvl = 6;
    R::store($newgs);
    }
    if($setgs == 'Главный следящий за Гетто'){$setgs = 'Главного следящего за Гетто';}
    if($setgs == 'Главный следящий за Мафиями'){$setgs = 'Главного следящего за Мафиями';}
    $vk->sendMessage($peer_id,"@id$id($user->nick) назначил @id$new_gs($newgs->nick) на пост $setgs");

    }
    }else{$vk->sendMessage($peer_id,"У вас нет прав");}
    }}
if ($data->type == 'message_new') { // команда /info - информация по нику
    if (preg_match("/^\/info\s(.+)/",$message,$inf)) {
    if($user->lvl >= 1){
    $person = $inf[1];
    if($fperson = R::findOne('users','nick = ?',array($person))){
    $posi = $fperson->position;
    if($posi == 'East Side Ballas' OR $posi == 'Grove Street Families' OR $posi == 'Los Santos Vagos' OR $posi == 'The Rifa' OR $posi == 'Varrios Los Aztecas' OR $posi == 'Night Wolves' OR $posi == 'Warlock MC' OR $posi == 'Russian Mafia' OR $posi == 'La Cosa Nostra' OR $posi == 'Yakuza' OR $posi == 'Los-Santos Police Departament' OR $posi == 'San-Fierro Police Departament' OR $posi == 'Las-Venturas Police Departament' OR $posi == 'Red-County Sherieff Departament' OR $posi == 'Los-Santos Medical Center' OR $posi == 'San-Fierro Medical Center' OR $posi == 'Las-Venturas Medical Center' OR $posi == 'Government' OR $posi == 'Autoschool' OR $posi == 'Central Bank' OR $posi == 'Los-Santos Army' OR $posi == 'San-Fierro Army' OR $posi == 'Maximum Security Prison' OR $posi == 'Los-Santos Radio Center' OR $posi == 'San-Fierro Radio Center' OR $posi == 'Las-Venturas Radio Center' OR $posi == 'Federal Bureau of Investigation' OR $posi == 'заместитель'){
        $gangs = R::findOne('leaders','gang = ?',array($posi));
        $upd = R::findOne('onlines','nick = ?',array($person));
        $predsid = R::findOne('goszams','nick = ?',array($person));
        if($posi == 'East Side Ballas'){$posi = 'Лидер банды East Side Ballas';}
        if($posi == 'Grove Street Families'){$posi = 'Лидер банды Grove Street Families';}
        if($posi == 'Los Santos Vagos'){$posi = 'Лидер банды Los Santos Vagos';}
        if($posi == 'The Rifa'){$posi = 'Лидер банды The Rifa';}
        if($posi == 'Varrios Los Aztecas'){$posi = 'Лидер банды Varrios Los Aztecas';}
        if($posi == 'Night Wolves'){$posi = 'Лидер банды Night Wolves';}
        if($posi == 'Warlock MC'){$posi = 'Лидер мафии Warlock MC';}
        if($posi == 'Russian Mafia'){$posi = 'Лидер мафии Russian Mafia';}
        if($posi == 'La Cosa Nostra'){$posi = 'Лидер мафии La Cosa Nostra';}
        if($posi == 'The Rifa'){$posi = 'Лидер банды The Rifa';}
        if($posi == 'Yakuza'){$posi = 'Лидер мафии Yakuza';}
        if($posi == 'Los-Santos Police Departament'){$posi = 'Лидер Los-Santos Police Departament';}
        if($posi == 'San-Fierro Police Departament'){$posi = 'Лидер San-Fierro Police Departament';}
        if($posi == 'Las-Venturas Police Departament'){$posi = 'Лидер Las-Venturas Police Departament';}
        if($posi == 'Red-County Sherieff Departament'){$posi = 'Лидер Red-County Sherieff Departament';}
        if($posi == 'Los-Santos Medical Center'){$posi = 'Лидер Los-Santos Medical Center';}
        if($posi == 'San-Fierro Medical Center'){$posi = 'Лидер San-Fierro Medical Center';}
        if($posi == 'Las-Venturas Medical Center'){$posi = 'Лидер Las-Venturas Medical Center';}
        if($posi == 'Government'){$posi = 'Лидер Government';}
        if($posi == 'Autoschool'){$posi = 'Лидер Autoschool';}
        if($posi == 'Central Bank'){$posi = 'Лидер Central Bank';}
        if($posi == 'Los-Santos Army'){$posi = 'Лидер Los-Santos Army';}
        if($posi == 'San-Fierro Army'){$posi = 'Лидер San-Fierro Army';}
        if($posi == 'Maximum Security Prison'){$posi = 'Лидер Maximum Security Prison';}
        if($posi == 'Los-Santos Radio Center'){$posi = 'Лидер Los-Santos Radio Center';}
        if($posi == 'San-Fierro Radio Center'){$posi = 'Лидер San-Fierro Radio Center';}
        if($posi == 'Las-Venturas Radio Center'){$posi = 'Лидер Las-Venturas Radio Center';}
        if($posi == 'Federal Bureau of Investigation'){$posi = 'Лидер Federal Bureau of Investigation';}
        if($posi == 'заместитель'){$posi = 'Заместитель лидера '.$predsid->fraction;}
        if(!($posi == 'Заместитель лидера '.$predsid->fraction)){
        $vk->sendMessage($peer_id,"Информация о [D:$fperson->lvl] $fperson->nick:<br>$posi<br>Баллы: $gangs->score<br>Строгие выговоры: $gangs->strong<br>Устные предупреждения: $gangs->oral<br>Дата постановки: $gangs->postavul<br>Дата срока: $gangs->snyal<br>Сервер: $fperson->servers<br>vk: https://vk.com/id$fperson->vkid");
        $vk->sendMessage($peer_id, "Онлайн $gangs->nick:<br>$upd->onl1<br>$upd->onl2<br>$upd->onl3<br>$upd->onl4<br>$upd->onl5<br>$upd->onl6<br>$upd->onl7");
    }else{
        $vk->sendMessage($peer_id,"Информация о [D:$fperson->lvl] $fperson->nick:<br>$posi<br>Сервер: $fperson->servers<br>vk: https://vk.com/id$fperson->vkid");
        $vk->sendMessage($peer_id, "Онлайн $gangs->nick:<br>$upd->onl1<br>$upd->onl2<br>$upd->onl3<br>$upd->onl4<br>$upd->onl5<br>$upd->onl6<br>$upd->onl7");
    }
    }
    else{
    $vk->sendMessage($peer_id,"$fperson->nick [D:$fperson->lvl] $fperson->position $fperson->type<br>vk: vk.com/id$fperson->vkid");
}
}else{
    $vk->sendMessage($peer_id,"Нету такого пользователя в бд");
}
}

    }
    }

if ($data->type == 'message_new') { // внести пользователя в бд без авторизации на сайте!
    if (preg_match("/^\/adduser\s(.+)/",$message,$newu)) {
    if($user->lvl >= 4){
    if (!preg_match("/(\[id\d+|.+\])\s((.+)_(.+))/",$newu[1],$newu)){
        gomsg("/adduser @упоминание Nick_Name",$data);
        return;
    }
    $new_user_nick = $newu[2];
    $new_user = mb_substr($message ,9); // еще раз обрезаем и получаем все что написано после /kick_
    $new_user = explode("|", mb_substr($new_user, 3))[0]; // Делитель |, обрезаем первые 3 символа (@id) и получаем чистый ID :-)
    $newuser = R::findOne('users','vkid = ?',array($new_user));
    if($newuser){
        $vk->sendMessage($peer_id,"Уже занесен");
        R::store($newuser);
    }else{
        $newuser = R::load('users',NULL);
        $newuser->vkid = $new_user;
        $newuser->servers = 'Yuma';
        $newuser->lvl = 1;
        $newuser->position = 'игрок';
        $newuser->nick = $new_user_nick;
        R::store($newuser);
        $vk->sendMessage($peer_id,"@id$id($user->nick) внес @id$newuser->vkid($newuser->nick) в бд без регистрации на сайте");
    }
    }else{$vk->sendMessage($peer_id,"nea");}
    }
}

/* if ($data->type == 'message_new') { // команда внести пред/выговор
    if (preg_match("/^\/addpred\s(.+)/",$message,$pred)) {
        if($user->lvl >= 4){
        if (!preg_match("/(\[id\d+|.+\])\s+(.+)/",$pred[1],$pred)){
            gomsg("/addpred [@idvk или gang] причина",$data);
            return;
            }
                $prichinapreda = $pred[2];
                $pred_id = mb_substr($message ,9); // еще раз обрезаем и получаем все что написано после /kick_
                $pred_id = explode("|", mb_substr($pred_id, 3))[0]; // Делитель |, обрезаем первые 3 символа (@id) и получаем чистый ID :-)
                $predid = R::findOne('users','vkid = ?',array($pred_id));
                $predsid = R::findOne('leaders','nick = ?',array($predid->nick));
                if($predsid){
                R::load('leaders',$predsid->nick);
                $predsid->oral = $predsid->oral + 1;
                R::store($predsid);
                $vk->sendMessage(2000000007,"@id$id($user->nick) выдал устное предупреждения лидеру @id$pred_id($predsid->nick) банды $predsid->gang<br>Причина: $prichinapreda");
                $vk->sendMessage(2000000005,"@id$id($user->nick) выдал устное предупреждения лидеру @id$pred_id($predsid->nick) банды $predsid->gang<br>Причина: $prichinapreda");
            if($predsid->oral == 3){
                R::load('leaders',$predsid->nick);
                $predsid->oral = 0;
                $predsid->strong = $predsid->strong + 1;
                R::store($predsid);
                $vk->sendMessage(2000000007,"Лидеру @id$pred_id($predsid->nick) банды $predsid->gang внес строгий выговор<br>Причина: 3/3 предов");
            }

        $vk->request('messages.send', ['peer_id' => 2000000005 ,'message' => "Всем привет" ,'attachment' => "photo{$img[0]}"]);
            }
}else{$vk->sendMessage($peer_id,"Нет прав");}
}
} */







/*
=======================НАКАЗАНИЯ ЛИДЕРАМ + ПОДТВЕРЖДЕНИЯ=========================

*/

if ($data->type == 'message_new') { // команда внести пред/выговор
    if (preg_match("/^\/nak\s(.+)/",$message,$nak)) {
        if($user->lvl >= 4){
            if($peer_id == 2000000007){
        if (!preg_match("/(\d+)/",$nak[1],$nak)){
            gomsg("/nak [idnak]",$data);
            return;
            }
            $idnak = $nak[1];
            $nakpomo =  R::findOne('pomochs','id = ?',array($idnak));
            $predsid = R::findOne('leaders','nick = ?',array($nakpomo->nickleader));
            if($nakpomo){
                if($nakpomo->code == 1 OR $nakpomo->code == 2){
                    $vk->sendMessage($peer_id,"Данное наказания уже выдано/отказано ранее‼");
                }else{
                $nakpomo->code = 1;
                R::store($nakpomo);
                if($nakpomo->typenak == 'устное предупреждения'){
                $predsid = R::findOne('leaders','nick = ?',array($nakpomo->nickleader));
                if($predsid){
                R::load('leaders',$predsid->nick);
                $predsid->oral = $predsid->oral + 1;
                R::store($predsid);
                $vk->request('messages.send', ['peer_id' => 2000000005 ,'message' => "@id$id($user->nick) выдал устное предупреждения лидеру @id$predsid->vkid($predsid->nick) банды $predsid->gang<br>Причина: $nakpomo->reason | от помощника $nakpomo->nickadm",'attachment' => "photo{$imgyst[0]}"]);
                if($predsid->oral == 3){
                    R::load('leaders',$nakpomo->nickleader);
                    $predsid->oral = 0;
                    $predsid->strong = $predsid->strong + 1;
                    R::store($predsid);
                    $vk->sendMessage(2000000007,"Лидеру @id$predsid->vkid($predsid->nick) банды $predsid->gang внес строгий выговор<br>Причина: 3/3 предов");
                }
            }
                $vk->sendMessage(2000000031,"@id$id($nakpomo->nickadm) наказание с номером $nakpomo->id выдано✅");
                $vk->sendMessage(2000000007,"Наказание выдано✅");
            }else{
                $predsid->strong = $predsid->strong + 1;
                R::store($predsid);
                if($predsid->strong == 5){
                    $vk->request('messages.send', ['peer_id' => 2000000005 ,'message' => "@id$id($user->nick) выдал строгий выговор лидеру @id$predsid->vkid($predsid->nick) банды $predsid->gang<br>Причина: $nakpomo->reason | от помощника $nakpomo->nickadm",'attachment' => "photo{$imgstr[0]}"]);
                    $vk->sendMessage(2000000007,"⚠У лидера @id$vugsid->vkid($vugsid->nick) $vugsid->gang 5/5 строгих.⚠");
                }
                $vk->request('messages.send', ['peer_id' => 2000000005 ,'message' => "@id$id($user->nick) выдал строгий выговор лидеру @id$predsid->vkid($predsid->nick) банды $predsid->gang<br>Причина: $nakpomo->reason | от помощника $nakpomo->nickadm",'attachment' => "photo{$imgstr[0]}"]);
                $vk->sendMessage(2000000031,"@id$id($nakpomo->nickadm) наказание с номером $nakpomo->id выдано✅");
                $vk->sendMessage(2000000007,"Наказание выдано✅");
            }
            }
            }
            else{
            $vk->sendMessage(2000000007,"Наказание с номером $nakpomo->id нету в бд выдачи, перепровьте номер!");
        }
    }else{$vk->sendMessage($peer_id,"⛔Используйте только в конфе следящих⛔");}
}else{$vk->sendMessage($peer_id,"Нет прав");}
}
if (preg_match("/^\/otkaz\s(.+)/",$message,$nak)) {
    if($user->lvl >= 4){
    if (!preg_match("/(\d+)/",$nak[1],$nak)){
        gomsg("/otkaz [idnak]",$data);
        return;
        }
        $idnak = $nak[1];
        $nakpomo =  R::findOne('pomochs','id = ?',array($idnak));
        $predsid = R::findOne('leaders','nick = ?',array($nakpomo->nickleader));
        if($nakpomo){
            if($nakpomo->code == 1 OR $nakpomo->code == 2){
                $vk->sendMessage($peer_id,"Данное наказания уже выдано/отказано ранее‼");
            }else{
            $nakpomo->code = 2;
            R::store($nakpomo);
            $vk->sendMessage($peer_id,"Вы отказали в выдачи наказания с номером $nakpomo->id ⛔");
            $vk->sendMessage(2000000031,"@id$id($nakpomo->nickadm) наказание с номером $nakpomo->id - отказано⛔");
        }
        }
        else{
        $vk->sendMessage(2000000007,"Наказание с номером $nakpomo->id нету в бд выдачи, перепровьте номер!");
    }
}else{$vk->sendMessage($peer_id,"Нет прав");}
}
}

// гос лидеры наказание
if ($data->type == 'message_new') { // команда внести пред/выговор
    if (preg_match("/^\/addpred\s(.+)/",$message,$pred)) {
        if($user->lvl >= 3){
        if($user->type == гос OR $user->type == all){
        if (preg_match("/(\[id\d+|.+\])\s+(.+)/",$pred[1],$pred)){
            $prichinapreda = $pred[2];
                $pred_id = mb_substr($message ,9); // еще раз обрезаем и получаем все что написано после /kick_
                $pred_id = explode("|", mb_substr($pred_id, 3))[0]; // Делитель |, обрезаем первые 3 символа (@id) и получаем чистый ID :-)
                $predid = R::findOne('users','vkid = ?',array($pred_id));
                $predsid = R::findOne('leaders','nick = ?',array($predid->nick));
                if($predsid->type == гос){
                if($predsid){
                R::load('leaders',$predsid->nick);
                $predsid->oral = $predsid->oral + 1;
                R::store($predsid);
                $vk->sendMessage($peer_id,"@id$id($user->nick) выдал устное предупреждения лидеру @id$pred_id($predsid->nick) $predsid->gang<br>Причина: $prichinapreda");
                $vk->sendMessage(2000000025,"@id$id($user->nick) выдал устное предупреждения лидеру @id$pred_id($predsid->nick) $predsid->gang<br>Причина: $prichinapreda");
            if($predsid->oral == 3){
                R::load('leaders',$predsid->nick);
                $predsid->oral = 0;
                $predsid->strong = $predsid->strong + 1;
                R::store($predsid);
                $vk->sendMessage($peer_id,"Лидеру @id$pred_id($predsid->nick) банды $predsid->gang внес строгий выговор<br>Причина: 3/3 предов");
            if($predsid->strong >= 3){
                $vk->sendMessage($peer_id,"У лидера @id$pred_id($predsid->nick) $predsid->gang 3+/3 выговоров.");
            }
            }
            }
            }
            }
            }
}else{$vk->sendMessage($peer_id,"Нет прав");}
}
}


if ($data->type == 'message_new') { // команда внести пред/выговор
    if (preg_match("/^\/addvug\s(.+)/",$message,$pred)) {
        if($user->lvl >= 3){
        if($user->type == гос OR $user->type == all){
        if (preg_match("/(\[id\d+|.+\])\s+(.+)/",$pred[1],$pred)){
            $prichinapreda = $pred[2];
                $pred_id = mb_substr($message ,8); // еще раз обрезаем и получаем все что написано после /kick_
                $pred_id = explode("|", mb_substr($pred_id, 3))[0]; // Делитель |, обрезаем первые 3 символа (@id) и получаем чистый ID :-)
                $predid = R::findOne('users','vkid = ?',array($pred_id));
                $predsid = R::findOne('leaders','nick = ?',array($predid->nick));
                if($predsid->type == гос){
                if($predsid){
                R::load('leaders',$predsid->nick);
                $predsid->strong = $predsid->strong + 1;
                R::store($predsid);
                $vk->sendMessage($peer_id,"@id$id($user->nick) выдал красный выговор лидеру @id$pred_id($predsid->nick) $predsid->gang<br>Причина: $prichinapreda");
                $vk->sendMessage(2000000025,"@id$id($user->nick) выдал красный выговор лидеру @id$pred_id($predsid->nick) $predsid->gang<br>Причина: $prichinapreda");
            if($predsid->strong >= 3){
                $vk->sendMessage($peer_id,"У лидера @id$pred_id($predsid->nick) $predsid->gang 3+/3 выговоров.");
            }
            }
            }
            }

}
}else{$vk->sendMessage($peer_id,"Нет прав");}
}
}





if ($data->type == 'message_new') { // команда снять пред/выговор
    if (preg_match("/^\/removevug\s(.+)/",$message,$vug)) {
        if($user->lvl >= 4){
        if($user->type == гос OR $user->type == all){
        if (preg_match("/(\[id\d+|.+\])\s+(.+)/",$vug[1],$vug)){
            $prichinavug = $vug[2];
        $pred_id = mb_substr($message ,11); // еще раз обрезаем и получаем все что написано после /kick_
        $pred_id = explode("|", mb_substr($pred_id, 3))[0]; // Делитель |, обрезаем первые 3 символа (@id) и получаем чистый ID :-)
        $predid = R::findOne('users','vkid = ?',array($pred_id));
        $predsid = R::findOne('leaders','nick = ?',array($predid->nick));
        if($predsid->type == гос){
        if($predsid){
            $predsid->strong = $predsid->strong - 1;
            R::store($predsid);
            $vk->sendMessage($peer_id,"@id$id($user->nick) снял красный выговор лидеру @id$predsid->vkid($predsid->nick) $predsid->gang<br>Причина: $prichinavug");
            $vk->sendMessage(2000000025,"@id$id($user->nick) снял красный выговор лидеру @id$predsid->vkid($predsid->nick) $predsid->gang<br>Причина: $prichinavug");
        }
    }
            }
}
}else{$vk->sendMessage($peer_id,"Нет прав");}
}
}


if ($data->type == 'message_new') { // команда снять пред/выговор
    if (preg_match("/^\/removepred\s(.+)/",$message,$vug)) {
        if($user->lvl >= 4){
        if($user->type == гос OR $user->type == all){
        if (preg_match("/(\[id\d+|.+\])\s+(.+)/",$vug[1],$vug)){
            $prichinavug = $vug[2];
        $pred_id = mb_substr($message ,12); // еще раз обрезаем и получаем все что написано после /kick_
        $pred_id = explode("|", mb_substr($pred_id, 3))[0]; // Делитель |, обрезаем первые 3 символа (@id) и получаем чистый ID :-)
        $predid = R::findOne('users','vkid = ?',array($pred_id));
        $predsid = R::findOne('leaders','nick = ?',array($predid->nick));
        if($predsid->type == гос){
        if($predsid){
            $predsid->oral = $predsid->oral - 1;
            R::store($predsid);
            if($predsid->oral == '-1'){
                $predsid->oral = 0;
                $predsid->strong = $predsid->strong - 1;
            R::store($predsid);
            $vk->sendMessage($peer_id,"Снял лидеру выговор т.к. уст = -1.");
            }
            $vk->sendMessage($peer_id,"@id$id($user->nick) снял устный выговор лидеру @id$predsid->vkid($predsid->nick) $predsid->gang<br>Причина: $prichinavug");
            $vk->sendMessage(2000000025,"@id$id($user->nick) снял устный выговор лидеру @id$predsid->vkid($predsid->nick) $predsid->gang<br>Причина: $prichinavug");
        }
        }
            }

    }
}else{$vk->sendMessage($peer_id,"Нет прав");}
}
}







// гос лидеры наказание







if ($data->type == 'message_new') { // команда внести пред/выговор
    if (preg_match("/^\/addpred\sballas\s(.+)/",$message,$pred)) {
        if($user->lvl == 3){
            if (!preg_match("/(.+)/",$pred[1],$pred)){
                gomsg("/addpred [gang] [причина]",$data);
                return;
                }
                $messa = mb_substr($message ,16);
                $prichinapreda = $pred[1];
                $predsid = R::findOne('leaders','id = ?',array(3));
                $predpomo = R::load('pomochs',NULL);
                $predpomo->nickadm = $user->nick;
                $predpomo->reason = $prichinapreda;
                $predpomo->nickleader = $predsid->nick;
                $predpomo->typenak = 'устное предупреждения';
                $predpomo->code = 0;
                $predpomo->dokva = $messa;
                R::store($predpomo);
                $vk->sendMessage($peer_id,"Вы запросили выдачу наказания с номером $predpomo->id! Ожидайте подтверждения от следящих.");
                $vk->sendMessage(2000000007,"Помощник @id$id($predpomo->nickadm) запросил выдачу устныка лидеру @id$predsid->vkid($predsid->nick) банды $predsid->gang<br><br>⚠Доказательства и причина: $predpomo->dokva<br><br>✅ Чтобы подтвердить выдачу пропишите /nak $predpomo->id ✅<br>⛔ Чтобы отказать выдачу пропишите /otkaz $predpomo->id ⛔<br>");
                }

        if($user->lvl >= 4){
        if (!preg_match("/(.+)/",$pred[1],$pred)){
            gomsg("/addpred [gang] [причина]",$data);
            return;
            }
            $prichinapreda = $pred[1];
            $predsid = R::findOne('leaders','id = ?',array(3));
            if($predsid){
                R::load('leaders',$predsid->nick);
                $predsid->oral = $predsid->oral + 1;
                R::store($predsid);
                $vk->request('messages.send', ['peer_id' => 2000000007 ,'message' => "@id$id($user->nick) выдал устное предупреждения лидеру @id$predsid->vkid($predsid->nick) банды $predsid->gang<br>Причина: $prichinapreda"]);
                $vk->request('messages.send', ['peer_id' => 2000000005 ,'message' => "@id$id($user->nick) выдал устное предупреждения лидеру @id$predsid->vkid($predsid->nick) банды $predsid->gang<br>Причина: $prichinapreda",'attachment' => "photo{$imgyst[0]}"]);
            if($predsid->oral == 3){
                R::load('leaders',$predsid->nick);
                $predsid->oral = 0;
                $predsid->strong = $predsid->strong + 1;
                R::store($predsid);
                $vk->sendMessage(2000000007,"Лидеру @id$predsid->vkid($predsid->nick) банды $predsid->gang внес строгий выговор<br>Причина: 3/3 предов");
            }
            }
}
}
}

if ($data->type == 'message_new') { // команда внести пред/выговор
    if (preg_match("/^\/addpred\snw\s(.+)/",$message,$pred)) {
        if($user->lvl == 3){
            if (!preg_match("/(.+)/",$pred[1],$pred)){
                gomsg("/addpred [gang] [причина]",$data);
                return;
                }
                $messa = mb_substr($message ,12);
                $prichinapreda = $pred[1];
                $predsid = R::findOne('leaders','id = ?',array(5));
                $predpomo = R::load('pomochs',NULL);
                $predpomo->nickadm = $user->nick;
                $predpomo->reason = $prichinapreda;
                $predpomo->nickleader = $predsid->nick;
                $predpomo->typenak = 'устное предупреждения';
                $predpomo->code = 0;
                $predpomo->dokva = $messa;
                R::store($predpomo);
                $vk->sendMessage($peer_id,"Вы запросили выдачу наказания с номером $predpomo->id! Ожидайте подтверждения от следящих.");
                $vk->sendMessage(2000000007,"Помощник @id$id($predpomo->nickadm) запросил выдачу устныка лидеру @id$predsid->vkid($predsid->nick) банды $predsid->gang<br><br>⚠Доказательства и причина: $predpomo->dokva<br><br>✅ Чтобы подтвердить выдачу пропишите /nak $predpomo->id ✅<br>⛔ Чтобы отказать выдачу пропишите /otkaz $predpomo->id ⛔<br>");
                }

        if($user->lvl >= 4){
        if (!preg_match("/(.+)/",$pred[1],$pred)){
            gomsg("/addpred [gang] [причина]",$data);
            return;
            }
            $prichinapreda = $pred[1];
            $predsid = R::findOne('leaders','id = ?',array(5));
            if($predsid){
                R::load('leaders',$predsid->nick);
                $predsid->oral = $predsid->oral + 1;
                R::store($predsid);
                $vk->request('messages.send', ['peer_id' => 2000000007 ,'message' => "@id$id($user->nick) выдал устное предупреждения лидеру @id$predsid->vkid($predsid->nick) банды $predsid->gang<br>Причина: $prichinapreda"]);
                $vk->request('messages.send', ['peer_id' => 2000000005 ,'message' => "@id$id($user->nick) выдал устное предупреждения лидеру @id$predsid->vkid($predsid->nick) банды $predsid->gang<br>Причина: $prichinapreda",'attachment' => "photo{$imgyst[0]}"]);
            if($predsid->oral == 3){
                R::load('leaders',$predsid->nick);
                $predsid->oral = 0;
                $predsid->strong = $predsid->strong + 1;
                R::store($predsid);
                $vk->sendMessage(2000000007,"Лидеру @id$predsid->vkid($predsid->nick) банды $predsid->gang внес строгий выговор<br>Причина: 3/3 предов");
            }
            }
}
}
}

if ($data->type == 'message_new') { // команда внести пред/выговор
    if (preg_match("/^\/addpred\svagos\s(.+)/",$message,$pred)) {
        if($user->lvl == 3){
            if (!preg_match("/(.+)/",$pred[1],$pred)){
                gomsg("/addpred [gang] [причина]",$data);
                return;
                }
                $messa = mb_substr($message ,15);
                $prichinapreda = $pred[1];
                $predsid = R::findOne('leaders','id = ?',array(2));
                $predpomo = R::load('pomochs',NULL);
                $predpomo->nickadm = $user->nick;
                $predpomo->reason = $prichinapreda;
                $predpomo->nickleader = $predsid->nick;
                $predpomo->typenak = 'устное предупреждения';
                $predpomo->code = 0;
                $predpomo->dokva = $messa;
                R::store($predpomo);
                $vk->sendMessage($peer_id,"Вы запросили выдачу наказания с номером $predpomo->id! Ожидайте подтверждения от следящих.");
                $vk->sendMessage(2000000007,"Помощник @id$id($predpomo->nickadm) запросил выдачу устныка лидеру @id$predsid->vkid($predsid->nick) банды $predsid->gang<br><br>⚠Доказательства и причина: $predpomo->dokva<br><br>✅ Чтобы подтвердить выдачу пропишите /nak $predpomo->id ✅<br>⛔ Чтобы отказать выдачу пропишите /otkaz $predpomo->id ⛔<br>");
                }

        if($user->lvl >= 4){
        if (!preg_match("/(.+)/",$pred[1],$pred)){
            gomsg("/addpred [gang] [причина]",$data);
            return;
            }
            $prichinapreda = $pred[1];
            $predsid = R::findOne('leaders','id = ?',array(2));
            if($predsid){
                R::load('leaders',$predsid->nick);
                $predsid->oral = $predsid->oral + 1;
                R::store($predsid);
                $vk->request('messages.send', ['peer_id' => 2000000007 ,'message' => "@id$id($user->nick) выдал устное предупреждения лидеру @id$predsid->vkid($predsid->nick) банды $predsid->gang<br>Причина: $prichinapreda"]);
                $vk->request('messages.send', ['peer_id' => 2000000005 ,'message' => "@id$id($user->nick) выдал устное предупреждения лидеру @id$predsid->vkid($predsid->nick) банды $predsid->gang<br>Причина: $prichinapreda",'attachment' => "photo{$imgyst[0]}"]);
            if($predsid->oral == 3){
                R::load('leaders',$predsid->nick);
                $predsid->oral = 0;
                $predsid->strong = $predsid->strong + 1;
                R::store($predsid);
                $vk->sendMessage(2000000007,"Лидеру @id$predsid->vkid($predsid->nick) банды $predsid->gang внес строгий выговор<br>Причина: 3/3 предов");
            }
            }
}
}
}

if ($data->type == 'message_new') { // команда внести пред/выговор
    if (preg_match("/^\/addpred\srifa\s(.+)/",$message,$pred)) {
        if($user->lvl == 3){
            if (!preg_match("/(.+)/",$pred[1],$pred)){
                gomsg("/addpred [gang] [причина]",$data);
                return;
                }
                $messa = mb_substr($message ,14);
                $prichinapreda = $pred[1];
                $predsid = R::findOne('leaders','id = ?',array(6));
                $predpomo = R::load('pomochs',NULL);
                $predpomo->nickadm = $user->nick;
                $predpomo->reason = $prichinapreda;
                $predpomo->nickleader = $predsid->nick;
                $predpomo->typenak = 'устное предупреждения';
                $predpomo->code = 0;
                $predpomo->dokva = $messa;
                R::store($predpomo);
                $vk->sendMessage($peer_id,"Вы запросили выдачу наказания с номером $predpomo->id! Ожидайте подтверждения от следящих.");
                $vk->sendMessage(2000000007,"Помощник @id$id($predpomo->nickadm) запросил выдачу устныка лидеру @id$predsid->vkid($predsid->nick) банды $predsid->gang<br><br>⚠Доказательства и причина: $predpomo->dokva<br><br>✅ Чтобы подтвердить выдачу пропишите /nak $predpomo->id ✅<br>⛔ Чтобы отказать выдачу пропишите /otkaz $predpomo->id ⛔<br>");
                }

        if($user->lvl >= 4){
        if (!preg_match("/(.+)/",$pred[1],$pred)){
            gomsg("/addpred [gang] [причина]",$data);
            return;
            }
            $prichinapreda = $pred[1];
            $predsid = R::findOne('leaders','id = ?',array(6));
            if($predsid){
                R::load('leaders',$predsid->nick);
                $predsid->oral = $predsid->oral + 1;
                R::store($predsid);
                $vk->request('messages.send', ['peer_id' => 2000000007 ,'message' => "@id$id($user->nick) выдал устное предупреждения лидеру @id$predsid->vkid($predsid->nick) банды $predsid->gang<br>Причина: $prichinapreda"]);
                $vk->request('messages.send', ['peer_id' => 2000000005 ,'message' => "@id$id($user->nick) выдал устное предупреждения лидеру @id$predsid->vkid($predsid->nick) банды $predsid->gang<br>Причина: $prichinapreda",'attachment' => "photo{$imgyst[0]}"]);
            if($predsid->oral == 3){
                R::load('leaders',$predsid->nick);
                $predsid->oral = 0;
                $predsid->strong = $predsid->strong + 1;
                R::store($predsid);
                $vk->sendMessage(2000000007,"Лидеру @id$predsid->vkid($predsid->nick) банды $predsid->gang внес строгий выговор<br>Причина: 3/3 предов");
            }
            }
}
}
}

if ($data->type == 'message_new') { // команда внести пред/выговор
    if (preg_match("/^\/addpred\sgrove\s(.+)/",$message,$pred)) {
        if($user->lvl == 3){
            if (!preg_match("/(.+)/",$pred[1],$pred)){
                gomsg("/addpred [gang] [причина]",$data);
                return;
                }
                $messa = mb_substr($message ,15);
                $prichinapreda = $pred[1];
                $predsid = R::findOne('leaders','id = ?',array(1));
                $predpomo = R::load('pomochs',NULL);
                $predpomo->nickadm = $user->nick;
                $predpomo->reason = $prichinapreda;
                $predpomo->nickleader = $predsid->nick;
                $predpomo->typenak = 'устное предупреждения';
                $predpomo->code = 0;
                $predpomo->dokva = $messa;
                R::store($predpomo);
                $vk->sendMessage($peer_id,"Вы запросили выдачу наказания с номером $predpomo->id! Ожидайте подтверждения от следящих.");
                $vk->sendMessage(2000000007,"Помощник @id$id($predpomo->nickadm) запросил выдачу устныка лидеру @id$predsid->vkid($predsid->nick) банды $predsid->gang<br><br>⚠Доказательства и причина: $predpomo->dokva<br><br>✅ Чтобы подтвердить выдачу пропишите /nak $predpomo->id ✅<br>⛔ Чтобы отказать выдачу пропишите /otkaz $predpomo->id ⛔<br>");
                }

        if($user->lvl >= 4){
        if (!preg_match("/(.+)/",$pred[1],$pred)){
            gomsg("/addpred [gang] [причина]",$data);
            return;
            }
            $prichinapreda = $pred[1];
            $predsid = R::findOne('leaders','id = ?',array(1));
            if($predsid){
                R::load('leaders',$predsid->nick);
                $predsid->oral = $predsid->oral + 1;
                R::store($predsid);
                $vk->request('messages.send', ['peer_id' => 2000000007 ,'message' => "@id$id($user->nick) выдал устное предупреждения лидеру @id$predsid->vkid($predsid->nick) банды $predsid->gang<br>Причина: $prichinapreda"]);
                $vk->request('messages.send', ['peer_id' => 2000000005 ,'message' => "@id$id($user->nick) выдал устное предупреждения лидеру @id$predsid->vkid($predsid->nick) банды $predsid->gang<br>Причина: $prichinapreda",'attachment' => "photo{$imgyst[0]}"]);
            if($predsid->oral == 3){
                R::load('leaders',$predsid->nick);
                $predsid->oral = 0;
                $predsid->strong = $predsid->strong + 1;
                R::store($predsid);
                $vk->sendMessage(2000000007,"Лидеру @id$predsid->vkid($predsid->nick) банды $predsid->gang внес строгий выговор<br>Причина: 3/3 предов");
            }
            }
}
}
}

if ($data->type == 'message_new') { // команда внести пред/выговор
    if (preg_match("/^\/addpred\saztec\s(.+)/",$message,$pred)) {
        if($user->lvl == 3){
            if (!preg_match("/(.+)/",$pred[1],$pred)){
                gomsg("/addpred [gang] [причина]",$data);
                return;
                }
                $messa = mb_substr($message ,15);
                $prichinapreda = $pred[1];
                $predsid = R::findOne('leaders','id = ?',array(4));
                $predpomo = R::load('pomochs',NULL);
                $predpomo->nickadm = $user->nick;
                $predpomo->reason = $prichinapreda;
                $predpomo->nickleader = $predsid->nick;
                $predpomo->typenak = 'устное предупреждения';
                $predpomo->code = 0;
                $predpomo->dokva = $messa;
                R::store($predpomo);
                $vk->sendMessage($peer_id,"Вы запросили выдачу наказания с номером $predpomo->id! Ожидайте подтверждения от следящих.");
                $vk->sendMessage(2000000007,"Помощник @id$id($predpomo->nickadm) запросил выдачу устныка лидеру @id$predsid->vkid($predsid->nick) банды $predsid->gang<br><br>⚠Доказательства и причина: $predpomo->dokva<br><br>✅ Чтобы подтвердить выдачу пропишите /nak $predpomo->id ✅<br>⛔ Чтобы отказать выдачу пропишите /otkaz $predpomo->id ⛔<br>");
                }

        if($user->lvl >= 4){
        if (!preg_match("/(.+)/",$pred[1],$pred)){
            gomsg("/addpred [gang] [причина]",$data);
            return;
            }
            $prichinapreda = $pred[1];
            $predsid = R::findOne('leaders','id = ?',array(4));
            if($predsid){
                R::load('leaders',$predsid->nick);
                $predsid->oral = $predsid->oral + 1;
                R::store($predsid);
                $vk->request('messages.send', ['peer_id' => 2000000007 ,'message' => "@id$id($user->nick) выдал устное предупреждения лидеру @id$predsid->vkid($predsid->nick) банды $predsid->gang<br>Причина: $prichinapreda"]);
                $vk->request('messages.send', ['peer_id' => 2000000005 ,'message' => "@id$id($user->nick) выдал устное предупреждения лидеру @id$predsid->vkid($predsid->nick) банды $predsid->gang<br>Причина: $prichinapreda",'attachment' => "photo{$imgyst[0]}"]);
            if($predsid->oral == 3){
                R::load('leaders',$predsid->nick);
                $predsid->oral = 0;
                $predsid->strong = $predsid->strong + 1;
                R::store($predsid);
                $vk->sendMessage(2000000007,"Лидеру @id$predsid->vkid($predsid->nick) банды $predsid->gang внес строгий выговор<br>Причина: 3/3 предов");
            }
            }
}
}
}

if ($data->type == 'message_new') { // команда внести пред/выговор
    if (preg_match("/^\/addpred\swarlock\s(.+)/",$message,$pred)) {
    if($user->lvl >= 4){
        if (!preg_match("/(.+)/",$pred[1],$pred)){
            gomsg("/addpred [gang] [причина]",$data);
            return;
            }
            $prichinapreda = $pred[1];
            $predsid = R::findOne('leaders','id = ?',array(7));
            if($predsid){
                R::load('leaders',$predsid->nick);
                $predsid->oral = $predsid->oral + 1;
                R::store($predsid);
                $vk->request('messages.send', ['peer_id' => 2000000017 ,'message' => "@id$id($user->nick) выдал устное предупреждения лидеру @id$predsid->vkid($predsid->nick) мафии $predsid->gang<br>Причина: $prichinapreda"]);
                $vk->request('messages.send', ['peer_id' => 2000000018 ,'message' => "@id$id($user->nick) выдал устное предупреждения лидеру @id$predsid->vkid($predsid->nick) мафии $predsid->gang<br>Причина: $prichinapreda",'attachment' => "photo{$imgyst[0]}"]);
            if($predsid->oral == 3){
                R::load('leaders',$predsid->nick);
                $predsid->oral = 0;
                $predsid->strong = $predsid->strong + 1;
                R::store($predsid);
                $vk->sendMessage(2000000017,"Лидеру @id$predsid->vkid($predsid->nick) мафии $predsid->gang внес строгий выговор<br>Причина: 3/3 предов");
            }
            }
}
}
}

if ($data->type == 'message_new') { // команда внести пред/выговор
    if (preg_match("/^\/addpred\syakuza\s(.+)/",$message,$pred)) {
    if($user->lvl >= 4){
        if (!preg_match("/(.+)/",$pred[1],$pred)){
            gomsg("/addpred [gang] [причина]",$data);
            return;
            }
            $prichinapreda = $pred[1];
            $predsid = R::findOne('leaders','id = ?',array(10));
            if($predsid){
                R::load('leaders',$predsid->nick);
                $predsid->oral = $predsid->oral + 1;
                R::store($predsid);
                $vk->request('messages.send', ['peer_id' => 2000000017 ,'message' => "@id$id($user->nick) выдал устное предупреждения лидеру @id$predsid->vkid($predsid->nick) мафии $predsid->gang<br>Причина: $prichinapreda"]);
                $vk->request('messages.send', ['peer_id' => 2000000018 ,'message' => "@id$id($user->nick) выдал устное предупреждения лидеру @id$predsid->vkid($predsid->nick) мафии $predsid->gang<br>Причина: $prichinapreda",'attachment' => "photo{$imgyst[0]}"]);
            if($predsid->oral == 3){
                R::load('leaders',$predsid->nick);
                $predsid->oral = 0;
                $predsid->strong = $predsid->strong + 1;
                R::store($predsid);
                $vk->sendMessage(2000000017,"Лидеру @id$predsid->vkid($predsid->nick) мафии $predsid->gang внес строгий выговор<br>Причина: 3/3 предов");
            }
            }
}
}
}

if ($data->type == 'message_new') { // команда внести пред/выговор
    if (preg_match("/^\/addpred\srm\s(.+)/",$message,$pred)) {
    if($user->lvl >= 4){
        if (!preg_match("/(.+)/",$pred[1],$pred)){
            gomsg("/addpred [gang] [причина]",$data);
            return;
            }
            $prichinapreda = $pred[1];
            $predsid = R::findOne('leaders','id = ?',array(9));
            if($predsid){
                R::load('leaders',$predsid->nick);
                $predsid->oral = $predsid->oral + 1;
                R::store($predsid);
                $vk->request('messages.send', ['peer_id' => 2000000017 ,'message' => "@id$id($user->nick) выдал устное предупреждения лидеру @id$predsid->vkid($predsid->nick) мафии $predsid->gang<br>Причина: $prichinapreda"]);
                $vk->request('messages.send', ['peer_id' => 2000000018 ,'message' => "@id$id($user->nick) выдал устное предупреждения лидеру @id$predsid->vkid($predsid->nick) мафии $predsid->gang<br>Причина: $prichinapreda",'attachment' => "photo{$imgyst[0]}"]);
            if($predsid->oral == 3){
                R::load('leaders',$predsid->nick);
                $predsid->oral = 0;
                $predsid->strong = $predsid->strong + 1;
                R::store($predsid);
                $vk->sendMessage(2000000017,"Лидеру @id$predsid->vkid($predsid->nick) мафии $predsid->gang внес строгий выговор<br>Причина: 3/3 предов");
            }
            }
}
}
}

if ($data->type == 'message_new') { // команда внести пред/выговор
    if (preg_match("/^\/addpred\slcn\s(.+)/",$message,$pred)) {
    if($user->lvl >= 4){
        if (!preg_match("/(.+)/",$pred[1],$pred)){
            gomsg("/addpred [gang] [причина]",$data);
            return;
            }
            $prichinapreda = $pred[1];
            $predsid = R::findOne('leaders','id = ?',array(8));
            if($predsid){
                R::load('leaders',$predsid->nick);
                $predsid->oral = $predsid->oral + 1;
                R::store($predsid);
                $vk->request('messages.send', ['peer_id' => 2000000017 ,'message' => "@id$id($user->nick) выдал устное предупреждения лидеру @id$predsid->vkid($predsid->nick) мафии $predsid->gang<br>Причина: $prichinapreda"]);
                $vk->request('messages.send', ['peer_id' => 2000000018 ,'message' => "@id$id($user->nick) выдал устное предупреждения лидеру @id$predsid->vkid($predsid->nick) мафии $predsid->gang<br>Причина: $prichinapreda",'attachment' => "photo{$imgyst[0]}"]);
            if($predsid->oral == 3){
                R::load('leaders',$predsid->nick);
                $predsid->oral = 0;
                $predsid->strong = $predsid->strong + 1;
                R::store($predsid);
                $vk->sendMessage(2000000017,"Лидеру @id$predsid->vkid($predsid->nick) мафии $predsid->gang внес строгий выговор<br>Причина: 3/3 предов");
            }
            }
}
}
}

if ($data->type == 'message_new') { // команда снять пред/выговор
    if (preg_match("/^\/removepred\slcn\s(.+)/",$message,$pred)) {
        if($user->lvl >= 4){
       if (!preg_match("/(.+)/",$pred[1],$pred)){
            gomsg("/removepred [gang] [причина]",$data);
            return;
            }
            $prichinapreda = $pred[1];
            $predsid = R::findOne('leaders','id = ?',array(8));
        if($predsid){
                R::load('leaders',$predsid->nick);
                $predsid->oral = $predsid->oral - 1;
                R::store($predsid);
                if($predsid->oral == '-1'){
                $predsid->oral = 2;
                $predsid->strong = $predsid->strong - 1;
                R::store($predsid);
                $vk->sendMessage($peer_id,"Снял лидеру выговор т.к. уст = -1.");
                }
                $vk->sendMessage(2000000017,"@id$id($user->nick) снял устное предупреждения лидеру @id$predsid->vkid($predsid->nick) банды $predsid->gang<br>Причина: $prichinapreda");
                $vk->sendMessage(2000000018,"@id$id($user->nick) снял устное предупреждения лидеру @id$predsid->vkid($predsid->nick) банды $predsid->gang<br>Причина: $prichinapreda");

            if($predsid->oral == 4){
                R::load('leaders',$predsid->nick);
                $predsid->oral = 0;
                $predsid->strong = $predsid->strong - 1;
                R::store($predsid);
                $vk->sendMessage(2000000017,"Лидеру @id$predsid->vkid($predsid->nick) банды $predsid->gang внес строгий выговор<br>Причина: 4/4 предов");
            }
        }
    }else{$vk->sendMessage($peer_id,"Нет прав");}
}
}


if ($data->type == 'message_new') { // команда снять пред/выговор
    if (preg_match("/^\/removepred\srm\s(.+)/",$message,$pred)) {
        if($user->lvl >= 4){
       if (!preg_match("/(.+)/",$pred[1],$pred)){
            gomsg("/removepred [gang] [причина]",$data);
            return;
            }
            $prichinapreda = $pred[1];
            $predsid = R::findOne('leaders','id = ?',array(9));
        if($predsid){
                R::load('leaders',$predsid->nick);
                $predsid->oral = $predsid->oral - 1;
                R::store($predsid);
                if($predsid->oral == '-1'){
                $predsid->oral = 2;
                $predsid->strong = $predsid->strong - 1;
                R::store($predsid);
                $vk->sendMessage($peer_id,"Снял лидеру выговор т.к. уст = -1.");
                }
                $vk->sendMessage(2000000017,"@id$id($user->nick) снял устное предупреждения лидеру @id$predsid->vkid($predsid->nick) банды $predsid->gang<br>Причина: $prichinapreda");
                $vk->sendMessage(2000000018,"@id$id($user->nick) снял устное предупреждения лидеру @id$predsid->vkid($predsid->nick) банды $predsid->gang<br>Причина: $prichinapreda");

            if($predsid->oral == 4){
                R::load('leaders',$predsid->nick);
                $predsid->oral = 0;
                $predsid->strong = $predsid->strong - 1;
                R::store($predsid);
                $vk->sendMessage(2000000017,"Лидеру @id$predsid->vkid($predsid->nick) банды $predsid->gang внес строгий выговор<br>Причина: 4/4 предов");
            }
        }
    }else{$vk->sendMessage($peer_id,"Нет прав");}
}
}

if ($data->type == 'message_new') { // команда снять пред/выговор
    if (preg_match("/^\/removepred\syakuza\s(.+)/",$message,$pred)) {
        if($user->lvl >= 4){
       if (!preg_match("/(.+)/",$pred[1],$pred)){
            gomsg("/removepred [gang] [причина]",$data);
            return;
            }
            $prichinapreda = $pred[1];
            $predsid = R::findOne('leaders','id = ?',array(10));
        if($predsid){
                R::load('leaders',$predsid->nick);
                $predsid->oral = $predsid->oral - 1;
                R::store($predsid);
                if($predsid->oral == '-1'){
                $predsid->oral = 2;
                $predsid->strong = $predsid->strong - 1;
                R::store($predsid);
                $vk->sendMessage($peer_id,"Снял лидеру выговор т.к. уст = -1.");
                }
                $vk->sendMessage(2000000017,"@id$id($user->nick) снял устное предупреждения лидеру @id$predsid->vkid($predsid->nick) банды $predsid->gang<br>Причина: $prichinapreda");
                $vk->sendMessage(2000000018,"@id$id($user->nick) снял устное предупреждения лидеру @id$predsid->vkid($predsid->nick) банды $predsid->gang<br>Причина: $prichinapreda");

            if($predsid->oral == 4){
                R::load('leaders',$predsid->nick);
                $predsid->oral = 0;
                $predsid->strong = $predsid->strong - 1;
                R::store($predsid);
                $vk->sendMessage(2000000017,"Лидеру @id$predsid->vkid($predsid->nick) банды $predsid->gang внес строгий выговор<br>Причина: 4/4 предов");
            }
        }
    }else{$vk->sendMessage($peer_id,"Нет прав");}
}
}

if ($data->type == 'message_new') { // команда снять пред/выговор
    if (preg_match("/^\/removepred\swarlock\s(.+)/",$message,$pred)) {
        if($user->lvl >= 4){
       if (!preg_match("/(.+)/",$pred[1],$pred)){
            gomsg("/removepred [gang] [причина]",$data);
            return;
            }
            $prichinapreda = $pred[1];
            $predsid = R::findOne('leaders','id = ?',array(7));
        if($predsid){
                R::load('leaders',$predsid->nick);
                $predsid->oral = $predsid->oral - 1;
                R::store($predsid);
                if($predsid->oral == '-1'){
                $predsid->oral = 2;
                $predsid->strong = $predsid->strong - 1;
                R::store($predsid);
                $vk->sendMessage($peer_id,"Снял лидеру выговор т.к. уст = -1.");
                }
                $vk->sendMessage(2000000017,"@id$id($user->nick) снял устное предупреждения лидеру @id$predsid->vkid($predsid->nick) банды $predsid->gang<br>Причина: $prichinapreda");
                $vk->sendMessage(2000000018,"@id$id($user->nick) снял устное предупреждения лидеру @id$predsid->vkid($predsid->nick) банды $predsid->gang<br>Причина: $prichinapreda");

            if($predsid->oral == 4){
                R::load('leaders',$predsid->nick);
                $predsid->oral = 0;
                $predsid->strong = $predsid->strong - 1;
                R::store($predsid);
                $vk->sendMessage(2000000017,"Лидеру @id$predsid->vkid($predsid->nick) банды $predsid->gang внес строгий выговор<br>Причина: 4/4 предов");
            }
        }
    }else{$vk->sendMessage($peer_id,"Нет прав");}
}
}




if ($data->type == 'message_new') { // команда снять пред/выговор
    if (preg_match("/^\/removepred\sballas\s(.+)/",$message,$pred)) {
        if($user->lvl >= 4){
       if (!preg_match("/(.+)/",$pred[1],$pred)){
            gomsg("/removepred [gang] [причина]",$data);
            return;
            }
            $prichinapreda = $pred[1];
            $predsid = R::findOne('leaders','id = ?',array(3));
        if($predsid){
                R::load('leaders',$predsid->nick);
                $predsid->oral = $predsid->oral - 1;
                R::store($predsid);
                if($predsid->oral == '-1'){
                $predsid->oral = 2;
                $predsid->strong = $predsid->strong - 1;
                R::store($predsid);
                $vk->sendMessage($peer_id,"Снял лидеру выговор т.к. уст = -1.");
                }
                $vk->sendMessage(2000000007,"@id$id($user->nick) снял устное предупреждения лидеру @id$predsid->vkid($predsid->nick) банды $predsid->gang<br>Причина: $prichinapreda");
                $vk->sendMessage(2000000005,"@id$id($user->nick) снял устное предупреждения лидеру @id$predsid->vkid($predsid->nick) банды $predsid->gang<br>Причина: $prichinapreda");

            if($predsid->oral == 3){
                R::load('leaders',$predsid->nick);
                $predsid->oral = 0;
                $predsid->strong = $predsid->strong - 1;
                R::store($predsid);
                $vk->sendMessage(2000000007,"Лидеру @id$predsid->vkid($predsid->nick) банды $predsid->gang внес строгий выговор<br>Причина: 3/3 предов");
            }
        }
    }else{$vk->sendMessage($peer_id,"Нет прав");}
}
}

if ($data->type == 'message_new') { // команда снять пред/выговор
    if (preg_match("/^\/removepred\snw\s(.+)/",$message,$pred)) {
        if($user->lvl >= 4){
       if (!preg_match("/(.+)/",$pred[1],$pred)){
            gomsg("/removepred [gang] [причина]",$data);
            return;
            }
            $prichinapreda = $pred[1];
            $predsid = R::findOne('leaders','id = ?',array(5));
        if($predsid){
                R::load('leaders',$predsid->nick);
                $predsid->oral = $predsid->oral - 1;
                R::store($predsid);
                if($predsid->oral == '-1'){
                $predsid->oral = 2;
                $predsid->strong = $predsid->strong - 1;
                R::store($predsid);
                $vk->sendMessage($peer_id,"Снял лидеру выговор т.к. уст = -1.");
                }
                $vk->sendMessage(2000000007,"@id$id($user->nick) снял устное предупреждения лидеру @id$predsid->vkid($predsid->nick) банды $predsid->gang<br>Причина: $prichinapreda");
                $vk->sendMessage(2000000005,"@id$id($user->nick) снял устное предупреждения лидеру @id$predsid->vkid($predsid->nick) банды $predsid->gang<br>Причина: $prichinapreda");
        }
    }else{$vk->sendMessage($peer_id,"Нет прав");}
}
}


if ($data->type == 'message_new') { // команда снять пред/выговор
    if (preg_match("/^\/removepred\svagos\s(.+)/",$message,$pred)) {
        if($user->lvl >= 4){
       if (!preg_match("/(.+)/",$pred[1],$pred)){
            gomsg("/removepred [gang] [причина]",$data);
            return;
            }
            $prichinapreda = $pred[1];
            $predsid = R::findOne('leaders','id = ?',array(2));
        if($predsid){
                R::load('leaders',$predsid->nick);
                $predsid->oral = $predsid->oral - 1;
                R::store($predsid);
                if($predsid->oral == '-1'){
                $predsid->oral = 2;
                $predsid->strong = $predsid->strong - 1;
                R::store($predsid);
                $vk->sendMessage($peer_id,"Снял лидеру выговор т.к. уст = -1.");
                }
                $vk->sendMessage(2000000007,"@id$id($user->nick) снял устное предупреждения лидеру @id$predsid->vkid($predsid->nick) банды $predsid->gang<br>Причина: $prichinapreda");
                $vk->sendMessage(2000000005,"@id$id($user->nick) снял устное предупреждения лидеру @id$predsid->vkid($predsid->nick) банды $predsid->gang<br>Причина: $prichinapreda");

            if($predsid->oral == 3){
                R::load('leaders',$predsid->nick);
                $predsid->oral = 0;
                $predsid->strong = $predsid->strong - 1;
                R::store($predsid);
                $vk->sendMessage(2000000007,"Лидеру @id$predsid->vkid($predsid->nick) банды $predsid->gang внес строгий выговор<br>Причина: 3/3 предов");
            }
        }
    }else{$vk->sendMessage($peer_id,"Нет прав");}
}
}

if ($data->type == 'message_new') { // команда снять пред/выговор
    if (preg_match("/^\/removepred\srifa\s(.+)/",$message,$pred)) {
        if($user->lvl >= 4){
       if (!preg_match("/(.+)/",$pred[1],$pred)){
            gomsg("/removepred [gang] [причина]",$data);
            return;
            }
            $prichinapreda = $pred[1];
            $predsid = R::findOne('leaders','id = ?',array(6));
        if($predsid){
                R::load('leaders',$predsid->nick);
                $predsid->oral = $predsid->oral - 1;
                R::store($predsid);
                if($predsid->oral == '-1'){
                $predsid->oral = 2;
                $predsid->strong = $predsid->strong - 1;
                R::store($predsid);
                $vk->sendMessage($peer_id,"Снял лидеру выговор т.к. уст = -1.");
                }
                $vk->sendMessage(2000000007,"@id$id($user->nick) снял устное предупреждения лидеру @id$predsid->vkid($predsid->nick) банды $predsid->gang<br>Причина: $prichinapreda");
                $vk->sendMessage(2000000005,"@id$id($user->nick) снял устное предупреждения лидеру @id$predsid->vkid($predsid->nick) банды $predsid->gang<br>Причина: $prichinapreda");

            if($predsid->oral == 3){
                R::load('leaders',$predsid->nick);
                $predsid->oral = 0;
                $predsid->strong = $predsid->strong - 1;
                R::store($predsid);
                $vk->sendMessage(2000000007,"Лидеру @id$predsid->vkid($predsid->nick) банды $predsid->gang внес строгий выговор<br>Причина: 3/3 предов");
            }
        }
    }else{$vk->sendMessage($peer_id,"Нет прав");}
}
}

if ($data->type == 'message_new') { // команда снять пред/выговор
    if (preg_match("/^\/removepred\sgrove\s(.+)/",$message,$pred)) {
        if($user->lvl >= 4){
       if (!preg_match("/(.+)/",$pred[1],$pred)){
            gomsg("/removepred [gang] [причина]",$data);
            return;
            }
            $prichinapreda = $pred[1];
            $predsid = R::findOne('leaders','id = ?',array(1));
        if($predsid){
                R::load('leaders',$predsid->nick);
                $predsid->oral = $predsid->oral - 1;
                R::store($predsid);
                if($predsid->oral == '-1'){
                $predsid->oral = 2;
                $predsid->strong = $predsid->strong - 1;
                R::store($predsid);
                $vk->sendMessage($peer_id,"Снял лидеру выговор т.к. уст = -1.");
                }
                $vk->sendMessage(2000000007,"@id$id($user->nick) снял устное предупреждения лидеру @id$predsid->vkid($predsid->nick) банды $predsid->gang<br>Причина: $prichinapreda");
                $vk->sendMessage(2000000005,"@id$id($user->nick) снял устное предупреждения лидеру @id$predsid->vkid($predsid->nick) банды $predsid->gang<br>Причина: $prichinapreda");

            if($predsid->oral == 3){
                R::load('leaders',$predsid->nick);
                $predsid->oral = 0;
                $predsid->strong = $predsid->strong - 1;
                R::store($predsid);
                $vk->sendMessage(2000000007,"Лидеру @id$predsid->vkid($predsid->nick) банды $predsid->gang внес строгий выговор<br>Причина: 3/3 предов");
            }
        }
    }else{$vk->sendMessage($peer_id,"Нет прав");}
}
}

if ($data->type == 'message_new') { // команда снять пред/выговор
    if (preg_match("/^\/removepred\saztec\s(.+)/",$message,$pred)) {
        if($user->lvl >= 4){
       if (!preg_match("/(.+)/",$pred[1],$pred)){
            gomsg("/removepred [gang] [причина]",$data);
            return;
            }
            $prichinapreda = $pred[1];
            $predsid = R::findOne('leaders','id = ?',array(4));
        if($predsid){
                R::load('leaders',$predsid->nick);
                $predsid->oral = $predsid->oral - 1;
                R::store($predsid);
                if($predsid->oral == '-1'){
                $predsid->oral = 2;
                $predsid->strong = $predsid->strong - 1;
                R::store($predsid);
                $vk->sendMessage($peer_id,"Снял лидеру выговор т.к. уст = -1.");
                }
                $vk->sendMessage(2000000007,"@id$id($user->nick) снял устное предупреждения лидеру @id$predsid->vkid($predsid->nick) банды $predsid->gang<br>Причина: $prichinapreda");
                $vk->sendMessage(2000000005,"@id$id($user->nick) снял устное предупреждения лидеру @id$predsid->vkid($predsid->nick) банды $predsid->gang<br>Причина: $prichinapreda");

            if($predsid->oral == 3){
                R::load('leaders',$predsid->nick);
                $predsid->oral = 0;
                $predsid->strong = $predsid->strong - 1;
                R::store($predsid);
                $vk->sendMessage(2000000007,"Лидеру @id$$predsid->vkid($predsid->nick) банды $predsid->gang внес строгий выговор<br>Причина: 3/3 предов");
            }
        }
    }else{$vk->sendMessage($peer_id,"Нет прав");}
}
}

if ($data->type == 'message_new') { // команда внести пред/выговор
    if (preg_match("/^\/addvug\snw(.+)/",$message,$vug)) {
        if($user->lvl == 3){
            if (!preg_match("/(.+)/",$vug[1],$vug)){
                gomsg("/addvug [gang] [причина]",$data);
                return;
                }
                $messa = mb_substr($message ,10);
                $prichinavug = $vug[1];
                $predsid = R::findOne('leaders','id = ?',array(5));
                $predpomo = R::load('pomochs',NULL);
                $predpomo->nickadm = $user->nick;
                $predpomo->reason = $prichinavug;
                $predpomo->nickleader = $predsid->nick;
                $predpomo->typenak = 'строгий выговор';
                $predpomo->code = 0;
                $predpomo->dokva = $messa;
                R::store($predpomo);
                $vk->sendMessage($peer_id,"Вы запросили выдачу наказания с номером $predpomo->id! Ожидайте подтверждения от следящих.");
                $vk->sendMessage(2000000007,"Помощник @id$id($predpomo->nickadm) запросил выдачу выговора лидеру @id$predsid->vkid($predsid->nick) банды $predsid->gang<br><br>⚠Доказательства и причина: $predpomo->dokva<br><br>✅ Чтобы подтвердить выдачу пропишите /nak $predpomo->id ✅<br>⛔ Чтобы отказать выдачу пропишите /otkaz $predpomo->id ⛔<br>");
                }

        if($user->lvl >= 4){
            if (!preg_match("/(.+)/",$vug[1],$vug)){
                gomsg("/addvug [gang] [причина]",$data);
                return;
                }
            $prichinavug = $vug[1];
            $vugsid = R::findOne('leaders','id = ?',array(5));
            if($vugsid){
                $vugsid->strong = $vugsid->strong + 1;
                R::store($vugsid);
                if($vugsid->strong == 5){
                    $vk->request('messages.send', ['peer_id' => 2000000005 ,'message' => "@id$id($user->nick) выдал строгий выговор лидеру @id$vugsid->vkid($vugsid->nick) банды $vugsid->gang<br>Причина: $prichinavug",'attachment' => "photo{$imgstr[0]}"]);
                    $vk->sendMessage(2000000007,"⚠У лидера @id$vugsid->vkid($vugsid->nick) $vugsid->gang 5/5 строгих.⚠");
                }
                $vk->sendMessage(2000000007,"@id$id($user->nick) выдал строгий выговор лидеру @id$vugsid->vkid($vugsid->nick) банды $vugsid->gang<br>Причина: $prichinavug");
                $vk->request('messages.send', ['peer_id' => 2000000005 ,'message' => "@id$id($user->nick) выдал строгий выговор лидеру @id$vugsid->vkid($vugsid->nick) банды $vugsid->gang<br>Причина: $prichinavug",'attachment' => "photo{$imgstr[0]}"]);
            }
}
}
}


 if ($data->type == 'message_new') { // команда внести пред/выговор
    if (preg_match("/^\/addvug\sballas(.+)/",$message,$vug)) {
        if($user->lvl == 3){
            if (!preg_match("/(.+)/",$vug[1],$vug)){
                gomsg("/addvug [gang] [причина]",$data);
                return;
                }
                $messa = mb_substr($message ,14);
                $prichinavug = $vug[1];
                $predsid = R::findOne('leaders','id = ?',array(3));
                $predpomo = R::load('pomochs',NULL);
                $predpomo->nickadm = $user->nick;
                $predpomo->reason = $prichinavug;
                $predpomo->nickleader = $predsid->nick;
                $predpomo->typenak = 'строгий выговор';
                $predpomo->code = 0;
                $predpomo->dokva = $messa;
                R::store($predpomo);
                $vk->sendMessage($peer_id,"Вы запросили выдачу наказания с номером $predpomo->id! Ожидайте подтверждения от следящих.");
                $vk->sendMessage(2000000007,"Помощник @id$id($predpomo->nickadm) запросил выдачу выговора лидеру @id$predsid->vkid($predsid->nick) банды $predsid->gang<br><br>⚠Доказательства и причина: $predpomo->dokva<br><br>✅ Чтобы подтвердить выдачу пропишите /nak $predpomo->id ✅<br>⛔ Чтобы отказать выдачу пропишите /otkaz $predpomo->id ⛔<br>");
                }

        if($user->lvl >= 4){
            if (!preg_match("/(.+)/",$vug[1],$vug)){
                gomsg("/addvug [gang] [причина]",$data);
                return;
                }
            $prichinavug = $vug[1];
            $vugsid = R::findOne('leaders','id = ?',array(3));
            if($vugsid){
                $vugsid->strong = $vugsid->strong + 1;
                R::store($vugsid);
                if($vugsid->strong == 5){
                    $vk->request('messages.send', ['peer_id' => 2000000005 ,'message' => "@id$id($user->nick) выдал строгий выговор лидеру @id$vugsid->vkid($vugsid->nick) банды $vugsid->gang<br>Причина: $prichinavug",'attachment' => "photo{$imgstr[0]}"]);
                    $vk->sendMessage(2000000007,"⚠У лидера @id$vugsid->vkid($vugsid->nick) $vugsid->gang 5/5 строгих.⚠");
                }
                $vk->sendMessage(2000000007,"@id$id($user->nick) выдал строгий выговор лидеру @id$vugsid->vkid($vugsid->nick) банды $vugsid->gang<br>Причина: $prichinavug");
                $vk->request('messages.send', ['peer_id' => 2000000005 ,'message' => "@id$id($user->nick) выдал строгий выговор лидеру @id$vugsid->vkid($vugsid->nick) банды $vugsid->gang<br>Причина: $prichinavug",'attachment' => "photo{$imgstr[0]}"]);
            }
}
}
}

if ($data->type == 'message_new') { // команда внести пред/выговор
    if (preg_match("/^\/addvug\svagos(.+)/",$message,$vug)) {
        if($user->lvl == 3){
            if (!preg_match("/(.+)/",$vug[1],$vug)){
                gomsg("/addvug [gang] [причина]",$data);
                return;
                }
                $messa = mb_substr($message ,13);
                $prichinavug = $vug[1];
                $predsid = R::findOne('leaders','id = ?',array(2));
                $predpomo = R::load('pomochs',NULL);
                $predpomo->nickadm = $user->nick;
                $predpomo->reason = $prichinavug;
                $predpomo->nickleader = $predsid->nick;
                $predpomo->typenak = 'строгий выговор';
                $predpomo->code = 0;
                $predpomo->dokva = $messa;
                R::store($predpomo);
                $vk->sendMessage($peer_id,"Вы запросили выдачу наказания с номером $predpomo->id! Ожидайте подтверждения от следящих.");
                $vk->sendMessage(2000000007,"Помощник @id$id($predpomo->nickadm) запросил выдачу выговора лидеру @id$predsid->vkid($predsid->nick) банды $predsid->gang<br><br>⚠Доказательства и причина: $predpomo->dokva<br><br>✅ Чтобы подтвердить выдачу пропишите /nak $predpomo->id ✅<br>⛔ Чтобы отказать выдачу пропишите /otkaz $predpomo->id ⛔<br>");
                }

        if($user->lvl >= 4){
            if (!preg_match("/(.+)/",$vug[1],$vug)){
                gomsg("/addvug [gang] [причина]",$data);
                return;
                }
            $prichinavug = $vug[1];
            $vugsid = R::findOne('leaders','id = ?',array(2));
            if($vugsid){
                $vugsid->strong = $vugsid->strong + 1;
                R::store($vugsid);
                if($vugsid->strong == 5){
                    $vk->request('messages.send', ['peer_id' => 2000000005 ,'message' => "@id$id($user->nick) выдал строгий выговор лидеру @id$vugsid->vkid($vugsid->nick) банды $vugsid->gang<br>Причина: $prichinavug",'attachment' => "photo{$imgstr[0]}"]);
                    $vk->sendMessage(2000000007,"⚠У лидера @id$vugsid->vkid($vugsid->nick) $vugsid->gang 5/5 строгих.⚠");
                }
                $vk->sendMessage(2000000007,"@id$id($user->nick) выдал строгий выговор лидеру @id$vugsid->vkid($vugsid->nick) банды $vugsid->gang<br>Причина: $prichinavug");
                $vk->request('messages.send', ['peer_id' => 2000000005 ,'message' => "@id$id($user->nick) выдал строгий выговор лидеру @id$vugsid->vkid($vugsid->nick) банды $vugsid->gang<br>Причина: $prichinavug",'attachment' => "photo{$imgstr[0]}"]);
            }
}
}
}


if ($data->type == 'message_new') { // команда внести пред/выговор
    if (preg_match("/^\/addvug\srifa(.+)/",$message,$vug)) {
        if($user->lvl == 3){
            if (!preg_match("/(.+)/",$vug[1],$vug)){
                gomsg("/addvug [gang] [причина]",$data);
                return;
                }
                $messa = mb_substr($message ,12);
                $prichinavug = $vug[1];
                $predsid = R::findOne('leaders','id = ?',array(6));
                $predpomo = R::load('pomochs',NULL);
                $predpomo->nickadm = $user->nick;
                $predpomo->reason = $prichinavug;
                $predpomo->nickleader = $predsid->nick;
                $predpomo->typenak = 'строгий выговор';
                $predpomo->code = 0;
                $predpomo->dokva = $messa;
                R::store($predpomo);
                $vk->sendMessage($peer_id,"Вы запросили выдачу наказания с номером $predpomo->id! Ожидайте подтверждения от следящих.");
                $vk->sendMessage(2000000007,"Помощник @id$id($predpomo->nickadm) запросил выдачу выговора лидеру @id$predsid->vkid($predsid->nick) банды $predsid->gang<br><br>⚠Доказательства и причина: $predpomo->dokva<br><br>✅ Чтобы подтвердить выдачу пропишите /nak $predpomo->id ✅<br>⛔ Чтобы отказать выдачу пропишите /otkaz $predpomo->id ⛔<br>");
                }

        if($user->lvl >= 4){
            if (!preg_match("/(.+)/",$vug[1],$vug)){
                gomsg("/addvug [gang] [причина]",$data);
                return;
                }
            $prichinavug = $vug[1];
            $vugsid = R::findOne('leaders','id = ?',array(6));
            if($vugsid){
                $vugsid->strong = $vugsid->strong + 1;
                R::store($vugsid);
                if($vugsid->strong == 5){
                    $vk->request('messages.send', ['peer_id' => 2000000005 ,'message' => "@id$id($user->nick) выдал строгий выговор лидеру @id$vugsid->vkid($vugsid->nick) банды $vugsid->gang<br>Причина: $prichinavug",'attachment' => "photo{$imgstr[0]}"]);
                    $vk->sendMessage(2000000007,"⚠У лидера @id$vugsid->vkid($vugsid->nick) $vugsid->gang 5/5 строгих.⚠");
                }
                $vk->sendMessage(2000000007,"@id$id($user->nick) выдал строгий выговор лидеру @id$vugsid->vkid($vugsid->nick) банды $vugsid->gang<br>Причина: $prichinavug");
                $vk->request('messages.send', ['peer_id' => 2000000005 ,'message' => "@id$id($user->nick) выдал строгий выговор лидеру @id$vugsid->vkid($vugsid->nick) банды $vugsid->gang<br>Причина: $prichinavug",'attachment' => "photo{$imgstr[0]}"]);
            }
}
}
}

if ($data->type == 'message_new') { // команда внести пред/выговор
    if (preg_match("/^\/addvug\sgrove(.+)/",$message,$vug)) {
        if($user->lvl == 3){
            if (!preg_match("/(.+)/",$vug[1],$vug)){
                gomsg("/addvug [gang] [причина]",$data);
                return;
                }
                $messa = mb_substr($message ,13);
                $prichinavug = $vug[1];
                $predsid = R::findOne('leaders','id = ?',array(1));
                $predpomo = R::load('pomochs',NULL);
                $predpomo->nickadm = $user->nick;
                $predpomo->reason = $prichinavug;
                $predpomo->nickleader = $predsid->nick;
                $predpomo->typenak = 'строгий выговор';
                $predpomo->code = 0;
                $predpomo->dokva = $messa;
                R::store($predpomo);
                $vk->sendMessage($peer_id,"Вы запросили выдачу наказания с номером $predpomo->id! Ожидайте подтверждения от следящих.");
                $vk->sendMessage(2000000007,"Помощник @id$id($predpomo->nickadm) запросил выдачу выговора лидеру @id$predsid->vkid($predsid->nick) банды $predsid->gang<br><br>⚠Доказательства и причина: $predpomo->dokva<br><br>✅ Чтобы подтвердить выдачу пропишите /nak $predpomo->id ✅<br>⛔ Чтобы отказать выдачу пропишите /otkaz $predpomo->id ⛔<br>");
                }

        if($user->lvl >= 4){
            if (!preg_match("/(.+)/",$vug[1],$vug)){
                gomsg("/addvug [gang] [причина]",$data);
                return;
                }
            $prichinavug = $vug[1];
            $vugsid = R::findOne('leaders','id = ?',array(1));
            if($vugsid){
                $vugsid->strong = $vugsid->strong + 1;
                R::store($vugsid);
                if($vugsid->strong == 5){
                    $vk->request('messages.send', ['peer_id' => 2000000005 ,'message' => "@id$id($user->nick) выдал строгий выговор лидеру @id$vugsid->vkid($vugsid->nick) банды $vugsid->gang<br>Причина: $prichinavug",'attachment' => "photo{$imgstr[0]}"]);
                    $vk->sendMessage(2000000007,"⚠У лидера @id$vugsid->vkid($vugsid->nick) $vugsid->gang 5/5 строгих.⚠");
                }
                $vk->sendMessage(2000000007,"@id$id($user->nick) выдал строгий выговор лидеру @id$vugsid->vkid($vugsid->nick) банды $vugsid->gang<br>Причина: $prichinavug");
                $vk->request('messages.send', ['peer_id' => 2000000005 ,'message' => "@id$id($user->nick) выдал строгий выговор лидеру @id$vugsid->vkid($vugsid->nick) банды $vugsid->gang<br>Причина: $prichinavug",'attachment' => "photo{$imgstr[0]}"]);
            }
}
}
}

if ($data->type == 'message_new') { // команда внести пред/выговор
    if (preg_match("/^\/addvug\saztec(.+)/",$message,$vug)) {
        if($user->lvl == 3){
            if (!preg_match("/(.+)/",$vug[1],$vug)){
                gomsg("/addvug [gang] [причина]",$data);
                return;
                }
                $messa = mb_substr($message ,13);
                $prichinavug = $vug[1];
                $predsid = R::findOne('leaders','id = ?',array(4));
                $predpomo = R::load('pomochs',NULL);
                $predpomo->nickadm = $user->nick;
                $predpomo->reason = $prichinavug;
                $predpomo->nickleader = $predsid->nick;
                $predpomo->typenak = 'строгий выговор';
                $predpomo->code = 0;
                $predpomo->dokva = $messa;
                R::store($predpomo);
                $vk->sendMessage($peer_id,"Вы запросили выдачу наказания с номером $predpomo->id! Ожидайте подтверждения от следящих.");
                $vk->sendMessage(2000000007,"Помощник @id$id($predpomo->nickadm) запросил выдачу выговора лидеру @id$predsid->vkid($predsid->nick) банды $predsid->gang<br><br>⚠Доказательства и причина: $predpomo->dokva<br><br>✅ Чтобы подтвердить выдачу пропишите /nak $predpomo->id ✅<br>⛔ Чтобы отказать выдачу пропишите /otkaz $predpomo->id ⛔<br>");
                }

        if($user->lvl >= 4){
            if (!preg_match("/(.+)/",$vug[1],$vug)){
                gomsg("/addvug [gang] [причина]",$data);
                return;
                }
            $prichinavug = $vug[1];
            $vugsid = R::findOne('leaders','id = ?',array(4));
            if($vugsid){
                $vugsid->strong = $vugsid->strong + 1;
                R::store($vugsid);
                if($vugsid->strong == 5){
                    $vk->request('messages.send', ['peer_id' => 2000000005 ,'message' => "@id$id($user->nick) выдал строгий выговор лидеру @id$vugsid->vkid($vugsid->nick) банды $vugsid->gang<br>Причина: $prichinavug",'attachment' => "photo{$imgstr[0]}"]);
                    $vk->sendMessage(2000000007,"⚠У лидера @id$vugsid->vkid($vugsid->nick) $vugsid->gang 5/5 строгих.⚠");
                }
                $vk->sendMessage(2000000007,"@id$id($user->nick) выдал строгий выговор лидеру @id$vugsid->vkid($vugsid->nick) банды $vugsid->gang<br>Причина: $prichinavug");
                $vk->request('messages.send', ['peer_id' => 2000000005 ,'message' => "@id$id($user->nick) выдал строгий выговор лидеру @id$vugsid->vkid($vugsid->nick) банды $vugsid->gang<br>Причина: $prichinavug",'attachment' => "photo{$imgstr[0]}"]);
            }
}
}
}








if ($data->type == 'message_new') { // команда внести пред/выговор
    if (preg_match("/^\/addvug\slcn(.+)/",$message,$vug)) {
        if($user->lvl >= 4){
            if (!preg_match("/(.+)/",$vug[1],$vug)){
                gomsg("/addvug [gang] [причина]",$data);
                return;
                }
            $prichinavug = $vug[1];
            $vugsid = R::findOne('leaders','id = ?',array(8));
            if($vugsid){
                $vugsid->strong = $vugsid->strong + 1;
                R::store($vugsid);
                if($vugsid->strong == 5){
                    $vk->request('messages.send', ['peer_id' => 2000000018 ,'message' => "@id$id($user->nick) выдал строгий выговор лидеру @id$vugsid->vkid($vugsid->nick) мафии $vugsid->gang<br>Причина: $prichinavug",'attachment' => "photo{$imgstr[0]}"]);
                    $vk->sendMessage(2000000017,"⚠У лидера @id$vugsid->vkid($vugsid->nick) $vugsid->gang 5/5 строгих.⚠");
                }
                $vk->sendMessage(2000000017,"@id$id($user->nick) выдал строгий выговор лидеру @id$vugsid->vkid($vugsid->nick) мафии $vugsid->gang<br>Причина: $prichinavug");
                $vk->request('messages.send', ['peer_id' => 2000000018 ,'message' => "@id$id($user->nick) выдал строгий выговор лидеру @id$vugsid->vkid($vugsid->nick) мафии $vugsid->gang<br>Причина: $prichinavug",'attachment' => "photo{$imgstr[0]}"]);
            }
}
}
}

if ($data->type == 'message_new') { // команда внести пред/выговор
    if (preg_match("/^\/addvug\srm(.+)/",$message,$vug)) {
        if($user->lvl >= 4){
            if (!preg_match("/(.+)/",$vug[1],$vug)){
                gomsg("/addvug [gang] [причина]",$data);
                return;
                }
            $prichinavug = $vug[1];
            $vugsid = R::findOne('leaders','id = ?',array(9));
            if($vugsid){
                $vugsid->strong = $vugsid->strong + 1;
                R::store($vugsid);
                if($vugsid->strong == 5){
                    $vk->request('messages.send', ['peer_id' => 2000000018 ,'message' => "@id$id($user->nick) выдал строгий выговор лидеру @id$vugsid->vkid($vugsid->nick) мафии $vugsid->gang<br>Причина: $prichinavug",'attachment' => "photo{$imgstr[0]}"]);
                    $vk->sendMessage(2000000017,"⚠У лидера @id$vugsid->vkid($vugsid->nick) $vugsid->gang 5/5 строгих.⚠");
                }
                $vk->sendMessage(2000000017,"@id$id($user->nick) выдал строгий выговор лидеру @id$vugsid->vkid($vugsid->nick) мафии $vugsid->gang<br>Причина: $prichinavug");
                $vk->request('messages.send', ['peer_id' => 2000000018 ,'message' => "@id$id($user->nick) выдал строгий выговор лидеру @id$vugsid->vkid($vugsid->nick) мафии $vugsid->gang<br>Причина: $prichinavug",'attachment' => "photo{$imgstr[0]}"]);
            }
}
}
}


if ($data->type == 'message_new') { // команда внести пред/выговор
    if (preg_match("/^\/addvug\swarlock(.+)/",$message,$vug)) {
        if($user->lvl >= 4){
            if (!preg_match("/(.+)/",$vug[1],$vug)){
                gomsg("/addvug [gang] [причина]",$data);
                return;
                }
            $prichinavug = $vug[1];
            $vugsid = R::findOne('leaders','id = ?',array(7));
            if($vugsid){
                $vugsid->strong = $vugsid->strong + 1;
                R::store($vugsid);
                if($vugsid->strong == 5){
                    $vk->request('messages.send', ['peer_id' => 2000000018 ,'message' => "@id$id($user->nick) выдал строгий выговор лидеру @id$vugsid->vkid($vugsid->nick) мафии $vugsid->gang<br>Причина: $prichinavug",'attachment' => "photo{$imgstr[0]}"]);
                    $vk->sendMessage(2000000017,"⚠У лидера @id$vugsid->vkid($vugsid->nick) $vugsid->gang 5/5 строгих.⚠");
                }
                $vk->sendMessage(2000000017,"@id$id($user->nick) выдал строгий выговор лидеру @id$vugsid->vkid($vugsid->nick) мафии $vugsid->gang<br>Причина: $prichinavug");
                $vk->request('messages.send', ['peer_id' => 2000000018 ,'message' => "@id$id($user->nick) выдал строгий выговор лидеру @id$vugsid->vkid($vugsid->nick) мафии $vugsid->gang<br>Причина: $prichinavug",'attachment' => "photo{$imgstr[0]}"]);
            }
}
}
}

if ($data->type == 'message_new') { // команда внести пред/выговор
    if (preg_match("/^\/addvug\syakuza(.+)/",$message,$vug)) {
        if($user->lvl >= 4){
            if (!preg_match("/(.+)/",$vug[1],$vug)){
                gomsg("/addvug [gang] [причина]",$data);
                return;
                }
            $prichinavug = $vug[1];
            $vugsid = R::findOne('leaders','id = ?',array(10));
            if($vugsid){
                $vugsid->strong = $vugsid->strong + 1;
                R::store($vugsid);
                if($vugsid->strong == 5){
                    $vk->request('messages.send', ['peer_id' => 2000000018 ,'message' => "@id$id($user->nick) выдал строгий выговор лидеру @id$vugsid->vkid($vugsid->nick) мафии $vugsid->gang<br>Причина: $prichinavug",'attachment' => "photo{$imgstr[0]}"]);
                    $vk->sendMessage(2000000017,"⚠У лидера @id$vugsid->vkid($vugsid->nick) $vugsid->gang 5/5 строгих.⚠");
                }
                $vk->sendMessage(2000000017,"@id$id($user->nick) выдал строгий выговор лидеру @id$vugsid->vkid($vugsid->nick) мафии $vugsid->gang<br>Причина: $prichinavug");
                $vk->request('messages.send', ['peer_id' => 2000000018 ,'message' => "@id$id($user->nick) выдал строгий выговор лидеру @id$vugsid->vkid($vugsid->nick) мафии $vugsid->gang<br>Причина: $prichinavug",'attachment' => "photo{$imgstr[0]}"]);
            }
}
}
}


if ($data->type == 'message_new') { // команда снять пред/выговор
    if (preg_match("/^\/removevug\syakuza(.+)/",$message,$vug)) {
        if($user->lvl >= 4){
        if (!preg_match("/(.+)/",$vug[1],$vug)){
            gomsg("/removevug [gang] [причина]",$data);
            return;
            }
        $prichinavug = $vug[1];
        $vugsid = R::findOne('leaders','id = ?',array(10));
        if($vugsid){
            $vugsid->strong = $vugsid->strong - 1;
            R::store($vugsid);
            $vk->sendMessage(2000000017,"@id$id($user->nick) снял строгий выговор лидеру @id$vugsid->vkid($vugsid->nick) банды $vugsid->gang<br>Причина: $prichinavug");
            $vk->sendMessage(2000000018,"@id$id($user->nick) снял строгий выговор лидеру @id$vugsid->vkid($vugsid->nick) банды $vugsid->gang<br>Причина: $prichinavug");
        }
}else{$vk->sendMessage($peer_id,"Нет прав");}
}
}


if ($data->type == 'message_new') { // команда снять пред/выговор
    if (preg_match("/^\/removevug\swarlock(.+)/",$message,$vug)) {
        if($user->lvl >= 4){
        if (!preg_match("/(.+)/",$vug[1],$vug)){
            gomsg("/removevug [gang] [причина]",$data);
            return;
            }
        $prichinavug = $vug[1];
        $vugsid = R::findOne('leaders','id = ?',array(7));
        if($vugsid){
            $vugsid->strong = $vugsid->strong - 1;
            R::store($vugsid);
            $vk->sendMessage(2000000017,"@id$id($user->nick) снял строгий выговор лидеру @id$vugsid->vkid($vugsid->nick) банды $vugsid->gang<br>Причина: $prichinavug");
            $vk->sendMessage(2000000018,"@id$id($user->nick) снял строгий выговор лидеру @id$vugsid->vkid($vugsid->nick) банды $vugsid->gang<br>Причина: $prichinavug");
        }
}else{$vk->sendMessage($peer_id,"Нет прав");}
}
}
if ($data->type == 'message_new') { // команда снять пред/выговор
    if (preg_match("/^\/removevug\srm(.+)/",$message,$vug)) {
        if($user->lvl >= 4){
        if (!preg_match("/(.+)/",$vug[1],$vug)){
            gomsg("/removevug [gang] [причина]",$data);
            return;
            }
        $prichinavug = $vug[1];
        $vugsid = R::findOne('leaders','id = ?',array(9));
        if($vugsid){
            $vugsid->strong = $vugsid->strong - 1;
            R::store($vugsid);
            $vk->sendMessage(2000000017,"@id$id($user->nick) снял строгий выговор лидеру @id$vugsid->vkid($vugsid->nick) банды $vugsid->gang<br>Причина: $prichinavug");
            $vk->sendMessage(2000000018,"@id$id($user->nick) снял строгий выговор лидеру @id$vugsid->vkid($vugsid->nick) банды $vugsid->gang<br>Причина: $prichinavug");
        }
}else{$vk->sendMessage($peer_id,"Нет прав");}
}
}
if ($data->type == 'message_new') { // команда снять пред/выговор
    if (preg_match("/^\/removevug\slcn(.+)/",$message,$vug)) {
        if($user->lvl >= 4){
        if (!preg_match("/(.+)/",$vug[1],$vug)){
            gomsg("/removevug [gang] [причина]",$data);
            return;
            }
        $prichinavug = $vug[1];
        $vugsid = R::findOne('leaders','id = ?',array(8));
        if($vugsid){
            $vugsid->strong = $vugsid->strong - 1;
            R::store($vugsid);
            $vk->sendMessage(2000000017,"@id$id($user->nick) снял строгий выговор лидеру @id$vugsid->vkid($vugsid->nick) банды $vugsid->gang<br>Причина: $prichinavug");
            $vk->sendMessage(2000000018,"@id$id($user->nick) снял строгий выговор лидеру @id$vugsid->vkid($vugsid->nick) банды $vugsid->gang<br>Причина: $prichinavug");
        }
}else{$vk->sendMessage($peer_id,"Нет прав");}
}
}


if ($data->type == 'message_new') { // команда снять пред/выговор
    if (preg_match("/^\/removevug\sballas(.+)/",$message,$vug)) {
        if($user->lvl >= 4){
        if (!preg_match("/(.+)/",$vug[1],$vug)){
            gomsg("/removevug [gang] [причина]",$data);
            return;
            }
        $prichinavug = $vug[1];
        $vugsid = R::findOne('leaders','id = ?',array(3));
        if($vugsid){
            $vugsid->strong = $vugsid->strong - 1;
            R::store($vugsid);
            $vk->sendMessage(2000000007,"@id$id($user->nick) снял строгий выговор лидеру @id$vugsid->vkid($vugsid->nick) банды $vugsid->gang<br>Причина: $prichinavug");
            $vk->sendMessage(2000000005,"@id$id($user->nick) снял строгий выговор лидеру @id$vugsid->vkid($vugsid->nick) банды $vugsid->gang<br>Причина: $prichinavug");
        }
}else{$vk->sendMessage($peer_id,"Нет прав");}
}
}

if ($data->type == 'message_new') { // команда снять пред/выговор
    if (preg_match("/^\/removevug\svagos(.+)/",$message,$vug)) {
        if($user->lvl >= 4){
        if (!preg_match("/(.+)/",$vug[1],$vug)){
            gomsg("/removevug [gang] [причина]",$data);
            return;
            }
        $prichinavug = $vug[1];
        $vugsid = R::findOne('leaders','id = ?',array(2));
        if($vugsid){
            $vugsid->strong = $vugsid->strong - 1;
            R::store($vugsid);
            $vk->sendMessage(2000000007,"@id$id($user->nick) снял строгий выговор лидеру @id$vugsid->vkid($vugsid->nick) банды $vugsid->gang<br>Причина: $prichinavug");
            $vk->sendMessage(2000000005,"@id$id($user->nick) снял строгий выговор лидеру @id$vugsid->vkid($vugsid->nick) банды $vugsid->gang<br>Причина: $prichinavug");
        }
}else{$vk->sendMessage($peer_id,"Нет прав");}
}
}

if ($data->type == 'message_new') { // команда снять пред/выговор
    if (preg_match("/^\/removevug\snw(.+)/",$message,$vug)) {
        if($user->lvl >= 4){
        if (!preg_match("/(.+)/",$vug[1],$vug)){
            gomsg("/removevug [gang] [причина]",$data);
            return;
            }
        $prichinavug = $vug[1];
        $vugsid = R::findOne('leaders','id = ?',array(5));
        if($vugsid){
            $vugsid->strong = $vugsid->strong - 1;
            R::store($vugsid);
            $vk->sendMessage(2000000007,"@id$id($user->nick) снял строгий выговор лидеру @id$vugsid->vkid($vugsid->nick) банды $vugsid->gang<br>Причина: $prichinavug");
            $vk->sendMessage(2000000005,"@id$id($user->nick) снял строгий выговор лидеру @id$vugsid->vkid($vugsid->nick) банды $vugsid->gang<br>Причина: $prichinavug");
        }
}else{$vk->sendMessage($peer_id,"Нет прав");}
}
}


if ($data->type == 'message_new') { // команда снять пред/выговор
    if (preg_match("/^\/removevug\srifa(.+)/",$message,$vug)) {
        if($user->lvl >= 4){
        if (!preg_match("/(.+)/",$vug[1],$vug)){
            gomsg("/removevug [gang] [причина]",$data);
            return;
            }
        $prichinavug = $vug[1];
        $vugsid = R::findOne('leaders','id = ?',array(6));
        if($vugsid){
            $vugsid->strong = $vugsid->strong - 1;
            R::store($vugsid);
            $vk->sendMessage(2000000007,"@id$id($user->nick) снял строгий выговор лидеру @id$vugsid->vkid($vugsid->nick) банды $vugsid->gang<br>Причина: $prichinavug");
            $vk->sendMessage(2000000005,"@id$id($user->nick) снял строгий выговор лидеру @id$vugsid->vkid($vugsid->nick) банды $vugsid->gang<br>Причина: $prichinavug");
        }
}else{$vk->sendMessage($peer_id,"Нет прав");}
}
}


if ($data->type == 'message_new') { // команда снять пред/выговор
    if (preg_match("/^\/removevug\sgrove(.+)/",$message,$vug)) {
        if($user->lvl >= 4){
        if (!preg_match("/(.+)/",$vug[1],$vug)){
            gomsg("/removevug [gang] [причина]",$data);
            return;
            }
        $prichinavug = $vug[1];
        $vugsid = R::findOne('leaders','id = ?',array(1));
        if($vugsid){
            $vugsid->strong = $vugsid->strong - 1;
            R::store($vugsid);
            $vk->sendMessage(2000000007,"@id$id($user->nick) снял строгий выговор лидеру @id$vugsid->vkid($vugsid->nick) банды $vugsid->gang<br>Причина: $prichinavug");
            $vk->sendMessage(2000000005,"@id$id($user->nick) снял строгий выговор лидеру @id$vugsid->vkid($vugsid->nick) банды $vugsid->gang<br>Причина: $prichinavug");
        }
}else{$vk->sendMessage($peer_id,"Нет прав");}
}
}

if ($data->type == 'message_new') { // команда снять пред/выговор
    if (preg_match("/^\/removevug\saztec(.+)/",$message,$vug)) {
        if($user->lvl >= 4){
        if (!preg_match("/(.+)/",$vug[1],$vug)){
            gomsg("/removevug [gang] [причина]",$data);
            return;
            }
        $prichinavug = $vug[1];
        $vugsid = R::findOne('leaders','id = ?',array(4));
        if($vugsid){
            $vugsid->strong = $vugsid->strong - 1;
            R::store($vugsid);
            $vk->sendMessage(2000000007,"@id$id($user->nick) снял строгий выговор лидеру @id$vugsid->vkid($vugsid->nick) банды $vugsid->gang<br>Причина: $prichinavug");
            $vk->sendMessage(2000000005,"@id$id($user->nick) снял строгий выговор лидеру @id$vugsid->vkid($vugsid->nick) банды $vugsid->gang<br>Причина: $prichinavug");
        }
}else{$vk->sendMessage($peer_id,"Нет прав");}
}
}

/* if ($data->type == 'message_new') { // команда сменить дату снятия лидера
    if (preg_match("/^\/setsrok\s(.+)/",$message,$vug)) {
        if($user->lvl >= 4){
        if (!preg_match("/(\[id\d+|.+\])\s+(.+)/",$vug[1],$vug)){
            gomsg("/setsrok @упоминание хх.хх.хххх",$data);
            return;
            }
        $prichinavug = $vug[2];
        $vug_id = mb_substr($message ,9); // еще раз обрезаем и получаем все что написано после /kick_
        $vug_id = explode("|", mb_substr($vug_id, 3))[0]; // Делитель |, обрезаем первые 3 символа (@id) и получаем чистый ID :-)
        $vugid = R::findOne('users','vkid = ?',array($vug_id));
        $vugsid = R::findOne('leaders','nick = ?',array($vugid->nick));
        if($vugsid){
            $vugsid->snyal = $prichinavug;
            R::store($vugsid);
            $vk->sendMessage($peer_id,"@id$id($user->nick) установил дату снятия лидеру @id$vug_id($vugid->nick) банды $vugsid->gang<br>дата снятия: $prichinavug");
        }
}else{$vk->sendMessage($peer_id,"Нет прав");}
}
} */

if ($data->type == 'message_new') { // команда сменить дату снятия лидера
    if (preg_match("/^\/setsrok\s(.+)/",$message,$vug)) {
        if($user->lvl >= 4){
        if (!preg_match("/(.+)\s+(.+)/",$vug[1],$vug)){
            gomsg("/setsrok [fraction] [хх.хх.хххх]",$data);
            return;
            }
            $setlid = $vug[1];
            $srok = $vug[2];
            if (!($setlid == ballas OR $setlid == grove OR $setlid == vagos OR $setlid == rifa OR $setlid == aztec OR $setlid == игрок OR $setlid == warlock OR $setlid == rm OR $setlid == lcn OR $setlid == yakuza OR $setlid == lspd OR $setlid == sfpd OR $setlid == lvpd OR $setlid == rcsd OR $setlid == lsmc OR $setlid == sfmc OR $setlid == lvmc OR $setlid == gov OR $setlid == гцл OR $setlid == cb OR $setlid == lsa OR $setlid == sfa OR $setlid == тср OR $setlid == cnnls OR $setlid == cnnsf OR $setlid == cnnlv OR $setlid == fbi)){
            gomsg("Введите ballas/grove/vagos/rifa/aztec/warlock/rm/lcn/yakuza/lspd/sfpd/lvpd/rcsd/lsmc/sfmc/lvmc/gov/гцл/cb/lsa/sfa/тср/cnnls/cnnsf/cnnlv/fbi",$data);
            return;
            }
            if($setlid == ballas){$setlid = 'East Side Ballas';}
            if($setlid == grove){$setlid = 'Grove Street Families';}
            if($setlid == vagos){$setlid = 'Los Santos Vagos';}
            if($setlid == rifa){$setlid = 'The Rifa';}
            if($setlid == aztec){$setlid = 'Varrios Los Aztecas';}

            if($setlid == warlock){$setlid = 'Warlock MC';}
            if($setlid == rm){$setlid = 'Russian Mafia';}
            if($setlid == lcn){$setlid = 'La Cosa Nostra';}
            if($setlid == yakuza){$setlid = 'Yakuza';}

            if($setlid == lspd){$setlid = 'Los-Santos Police Departament';}
            if($setlid == sfpd){$setlid = 'San-Fierro Police Departament';}
            if($setlid == lvpd){$setlid = 'Las-Venturas Police Departament';}
            if($setlid == rcsd){$setlid = 'Red-County Sherieff Departament';}
            if($setlid == lsmc){$setlid = 'Los-Santos Medical Center';}
            if($setlid == sfmc){$setlid = 'San-Fierro Medical Center';}
            if($setlid == lvmc){$setlid = 'Las-Venturas Medical Center';}
            if($setlid == gov){$setlid = 'Government';}
            if($setlid == гцл){$setlid = 'Autoschool';}
            if($setlid == cb){$setlid = 'Central Bank';}
            if($setlid == lsa){$setlid = 'Los-Santos Army';}
            if($setlid == sfa){$setlid = 'San-Fierro Army';}
            if($setlid == тср){$setlid = 'Maximum Security Prison';}
            if($setlid == cnnls){$setlid = 'Los-Santos Radio Center';}
            if($setlid == cnnsf){$setlid = 'San-Fierro Radio Center';}
            if($setlid == cnnlv){$setlid = 'Las-Venturas Radio Center';}
            if($setlid == fbi){$setlid = 'Federal Bureau of Investigation';}
            $vugsid = R::findOne('leaders','gang = ?',array($setlid));
            if($vugsid){
            $vugsid->snyal = $srok;
            R::store($vugsid);
            $vk->sendMessage($peer_id,"@id$id($user->nick) установил дату снятия лидеру @id$vugsid->vkid($vugsid->nick) $vugsid->gang<br>дата снятия: $srok");
        }
        }else{$vk->sendMessage($peer_id,"Нет прав");}
}
}



if ($data->type == 'message_new') { // команда /id узнать peer_id беседы
    if($cmd == '/id'){
        if($user->lvl >= 9){
                    $vk->sendMessage($peer_id,"$peer_id");
        }
        else{
            $vk->sendMessage($peer_id,"Нет прав");
        }
    }
}

if ($data->type == 'message_new') { // команда написать сообщения лидерам в кф
    if (preg_match("/^\/sendld\s(.*)/",$message,$vug)) {
        if($user->lvl >= 4){
        if (!preg_match("/(.*)/",$vug[1],$vug)){
            gomsg("/sendld текст",$data);
            return;
            }
        if($peer_id == 2000000007){
        $messa = mb_substr($message ,8);
        $vagos = 'Los Santos Vagos';
        $vagoss = R::findOne('leaders','gang = ?',array($vagos));
        $grove = 'Grove Street Families';
        $groves = R::findOne('leaders','gang = ?',array($grove));
        $rifa = 'The Rifa';
        $rifas = R::findOne('leaders','gang = ?',array($rifa));
        $nw = 'Night Wolves';
        $nws = R::findOne('leaders','gang = ?',array($nw));
        $ballas = 'East Side Ballas';
        $ballass = R::findOne('leaders','gang = ?',array($ballas));
        $aztec = 'Varrios Los Aztecas';
        $aztecs = R::findOne('leaders','gang = ?',array($aztec));

// leader vagos
        if(!($vagoss->vkid == 0)){
            $vag = '@id';
            $vag1 = $vagoss->vkid;
            $vag2 = '(🤡)';
        }
        if($vagoss->vkid == 0){
            $vag = '';
            $vag1 = '';
            $vag2 = '';
        }

// leader grove
        if(!($groves->vkid == 0)){
            $gro = '@id';
            $gro1 = $groves->vkid;
            $gro2 = '(🤡)';
        }
        if($groves->vkid == 0){
            $gro = '';
            $gro1 = '';
            $gro2 = '';
        }

//leader rifa
        if(!($rifas->vkid == 0)){
            $rif = '@id';
            $rif1 = $rifas->vkid;
            $rif2 = '(🤡)';
        }
        if($rifas->vkid == 0){
            $rif = '';
            $rif1 = '';
            $rif2 = '';
        }

 // leader nw
        if(!($nws->vkid == 0)){
            $nwe = '@id';
            $nwe1 = $nws->vkid;
            $nwe2 = '(🤡)';
        }
        if($nws->vkid == 0){
            $nwe = '';
            $nwe1 = '';
            $nwe2 = '';
        }

// leader ballas
        if(!($ballass->vkid == 0)){
            $bal = '@id';
            $bal1 = $ballass->vkid;
            $bal2 = '(🤡)';
        }
        if($ballass->vkid == 0){
            $bal = '';
            $bal1 = '';
            $bal2 = '';
        }

//leader aztec
        if(!($aztecs->vkid == 0)){
            $azt = '@id';
            $azt1 = $aztecs->vkid;
            $azt2 = '(🤡)';
        }
        if($aztecs->vkid == 0){
            $azt = '';
            $azt1 = '';
            $azt2 = '';
        }




        $vk->sendMessage(2000000005,"$messa<br><br>$vag$vag1$vag2$gro$gro1$gro2$rif$rif1$rif2$bal$bal1$bal2$nwe$nwe1$nwe2$azt$azt1$azt2");
        $vk->sendMessage($peer_id,"Отправил☢");
}else{
    $vk->sendMessage($peer_id,"⛔Используйте только в конфе следящих⛔");
}
}else{$vk->sendMessage($peer_id,"Нет прав");}
}
}

if ($data->type == 'message_new') { // команда написать сообщения лидерам в кф
    if (preg_match("/^\/sendldmaf\s(.*)/",$message,$vug)) {
        if($user->lvl >= 4){
        if (!preg_match("/(.*)/",$vug[1],$vug)){
            gomsg("/sendld текст",$data);
            return;
            }
        if($peer_id == 2000000017){
        $messa = mb_substr($message ,11);
         $vagos = 'Warlock MC';
        $vagoss = R::findOne('leaders','gang = ?',array($vagos));
        $grove = 'La Cosa Nostra';
        $groves = R::findOne('leaders','gang = ?',array($grove));
        $rifa = 'Russian Mafia';
        $rifas = R::findOne('leaders','gang = ?',array($rifa));
        $nw = 'Yakuza';
        $nws = R::findOne('leaders','gang = ?',array($nw));

// leader vagos
        if(!($vagoss->vkid == 0)){
            $vag = '@id';
            $vag1 = $vagoss->vkid;
            $vag2 = '(🐒)';
        }
        if($vagoss->vkid == 0){
            $vag = '';
            $vag1 = '';
            $vag2 = '';
        }

// leader grove
        if(!($groves->vkid == 0)){
            $gro = '@id';
            $gro1 = $groves->vkid;
            $gro2 = '(🐒)';
        }
        if($groves->vkid == 0){
            $gro = '';
            $gro1 = '';
            $gro2 = '';
        }

//leader rifa
        if(!($rifas->vkid == 0)){
            $rif = '@id';
            $rif1 = $rifas->vkid;
            $rif2 = '(🐒)';
        }
        if($rifas->vkid == 0){
            $rif = '';
            $rif1 = '';
            $rif2 = '';
        }

 // leader nw
        if(!($nws->vkid == 0)){
            $nwe = '@id';
            $nwe1 = $nws->vkid;
            $nwe2 = '(🐒)';
        }
        if($nws->vkid == 0){
            $nwe = '';
            $nwe1 = '';
            $nwe2 = '';
        }





        $vk->sendMessage(2000000018,"$messa<br><br>$vag$vag1$vag2$gro$gro1$gro2$rif$rif1$rif2$nwe$nwe1$nwe2");
        $vk->sendMessage($peer_id,"Отправил☢");
}else{
    $vk->sendMessage($peer_id,"⛔Используйте только в конфе следящих⛔");
}
}else{$vk->sendMessage($peer_id,"Нет прав");}
}
}

if ($data->type == 'message_new') { // команда /
    if($cmd == '/leaders'){
    $vk->sendMessage($peer_id,"/leadersghetto - лидеры гетто<br>/leadersmafia - лидеры мафии<br>/leadersgos - лидеры гос");
    }
}

if ($data->type == 'message_new') { // команда /
    if($cmd == '/leadersgos'){
            $gos = R::loadAll('leaders',array(28,29,30,31,32,33,34,35,36,37,38,39,40,41,42,43,44));
            foreach($gos as $gas){
                if(!($gas->nick == 'free')){
                  $leaderslist .= "$gas->nick | https://vk.com/id$gas->vkid | $gas->gang<br>";
                }
                if($gas->nick == 'free'){
                  $noleaderslist .= "Нету лидера | $gas->gang<br>";
                }
            }
             $today = date("j.n.Y");
            $vk->sendMessage($peer_id,"😈Лидеры гос | $today 😈<br>$leaderslist$noleaderslist");
        }
    }


if ($data->type == 'message_new') { // команда /
    if($cmd == '/leadersghetto'){
        $vagos = 'Los Santos Vagos';
        $vagoss = R::findOne('leaders','gang = ?',array($vagos));
        $grove = 'Grove Street Families';
        $groves = R::findOne('leaders','gang = ?',array($grove));
        $rifa = 'The Rifa';
        $rifas = R::findOne('leaders','gang = ?',array($rifa));
        $nw = 'Night Wolves';
        $nws = R::findOne('leaders','gang = ?',array($nw));
        $ballas = 'East Side Ballas';
        $ballass = R::findOne('leaders','gang = ?',array($ballas));
        $aztec = 'Varrios Los Aztecas';
        $aztecs = R::findOne('leaders','gang = ?',array($aztec));

// leader vagos
        if(!($vagoss->vkid == 0)){
            $vag = $vagoss->nick;
            $vag1 = ' | https://vk.com/id';
            $vag2 = $vagoss->vkid;
            $vag3 = ' | ';
            $vag4 = $vagoss->gang;
        }
        if($vagoss->vkid == 0){
            $vag = 'Нету лидера';
            $vag1 = '';
            $vag2 = ' | ';
            $vag3 = '';
            $vag4 = $vagoss->gang;
        }

// leader grove
        if(!($groves->vkid == 0)){
            $gro = $groves->nick;
            $gro1 = ' | https://vk.com/id';
            $gro2 = $groves->vkid;
            $gro3 = ' | ';
            $gro4 = $groves->gang;
        }
        if($groves->vkid == 0){
            $gro = 'Нету лидера';
            $gro1 = '';
            $gro2 = ' | ';
            $gro3 = '';
            $gro4 = $groves->gang;
        }

//leader rifa
        if(!($rifas->vkid == 0)){
            $rif = $rifas->nick;
            $rif1 = ' | https://vk.com/id';
            $rif2 = $rifas->vkid;
            $rif3 = ' | ';
            $rif4 = $rifas->gang;
        }
        if($rifas->vkid == 0){
            $rif = 'Нету лидера';
            $rif1 = '';
            $rif2 = ' | ';
            $rif3 = '';
            $rif4 = $rifas->gang;
        }

 // leader nw
        if(!($nws->vkid == 0)){
            $nwe = $nws->nick;
            $nwe1 = ' | https://vk.com/id';
            $nwe2 = $nws->vkid;
            $nwe3 = ' | ';
            $nwe4 = $nws->gang;
        }
        if($nws->vkid == 0){
            $nwe = 'Нету лидера';
            $nwe1 = '';
            $nwe2 = ' | ';
            $nwe3 = '';
            $nwe4 = $nws->gang;
        }

// leader ballas
        if(!($ballass->vkid == 0)){
            $bal = $ballass->nick;
            $bal1 = ' | https://vk.com/id';
            $bal2 = $ballass->vkid;
            $bal3 = ' | ';
            $bal4 = $ballass->gang;
        }
        if($ballass->vkid == 0){
            $bal = 'Нету лидера';
            $bal1 = '';
            $bal2 = ' | ';
            $bal3 = '';
            $bal4 = $ballass->gang;
        }
        $today = date("j.n.Y");
//leader aztec
        if(!($aztecs->vkid == 0)){
            $azt = $aztecs->nick;
            $azt1 = ' | https://vk.com/id';
            $azt2 = $aztecs->vkid;
            $azt3 = ' | ';
            $azt4 = $aztecs->gang;
        }
        if($aztecs->vkid == 0){
            $azt = 'Нету лидера';
            $azt1 = '';
            $azt2 = ' | ';
            $azt3 = '';
            $azt4 = $aztecs->gang;
        }
            $vk->sendMessage($peer_id,"😈Лидеры гетто | $today 😈<br>$vag$vag1$vag2$vag3$vag4<br>$gro$gro1$gro2$gro3$gro4<br>$rif$rif1$rif2$rif3$rif4<br>$nwe$nwe1$nwe2$nwe3$nwe4<br>$bal$bal1$bal2$bal3$bal4<br>$azt$azt1$azt2$azt3$azt4 ");
        }
    }



if ($data->type == 'message_new') { // команда /
    if($cmd == '/leadersmafia'){
        $vagos = 'Warlock MC';
        $vagoss = R::findOne('leaders','gang = ?',array($vagos));
        $grove = 'La Cosa Nostra';
        $groves = R::findOne('leaders','gang = ?',array($grove));
        $rifa = 'Russian Mafia';
        $rifas = R::findOne('leaders','gang = ?',array($rifa));
        $nw = 'Yakuza';
        $nws = R::findOne('leaders','gang = ?',array($nw));

// leader vagos
        if(!($vagoss->vkid == 0)){
            $vag = $vagoss->nick;
            $vag1 = ' | https://vk.com/id';
            $vag2 = $vagoss->vkid;
            $vag3 = ' | ';
            $vag4 = $vagoss->gang;
        }
        if($vagoss->vkid == 0){
            $vag = 'Нету лидера';
            $vag1 = '';
            $vag2 = ' | ';
            $vag3 = '';
            $vag4 = $vagoss->gang;
        }

// leader grove
        if(!($groves->vkid == 0)){
            $gro = $groves->nick;
            $gro1 = ' | https://vk.com/id';
            $gro2 = $groves->vkid;
            $gro3 = ' | ';
            $gro4 = $groves->gang;
        }
        if($groves->vkid == 0){
            $gro = 'Нету лидера';
            $gro1 = '';
            $gro2 = ' | ';
            $gro3 = '';
            $gro4 = $groves->gang;
        }

//leader rifa
        if(!($rifas->vkid == 0)){
            $rif = $rifas->nick;
            $rif1 = ' | https://vk.com/id';
            $rif2 = $rifas->vkid;
            $rif3 = ' | ';
            $rif4 = $rifas->gang;
        }
        if($rifas->vkid == 0){
            $rif = 'Нету лидера';
            $rif1 = '';
            $rif2 = ' | ';
            $rif3 = '';
            $rif4 = $rifas->gang;
        }

 // leader nw
        if(!($nws->vkid == 0)){
            $nwe = $nws->nick;
            $nwe1 = ' | https://vk.com/id';
            $nwe2 = $nws->vkid;
            $nwe3 = ' | ';
            $nwe4 = $nws->gang;
        }
        if($nws->vkid == 0){
            $nwe = 'Нету лидера';
            $nwe1 = '';
            $nwe2 = ' | ';
            $nwe3 = '';
            $nwe4 = $nws->gang;
        }
 $today = date("j.n.Y");
            $vk->sendMessage($peer_id,"😈Лидеры мафии | $today 😈<br>$vag$vag1$vag2$vag3$vag4<br>$gro$gro1$gro2$gro3$gro4<br>$rif$rif1$rif2$rif3$rif4<br>$nwe$nwe1$nwe2$nwe3$nwe4");
        }
    }






if ($data->type == 'message_new') { // команда добавить баллы
    if (preg_match("/^\/addscore\s(.+)/",$message,$vug)) {
        if($user->lvl >= 4){
        if (!preg_match("/(\[id\d+|.+\])\s+(\d+)\s+(.+)/",$vug[1],$vug)){
            gomsg("/addscore @idvk [кол-во баллов] причина",$data);
            return;
            }
       /* $test0 = $vug[0]; // @idvk 50 ky
        $test1 = $vug[1]; // @idvk
        $prichinavug = $vug[2]; // 50 ку
        $test2 = $vug[3]; // ky
        $vk->sendMessage($peer_id,"$test0");
        $vk->sendMessage($peer_id,"$test1");
        $vk->sendMessage($peer_id,"$prichinavug");
        $vk->sendMessage($peer_id,"$test2"); */
        $test0 = $vug[0]; // @idvk 50 ky
        $test1 = $vug[1]; // @idvk
        $prichinavug = $vug[2]; // 50
        $test2 = $vug[3]; // ky
        $vug_id = mb_substr($message ,10); // еще раз обрезаем и получаем все что написано после /kick_
        $vug_id = explode("|", mb_substr($vug_id, 3))[0]; // Делитель |, обрезаем первые 3 символа (@id) и получаем чистый ID :-)
        $vugid = R::findOne('users','vkid = ?',array($vug_id));
        if($vugsid = R::findOne('leaders','nick = ?',array($vugid->nick))){
        if($vugsid->type == гос){
        if($vugsid){
            R::load('leaders',$vugsid->id);
            $vugsid->score = $vugsid->score + $prichinavug;
            R::store($vugsid);
        }
        $vk->sendMessage($peer_id,"@id$id($user->nick) выдал $prichinavug баллов лидеру @id$vug_id($vugid->nick) $vugsid->gang<br>Причина: $test2");
        }else{
            $vk->sendMessage($peer_id,"Для нелегалов отключена возможность выдавать баллы.");
        }
    }else{
        $vk->sendMessage($peer_id,"Нету лидера с таким id");
        }
    }
    }
}

if ($data->type == 'message_new') { // команда добавить баллы
    if (preg_match("/^\/removescore\s(.+)/",$message,$vug)) {
        if($user->lvl >= 4){
        if (!preg_match("/(\[id\d+|.+\])\s+(\d+)\s+(.+)/",$vug[1],$vug)){
            gomsg("/removescore @idvk [кол-во баллов] причина",$data);
            return;
            }
       /* $test0 = $vug[0]; // @idvk 50 ky
        $test1 = $vug[1]; // @idvk
        $prichinavug = $vug[2]; // 50 ку
        $test2 = $vug[3]; // ky
        $vk->sendMessage($peer_id,"$test0");
        $vk->sendMessage($peer_id,"$test1");
        $vk->sendMessage($peer_id,"$prichinavug");
        $vk->sendMessage($peer_id,"$test2"); */
        $test0 = $vug[0]; // @idvk 50 ky
        $test1 = $vug[1]; // @idvk
        $prichinavug = $vug[2]; // 50
        $test2 = $vug[3]; // ky
        $vug_id = mb_substr($message ,13); // еще раз обрезаем и получаем все что написано после /kick_
        $vug_id = explode("|", mb_substr($vug_id, 3))[0]; // Делитель |, обрезаем первые 3 символа (@id) и получаем чистый ID :-)
        $vugid = R::findOne('users','vkid = ?',array($vug_id));
        if($vugsid = R::findOne('leaders','nick = ?',array($vugid->nick))){
            if($vugsid->type == гос){
        if($vugsid){
            R::load('leaders',$vugsid->id);
            $vugsid->score = $vugsid->score - $prichinavug;
            R::store($vugsid);
        }
        $vk->sendMessage($peer_id,"@id$id($user->nick) забрал $prichinavug баллов у лидера @id$vug_id($vugid->nick) $vugsid->gang<br>Причина: $test2");
        }else{
            $vk->sendMessage($peer_id,"Для нелегалов отключена возможность забирать баллы.");
        }
        }else{
        $vk->sendMessage($peer_id,"Нету лидера с таким id");
        }
        }
    }
}



if ($data->type == 'message_new') { // команда /
    if($cmd == '/pars'){
        $url = "https://arizona-rp.com/mon/fraction/9/13";
        $content = file_get_contents($url);
        preg_match_all('/<tr>([^<]+)<\/tr>/', $content, $out);
        $test = $out[1];
        $vk->sendMessage($peer_id,"$test");
    }
}
//
//
//==================================================OPRA CAPTURE======================================
//
//
if ($data->type == 'message_new') { // внести пользователя в бд без авторизации на сайте!
    if (preg_match("/^\/opra\sballas\s(.+)/",$message,$opra)) {
    if($user->lvl >= 3){
    if (!preg_match("/(.+)\s+(\d+)\s+(.+)/",$opra[1],$opra)){
        gomsg("/opra NickName [1-24] [text]",$data);
        return;
    }
    $test1 = $opra[1];
    $test2 = $opra[2];
    $test3 = $opra[3];
    $today = date("Y-m-d H:i:s");
    $messa = mb_substr($message ,0);
    $predsid = R::findOne('leaders','id = ?',array(3));
    $oprus = R::load('opru',NULL);
    $oprus->nickadm = $user->nick;
    $oprus->nickplayer = $test1;
    $oprus->reason = $test3;
    $oprus->code = 0;
    $oprus->gang = $predsid->gang;
    $oprus->data = $today;
    R::store($oprus);
    $vk->sendMessage(2000000005,"Уважаемый, @id$predsid->vkid($predsid->nick), у вас/вашего состава запросили опру‼<br><br>$test1, $test3<br><br>Предоставьте опру в лс любому следящему или в ответ на это сообщения в течение $test2 часов, в противном случае вы или ваш игрок из состава получит наказания!");
    $vk->sendMessage($peer_id,"Вы успешно запросили опру, ожидайте ответа от игрока, после того как пройдет 24 часа вам напомнят о форме!");
    sleep(86400);
    $vk->sendMessage($peer_id,"⚠ ВНИМАНИЕ ⚠<br><br>[ $today @id$id($user->nick) отправил форму $messa ]<br><br>Чтобы создать форму на бан игрока пропишите - /banopra $oprus->id<br>Чтобы принять опру - /acceptopra $oprus->id");
    }
    }
    if (preg_match("/^\/opra\svagos\s(.+)/",$message,$opra)) {
        if($user->lvl >= 3){
    if (!preg_match("/(.+)\s+(\d+)\s+(.+)/",$opra[1],$opra)){
        gomsg("/opra NickName [1-24] [text]",$data);
        return;
    }
    $test1 = $opra[1];
    $test2 = $opra[2];
    $test3 = $opra[3];
    $today = date("Y-m-d H:i:s");
    $messa = mb_substr($message ,0);
    $predsid = R::findOne('leaders','id = ?',array(2));
    $oprus = R::load('opru',NULL);
    $oprus->nickadm = $user->nick;
    $oprus->nickplayer = $test1;
    $oprus->reason = $test3;
    $oprus->code = 0;
    $oprus->gang = $predsid->gang;
    $oprus->data = $today;
    R::store($oprus);
    $vk->sendMessage(2000000005,"Уважаемый, @id$predsid->vkid($predsid->nick), у вас/вашего состава запросили опру‼<br><br>$test1, $test3<br><br>Предоставьте опру в лс любому следящему или в ответ на это сообщения в течение $test2 часов, в противном случае вы или ваш игрок из состава получит наказания!");
    $vk->sendMessage($peer_id,"Вы успешно запросили опру, ожидайте ответа от игрока, после того как пройдет 24 часа вам напомнят о форме!");
    sleep(86400);
    $vk->sendMessage($peer_id,"⚠ ВНИМАНИЕ ⚠<br><br>[ $today @id$id($user->nick) отправил форму $messa ]<br><br>Чтобы создать форму на бан игрока пропишите - /banopra $oprus->id<br>Чтобы принять опру - /acceptopra $oprus->id");
    }
    }
    if (preg_match("/^\/opra\srifa\s(.+)/",$message,$opra)) {
        if($user->lvl >= 3){
    if (!preg_match("/(.+)\s+(\d+)\s+(.+)/",$opra[1],$opra)){
        gomsg("/opra NickName [1-24] [text]",$data);
        return;
    }
    $test1 = $opra[1];
    $test2 = $opra[2];
    $test3 = $opra[3];
    $today = date("Y-m-d H:i:s");
    $messa = mb_substr($message ,0);
    $predsid = R::findOne('leaders','id = ?',array(6));
    $oprus = R::load('opru',NULL);
    $oprus->nickadm = $user->nick;
    $oprus->nickplayer = $test1;
    $oprus->reason = $test3;
    $oprus->code = 0;
    $oprus->gang = $predsid->gang;
    $oprus->data = $today;
    R::store($oprus);
    $vk->sendMessage(2000000005,"Уважаемый, @id$predsid->vkid($predsid->nick), у вас/вашего состава запросили опру‼<br><br>$test1, $test3<br><br>Предоставьте опру в лс любому следящему или в ответ на это сообщения в течение $test2 часов, в противном случае вы или ваш игрок из состава получит наказания!");
    $vk->sendMessage($peer_id,"Вы успешно запросили опру, ожидайте ответа от игрока, после того как пройдет 24 часа вам напомнят о форме!");
    sleep(86400);
    $vk->sendMessage($peer_id,"⚠ ВНИМАНИЕ ⚠<br><br>[ $today @id$id($user->nick) отправил форму $messa ]<br><br>Чтобы создать форму на бан игрока пропишите - /banopra $oprus->id<br>Чтобы принять опру - /acceptopra $oprus->id");
    }
    }
    if (preg_match("/^\/opra\sgrove\s(.+)/",$message,$opra)) {
   if($user->lvl >= 3){
    if (!preg_match("/(.+)\s+(\d+)\s+(.+)/",$opra[1],$opra)){
        gomsg("/opra NickName [1-24] [text]",$data);
        return;
    }
    $test1 = $opra[1];
    $test2 = $opra[2];
    $test3 = $opra[3];
    $today = date("Y-m-d H:i:s");
    $messa = mb_substr($message ,0);
    $predsid = R::findOne('leaders','id = ?',array(1));
    $oprus = R::load('opru',NULL);
    $oprus->nickadm = $user->nick;
    $oprus->nickplayer = $test1;
    $oprus->reason = $test3;
    $oprus->code = 0;
    $oprus->gang = $predsid->gang;
    $oprus->data = $today;
    R::store($oprus);
    $vk->sendMessage(2000000005,"Уважаемый, @id$predsid->vkid($predsid->nick), у вас/вашего состава запросили опру‼<br><br>$test1, $test3<br><br>Предоставьте опру в лс любому следящему или в ответ на это сообщения в течение $test2 часов, в противном случае вы или ваш игрок из состава получит наказания!");
    $vk->sendMessage($peer_id,"Вы успешно запросили опру, ожидайте ответа от игрока, после того как пройдет 24 часа вам напомнят о форме!");
    sleep(86400);
    $vk->sendMessage($peer_id,"⚠ ВНИМАНИЕ ⚠<br><br>[ $today @id$id($user->nick) отправил форму $messa ]<br><br>Чтобы создать форму на бан игрока пропишите - /banopra $oprus->id<br>Чтобы принять опру - /acceptopra $oprus->id");
    }
    }
    if (preg_match("/^\/opra\saztec\s(.+)/",$message,$opra)) {
    if($user->lvl >= 3){
    if (!preg_match("/(.+)\s+(\d+)\s+(.+)/",$opra[1],$opra)){
        gomsg("/opra NickName [1-24] [text]",$data);
        return;
    }
    $test1 = $opra[1];
    $test2 = $opra[2];
    $test3 = $opra[3];
    $today = date("Y-m-d H:i:s");
    $messa = mb_substr($message ,0);
    $predsid = R::findOne('leaders','id = ?',array(4));
    $oprus = R::load('opru',NULL);
    $oprus->nickadm = $user->nick;
    $oprus->nickplayer = $test1;
    $oprus->reason = $test3;
    $oprus->code = 0;
    $oprus->gang = $predsid->gang;
    $oprus->data = $today;
    R::store($oprus);
    $vk->sendMessage(2000000005,"Уважаемый, @id$predsid->vkid($predsid->nick), у вас/вашего состава запросили опру‼<br><br>$test1, $test3<br><br>Предоставьте опру в лс любому следящему или в ответ на это сообщения в течение $test2 часов, в противном случае вы или ваш игрок из состава получит наказания!");
    $vk->sendMessage($peer_id,"Вы успешно запросили опру, ожидайте ответа от игрока, после того как пройдет 24 часа вам напомнят о форме!");
    sleep(86400);
    $vk->sendMessage($peer_id,"⚠ ВНИМАНИЕ ⚠<br><br>[ $today @id$id($user->nick) отправил форму $messa ]<br><br>Чтобы создать форму на бан игрока пропишите - /banopra $oprus->id<br>Чтобы принять опру - /acceptopra $oprus->id");
    }
    }
    }
if ($data->type == 'message_new') { // команда внести пред/выговор
    if (preg_match("/^\/banopra\s(.+)/",$message,$nak)) {
        if($user->lvl >= 4){
        if (!preg_match("/(\d+)/",$nak[1],$nak)){
            gomsg("/banopra [idopru]",$data);
            return;
            }
            $idnak = $nak[1];
            $nakpomo =  R::findOne('opru','id = ?',array($idnak));
            $predsid = R::findOne('leaders','gang = ?',array($nakpomo->gang));
            if($nakpomo){
                if($nakpomo->code == 1 OR $nakpomo->code == 2){
                    $vk->sendMessage($peer_id,"Данный ид опры уже рассмотрен‼");
                }else{
                $nakpomo->code = 1;
                R::store($nakpomo);
                $vk->sendMessage($peer_id,"/banoff 0 $nakpomo->nickplayer 29 нету опры | префикс<br>Админ группа: https://vk.com/yumaadm");
                $vk->sendMessage(2000000005,"Игрок $nakpomo->nickplayer из банды $nakpomo->gang - получил бан нету опры/изп на опре | Время запроса опры: $nakpomo->data ‼");
            }
            }
            else{
            $vk->sendMessage(2000000007,"Наказание с номером $nakpomo->id нету в бд выдачи, перепровьте номер!");
        }
}else{$vk->sendMessage($peer_id,"Попросите старших проверить опру и прописать команду🆘");}
}
if (preg_match("/^\/acceptopra\s(.+)/",$message,$nak)) {
    if($user->lvl >= 4){
    if (!preg_match("/(\d+)/",$nak[1],$nak)){
        gomsg("/acceptopra [idopru]",$data);
        return;
        }
        $idnak = $nak[1];
        $nakpomo =  R::findOne('opru','id = ?',array($idnak));
        $predsid = R::findOne('leaders','gang = ?',array($nakpomo->gang));
        if($nakpomo){
            if($nakpomo->code == 1 OR $nakpomo->code == 2){
                $vk->sendMessage($peer_id,"Данный ид опры уже рассмотрен‼");
            }else{
            $nakpomo->code = 2;
            R::store($nakpomo);
            $vk->sendMessage($peer_id,"Вы успешно приняли опру у игрока - $nakpomo->nickplayer ✅");
            $vk->sendMessage(2000000005,"Опра игрока $nakpomo->nickplayer - принята ✅");
        }
        }
        else{
        $vk->sendMessage(2000000007,"Наказание с номером $nakpomo->id нету в бд выдачи, перепровьте номер!");
    }
}else{$vk->sendMessage($peer_id,"Попросите старших проверить опру и прописать команду🆘");}
}
}
if ($data->type == 'message_new') {
if (preg_match("/^\/addgoszam\s(.+)/",$message,$nak)) {
    if($user->lvl >= 4){
    if (!preg_match("/(\[id\d+|.+\])\s+(.+)/",$nak[1],$nak)){
        gomsg("/addgoszam [@idvk] [fraction]",$data);
        return;
        }
        $idnak = $nak[2];
    if(!($idnak == lspd OR $idnak == sfpd OR $idnak == lvpd OR $idnak == rcsd OR $idnak == lsmc OR $idnak == sfmc OR $idnak == lvmc OR $idnak == gov OR $idnak == гцл OR $idnak == cb OR $idnak == lsa OR $idnak == sfa OR $idnak == тср OR $idnak == cnnls OR $idnak == cnnsf OR $idnak == cnnlv OR $idnak == fbi)){
    gomsg("Введите lspd/sfpd/lvpd/rcsd/lsmc/sfmc/lvmc/gov/гцл/cb/lsa/sfa/тср/cnnls/cnnsf/cnnlv/fbi",$data);
    return;
    }
        $kick_id = mb_substr($message ,11); // еще раз обрезаем и получаем все что написано после /kick_
        $kick_id = explode("|", mb_substr($kick_id, 3))[0]; // Делитель |, обрезаем первые 3 символа (@id) и получаем чистый ID :-)
        if($nakpomo =  R::findOne('users','vkid = ?',array($kick_id))){
        if($nakpomo){
        $nakpomo->position = 'заместитель';
        R::store($nakpomo);
        }
        if($predsid = R::findOne('goszams','vkid = ?',array($nakpomo->vkid))){
        $vk->sendMessage($peer_id,"Уже внесен как 9ка $predsid->fraction");
    }else{
        $goszam = R::load('goszams',NULL);
        $goszam->nick = $nakpomo->nick;
        $goszam->vkid = $kick_id;
        $goszam->fraction = $idnak;
        R::store($goszam);
        $upd = R::load('onlines',NULL);
        $upd->nick = $goszam->nick;
        R::store($upd);
        $vk->sendMessage($peer_id,"@id$id($user->nick) внес @id$goszam->vkid($goszam->nick) как заместителя лидера фракции $goszam->fraction");
    }
    }else{$vk->sendMessage($peer_id,"Игрока с таким idvk нету в бд");}
}else{$vk->sendMessage($peer_id,"Нет прав");}
}
}


if ($data->type == 'message_new') { // команда /
    if($cmd == '/goszams'){
            $gos = R::findAll('goszams','ORDER BY id DESC');
            foreach($gos as $gas){
                $kflist .= "$gas->nick | https://vk.com/id$gas->vkid | $gas->fraction<br>";
            }
            $vk->sendMessage($peer_id,"Заместители лидеров:<br>$kflist");
        }
    }



if ($data->type == 'message_new') { // команда /
    if($cmd == '/psj'){
        if($user->lvl >= 1 AND $user->lvl < 3){
        if($goszam = R::findOne('goszams','vkid = ?',array($id))){
            $gos = R::findAll('kfkick','ORDER BY peerid DESC');
            foreach($gos as $gas){
            $kfdu = $gas->peerid-2000000000;
            $vk->request('messages.removeChatUser', ['chat_id' => $kfdu, 'member_id' => $id]);
            }
            $vk->sendMessage(2000000029, "@id$goszam->vkid ($goszam->nick) ушел по с/ж.");
            $vk->sendMessage(2000000026, "@id$goszam->vkid ($goszam->nick) ушел по с/ж.");
            $goszam = R::findOne('goszams','vkid = ?',array($id));
            if($goszam){
            $olss = $goszam->nick;
            $oldfrac = $goszam->fraction;
            R::exec('DELETE FROM `goszams` WHERE `nick` = ?', array($olss));
            R::exec('DELETE FROM `onlines` WHERE `nick` = ?', array($olss));
            $vk->sendMessage(2000000021,"@id$id($olss) заместитель $oldfrac ушел по с/ж.");
            }
            $vk->sendMessage($peer_id,"✅");
            $zamkick = R::findOne('leaders','vkid = ?',array($id));
        if($zamkick){
            $olss = $zamkick->nick;
                $zamkick = R::load('leaders',$zamkick->id);
                $zamkick->nick = 'free';
                $zamkick->strong = 0;
                $zamkick->vkid = 0;
                $zamkick->oral = 0;
                $zamkick->score = 0;
                $zamkick->firstzam = 0;
                $zamkick->secondzam = 0;
                $zamkick->thirdzam = 0;
                $zamkick->fourzam = 0;
                $zamkick->postavul = '01.01.1991';
                $zamkick->snyal = '01.01.1991';
                R::store($zamkick);
                R::exec('DELETE FROM `onlines` WHERE `nick` = ?', array($olss));
                $vk->sendMessage($peer_id, "Доступ, замов, лидера почистил в бд✅");
                $logleader = R::load('logleader',NULL);
                $logleader->nickadm = $user->nick;
                $logleader->nickleader = $olss;
                $logleader->postavlen = 1;
                $logleader->reason = 'по с/ж';
                $logleader->type = 0;
                $logleader->frac = $zamkick->gang;
                R::store($logleader);
                $vk->sendMessage(2000000021,"Лидер $zamkick->gang @id$id($olss) ушел по с/ж.");
                $vk->sendMessage(2000000021,"Подтвердите причину снятия лидера командой:<br>/rlead $logleader->id");
            }
        if($kickid){
            $kickid = R::load('users',$kickid->id);
            $kickid->position = 'игрок';
            $kickid->lvl = 1;
            R::store($kickid);
        }

        }
    }else{$vk->sendMessage($peer_id,"Нет прав");}
    }
}
/* if ($data->type == 'message_new') {
    if($cmd == '/table'){
        $pomoch = R::dispense('pomochs'); //передаем название таблицы users

//поле id можно не создавать, так как RedBeanPHP автоматически его создает с автоинкрементом
$pomoch->nickadm = 'Null';
$pomoch->nickleader = 'Null';
$pomoch->typenak = 'Null';
$pomoch->reason = 'Null';
$pomoch->date = $today;
$pomoch->code = 'Null';


R::store($pomoch); // сохраняем объект $user в таблице
    }
    $vk->sendMessage($peer_id,"created");
}




/* if ($data->type == 'message_new') {
    if($cmd == '/table'){
        $pomoch = R::dispense('pomochs'); //передаем название таблицы users

//поле id можно не создавать, так как RedBeanPHP автоматически его создает с автоинкрементом
$pomoch->nickadm = 'Null';
$pomoch->nickleader = 'Null';
$pomoch->typenak = 'Null';
$pomoch->reason = 'Null';
$pomoch->date = $today;
$pomoch->code = 'Null';


R::store($pomoch); // сохраняем объект $user в таблице
    }
    $vk->sendMessage($peer_id,"created");
}
*/


 /* if ($data->type == 'message_new') { // команда запросить опру у игрока
    if (preg_match("/^\/opra\s(.+)/",$message,$vug)) {
        if($user->lvl >= 4){
        if (preg_match("/(.+)\s+(.*)/",$vug[1],$vug)){
            if (!preg_match("/(.*)/",$vug[2],$vug[1])){
            gomsg("/opra [gang] ник",$data);
            return;
        }
            }
        $test0 = $vug[0]; // @idvk 50 ky
        $test1 = $vug[1]; // @idvk
        $prichinavug = $pred[2]; // 50 ку
        $test2 = $vug[3]; // ky
        $vk->sendMessage($peer_id,"$test0");
        $vk->sendMessage($peer_id,"$test1");
        $vk->sendMessage($peer_id,"$prichinavug");
        $vk->sendMessage($peer_id,"$test2");
        $test2 = $vug[0]; // фулл
        $test1 = $vug[1]; // без 2 и 3
        $prichinavug = $vug[2]; // ласт
        $prichine = $vug[3];
        $prichine2 = $vug[4];
        $prichine3 = $vug[5];   // капт
        // $vk->sendMessage($peer_id,"@id$id($user->nick) запрашивает опру у игрока $prichinavug, банда: $test1<br>Примечание: $prichine");
        $vk->sendMessage($peer_id,"$test2");
        $vk->sendMessage($peer_id,"$test1");
        $vk->sendMessage($peer_id,"$prichinavug");
        $vk->sendMessage($peer_id,"$prichine");
        $vk->sendMessage($peer_id,"$prichine2");
        $vk->sendMessage($peer_id,"$prichine3");
        }
    }
}
*/

/*
if ($data->type == 'message_new') { // команда /
    if($cmd == '/grove'){
        if($user->lvl >= 9){
            $data = file_get_html('http://xdan.ru');
            if(count($html->find('#preview div.myclass')))
            foreach($html->find('#preview div.myclass') as $div)
    $vk->sendMessage($peer_id,"$div->innertext");
  }



        }
    }

    */





 /* if ($data->type == 'message_new') { // команда /newkf внести кф  в бд конф
    if($cmd == '/newkf'){

                    $konf = R::findOne('konfs','kfid = ?',array($peer_id));
                    if($konf){
                        $vk->sendMessage($peer_id,"Данная конференция уже занесена под $konf->name | $konf->kfid");
                    }else{
                        $konf = R::load('konfs',NULL);
                        $konf->name = 'Yuma | Помощники Ghetto';
                        $konf->kfid = $peer_id;
                        $konf->type = 'гетто';
                        R::store($konf);
                        $vk->sendMessage($peer_id,"$konf->name внесена в бд конф, ид - $konf->kfid");
                    }



    }
} */
    // Шаблон для новой команды
/* if ($data->type == 'message_new') { // команда /
    if($cmd == '/'){
        if($user->lvl >= ){
                    $vk->sendMessage($peer_id,"");
        }
        else{
            $vk->sendMessage($peer_id,"");
        }
    }
} */

?>
