<?php

//all rights reserved iAldazActivator
//bot telegram
// note => to make the bot pull, you must put this link => https://api.telegram.org/bot$youtoken/setWebhook?url=https://you_domain.com/check/bot/ialdaz_bot_check.php
$token = '5044344311:AAGbLJboAugX6LwPym7lACWzYunvRF3fuc0';
$website = 'https://api.telegram.org/bot'.$token;

$input = file_get_contents('php://input');
$update = json_decode($input, TRUE);

$chatId = $update['message']['chat']['id'];

$message = $update['message']['text'];

  
$mystring = $message;
$findme   = '/check ';
$pos = strpos($mystring, $findme);

if ($pos === false) {
}else{
    $text1 = "<code>processing...</code>";
    sendMessage1($text1, $chatId);
    $text = check($message);
    sendMessage($text, $chatId);
}


$mystring1 = $message;
$findme1   = '/iccid';
$pos1 = strpos($mystring1, $findme1);

if ($pos1 === false) {
}else{
    $text1 = "<code>processing...</code>";
    sendMessage1($text1, $chatId);
    $text = iccid($message1);
    sendMessage($text, $chatId);
}


$mystring2 = $message;
$findme2   = '/check_device ';
$pos2 = strpos($mystring2, $findme2);

if ($pos2 === false) {
}else{
    $text1 = "<code>processing...</code>";
    sendMessage1($text1, $chatId);
    $text = checkmac($message);
    sendMessage($text, $chatId);
}


    function check($message1)
    {
        $message1 = str_replace("/check ", "", $message1);
        $curl = curl_init();
    curl_setopt_array($curl, array(
    CURLOPT_URL => "https://iservices-dev.us/check/Nhteam.php?imei=$message1",
    CURLOPT_RETURNTRANSFER => true,
    CURLOPT_ENCODING => "",
    CURLOPT_MAXREDIRS => 10,
    CURLOPT_TIMEOUT => 0,
    CURLOPT_FOLLOWLOCATION => true,
    CURLOPT_SSL_VERIFYPEER => false,
    CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
    CURLOPT_CUSTOMREQUEST => "GET",
));
$curlResponse = curl_exec($curl);
curl_close($curl);
$response = json_decode($curlResponse);
if($response->ERROR == 'Invalid IMEI/Serial Number'){
    return "<code>IMEI / SERIAL INVALID ❌</code>";
}
elseif($response->ERROR == 'Invalid IMEI/Serial Number'){
    return "<code>IMEI / SERIAL INVALID! ❌</code>";
}
elseif(!empty($response->type))
{
    if($response->FindMyiDevice == "ON")
    {
        return "✅  Fearless GSM Result ✅   \n========================= \n\n<code>SERIAL => </code><u>".$response->Serial.

            "</u><code>\nMODEL => </code><u>".$response->Modelo.
            "</u><code>\nActivation => </code><u>".$response->Activation.
            "</u><code>\niCloud Lock => </code><u>".$response->FindMyiDevice."</u> ❌\n<code>   \n=========================== \n\n𝑻𝒉𝒂𝒏𝒌𝒔 𝒀𝒐𝒖. ✅   \nFearless </code>";
    }
    else{
        return "✅  Fearless GSM Result ✅   \n========================= \n\n<code>SERIAL => </code><u>".$response->Serial.

            "</u><code>\nMODEL => </code><u>".$response->Modelo.
            "</u><code>\nActivation => </code><u>".$response->Activation.
            "</u><code>\niCloud Lock => </code><u>".$response->FindMyiDevice."</u> 🍎✅ \n<code>   \n=========================== \n\n𝑻𝒉𝒂𝒏𝒌𝒔 𝒀𝒐𝒖. ✅ \nFearless </code>";
    }
}
else
        {
            if($response->FindMyiDevice == "ON")
            {
        return "✅  Fearless GSM Result ✅   \n========================= \n\n<code>SERIAL => </code><u>".$response->Serial.
            "</u><code>\nMODEL => </code><u>".$response->Modelo.
            "</u><code>\nActivation => </code><u>".$response->Activation.
            "</u><code>\niCloud Lock => </code><u>".$response->FindMyiDevice."</u> ❌\n<code>   \n=========================== \n\n𝑻𝒉𝒂𝒏𝒌𝒔 𝒀𝒐𝒖. ✅   \nFearless </code>";
            }
            else{
        return "✅  Fearless GSM Result ✅   \n========================= \n\n<code>SERIAL => </code><u>".$response->Serial.
            "</u><code>\nMODEL => </code><u>".$response->Modelo.
            "</u><code>\nActivation => </code><u>".$response->Activation.
            "</u><code>\niCloud Lock => </code><u>".$response->FindMyiDevice."</u> 🍎✅ \n<code>   \n=========================== \n\n𝑻𝒉𝒂𝒏𝒌𝒔 𝒀𝒐𝒖. ✅ \nFearless </code>";
            }
        }
}



