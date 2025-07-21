<?php

namespace App\Service\ApiLogin;

class ApiLoginCreditionals {
    public function __construct(public string $password, public string $username, public string $url){
    }
}