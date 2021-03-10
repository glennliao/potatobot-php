<?php
declare(strict_types=1);

namespace PotatoBot\Request;

use PotatoBot\Types\ChatType;

/**
 * Class TextMessage
 * @package PotatoBot\Request
 * @method self|string text(string $text = false);
 */
class TextMessage extends BaseMessage
{
    /**
     * @var string
     */
    public $text = '';

    public $reply_to_message_id;
    /**
     * @var bool
     */
    public $markdown = true;

    public $reply_markup;

    public function __construct(int $chat_id = 0, string $text = '', int $chat_type = ChatType::PeerUser, bool $markdown = true)
    {
        parent::__construct($chat_id, $chat_type);
        $this->text = $text;
        $this->markdown = $markdown;
    }
}