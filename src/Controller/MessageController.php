<?php

namespace App\Controller;

use App\Entity\Message;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

class MessageController extends AbstractController
{
    //#[Route('/messages', name: 'messageIndex')]

    #[Route('/message', name: 'messageCreate')]
    public function create(EntityManagerInterface $entityManager): Response
    {
        
        return new Response(
            'success or failure'
        );
    }

    #[Route('/message/{id}', name: 'messageShow')]
    public function show(Message $message): Response
    {

        return new JsonResponse($message);
    }

    #[Route('/message/{id}', name: 'messageDelete')]
    public function delete(Message $message): Response
    {

        return new JsonResponse($message);
    }
}
