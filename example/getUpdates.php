<?php
declare(strict_types=1);

use PotatoBot\Bot;
use PotatoBot\Request\TextMessage;

include_once '../vendor/autoload.php';
// include_once '../config.php';

$token = TOKEN;

$bot = new Bot($token);

while (true){
    sleep(1);
    $updates = $bot->getUpdates() ;
    if(!empty($updates)){
        echo json_encode($updates)."\n";
    }

}

