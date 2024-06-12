<?php
namespace App\Service;

use App\Entity\Message;
use App\Repository\MessageRepository;
use App\Repository\TypeRepository;
use Carbon\Carbon;
use Doctrine\ORM\EntityManagerInterface;
use Faker\Factory;

class MessageService {
    public function __construct(
        private readonly MessageRepository $messageRepository,
        private readonly TypeRepository $typeRepository,
        private readonly EntityManagerInterface $entityManager
    ){}

    public function create(){
        return 'success';
    }

    public function fill(){

        $faker = Factory::create('nl_NL');

        $types = $this->typeRepository->findAll();
        //for($i = 0; $i = 5; $i++){
            $message = new Message();
            $message->setType($types[rand(0, count($types)-1)]);
            $message->setSubject($faker->word());
            $message->setBody($faker->sentence());
            $message->setDate(Carbon::now());
            $message->setSender($faker->name());
            $this->entityManager->persist($message);
        //}
        $this->entityManager->flush();
    }
}