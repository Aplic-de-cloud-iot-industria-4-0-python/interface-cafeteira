<?php

namespace App\Controllers;

class CafeteiraController extends BaseController
{
    public $client;
    public $request;
    public $server;

    public function __construct()
    {
        $this->request = \Config\Services::request();
        $this->client = \Config\Services::curlrequest();
        $this->server = $this->request->getServer();
    }

    private function getUrl(string $endpoint): string
    {
        $ip = "";
        $port = 80;

        return "https://$ip:$port/$endpoint"; 
    }

    public function index(): string
    {
        return view('cafeteira');
    }

    public function ligar()
    {
        if ($this->request->isAJAX()) {
            try {
                $response = $this->client->request('GET', $this->getUrl("ligar"));
                $message = $response->getBody();

                $data = [
                    "success" => true,
                    "msg" => $message
                ];
            } catch (\Throwable $th) {
                return $this->response->setJSON(["msg" => $th->getMessage()]);
            }

            return $this->response->setJSON($data);
        }

        dd("algo deu errado!");
    }

    public function desligar()
    {
        if ($this->request->isAJAX()) {
            try {
                $response = $this->client->request('GET', $this->getUrl("desligar"));
                $message = $response->getBody();

                $data = [
                    "success" => true,
                    "msg" => $message
                ];
            } catch (\Throwable $th) {
                return $this->response->setJSON(["msg" => $th->getMessage()]);
            }

            return $this->response->setJSON($data);
        }

        dd("algo deu errado!");
    }
}
