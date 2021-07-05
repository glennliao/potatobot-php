potato bot sdk for php

# install
``composer require glennliao/potatobot``

# use
```php
$token = TOKEN; // bot token
$to = TO_USER; // user_id

$bot = new Bot($token);
$msg = new TextMessage($to,"hello bot");
$bot->sendTextMessage($msg);
```
