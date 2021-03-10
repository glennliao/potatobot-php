<?php
declare(strict_types=1);

namespace PotatoBot\Request;

use PotatoBot\Request\Base\Message;
use PotatoBot\Types\ChatType;


/**
 * Class PhotoMessage
 * @package PotatoBot\Request
 * @method self|string photo(string|resource $photo = false);
 */
class PhotoMessage extends Message
{

    /**
     * @var string|resource
     */
    public $photo = '';

    public $reply_to_message_id;
    /**
     * @var bool
     */
    public $markdown = true;

    public $reply_markup;

    public function __construct(int $chat_id = 0, $photo = '', int $chat_type = ChatType::PeerUser, bool $markdown = true)
    {
        parent::__construct($chat_id,$chat_type);
        $this->photo = $photo;
        $this->markdown = $markdown;
    }

}