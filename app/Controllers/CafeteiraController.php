<?php

namespace App\Controllers;

class CafeteiraController extends BaseController
{
    public $client;

    public function __construct()
    {
        $this->client = \Config\Services::curlrequest();
    }

    public function index(): string
    {
        return view('cafeteira');
    }

    public function ligar()
    {
        $response = $this->client->request('GET', 'https://api.github.com/user');
    }

    public function desligar()
    {
        $response = $this->client->request('GET', 'https://api.github.com/user');
    }
}
