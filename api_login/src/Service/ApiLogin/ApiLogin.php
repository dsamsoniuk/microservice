<?php

namespace App\Service\ApiLogin;


use Symfony\Contracts\HttpClient\HttpClientInterface;

class ApiLogin implements ApiLoginInterface {
    public ApiLoginCreditionals $creditionals;
    public function __construct(
        private ApiLoginAccessInterface $apiLoginAccess,
        private HttpClientInterface $httpClient
    ){}

    public function makeRequest(string $method, string $url, array $params = []): array {

        $this->apiLoginAccess->setCreditionals($this->creditionals);
        if ($this->creditionals === null) {
            throw new ApiLoginException("No creditionals");
        }

        if (!isset($params["query"])) {
            $params["query"] = [];
        }

        $params["query"]["token"] = $this->apiLoginAccess->getCurrentToken();

        $response = $this->httpClient->request($method,"{$this->creditionals->url}{$url}", $params);

        if ($response->getStatusCode() !== 200) {
            throw new ApiLoginException($response->getInfo());
        }

        return $response->toArray();
    }
    public function setCreditionals(ApiLoginCreditionals $creditionals): void {
        $this->creditionals = $creditionals;
    }
}