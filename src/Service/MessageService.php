<?php
namespace App\Service;

use App\Repository\MessageRepository;

class MessageService {
    public function __construct(private readonly MessageRepository $messageRepository){


    }

    public function create () {
        return 'success';
    }
}