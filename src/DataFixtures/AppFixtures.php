<?php

namespace App\DataFixtures;

use App\Entity\Message;
use App\Entity\Type;
use App\Service\MessageService;
use App\Service\TypeService;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use Faker\Factory;

class AppFixtures extends Fixture
{
    public function __construct(
        private readonly TypeService $typeService,
        private readonly MessageService $messageService
    ){}

    public function load(ObjectManager $manager): void
    {
        $this->typeService->fill();
        $this->messageService->fill();

    }
}
