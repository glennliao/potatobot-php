<?php
declare(strict_types=1);

namespace PotatoBot;


use PotatoBot\Request\PhotoMessage;
use PotatoBot\Request\TextMessage;
use GuzzleHttp\Client;
use GuzzleHttp\Exception\ClientException;

class Bot
{
    private $token;
    /**
     * 2021-02-26
     * @var string
     */
    const BASE_URI = "https://api.rct2008.com:8443";

    /**
     * @var Client
     */
    private $client;

    public function __construct(string $token, array $option = [])
    {
        $this->token = $token;
        $this->client = new Client([
            "base_uri" => $option['base_uri'] ?? self::BASE_URI
        ]);
    }

    public function getMe(): array
    {
        return $this->request("/getMe");
    }

    public function getFile(string $file_id)
    {
        return $this->request("/getFile", "POST", ["json" => ["file_id" => $file_id]]);
    }

    public function getUpdates(): array
    {
        return $this->request("/getUpdates");
    }

    public function sendTextMessage(TextMessage $message): array
    {
        return $this->request("/sendTextMessage", "POST", ["json" => $message]);
    }

    public function sendPhoto(PhotoMessage $message): array
    {
        $photo = $message->photo;
        if (is_resource($photo)) {
            $data = $message->toArray();
            $multipart = [];
            foreach ($data as $key => $value) {
                $multipart[] = ["name" => $key, "contents" => $value];
            }
            return $this->request("/sendPhoto", "POST", ["multipart" => $multipart]);
        }
        return $this->request("/sendPhoto", "POST", ["json" => $message]);
    }


    private function request($path, $method = "GET", array $options = [])
    {
        $token = $this->token;
        try {
            $response = $this->client->request($method, "/$token$path", $options);
            $content = json_decode($response->getBody()->getContents(), true);
            return $content['result'];
        } catch (ClientException $e) {
            $content = json_decode((string)$e->getResponse()->getBody(), true);
            throw new PotatoException($content['result'], $content['error_code']);
        }
    }

}