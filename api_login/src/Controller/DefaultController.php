<?php

namespace App\Controller;

use App\Entity\User;
use App\Transformer\NoteTransformer;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\Routing\Attribute\Route;

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
            'message'   => 'Default message - welcome',
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
}
