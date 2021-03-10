<?php
declare(strict_types=1);

use PotatoBot\Bot;
use PotatoBot\Request\PhotoMessage;
use PotatoBot\Request\TextMessage;

include_once '../vendor/autoload.php';

include_once '../config.php';

$token = TOKEN;
$bot = new Bot($token);


// 发送文本信息
//$msg = new TextMessage(23909996,<<<EOF
//*test* here
//-------------------
//1. asd
//2. xx
//EOF
//);
//echo json_encode($bot->sendTextMessage($msg));

// 发送图片
// 1. 发送file_id
//echo json_encode($bot->sendPhoto(new PhotoMessage(23909996,'003c02269cb310414f605339501142bc')));
// 2. 发送文件
//echo json_encode($bot->sendPhoto(new PhotoMessage(23909996,fopen('./bg.jpg', 'rb'))));
