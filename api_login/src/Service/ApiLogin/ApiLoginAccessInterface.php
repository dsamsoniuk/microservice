<?php

namespace App\Service\ApiLogin;

interface ApiLoginAccessInterface {
    public function setCreditionals(ApiLoginCreditionals $creditionals): void;
    public function getCurrentToken(): string; // 
    public function getToken(): string|null; // pobierz z cache
    public function setToken(string $token): void; // zapis w cache
    public function refreshToken(): bool; // osobno request do api 
}
