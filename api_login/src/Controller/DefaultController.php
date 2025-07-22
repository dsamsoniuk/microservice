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
    
    // #[Route('/default', name: 'app_default', methods: ['GET', 'POST'])]
    // public function default(ApiLoginInterface $apiLogin,  HttpClientInterface $httpClient): Response
    // {
    //     try {
    //         $creditionals = new ApiLoginCreditionals(
    //             $this->getParameter('secret_apilogin_password'), 
    //             $this->getParameter('secret_apilogin_username'),
    //             "https://4252b4e560f8.ngrok-free.app/api"
    //         );
    //         $apiLogin->setCreditionals($creditionals);

    //         $response = $apiLogin->makeRequest('GET', '/default');
    //         return $this->json(['response' => $response]);

    //     } catch (\Exception $e) {
    //         // $this->addFlash('error', $e->getMessage());
    //         return $this->json(['error' => $e->getMessage()]);
    //     }
    // }
    
}
