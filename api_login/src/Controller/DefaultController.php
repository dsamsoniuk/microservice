<?php

namespace App\Controller;

use App\Entity\User;
use App\Service\ApiLogin\ApiLoginCreditionals;
use App\Service\ApiLogin\ApiLoginInterface;
use App\Transformer\NoteTransformer;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\Routing\Attribute\Route;
use Symfony\Contracts\HttpClient\HttpClientInterface;
use Symfony\Flex\Response;

final class DefaultController extends AbstractController
{
    public function __construct(private EntityManagerInterface $em){
    }

    #[Route('/api/default', name: 'app_default')]
    public function default(): JsonResponse
    {
        $user = $this->em->getRepository(User::class)->findOneBy(['email' =>'damian@poczta.pl']);
        $notes = [];
        
        foreach ($user->getNotes() as $note) {
            $notes[] = NoteTransformer::transform($note);
        }

        return $this->json([
            'message'   => 'Pobrano notatki użytkownika',
            'data'      => $notes
        ]);
    }

    #[Route('/api', name: 'app_test')]
    public function test(): JsonResponse
    {
        return $this->json([
            'message' => 'api test',
          
        ]);
    }

    #[Route('/', name: 'app_index')]
    public function index(): JsonResponse
    {

        return $this->json([
            'message' => 'Welcome',
          
        ]);
    }
       #[Route('/abc', name: 'abc')]
    public function abc(): JsonResponse
    {

        return $this->json([
            'message' => 'Welcome',
          
        ]);
    }
    
    #[Route('/test', name: 'app_default_def')]
    public function tt(ApiLoginInterface $apiLogin,  HttpClientInterface $httpClient)
    {
        // return $this->json(['asds']);
        // $response = $httpClient->request("GET","http://localhost/");
        // $statusCode = $response->getStatusCode();
        // $content = $response->getContent();
        // dump($response->getContent());
        // die;

        try {
            // Example API LOGIN 
            $creditionals = new ApiLoginCreditionals(
                $this->getParameter('secret_apilogin_password'), 
                $this->getParameter('secret_apilogin_username'),
                "http://172.25.0.3/api"
            );
            $apiLogin->setCreditionals($creditionals);

            $response = $apiLogin->makeRequest('POST', '/default');
        } catch (\Exception $e) {
            // $this->addFlash('error', $e->getMessage());
            return $this->json(['error' => $e->getMessage()]);
        }
        return $this->json(['default']);
    }
    
    
}