function checkmac($message)
{
        $serial = str_replace("/check_device ", "", $message);
        $curl = curl_init();
        curl_setopt_array($curl, array(
        CURLOPT_URL => "https://iservices-dev.us/check/",
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_ENCODING => "",
        CURLOPT_MAXREDIRS => 10,
        CURLOPT_TIMEOUT => 0,
        CURLOPT_FOLLOWLOCATION => true,
        CURLOPT_SSL_VERIFYPEER => false,
        CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
        CURLOPT_CUSTOMREQUEST => "GET",
    ));
    $curlResponse = curl_exec($curl);
    curl_close($curl);
    return $curlResponse;
}

   function iccid($message1)
    {
        $message1 = str_replace("/iccid ", "", $message1);
        $curl = curl_init();
    curl_setopt_array($curl, array(
    CURLOPT_URL => "https://iservices-dev.us/check/iccid.php",
    CURLOPT_RETURNTRANSFER => true,
    CURLOPT_ENCODING => "",
    CURLOPT_MAXREDIRS => 10,
    CURLOPT_TIMEOUT => 0,
    CURLOPT_FOLLOWLOCATION => true,
    CURLOPT_SSL_VERIFYPEER => false,
    CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
    CURLOPT_CUSTOMREQUEST => "GET",
));
$curlResponse = curl_exec($curl);
curl_close($curl);
$response = json_decode($curlResponse);
if($response->ERROR == 'Invalid IMEI/Serial Number'){
    return "<code>NO ICCID /code>";
}
elseif($response->ERROR == 'Invalid IMEI/Serial Number'){
   return "<code>NO ICCID /code>";
}
elseif(!empty($response->type))
{
    if($response)
    {
        return "✅  iCCID ACTIVE ✅   \n========================= \n\n<code>Active date  => </code><u>".$response->fecha.
        "</u><code>\nBUILD => </code><u>".$response->build.
            "</u><code>\niccid => </code><u>".$response->iccid."</u> 🍎✅ \n<code>   \n=========================== \n\n𝑻𝒉𝒂𝒏𝒌𝒔 𝒀𝒐𝒖. ✅ \nFearless </code>";
    }
    else{
        return "✅  iCCID ACTIVE ✅   \n========================= \n\n<code>Active date  => </code><u>".$response->fecha.
        "</u><code>\nBUILD => </code><u>".$response->build.
            "</u><code>\niccid Active => </code><u>".$response->iccid."</u> 🍎✅ \n<code>   \n=========================== \n\n𝑻𝒉𝒂𝒏𝒌𝒔 𝒀𝒐𝒖. ✅ \nFearless </code>";
    }
}
else
        {
            if($response)
            {
        return "✅  iCCID ACTIVE ✅   \n========================= \n\n<code>Active date  => </code><u>".$response->fecha.
        "</u><code>\nBUILD => </code><u>".$response->build.
            "</u><code>\niccid Active => </code><u>".$response->iccid."</u> 🍎✅ \n<code>   \n=========================== \n\n𝑻𝒉𝒂𝒏𝒌𝒔 𝒀𝒐𝒖. ✅ \nFearless </code>";
            }
            else{
        return "✅  iCCID ACTIVE ✅   \n========================= \n\n<code>Active date  => </code><u>".$response->fecha.
        "</u><code>\nBUILD => </code><u>".$response->build.
            "</u><code>\niccid Active => </code><u>".$response->iccid."</u> 🍎✅ \n<code>   \n=========================== \n\n𝑻𝒉𝒂𝒏𝒌𝒔 𝒀𝒐𝒖. ✅ \nFearless </code>";
            }
        }
}

    function sendMessage($text, $chatId)
    {
        $url = $GLOBALS['website'].'/sendMessage';
        $data = array('chat_id' => $chatId, 'text' => $text, 'parse_mode' => 'HTML');
        $options = array('http' => array('method' => 'POST', 'header' => "Content-Type:application/x-www-form-urlencoded\r\n", 'content' => http_build_query($data),),);
        $context = stream_context_create($options);
        $result = file_get_contents($url, false, $context);
        return $result;
    }

    function sendMessage1($text, $chatId)
    {
        $url = $GLOBALS['website'].'/sendMessage';
        $data = array('chat_id' => $chatId, 'text' => $text, 'parse_mode' => 'HTML');
        $options = array('http' => array('method' => 'POST', 'header' => "Content-Type:application/x-www-form-urlencoded\r\n", 'content' => http_build_query($data),),);
        $context = stream_context_create($options);
        $result = file_get_contents($url, false, $context);
        return $result;
    }
?>
