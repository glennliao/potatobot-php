<?php
declare(strict_types=1);

namespace PotatoBot\Request;


use PotatoBot\Request\Base\Message;
use PotatoBot\Types\ChatType;

class DeleteMessage extends Message
{
    public int $message_id;

    public function __construct(int $chat_id = 0, $message_id = '', int $chat_type = ChatType::PeerUser)
    {
        parent::__construct($chat_id, $chat_type);
        $this->message_id = $message_id;
    }
}