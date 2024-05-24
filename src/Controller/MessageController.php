<?php

namespace App\Controller;

use App\Entity\Message;
use App\Service\MessageService;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

class MessageController extends AbstractController
{
    public function __construct(private readonly MessageService $messageService)
    {
        
    }
    //#[Route('/messages', name: 'messageIndex')]

    #[Route('/message', name: 'messageCreate', methods: 'POST')]
    public function create(): Response
    {
        return new Response(
            $this->messageService->create()
        );
    }

    #[Route('/message/{id}', name: 'messageShow')]
    public function show(Message $message): Response
    {
        return new JsonResponse($message);
    }

    #[Route('/message/{id}', name: 'messageDelete', methods: 'DELETE')]
    public function delete(Message $message): Response
    {

        return new JsonResponse($message);
    }
}
