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
        $ipArduino = "172.16.0.9";
        $url = "coap://$ipArduino/$endpoint";

        return $url;
    }

    public function requestToArduino(string $endpoint): array
    {
        // try {
        //     $response = $this->client->get($this->mountUrl($endpoint), function($data) {
        //         return $data;
        //     });

        //     $dataRequest = [
        //         "success" => true,
        //         "msg" => $response
        //     ];
        // } catch (\Throwable $th) {
        //     return ["success" => false, "msg" => $th->getMessage()];
        // }

        $response = $this->client->get($this->mountUrl($endpoint), function($data) {
            return $data;
        });

        $dataRequest = [
            "success" => true,
            "msg" => $response
        ];

        return $dataRequest;
    }
}