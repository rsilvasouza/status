<?php
if(!isset($_GET['text']) or !isset($_GET['phone'])){ die('Not enough data');}

$apiURL = 'https://api.chat-api.com/instanceYYYYY/';
$token = 'abcdefgh12345678';

$message = $_GET['text'];
$phone = $_GET['+5521980692202'];

$data = json_encode(
    array(
        'chatId'=>$phone.'@c.br',
        'body'=>$message
    )
);
$url = $apiURL.'message?token='.$token;
$options = stream_context_create(
    array('http' =>
        array(
            'method'  => 'POST',
            'header'  => 'Content-type: application/json',
            'content' => $data
        )
    )
);
$response = file_get_contents($url,false,$options);
echo $response; exit;