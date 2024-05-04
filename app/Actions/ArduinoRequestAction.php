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

    public function initCoap()
    {
        $this->loop = Factory::create();
        $client = new Client($this->loop);

        return $client;
    }

    public function requestToArduino($endpoint): array
    {
        try {
            $response = $this->client->get('coap://skynet.im/status', function($data) {
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