<?php
declare(strict_types=1);

namespace PotatoBot\Request;


class SetWebhook extends Base\Message
{

    public $url = ''; //必填
    public $certificate = null;//可选

    public function __construct($url = '', $certificate = null)
    {
        parent::__construct(null, null);
        $this->url = $url;
        $this->certificate = $certificate;
    }
}