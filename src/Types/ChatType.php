<?php
declare(strict_types=1);

namespace PotatoBot\Types;

class ChatType
{
    const PeerUser = 1; //user chat
    const PeerChat = 2; //standard group chat
    const ChannelChat = 3; //super group chat
}