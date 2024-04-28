<?php

namespace App\Actions;

class ArduinoRequestAction
{
    public $client;

    public function __construct()
    {
        $this->client = \Config\Services::curlrequest();
    }

    private function getUrl(string $endpoint): string
    {
        $ip = "";
        $port = 80;

        return "https://$ip:$port/$endpoint"; 
    }

    public function requestToArduino($endpoint): array
    {
        try {
            $response = $this->client->request('GET', $this->getUrl($endpoint));
            $message = $response->getBody();

            $data = [
                "success" => true,
                "msg" => $message
            ];
        } catch (\Throwable $th) {
            return ["success" => false, "msg" => $th->getMessage()];
        }

        return $data;
    }
}