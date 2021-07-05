<?php
declare(strict_types=1);

use PotatoBot\Bot;
use PotatoBot\Request\DeleteMessage;
use PotatoBot\Request\DocumentMessage;
use PotatoBot\Request\EditMessage;
use PotatoBot\Request\GetChat;
use PotatoBot\Request\LeaveChat;
use PotatoBot\Request\PhotoMessage;
use PotatoBot\Request\SetWebhook;
use PotatoBot\Request\TextMessage;
use PotatoBot\Types\ChatType;

include_once __DIR__.'/../vendor/autoload.php';
include_once __DIR__.'/../config.php';

$token = TOKEN; // bot token
$to = TO_USER; // user_id
$bot = new Bot($token);


function printResult($ret):void
{
    echo json_encode($ret);
}

/**
 * send text
 * @param $bot
 */
function sendText($bot)
{
    global $to;
    $msg = new TextMessage($to, <<<EOF
*test* here
-------------------
1. asd
2. xx
EOF
    );
    printResult($bot->sendTextMessage($msg));
}

sendText($bot);

/**
 * send img
 * @param $bot
 */
function sendImg1($bot)
{
    global $to;
    printResult($bot->sendPhoto(new PhotoMessage($to, fopen('./bg.jpg', 'rb'), "img test")));
}


/**
 * send img by file_id
 * @param $bot
 */
function sendImg2($bot)
{
    global $to;
    printResult($bot->sendPhoto(new PhotoMessage($to, 'file_id')));
}


/**
 * send file
 * @param $bot
 */
function sendFile1($bot)
{
    global $to;
    printResult($bot->sendDocument(new DocumentMessage($to, fopen('./bg.jpg', 'rb'), "file test")));
    printResult($bot->sendDocument(new DocumentMessage($to, 'file_id', "file test")));
}

//sendFile1($bot);

/**
 * @param int id  msg id
 */
function deleteMessage(Bot $bot, int $id)
{
    global $to;
    printResult($bot->deleteMessage(new DeleteMessage($to, $id)));
}

//\deleteMessage($bot,0000);


function getupdates(Bot $bot)
{
    printResult($bot->getUpdates());
}

//getupdates($bot);

/**
 * @param int id  msg id
 */
function editMessage(Bot $bot, int $id)
{
    global $to;
    printResult($bot->editMessage(new EditMessage($to,$id,"changed")));
}

//editMessage($bot,0000);


function setWebhook(Bot $bot){
    $hook = "http://example.com/hook"; 
    printResult( $bot->setWebhook(new SetWebhook($hook)));
}

//setWebhook($bot);


function delWebhook(Bot $bot){
    printResult( $bot->delWebhook());
}

//delWebhook($bot);

function getGroups(Bot $bot){
    printResult( $bot->getGroups());
}

/**
 * @param int id channel id
 */
function getChat(Bot $bot,$id){
    printResult( $bot->getChat(new GetChat($id,ChatType::ChannelChat)));
}

/**
 * @param int id channel id
 */
function leaveChat(Bot $bot,$id){
    printResult( $bot->leaveChat(new LeaveChat($id,ChatType::ChannelChat)));
}

// leaveChat($bot,0000);