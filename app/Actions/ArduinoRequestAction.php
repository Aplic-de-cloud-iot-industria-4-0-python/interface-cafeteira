<?php

namespace App\Actions;

use PhpCoap\Client\Client;
use React\EventLoop\Factory;

class ArduinoRequestAction
{
    public $client;
    public $loop;

    public function __construct()
    {
        $this->client = $this->initCoap();
    }

    private function initCoap()
    {
        $this->loop = Factory::create();
        $client = new Client($this->loop);

        return $client;
    }

    private function mountUrl(string $endpoint): string
    {
        $ipArduino = "IP_ARDUINO";
        $url = "coap://$ipArduino/$endpoint";

        return $url;
    }

    public function requestToArduino(string $endpoint): array
    {
        try {
            $response = $this->client->get($this->mountUrl($endpoint), function($data) {
                return $data;
            });
            $this->loop->run();

            $dataRequest = [
                "success" => true,
                "msg" => $response
            ];
        } catch (\Throwable $th) {
            return ["success" => false, "msg" => $th->getMessage()];
        }

        return $dataRequest;
    }
}