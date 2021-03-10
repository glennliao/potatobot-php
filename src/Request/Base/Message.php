<?php
declare(strict_types=1);

namespace PotatoBot\Request\Base;


use PotatoBot\Types\ChatType;

class Message implements \JsonSerializable
{

    /**
     * @var int
     */
    public $chat_type;
    /**
     * @var int
     */
    public $chat_id;

    public function __construct($chat_id = 0, $chat_type = ChatType::PeerUser)
    {
        $this->chat_id = $chat_id;
        $this->chat_type = $chat_type;
    }

    public function __call($name, $arguments)
    {
        if(empty($arguments)){
            return $this->$name;
        }
        $this->$name = $arguments[0];
        return $this;
    }

    public function toArray():array
    {
        $ref = new \ReflectionClass(static::class);
        $properties = $ref->getProperties();
        $data = [];
        foreach ($properties as $v) {
            $name = $v->name;
            $data[$name] = $this->$name;
        }
        $data = array_filter($data, static function ($item) {
            return !($item === null);
        });
        return $data;
    }

    public function jsonSerialize()
    {
        return $this->toArray();
    }
}