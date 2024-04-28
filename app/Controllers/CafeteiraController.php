<?php

namespace App\Controllers;

use App\Actions\ArduinoRequestAction;

class CafeteiraController extends BaseController
{
    public $request;
    public $arduinoRequestAction;

    public function __construct()
    {
        $this->request = \Config\Services::request();
        $this->arduinoRequestAction = new ArduinoRequestAction();
    }

    public function index(): string
    {
        return view('cafeteira');
    }

    public function ligar()
    {
        return $this->sendDataToView($this->request, "ligar");
    }

    public function desligar()
    {
        return $this->sendDataToView($this->request, "desligar");
    }

    private function sendDataToView($request, $endpoint)
    {
        if ($request->isAJAX()) {
            $data = $this->arduinoRequestAction->requestToArduino($endpoint);
            return $this->response->setJSON($data);
        }

        return $this->response->setJSON(["success" => false, "msg" => "Algo deu Errado"]);
    }
}
