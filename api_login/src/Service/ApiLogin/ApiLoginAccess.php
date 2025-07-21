<?php

namespace App\Service\ApiLogin;

use App\Service\ApiLogin\ApiLoginAccessInterface;
use Psr\Cache\CacheItemPoolInterface;
use Symfony\Component\DependencyInjection\ParameterBag\ParameterBagInterface;
use Symfony\Contracts\HttpClient\HttpClientInterface;

class ApiLoginAccess implements ApiLoginAccessInterface {
    public const API_CACHE_KEY = "API_LOGIN_TOKEN";
    private ApiLoginCreditionals $creditionals;

    public function __construct(
        private HttpClientInterface $httpClient,
        private CacheItemPoolInterface $cache,
        private ParameterBagInterface $parameterBag
    ) {}

    public function getCurrentToken(): string {

        $token = $this->getToken();

        if ($token === null) {
            $this->refreshToken();
            $token = $this->getToken();
        }
        if ($token === null) {
            throw new ApiLoginException("Blad odczytu tokena");
        }

        return $token;
    }
    public function getToken(): string|null {

        $item = $this->cache->getItem($this::API_CACHE_KEY);
        if (!$item->isHit()) { // is expired token
            return null;
        }
        return $item->get();
    }
    public function setToken(string $token): void {

        $item = $this->cache->getItem($this::API_CACHE_KEY);
        $item->set($token);
        // $item->expiresAfter(3600);// 1h
        $item->expiresAfter(10);// 10sek

        $this->cache->save($item);
    }

    public function refreshToken(): void {

        $response = $this->httpClient->request("POST","{$this->creditionals->url}/login", [
           'body' => [
                'username' => $this->creditionals->username,
                'password' => $this->creditionals->password,
           ]
        ]);

        if ($response->getStatusCode() !== 200) {
            throw new ApiLoginException($response->getInfo());
        }

        $content = $response->toArray();

        if (isset($content["token"])) {
            $this->setToken($content["token"]);

        } else if (isset($content["message"])) {
            throw new ApiLoginException($content["message"]);
        }

        throw new ApiLoginException("Token error");
    }
    public function setCreditionals(ApiLoginCreditionals $creditionals): void {
        $this->creditionals = $creditionals;
    }
}