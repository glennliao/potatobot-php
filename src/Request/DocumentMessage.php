<?php
declare(strict_types=1);

namespace PotatoBot\Request;

use PotatoBot\Request\Base\Message;
use PotatoBot\Types\ChatType;


/**
 * Class DocumentMessage
 * @package PotatoBot\Request
 */
class DocumentMessage extends Message
{

    /**
     * @var string|resource
     */
    public $document = '';

    public $caption;

    public $reply_to_message_id;
    /**
     * @var bool
     */
    public $markdown = true;

    public $reply_markup;

    public function __construct(int $chat_id = 0, $file = '', string $caption = '', int $chat_type = ChatType::PeerUser, bool $markdown = true)
    {
        parent::__construct($chat_id, $chat_type);
        $this->document = $file;
        $this->markdown = $markdown;
        $this->caption = $caption;
    }

}