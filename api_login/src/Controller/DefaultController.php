<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\Routing\Attribute\Route;

final class DefaultController extends AbstractController
{
    #[Route('/api/default', name: 'app_default')]
    public function default(): JsonResponse
    {
        return $this->json([
            'message' => 'Welcome to your new controller!',
            'path' => 'src/Controller/DefaultController.php',
            'data' => [
                ['id' => 1,'name'=> 'laptop xd', 'price' => 2334],
                ['id' => 2,'name'=> 'laptop TTY', 'price' => 6555],
                ['id' => 3,'name'=> 'PC TTY', 'price' => 5556],
            ]
        ]);
    }
    #[Route('/api', name: 'app_test')]
    public function test(): JsonResponse
    {
        return $this->json([
            'message' => 'api test',
          
        ]);
    }#[Route('/', name: 'app_index')]
    public function index(): JsonResponse
    {
        return $this->json([
            'message' => 'Welcome',
          
        ]);
    }
}
