<?php
declare(strict_types=1);

namespace PotatoBot\Types;

/**
 * Class ChatType
 * @package PotatoBot\Types
 * @link https://www.potato.im/api/bot#chat-type
 */
class ChatType
{
    const PeerUser = 1; //user chat
    const PeerChat = 2; //standard group chat
    const ChannelChat = 3; //super group chat
}