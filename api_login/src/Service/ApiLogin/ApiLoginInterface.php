<?php

namespace App\Service\ApiLogin;

use App\Entity\User;

interface ApiLoginInterface {
    public function makeRequest(string $method, string $url, array $params = []): array;
    public function setCreditionals(ApiLoginCreditionals $creditionals): void;
}

