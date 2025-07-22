# API LOGIN

Przykład serwisu integrującego Api login do innego serwisu lub witryny

## Przykład wywołania api

```
use App\Service\ApiLogin\ApiLoginInterface;

#[Route('/default', name: 'app_default', methods: ['GET', 'POST'])]
public function default(ApiLoginInterface $apiLogin): Response
{
    try {
        $creditionals = new ApiLoginCreditionals(
            $this->getParameter('secret_apilogin_password'), 
            $this->getParameter('secret_apilogin_username'),
            "http://localhost:80/api"
        );
        $apiLogin->setCreditionals($creditionals);

        $response = $apiLogin->makeRequest('POST', '/default', ['json' => []]);
    } catch (\Exception $e) {
        // $this->addFlash('error', $e->getMessage());
        return $this->json(['error' => $e->getMessage()]);
    }

    return $this->json(['default']);
}
```
